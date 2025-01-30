<?php
    include 'connection.php';

    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    echo "Number of rows submitted: " . $qnt;
    $date = $_POST["purchase_date_1"] ?? null;
    $amount_paid = $_POST["amount_paid_1"] ?? null;

    $Vendor_Name = $_POST["vendor_name_1"] ?? null;
    $Vendor_Name_sql = "SELECT vendor_id FROM vendors WHERE name = '$Vendor_Name'";
    $Vendor_ID_Result = mysqli_query($connect, $Vendor_Name_sql);

    if ($Vendor_ID_Result) {
        $Vendor_ID_Row = mysqli_fetch_assoc($Vendor_ID_Result);
        $vendor_id = $Vendor_ID_Row['vendor_id'];
    } else {
        echo 'Could not fetch Vendor ID for ' . $Vendor_Name;
    }

    for ($i = 1; $i <= $qnt; $i++) {
        $Drug_Name = $_POST["drug_name_$i"] ?? null;
        $drug_id_sql = "SELECT Drug_ID FROM drugs WHERE Drug_Name = '$Drug_Name'";
        $Drug_ID_result = mysqli_query($connect, $drug_id_sql);
    
        if ($Drug_ID_result) {
            $Drug_ID_row = mysqli_fetch_assoc($Drug_ID_result);
            $drug_id = $Drug_ID_row['Drug_ID'];
        } else {
            echo 'Could not fetch Drug ID for ' . $Drug_Name;
            continue;  // Skip this iteration if Inventory_ID is not found
        }
        $price = $_POST["price_$i"] ?? null;
        $quantity = $_POST["quantity_$i"] ?? null;
        $discount = $_POST["discount_$i"] ?? null;
        $expiration = $_POST["expiration_$i"] ?? null;
        $total_amount = $_POST["total_amount_$i"] ?? null;
        if($i < $qnt){
            $amount = 0;
        }else{
            $amount = $amount_paid;
        }

        $sql = "insert into purchases (vendor_id, drug_id, price, quantity, Discount, Expiration, purchase_date, total_amount, amount_paid)
             values ('$vendor_id', '$drug_id', '$price','$quantity', '$discount', '$expiration', '$date', '$total_amount', '$amount')";
        if(mysqli_query($connect, $sql)){
            echo "Record has been inserted";
        }else{echo "Failed";}

    }
    

    



?>
