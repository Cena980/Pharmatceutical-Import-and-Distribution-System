<?php
    include 'connection.php';

    $Inventory_ID = $_POST['Inventory_ID'];
    $Drug_ID = $_POST['Drug_ID'];
    $Amount_Sold = $_POST['Amount_Sold'];
    $Initial_Amount = $_POST['Initial_Amount'];
    $Stock = $_POST['Stock'];
    

    $sql = "update inventory set Drug_ID = '$Drug_ID', Amount_Sold = '$Amount_Sold', 
        Initial_Amount = '$Initial_Amount', Stock = '$Stock' where Inventory_ID = '$Inventory_ID'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>