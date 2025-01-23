<?php
    include 'connection.php';

    $Sales_ID = $_POST['Sales_ID'];
    $Inventory_ID = $_POST['Inventory_ID'];
    $Sale_Date = $_POST['Sale_Date'];
    $Quantity = $_POST['Quantity'];
    $Discount = $_POST['Discount'];
    $Price = $_POST['Price'];
    $Cut_ID = $_POST['Cut_ID'];
    $Customer_ID = $_POST['Customer_ID'];
    $Total_Price = $_POST['Total_Price'];
    $Note = $_POST['Note'];
    

    $sql = "update sales set Inventory_ID = '$Inventory_ID', Sale_Date = '$Sale_Date', 
        Quantity = '$Quantity', Discount = '$Discount', Price = '$Price', 
        Cut_ID ='$Cut_ID', Customer_ID = '$Customer_ID', Total_Price = '$Total_Price', Note = '$Note'
        where Sales_ID = '$Sales_ID'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>