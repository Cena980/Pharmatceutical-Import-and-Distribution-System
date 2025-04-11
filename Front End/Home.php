<?php require 'php/functions.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Home Page
        </title>
        <link rel="stylesheet" href="css/home.css">
        <style>
            body {
                direction: ltr; /* Force left-to-right layout */
            }
        </style>
    </head>
    <body>
        <!-- fetching header from server  -->
        <?php include 'php/header1.php' ?>
        <origin>
        <main>
        <div class="left">
            <div data-key="goto" class="section_title">Go To</div>
            <div class="tables" onclick="location.href='invoices/invoiceManager.php'">
                <img class="logo1" src="images/invoice.png" alt="icon">
                <a data-key="invoice-manager" href="invoices/invoiceManager.php">Invoice Manager</a>
            </div>
            <div class="tables" onclick="location.href='backup/backup.php'">
                <img class="logo1" src="images/backup.png" alt="icon">
                <a data-key="database-backup" href="backup/backup.php">Database Backup</a>
            </div>
            <div class="tables" onclick="location.href='payments/payments.php'">
                <img class="logo1" src="images/payments.png" alt="icon">
                <a data-key="payments" href="payments/payments.php">Payment Processing</a>
            </div>
            <?php $tables = getTables(); ?>
            <?php
            foreach ($tables as $table) {
                $tableName = $table['table'] ?? null;
                if ($tableName) {
                    $filePath = strtolower($tableName) . '/' . strtolower($tableName) . '.php';
                    if (file_exists($filePath)) {
                        ?>
                        <div class="tables" onclick="location.href='<?php echo htmlspecialchars($filePath); ?>'">
                            <img class="logo1" src="images/<?php echo htmlspecialchars(($tableName)); ?>.png" alt="icon">
                            <a data-key="<?php echo htmlspecialchars(strtolower($tableName)); ?>" href="<?php echo $filePath; ?>">
                                <?php echo htmlspecialchars(ucfirst($tableName)); ?>
                            </a>
                        </div>
                        <?php
                    } else {
                        // Optionally, log or display a message if the file doesn't exist
                        // echo "File does not exist: $filePath";
                    }
                } else {
                    echo "Invalid table data.";
                }
            }
            ?>
        </div>

            <div class="right">
                <div data-key="products" class="section_title">Popular Products</div>
                <?php $Drugs = getDrugs(5) ?>
                <div class="product">
                    <?php
                        foreach($Drugs as $Drug){
                            ?>
                            <div class="product_left">
                                <img src="product.png" alt="product">
                            </div>
                            <div class="product_right" >
                                <p class="title">
                                    <a href="https://www.google.com/search?q=what is <?php echo $Drug['drug_name']?>"><?php echo $Drug['drug_name'] ?></a>
                                </p>
                                <p class="description">
                                    <?php echo $Drug['Ingredient'] ?>
                                </p>
                                <p class="description" style="font-weight:bold;">
                                    Total sales: <?php echo $Drug['total_sales'] ?>
                                </p>
                                <p class="price"><?php echo $Drug['Price']?> ؋</p>
                            </div>

                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="far_right">
                <div data-key="today" class="section_title">Today</div>
                <div id="report-container">Loading report...</div>
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let today = new Date().toISOString().split('T')[0];
                    fetch("php/SearchReport.php?date=" + today)
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById("report-container").innerHTML = data;
                        })
                        .catch(error => console.error("Error fetching report:", error));
                });
                </script>
            <div data-key="salesreport" class="section_title">This Month</div>
                <?php include 'php/30_DayReport.php'?>
            </div>
            
        </main>
        <div class="dashboard-grid-home">
            <!-- Sales Graph -->
            <div class="graph-container-home">
                <h3>Sales (Last 7 Days)</h3>
                <div id="sales-chart" class="chart-home"></div>
            </div>
            
            <!-- Purchases Graph -->
            <div class="graph-container-home">
                <h3>Purchases (Last 7 Days)</h3>
                <div id="purchases-chart" class="chart-home"></div>
            </div>
            
            <!-- Expenses Graph -->
            <div class="graph-container-home">
                <h3>Expenses (Last 7 Days)</h3>
                <div id="expenses-chart" class="chart-home"></div>
            </div>
            
            <!-- Net Income Graph -->
            <div class="graph-container-home">
                <h3>Net Income (Last 7 Days)</h3>
                <div id="netincome-chart" class="chart-home"></div>
            </div>
        </div>
        </origin>
        
        <script>
            
            document.addEventListener('DOMContentLoaded', function() {
                // Debug the received data
                console.log("Received graphData:", graphData);
                
                // Colors for different graphs
                const colors = {
                    sales: '#4CAF50',       // Green
                    purchases: '#2196F3',    // Blue
                    expenses: '#F44336',     // Red
                    netIncome: '#FFC107'     // Yellow
                };
                
                // Create all graphs
                createGraph('sales-chart', graphData.sales, colors.sales);
                createGraph('purchases-chart', graphData.purchases, colors.purchases);
                createGraph('expenses-chart', graphData.expenses, colors.expenses);
                createGraph('netincome-chart', graphData.netIncome, colors.netIncome);
                
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
                        barContainer.classList.add('bar-container-home');
                        
                        const bar = document.createElement('div');
                        bar.classList.add('bar-home');
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
                        dateLabel.classList.add('month-home');
                        dateLabel.textContent = item.date;
                        
                        barContainer.appendChild(amountLabel);
                        barContainer.appendChild(bar);
                        barContainer.appendChild(dateLabel);
                        container.appendChild(barContainer);
                    });
                }
            });
        </script>
        <!-- fetching footer from server -->
         <?php include 'php/footer.php' ?>
    </body>
</html>