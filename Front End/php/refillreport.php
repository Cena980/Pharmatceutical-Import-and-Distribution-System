<?php

    include 'connection.php';
    $query = "SELECT * FROM inventorystockstatus WHERE Remaining_Stock <= 0";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th>Inventory ID</th><th>Drug ID</th>
                    <th>Drug Name</th><th>Expiration</th>
                    <th>Initial_Amount</th><th>Remaining Stock</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Inventory_ID'] . "</td>";
            echo "<td>" . $r['Drug_ID'] . "</td>";
            echo "<td>" . $r['Drug_Name'] . "</td>";
            echo "<td>" . $r['Expiration'] . "</td>";
            echo "<td>" . $r['Initial_Amount'] . "</td>";
            echo "<td>" . $r['Remaining_Stock'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>