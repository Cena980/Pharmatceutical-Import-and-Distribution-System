<?php

    include 'connection.php';
    $query = "select * from employees";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<table border='1' id='tblreport'>";
        echo "<tr>
                    <th>Employee ID</th><th>Tazkira No</th><th>Name</th><th>Last Name</th>
                    <th>Job</th><th>Salary</th>
                </tr>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['Emp_ID'] . "</td>";
            echo "<td>" . $r['Tazkira'] . "</td>";
            echo "<td>" . $r['Emp_Name'] . "</td>";
            echo "<td>" . $r['Emp_Last_Name'] . "</td>";
            echo "<td>" . $r['Job_ID'] . "</td>";
            echo "<td>" . $r['Salary_ID'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";  
    }
?>