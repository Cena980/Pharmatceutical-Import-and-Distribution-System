<?php

    include 'connection.php';
    $query = "select * from main";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th>Inventory ID</th><th>Drug ID</th><th>Drug Name</th><th>Expiration</th><th>Cost</th>
                    <th>Price</th><th>Initial_Amount</th><th>Actions</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Inventory_ID'] . "</td>";
            echo "<td>" . $r['Drug_ID'] . "</td>";
            echo "<td>" . $r['drug_name'] . "</td>";
            echo "<td>" . $r['Expiration'] . "</td>";
            echo "<td>" . $r['Cost'] . "</td>";
            echo "<td>" . $r['Price'] . "</td>";
            echo "<td>" . $r['Initial_Amount'] . "</td>";
            echo "<td>
            <form action='updateinventory.html' method='GET'>
                <input type='hidden' name='Inventory_ID' value='" . $r['Inventory_ID'] . "'>
                <input type='hidden' name='Drug_ID' value='" . $r['Drug_ID'] . "'>
                <input type='hidden' name='Expiration' value='" . $r['Expiration'] . "'>
                <input type='hidden' name='Cost' value='" . $r['Cost'] . "'>
                <input type='hidden' name='Price' value='" . $r['Price'] . "'>
                <input type='hidden' name='Initial_Amount' value='" . $r['Initial_Amount'] . "'>
                <button type='submit' class=' btn-link'>Update</button>
            </form>
            <form action='updateinventory.html' method='GET'>
                <input type='hidden' name='Inventory_ID' value='" . $r['Inventory_ID'] . "'>
                <input type='hidden' name='Drug_ID' value='" . $r['Drug_ID'] . "'>
                <input type='hidden' name='Expiration' value='" . $r['Expiration'] . "'>
                <input type='hidden' name='Cost' value='" . $r['Cost'] . "'>
                <input type='hidden' name='Price' value='" . $r['Price'] . "'>
                <input type='hidden' name='Initial_Amount' value='" . $r['Initial_Amount'] . "'>
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