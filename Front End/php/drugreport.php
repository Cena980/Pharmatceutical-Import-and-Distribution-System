<?php

    include 'connection.php';
    $query = "select * from drugs";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th>Drug ID</th><th>Company ID</th><th>Name</th><th>Ingredients</th>
                    <th>PB</th><th>Exp Date</th><th>Type ID</th><th>Demo ID</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Drug_ID'] . "</td>";
            echo "<td>" . $r['Comp_ID'] . "</td>";
            echo "<td>" . $r['Drug_Name'] . "</td>";
            echo "<td>" . $r['Ingredient'] . "</td>";
            echo "<td>" . $r['Tablet_PB'] . "</td>";
            echo "<td>" . $r['Expiration'] . "</td>";
            echo "<td>" . $r['Type_ID'] . "</td>";
            echo "<td>" . $r['Demo_ID'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>