<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set the response content type to JSON
header('Content-Type: application/json');

// Include the database connection file
require_once __DIR__ . '/../php/connection.php';

// Check if the database connection was successful
if (!$connect) {
    die(json_encode(['error' => 'Database connection failed: ' . mysqli_connect_error()]));
}

// Check if the 'query' parameter is set
if (isset($_GET['query'])) {
    // Sanitize the input
    $query = "%" . htmlspecialchars($_GET['query']) . "%";
    
    // SQL query to get drug types
    $sql = "
        SELECT Drug_Type 
        FROM drug_type
        WHERE Drug_Type LIKE ?
    ";
    
    // Prepare the SQL statement
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        echo json_encode(['error' => 'Failed to prepare statement: ' . $connect->error]);
        exit;
    }

    // Bind the parameter and execute the query
    $stmt->bind_param("s", $query);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the results and store them in an array
    $suggestions = [];
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = [
            'Type_Name' => $row['Drug_Type'], // Use 'Drug_Type' instead of 'Type_Name'
        ];
    }

    // Output the suggestions as JSON
    echo json_encode($suggestions);
} else {
    // Output an error if no input is provided
    echo json_encode(['error' => 'No input provided']);
}

// Close the database connection
$stmt->close();
$connect->close();
?>