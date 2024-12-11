<?php
    include 'connection.php';

    $Inventory_ID = $_POST['Inventory_ID'];
    $Drug_ID = $_POST['Drug_ID'];
    $Amount_Sold = $_POST['Amount_Sold'];
    $Initial_Amount = $_POST['Initial_Amount'];
    $Stock = $_POST['Stock'];
   
    

    $sql = "insert into inventory values ('$Inventory_ID', '$Drug_ID', '$Amount_Sold',
            '$Initial_Amount', '$Stock')";
    if(mysqli_query($connect, $sql)){
        echo "Record has been inserted";
    }else{echo "Failed";}

?>