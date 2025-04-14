<?php
// getDrugName.php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the connection file
require_once 'connection.php';

// Get inventory_id from the request
if (isset($_GET['vendor_id'])) {
    $vendor_id = $_GET['vendor_id'];

    // Query to fetch drug name
    $sql = "SELECT name 
            FROM vendors
            WHERE vendor_id = ?";
    $stmt = $connect->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $vendor_id);
        $stmt->execute();
        $stmt->bind_result($vendor_name);

        if ($stmt->fetch()) {
            // Return the drug name as JSON
            echo json_encode(['vendor_name' => $vendor_name]);
        } else {
            // Handle case where inventory_id is not found
            echo json_encode(['error' => 'vendor not found']);
        }

        $stmt->close();
    } else {
        // Handle SQL preparation error
        echo json_encode(['error' => 'Failed to prepare statement']);
    }
} else {
    // Handle missing inventory_id
    echo json_encode(['error' => 'vendor_id not provided']);
}

// Close the connection
$connect->close();
?>