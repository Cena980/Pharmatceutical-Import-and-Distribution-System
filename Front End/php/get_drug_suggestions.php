<?php
require_once __DIR__ . '/../php/connection.php'; // Ensure the correct path to connection.php

if (!$connect) {
    die(json_encode(['error' => 'Database connection failed']));
}

if (isset($_GET['query'])) {
    $query = "%" . $_GET['query'] . "%";
    
    // SQL query to join drugs and inventory tables
    $sql = "
        SELECT d.Drug_Name, i.Expiration, i.Initial_Amount 
        FROM inventory i
        INNER JOIN drugs d ON i.Drug_ID = d.Drug_ID
        WHERE d.Drug_Name LIKE ?
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
            'Drug_Name' => $row['Drug_Name'],
            'Expiration_Date' => $row['Expiration'],
            'Amount' => $row['Initial_Amount']
        ];
    }

    echo json_encode($suggestions);
} else {
    echo json_encode(['error' => 'No input provided']);
}
?>
