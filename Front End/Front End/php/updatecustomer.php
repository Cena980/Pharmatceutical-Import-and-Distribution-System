<?php
    include 'connection.php';

    $customer_id = $_POST['customer_id'];
    $customer_shop = $_POST['customer_shop'];
    $customer_name = $_POST['customer_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $useful_info = $_POST['useful_info'];

    $sql = "update customer set customer_shop = '$customer_shop', customer_name = '$customer_name', 
        address = '$address', phone = '$phone', useful_info = '$useful_info' where customer_id = '$customer_id'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>