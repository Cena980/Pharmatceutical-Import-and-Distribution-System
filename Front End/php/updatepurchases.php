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
    $po_id =$_POST['po_id'];
    

    $sql = "update purchases set vendor_id = '$vendor_id', 
        drug_id = '$drug_id', price = '$price', quantity = '$quantity', 
        Discount ='$Discount', purchase_date = '$purchase_date', total_amount = '$total_amount' where purchase_id = '$purchase_id'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>