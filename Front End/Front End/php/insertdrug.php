<?php
    include 'connection.php';

    $qnt = isset($_POST['qnt']) ? intval($_POST['qnt']) : 0;
    echo "Number of rows submitted: " . $qnt; 
    for ($i = 1; $i <= $qnt; $i++) {
        $Comp = $_POST["Comp_Name_$i"];
        if(!empty($Comp)){
            $comp = "SELECT Comp_ID FROM companies WHERE Comp_Name = '$Comp'";
            $Comp_ID_result = mysqli_query($connect, $comp);
        
            if ($Comp_ID_result) {
                $Comp_ID_row = mysqli_fetch_assoc($Comp_ID_result);
                $Comp_ID = $Comp_ID_row['Comp_ID'];
            } else {
                echo "<div class='alerts'> Could not fetch Comp ID for " . $drugName; echo "</div>";
                echo "<div class='alerts'> نمبر موجودی یافت نشد " . $drugName. "برای"; echo "</div>";
                continue;  // Skip this iteration if Comp_ID is not found
            }
        }else{
            echo "<div class='alerts'> لطفا نام دوا را وارد کنید "; echo "خط" . $i; echo "</div>";
        }

        $Drug_Name = $_POST["Drug_Name_$i"];
        $Ingredients = $_POST["Ingredients_$i"];
        $Tablet_PB = $_POST["Tablet_PB_$i"];

        $Type = $_POST["Type_$i"];
        if(!empty($Type)){
            $type = "SELECT Type_ID FROM drug_type WHERE Drug_Type = '$Type'";
            $Type_ID_result = mysqli_query($connect, $type);
        
            if ($Type_ID_result) {
                $Type_ID_row = mysqli_fetch_assoc($Type_ID_result);
                $Type_ID = $Type_ID_row['Type_ID'];
            } else {
                echo "<div class='alerts'> Could not fetch Type ID for " . $drugName; echo "</div>";
                echo "<div class='alerts'> نمبر نوعیت یافت نشد " . $drugName. "برای"; echo "</div>";
                continue;  // Skip this iteration if Type_ID is not found
            }
        }else{
            echo "<div class='alerts'> لطفا نام دوا را وارد کنید "; echo "خط" . $i; echo "</div>";
        }

        $Demo = $_POST["Demography_$i"];
        if(!empty($Demo)){
            $demo = "SELECT Demo_ID FROM demography WHERE Demo_Class = '$Demo'";
            $Demo_ID_result = mysqli_query($connect, $demo);
        
            if ($Demo_ID_result) {
                $Demo_ID_row = mysqli_fetch_assoc($Demo_ID_result);
                $Demo_ID = $Demo_ID_row['Demo_ID'];
            } else {
                echo "<div class='alerts'> Could not fetch Demo ID for " . $drugName; echo "</div>";
                echo "<div class='alerts'> نمبر بخش یافت نشد " . $drugName. "برای"; echo "</div>";
                continue;  // Skip this iteration if Demo_ID is not found
            }
        }else{
            echo "<div class='alerts'> لطفا نام دوا را وارد کنید "; echo "خط" . $i; echo "</div>";
        }


        
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
