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
        purchase_id LIKE '%$query%' OR
        Drug_Name LIKE '%$query%' OR
        vendor_name LIKE '%$query%' OR
        purchase_date LIKE '%$query%' OR
        po_id LIKE '%$query%'";

$res = mysqli_query($connect, $sql);

// Check if any results were found
if ($res && mysqli_num_rows($res) > 0) {
    echo "<table border='1' border-collapse=collapse id='tblreport'>";
        echo "<thead>
                    <th data-key='purchase-id'>Purchase ID</th>
                    <th data-key='vendor-id'>Vendor ID</th>
                    <th data-key='vendor-id'>Vendor Name</th>
                    <th data-key='drug-id'>Drug ID</th>
                    <th data-key='drug-id'>Drug Name</th>
                    <th data-key='price'>price</th>
                    <th data-key='quantity'>Quantity</th>
                    <th data-key='discount'>Discount</th>
                    <th data-key='purcahse-date'>Purchase Date</th>
                    <th data-key='expiration'>Expiration</th>
                    <th data-key='total-amount'>Total Amount</th>
                    <th data-key='purchase-order'>Purchase Order id</th>
                    <th data-key='actions' colspan='2'>Actions</th>
                </thead>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['purchase_ID'] . "</td>";
            echo "<td>" . $r['Vendor_ID'] . "</td>";
            echo "<td>" . $r['Vendor_Name'] . "</td>";
            echo "<td>" . $r['Drug_ID'] . "</td>";
            echo "<td>" . $r['Drug_Name'] . "</td>";
            echo "<td>" . $r['price'] . "</td>";
            echo "<td>" . $r['quantity'] . "</td>";
            echo "<td>" . $r['discount'] . "</td>";
            echo "<td>" . $r['purchase_date'] . "</td>";
            echo "<td>" . $r['expiration'] . "</td>";
            echo "<td>" . $r['total_amount'] . "</td>";
            echo "<td>" . $r['po_id'] . "</td>";
            echo "<td>
                <form action='updatepurchases.php' method='GET'>
                    <input type='hidden' name='purchase_id' value='" . $r['purchase_ID'] . "'>
                    <input type='hidden' name='vendor_id' value='" . $r['Vendor_ID'] . "'>
                    <input type='hidden' name='drug_id' value='" . $r['Drug_ID'] . "'>
                    <input type='hidden' name='price' value='" . $r['price'] . "'>
                    <input type='hidden' name='quantity' value='" . $r['quantity'] . "'>
                    <input type='hidden' name='Discount' value='" . $r['discount'] . "'>
                    <input type='hidden' name='purchase_date' value='" . $r['purchase_date'] . "'>
                    <input type='hidden' name='expiration_date' value='" . $r['expiration'] . "'>
                    <input type='hidden' name='total_amount' value='" . $r['total_amount'] . "'>
                    <input type='hidden' name='po_id' value='" . $r['po_id'] . "'>
                    <button type='submit' class='btn-link'>Update</button>
                </form>
                </td>";
                echo"<td>
                <form action='updatepurchases.php' method='GET'>
                    <input type='hidden' name='purchase_id' value='" . $r['purchase_ID'] . "'>
                    <input type='hidden' name='vendor_id' value='" . $r['Vendor_ID'] . "'>
                    <input type='hidden' name='drug_id' value='" . $r['Drug_ID'] . "'>
                    <input type='hidden' name='price' value='" . $r['price'] . "'>
                    <input type='hidden' name='quantity' value='" . $r['quantity'] . "'>
                    <input type='hidden' name='Discount' value='" . $r['discount'] . "'>
                    <input type='hidden' name='purchase_date' value='" . $r['purchase_date'] . "'>
                    <input type='hidden' name='expiration_date' value='" . $r['expiration'] . "'>
                    <input type='hidden' name='total_amount' value='" . $r['total_amount'] . "'>
                    <input type='hidden' name='po_id' value='" . $r['po_id'] . "'>
                    <button type='submit' class='btn-link'>Delete</button>
                </form>
              </td>";
            echo "</tr>";
        }
        echo "</table>";
} else {
    echo "<p style='color: red; width: 150px; margin: auto; margin-bottom:20px;'>No records found.</p>";  
}
?>
