<?php

    include 'connection.php';
    $query = "select * from 'purchase order' order by po_id desc";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' border-collapse=collapse id='tblreport'>";
        echo "<thead><tr>
            <th data-key='order-no'>Order No</th>
            <th data-key='date'>Date</th>
            <th data-key='ordered-by'>Ordered By</th>
            <th data-key='total'>Total Amount</th>
            <th data-key='paid'>Amount Paid</th>
            <th data-key='debt'>Debt</th>
            <th data-key='actions' colspan='3'>Actions</th>
                </tr></thead><tbody>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['po_id'] . "</td>";
            echo "<td>" . $r['po_date'] . "</td>";
            echo "<td>" . $r['ordered_by'] . "</td>";
            echo "<td>" . $r['Total_amount'] . "</td>";
            echo "<td>" . $r['Amount_Paid'] . "</td>";
            echo "<td>" . $r['Remaining_Debt'] . "</td>";
            
            echo "<td>
                <form action='updatePO.php' method='GET'>
                    <input type='hidden' name='po_id' value='" . $r['po_id'] . "'>
                    <input type='hidden' name='vendor_id' value='" . $r['vendor_id'] . "'>
                    <input type='hidden' name='po_date' value='" . $r['po_date'] . "'>
                    <input type='hidden' name='ordered_by' value='" . $r['ordered_by'] . "'>
                    <input type='hidden' name='Total_amount' value='" . $r['Total_amount'] . "'>
                    <input type='hidden' name='Amount_Paid' value='" . $r['Amount_Paid'] . "'>
                    <input type='hidden' name='Remaining_Debt' value='" . $r['Remaining_Debt'] . "'>
                    
                    <button type='submit' class=' btn-link'>Update</button>
                </form>
            </td>";
            echo "<td>
                <form action='PrintPO.php' method='GET'>
                    <input type='hidden' name='po_id' value='" . $r['po_id'] . "'>
                    <input type='hidden' name='vendor_id' value='" . $r['vendor_id'] . "'>
                    <input type='hidden' name='po_date' value='" . $r['po_date'] . "'>
                    <input type='hidden' name='ordered_by' value='" . $r['ordered_by'] . "'>
                    <input type='hidden' name='Total_amount' value='" . $r['Total_amount'] . "'>
                    <input type='hidden' name='Amount_Paid' value='" . $r['Amount_Paid'] . "'>
                    <input type='hidden' name='Remaining_Debt' value='" . $r['Remaining_Debt'] . "'>
                    
                    <button type='submit' class=' btn-link'>Print</button>
                </form>
              </td>";
              echo "<td>
                <form action='updatePO.php' method='GET'>
                    <input type='hidden' name='po_id' value='" . $r['po_id'] . "'>
                    <input type='hidden' name='vendor_id' value='" . $r['vendor_id'] . "'>
                    <input type='hidden' name='po_date' value='" . $r['po_date'] . "'>
                    <input type='hidden' name='ordered_by' value='" . $r['ordered_by'] . "'>
                    <input type='hidden' name='Total_amount' value='" . $r['Total_amount'] . "'>
                    <input type='hidden' name='Amount_Paid' value='" . $r['Amount_Paid'] . "'>
                    <input type='hidden' name='Remaining_Debt' value='" . $r['Remaining_Debt'] . "'>
                    
                    <button type='submit' class=' btn-link'>Delete</button>
                </form>
            </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No records found.";  
    }
?>