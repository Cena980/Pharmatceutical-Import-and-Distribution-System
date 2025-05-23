<?php
require_once __DIR__ . '/../php/connection.php'; // Ensure the correct path to connection.php

if (!$connect) {
    die(json_encode(['error' => 'Database connection failed']));
}

if (isset($_GET['query'])) {
    $query = "%" . $_GET['query'] . "%";
    
    // SQL query to join drugs and inventory tables
    $sql = "
        SELECT drug_name, type, company, cost
        FROM drugs_view
        WHERE drug_name LIKE ? OR ingredient LIKE ?
    ";
    
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        echo json_encode(['error' => 'Failed to prepare statement']);
        exit;
    }

    $stmt->bind_param("ss", $query, $query);
    $stmt->execute();
    $result = $stmt->get_result();

    $suggestions = [];
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = [
            'Drug_Name' => $row['drug_name'],
            'Type' => $row['type'],
            'Company' => $row['company'],
            'cost' => $row['cost']
        ];
    }

    echo json_encode($suggestions);
} else {
    echo json_encode(['error' => 'No input provided']);
}
?>
