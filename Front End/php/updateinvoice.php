<?php
require 'connection.php';

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Sales</title>
    <link rel="stylesheet" href="../css/home.css">
    <script src="../converter/jalaali.min.js"></script>
</head>
<body>';
include '../php/header2.php';

// Start transaction
mysqli_begin_transaction($connect);

try {
    // Validate input
    $invoice_ID = isset($_POST['invoice_id']) ? intval($_POST['invoice_id']) : null;
    if (!$invoice_ID) throw new Exception("Missing invoice ID");

    // 1. Fetch original invoice data
    $invoice_query = "SELECT * FROM invoices WHERE invoice_id = ?";
    $stmt = $connect->prepare($invoice_query);
    $stmt->bind_param("i", $invoice_ID);
    $stmt->execute();
    $invoice = $stmt->get_result()->fetch_assoc();
    if (!$invoice) throw new Exception("Invoice not found");

    // 2. Get original sales records
    $sales_query = "SELECT * FROM sales WHERE invoice_no = ?";
    $stmt = $connect->prepare($sales_query);
    $stmt->bind_param("i", $invoice_ID);
    $stmt->execute();
    $existing_sales = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    // 3. Restore inventory and calculate original values
    $original_total = $invoice['total_sales'];
    $original_received = $invoice['received'];
    $customerID = $invoice['customer_id'];

    foreach ($existing_sales as $sale) {
        $restore_query = "UPDATE inventory 
                         SET Amount_Left = Amount_Left + ? 
                         WHERE Inventory_ID = ?";
        $stmt = $connect->prepare($restore_query);
        $stmt->bind_param("ii", $sale['Quantity'], $sale['Inventory_ID']);
        if (!$stmt->execute()) {
            throw new Exception("Inventory restoration failed");
        }
    }

    // 4. Reverse original balance impact
    $balance_query = "UPDATE customer 
                     SET balance = balance - (? - ?)
                     WHERE customer_id = ?";
    $stmt = $connect->prepare($balance_query);
    $stmt->bind_param("ddi", $original_total, $original_received, $customerID);
    if (!$stmt->execute()) {
        throw new Exception("Balance reversal failed");
    }

    // 5. Delete old sales records
    $delete_query = "DELETE FROM sales WHERE invoice_no = ?";
    $stmt = $connect->prepare($delete_query);
    $stmt->bind_param("i", $invoice_ID);
    if (!$stmt->execute()) {
        throw new Exception("Failed to clear old sales records");
    }

    // 6. Process new sales data
    $rowCount = intval($_POST['qnt']);
    $salesData = [];
    $totalSales = 0;

    for ($i = 1; $i <= $rowCount; $i++) {
        // Input validation
        $required = ["Drug_Name_$i", "Quantity_$i", "Price_$i", "Total_$i"];
        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                throw new Exception("Missing required field in row $i");
            }
        }

        // Inventory check
        $drugName = $_POST["Drug_Name_$i"];
        $quantity = intval($_POST["Quantity_$i"]);
        $drugAmount = $_POST["Amount_$i"] ?? null;
        $drugExp = $_POST["Expiration_$i"] ?? null;

        // Get inventory ID with prepared statement
        $inv_query = "SELECT i.Inventory_ID 
                     FROM inventory i
                     JOIN drugs d ON i.Drug_ID = d.Drug_ID
                     WHERE d.Drug_Name = ?
                       AND i.Expiration = ?";
        $stmt = $connect->prepare($inv_query);
        $stmt->bind_param("ss", $drugName, $drugExp);
        $stmt->execute();
        $invResult = $stmt->get_result();
        
        if ($invResult->num_rows === 0) {
            throw new Exception("Inventory not found for $drugName");
        }
        $invRow = $invResult->fetch_assoc();
        $Inventory_ID = $invRow['Inventory_ID'];

        // Check available quantity
        $check_query = "SELECT Amount_Left FROM inventory WHERE Inventory_ID = ?";
        $stmt = $connect->prepare($check_query);
        $stmt->bind_param("i", $Inventory_ID);
        $stmt->execute();
        $checkResult = $stmt->get_result()->fetch_assoc();
        
        if ($checkResult['Amount_Left'] < $quantity) {
            throw new Exception("Insufficient stock for $drugName");
        }

        // Update inventory
        $update_inv = "UPDATE inventory 
                      SET Amount_Left = Amount_Left - ? 
                      WHERE Inventory_ID = ?";
        $stmt = $connect->prepare($update_inv);
        $stmt->bind_param("ii", $quantity, $Inventory_ID);
        if (!$stmt->execute()) {
            throw new Exception("Inventory update failed for $drugName");
        }

        // Collect sales data
        $salesData[] = [
            'Inventory_ID' => $Inventory_ID,
            'Sale_Date' => $_POST['Date_1'],
            'Quantity' => $quantity,
            'Discount' => $_POST["Discount_$i"] ?? 0,
            'Price' => $_POST["Price_$i"],
            'Cut_ID' => $_POST['Cut_ID_1'] ?? null,
            'Customer_ID' => $customerID,
            'Total_Price' => $_POST["Total_$i"],
            'Note' => $_POST["Note_$i"] ?? '',
            'invoice_no' => $invoice_ID
        ];

        $totalSales += floatval($_POST["Total_$i"]);
    }

    // 7. Insert new sales records
    $sql = "INSERT INTO sales (Inventory_ID, Sale_Date, Quantity, Discount, Price, 
                              Cut_ID, Customer_ID, Total_Price, Note, invoice_no) 
            VALUES " . implode(",", array_fill(0, count($salesData), "(?,?,?,?,?,?,?,?,?,?)"));

    $stmt = $connect->prepare($sql);
    $params = [];
    foreach ($salesData as $sale) {
        $params = array_merge($params, array_values($sale));
    }
    
    if (!$stmt->execute($params)) {
        throw new Exception("Sales insertion failed: " . $stmt->error);
    }

    // 8. Update invoice
    $json_data = json_encode(array_map(function($item) {
        return [
            "note" => $item['Note'],
            "price" => floatval($item['Price']),
            "cut_id" => $item['Cut_ID'] ? intval($item['Cut_ID']) : null,
            "discount" => floatval($item['Discount']),
            "quantity" => intval($item['Quantity']),
            "sale_date" => $item['Sale_Date'],
            "customer_id" => intval($item['Customer_ID']),
            "total_price" => floatval($item['Total_Price']),
            "inventory_id" => intval($item['Inventory_ID'])
        ];
    }, $salesData));

    $update_invoice = "UPDATE invoices 
                      SET date = ?, sales_officer = ?, received = ?, 
                          total_sales = ?, sales_data = ?
                      WHERE invoice_id = ?";
    $stmt = $connect->prepare($update_invoice);
    $stmt->bind_param("ssdssi", 
        $_POST['Date_1'],
        $_POST['Sales_Officer'],
        $_POST['Amount_Received_1'],
        $totalSales,
        $json_data,
        $invoice_ID
    );
    
    if (!$stmt->execute()) {
        throw new Exception("Invoice update failed: " . $stmt->error);
    }

    // 9. Update customer balance
    $new_received = floatval($_POST['Amount_Received_1']);
    $balance_update = "UPDATE customer 
                      SET balance = balance + (? - ?)
                      WHERE customer_id = ?";
    $stmt = $connect->prepare($balance_update);
    $stmt->bind_param("ddi", $totalSales, $new_received, $customerID);
    
    if (!$stmt->execute()) {
        throw new Exception("Balance update failed");
    }

    // Commit transaction
    mysqli_commit($connect);

    // Display success
    echo "<div class='alerts'>Update successful!</div>";
    
    // Display invoice (similar to your original code)
    // ... [Include your invoice display code here] ...
    
    if (!empty($invoice_ID)) {
        $message = "Thank you for choosing us—we appreciate your business and look forward to working with you again!";
        $query = "select * from sales_bill where invoice_no = '$invoice_ID' order by Name asc";
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
                echo "<table id='tblinvoice'>";
                echo "<tr>
                            <th>No</th>
                            <th>Drug Type</th>
                            <th>Drug Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Total Price</th>
                        </tr>";
                $rownumber = 1;
                while ($r = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $rownumber . "</td>";
                    $rownumber++;
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
                    echo "<td>" . $Balance_O . "</td>";
                    echo "<td>" . $Current_Balance . "</td>";
                    echo "</tr>";
                echo "</table>";
                echo "<div id='invoice-msg'>";
                    echo "<p>". $message . "</p>";
                echo"</div>";
            echo "</div>";
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

} catch (Exception $e) {
    mysqli_rollback($connect);
    echo "<div class='alerts'>Error: " . $e->getMessage() . "</div>";
}

// ... [Rest of your HTML/JS code] ...
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