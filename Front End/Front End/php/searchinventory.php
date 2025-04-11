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
        price LIKE '%$query%' order by drug_name";

$res = mysqli_query($connect, $sql);

$num_rows = mysqli_num_rows($res);
if($num_rows>0){
    echo "<div class='alerts' style='margin-bottom:10px;'>". $num_rows. " Records</div>";
    echo "<table border='1' id='tblreport'>";
    echo "<tr>
                <th>ID</th><th>Drug ID</th><th>Name</th><th>Expiration</th><th>Cost</th>
                <th>Price</th><th>Initial Amount</th><th>Amount Left</th><th data-key='actions' colspan='2'>Actions</th>
            </tr>";
    while ($r = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . $r['inventory_id'] . "</td>";
        echo "<td>" . $r['drug_id'] . "</td>";
        echo "<td>" . $r['drug_name'] . "</td>";
        echo "<td>" . $r['expiration'] . "</td>";
        echo "<td>" . $r['cost'] . "</td>";
        echo "<td>" . $r['price'] . "</td>";
        echo "<td>" . $r['initial_amount'] . "</td>";
        echo "<td>" . $r['amount_left'] . "</td>";
        echo "<td>
            <form action='updateinventory.php' method='GET'>
                <input type='hidden' name='Inventory_ID' value='" . $r['inventory_id'] . "'>
                <input type='hidden' name='Drug_ID' value='" . $r['drug_id'] . "'>
                <input type='hidden' name='Expiration' value='" . $r['expiration'] . "'>
                <input type='hidden' name='Cost' value='" . $r['cost'] . "'>
                <input type='hidden' name='Price' value='" . $r['price'] . "'>
                <input type='hidden' name='Initial_Amount' value='" . $r['initial_amount'] . "'>
                <input type='hidden' name='Amount_Left' value='" . $r['amount_left'] . "'>
                <button type='submit' class=' btn-link'>Update</button>
            </form>
            </td>";
            echo "<td>
            <form action='updateinventory.php' method='GET'>
                <input type='hidden' name='Inventory_ID' value='" . $r['inventory_id'] . "'>
                <input type='hidden' name='Drug_ID' value='" . $r['drug_id'] . "'>
                <input type='hidden' name='Expiration' value='" . $r['expiration'] . "'>
                <input type='hidden' name='Cost' value='" . $r['cost'] . "'>
                <input type='hidden' name='Price' value='" . $r['price'] . "'>
                <input type='hidden' name='Initial_Amount' value='" . $r['initial_amount'] . "'>
                <input type='hidden' name='Amount_Left' value='" . $r['amount_left'] . "'>
                <button type='submit' class=' btn-link'>Delete</button>
            </form>
          </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";  
}
?>
