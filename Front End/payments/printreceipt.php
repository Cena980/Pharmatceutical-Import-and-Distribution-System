<?php
// Include database connection
require '../php/connection.php';

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


    $receipt_ID = isset($_GET['receipt_id']) ? $_GET['receipt_id'] : '';
    $customerID = isset($_GET['customer_id']) ? $_GET['customer_id'] : '';
    $old_balance = isset($_GET['old_balance']) ? $_GET['old_balance'] : '';
    $notes = isset($_GET['notes']) ? $_GET['notes'] : '';
    $date = isset($_GET['payment_date']) ? $_GET['payment_date'] : '';
    $payment_amount = isset($_GET['payment_amount']) ? $_GET['payment_amount'] : '';
    $currency_code = isset($_GET['currency_id']) ? $_GET['currency_id'] : '';
    $conversion_rate = isset($_GET['conversion_rate']) ? $_GET['conversion_rate'] : '';
    $sales_officer = isset($_GET['recorded_by']) ? $_GET['recorded_by'] : '';

    // Convert date format to dd/mm/yyyy (if needed)
    if (!empty($payment_date)) {
        $dateObj = DateTime::createFromFormat('Y-m-d', $payment_date);
        if ($dateObj) {
            $payment_date = $dateObj->format('d/m/Y');
        }
    }

    if (!empty($customerID)) { // Check if input is not empty
        $customer_name = "SELECT balance, customer_shop, customer_name, address FROM customer WHERE customer_id = '$customerID'";
        $customer_name_results = mysqli_query($connect, $customer_name);
        
        if ($customer_name_results && mysqli_num_rows($customer_name_results) > 0) {
            $customer_name_row = mysqli_fetch_assoc($customer_name_results);
            $customerName = $customer_name_row['customer_name'];
            $customer_shop = $customer_name_row['customer_shop'];
            $customerAddress = $customer_name_row['address'];
            $Balance_Current = $customer_name_row['balance'];
        } else {
            $customerName= ""; // Set a default value if the query fails
            $customerAddress= "";
            $Balance_Current = 0;
            $customer_shop= "";
        }
    } else {
        $customerName = ""; // Set a default value if input is empty
        $customerAddress= "";
        $Balance_Current = 0;
        $customer_shop= "";
    }


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
                                <td>$sales_officer</td>
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
                    echo "<td>" . $payment_amount . "</td>";
                    echo "<td>" . $old_balance . "</td>";
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