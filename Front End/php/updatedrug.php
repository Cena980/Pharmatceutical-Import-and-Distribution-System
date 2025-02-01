<?php
    include 'connection.php';

    $Drug_ID = $_POST['Drug_ID'];
    $Drug_Name = $_POST['Drug_Name'];
    $Ingredients = $_POST['Ingredients'];
    $Tablet_PB = $_POST['Tablet_PB'];

    $Comp = $_POST["Comp_Name"];
        if(!empty($Comp)){
            $comp = "SELECT Comp_ID FROM companies WHERE Comp_Name = '$Comp'";
            $Comp_ID_result = mysqli_query($connect, $comp);
        
            if ($Comp_ID_result) {
                $Comp_ID_row = mysqli_fetch_assoc($Comp_ID_result);
                $Comp_ID = $Comp_ID_row['Comp_ID'];
            } else {
                echo "<div class='alerts'> Could not fetch Comp ID for " . $drugName; echo "</div>";
                echo "<div class='alerts'> نمبر موجودی یافت نشد " . $drugName. "برای"; echo "</div>";
            }
        }else{
            echo "<div class='alerts'> لطفا نام دوا را وارد کنید "; echo "خط" . $i; echo "</div>";
        }
        $Type = $_POST["Type"];
        if(!empty($Type)){
            $type = "SELECT Type_ID FROM drug_type WHERE Drug_Type = '$Type'";
            $Type_ID_result = mysqli_query($connect, $type);
        
            if ($Type_ID_result) {
                $Type_ID_row = mysqli_fetch_assoc($Type_ID_result);
                $Type_ID = $Type_ID_row['Type_ID'];
            } else {
                echo "<div class='alerts'> Could not fetch Type ID for " . $drugName; echo "</div>";
                echo "<div class='alerts'> نمبر نوعیت یافت نشد " . $drugName. "برای"; echo "</div>";
            }
        }else{
            echo "<div class='alerts'> لطفا نام دوا را وارد کنید "; echo "خط" . $i; echo "</div>";
        }

        $Demo = $_POST["Demo"];
        if(!empty($Demo)){
            $demo = "SELECT Demo_ID FROM demography WHERE Demo_Class = '$Demo'";
            $Demo_ID_result = mysqli_query($connect, $demo);
        
            if ($Demo_ID_result) {
                $Demo_ID_row = mysqli_fetch_assoc($Demo_ID_result);
                $Demo_ID = $Demo_ID_row['Demo_ID'];
            } else {
                echo "<div class='alerts'> Could not fetch Demo ID for " . $drugName; echo "</div>";
                echo "<div class='alerts'> نمبر بخش یافت نشد " . $drugName. "برای"; echo "</div>";
            }
        }else{
            echo "<div class='alerts'> لطفا نام دوا را وارد کنید "; echo "خط" . $i; echo "</div>";
        }
    

    $sql = "update drugs set Comp_ID = '$Comp_ID', Drug_Name = '$Drug_Name', 
        Ingredient = '$Ingredients', Tablet_PB = '$Tablet_PB', 
        Type_ID ='$Type_ID', Demo_ID = '$Demo_ID' where Drug_ID = '$Drug_ID'";
    if(mysqli_query($connect, $sql)){
        echo "Record has been updated";
    }else{echo "Failed";}

?>