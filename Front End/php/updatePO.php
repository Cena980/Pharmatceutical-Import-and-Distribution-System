<?php
// update_purchase.php
// This script updates an existing purchase order inside a transaction for reversibility

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

require 'connection.php';
// Turn on exceptions for mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $connect->begin_transaction();

    // Get inputs
    $order_id    = isset($_POST['po_id']) ? intval($_POST['po_id']) : null;
    $qnt         = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    $date        = $_POST['Date_1'] ?? null;
    $amount_paid = isset($_POST['amount_paid_1']) && is_numeric($_POST['amount_paid_1']) ? floatval($_POST['amount_paid_1']) : 0;
    $order_by    = $_POST['order_by'] ?? '';
    $Vendor_Name = $_POST['vendor'] ?? null;
    

    if (!$order_id) {
        throw new Exception('No purchase order specified.');
    }

    // Vendor details
    $Vendor_Name_sql = "SELECT vendor_id, address, phone_number, Debt FROM vendors WHERE name = ?";
    $stmt = $connect->prepare($Vendor_Name_sql);
    $stmt->bind_param('s', $Vendor_Name);
    $stmt->execute();
    $ven = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if (!$ven) {
        throw new Exception('Invalid vendor.');
    }
    $vendor_id      = $ven['vendor_id'];
    $ven_add        = $ven['address'];
    $ven_phone      = $ven['phone_number'];
    $vendor_debt_O  = $ven['Debt'];


    // PO details
    $po_sql = "SELECT Total_amount, Amount_paid, Remaining_Debt FROM `purchase order` WHERE po_id = ?";
    $stmt = $connect->prepare($po_sql);
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $ven = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if (!$ven) {
        throw new Exception('Invalid Purchase Order.');
    }
    $po_debt      = $ven['Remaining_Debt'];
    $po_paid        = $ven['Amount_paid'];
    $po_total      = $ven['Total_amount'];


    $vendor_debt_prev = $vendor_debt_O - $po_debt;

    // Fetch old purchases
    $old_sql = "SELECT drug_id, quantity, total_amount FROM purchases WHERE po_id = ?";
    $stmt = $connect->prepare($old_sql);
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $old_purchases = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    // Reverse inventory
    $inv_rev_sql = "UPDATE inventory SET Amount_Left = Amount_Left - ? WHERE drug_id = ?";
    $inv_stmt = $connect->prepare($inv_rev_sql);
    foreach ($old_purchases as $old) {
        $inv_stmt->bind_param('ii', $old['quantity'], $old['drug_id']);
        $inv_stmt->execute();
    }
    $inv_stmt->close();

    // Delete old records
    $del_sql = "DELETE FROM purchases WHERE po_id = ?";
    $stmt = $connect->prepare($del_sql);
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $stmt->close();

    // Insert new and update inventory
    $total_purchase = 0;
    $insert_sql = "INSERT into purchases (vendor_id, drug_id, Expiration, quantity, price, Discount, selling_price, purchase_date, total_amount, po_id)
                   values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $ins = $connect->prepare($insert_sql);
    $inv_add_sql = "UPDATE inventory SET Amount_Left = Amount_Left + ? WHERE drug_id = ?";
    $inv_add = $connect->prepare($inv_add_sql);

    for ($i = 1; $i <= $qnt; $i++) {
        $Drug_Name = $_POST["drug_name_$i"] ?? null;
        $drug_id_sql = "SELECT Drug_ID FROM drugs WHERE Drug_Name = ?";
        $dstmt = $connect->prepare($drug_id_sql);
        $dstmt->bind_param('s', $Drug_Name);
        $dstmt->execute();
        $drow = $dstmt->get_result()->fetch_assoc();
        $dstmt->close();
        if (!$drow) throw new Exception("Drug not found: $Drug_Name");
        $drug_id       = $drow['Drug_ID'];
        $price         = floatval($_POST["price_$i"]);
        $quantity      = intval($_POST["quantity_$i"]);
        $discount      = floatval($_POST["discount_$i"] ?? 0);
        $selling_price = floatval($_POST["selling_price_$i"] ?? 0);
        $expiration    = $_POST["expiration_$i"] ?? date("Y-m");
        $total_amount  = floatval($_POST["total_$i"]);
        if (!$quantity || !$price || !$total_amount) {
            throw new Exception("Missing data on line $i");
        }
        $ins->bind_param('iisidddssi', $vendor_id, $drug_id, $expiration, $quantity, $price, $discount, $selling_price, $date, $total_amount, $order_id);
        $ins->execute();
        $inv_add->bind_param('ii', $quantity, $drug_id);
        $inv_add->execute();
        $total_purchase += $total_amount;
    }
    $ins->close();
    $inv_add->close();

    // Update order
    $po_sql = "UPDATE `purchase order` SET po_date=?, ordered_by=?, Total_amount=?, Amount_Paid=? WHERE po_id=?";
    $pstmt = $connect->prepare($po_sql);
    $pstmt->bind_param('ssdii', $date, $order_by, $total_purchase, $amount_paid, $order_id);
    $pstmt->execute();
    $pstmt->close();

    // Update vendor debt
    $Remaining_Debt_F = ($total_purchase - $amount_paid) + $vendor_debt_prev;
    $vsql = "UPDATE vendors SET Debt=? WHERE vendor_id=?";
    $vstmt = $connect->prepare($vsql);
    $vstmt->bind_param('di', $Remaining_Debt_F, $vendor_id);
    $vstmt->execute();
    $vstmt->close();

    $connect->commit();

} catch (Exception $e) {
    if ($connect->in_transaction) $connect->rollback();
    echo "<div class='alerts'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
    exit;
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
                    echo "<td>" . $vendor_debt_prev . "</td>";
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
