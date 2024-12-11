<?php

    include 'connection.php';
    $query = "select * from inventory";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th>Inventory ID</th><th>Drug ID</th><th>Amount Sold</th><th>Initial Amount</th>
                    <th>Stock</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Inventory_ID'] . "</td>";
            echo "<td>" . $r['Drug_ID'] . "</td>";
            echo "<td>" . $r['Amount_Sold'] . "</td>";
            echo "<td>" . $r['Initial_Amount'] . "</td>";
            echo "<td>" . $r['Stock'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>