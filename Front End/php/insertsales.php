<?php
    include 'connection.php';


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

    
    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    echo "Number of rows submitted: " . $qnt; 
    $Date0 = $_POST["Date_1"];
    $Employee_Cut0 = !empty($_POST["Cut_ID_1"]) && is_numeric($_POST["Cut_ID_1"]) 
    ? intval($_POST["Cut_ID_1"]) 
    : null; // Set to NULL if empty
    $Location_ID0 = !empty($_POST["Location_ID_1"]) && is_numeric($_POST["Location_ID_1"]) 
    ? intval($_POST["Location_ID_1"]) 
    : null; // Default to null if not provided or invalid
    $TotalAmount = 0;
    $Amount_Recieved = $_POST["Amount_Received_1"];
    
    for ($i = 1; $i <= $qnt; $i++) {
        $Drug_Name = $_POST["Drug_Name_$i"] ?? null;
        
        // Query to get the Inventory_ID for the given drug name
        $name = "SELECT Inventory_ID FROM inventory WHERE Drug_ID = (SELECT Drug_ID FROM drugs WHERE Drug_Name = '$Drug_Name')";
        $Inventory_ID_result = mysqli_query($connect, $name);
    
        if ($Inventory_ID_result) {
            $Inventory_ID_row = mysqli_fetch_assoc($Inventory_ID_result);
            $Inventory_ID = $Inventory_ID_row['Inventory_ID'];
        } else {
            echo 'Could not fetch inventory ID for ' . $Drug_Name;
            continue;  // Skip this iteration if Inventory_ID is not found
        }
    
        $Date = $Date0;
        $Quantity = $_POST["Quantity_$i"] ?? null;
        $Discount = $_POST["Discount_$i"] ?? null;
        $Price = $_POST["Price_$i"] ?? null;
        $Employee_Cut = !empty($_POST["Cut_ID_$i"]) && is_numeric($_POST["Cut_ID_$i"]) 
        ? intval($_POST["Cut_ID_$i"]) 
        : $Employee_Cut0;
        $Customer_ID = !empty($_POST["Customer_ID_$i"]) && is_numeric($_POST["Customer_ID_$i"]) 
        ? intval($_POST["Customer_ID_$i"]) 
        : $Location_ID0;
        $Total = $_POST["Total_$i"] ?? null;
        $TotalAmount += $Total;
        $Note = $_POST["Note_$i"] ?? null;
        $Amount_Recieved = !empty($_POST["Amount_Received_$i"]) && is_numeric($_POST["Amount_Received_$i"])
    ? floatval($_POST["Amount_Received_$i"])
    : 0.00; // Default to 0.00 if not provided

    
        // Prepared statement to avoid SQL injection
        $sql = "INSERT INTO sales (Inventory_ID, Sale_Date, Quantity, Discount, Price, Cut_ID, Customer_ID, Total_Price, Amount_Received, Note) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connect, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "isididdiis", $Inventory_ID, $Date, $Quantity, $Discount, $Price, $Employee_Cut, $Customer_ID, $Total, $Amount_Recieved, $Note);
            if (mysqli_stmt_execute($stmt)) {
                echo "Record has been inserted";
            } else {
                echo "Failed to insert record: " . mysqli_error($connect);
            }
        } else {
            echo "Failed to prepare SQL statement: " . mysqli_error($connect);
        }
    }
    

   /* $query = "select * from sales_bill where SaleDate = '$Date0' and CustomerShop = (select customer_shop from customer where customer_id = $Location_ID0)";
    try{$res = mysqli_query($connect, $query);
    }catch(mysqli_sql_exception){
        echo 'Count not connect';
    }

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' border-collapse=collapse id='tblreport'>";
        echo "<tr>
                    <th>Drug Name</th><th>Expiration</th><th>Price</th><th>Quantity</th>
                    <th>Sale Date</th><th>Discount</th><th>Total Price</th><th>Amount Received</th>
                    <th>Notes</th><th>Shop Name</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['DrugName'] . "</td>";
            echo "<td>" . $r['Expiration'] . "</td>";
            echo "<td>" . $r['Price'] . "</td>";
            echo "<td>" . $r['Quantity'] . "</td>";
            echo "<td>" . $r['SaleDate'] . "</td>";
            echo "<td>" . $r['Discount'] . "</td>";
            echo "<td>" . $r['TotalPrice'] . "</td>";
            echo "<td>" . $r['AmountReceived'] . "</td>";
            echo "<td>" . $r['Notes'] . "</td>";
            echo "<td>" . $r['CustomerShop'] . "</td>";
            echo "</tr>";

        }
    } else {
        echo "No records found.";  
    }

    echo "<tr>";
    echo "<td>" . 'Total Amount' . "</td>";
    echo "<td>" . $TotalAmount . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . 'Amount Recieved' . "</td>";
    echo "<td>" . $Amount_Recieved . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . 'Owed Amount' . "</td>";
    echo "<td>" . $TotalAmount - $Amount_Recieved . "</td>";
    echo "</tr>";
    echo "</table>";

*/

                echo '            <div id="bottom">
                            <div class="bott">
                                <h3>Abdul Bashir Arsine</h3>
                            </div>
                            <div class="bott">
                                <h3>Ali Sina Nazari</h3>

                            </div>
                            <div class="bott">
                                <h3>...</h3>


                            </div>
                        </div>



                    </div>
                </body>
            </html>';



?>

