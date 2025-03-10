<?php
// Include database connection
require 'connection.php';

echo '<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Receipt Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
        <script src="../converter/jalaali.min.js"></script>
    </head>
    <body>';
    include '../php/header2.php';

    $Data = []; // Array to store sales data

    // Shared fields
    $date = $_POST['Date_1'] ?? null;

    // Handle foreign keys explicitly
    //Getting Customer ID
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


    //Getting Currency ID
    $currency_code = !empty($_POST['currency']) ? $_POST['currency'] : null;
    if (!empty($customer_shop)) { // Check if input is not empty
        $currency = "SELECT currency_id FROM currency WHERE currency_code = '$currency_code'";
        $currency_result = mysqli_query($connect, $currency);
    
        if ($currency_result && mysqli_num_rows($currency_result) > 0) {
            $currency_result_row = mysqli_fetch_assoc($currency_result);
            $Currency_ID = $currency_result_row['currency_id'];
        } else {
            $Currency_ID = null; // Set a default value if the query fails
        }
    } else {
        $Currency_ID = null; // Set a default value if input is empty
    }

    //Getting Customer Name
    if (!empty($customerID)) { // Check if input is not empty
        $customer_name = "SELECT balance, customer_name, address FROM customer WHERE customer_id = '$customerID'";
        $customer_name_results = mysqli_query($connect, $customer_name);
        
        if ($customer_name_results && mysqli_num_rows($customer_name_results) > 0) {
            $customer_name_row = mysqli_fetch_assoc($customer_name_results);
            $customerName = $customer_name_row['customer_name'];
            $customerAddress = $customer_name_row['address'];
            $Balance_O = $customer_name_row['balance'];
        } else {
            $customerName= ""; // Set a default value if the query fails
            $customerAddress= "";
            $Balance_O = 0;
        }
    } else {
        $customerName = ""; // Set a default value if input is empty
        $customerAddress= "";
        $Balance_O = 0;
    }


    // Continue with other code logic
    $Amount_Received_1 = !empty($_POST["Amount_Received_1"]) && is_numeric($_POST["Amount_Received_1"]) ? floatval($_POST["Amount_Received_1"]): 0.00;
    $Conversion_rate = !empty($_POST["conversion_rate"]) && is_numeric($_POST["conversion_rate"]) ? floatval($_POST["conversion_rate"]): 1;
    $Amount_Received = $Amount_Received_1 * $Conversion_rate;
    $Sales_Officer = $_POST['Sales_Officer'] ?? null;
    $note = $_POST['note'] ?? "";

    
    //New Balance
    $Balance = $Balance_O - $Amount_Received;
    // Include in the array for insertion
    $Data[] = [
        'customer_id' => $customerID,
        'payment_amount' => $Amount_Received,
        'old_balance' => $Balance_O,
        'new_balance' => $Balance,
        'payment_date' => $date,
        'currency_id' => $Currency_ID,
        'recorded_by' => $Sales_Officer,
        'notes' => $note
    ];


    // Build bulk INSERT query
     $sql = "INSERT INTO receipt (customer_id, payment_amount, old_balance, new_balance, payment_date, currency_id, recorded_by, notes) VALUES ";
    $values = [];
    $params = [];

    foreach ($Data as $sale) {
        $values[] = "(?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array_merge($params, array_values($sale));
    }

    $sql .= implode(", ", $values);

    $stmt = $connect->prepare($sql);

    // Bind and execute
    if ($stmt->execute($params)) {
        echo "<div class='alerts'>Payment Received successfully!" ; echo "</div>";
        echo "<div class='alerts'>رسید موفقانه ثبت گردید" ; echo "</div>";
        $receipt = "SELECT receipt_id FROM receipt WHERE customer_id = '$customerID' AND payment_date = '$date'
        AND payment_amount = '$Amount_Received' AND recorded_by = '$Sales_Officer' order by receipt_id desc";
        $receipt_results = mysqli_query($connect, $receipt);
    
        if ($receipt_results && mysqli_num_rows($receipt_results) > 0) {
            $receipt_results_row = mysqli_fetch_assoc($receipt_results);
            $receipt_ID = $receipt_results_row['receipt_id'];
        } else {
            $receipt_ID = null; // Set a default value if the query fails
        }
    } else {
        echo "<div class='alerts'>Error: " . $stmt->error;echo "</div>";
    }

    #update Customer Balance
    $sql = "UPDATE customer SET balance = ? WHERE customer_id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("di", $Balance, $customerID);

    if ($stmt->execute()) {
        // echo "balance updated successfully!";
        $customer_name = "SELECT balance FROM customer WHERE customer_id = '$customerID'";
        $customer_name_results = mysqli_query($connect, $customer_name);
        
        if ($customer_name_results && mysqli_num_rows($customer_name_results) > 0) {
            $customer_name_row = mysqli_fetch_assoc($customer_name_results);
            $Balance_Current = $customer_name_row['balance'];
        } else {
            $Balance_Current = 0;
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    if (!empty($receipt_ID)) {
        $message = "Thank you for choosing us—we appreciate your business and look forward to working with you again!";
        $query = "select * from receipt_view where receipt_id = '$receipt_ID'";
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
                    echo "<h1 class ='title'>RECEIPT</h1>";
                    echo "<div id='underHead'>
                                <div class='topimage'>
                                    <img src='../images/logoLarge.png'>
                                </div>
                        </div>";
                        echo "<table class='invoice-table'>";
                                    echo "<tr>
                                    <td class='no'>RECEIPT NO: </td>
                                    <td class='no'>$receipt_ID</td>
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
                                <td>$currency_code</td>
                                </tr>";
                    echo "</table>";
                echo "</div>";
    
            echo "</div>";
                echo "<table id='tblinvoice'>";
                echo "<tr>
                        <th data-key='customer_shop'>Customer</th>
                        <th data-key='old_balance'>Old Balance</th>
                        <th data-key='new_balance'>New Balance</th>
                        <th data-key='payment_date'>Date</th>
                        <th data-key='currency_code'>Currency</th>
                        <th data-key='recorded_by'>Recorded By</th>
                        </tr>";
                $rownumber = 1;
                while ($r = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $r['customer_shop'] . "</td>";
                    echo "<td>" . $r['payment_amount'] . "</td>";
                    echo "<td>" . $r['old_balance'] . "</td>";
                    echo "<td>" . $r['payment_date'] . "</td>";
                    echo "<td>" . $r['currency_code'] . "</td>";
                    echo "<td>" . $r['recorded_by'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<th colspan = '7' data-key='notes'>Notes</th>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td colspan='7'>" . $r['notes'] . "</td>";
                    echo "</tr>";
                }
        
                echo "</table>";
                echo "<table id= 'tblinvoice'>";
                    echo "<tr>";
                    echo "<th>" . 'Received:' ."</th>";
                    echo "<th>" . 'Old Balance:' ."</th>";
                    echo "<th colspan='2'>" . 'Grand Total:' ."</th>";
                    echo "</tr>";
                    echo "<td>" . $Amount_Received . "</td>";
                    echo "<td>" . $Balance_O . "</td>";
                    echo "<td>" . $Balance_Current . "</td>";
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
