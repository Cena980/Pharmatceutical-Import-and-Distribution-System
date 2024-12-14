<?php

    include 'connection.php';
    $query = "select * from customer";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th>Customer ID</th><th>Customer Shop No</th><th>Customer Name</th><th>Address</th>
                    <th>Phone</th><th>Useful Info</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['customer_id'] . "</td>";
            echo "<td>" . $r['customer_shop'] . "</td>";
            echo "<td>" . $r['customer_name'] . "</td>";
            echo "<td>" . $r['address'] . "</td>";
            echo "<td>" . $r['phone'] . "</td>";
            echo "<td>" . $r['useful_info'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>