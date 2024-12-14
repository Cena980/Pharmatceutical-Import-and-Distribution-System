<?php
    include 'connection.php';

    $customer_id = $_POST['customer_id'];
    $customer_shop = $_POST['customer_shop'];
    $customer_name = $_POST['customer_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $useful_info = $_POST['useful_info'];
   
    

    $sql = "insert into customer values ('$customer_id', '$customer_shop', '$customer_name',
            '$address', '$phone', '$useful_info')";
    if(mysqli_query($connect, $sql)){
        echo "Record has been inserted";
    }else{echo "Failed";}

?>