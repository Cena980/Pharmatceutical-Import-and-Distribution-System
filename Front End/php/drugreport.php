<?php

    include 'connection.php';
    $query = "select * from drugs";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th>Drug ID</th><th>Company ID</th><th>Name</th><th>Ingredients</th>
                    <th>PB</th><th>Type ID</th><th>Demo ID</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Drug_ID'] . "</td>";
            echo "<td>" . $r['Comp_ID'] . "</td>";
            echo "<td>" . $r['Drug_Name'] . "</td>";
            echo "<td>" . $r['Ingredient'] . "</td>";
            echo "<td>" . $r['Tablet_PB'] . "</td>";
            echo "<td>" . $r['Type_ID'] . "</td>";
            echo "<td>" . $r['Demo_ID'] . "</td>";
            echo "<td>
            <form action='updatedrugs.html' method='GET'>
                <input type='hidden' name='Drug_ID' value='" . $r['Drug_ID'] . "'>
                <input type='hidden' name='Comp_ID' value='" . $r['Comp_ID'] . "'>
                <input type='hidden' name='Drug_Name' value='" . $r['Drug_Name'] . "'>
                <input type='hidden' name='Ingredient' value='" . $r['Ingredient'] . "'>
                <input type='hidden' name='Tablet_PB' value='" . $r['Tablet_PB'] . "'>
                <input type='hidden' name='Type_ID' value='" . $r['Type_ID'] . "'>
                <input type='hidden' name='Demo_ID' value='" . $r['Demo_ID'] . "'>

                <button type='submit' class=' btn-link'>Update</button>
            </form>
            <form action='updatedrugs.html' method='GET'>
                <input type='hidden' name='Drug_ID' value='" . $r['Drug_ID'] . "'>
                <input type='hidden' name='Comp_ID' value='" . $r['Comp_ID'] . "'>
                <input type='hidden' name='Drug_Name' value='" . $r['Drug_Name'] . "'>
                <input type='hidden' name='Ingredient' value='" . $r['Ingredient'] . "'>
                <input type='hidden' name='Tablet_PB' value='" . $r['Tablet_PB'] . "'>
                <input type='hidden' name='Type_ID' value='" . $r['Type_ID'] . "'>
                <input type='hidden' name='Demo_ID' value='" . $r['Demo_ID'] . "'>
                <button type='submit' class=' btn-link'>Delete</button>
            </form>
          </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>