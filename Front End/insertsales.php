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
    

    $sql = "insert into sales values ('$Sale_ID', '$Drug_ID', '$Date',
            '$Quantity', '$Discount', '$Price', '$Employee_Cut','$Location_ID', '$Total')";
    if(mysqli_query($connect, $sql)){
        echo "Record has been inserted";
    }else{echo "Failed";}

?>