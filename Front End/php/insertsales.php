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
    </head>
    <body>
    <script>
            function search(){
                a = document.getElementById("search");
                    if (a.value.length<1){
                        alert("Cannot search for empty string")
                    }else{
                        const form = document.forms["search"];
                        form.action = "../php/search.php";
                        form.method = "get";
                    }
            }
        </script>
        <div id="barover">
            <div id="bar">
                <div class="barr">
                    <img>
                    <p>B&S Database</p>
                </div>
                <div class="barr">
                    <form method="GET" action="php/search.php">
                        <input type="text" id="search" name="query" style="width: 85%;" id="search" required>
                    </form>
                    <button type="submit" value="Search" onclick="search()">Search</button>
                </div>
                <div class="barr">
                    <div id="switch" >
                        <button id="switch">En</button>
                        <button id="switch">Fa</button>
                    </div>
                </div>
            </div>  
        </div>
        <div id="bar2over">
            <div id="bar2">
                <ul class="barr2">
                <li>
                        <a href="../home.php">Home</a>
                    </li>
                    <li><a href="../sales/sales.php">Sales</a></li>
                    <li><a href="../drugs/drugs.php">Drug</a></li>
                    <li><a href="../employees/employees.php">Employee</a></li>
                    <li><a href="../Inventory/inventory.php">Inventory</a></li>
                    <li><a href="../purchases/purchases.php">Purchases</a></li>
                    <li><a href="../contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div id="over"><h1>Sales Bill</h1></div>';


    $rowCount = intval($_POST['qnt']); // Number of rows to process
    $qnt = $rowCount;
    $salesData = []; // Array to store sales data

    // Shared fields
    $date = $_POST['Date_1'] ?? null;

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
    
    // Continue with other code logic    

    $employeeID = !empty($_POST['Cut_ID_1']) ? $_POST['Cut_ID_1'] : null;
    $Amount_Received = !empty($_POST["Amount_Received_1"]) && is_numeric($_POST["Amount_Received_1"])
    ? floatval($_POST["Amount_Received_1"]): 0.00;
    $Sales_Officer = $_POST['Sales_Officer'] ?? null;


    $totalSales = 0;
    $rowTotals = []; // Store individual row totals

// Ensure customer_id is not null/empty and amount_received is 0 before proceeding
if (!empty($customerID) && $Amount_Received == 0) {
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
            echo "Invoice already exists with ID: $invoice_ID";
        } else {
            // No invoice found, create a new one
            $sql = "INSERT INTO invoices (customer_id, date, sales_officer) VALUES ('$customerID', '$date', '$Sales_Officer')";
            
            if (mysqli_query($connect, $sql)) {
                echo "Invoice has been created.";
                
                // Fetch the newly created invoice
                $invoice_check = "SELECT * FROM invoices WHERE date = '$date' AND customer_id = '$customerID'";
                $invoice_check_results = mysqli_query($connect, $invoice_check);
                
                if ($invoice_check_results) {
                    $invoice_check_row = mysqli_fetch_assoc($invoice_check_results);
                    $invoice_ID = $invoice_check_row['invoice_id'];
                    echo "Invoice ID: $invoice_ID";
                } else {
                    echo "Error fetching invoice after creation: " . mysqli_error($connect);
                }
            } else {
                echo "Invoice creation failed: " . mysqli_error($connect);
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
        // Query to get the Inventory_ID for the given drug name
        $name = "SELECT Inventory_ID FROM inventory WHERE Drug_ID = (SELECT Drug_ID FROM drugs WHERE Drug_Name = '$drugName')";
        $Inventory_ID_result = mysqli_query($connect, $name);
    
        if ($Inventory_ID_result) {
            $Inventory_ID_row = mysqli_fetch_assoc($Inventory_ID_result);
            $Inventory_ID = $Inventory_ID_row['Inventory_ID'];
        } else {
            echo 'Could not fetch inventory ID for ' . $drugName;
            continue;  // Skip this iteration if Inventory_ID is not found
        }
        $quantity = $_POST["Quantity_$i"] ?? null;
        $discount = isset($_POST["Discount_$i"]) && $_POST["Discount_$i"] !== '' ? $_POST["Discount_$i"] : 0.00;
        $price = $_POST["Price_$i"] ?? null;
        $total = $_POST["Total_$i"] ?? null;
        $note = $_POST["Note_$i"] ?? null;

        // Validate required fields
        if (!$drugName || !$quantity || !$price || !$total) {
            echo "Missing required fields for row $i.";
            exit;
        }

        $rowTotals[] = $total;
        $totalSales += $total;

        

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
            'Amount_Received' => null, // This will be updated later
            'Note' => $note,
            'invoice_no' => $invoice_ID
            
        ];
    }


    // Distribute the received amount proportionally
    foreach ($salesData as $index => $sale) {
        $sale['Amount_Received'] = round(($rowTotals[$index] / $totalSales) * $Amount_Received, 2);
    }

    // Build bulk INSERT query
     $sql = "INSERT INTO sales (Inventory_ID, Sale_Date, Quantity, Discount, Price, Cut_ID, Customer_ID, Total_Price, Amount_Received, Note, invoice_no) VALUES ";
    $values = [];
    $params = [];

    foreach ($salesData as $sale) {
        $values[] = "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array_merge($params, array_values($sale));
    }

    $sql .= implode(", ", $values);

    $stmt = $connect->prepare($sql);

    // Bind and execute
    if ($stmt->execute($params)) {
        echo "Sales records added successfully!";
    } else {
        echo "Error: " . $stmt->error;


    }

if (!empty($invoice_ID)){
    $sql1 = "SELECT balance FROM customer WHERE customer_id = '$customerID'";
    $balance_result = mysqli_query($connect, $sql1);

    if ($balance_result) {
        $balance_result_row = mysqli_fetch_assoc($balance_result);
        $Balance = $balance_result_row['balance'];
    } else {
        echo 'Could not fetch balance for ' . $customer_shop;
    }


    $query = "select * from sales_bill where invoice_no = '$invoice_ID'";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' border-collapse=collapse id='tblreport'>";
        echo "<tr>
                    <th>Drug Type</th><th>Drug Name</th><th>Quantity</th><th>price</th><th>Discount</th><th>Total_Price</th>
                    <th>Amount_Received</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Type'] . "</td>";
            echo "<td>" . $r['Name'] . "</td>";
            echo "<td>" . $r['Quantity'] . "</td>";
            echo "<td>" . $r['Price'] . "</td>";
            echo "<td>" . $r['Discount'] . "</td>";
            echo "<td>" . $r['Total_Price'] . "</td>";
            echo "<td>" . $r['Amount_Received'] . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<th>" . 'Invoice No:' ."</th>";
        echo "<th>" . 'Customer:' ."</th>";
        echo "<th>" . 'Date:' ."</th>";
        echo "<th>" . 'Amount Recieved:' ."</th>";
        echo "<th>" . 'Balance:' ."</th>";
        echo "</tr>";
        echo "<td>" . $invoice_ID . "</td>";
        echo "<td>" . $customer_shop . "</td>";
        echo "<td>" . $date . "</td>";
        echo "<td>" . $totalSales . "</td>";
        echo "<td>" . $Balance . "</td>";
        echo "</tr>";

        echo "</table>";
    } else {
        echo "No records found.";  
    }
} else {
    # code...
}


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
