<?php
    include 'connection.php';
    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    echo "Number of rows submitted: " . $qnt; 
    
    for ($i = 1; $i <= $qnt; $i++) {
        $Drug_ID = $_POST["Drug_ID_$i"];
        $Expiration = $_POST["Expiration_$i"];
        $Cost = $_POST["Cost_$i"];
        $Price = $_POST["Price_$i"];
        $Initial_Amount = $_POST["Initial_Amount_$i"];
       
        
    
        $sql = "insert into inventory (Drug_ID, Expiration, Cost, Price, Initial_Amount) values ('$Drug_ID', '$Expiration', '$Cost', '$Price',
                '$Initial_Amount')";
        if(mysqli_query($connect, $sql)){
            echo "Record has been inserted";
        }else{echo "Failed";}
    }

?>