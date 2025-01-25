<?php

    include 'connection.php';
    $query = "SELECT * FROM main WHERE Amount_Left <= 0";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th>Inventory ID</th><th>Drug ID</th><th>Drug Name</th><th>Expiration</th><th>Cost</th>
                    <th>Price</th><th>Initial_Amount</th><th>Amount Left</th>
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
            echo "<td>" . $r['Amount_Left'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>