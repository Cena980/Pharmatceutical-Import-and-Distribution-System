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
    $salesData = []; // Array to store sales data

    // Shared fields
    $date = $_POST['Date_1'] ?? null;
    // Handle foreign keys explicitly
    $customerID = !empty($_POST['Customer_ID_1']) ? $_POST['Customer_ID_1'] : null;
    $employeeID = !empty($_POST['Cut_ID_1']) ? $_POST['Cut_ID_1'] : null;
    $Amount_Received = !empty($_POST["Amount_Received_1"]) && is_numeric($_POST["Amount_Received_1"])
    ? floatval($_POST["Amount_Received_1"]): 0.00;


    $totalSales = 0;
    $rowTotals = []; // Store individual row totals

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
            'Note' => $note
            
        ];
    }

    // Distribute the received amount proportionally
    foreach ($salesData as $index => &$sale) {
        $sale['Amount_Received'] = round(($rowTotals[$index] / $totalSales) * $Amount_Received, 2);
    }

    // Build bulk INSERT query
     $sql = "INSERT INTO sales (Inventory_ID, Sale_Date, Quantity, Discount, Price, Cut_ID, Customer_ID, Total_Price, Amount_Received, Note) VALUES ";
    $values = [];
    $params = [];

    foreach ($salesData as $sale) {
        $values[] = "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array_merge($params, array_values($sale));
    }

    echo "<pre>";
    print_r($qnt);
    print_r($salesData);
    echo "</pre>";
    exit;

    $sql .= implode(", ", $values);

    $stmt = $connect->prepare($sql);

    // Bind and execute
    if ($stmt->execute($params)) {
        echo "Sales records added successfully!";
    } else {
        echo "Error: " . $stmt->error;


    }
?>
