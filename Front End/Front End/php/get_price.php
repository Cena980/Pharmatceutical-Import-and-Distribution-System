<?php
require_once __DIR__ . '/../php/connection.php'; // Ensure the correct path to connection.php

if (!$connect) {
    die(json_encode(['error' => 'Database connection failed']));
}

if (isset($_GET['Drug_Name'])) {
    $drug_name = $_GET['Drug_Name'];
    $query = "
        SELECT i.price 
        FROM inventory i
        JOIN drugs d ON i.drug_id = d.Drug_ID
        WHERE d.Drug_Name = ?
    ";
    $stmt = $connect->prepare($query);

    if (!$stmt) {
        echo json_encode(['error' => 'Failed to prepare statement']);
        exit;
    }

    $stmt->bind_param("s", $drug_name);
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
