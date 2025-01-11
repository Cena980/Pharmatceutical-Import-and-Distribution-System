<?php
    include 'connection.php';

    $purchase_id = $_POST['purchase_id'];
    $vendor_id = $_POST['vendor_id'];
    $drug_id = $_POST['drug_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $Discount = $_POST['Discount'];
    $purchase_date = $_POST['purchase_date'];
    $total_amount = $_POST['total_amount'];
    $amount_paid = $_POST['amount_paid'];
    

    $sql = "update purchases set amount_paid = '$amount_paid', amount_paid = '$vendor_id', 
        drug_id = '$drug_id', price = '$price', quantity = '$quantity', 
        Discount ='$Discount', purchase_date = '$purchase_date', total_amount = '$total_amount'
        where purchase_id = '$purchase_id'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>