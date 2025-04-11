<?php
include 'connection.php';

// Get today's date and calculate dates for 3 months and 6 months from now
$today = date('Y-m-d');
$three_months_later = date('Y-m-d', strtotime('+3 months'));
$six_months_later = date('Y-m-d', strtotime('+6 months'));

// Query to fetch inventory items that need alerts
$query = "
    SELECT * 
    FROM view_inventory 
    WHERE amount_left < 20 
       OR DATE(CONCAT(expiration, '-01')) BETWEEN '$today' AND '$six_months_later'
";
//echo "Query: " . $query . "<br>"; // Debugging line

$res = mysqli_query($connect, $query);

if (!$res) {
    die("Query failed: " . mysqli_error($connect)); // Debugging line
}

$num_rows = mysqli_num_rows($res);
echo "<div class='alerts'>Number of Refill: " . $num_rows . "</div>"; // Debugging line

if ($num_rows > 0) {
    echo "<table border='1' id='tblrefill'>";
    echo "<tr>
            <th>Inventory ID</th>
            <th>Drug ID</th>
            <th>Drug Name</th>
            <th>Expiration</th>
            <th>Initial Amount</th>
            <th>Amount Left</th>
            <th>Alert Type</th>
          </tr>";

    while ($r = mysqli_fetch_assoc($res)) {
        $alert_type = [];
        $row_class = "";

        // Check for low stock
        if (isset($r['amount_left']) && $r['amount_left'] < 20) {
            $alert_type[] = "Low Stock";
            $row_class = "low-stock-row"; // Apply low stock styling
        }

        // Check for expiration alerts
        if (isset($r['expiration'])) {
            if ($r['expiration'] <= $six_months_later) {
                if ($r['expiration'] <= $three_months_later) {
                    $alert_type[] = "Expiration Warning (3 months)";
                    $row_class = "warning-row"; // Apply warning styling
                } else {
                    $alert_type[] = "Expiration Alert (6 months)";
                    $row_class = "alert-row"; // Apply alert styling
                }
            }
        }

        // Display the row with alert types and dynamic class
        echo "<tr class='$row_class'>";
        echo "<td>" . (isset($r['inventory_id']) ? $r['inventory_id'] : 'N/A') . "</td>";
        echo "<td>" . (isset($r['drug_id']) ? $r['drug_id'] : 'N/A') . "</td>";
        echo "<td>" . (isset($r['drug_name']) ? $r['drug_name'] : 'N/A') . "</td>";
        echo "<td>" . (isset($r['expiration']) ? $r['expiration'] : 'N/A') . "</td>";
        echo "<td>" . (isset($r['initial_amount']) ? $r['initial_amount'] : 'N/A') . "</td>";
        echo "<td>" . (isset($r['amount_left']) ? $r['amount_left'] : 'N/A') . "</td>";
        echo "<td>" . implode(", ", $alert_type) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}
?>