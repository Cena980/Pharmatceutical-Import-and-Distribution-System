<?php

    include 'connection.php';
    $query = "select * from drug_type";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<thead><tr>
                    <th data-key='drug-type'>Type ID</th>
                    <th data-key='drug-type'>Drug Type</th>
                    <th data-key='actions' colspan='2'>Actions</th>
                </tr></thead><tbody>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Type_ID'] . "</td>";
            echo "<td>" . $r['Drug_Type'] . "</td>";
            echo "<td>
                <form method='GET' action='updateDrugType.php'>
                <input type='hidden' name='Type_ID' value= '" .$r['Type_ID'] . "'>
                <input type='hidden' name='Drug_Type' value= '" .$r['Drug_Type'] . "'>
                <button data-key='delete-button' class='btn-link' type='submit'>Update</button>
                </form>
            </td>";
            echo "<td>
            <form method='GET' action='updateDrugType.php'>
            <input type='hidden' name='Type_ID' value= '" .$r['Type_ID'] . "'>
            <input type='hidden' name='Drug_Type' value= '" .$r['Drug_Type'] . "'>
            <button data-key='delete-button' class='btn-link' type='submit'>Delete</button>
            </form>
            </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No records found.";  
    }
?>