<?php
include 'connection.php';
$date = $_GET['date'];

echo "<table border='1' border-collapse=collapse id='tblreport'>";
echo '<thead>
        <tr>
            <th data-key="StartDate">Start Date</th>
            <th data-key="TotalSales">Total Sales</th>
            <th data-key="TotalReceived">Total Received</th>
            <th data-key="TotalDebts">Total Debts</th>
            <th data-key="TotalPurchases">Total Purchases</th>
            <th data-key="TotalPaid">Total Paid</th>
            <th data-key="TotalOwed">Total Owed</th>
            <th data-key="TotalExpenses">Total Expenses</th>
            <th data-key="NetIncome">Net Income</th>
        </tr>
      </thead>
      <tbody>';

    $query = "CALL drugwholesale.report('$date');";
    $res = mysqli_query($connect, $query);

    if ($res) {
        while ($r = mysqli_fetch_assoc($res)) {
            // Output the table row
            echo "<tr>";
            echo "<td>" . $r['StartDate'] . "</td>";
            echo "<td>" . $r['TotalSales'] . "</td>";
            echo "<td>" . $r['TotalReceived'] . "</td>";
            echo "<td>" . $r['TotalDebts'] . "</td>";
            echo "<td>" . $r['TotalPurchases'] . "</td>";
            echo "<td>" . $r['TotalPaid'] . "</td>";
            echo "<td>" . $r['TotalOwed'] . "</td>";
            echo "<td>" . $r['TotalExpenses'] . "</td>";
            echo "<td>" . $r['NetIncome'] . "</td>";
            echo "</tr>";
        }
        mysqli_free_result($res);
    }

echo "</tbody></table>";
?>