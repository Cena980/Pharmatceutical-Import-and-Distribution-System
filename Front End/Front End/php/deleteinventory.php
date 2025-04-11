<?php
    include 'connection.php';

    $Inventory_ID = $_POST['Inventory_ID'];
    

    $sql = "delete from inventory where Inventory_ID = '$Inventory_ID' ";
    if(mysqli_query($connect, $sql)){
        echo "Record has been Deleted";
    }else{echo "Failed";}

?>