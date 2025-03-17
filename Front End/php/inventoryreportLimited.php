<?php

    include 'connection.php';
    $query = "select * from main order by drug_name asc limit 30";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<div class='alerts'>". $num_rows. " Records</div>";
        echo "<table border='1' id='tblreport'>";
        echo "<thead><tr>
                    <th>ID</th><th>Drug ID</th><th>Name</th><th>Expiration</th><th>Cost</th>
                    <th>Price</th><th>Amount</th><th colspan='2'>Actions</th>
                </tr></thead><tbody>";
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
            <form action='updateinventory.php' method='GET'>
                <input type='hidden' name='Inventory_ID' value='" . $r['Inventory_ID'] . "'>
                <input type='hidden' name='Drug_ID' value='" . $r['Drug_ID'] . "'>
                <input type='hidden' name='Expiration' value='" . $r['Expiration'] . "'>
                <input type='hidden' name='Cost' value='" . $r['Cost'] . "'>
                <input type='hidden' name='Price' value='" . $r['Price'] . "'>
                <input type='hidden' name='Initial_Amount' value='" . $r['Initial_Amount'] . "'>
                <input type='hidden' name='Amount_Left' value='" . $r['Amount_Left'] . "'>
                <button type='submit' class=' btn-link'>Update</button>
            </form>
            </td>";
            echo "<td>
            <form action='updateinventory.php' method='GET'>
                <input type='hidden' name='Inventory_ID' value='" . $r['Inventory_ID'] . "'>
                <input type='hidden' name='Drug_ID' value='" . $r['Drug_ID'] . "'>
                <input type='hidden' name='Expiration' value='" . $r['Expiration'] . "'>
                <input type='hidden' name='Cost' value='" . $r['Cost'] . "'>
                <input type='hidden' name='Price' value='" . $r['Price'] . "'>
                <input type='hidden' name='Initial_Amount' value='" . $r['Initial_Amount'] . "'>
                <input type='hidden' name='Amount_Left' value='" . $r['Amount_Left'] . "'>
                <button type='submit' class=' btn-link'>Delete</button>
            </form>
          </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No records found.";  
    }
?>