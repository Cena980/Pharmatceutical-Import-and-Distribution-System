<?php
    include 'connection.php';

    $Sale_ID = $_POST['Sales_ID'];
    $sql = "delete from sales where Sales_ID = '$Sale_ID' ";
    if(mysqli_query($connect, $sql)){
        echo "Record has been Deleted";
    }else{echo "Failed";}

?>