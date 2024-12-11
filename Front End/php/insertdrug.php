<?php
    include 'connection.php';

    $Drug_ID = $_POST['Drug_ID'];
    $Comp_ID = $_POST['Comp_ID'];
    $Drug_Name = $_POST['Drug_Name'];
    $Ingredients = $_POST['Ingredients'];
    $Tablet_PB = $_POST['Tablet_PB'];
    $Expiration = $_POST['Expiration'];
    $Type_ID = $_POST['Type_ID'];
    $Demo_ID = $_POST['Demo_ID'];
    

    $sql = "insert into drugs values ('$Drug_ID', '$Comp_ID', '$Drug_Name',
            '$Ingredients', '$Tablet_PB', '$Expiration', '$Type_ID','$Demo_ID')";
    if(mysqli_query($connect, $sql)){
        echo "Record has been inserted";
    }else{echo "Failed";}

?>