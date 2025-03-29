<?php
include 'connection.php';

function getLast7Days() {
    $dates = [];
    for ($i = 0; $i < 7; $i++) {
        $dates[] = date('Y-m-d', strtotime("-$i days"));
    }
    return array_reverse($dates);
}

$dates = getLast7Days();
$graphData = [
    'sales' => [],
    'purchases' => [],
    'expenses' => [],
    'netIncome' => []
];

// Start the table with full header
echo "<table border='1' id='tblreport'>";
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

foreach ($dates as $date) {
    while ($connect->more_results()) {
        $connect->next_result();
    }

    $query = "CALL drugwholesale.report('$date');";
    $res = mysqli_query($connect, $query);

    if ($res) {
        while ($r = mysqli_fetch_assoc($res)) {
            // Output the complete table row
            echo "<tr>";
            echo "<td>" . htmlspecialchars($r['StartDate']) . "</td>";
            echo "<td>" . htmlspecialchars($r['TotalSales']) . "</td>";
            echo "<td>" . htmlspecialchars($r['TotalReceived']) . "</td>";
            echo "<td>" . htmlspecialchars($r['TotalDebts']) . "</td>";
            echo "<td>" . htmlspecialchars($r['TotalPurchases']) . "</td>";
            echo "<td>" . htmlspecialchars($r['TotalPaid']) . "</td>";
            echo "<td>" . htmlspecialchars($r['TotalOwed']) . "</td>";
            echo "<td>" . htmlspecialchars($r['TotalExpenses']) . "</td>";
            echo "<td>" . htmlspecialchars($r['NetIncome']) . "</td>";
            echo "</tr>";

            // Prepare data for all graphs
            $formattedDate = date('M j', strtotime($r['StartDate']));
            $graphData['sales'][] = ['date' => $formattedDate, 'amount' => (int)$r['TotalSales']];
            $graphData['purchases'][] = ['date' => $formattedDate, 'amount' => (int)$r['TotalPurchases']];
            $graphData['expenses'][] = ['date' => $formattedDate, 'amount' => (int)$r['TotalExpenses']];
            $graphData['netIncome'][] = ['date' => $formattedDate, 'amount' => (int)$r['NetIncome']];
        }
        mysqli_free_result($res);
    }
}

echo "</tbody></table>";

// Pass all data to JavaScript
echo "<script>const graphData = " . json_encode($graphData) . ";</script>";
?>