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
            echo "<td>
                <form action='updateemployee.php' method='GET'>
                    <input type='hidden' name='Emp_ID' value='" . $r['Emp_ID'] . "'>
                    <input type='hidden' name='Tazkira' value='" . $r['Tazkira'] . "'>
                    <input type='hidden' name='Emp_Name' value='" . $r['Emp_Name'] . "'>
                    <input type='hidden' name='Emp_Last_Name' value='" . $r['Emp_Last_Name'] . "'>
                    <input type='hidden' name='Job_ID' value='" . $r['Job_ID'] . "'>
                    <input type='hidden' name='Salary_ID' value='" . $r['Salary_ID'] . "'>
                    <button type='submit' class=' btn-link'>Update</button>
                </form>
                <form action='updateemployee.php' method='GET'>
                    <input type='hidden' name='Emp_ID' value='" . $r['Emp_ID'] . "'>
                    <input type='hidden' name='Tazkira' value='" . $r['Tazkira'] . "'>
                    <input type='hidden' name='Emp_Name' value='" . $r['Emp_Name'] . "'>
                    <input type='hidden' name='Emp_Last_Name' value='" . $r['Emp_Last_Name'] . "'>
                    <input type='hidden' name='Job_ID' value='" . $r['Job_ID'] . "'>
                    <input type='hidden' name='Salary_ID' value='" . $r['Salary_ID'] . "'>
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