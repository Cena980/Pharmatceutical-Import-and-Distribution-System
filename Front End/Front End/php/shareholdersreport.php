<?php

    include 'connection.php';
    $query = "select * from shareholders";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th>ID</th><th>Name</th><th>Phone</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Share_ID'] . "</td>";
            echo "<td>" . $r['Holder_Name'] . "</td>";
            echo "<td>" . $r['Phone'] . "</td>";
            echo "<td>
                    <form action='updateshareholders.php' method='GET'>
                        <input type='hidden' name='Share_ID' value='" . $r['Share_ID'] . "'>
                        <input type='hidden' name='Holder_Name' value='" . $r['Holder_Name'] . "'>
                        <input type='hidden' name='Phone' value='" . $r['Phone'] . "'>
                        <button type='submit' class=' btn-link'>Update</button>
                    </form>
                    <form action='updateshareholders.php' method='GET'>
                        <input type='hidden' name='Share_ID' value='" . $r['Share_ID'] . "'>
                        <input type='hidden' name='Holder_Name' value='" . $r['Holder_Name'] . "'>
                        <input type='hidden' name='Phone' value='" . $r['Phone'] . "'>
                        <button type='submit' class=' btn-link'>delete</button>
                    </form>
                </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>