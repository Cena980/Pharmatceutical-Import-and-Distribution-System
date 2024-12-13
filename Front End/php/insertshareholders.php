<?php
    include 'connection.php';

    $Share_ID = $_POST['Share_ID'];
    $Holder_Name = $_POST['Holder_Name'];
    $Phone = $_POST['Phone'];

   
    

    $sql = "insert into shareholders values ('$Share_ID', '$Holder_Name', '$Phone')";
    if(mysqli_query($connect, $sql)){
        echo "Record has been inserted";
    }else{echo "Failed";}

?>