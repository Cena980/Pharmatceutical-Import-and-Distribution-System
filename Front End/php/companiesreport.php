<?php

    include 'connection.php';
    $query = "select * from companies";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<thead><tr>
                    <th>Company ID</th><th>Company Name</th><th>Head Quarters</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th data-key='actions' colspan='3'>Actions</th>
                </tr></thead><tbody>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Comp_ID'] . "</td>";
            echo "<td>" . $r['Comp_Name'] . "</td>";
            echo "<td>" . $r['Head_Quarters'] . "</td>";
            echo "<td>" . $r['Phone'] . "</td>";
            echo "<td>" . $r['Email'] . "</td>";
            echo "<td>
            <form action='updatecompanies.php' method='GET'>
                <input type='hidden' name='Comp_ID' value='" . $r['Comp_ID'] . "'>
                <input type='hidden' name='Comp_Name' value='" . $r['Comp_Name'] . "'>
                <input type='hidden' name='Head_Quarters' value='" . $r['Head_Quarters'] . "'>
                <input type='hidden' name='Phone' value='" . $r['Phone'] . "'>
                <input type='hidden' name='Email' value='" . $r['Email'] . "'>
                <button class='btn-link' type='submit'>Update</button>
            </form>
          </td>";
          echo "<td>
            <form action='updatecompanies.php' method='GET'>
            <input type='hidden' name='Comp_ID' value='" . $r['Comp_ID'] . "'>
            <input type='hidden' name='Comp_Name' value='" . $r['Comp_Name'] . "'>
            <input type='hidden' name='Head_Quarters' value='" . $r['Head_Quarters'] . "'>
            <input type='hidden' name='Phone' value='" . $r['Phone'] . "'>
            <input type='hidden' name='Email' value='" . $r['Email'] . "'>
            <button class='btn-link' type='submit'>Delete</button>
        </form>
        </td>";
        echo "<td>
            <form action='companiesReport.php' method='GET'>
            <input type='hidden' name='Comp_ID' value='" . $r['Comp_ID'] . "'>
            <input type='hidden' name='Comp_Name' value='" . $r['Comp_Name'] . "'>
            <button class='btn-link' type='submit'>Reports</button>
        </form>
        </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No records found.";  
    }
?>