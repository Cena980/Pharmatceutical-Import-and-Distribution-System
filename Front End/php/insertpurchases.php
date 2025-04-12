<?php
// Include database connection
require 'connection.php';

echo '<!DOCTYPE html>
<html lang="en">
    <head>
        <title data-key=\'purchase-insert\'>
            Purchases Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
        <script src="../converter/jalaali.min.js"></script>
    </head>
    <body>';
    include '../php/header2.php';



    include 'connection.php';

    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    //echo "<div class='alerts'>Number of rows submitted: " . $qnt ."</div>";
    $purchaseData = []; // Array to store purchase data


    $date = $_POST["purchase_date_1"] ?? null;
    $amount_paid = (!empty($_POST["amount_paid_1"]) && is_numeric($_POST["amount_paid_1"])) ? floatval($_POST["amount_paid_1"]) : 0.00;
    
    $order_by = $_POST["order_by"] ?? '';

    $ven_add = '';
    $ven_phone=0;
    $Vendor_Name = $_POST["vendor_name_1"] ?? null;
    $Vendor_Name_sql = "SELECT vendor_id, address, phone_number FROM vendors WHERE name = '$Vendor_Name'";
    $Vendor_ID_Result = mysqli_query($connect, $Vendor_Name_sql);

    if ($Vendor_ID_Result) {
        $Vendor_ID_Row = mysqli_fetch_assoc($Vendor_ID_Result);
        $vendor_id = $Vendor_ID_Row['vendor_id'];
        $ven_add = $Vendor_ID_Row['address'];
        $ven_phone = $Vendor_ID_Row['phone_number'];
    } else {
        echo 'Could not fetch Vendor ID for ' . $Vendor_Name;
    }
    //fetching debt balance from vendors table
    $vendor_debt_O = 0;
    if (!empty($vendor_id)) {
        $sql31 = "SELECT Debt FROM vendors WHERE vendor_id = '$vendor_id'";
        $received_result = mysqli_query($connect, $sql31);

        if ($received_result && mysqli_num_rows($received_result) > 0) {
            $received_result_row = mysqli_fetch_assoc($received_result);
            $vendor_debt_O = $received_result_row['Debt'];
        } else {
            // Set balance to 0 if no balance was retrieved
            $vendor_debt_O = 0;
            //echo "<div class='alerts'>recieved not found for invoice, defaulting to 0."; echo "</div>";
        }
    }

    if (!empty($vendor_id)) {
        // Check if the invoice already exists
        $order_check = "SELECT * FROM `purchase order` WHERE po_date = '$date' AND vendor_id = '$vendor_id'";
        $order_check_results = mysqli_query($connect, $order_check);
    
        if ($order_check_results === false) {
            // Query failed (alert for database issue)
            echo "Error checking for existing invoice: " . mysqli_error($connect);
        } else {
            // Check if the invoice already exists
            if (mysqli_num_rows($order_check_results) > 0) {
                // Invoice exists (alert with invoice details)
                $order_check_row = mysqli_fetch_assoc($order_check_results);
                $order_id = $order_check_row['po_id'];
                //echo "<div class='alerts'>PO already exists with ID: $order_id and Date: $date</div>";
            } else {
                // No purcahse order found, create a new one
                $sql = "INSERT INTO `purchase order` (vendor_id, po_date, ordered_by) VALUES ('$vendor_id', '$date', '$order_by')";
                
                if (mysqli_query($connect, $sql)) {
                    //echo "<div class='alerts'>Purcahse Order has been created.</div>";
                    
                    // Fetch the newly created PO
                    $order_check = "SELECT * FROM `purchase order` WHERE po_date = '$date' AND vendor_id = '$vendor_id'";
                    $order_check_results = mysqli_query($connect, $order_check);
                    
                    if ($order_check_results) {
                        $order_check_row = mysqli_fetch_assoc($order_check_results);
                        $order_id = $order_check_row['po_id'];
                        //echo "<div class='alerts'>PO ID: $po_id"; echo "</div>";
                    } else {
                        echo "<div class='alerts'>Error fetching PO after creation: " . mysqli_error($connect); echo "</div>";
                    }
                } else {
                    echo "<div class='alerts'>PO creation failed: " . mysqli_error($connect); echo "</div>";
                }
            }
        }
    } else {
        $order_id = null;
        // Skip PO creation silently if vendor_id is empty
    }
    $total_purchase = 0;

    for ($i = 1; $i <= $qnt; $i++) {
        $Drug_Name = $_POST["drug_name_$i"] ?? null;
        $drug_id_sql = "SELECT Drug_ID FROM drugs WHERE Drug_Name = '$Drug_Name'";
        $Drug_ID_result = mysqli_query($connect, $drug_id_sql);
    
        if ($Drug_ID_result) {
            $Drug_ID_row = mysqli_fetch_assoc($Drug_ID_result);
            $drug_id = $Drug_ID_row['Drug_ID'];
        } else {
            echo 'Could not fetch Drug ID for ' . $Drug_Name;
            continue;  // Skip this iteration if Inventory_ID is not found
        }
        $price = $_POST["price_$i"] ?? 0;
        $quantity = $_POST["quantity_$i"] ?? 0;
        $discount = (!empty($_POST["discount_$i"]) && is_numeric($_POST["discount_$i"])) ? floatval($_POST["discount_$i"]) : 0.00;
        $selling_price = (!empty($_POST["selling_price_$i"]) && is_numeric($_POST["selling_price_$i"])) 
        ? floatval($_POST["selling_price_$i"]) 
        : null;



        // Ensure the discount is a valid number
        if (!is_numeric($discount)) {
            $discount = 0; // Default to 0 if the input is not numeric
        }

        // Cast to float for consistency
        $discount = (float)$discount;
        $expiration = !empty($_POST["expiration_$i"]) ? $_POST["expiration_$i"] : date("Y") . "-12";
        $total_amount = $_POST["total_amount_$i"] ?? 0;
        if($i < $qnt){
            $amount = 0;
        }else{
            $amount = $amount_paid;
        }

        // Validate required fields
        if (!$drug_id || !$quantity || !$price || !$total_amount || !$vendor_id) {
            echo "<div class='alerts'>Missing required fields for row $i."; echo "</div>";
            echo "<div class='alerts'>ورودی ناقص در خط  $i."; echo "</div>";
            exit;
        }
        $total_purchase += $total_amount;
        // Include in the array for insertion
        $purchaseData[] = [
            'vendor_id' => $vendor_id,
            'drug_id' => $drug_id,
            'price' => $price,
            'quantity' => $quantity,
            'Discount' => $discount,
            'selling_price' => $selling_price,
            'Expiration' => $expiration,
            'purchase_date' => $date,
            'total_amount' => $total_amount,
            'po_id' => $order_id,
            
        ];
    }
    
    $sql = "INSERT into purchases (vendor_id, drug_id, Expiration, quantity, price, Discount, selling_price, purchase_date, total_amount, po_id)
             values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        echo "<div class='alerts'>Prepare failed: " . $connect->error . "</div>";
    } else {
        foreach ($purchaseData as $data) {
            $stmt->bind_param(
                "iisidddssi", 
                $data['vendor_id'],
                $data['drug_id'],
                $data['Expiration'],
                $data['quantity'],
                $data['price'],
                $data['Discount'],
                $data['selling_price'],
                $data['purchase_date'],
                $data['total_amount'],
                $data['po_id']
            );

            if ($stmt->execute()) {
                $successCount++; // Increment counter on success
            } else {
                echo "<div class='alerts'>Error inserting item: " . $stmt->error . "</div>";
            }
        }

        // NEW: Single success message after all inserts
        if ($successCount > 0) {
            echo "<div class='success'>$successCount purchases inserted successfully.</div>";
            echo "<div class='alerts'>" . $successCount . " خریدها موفقانه ثبت گردید</div>";
        }
    }


    //setting balances to zero
    $Total_amount_o = 0;
    $Amount_Paid_o = 0;
    #Fetching old Recieved from invoice
    if (!empty($order_id)) {
        $sql31 = "SELECT Total_amount, Amount_Paid FROM `purchase order` WHERE po_id = '$order_id'";
        $received_result = mysqli_query($connect, $sql31);
    
        if ($received_result && mysqli_num_rows($received_result) > 0) {
            $received_result_row = mysqli_fetch_assoc($received_result);
            $Total_amount_o = $received_result_row['Total_amount'];
            $Amount_Paid_o = $received_result_row['Amount_Paid'];
        } else {
            // Set balance to 0 if no balance was retrieved
            $Total_amount_o = 0;
            $Amount_Paid_o = 0;
            //echo "<div class='alerts'>recieved not found for invoice, defaulting to 0."; echo "</div>";
        }
    }

    #upadating balance
    $Total_amount_F = $Total_amount_o + $total_purchase;
    $Amount_Paid_F = $amount_paid + $Amount_Paid_o;
    #upadintg balance in database
    $sql = "UPDATE `purchase order` SET Total_amount = ?, Amount_Paid = ? WHERE po_id = ?";
    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ddi", $Total_amount_F, $Amount_Paid_F, $order_id);

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Check if any row was updated
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            //echo "<div class='alerts'>" . json_encode(['status' => 'success', 'message' => 'Record updated successfully']); echo "</div>";
        } else {
            //echo "<div class='alerts'>" . json_encode(['status' => 'warning', 'message' => 'No changes made (invoice not found or same values)']); echo "</div>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<div class='alerts'>" . json_encode(['status' => 'error', 'message' => 'Failed to prepare the query']); echo "</div>";
    }

    #I used to fetch remaining_debt_o from purchase order here
    $Remaining_Debt_O = $total_purchase - $amount_paid;

    $Remaining_Debt_F = $Remaining_Debt_O + $vendor_debt_O;

    #upadintg balance in database
    $sql = "UPDATE vendors SET Debt = ? WHERE vendor_id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "di", $Remaining_Debt_F, $vendor_id);

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Check if any row was updated
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            //echo "<div class='alerts'>" . json_encode(['status' => 'success', 'message' => 'Record updated successfully']); echo "</div>";
        } else {
            //echo "<div class='alerts'>" . json_encode(['status' => 'warning', 'message' => 'No changes made (vendor not found or same values)']); echo "</div>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<div class='alerts'>" . json_encode(['status' => 'error', 'message' => 'Failed to prepare the query']); echo "</div>";
    }

    if (!empty($order_id)) {
        $query = "select * from purchase_bill where po_id = '$order_id'";
        $res = mysqli_query($connect, $query);
    
        $num_rows = mysqli_num_rows($res);
        if($num_rows>0){
        
            echo "<div id='printableSection'>";
            echo "<div class='row'>";
                echo "<div class='column'>";
                    echo "<table class='invoice-table'>";
                                echo "<tr>
                                <td>Purcahsed From: </td>
                                <td>$Vendor_Name</td>
                                </tr>";
                                echo "<tr>
                                <td>Name: </td>
                                <td>$ven_add</td>
                                </tr>";
                                echo "<tr>
                                <td>Address: </td>
                                <td>$ven_phone</td>
                                </tr>";
                    echo "</table>";
                echo "</div>";
                echo "<div class='column'>";
                        echo "<div id='underHead'>
                            <div class='topimage'>
                                <img src='../images/logoLarge.png'>
                            </div>
                        </div>";
                        echo "<table class='invoice-table'>";
                                    echo "<tr>
                                    <td>PO id: </td>
                                    <td>$order_id</td>
                                    </tr>";
                                    echo "<tr>
                                    <td rowspan='2'>Date: </td>
                                    <td>$date</td>
                                    </tr>";
                                    echo "<tr>
                                        <td id='date'></td>
                                        </tr>";
                        echo "</table>";
                echo "</div>";
                echo "<div class='column'>";
                    echo "<div>";
                    echo "<table class='invoice-tablen'>";
                                echo "<tr>
                                <td>Address:</td>
                                <td>Mazar Hotel</td>
                                </tr>";
                                echo "<tr>
                                <td>Shop No:</td>
                                <td>207</td>
                                </tr>";
                                echo "<tr>
                                <td>Ordered By: </td>
                                <td>$order_by</td>
                                </tr>";
                                echo "<tr>
                                <td>Currency:</td>
                                <td>AFN ؋</td>
                                </tr>";
                    echo "</table>";
                echo "</div>";
    
            echo "</div>";
            echo "</div>";
                echo "<table id='tblinvoice'>";
                echo "<tr>
                            <th>Drug Type</th>
                            <th>Drug Name</th>
                            <th>Quantity</th>
                            <th>price</th>
                            <th>Discount</th>
                            <th>Total_Price</th>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Vendor</th>
                        </tr>";
                while ($r = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $r['Type'] . "</td>";
                    echo "<td>" . $r['Drug_Name'] . "</td>";
                    echo "<td>" . $r['Quantity'] . "</td>";
                    echo "<td>" . $r['Price'] . "</td>";
                    echo "<td>" . $r['Discount'] . "</td>";
                    echo "<td>" . $r['Total_Price'] . "</td>";
                    echo "<td>" . $r['po_id'] . "</td>";
                    echo "<td>" . $r['Purchase_Date'] . "</td>";
                    echo "<td>" . $r['Vendor_Name'] . "</td>";
                    echo "</tr>";
                }
        
                echo "</table>";
                echo "<table id= 'tblinvoice'>";
                    echo "<tr>";
                    echo "<th>" . 'Sub Total:' ."</th>";
                    echo "<th>" . 'Old Balance:' ."</th>";
                    echo "<th>" . 'Paid:' ."</th>";
                    echo "<th>" . 'Grand Total:' ."</th>";
                    echo "</tr>";
                    echo "<td>" . $total_purchase . "</td>";
                    echo "<td>" . $vendor_debt_O . "</td>";
                    echo "<td>" . $amount_paid . "</td>";
                    echo "<td>" . $Remaining_Debt_F . "</td>";
                    echo "</tr>";
                echo "</table>";
            echo "</div>";
        } else {
            echo "No records found.";  
        }
    }
    echo "<div class='button-print'>";

    echo '
        <button class="btn btn-save" onclick="printSection(\'printableSection\')">Print</button>';
    echo "</div>";
    echo "<div class='button-print'>";

    echo '
        <button class="btn btn-back" onclick="GoBack()">Go Back</button>';
    echo "</div>";

    echo '
        <script src="https://cdn.jsdelivr.net/npm/jalaali-js/dist/jalaali.min.js"></script>
        <script>
            function GoBack(){
                history.back();}
            window.onload = function() {
                // Ensure the PHP variables are safely converted to JavaScript strings
                const gregorianDate = "' . $date . '";

                // Convert Gregorian dates to Hijri Shamsi and update the DOM
                document.getElementById("date").innerHTML = convertToHijriShamsi(gregorianDate);
            }

            // Function to print a specific section of the page
            function printSection(sectionId) {
                const section = document.getElementById(sectionId);
        
                if (section) {
                    const originalContent = document.body.innerHTML;
                    document.body.innerHTML = section.outerHTML;
                    window.print();
                    document.body.innerHTML = originalContent;
                } else {
                    console.error("Section not found: " + sectionId);
                }
            }

            // Function to convert Gregorian date to Hijri Shamsi (Solar Hijri)
            function convertToHijriShamsi(gregorianDate) {
                const date = new Date(gregorianDate);
                const { jy, jm, jd } = jalaali.toJalaali(
                    date.getFullYear(),
                    date.getMonth() + 1,
                    date.getDate()
                );
                return `${String(jd).padStart(2, "0")}/${String(jm).padStart(2, "0")}/${jy}`;
            }
        </script>
    ';

    echo '
        <div id="bottom">
            <div class="bott">
                <h3 class="section_title">Database Usage Guidelines</h3>
                <div id="points">
                    <div class="points">Authorized Access Only: Access to this database is restricted to authorized personnel only.</div>
                    <div class="points">Data Integrity: Ensure the accuracy and completeness of all data entries.</div>
                    <div class="points">Privacy Protection: Handle user data responsibly and comply with relevant privacy regulations.</div>
                    <div class="points">Activity Monitoring: All activities may be logged and monitored for security purposes.</div>
                    <div class="points">Reporting Issues: Report any technical issues or security concerns immediately to the system administrator.</div>
                    <div class="points">Prohibited Actions: Unauthorized copying, redistribution, or alteration of the database or its components is strictly prohibited.</div>
                </div>

            </div>
            <div class="bott">
                <h3 class="section_title">Technical Support</h3>
                <div id="points">
                    <div class="points">BSDatabases.tech@gmail.com</div>
                </div>

            </div>
            <div class="bott">
                <h3>...</h3>
            </div>
        </div>
    </body>
</html>';
    

    



?>
