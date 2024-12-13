<?php

    include 'connection.php';
    $query = "select * from companies";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th>Company ID</th><th>Company Name</th><th>Head Quarters</th>
                    <th>Phone</th><th>Email</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Comp_ID'] . "</td>";
            echo "<td>" . $r['Comp_Name'] . "</td>";
            echo "<td>" . $r['Head_Quarters'] . "</td>";
            echo "<td>" . $r['Phone'] . "</td>";
            echo "<td>" . $r['Email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>