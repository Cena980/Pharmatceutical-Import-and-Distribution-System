<?php
    include 'connection.php';

    $Drug_ID = $_POST['Drug_ID'];
    

    $sql = "delete from drugs where Drug_ID = '$Drug_ID' ";
    if(mysqli_query($connect, $sql)){
        echo "Record has been Deleted";
    }else{echo "Failed";}

?>