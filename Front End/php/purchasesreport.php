<?php

    include 'connection.php';
    $query = "select * from purchases order by purchase_id desc";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' border-collapse=collapse id='tblreport'>";
        echo "<tr>
                    <th data-key='purchase-id'>Purchase ID</th><th data-key='vendor-id'>Vendor ID</th><th data-key='drug-id'>Drug ID</th>
                    <th data-key='price'>price</th><th data-key='quantity'>Quantity</th><th data-key='discount'>Discount</th>
                    <th data-key='purcahse-date'>Purchase Date</th><th data-key='expiration'>Expiration</th><th data-key='total-amount'>Total Amount</th>
                    <th data-key='purchase-order'>Purchase Order id</th><th data-key='actions'>Actions</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['purchase_id'] . "</td>";
            echo "<td>" . $r['vendor_id'] . "</td>";
            echo "<td>" . $r['drug_id'] . "</td>";
            echo "<td>" . $r['price'] . "</td>";
            echo "<td>" . $r['quantity'] . "</td>";
            echo "<td>" . $r['Discount'] . "</td>";
            echo "<td>" . $r['purchase_date'] . "</td>";
            echo "<td>" . $r['Expiration'] . "</td>";
            echo "<td>" . $r['total_amount'] . "</td>";
            echo "<td>" . $r['po_id'] . "</td>";
            echo "<td>
                <form action='updatepurchases.php' method='GET'>
                    <input type='hidden' name='purchase_id' value='" . $r['purchase_id'] . "'>
                    <input type='hidden' name='vendor_id' value='" . $r['vendor_id'] . "'>
                    <input type='hidden' name='drug_id' value='" . $r['drug_id'] . "'>
                    <input type='hidden' name='price' value='" . $r['price'] . "'>
                    <input type='hidden' name='quantity' value='" . $r['quantity'] . "'>
                    <input type='hidden' name='Discount' value='" . $r['Discount'] . "'>
                    <input type='hidden' name='purchase_date' value='" . $r['purchase_date'] . "'>
                    <input type='hidden' name='expiration_date' value='" . $r['Expiration'] . "'>
                    <input type='hidden' name='total_amount' value='" . $r['total_amount'] . "'>
                    <input type='hidden' name='po_id' value='" . $r['po_id'] . "'>
                    <button type='submit' class='btn-link'>Update</button>
                </form>
                <form action='updatepurchases.php' method='GET'>
                    <input type='hidden' name='purchase_id' value='" . $r['purchase_id'] . "'>
                    <input type='hidden' name='vendor_id' value='" . $r['vendor_id'] . "'>
                    <input type='hidden' name='drug_id' value='" . $r['drug_id'] . "'>
                    <input type='hidden' name='price' value='" . $r['price'] . "'>
                    <input type='hidden' name='quantity' value='" . $r['quantity'] . "'>
                    <input type='hidden' name='Discount' value='" . $r['Discount'] . "'>
                    <input type='hidden' name='purchase_date' value='" . $r['purchase_date'] . "'>
                    <input type='hidden' name='expiration_date' value='" . $r['Expiration'] . "'>
                    <input type='hidden' name='total_amount' value='" . $r['total_amount'] . "'>
                    <input type='hidden' name='po_id' value='" . $r['po_id'] . "'>
                    <button type='submit' class='btn-link'>Delete</button>
                </form>
              </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>