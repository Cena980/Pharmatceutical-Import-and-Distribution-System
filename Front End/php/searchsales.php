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
$sql = "SELECT * FROM sales_view WHERE 
        Sales_ID LIKE '%$query%' OR
        drug_name LIKE '%$query%' OR 
        Invoice_No LIKE '%$query%' OR 
        Sale_Date LIKE '%$query%' OR 
        Customer LIKE '%$query%' OR
        Note LIKE '%$query%'";

$res = mysqli_query($connect, $sql);

// Check if any results were found
if ($res && mysqli_num_rows($res) > 0) {
    echo "<table border='1' id='tblreport'>";
    echo "<thead><tr>
            <th data-key='sale_id'>Sale ID</th>
            <th data-key='inventory_id'>Inventory ID</th>
            <th data-key='name'>Name</th>
            <th data-key='date'>Date</th>
            <th data-key='quantity'>Quantity</th>
            <th data-key='discount'>Discount</th>
            <th data-key='price'>Price</th>
            <th data-key='cut_id'>Cut ID</th>
            <th data-key='customer_id'>Customer ID</th>
            <th data-key='customer_id'>Customer</th>
            <th data-key='total_price'>Total Price</th>
            <th data-key='note'>Note</th>
            <th data-key='actions' colspan='2'>Actions</th>
            </tr></thead><tbody>";
    while ($r = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . $r['Sales_ID'] . "</td>";
        echo "<td>" . $r['Inventory_ID'] . "</td>";
        echo "<td>" . $r['drug_name'] . "</td>";
        echo "<td>" . $r['Sale_Date'] . "</td>";
        echo "<td>" . $r['Quantity'] . "</td>";
        echo "<td>" . $r['Discount'] . "</td>";
        echo "<td>" . $r['Price'] . "</td>";
        echo "<td>" . $r['Cut_ID'] . "</td>";
        echo "<td>" . $r['Customer_ID'] . "</td>";
        echo "<td>" . $r['Customer'] . "</td>";
        echo "<td>" . $r['Total_Price'] . "</td>";
        echo "<td>" . $r['Note'] . "</td>";
        echo "<td>
                <form action='updatesales.php' method='GET'>
                    <input type='hidden' name='Sales_ID' value='" . $r['Sales_ID'] . "'>
                    <input type='hidden' name='Inventory_ID' value='" . $r['Inventory_ID'] . "'>
                    <input type='hidden' name='Sale_Date' value='" . $r['Sale_Date'] . "'>
                    <input type='hidden' name='Quantity' value='" . $r['Quantity'] . "'>
                    <input type='hidden' name='Discount' value='" . $r['Discount'] . "'>
                    <input type='hidden' name='Price' value='" . $r['Price'] . "'>
                    <input type='hidden' name='Cut_ID' value='" . $r['Cut_ID'] . "'>
                    <input type='hidden' name='Customer_ID' value='" . $r['Customer_ID'] . "'>
                    <input type='hidden' name='Total_Price' value='" . $r['Total_Price'] . "'>
                    
                    <input type='hidden' name='Note' value='" . $r['Note'] . "'>
                    <button type='submit' class=' btn-link'>Update</button>
                </form>
            </td>";
            echo "<td>
                <form action='updatesales.php' method='GET'>
                    <input type='hidden' name='Sales_ID' value='" . $r['Sales_ID'] . "'>
                    <input type='hidden' name='Inventory_ID' value='" . $r['Inventory_ID'] . "'>
                    <input type='hidden' name='Sale_Date' value='" . $r['Sale_Date'] . "'>
                    <input type='hidden' name='Quantity' value='" . $r['Quantity'] . "'>
                    <input type='hidden' name='Discount' value='" . $r['Discount'] . "'>
                    <input type='hidden' name='Price' value='" . $r['Price'] . "'>
                    <input type='hidden' name='Cut_ID' value='" . $r['Cut_ID'] . "'>
                    <input type='hidden' name='Customer_ID' value='" . $r['Customer_ID'] . "'>
                    <input type='hidden' name='Total_Price' value='" . $r['Total_Price'] . "'>
                    
                    <input type='hidden' name='Note' value='" . $r['Note'] . "'>
                    <button type='submit' class=' btn-link'>Delete</button>
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p style='color: red; width: 150px; margin: auto; margin-bottom:20px;'>No records found.</p>";  
}
?>
