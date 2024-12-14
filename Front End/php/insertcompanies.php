<?php
    include 'connection.php';

    $Comp_ID = $_POST['Comp_ID'];
    $Comp_Name = $_POST['Comp_Name'];
    $Head_Quarters = $_POST['Head_Quarters'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
   
    

    $sql = "insert into companies values ('$Comp_ID', '$Comp_Name', '$Head_Quarters',
            '$Phone', '$Email')";
    if(mysqli_query($connect, $sql)){
        echo "Record has been inserted";
    }else{echo "Failed";}

?>