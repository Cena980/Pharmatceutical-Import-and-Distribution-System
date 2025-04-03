<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales Page</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <?php include '../php/header2.php'; ?>
    
    <div id="over">
        <h1 data-key="sales">Reports</h1>
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
    
    <div id="report-container"></div>
    
    <div class="button-group">
        <button data-key="insert-over" class="btn btn-save" onclick="location.href='addsales.php'">Add</button>
    </div>
    
    <div id="over"><h2>Report (Last 7 Days)</h2></div>
    <div id="tblreport-container">
        <!-- The PHP file prints the table and builds the $data array -->
        <?php include '../php/7_DayReport.php'; ?>
    </div>

    <div class="dashboard-grid">
    <!-- Sales Graph -->
    <div class="graph-container">
        <h3>Sales (Last 7 Days)</h3>
        <div id="sales-chart" class="chart"></div>
    </div>
    
    <!-- Purchases Graph -->
    <div class="graph-container">
        <h3>Purchases (Last 7 Days)</h3>
        <div id="purchases-chart" class="chart"></div>
    </div>
    
    <!-- Expenses Graph -->
    <div class="graph-container">
        <h3>Expenses (Last 7 Days)</h3>
        <div id="expenses-chart" class="chart"></div>
    </div>
    
    <!-- Net Income Graph -->
    <div class="graph-container">
        <h3>Net Income (Last 7 Days)</h3>
        <div id="netincome-chart" class="chart"></div>
    </div>
</div>
<?php include '../php/footer.php' ?>

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
                const resultDiv = document.getElementById('report-container');
                
                // Clear the previous result
                resultDiv.innerHTML = '';

                if (searchTerm) {
                    try {
                        // Fetch the search results from the backend
                        const response = await fetch(`../php/SearchReport.php?date=${encodeURIComponent(searchTerm)}`);
                        
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


</body>
</html>
