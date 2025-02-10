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
$sql = "SELECT * FROM invoice WHERE 
        invoice_id LIKE '%$query%' OR 
        customer_shop LIKE '%$query%' OR 
        sales_officer LIKE '%$query%' OR 
        date LIKE '%$query%' OR 
        owed LIKE '%$query%'";

$res = mysqli_query($connect, $sql);

// Check if any results were found
if ($res && mysqli_num_rows($res) > 0) {
    echo "<table border='1' id='tblreport'>";
    echo "<tr>
            <th data-key='invoice_id'>Invoice ID</th>
            <th data-key='customer_id'>Customer ID</th>
            <th data-key='shop'>Shop</th>
            <th data-key='date'>Date</th>
            <th data-key='received'>Received</th>
            <th data-key='owed'>Owed</th>
            <th data-key='sales_officer'>Sales Officer</th>
            <th data-key='note'>Note</th>
            <th data-key='total_sales'>Total sales</th>
            <th data-key='sales_data'>Sales Data</th>
            </tr>";
    while ($r = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . $r['invoice_id'] . "</td>";
        echo "<td>" . $r['customer_id'] . "</td>";
        echo "<td>" . $r['customer_shop'] . "</td>";
        echo "<td>" . $r['date'] . "</td>";
        echo "<td>" . $r['received'] . "</td>";
        echo "<td>" . $r['owed'] . "</td>";
        echo "<td>" . $r['sales_officer'] . "</td>";
        echo "<td>" . $r['note'] . "</td>";
        echo "<td>" . $r['total_sales'] . "</td>";
        echo "<td id='sales_data'>" . $r['sales_data'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='color: red; width: 150px; margin: auto; margin-bottom:20px;'>No records found.</p>";  
}
?>
