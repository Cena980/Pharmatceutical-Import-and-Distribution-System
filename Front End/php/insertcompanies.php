<?php
// Include the database connection file
require 'connection.php';

// Check if the database connection is successful
if (!$connect) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get and sanitize input data
$Comp_Name = trim($_POST['Comp_Name'] ?? '');
$Head_Quarters = trim($_POST['Head_Quarters'] ?? '');
$Phone = trim($_POST['Phone'] ?? '');
$Email = trim($_POST['Email'] ?? '');

// Validate inputs
if (empty($Comp_Name)) {
    die("Company Name is required.");
}
if (empty($Head_Quarters)) {
    die("Headquarters is required.");
}
if (!preg_match('/^\d{10,15}$/', $Phone)) { // Example: 10-15 digits
    die("Invalid phone number.");
}
if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// Prepare the SQL query
$sql = "INSERT INTO companies (Comp_Name, Head_Quarters, Phone, Email) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($connect, $sql);

if ($stmt) {
    // Bind parameters to the query
    mysqli_stmt_bind_param($stmt, "ssss", $Comp_Name, $Head_Quarters, $Phone, $Email);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        echo "Record has been inserted";
    } else {
        error_log("SQL Error: " . mysqli_stmt_error($stmt)); // Log the error
        echo "Failed: " . mysqli_stmt_error($stmt); // Display the error
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Failed to prepare statement: " . mysqli_error($connect);
}

// Close the database connection
mysqli_close($connect);
?>