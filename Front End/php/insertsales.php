<?php
// Include database connection
require 'connection.php';

echo '<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Sales Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
        <script src="../converter/jalaali.min.js"></script>
    </head>
    <body>';
    include '../php/header2.php';


    $rowCount = intval($_POST['qnt']); // Number of rows to process
    $qnt = $rowCount;
    $salesData = []; // Array to store sales data


    // Shared fields
    $date = $_POST['Date_1'] ?? null;
    $dueDate = $_POST['dueDate'] ?? null;

    // Handle foreign keys explicitly
    $customer_shop = !empty($_POST['Customer_Shop_1']) ? $_POST['Customer_Shop_1'] : null;
    if (!empty($customer_shop)) { // Check if input is not empty
        $shop = "SELECT customer_id FROM customer WHERE customer_shop = '$customer_shop'";
        $customer_shop_results = mysqli_query($connect, $shop);
    
        if ($customer_shop_results && mysqli_num_rows($customer_shop_results) > 0) {
            $customer_shop_row = mysqli_fetch_assoc($customer_shop_results);
            $customerID = $customer_shop_row['customer_id'];
        } else {
            $customerID = null; // Set a default value if the query fails
        }
    } else {
        $customerID = null; // Set a default value if input is empty
    }

    //Getting Customer Name
    if (!empty($customerID)) { // Check if input is not empty
        $customer_name = "SELECT customer_name, address FROM customer WHERE customer_id = '$customerID'";
        $customer_name_results = mysqli_query($connect, $customer_name);
    
        if ($customer_name_results && mysqli_num_rows($customer_name_results) > 0) {
            $customer_name_row = mysqli_fetch_assoc($customer_name_results);
            $customerName = $customer_name_row['customer_name'];
            $customerAddress = $customer_name_row['address'];
        } else {
            $customerName= ""; // Set a default value if the query fails
            $customerAddress= "";
        }
    } else {
        $customerName = ""; // Set a default value if input is empty
        $customerAddress= "";
    }
    // Continue with other code logic    

    $employeeID = !empty($_POST['Cut_ID_1']) ? $_POST['Cut_ID_1'] : null;
    $Amount_Received = !empty($_POST["Amount_Received_1"]) && is_numeric($_POST["Amount_Received_1"])
    ? floatval($_POST["Amount_Received_1"]): 0.00;
    $Sales_Officer = $_POST['Sales_Officer'] ?? null;


    $totalSales = 0;
    $count = 0;
    $rowTotals = []; // Store individual row totals

// Ensure customer_id is not null/empty before proceeding
if (!empty($customerID)) {
    // Check if the invoice already exists
    $invoice_check = "SELECT * FROM invoices WHERE date = '$date' AND customer_id = '$customerID'";
    $invoice_check_results = mysqli_query($connect, $invoice_check);

    if ($invoice_check_results === false) {
        // Query failed (alert for database issue)
        echo "Error checking for existing invoice: " . mysqli_error($connect);
    } else {
        // Check if the invoice already exists
        if (mysqli_num_rows($invoice_check_results) > 0) {
            // Invoice exists (alert with invoice details)
            $invoice_check_row = mysqli_fetch_assoc($invoice_check_results);
            $invoice_ID = $invoice_check_row['invoice_id'];
            echo "<div class='alerts'>Invoice already exists with ID: $invoice_ID and Date: $date</div>";
        } else {
            // No invoice found, create a new one
            $sql = "INSERT INTO invoices (customer_id, date, sales_officer) VALUES ('$customerID', '$date', '$Sales_Officer')";
            
            if (mysqli_query($connect, $sql)) {
                //echo "<div class='alerts'>Invoice has been created.</div>";
                
                // Fetch the newly created invoice
                $invoice_check = "SELECT * FROM invoices WHERE date = '$date' AND customer_id = '$customerID'";
                $invoice_check_results = mysqli_query($connect, $invoice_check);
                
                if ($invoice_check_results) {
                    $invoice_check_row = mysqli_fetch_assoc($invoice_check_results);
                    $invoice_ID = $invoice_check_row['invoice_id'];
                    //echo "<div class='alerts'>Invoice ID: $invoice_ID"; echo "</div>";
                } else {
                    echo "<div class='alerts'>Error fetching invoice after creation: " . mysqli_error($connect); echo "</div>";
                }
            } else {
                echo "<div class='alerts'>Invoice creation failed: " . mysqli_error($connect); echo "</div>";
            }
        }
    }
} else {
    $invoice_ID = null;
    // Skip invoice creation silently if customer_id is empty or amount_received is not zero
}

    // Gather all the rows of data dynamically
    for ($i = 1; $i <= $rowCount; $i++) {

        $drugName = $_POST["Drug_Name_$i"] ?? null;
        $drugAmount = $_POST["Amount_$i"] ?? null;
        // Query to get the Inventory_ID for the given drug name
        if(!empty($drugName)){
            $name = "SELECT Inventory_ID FROM inventory WHERE Drug_ID = (SELECT Drug_ID FROM drugs WHERE Drug_Name = '$drugName') AND Amount_Left = '$drugAmount'";
            $Inventory_ID_result = mysqli_query($connect, $name);
        
            if ($Inventory_ID_result) {
                $Inventory_ID_row = mysqli_fetch_assoc($Inventory_ID_result);
                $Inventory_ID = $Inventory_ID_row['Inventory_ID'];
            } else {
                echo "<div class='alerts'> Could not fetch inventory ID for " . $drugName; echo "</div>";
                echo "<div class='alerts'> نمبر موجودی یافت نشد " . $drugName. "برای"; echo "</div>";
                continue;  // Skip this iteration if Inventory_ID is not found
            }
        }else{
            echo "<div class='alerts'> لطفا نام دوا را وارد کنید "; echo "خط" . $i; echo "</div>";
        }
        $quantity = $_POST["Quantity_$i"] ?? null;
        $discount = isset($_POST["Discount_$i"]) && $_POST["Discount_$i"] !== '' ? $_POST["Discount_$i"] : 0.00;
        $price = $_POST["Price_$i"] ?? null;
        $total = $_POST["Total_$i"] ?? null;
        $note = $_POST["Note_$i"] ?? null;

        // Validate required fields
        if (!$drugName || !$quantity || !$price || !$total) {
            echo "<div class='alerts'>Missing required fields for row $i."; echo "</div>";
            echo "<div class='alerts'>ورودی ناقص در خط  $i."; echo "</div>";
            exit;
        }

        $rowTotals[] = $total;
        $totalSales += $total;
        $count += $quantity;


        

        // Include in the array for insertion
        $salesData[] = [
            'Inventory_ID' => $Inventory_ID,
            'Sale_Date' => $date,
            'Quantity' => $quantity,
            'Discount' => $discount,
            'Price' => $price,
            'Cut_ID' => $employeeID,
            'Customer_ID' => $customerID,
            'Total_Price' => $total,
            //'Amount_Received' => 0, // This will be updated later
            'Note' => $note,
            'invoice_no' => $invoice_ID
            
        ];
    }



    // Build bulk INSERT query
     $sql = "INSERT INTO sales (Inventory_ID, Sale_Date, Quantity, Discount, Price, Cut_ID, Customer_ID, Total_Price, Note, invoice_no) VALUES ";
    $values = [];
    $params = [];

    foreach ($salesData as $sale) {
        $values[] = "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array_merge($params, array_values($sale));
    }

    $sql .= implode(", ", $values);

    $stmt = $connect->prepare($sql);

    // Bind and execute
    if ($stmt->execute($params)) {
        echo "<div class='alerts'>Records added successfully!" ; echo "</div>";
        echo "<div class='alerts'>فروشات موفقانه ثبت گردید" ; echo "</div>";
    } else {
        echo "<div class='alerts'>Error: " . $stmt->error;echo "</div>";


    }

    $Balance = 0;
    #Fetching old Balance
    if (!empty($invoice_ID)) {
        $sql1 = "SELECT balance FROM customer WHERE customer_id = '$customerID'";
        $balance_result = mysqli_query($connect, $sql1);
    
        if ($balance_result && mysqli_num_rows($balance_result) > 0) {
            $balance_result_row = mysqli_fetch_assoc($balance_result);
            $Balance = $balance_result_row['balance'];
        } else {
            // Set balance to 0 if no balance was retrieved
            $Balance = 0;
            //echo "<div class='alerts'>Balance not found for customer, defaulting to 0."; echo "</div>";
        }
    }
    #upadating balance
    $Current_Balance = $Amount_Received + $Balance - $totalSales;
    #upadintg balance in database
    $sql = "UPDATE customer SET balance = ? WHERE customer_id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "di", $Current_Balance, $customerID);

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Check if any row was updated
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            //echo "<div class= 'alerts'>" . json_encode(['status' => 'success', 'message' => 'Balance updated successfully']); echo "</div>";
        } else {
            echo "<div class= 'alerts'>" . json_encode(['status' => 'warning', 'message' => 'No changes made (customer not found or same balance)']); echo "</div>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<div class= 'alerts'>" . json_encode(['status' => 'error', 'message' => 'Failed to prepare the query']); echo "</div>";
    }
    $received_invoice = 0;
    #Fetching old Recieved from invoice
    if (!empty($invoice_ID)) {
        $sql31 = "SELECT received FROM invoices WHERE invoice_id = '$invoice_ID'";
        $received_result = mysqli_query($connect, $sql31);
    
        if ($received_result && mysqli_num_rows($received_result) > 0) {
            $received_result_row = mysqli_fetch_assoc($received_result);
            $recieved_invoice = $received_result_row['received'];
        } else {
            // Set balance to 0 if no balance was retrieved
            $received_invoice = 0;
            //echo "<div class='alerts'>recieved not found for invoice, defaulting to 0."; echo "</div>";
        }
    }
    #upadating balance
    $current_received = $Amount_Received + $recieved_invoice;
    #upadintg balance in database
    $sql = "UPDATE invoices SET received = ? WHERE invoice_id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "di", $current_received, $invoice_ID);

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Check if any row was updated
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            //echo "<div class= 'alerts'>" . json_encode(['status' => 'success', 'message' => 'recieved updated successfully']); echo "</div>";
        } else {
            echo "<div class= 'alerts'>" . json_encode(['status' => 'warning', 'message' => 'No changes made (invoice not found or same received)']); echo "</div>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<div class= 'alerts'>" . json_encode(['status' => 'error', 'message' => 'Failed to prepare the query']); echo "</div>";
    }

    #Fetching total sales from invoice
    $invoice_total_sales =0;
    if (!empty($invoice_ID)){
        $sql23 = "SELECT total_sales FROM invoices WHERE invoice_id = '$invoice_ID'";
        $invoice_result = mysqli_query($connect, $sql23);

        if ($invoice_result) {
            $invoice_result_row = mysqli_fetch_assoc($invoice_result);
            $invoice_total_sales = $invoice_result_row['total_sales'];
        } else {
            $invoice_total_sales =0;
            echo "<div class='alerts'>Could not fetch total sales for " . $customer_shop . "invoice" . $invoice_ID; echo "</div>";
        }
    }
    #new total sales
    $new_total_sales = $totalSales + $invoice_total_sales;

    #inserting new total sales to invoice table

    $sql24 = "UPDATE invoices SET total_sales = ? WHERE invoice_id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($connect, $sql24);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "di", $new_total_sales, $invoice_ID);

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Check if any row was updated
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            //echo "<div class= 'alerts'>" . json_encode(['status' => 'success', 'message' => 'total sales inserted successfully']); echo "</div>";
        } else {
            echo "<div class= 'alerts'>" . json_encode(['status' => 'warning', 'message' => 'No changes made (invoice not found or same total_sales)']); echo "</div>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<div class= 'alerts'>" . json_encode(['status' => 'error', 'message' => 'Failed to prepare the query']); echo "</div>";
    }

    $owed = 0;
    if (($Amount_Received + $Balance - $totalSales)<0){
        $owed = $Amount_Received + $Balance - $totalSales;
    }else {
        $owed = 0;
    }

    #inserting owed into database
    $sql44 = "UPDATE invoices SET owed = ? WHERE invoice_id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($connect, $sql44);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "di", $owed, $invoice_ID);

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Check if any row was updated
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            //echo "<div class= 'alerts'>" . json_encode(['status' => 'success', 'message' => 'owed inserted successfully']); echo "</div>";
        } else {
            echo "<div class= 'alerts'>" . json_encode(['status' => 'warning', 'message' => 'No changes made (invoice not found or same owed)']); echo "</div>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<div class= 'alerts'>" . json_encode(['status' => 'error', 'message' => 'Failed to prepare the query']); echo "</div>";
    }

    if (!empty($invoice_ID)) {
        $query = "select * from sales_bill where invoice_no = '$invoice_ID'";
        $res = mysqli_query($connect, $query);
    
        $num_rows = mysqli_num_rows($res);
        if($num_rows>0){
        
            echo "<div id='printableSection'>";
            echo "<div class='row'>";
                echo "<div class='column'>";
                    echo "<table class='invoice-table'>";
                                echo "<tr>
                                <td>Bill To: </td>
                                <td>$customer_shop</td>
                                </tr>";
                                echo "<tr>
                                <td>Name: </td>
                                <td>$customerName</td>
                                </tr>";
                                echo "<tr>
                                <td>Address: </td>
                                <td>$customerAddress</td>
                                </tr>";
                                echo "<tr class='date_r'>
                                <td rowspan='2'>Date: </td>
                                <td>$date</td>
                                </tr>";
                                echo "<tr>
                                <td id='date'></td>
                                </tr>";
                    echo "</table>";
                echo "</div>";
                echo "<div class='column'>";
                    echo "<h1 class ='title'>INVOICE</h1>";
                    echo "<div id='underHead'>
                                <div class='topimage'>
                                    <img src='../images/logoLarge.png'>
                                </div>
                        </div>";
                        echo "<table class='invoice-table'>";
                                    echo "<tr>
                                    <td class='no'>INVOICE NO: </td>
                                    <td class='no'>$invoice_ID</td>
                                    </tr>";
                        echo "</table>";
                echo "</div>";
                echo "<div class='column'>";
                    echo "<table class='invoice-table'>";
                                echo "<tr>
                                <td>Address:</td>
                                <td>Mazar Hotel</td>
                                </tr>";
                                echo "<tr>
                                <td>Shop No:</td>
                                <td>207</td>
                                </tr>";
                                echo "<tr>
                                <td>Booked By: </td>
                                <td>$Sales_Officer</td>
                                </tr>";
                                echo "<tr>
                                <td>Currency:</td>
                                <td>AFN ؋</td>
                                </tr>";
                                echo "<tr class='date_r'>
                                <td rowspan='2'>Due Date:</td>
                                <td>$dueDate</td>
                                </tr>";
                                echo "<tr>
                                <td id='dueDate'></td>
                                </tr>";
                    echo "</table>";
                echo "</div>";
    
            echo "</div>";
            echo "</div>";
                echo "<table id='tblinvoice'>";
                echo "<tr>
                            <th>Drug Type</th><th>Drug Name</th><th>Quantity</th><th>price</th><th>Discount</th><th>Total Price</th>
                        </tr>";
                while ($r = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $r['Type'] . "</td>";
                    echo "<td>" . $r['Name'] . "</td>";
                    echo "<td>" . $r['Quantity'] . "</td>";
                    echo "<td>" . $r['Price'] . "</td>";
                    echo "<td>" . $r['Discount'] . "</td>";
                    echo "<td>" . $r['Total_Price'] . "</td>";
                    echo "</tr>";
                }
        
                echo "</table>";
                echo "<table id= 'tblinvoice'>";
                    echo "<tr>";
                    echo "<th>" . 'Sub Total:' ."</th>";
                    echo "<th>" . 'Received:' ."</th>";
                    echo "<th>" . 'Old Balance:' ."</th>";
                    echo "<th>" . 'Grand Total:' ."</th>";
                    echo "</tr>";
                    echo "<td>" . $totalSales . "</td>";
                    echo "<td>" . $Amount_Received . "</td>";
                    echo "<td>" . -1 * $Balance . "</td>";
                    echo "<td>" . -1 * $Current_Balance . "</td>";
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
                const gregorianDueDate = "' . $dueDate . '";

                // Convert Gregorian dates to Hijri Shamsi and update the DOM
                document.getElementById("date").innerHTML = convertToHijriShamsi(gregorianDate);
                document.getElementById("dueDate").innerHTML = convertToHijriShamsi(gregorianDueDate);
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
