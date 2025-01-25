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
        
        $sql = "select * from drugs where Comp_ID = '$Comp_ID' and Drug_Name = '$Drug_Name' and 
        Ingredient = '$Ingredients' and Tablet_PB = '$Tablet_PB' and 
        Type_ID ='$Type_ID' and Demo_ID = '$Demo_ID'";
        $res = mysqli_query($connect, $sql);

        $num_rows = mysqli_num_rows($res);
        if($num_rows>0){
            echo "Drug Already Exists";
        }else{
            $sql = "insert into drugs (Comp_ID, Drug_Name, Ingredient, Tablet_PB, Type_ID, Demo_ID)  values ('$Comp_ID', '$Drug_Name',
            '$Ingredients', '$Tablet_PB', '$Type_ID','$Demo_ID')";
            if(mysqli_query($connect, $sql)){
                echo "Record has been inserted";
            }else{echo "Failed";}
        }
    }
?>
