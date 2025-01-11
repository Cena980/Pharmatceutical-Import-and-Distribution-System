<?php
    include 'connection.php';

    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    echo "Number of rows submitted: " . $qnt;
    $date = $_POST["purchase_date_1"] ?? null;

    for ($i = 1; $i <= $qnt; $i++) {
        $vendor_id = $_POST["vendor_id_$i"] ?? null;
        $drug_id = $_POST["drug_id_$i"] ?? null;
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
