<?php

    include 'connection.php';
    $query = "select * from receipt_view order by receipt_id desc limit 30";
    $res = mysqli_query($connect, $query);
    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' border-collapse=collapse id='tblreport'>";
        echo "<thead><tr>
            <th data-key='receipt_id'>Receipt ID</th>
            <th data-key='customer_id'>Customer</th>
            <th data-key='payment_amount'>Amount</th>
            <th data-key='old_balance'>Old Balance</th>
            <th data-key='new_balance'>New Balance</th>
            <th data-key='payment_date'>Date</th>
            <th data-key='currency_id'>Currency</th>
            <th data-key='recorded_by'>Recorded By</th>
            <th data-key='notes'>Notes</th>
            <th data-key='actions' colspan='3'>Actions</th>
                </tr></thead><tbody>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['receipt_id'] . "</td>";
            echo "<td>" . $r['customer_shop'] . "</td>";
            echo "<td>" . $r['payment_amount'] . "</td>";
            echo "<td>" . $r['old_balance'] . "</td>";
            echo "<td>" . $r['new_balance'] . "</td>";
            echo "<td>" . $r['payment_date'] . "</td>";
            echo "<td>" . $r['currency_code'] . "</td>";
            echo "<td>" . $r['recorded_by'] . "</td>";
            echo "<td>" . $r['notes'] . "</td>";
            echo "<td>
                <form action='updatereceipt.php' method='GET'>
                    <input type='hidden' name='receipt_id' value='" . $r['receipt_id'] . "'>
                    <input type='hidden' name='customer_id' value='" . $r['customer_id'] . "'>
                    <input type='hidden' name='payment_amount' value='" . $r['payment_amount'] . "'>
                    <input type='hidden' name='old_balance' value='" . $r['old_balance'] . "'>
                    <input type='hidden' name='payment_date' value='" . $r['payment_date'] . "'>
                    <input type='hidden' name='currency_id' value='" . $r['currency_id'] . "'>
                    <input type='hidden' name='recorded_by' value='" . $r['recorded_by'] . "'>
                    <input type='hidden' name='notes' value='" . $r['notes'] . "'>
                    <button type='submit' class=' btn-link'>Update</button>
                </form>
            </td>";
            echo "<td>
                <form action='updatereceipt.php' method='GET'>
                    <input type='hidden' name='receipt_id' value='" . $r['receipt_id'] . "'>
                    <input type='hidden' name='customer_id' value='" . $r['customer_id'] . "'>
                    <input type='hidden' name='payment_amount' value='" . $r['payment_amount'] . "'>
                    <input type='hidden' name='old_balance' value='" . $r['old_balance'] . "'>
                    <input type='hidden' name='payment_date' value='" . $r['payment_date'] . "'>
                    <input type='hidden' name='currency_id' value='" . $r['currency_id'] . "'>
                    <input type='hidden' name='recorded_by' value='" . $r['recorded_by'] . "'>
                    <input type='hidden' name='notes' value='" . $r['notes'] . "'>
                    <button type='submit' class=' btn-link'>Delete</button>
                </form>
              </td>";
              echo "<td>
              <form action='printreceipt.php' method='GET'>
                    <input type='hidden' name='receipt_id' value='" . $r['receipt_id'] . "'>
                    <input type='hidden' name='customer_id' value='" . $r['customer_id'] . "'>
                    <input type='hidden' name='payment_amount' value='" . $r['payment_amount'] . "'>
                    <input type='hidden' name='old_balance' value='" . $r['old_balance'] . "'>
                    <input type='hidden' name='payment_date' value='" . $r['payment_date'] . "'>
                    <input type='hidden' name='currency_id' value='" . $r['currency_id'] . "'>
                    <input type='hidden' name='recorded_by' value='" . $r['recorded_by'] . "'>
                    <input type='hidden' name='notes' value='" . $r['notes'] . "'>
                  <button type='submit' class=' btn-link'>Print</button>
              </form>
            </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No records found.";  
    }
?>