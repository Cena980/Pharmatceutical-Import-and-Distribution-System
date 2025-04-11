<?php
include 'connection.php';

function getLast7Days() {
    $dates = [];
    for ($i = 0; $i < 30; $i++) {
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

// Start compact report container
echo '<div class="compact-report">';

// Modified function to accept &$graphData reference
function generateCompactTable($title, $columns, $dates, $connect, &$graphData) {
    echo '<div class="report-section">';
    echo '<h3>' . htmlspecialchars($title) . '</h3>';
    echo '<div class="table-scroll">';
    echo '<table class="compact-table">';
    echo '<thead><tr><th>Date</th>';
    
    foreach ($columns as $col) {
        echo '<th>' . htmlspecialchars($col['title']) . '</th>';
    }
    echo '</tr></thead><tbody>';
    
    foreach ($dates as $date) {
        while ($connect->more_results()) $connect->next_result();
        $query = "CALL drugwholesale.report('$date');";
        $res = mysqli_query($connect, $query);
        
        if ($res && $r = mysqli_fetch_assoc($res)) {
            echo '<tr>';
            $formattedDate = date('M j', strtotime($r['StartDate']));
            echo '<td>' . htmlspecialchars($formattedDate) . '</td>';
            
            foreach ($columns as $col) {
                echo '<td>' . htmlspecialchars($r[$col['key']]) . '</td>';
                
                // Collect data for graphs if specified
                if (isset($col['graph'])) {
                    $graphData[$col['graph']][] = [
                        'date' => $formattedDate,
                        'amount' => (int)$r[$col['key']]
                    ];
                }
            }
            echo '</tr>';
        }
        if ($res) mysqli_free_result($res);
    }
    
    echo '</tbody></table></div></div>';
}

// Call functions with $graphData reference
generateCompactTable('Sales Performance', [
    ['title' => 'Sales', 'key' => 'TotalSales', 'graph' => 'sales'],
    ['title' => 'Received', 'key' => 'TotalReceived'],
    ['title' => 'Debts', 'key' => 'TotalDebts']
], $dates, $connect, $graphData);

generateCompactTable('Purchases & Payments', [
    ['title' => 'Purchases', 'key' => 'TotalPurchases', 'graph' => 'purchases'],
    ['title' => 'Paid', 'key' => 'TotalPaid'],
    ['title' => 'Owed', 'key' => 'TotalOwed']
], $dates, $connect, $graphData);

generateCompactTable('Expenses', [
    ['title' => 'Amount', 'key' => 'TotalExpenses', 'graph' => 'expenses']
], $dates, $connect, $graphData);

generateCompactTable('Net Income', [
    ['title' => 'Amount', 'key' => 'NetIncome', 'graph' => 'netIncome']
], $dates, $connect, $graphData);

echo '</div>'; // Close compact-report container

// Debug output before sending to JavaScript
echo "<!-- Graph Data: " . print_r($graphData, true) . " -->";

// Pass all data to JavaScript
echo "<script>const graphData = " . json_encode($graphData) . ";</script>";
?>