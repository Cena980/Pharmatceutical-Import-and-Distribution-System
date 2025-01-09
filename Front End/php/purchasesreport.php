<?php

    include 'connection.php';
    $query = "select * from purchases";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' border-collapse=collapse id='tblreport'>";
        echo "<tr>
                    <th>Purchase ID</th><th>Vendor ID</th><th>Drug ID</th><th>Quantity</th>
                    <th>Purchase Date</th><th>Total Amount</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['purchase_id'] . "</td>";
            echo "<td>" . $r['vendor_id'] . "</td>";
            echo "<td>" . $r['drug_id'] . "</td>";
            echo "<td>" . $r['quantity'] . "</td>";
            echo "<td>" . $r['purchase_date'] . "</td>";
            echo "<td>" . $r['total_amount'] . "</td>";
            echo "<td>Update</td>";
            echo "<td>Delete</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>