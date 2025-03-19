<?php
    include 'connection.php';

    $type = $_POST['type'];

   
    

    $sql = "insert into drug_type (Drug_Type) values ('$type')";
    if(mysqli_query($connect, $sql)){
        echo "Record has been inserted";
    }else{echo "Failed";}

?>