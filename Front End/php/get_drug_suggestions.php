<?php
require_once __DIR__ . '/../php/connection.php'; // Ensure the correct path to connection.php

if (!$connect) {
    die(json_encode(['error' => 'Database connection failed']));
}

if (isset($_GET['query'])) {
    $query = "%" . $_GET['query'] . "%";
    
    // SQL query to join drugs and inventory tables
    $sql = "
        SELECT d.Drug_Name, i.Expiration_Date, i.Amount 
        FROM inventory i
        INNER JOIN drugs d ON i.drug_id = d.id
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
            'Expiration_Date' => $row['Expiration_Date'],
            'Amount' => $row['Amount']
        ];
    }

    echo json_encode($suggestions);
} else {
    echo json_encode(['error' => 'No input provided']);
}
?>
