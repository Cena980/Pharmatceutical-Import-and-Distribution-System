<?php
    include 'connection.php';

    $purchase_id = $_POST['purchase_id'];
    

    $sql = "delete from purchases where purchase_id = '$purchase_id' ";
    if(mysqli_query($connect, $sql)){
        echo "Record has been Deleted";
    }else{echo "Failed";}

?>