<?php

    include 'connection.php';
    $query = "select * from sales";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' border-collapse=collapse id='tblreport'>";
        echo "<tr>
                    <th>Sale ID</th><th>Inventory ID</th><th>Date</th><th>Quantity</th>
                    <th>Discount</th><th>Price</th><th>Cut ID</th><th>Customer ID</th>
                    <th>Total Price</th><th>Amount Recieved</th><th>Note</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Sales_ID'] . "</td>";
            echo "<td>" . $r['Inventory_ID'] . "</td>";
            echo "<td>" . $r['Sale_Date'] . "</td>";
            echo "<td>" . $r['Quantity'] . "</td>";
            echo "<td>" . $r['Discount'] . "</td>";
            echo "<td>" . $r['Price'] . "</td>";
            echo "<td>" . $r['Cut_ID'] . "</td>";
            echo "<td>" . $r['Customer_ID'] . "</td>";
            echo "<td>" . $r['Total_Price'] . "</td>";
            echo "<td>" . $r['Amount_Received'] . "</td>";
            echo "<td>" . $r['Note'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>