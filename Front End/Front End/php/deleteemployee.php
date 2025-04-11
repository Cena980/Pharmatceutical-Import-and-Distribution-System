<?php
    include 'connection.php';

    $Emp_ID = $_POST['Emp_ID'];
    

    $sql = "delete from employees where Emp_ID = '$Emp_ID' ";
    if(mysqli_query($connect, $sql)){
        echo "Record has been Deleted";
    }else{echo "Failed";}

?>