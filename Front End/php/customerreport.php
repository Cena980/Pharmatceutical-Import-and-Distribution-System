<?php

    include 'connection.php';
    $query = "select * from customer";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<thead><tr>
                    <th data-key='customer-id'>Customer ID</th>
                    <th data-key='shop'>Customer Shop No</th>
                    <th data-key='customer-name'>Customer Name</th>
                    <th data-key='address'>Address</th>
                    <th data-key='phone'>Phone</th>
                    <th data-key='balance'>Balance</th>
                    <th data-key='info'>Useful Info</th>
                    <th data-key='actions' colspan= '2'>Actions</th>
                </tr></thead><tbody>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['customer_id'] . "</td>";
            echo "<td>" . $r['customer_shop'] . "</td>";
            echo "<td>" . $r['customer_name'] . "</td>";
            echo "<td>" . $r['address'] . "</td>";
            echo "<td>" . $r['phone'] . "</td>";
            echo "<td>" . $r['balance'] . "</td>";
            echo "<td>" . $r['useful_info'] . "</td>";
            echo "<td>
                <form action='updatecustomer.php' method='GET'>
                    <input type='hidden' name='customer_id' value='" . $r['customer_id'] . "'>
                    <input type='hidden' name='customer_shop' value='" . $r['customer_shop'] . "'>
                    <input type='hidden' name='customer_name' value='" . $r['customer_name'] . "'>
                    <input type='hidden' name='address' value='" . $r['address'] . "'>
                    <input type='hidden' name='phone' value='" . $r['phone'] . "'>
                    <input type='hidden' name='balance' value='" . $r['balance'] . "'>
                    <input type='hidden' name='useful_info' value='" . $r['useful_info'] . "'>
                    <button class='btn-link' type='submit'>Update</button>
                </form>
              </td>";
            echo "<td>
                <form action='updatecustomer.php' method='GET'>
                    <input type='hidden' name='customer_id' value='" . $r['customer_id'] . "'>
                    <input type='hidden' name='customer_shop' value='" . $r['customer_shop'] . "'>
                    <input type='hidden' name='customer_name' value='" . $r['customer_name'] . "'>
                    <input type='hidden' name='address' value='" . $r['address'] . "'>
                    <input type='hidden' name='phone' value='" . $r['phone'] . "'>
                    <input type='hidden' name='balance' value='" . $r['balance'] . "'>
                    <input type='hidden' name='useful_info' value='" . $r['useful_info'] . "'>
                    <button class='btn-link' type='submit'>Delete</button>
                </form>
              </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No records found.";  
    }
?>