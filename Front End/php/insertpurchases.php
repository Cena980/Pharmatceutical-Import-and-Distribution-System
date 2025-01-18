<?php
    include 'connection.php';

    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    echo "Number of rows submitted: " . $qnt;
    $date = $_POST["purchase_date_1"] ?? null;

    for ($i = 1; $i <= $qnt; $i++) {
        $Vendor_Name = $_POST["vendor_name_$i"] ?? null;
        $Vendor_Name_sql = "SELECT vendor_id FROM vendors WHERE name = '$Vendor_Name'";
        $Vendor_ID_Result = mysqli_query($connect, $Vendor_Name_sql);
    
        if ($Vendor_ID_Result) {
            $Vendor_ID_Row = mysqli_fetch_assoc($Vendor_ID_Result);
            $vendor_id = $Vendor_ID_Row['vendor_id'];
        } else {
            echo 'Could not fetch Vendor ID for ' . $Vendor_Name;
            continue;  // Skip this iteration if Inventory_ID is not found
        }
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
        $purchase_date = $date;
        $total_amount = $_POST["total_amount_$i"] ?? null;
        $amount_paid = $_POST["amount_paid_$i"] ?? null;

        $sql = "insert into purchases (vendor_id, drug_id, price, quantity, Discount, purchase_date, total_amount, amount_paid) values ('$vendor_id', '$drug_id', '$price',
            '$quantity', '$discount', '$purchase_date', '$total_amount', '$amount_paid')";
        if(mysqli_query($connect, $sql)){
            echo "Record has been inserted";
        }else{echo "Failed";}

    }
    

    



?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the value of qnt
    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;

    // Use $qnt as needed
    echo "Number of rows submitted: " . $qnt;

    // Example: Loop through submitted rows
    for ($i = 1; $i <= $qnt; $i++) {
        $sale_id = $_POST["Sale_ID_$i"] ?? null;
        $drug_id = $_POST["Drug_ID_$i"] ?? null;
        $date = $_POST["Date_$i"] ?? null;
        $quantity = $_POST["Quantity_$i"] ?? null;
        $discount = $_POST["Discount_$i"] ?? null;
        $price = $_POST["Price_$i"] ?? null;
        $cut_id = $_POST["Cut_ID_$i"] ?? null;
        $location_id = $_POST["Location_ID_$i"] ?? null;
        $total = $_POST["Total_$i"] ?? null;

        // Process or save these variables in your database
        // Example:
        // INSERT INTO sales (Sale_ID, Drug_ID, Date, Quantity, Discount, Price, Cut_ID, Location_ID, Total)
        // VALUES ('$sale_id', '$drug_id', '$date', '$quantity', '$discount', '$price', '$cut_id', '$location_id', '$total');
    }
}
?>
