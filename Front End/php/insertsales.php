<?php
    include 'connection.php';

    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    echo "Number of rows submitted: " . $qnt;

    $Date0 = $_POST["Date_1"];
    $Employee_Cut0 = $_POST["Cut_ID_1"];
    $Location_ID0 = $_POST["Location_ID_1"];

    for ($i = 1; $i <= $qnt; $i++) {
        $Sale_ID = $_POST["Sale_ID_$i"] ?? null;
        $Drug_ID = $_POST["Drug_ID_$i"] ?? null;
        $Date = $Date0;
        $Quantity = $_POST["Quantity_$i"] ?? null;
        $Discount = $_POST["Discount_$i"] ?? null;
        $Price = $_POST["Price_$i"] ?? null;
        $Employee_Cut = $Employee_Cut0;
        $Location_ID = $Location_ID0;
        $Total = $_POST["Total_$i"] ?? null;

        $sql = "insert into sales (Inventory_ID, Sale_Date, Quantity, Discount, Price, Cut_ID, Customer_ID, Total_Price) values ('$Drug_ID', '$Date',
            '$Quantity', '$Discount', '$Price', '$Employee_Cut','$Location_ID', '$Total')";
        if(mysqli_query($connect, $sql)){
            echo "Record has been inserted";
        }else{echo "Failed";}
        // Process or save these variables in your database
        // Example:
        // INSERT INTO sales (Sale_ID, Drug_ID, Date, Quantity, Discount, Price, Cut_ID, Location_ID, Total)
        // VALUES ('$sale_id', '$drug_id', '$date', '$quantity', '$discount', '$price', '$cut_id', '$location_id', '$total');
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
