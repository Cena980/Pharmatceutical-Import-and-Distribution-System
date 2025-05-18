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

// Enable mysqli exceptions
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


try {
    $connect->begin_transaction();

    $po_id = isset($_POST['po_id']) ? intval($_POST['po_id']) : 0;
    if (!$po_id) {
        throw new Exception("Missing or invalid purchase order ID.");
    }

    // 1. Get vendor and debt data from PO
    $sql = "SELECT vendor_id, Total_amount, Amount_paid, Remaining_Debt FROM `purchase order` WHERE po_id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $po_id);
    $stmt->execute();
    $po_data = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$po_data) {
        throw new Exception("Purchase order not found.");
    }

    $vendor_id = $po_data['vendor_id'];
    $remaining_debt = $po_data['Remaining_Debt'];

    // 2. Reverse inventory using the purchase records
    $sql = "SELECT drug_id, quantity FROM purchases WHERE po_id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $po_id);
    $stmt->execute();
    $purchase_rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    $inv_stmt = $connect->prepare("UPDATE inventory SET Amount_Left = Amount_Left - ? WHERE drug_id = ?");
    foreach ($purchase_rows as $purchase) {
        $inv_stmt->bind_param("ii", $purchase['quantity'], $purchase['drug_id']);
        $inv_stmt->execute();
    }
    $inv_stmt->close();

    // 3. Delete purchase records
    $del_stmt = $connect->prepare("DELETE FROM purchases WHERE po_id = ?");
    $del_stmt->bind_param("i", $po_id);
    $del_stmt->execute();
    $del_stmt->close();

    // 4. Delete the PO itself
    $del_po_stmt = $connect->prepare("DELETE FROM `purchase order` WHERE po_id = ?");
    $del_po_stmt->bind_param("i", $po_id);
    $del_po_stmt->execute();
    $del_po_stmt->close();

    // 5. Update vendor debt by removing the PO's Remaining_Debt
    $update_debt_sql = "UPDATE vendors SET Debt = Debt - ? WHERE vendor_id = ?";
    $update_debt_stmt = $connect->prepare($update_debt_sql);
    $update_debt_stmt->bind_param("di", $remaining_debt, $vendor_id);
    $update_debt_stmt->execute();
    $update_debt_stmt->close();

    $connect->commit();

    echo "<div class='alerts success'>Purchase order #$po_id deleted successfully.</div>";

} catch (Exception $e) {
    if ($connect->in_transaction) $connect->rollback();
    echo "<div class='alerts error'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
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
