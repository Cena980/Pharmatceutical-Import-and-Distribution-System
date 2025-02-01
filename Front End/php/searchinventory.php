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
$sql = "SELECT * FROM view_inventory WHERE 
        drug_name LIKE '%$query%' OR 
        expiration LIKE '%$query%' OR 
        cost LIKE '%$query%' OR 
        price LIKE '%$query%'";

$res = mysqli_query($connect, $sql);

$num_rows = mysqli_num_rows($res);
if($num_rows>0){
    echo "<div class='alerts' style='margin-bottom:10px;'>". $num_rows. " Records</div>";
    echo "<table border='1' id='tblreport'>";
    echo "<tr>
                <th>ID</th><th>Drug ID</th><th>Name</th><th>Expiration</th><th>Cost</th>
                <th>Price</th><th>Amount</th>
            </tr>";
    while ($r = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . $r['inventory_id'] . "</td>";
        echo "<td>" . $r['drug_id'] . "</td>";
        echo "<td>" . $r['drug_name'] . "</td>";
        echo "<td>" . $r['expiration'] . "</td>";
        echo "<td>" . $r['cost'] . "</td>";
        echo "<td>" . $r['price'] . "</td>";
        echo "<td>" . $r['amount_left'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";  
}
?>
