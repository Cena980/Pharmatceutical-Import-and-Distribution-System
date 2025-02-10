<?php

    include 'connection.php';
    $query = "select * from invoice order by invoice_id desc";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' border-collapse=collapse id='tblreport'>";
        echo "<tr>
            <th data-key='invoice_id'>Invoice ID</th>
            <th data-key='customer_id'>Customer ID</th>
            <th data-key='shop'>Shop</th>
            <th data-key='date'>Date</th>
            <th data-key='received'>Received</th>
            <th data-key='owed'>Owed</th>
            <th data-key='sales_officer'>Sales Officer</th>
            <th data-key='note'>Note</th>
            <th data-key='total_sales'>Total sales</th>
            <th data-key='sales_data'>Sales Data</th>
            <th data-key='actions' colspan='3'>Actions</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['invoice_id'] . "</td>";
            echo "<td>" . $r['customer_id'] . "</td>";
            echo "<td>" . $r['customer_shop'] . "</td>";
            echo "<td>" . $r['date'] . "</td>";
            echo "<td>" . $r['received'] . "</td>";
            echo "<td>" . $r['owed'] . "</td>";
            echo "<td>" . $r['sales_officer'] . "</td>";
            echo "<td>" . $r['note'] . "</td>";
            echo "<td>" . $r['total_sales'] . "</td>";
            echo "<td id='sales_data'>" . $r['sales_data'] . "</td>";
            echo "<td>
                <form action='updateinvoice.php' method='GET'>
                    <input type='hidden' name='invoice_id' value='" . $r['invoice_id'] . "'>
                    <input type='hidden' name='customer_id' value='" . $r['customer_id'] . "'>
                    <input type='hidden' name='shop' value='" . $r['customer_shop'] . "'>
                    <input type='hidden' name='date' value='" . $r['date'] . "'>
                    <input type='hidden' name='received' value='" . $r['received'] . "'>
                    <input type='hidden' name='owed' value='" . $r['owed'] . "'>
                    <input type='hidden' name='sales_officer' value='" . $r['sales_officer'] . "'>
                    <input type='hidden' name='note' value='" . $r['note'] . "'>
                    <input type='hidden' name='total_sales' value='" . $r['total_sales'] . "'>
                    <input type='hidden' name='sales_data' value='" . $r['sales_data'] . "'>
                    <button type='submit' class=' btn-link'>Update</button>
                </form>
            </td>";
            echo "<td>
                <form action='updateinvoice.php' method='GET'>
                    <input type='hidden' name='invoice_id' value='" . $r['invoice_id'] . "'>
                    <input type='hidden' name='customer_id' value='" . $r['customer_id'] . "'>
                    <input type='hidden' name='shop' value='" . $r['customer_shop'] . "'>
                    <input type='hidden' name='date' value='" . $r['date'] . "'>
                    <input type='hidden' name='received' value='" . $r['received'] . "'>
                    <input type='hidden' name='owed' value='" . $r['owed'] . "'>
                    <input type='hidden' name='sales_officer' value='" . $r['sales_officer'] . "'>
                    <input type='hidden' name='note' value='" . $r['note'] . "'>
                    <input type='hidden' name='total_sales' value='" . $r['total_sales'] . "'>
                    <input type='hidden' name='sales_data' value='" . $r['sales_data'] . "'>
                    <button type='submit' class=' btn-link'>Delete</button>
                </form>
              </td>";
              echo "<td>
              <form action='printinvoice.php' method='GET'>
                  <input type='hidden' name='invoice_id' value='" . $r['invoice_id'] . "'>
                  <input type='hidden' name='customer_id' value='" . $r['customer_id'] . "'>
                  <input type='hidden' name='shop' value='" . $r['customer_shop'] . "'>
                  <input type='hidden' name='date' value='" . $r['date'] . "'>
                  <input type='hidden' name='received' value='" . $r['received'] . "'>
                  <input type='hidden' name='owed' value='" . $r['owed'] . "'>
                  <input type='hidden' name='sales_officer' value='" . $r['sales_officer'] . "'>
                  <input type='hidden' name='note' value='" . $r['note'] . "'>
                  <input type='hidden' name='total_sales' value='" . $r['total_sales'] . "'>
                  <input type='hidden' name='sales_data' value='" . $r['sales_data'] . "'>
                  <button type='submit' class=' btn-link'>Print</button>
              </form>
            </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>