<?php
    include 'connection.php';

    $Emp_ID = $_POST['Emp_ID'];
    $Tazkira = $_POST['Tazkira'];
    $Emp_Name = $_POST['Emp_Name'];
    $Emp_Last_Name = $_POST['Emp_Last_Name'];
    $Job_ID = $_POST['Job_ID'];
    $Salary = $_POST['Salary'];
   
    

    $sql = "insert into employees values ('$Emp_ID', '$Tazkira', '$Emp_Name',
            '$Emp_Last_Name', '$Job_ID', '$Salary')";
    if(mysqli_query($connect, $sql)){
        echo "Record has been inserted";
    }else{echo "Failed";}

?>