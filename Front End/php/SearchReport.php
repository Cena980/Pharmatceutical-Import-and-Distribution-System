<?php
include 'connection.php';

$date = $_GET['date'];
$query = "CALL drugwholesale.report('$date', '$date');";
$res = mysqli_query($connect, $query);

if ($res) {
    $data = mysqli_fetch_assoc($res);
    mysqli_free_result($res);
    
    // Function to generate grouped category tables
    function generateGroupedTable($title, $items) {
        echo '<div class="category-table">';
        echo '<h3>' . htmlspecialchars($title) . '</h3>';
        echo '<table border="1" class="data-table">';
        echo '<tr><th>Metric</th><th>Amount</th></tr>';
        
        foreach ($items as $itemTitle => $value) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($itemTitle) . '</td>';
            echo '<td>' . htmlspecialchars($value) . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
        echo '</div>';
    }

    // Sales Group Table
    generateGroupedTable('Sales Summary', [
        'Total Sales' => $data['TotalSales'],
        'Amount Received' => $data['TotalReceived'],
        'Outstanding Debts' => $data['TotalDebts']
    ]);
    
    // Purchases Group Table
    generateGroupedTable('Purchases Summary', [
        'Total Purchases' => $data['TotalPurchases'],
        'Amount Paid' => $data['TotalPaid'],
        'Amount Owed' => $data['TotalOwed']
    ]);
    
    // Expenses Table (standalone)
    generateGroupedTable('Expenses', [
        'Total Expenses' => $data['TotalExpenses']
    ]);
    
    // Net Income Table (standalone)
    generateGroupedTable('Net Income', [
        'Net Profit/Loss' => $data['NetIncome']
    ]);
    
} else {
    echo "<p>Error retrieving report data.</p>";
}
?>