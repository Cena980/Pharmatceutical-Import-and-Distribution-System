<?php
    include 'connection.php';

    $Drug_ID = $_POST['Drug_ID'];
    $Comp_ID = $_POST['Comp_ID'];
    $Drug_Name = $_POST['Drug_Name'];
    $Ingredients = $_POST['Ingredients'];
    $Tablet_PB = $_POST['Tablet_PB'];
    $Type_ID = $_POST['Type_ID'];
    $Demo_ID = $_POST['Demo_ID'];
    

    $sql = "update drugs set Comp_ID = '$Comp_ID', Drug_Name = '$Drug_Name', 
        Ingredient = '$Ingredients', Tablet_PB = '$Tablet_PB', 
        Type_ID ='$Type_ID', Demo_ID = '$Demo_ID' where Drug_ID = '$Drug_ID'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>