<?php

    include 'connection.php';
    $query = "select * from sales order by Sale_Date desc limit 20";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' border-collapse=collapse id='tblreport'>";
        echo "<tr>
            <th data-key='sale_id'>Sale ID</th>
            <th data-key='inventory_id'>Inventory ID</th>
            <th data-key='date'>Date</th>
            <th data-key='quantity'>Quantity</th>
            <th data-key='discount'>Discount</th>
            <th data-key='price'>Price</th>
            <th data-key='cut_id'>Cut ID</th>
            <th data-key='customer_id'>Customer ID</th>
            <th data-key='total_price'>Total Price</th>
            <th data-key='note'>Note</th>
            <th data-key='actions' colspan='2'>Actions</th>
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
            echo "<td>" . $r['Note'] . "</td>";
            echo "<td>
                <form action='updatesales.php' method='GET'>
                    <input type='hidden' name='Sales_ID' value='" . $r['Sales_ID'] . "'>
                    <input type='hidden' name='Inventory_ID' value='" . $r['Inventory_ID'] . "'>
                    <input type='hidden' name='Sale_Date' value='" . $r['Sale_Date'] . "'>
                    <input type='hidden' name='Quantity' value='" . $r['Quantity'] . "'>
                    <input type='hidden' name='Discount' value='" . $r['Discount'] . "'>
                    <input type='hidden' name='Price' value='" . $r['Price'] . "'>
                    <input type='hidden' name='Cut_ID' value='" . $r['Cut_ID'] . "'>
                    <input type='hidden' name='Customer_ID' value='" . $r['Customer_ID'] . "'>
                    <input type='hidden' name='Total_Price' value='" . $r['Total_Price'] . "'>
                    
                    <input type='hidden' name='Note' value='" . $r['Note'] . "'>
                    <button type='submit' class=' btn-link'>Update</button>
                </form>
            </td>";
            echo "<td>
                <form action='updatesales.php' method='GET'>
                    <input type='hidden' name='Sales_ID' value='" . $r['Sales_ID'] . "'>
                    <input type='hidden' name='Inventory_ID' value='" . $r['Inventory_ID'] . "'>
                    <input type='hidden' name='Sale_Date' value='" . $r['Sale_Date'] . "'>
                    <input type='hidden' name='Quantity' value='" . $r['Quantity'] . "'>
                    <input type='hidden' name='Discount' value='" . $r['Discount'] . "'>
                    <input type='hidden' name='Price' value='" . $r['Price'] . "'>
                    <input type='hidden' name='Cut_ID' value='" . $r['Cut_ID'] . "'>
                    <input type='hidden' name='Customer_ID' value='" . $r['Customer_ID'] . "'>
                    <input type='hidden' name='Total_Price' value='" . $r['Total_Price'] . "'>
                    
                    <input type='hidden' name='Note' value='" . $r['Note'] . "'>
                    <button type='submit' class=' btn-link'>Delete</button>
                </form>
              </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>