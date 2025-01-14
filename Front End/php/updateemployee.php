<?php
    include 'connection.php';

    $Emp_ID = $_POST['Emp_ID'];
    $Tazkira = $_POST['Tazkira'];
    $Emp_Name = $_POST['Emp_Name'];
    $Emp_Last_Name = $_POST['Emp_Last_Name'];
    $Job_ID = $_POST['Job_ID'];
    $Salary = $_POST['Salary'];
    

    $sql = "update employees set Tazkira = '$Tazkira', Emp_Name = '$Emp_Name', 
        Emp_Last_Name = '$Emp_Last_Name', Job_ID = '$Job_ID', Salary_ID = '$Salary' where Emp_ID = '$Emp_ID'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>