<?php
    include 'connection.php';

    $Share_ID = $_POST['Share_ID'];
    

    $sql = "delete from shareholders where Share_ID = '$Share_ID' ";
    if(mysqli_query($connect, $sql)){
        echo "Record has been Deleted";
    }else{echo "Failed";}

?>