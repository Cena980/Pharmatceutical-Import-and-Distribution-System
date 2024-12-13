<?php
    include 'connection.php';

    $Share_ID = $_POST['Share_ID'];
    $Holder_Name = $_POST['Holder_Name'];
    $Phone = $_POST['Phone'];


    $sql = "update customer set Holder_Name = '$Holder_Name', Phone = '$Phone' where Share_ID = '$Share_ID'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>