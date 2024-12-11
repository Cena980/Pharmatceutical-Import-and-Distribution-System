<?php
    include 'connection.php';

    $Sale_ID = $_POST['Sale_ID'];
    $Drug_ID = $_POST['Drug_ID'];
    $Date = $_POST['Date'];
    $Quantity = $_POST['Quantity'];
    $Discount = $_POST['Discount'];
    $Price = $_POST['Price'];
    $Employee_Cut = $_POST['Cut_ID'];
    $Location_ID = $_POST['Location_ID'];
    $Total = $_POST['Total'];
    

    $sql = "update sales set Drug_ID = '$Drug_ID', Sale_Date = '$Date', 
        Quantity = '$Quantity', Discount = '$Discount', Price = '$Price', 
        Cut_ID ='$Employee_Cut', Customer_ID = '$Location_ID', Total_Price = '$Total'
        where Sales_ID = '$Sale_ID'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>