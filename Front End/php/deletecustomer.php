<?php
    include 'connection.php';

    $customer_id = $_POST['customer_id'];
    

    $sql = "delete from customer where customer_id = '$customer_id' ";
    if(mysqli_query($connect, $sql)){
        echo "Record has been Deleted";
    }else{echo "Failed";}

?>