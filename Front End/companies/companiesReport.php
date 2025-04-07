<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Sales Reports
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1>Sales Report for Company</h1></div>
        <div class="fixed-input-two">
                <div class="form-group">
                    <label data-key="comp-id" for="Comp_ID">Company ID</label>
                    <input type="number" name="Comp_ID" id="Comp_ID" readonly>
                </div>
                <div class="form-group">
                    <label data-key="comp-name" for="Comp_Name">Company Name</label>
                    <input type="text" name="Comp_Name" id="Comp_Name" readonly>
                </div>
            </div>
        <div class="search-over">
            <div class="barr">
                <button onclick="resetSearch()" id="btn-circle">
                    <img src="../images/clear.png" alt="Clear Search">
                </button>
                <form name="searchreports" method="post">
                    <input type="date" placeholder="Search for Reports (yyyy-mm-dd)" name="query" id="searchreports" required data-key="search-placeholder">
                </form>
                <button class="button" type="submit" onclick="Reports()" data-key="search-button">Search</button>
            </div>
        </div>
        <div id="report-container-one"></div>
        <div id="over">
            <h1>Last Seven Days</h1>
        </div>
        <?php
            include '../php/connection.php';
            $Comp_ID=$_GET['Comp_ID'];

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
            ];

            // Start compact report container
            echo '<div class="compact-report">';

            // Modified function to accept &$graphData reference
            function generateCompactTable($title, $columns, $dates, $connect, $Comp_ID, &$graphData) {
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
                    }
                    if ($res) mysqli_free_result($res);
                }
                
                echo '</tbody></table></div></div>';
            }

            // Call functions with $graphData reference
            generateCompactTable('Sales Performance', [
                ['title' => 'Sales', 'key' => 'total_sales', 'graph' => 'sales'],
                ['title' => 'Received', 'key' => 'total_received'],
                ['title' => 'Debts', 'key' => 'total_debts']
            ], $dates, $connect, $Comp_ID, $graphData);
            


            echo '</div>'; // Close compact-report container

            // Debug output before sending to JavaScript
            echo "<!-- Graph Data: " . print_r($graphData, true) . " -->";

            // Pass all data to JavaScript
            echo "<script>const graphData = " . json_encode($graphData) . ";</script>";
            ?>
        <div class="dashboard-grid-one">
            <!-- Sales Graph -->
            <div class="graph-container">
                <h3>Company Sales (Last 7 Days)</h3>
                <div id="sales-chart" class="chart"></div>
            </div>
        </div>
        <?php include '../php/footer.php' ?>
    </body>
    <script>
                    window.onload = function () {
                const urlParams = new URLSearchParams(window.location.search);
        
                // Populate input fields with values from URL parameters
                document.getElementById('Comp_ID').value = urlParams.get('Comp_ID') || '';
                document.getElementById('Comp_Name').value = urlParams.get('Comp_Name') || '';
            };
        document.addEventListener('DOMContentLoaded', function() {
            // Debug the received data
            console.log("Received graphData:", graphData);
            
            // Colors for different graphs
            const colors = {
                sales: '#4CAF50',       // Green
            };
            
            // Create all graphs
            createGraph('sales-chart', graphData.sales, colors.sales);
            
            function createGraph(containerId, data, color) {
                const container = document.getElementById(containerId);
                if (!container) {
                    console.error(`Container #${containerId} not found`);
                    return;
                }
                
                container.innerHTML = '';
                
                if (!data || !data.length) {
                    console.warn(`No data available for ${containerId}`);
                    container.innerHTML = "<p>No data available</p>";
                    return;
                }
                
                // Calculate scaling factor based on absolute values
                const amounts = data.map(item => Math.abs(item.amount));
                const maxAmount = Math.max(...amounts);
                const scaleFactor = maxAmount > 0 ? (200 / maxAmount) : 1;
                
                data.forEach(item => {
                    const barContainer = document.createElement('div');
                    barContainer.classList.add('bar-container');
                    
                    const bar = document.createElement('div');
                    bar.classList.add('bar');
                    bar.style.height = `${Math.abs(item.amount) * scaleFactor}px`;
                    
                    // Special handling for negative net income
                    if (item.amount < 0 && containerId === 'netincome-chart') {
                        bar.style.backgroundColor = '#F44336'; // Red for negative
                    } else {
                        bar.style.backgroundColor = color;
                    }
                    
                    const amountLabel = document.createElement('div');
                    amountLabel.textContent = item.amount;
                    amountLabel.className = 'bar-value';
                    
                    const dateLabel = document.createElement('div');
                    dateLabel.classList.add('month');
                    dateLabel.textContent = item.date;
                    
                    barContainer.appendChild(amountLabel);
                    barContainer.appendChild(bar);
                    barContainer.appendChild(dateLabel);
                    container.appendChild(barContainer);
                });
            }
        });
        async function Reports() {
                const searchTerm = document.getElementById('searchreports').value.trim();
                const Comp_ID = document.getElementById('Comp_ID').value;
                const resultDiv = document.getElementById('report-container-one');
                
                // Clear the previous result
                resultDiv.innerHTML = '';

                if (searchTerm) {
                    try {
                        // Fetch the search results from the backend
                        const response = await fetch(`../php/SearchCompanyReport.php?date=${encodeURIComponent(searchTerm)}&Comp_ID=${encodeURIComponent(Comp_ID)}`);
                        
                        if (!response.ok) {
                            throw new Error('Error fetching search results.');
                        }

                        const result = await response.text(); // Use .json() if the backend sends JSON
                        resultDiv.innerHTML = result;
                    } catch (error) {
                        resultDiv.innerHTML = `<p style="color: red; font-weight:bold; width: 150px; margin: auto; margin-bottom:20px; text-align:center;">Error: ${error.message}</p>`;
                    }
                } else {
                    resultDiv.innerHTML = '<p style="color: red; font-weight:bold; width: 150px; margin: auto; margin-bottom:20px; text-align:center;">Please enter a search term.</p>';
                }
            }
            function resetSearch(){
                document.getElementById('searchreports').value= '';
                document.getElementById('report-container').innerHTML = '';
            }
    </script>
</html>
