<?php
    include '../php/connection.php';
    $Comp_ID=$_GET['Comp_ID'];
    $date = $_GET['date'];

    $graphData = [
        'sales' => [],
    ];

    // Start compact report container
    echo '<div class="compact-report">';

    // Modified function to accept &$graphData reference
    function generateCompactTable($title, $columns, $date, $connect, $Comp_ID, &$graphData) {
        echo '<div class="report-section">';
        echo '<h3>' . htmlspecialchars($title) . '</h3>';
        echo '<div class="table-scroll">';
        echo '<table class="compact-table">';
        echo '<thead><tr><th>Date</th>';
        
        foreach ($columns as $col) {
            echo '<th>' . htmlspecialchars($col['title']) . '</th>';
        }
        echo '</tr></thead><tbody>';
        while ($connect->more_results()) $connect->next_result();
        $query = "call drugwholesale.CompanySalesReport($Comp_ID, '$date');";
        $res = mysqli_query($connect, $query);
        
        if ($res && $r = mysqli_fetch_assoc($res)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($date) . '</td>';
            
            foreach ($columns as $col) {
                echo '<td>' . htmlspecialchars($r[$col['key']]) . '</td>';
                
                // Collect data for graphs if specified
                if (isset($col['graph'])) {
                    $graphData[$col['graph']][] = [
                        'date' => $date,
                        'amount' => (int)$r[$col['key']]
                    ];
                }
            }
            echo '</tr>';
            if ($res) mysqli_free_result($res);
        }
        
        echo '</tbody></table></div></div>';
    }

    // Call functions with $graphData reference
    generateCompactTable('Sales Performance', [
        ['title' => 'Sales', 'key' => 'total_sales', 'graph' => 'sales'],
        ['title' => 'Received', 'key' => 'total_received'],
        ['title' => 'Debts', 'key' => 'total_debts']
    ], $date, $connect, $Comp_ID, $graphData);
    


    echo '</div>'; // Close compact-report container

    // Debug output before sending to JavaScript
    echo "<!-- Graph Data: " . print_r($graphData, true) . " -->";

    // Pass all data to JavaScript
    echo "<script>const graphData = " . json_encode($graphData) . ";</script>";
?>