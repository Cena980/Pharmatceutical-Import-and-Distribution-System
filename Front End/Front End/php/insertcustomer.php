<?php
    include 'connection.php';


    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    echo "Number of rows submitted: " . $qnt; 
    for ($i = 1; $i <= $qnt; $i++) {
        $customer_shop = $_POST["customer_shop_$i"];
        $customer_name = $_POST["customer_name_$i"];
        $address = $_POST["address_$i"];
        $phone = $_POST["phone_$i"];
        $useful_info = $_POST["useful_info_$i"];
       
        
    
        $sql = "insert into customer (customer_shop, customer_name, address, phone, useful_info) values ('$customer_shop', '$customer_name',
                '$address', '$phone', '$useful_info')";
        if(mysqli_query($connect, $sql)){
            echo "Record has been inserted";
        }else{echo "Failed";}
    }
?>