<?php
    include 'connection.php';

    $receipt_ID = $_POST['receipt'];
    $customerID = $_POST['Customer_Shop_1'];
    $Balance = $_POST['customer_balance_1'];

    // Retrieve current balance before deletion
    $sql = "SELECT balance FROM customer WHERE customer_id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $customerID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_balance = $row['balance'];

        // Delete the receipt record
        $sql = "DELETE FROM receipt WHERE receipt_id = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("i", $receipt_ID);

        if ($stmt->execute()) {
            echo "Record has been deleted.<br>";

            // Update customer balance after deletion
            $new_balance = $Balance; // Adjust balance
            $sql = "UPDATE customer SET balance = ? WHERE customer_id = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("di", $new_balance, $customerID);

            if ($stmt->execute()) {
                echo "New Balance is: $new_balance";
            } else {
                echo "Balance update failed: " . $stmt->error;
            }
        } else {
            echo "Failed to delete record: " . $stmt->error;
        }
    } else {
        echo "Customer not found.";
    }

    // Close statement & connection
    $stmt->close();
    $connect->close();
?>
