<?php
    include 'connection.php';

    $Comp_ID = $_POST['Comp_ID'];
    

    $sql = "delete from companies where Comp_ID = '$Comp_ID' ";
    if(mysqli_query($connect, $sql)){
        echo "Record has been Deleted";
    }else{echo "Failed";}

?>