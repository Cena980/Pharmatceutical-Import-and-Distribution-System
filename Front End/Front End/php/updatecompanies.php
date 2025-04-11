<?php
    include 'connection.php';

    $Comp_ID = $_POST['Comp_ID'];
    $Comp_Name = $_POST['Comp_Name'];
    $Head_Quarters = $_POST['Head_Quarters'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];

    $sql = "update companies set Comp_Name = '$Comp_Name', Head_Quarters = '$Head_Quarters', 
        Phone = '$Phone', Email = '$Email' where Comp_ID = '$Comp_ID'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>