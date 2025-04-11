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
$sql = "SELECT * FROM purchase_report WHERE
        drug_name LIKE '%$query%' OR
        vendor_name LIKE '%$query%' OR
        purchase_date LIKE '%$query%' OR
        po_id LIKE '%$query%'";

$res = mysqli_query($connect, $sql);

// Check if any results were found
if ($res && mysqli_num_rows($res) > 0) {
    echo "<table border='1' id='tblreport'>";
    echo "<tr>
                <th>Purchase ID</th><th>Vendor Name</th><th>Drug Name</th><th>price</th><th>Quantity</th><th>Discount</th>
                <th>Purchase Date</th><th>Total Amount</th><th>Purcahse Order</th>
            </tr>";
    while ($r = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($r['purchase_ID']) . "</td>";
        echo "<td>" . htmlspecialchars($r['Vendor_Name']) . "</td>";
        echo "<td>" . htmlspecialchars($r['Drug_Name']) . "</td>";
        echo "<td>" . htmlspecialchars($r['price']) . "</td>";
        echo "<td>" . htmlspecialchars($r['quantity']) . "</td>";
        echo "<td>" . htmlspecialchars($r['discount']) . "</td>";
        echo "<td>" . htmlspecialchars($r['purchase_date']) . "</td>";
        echo "<td>" . htmlspecialchars($r['total_amount']) . "</td>";
        echo "<td>" . htmlspecialchars($r['po_id']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='color: red; width: 150px; margin: auto; margin-bottom:20px;'>No records found.</p>";  
}
?>
