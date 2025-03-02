<?php
require_once "connection.php"; // Ensure your DB connection is included

if (isset($_GET['customer_shop'])) {
    $customer_shop = $_GET['customer_shop'];

    $stmt = $connect->prepare("SELECT balance FROM customer WHERE customer_shop = ?");
    $stmt->bind_param("s", $customer_shop);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode(["balance" => $row["balance"]]);
    } else {
        echo json_encode(["error" => "Customer not found"]);
    }

    $stmt->close();
    $connect->close();
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>
