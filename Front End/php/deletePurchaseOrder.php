<?php
include 'connection.php';

// Start transaction
mysqli_begin_transaction($connect);

try {
    $purchaseOrderID = isset($_POST['po_id']) ? intval($_POST['po_id']) : null;
    if (!$purchaseOrderID) throw new Exception("Missing purchase order ID");

    // 1. Fetch original purchase data
    $purchase_query = "SELECT * FROM purchases WHERE po_id = ?";
    $stmt = $connect->prepare($purchase_query);
    $stmt->bind_param("i", $purchaseOrderID);
    $stmt->execute();
    $purchases = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    if (empty($purchases)) throw new Exception("No purchase records found");

    // 2. Reverse the inventory
    foreach ($purchases as $purchase) {
        $drugID = $purchase['drug_id'];
        $quantity = $purchase['quantity'];

        $update_inventory = "UPDATE inventory SET Amount_Left = Amount_Left - ? WHERE drug_id = ?";
        $stmt = $connect->prepare($update_inventory);
        $stmt->bind_param("ii", $quantity, $drugID);
        if (!$stmt->execute()) {
            throw new Exception("Failed to update inventory for Drug_ID $drugID");
        }
    }

    // 3. Delete purchases
    $delete_purchases = "DELETE FROM purchases WHERE po_id = ?";
    $stmt = $connect->prepare($delete_purchases);
    $stmt->bind_param("i", $purchaseOrderID);
    if (!$stmt->execute()) {
        throw new Exception("Failed to delete purchases");
    }

    // 4. Delete purchase order
    $delete_po = "DELETE FROM `purchase order` WHERE po_id = ?";
    $stmt = $connect->prepare($delete_po);
    $stmt->bind_param("i", $purchaseOrderID);
    if (!$stmt->execute()) {
        throw new Exception("Failed to delete purchase order");
    }

    // Commit transaction
    mysqli_commit($connect);

    echo "<div class='alerts'>Purchase order deleted successfully!</div>";

} catch (Exception $e) {
    mysqli_rollback($connect);
    echo "<div class='alerts'>Error: " . $e->getMessage() . "</div>";
}
?>
