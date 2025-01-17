<?php
    include 'connection.php';

    $Inventory_ID = $_POST['Inventory_ID'];
    $Drug_ID = $_POST['Drug_ID'];
    $Expiration = $_POST['Expiration'];
    $Cost = $_POST['Cost'];
    $Price = $_POST['Price'];
    $Initial_Amount = $_POST['Initial_Amount'];
    

    $sql = "update inventory set Drug_ID = '$Drug_ID', Expiration = '$Expiration', 
        Cost = '$Cost', Price = '$Price', Initial_Amount = '$Initial_Amount' where Inventory_ID = '$Inventory_ID'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>