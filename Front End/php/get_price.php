<?php
require_once __DIR__ . '/../php/connection.php'; // Ensure the correct path to connection.php

if (!$connect) {
    die(json_encode(['error' => 'Database connection failed']));
}

if (isset($_GET['Drug_Name']) && isset($_GET['Amount'])) {
    $drug_name = $_GET['Drug_Name'];
    $amount = $_GET['Amount'];

    // SQL query to fetch price based on drug name and amount left
    $query = "
        SELECT i.price 
        FROM inventory i
        JOIN drugs d ON i.drug_id = d.Drug_ID
        WHERE d.Drug_Name = ? AND i.Amount_Left = ?
    ";

    $stmt = $connect->prepare($query);

    if (!$stmt) {
        echo json_encode(['error' => 'Failed to prepare statement']);
        exit;
    }

    // Bind both parameters (drug name and amount)
    $stmt->bind_param("si", $drug_name, $amount); // "s" for string, "i" for integer

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['price' => $row['price']]);
    } else {
        echo json_encode(['error' => 'No matching record found']);
    }
} else {
    echo json_encode(['error' => 'Invalid input']);
}
?>
