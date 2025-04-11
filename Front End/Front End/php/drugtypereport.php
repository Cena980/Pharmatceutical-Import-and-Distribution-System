<?php

    include 'connection.php';
    $query = "select * from drug_type";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th>Type ID</th><th>Drug Type</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Type_ID'] . "</td>";
            echo "<td>" . $r['Drug_Type'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>