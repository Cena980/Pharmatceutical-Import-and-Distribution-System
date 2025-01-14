<?php
    include 'connection.php';

    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    echo "Number of rows submitted: " . $qnt; 
    for ($i = 1; $i <= $qnt; $i++) {
        $Comp_ID = $_POST["Comp_ID_$i"];
        $Drug_Name = $_POST["Drug_Name_$i"];
        $Ingredients = $_POST["Ingredients_$i"];
        $Tablet_PB = $_POST["Tablet_PB_$i"];
        $Type_ID = $_POST["Type_ID_$i"];
        $Demo_ID = $_POST["Demo_ID_$i"];
        
    
        $sql = "insert into drugs (Comp_ID, Drug_Name, Ingredient, Tablet_PB, Type_ID, Demo_ID)  values ('$Comp_ID', '$Drug_Name',
                '$Ingredients', '$Tablet_PB', '$Type_ID','$Demo_ID')";
        if(mysqli_query($connect, $sql)){
            echo "Record has been inserted";
        }else{echo "Failed";}
    }
?>
