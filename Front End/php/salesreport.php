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
                    <th>Total Price</th><th>Amount Recieved</th><th>Note</th><th>Actions</th>
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
            echo "<td>
                <form action='updatesales.html' method='GET'>
                    <input type='hidden' name='Sales_ID' value='" . $r['Sales_ID'] . "'>
                    <input type='hidden' name='Inventory_ID' value='" . $r['Inventory_ID'] . "'>
                    <input type='hidden' name='Sale_Date' value='" . $r['Sale_Date'] . "'>
                    <input type='hidden' name='Quantity' value='" . $r['Quantity'] . "'>
                    <input type='hidden' name='Discount' value='" . $r['Discount'] . "'>
                    <input type='hidden' name='Price' value='" . $r['Price'] . "'>
                    <input type='hidden' name='Cut_ID' value='" . $r['Cut_ID'] . "'>
                    <input type='hidden' name='Customer_ID' value='" . $r['Customer_ID'] . "'>
                    <input type='hidden' name='Total_Price' value='" . $r['Total_Price'] . "'>
                    <input type='hidden' name='Amount_Received' value='" . $r['Amount_Received'] . "'>
                    <input type='hidden' name='Note' value='" . $r['Note'] . "'>
                    <button type='submit' class=' btn-link'>Update</button>
                </form>
                <form action='updatesales.html' method='GET'>
                    <input type='hidden' name='Sales_ID' value='" . $r['Sales_ID'] . "'>
                    <input type='hidden' name='Inventory_ID' value='" . $r['Inventory_ID'] . "'>
                    <input type='hidden' name='Sale_Date' value='" . $r['Sale_Date'] . "'>
                    <input type='hidden' name='Quantity' value='" . $r['Quantity'] . "'>
                    <input type='hidden' name='Discount' value='" . $r['Discount'] . "'>
                    <input type='hidden' name='Price' value='" . $r['Price'] . "'>
                    <input type='hidden' name='Cut_ID' value='" . $r['Cut_ID'] . "'>
                    <input type='hidden' name='Customer_ID' value='" . $r['Customer_ID'] . "'>
                    <input type='hidden' name='Total_Price' value='" . $r['Total_Price'] . "'>
                    <input type='hidden' name='Amount_Received' value='" . $r['Amount_Received'] . "'>
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