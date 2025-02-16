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
            <th data-key='actions' colspan='3'>Actions</th>
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
        echo "<td>
                <form action='updateinvoice.php' method='GET'>
                    <input type='hidden' name='invoice_id' value='" . $r['invoice_id'] . "'>
                    <input type='hidden' name='customer_id' value='" . $r['customer_id'] . "'>
                    <input type='hidden' name='shop' value='" . $r['customer_shop'] . "'>
                    <input type='hidden' name='date' value='" . $r['date'] . "'>
                    <input type='hidden' name='received' value='" . $r['received'] . "'>
                    <input type='hidden' name='owed' value='" . $r['owed'] . "'>
                    <input type='hidden' name='sales_officer' value='" . $r['sales_officer'] . "'>
                    <input type='hidden' name='note' value='" . $r['note'] . "'>
                    <input type='hidden' name='total_sales' value='" . $r['total_sales'] . "'>
                    <input type='hidden' name='sales_data' value='" . $r['sales_data'] . "'>
                    <button type='submit' class=' btn-link'>Update</button>
                </form>
            </td>
            <td>
                <form action='updateinvoice.php' method='GET'>
                    <input type='hidden' name='invoice_id' value='" . $r['invoice_id'] . "'>
                    <input type='hidden' name='customer_id' value='" . $r['customer_id'] . "'>
                    <input type='hidden' name='shop' value='" . $r['customer_shop'] . "'>
                    <input type='hidden' name='date' value='" . $r['date'] . "'>
                    <input type='hidden' name='received' value='" . $r['received'] . "'>
                    <input type='hidden' name='owed' value='" . $r['owed'] . "'>
                    <input type='hidden' name='sales_officer' value='" . $r['sales_officer'] . "'>
                    <input type='hidden' name='note' value='" . $r['note'] . "'>
                    <input type='hidden' name='total_sales' value='" . $r['total_sales'] . "'>
                    <input type='hidden' name='sales_data' value='" . $r['sales_data'] . "'>
                    <button type='submit' class=' btn-link'>Delete</button>
                </form>
              </td>
              <td>
              <form action='printinvoice.php' method='GET'>
                  <input type='hidden' name='invoice_id' value='" . $r['invoice_id'] . "'>
                  <input type='hidden' name='customer_id' value='" . $r['customer_id'] . "'>
                  <input type='hidden' name='shop' value='" . $r['customer_shop'] . "'>
                  <input type='hidden' name='date' value='" . $r['date'] . "'>
                  <input type='hidden' name='received' value='" . $r['received'] . "'>
                  <input type='hidden' name='owed' value='" . $r['owed'] . "'>
                  <input type='hidden' name='sales_officer' value='" . $r['sales_officer'] . "'>
                  <input type='hidden' name='note' value='" . $r['note'] . "'>
                  <input type='hidden' name='total_sales' value='" . $r['total_sales'] . "'>
                  <input type='hidden' name='sales_data' value='" . $r['sales_data'] . "'>
                  <button type='submit' class=' btn-link'>Print</button>
              </form>
            </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='color: red; width: 150px; margin: auto; margin-bottom:20px;'>No records found.</p>";  
}
?>
