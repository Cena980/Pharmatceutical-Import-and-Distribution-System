<?php
    include 'connection.php';
    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    echo "Number of rows submitted: " . $qnt; 
    
    for ($i = 1; $i <= $qnt; $i++) {
        $drugName = $_POST["drug_name_$i"] ?? null;
        // Query to get the Drug_ID for the given drug name
        if(!empty($drugName)){
            $name = "SELECT Drug_ID FROM drugs WHERE Drug_Name = '$drugName'";
            $Drug_ID_result = mysqli_query($connect, $name);
        
            if ($Drug_ID_result) {
                $Drug_ID_row = mysqli_fetch_assoc($Drug_ID_result);
                $Drug_ID = $Drug_ID_row['Drug_ID'];
            } else {
                echo "<div class='alerts'> Could not fetch Drug ID for " . $drugName; echo "</div>";
                echo "<div class='alerts'> نمبر دوا یافت نشد " . $drugName. "برای"; echo "</div>";
                continue;  // Skip this iteration if Drug_ID is not found
            }
        }else{
            echo "<div class='alerts'> لطفا نام دوا را وارد کنید "; echo "خط" . $i; echo "</div>";
        }
        $Expiration = $_POST["Expiration_$i"];
        $Cost = $_POST["Cost_$i"];
        $Price = $_POST["Price_$i"];
        $Initial_Amount = $_POST["Initial_Amount_$i"];
       
        
    
        $sql = "insert into inventory (Drug_ID, Expiration, Cost, Price, Initial_Amount, Amount_Left) values ('$Drug_ID', '$Expiration', '$Cost', '$Price',
                '$Initial_Amount', '$Initial_Amount')";
        if(mysqli_query($connect, $sql)){
            echo "Record has been inserted";
        }else{echo "Failed";}
    }

?>