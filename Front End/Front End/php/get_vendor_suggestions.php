<?php
require_once __DIR__ . '/../php/connection.php'; // Ensure the correct path to connection.php

if (!$connect) {
    die(json_encode(['error' => 'Database connection failed']));
}

if (isset($_GET['query'])) {
    $query = "%" . $_GET['query'] . "%";
    
    // SQL query to get vendor names
    $sql = "
        SELECT name 
        FROM vendors
        WHERE name LIKE ?
    ";
    
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        echo json_encode(['error' => 'Failed to prepare statement']);
        exit;
    }

    $stmt->bind_param("s", $query);
    $stmt->execute();
    $result = $stmt->get_result();

    $suggestions = [];
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = [
            'Vendor_Name' => $row['name']
        ];
    }

    echo json_encode($suggestions);
} else {
    echo json_encode(['error' => 'No input provided']);
}
?>
