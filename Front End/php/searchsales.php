<?php
include 'connection.php';

// Check if the query parameter is set and sanitize it
if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($connect, $_GET['query']); // Escape special characters for SQL
} else {
    echo "No search term provided.";
    exit;
}

// Prepare the SQL query
$sql = "SELECT * FROM sales_bill WHERE 
        name LIKE '%$query%' OR 
        Invoice_No LIKE '%$query%' OR 
        Date LIKE '%$query%' OR 
        Customer_Shop LIKE '%$query%'";

$res = mysqli_query($connect, $sql);

// Check if any results were found
if ($res && mysqli_num_rows($res) > 0) {
    echo "<table border='1' id='tblreport'>";
    echo "<tr>
                <th>Type</th><th>Name</th><th>Quantity</th><th>Price</th>
                <th>Discount</th><th>Total_Price</th><th>Invoice_No</th><th>Date</th>
                <th>Customer_Shop</th><th>Balance</th>
            </tr>";
    while ($r = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($r['Type']) . "</td>";
        echo "<td>" . htmlspecialchars($r['Name']) . "</td>";
        echo "<td>" . htmlspecialchars($r['Quantity']) . "</td>";
        echo "<td>" . htmlspecialchars($r['Price']) . "</td>";
        echo "<td>" . htmlspecialchars($r['Discount']) . "</td>";
        echo "<td>" . htmlspecialchars($r['Total_Price']) . "</td>";
        echo "<td>" . htmlspecialchars($r['Invoice_No']) . "</td>";
        echo "<td>" . htmlspecialchars($r['Date']) . "</td>";
        echo "<td>" . htmlspecialchars($r['Customer_Shop']) . "</td>";
        echo "<td>" . htmlspecialchars($r['Balance']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='color: red; width: 150px; margin: auto; margin-bottom:20px;'>No records found.</p>";  
}
?>
