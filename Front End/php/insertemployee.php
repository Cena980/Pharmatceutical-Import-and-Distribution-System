<?php
    include 'connection.php';
    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    echo "Number of rows submitted: " . $qnt; 
    for ($i = 1; $i <= $qnt; $i++) {
        $Emp_ID = $_POST["Emp_ID_$i"];
        $Tazkira = $_POST["Tazkira_$i"];
        $Emp_Name = $_POST["Emp_Name_$i"];
        $Emp_Last_Name = $_POST["Emp_Last_Name_$i"];
        $Job_ID = $_POST["Job_ID_$i"];
        $Salary = $_POST["Salary_$i"];
       
        
    
        $sql = "insert into employees values ('$Emp_ID', '$Tazkira', '$Emp_Name',
                '$Emp_Last_Name', '$Job_ID', '$Salary')";
        if(mysqli_query($connect, $sql)){
            echo "Record has been inserted";
        }else{echo "Failed";}
    }
?>