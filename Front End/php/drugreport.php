<?php

    include 'connection.php';
    $query = "select * from drugs_view order by drug_name asc";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<div class='alerts'>". $num_rows. " Records</div>";
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th data-key='drug-id'>Drug ID</th>
                    <th data-key='drug-name'>Name</th>
                    <th data-key='ingredients'>Ingredients</th>
                    <th data-key='quantity-pb'>PB</th>
                    <th data-key='company-name'>Company Name</th>
                    <th data-key='type'>Type</th>
                    <th data-key='demo'>Demography</th>
                    <th data-key='actions' colspan='2'>Actions</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['drug_id'] . "</td>";
            echo "<td>" . $r['drug_name'] . "</td>";
            echo "<td>" . $r['ingredient'] . "</td>";
            echo "<td>" . $r['PB'] . "</td>";
            echo "<td>" . $r['company'] . "</td>";
            echo "<td>" . $r['type'] . "</td>";
            echo "<td>" . $r['demo'] . "</td>";
            echo "<td>
            <form action='updatedrugs.php' method='GET'>
                <input type='hidden' name='Drug_ID' value='" . $r['drug_id'] . "'>
                <input type='hidden' name='Comp' value='" . $r['company'] . "'>
                <input type='hidden' name='Drug_Name' value='" . $r['drug_name'] . "'>
                <input type='hidden' name='Ingredient' value='" . $r['ingredient'] . "'>
                <input type='hidden' name='Tablet_PB' value='" . $r['PB'] . "'>
                <input type='hidden' name='Type' value='" . $r['type'] . "'>
                <input type='hidden' name='Demo' value='" . $r['demo'] . "'>

                <button data-key='update-button' type='submit' class=' btn-link'>Update</button>
            </form>
          </td>";
            echo "<td>
            <form action='updatedrugs.php' method='GET'>
                <input type='hidden' name='Drug_ID' value='" . $r['drug_id'] . "'>
                <input type='hidden' name='Comp' value='" . $r['company'] . "'>
                <input type='hidden' name='Drug_Name' value='" . $r['drug_name'] . "'>
                <input type='hidden' name='Ingredient' value='" . $r['ingredient'] . "'>
                <input type='hidden' name='Tablet_PB' value='" . $r['PB'] . "'>
                <input type='hidden' name='Type' value='" . $r['type'] . "'>
                <input type='hidden' name='Demo' value='" . $r['demo'] . "'>
                <button data-key='delete-button' type='submit' class=' btn-link'>Delete</button>
            </form>
          </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>