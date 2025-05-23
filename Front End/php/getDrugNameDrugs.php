<?php
// getDrugName.php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the connection file
require_once 'connection.php';

// Get inventory_id from the request
if (isset($_GET['drug_id'])) {
    $drug_id = $_GET['drug_id'];

    // Query to fetch drug name
    $sql = "SELECT Drug_Name
            FROM  drugs
            WHERE Drug_ID = ?";
    $stmt = $connect->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $drug_id);
        $stmt->execute();
        $stmt->bind_result($drug_name);

        if ($stmt->fetch()) {
            // Return the drug name as JSON
            echo json_encode(['drug_name' => $drug_name]);
        } else {
            // Handle case where inventory_id is not found
            echo json_encode(['error' => 'Drug not found']);
        }

        $stmt->close();
    } else {
        // Handle SQL preparation error
        echo json_encode(['error' => 'Failed to prepare statement']);
    }
} else {
    // Handle missing inventory_id
    echo json_encode(['error' => 'inventory_id not provided']);
}

// Close the connection
$connect->close();
?>