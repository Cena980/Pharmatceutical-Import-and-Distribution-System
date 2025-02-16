<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Sales Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <origin>
        <div id="over"><h1 data-key="sales">Reports</h1></div>
        <div class="search-over">
            <div class="barr">
            <button onclick="resetSearch()" id="btn-circle" ><img src="../images/clear.png"></button>
                <form name="searchreports" method="post">
                    <input type="text" placeholder="Search for Reports" name="query" id="searchreports" required data-key="search-placeholder">
                </form>
                <button class="button" type="submit" onclick="reports()" data-key="search-button">Search</button>
            </div>
        </div>
        <div id="search_result"></div>
        <div class="button-group">
            <button data-key="insert-over" class="btn btn-save" onclick="location.href='addsales.php'">Add</button>
        </div>
        <div class="inventory">
            <div class="invenroy-left">
                <div class="section_title">Monthly Sales Report</div>
                <div class="chart">
                </div>
            </div>
            <div class="inventory-right">
                <div class="section_title">Yearly Sales Report</div>
                <div class="chart">
                    <!-- January -->
                    <div class="bar-container">
                    <div class="bar" style="height: 100px;"></div>
                    <div class="month">2022</div>
                    </div>
                    <!-- February -->
                    <div class="bar-container">
                    <div class="bar" style="height: 150px;"></div>
                    <div class="month">2023</div>
                    </div>
                    <!-- March -->
                    <div class="bar-container">
                    <div class="bar" style="height: 120px;"></div>
                    <div class="month">2024</div>
                    </div>
                    <!-- April -->
                    <div class="bar-container">
                    <div class="bar" style="height: 180px;"></div>
                    <div class="month">2025</div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
        </origin>
        <?php include '../php/footer.php' ?>
        <script>
           const salesData = [
                { month: 'Jan', amount: 5000 },
                { month: 'Feb', amount: 8000 },
                { month: 'Mar', amount: 12000 },
                { month: 'Apr', amount: 7000 },
                { month: 'May', amount: 9000 },
                { month: 'Jun', amount: 11000 },
                { month: 'Jul', amount: 5000 },
                { month: 'Aug', amount: 8000 },
                { month: 'Sep', amount: 12000 },
                { month: 'Oct', amount: 7000 },
                { month: 'Nov', amount: 9000 },
                { month: 'Dec', amount: 11000 }
            ];

            const chart = document.querySelector('.chart');

            // Find min and max sales first
            const amounts = salesData.map(data => data.amount);
            const minAmount = Math.min(...amounts);
            const maxAmount = Math.max(...amounts);

            // Function to interpolate colors between red and green
            function getBarColor(amount, min, max) {
                const ratio = (amount - min) / (max - min); // Normalize to range [0,1]
                const red = Math.round(255 * (1 - ratio));  // Decrease red as sales increase
                const green = Math.round(255 * ratio);      // Increase green as sales increase
                return `rgb(${red}, ${green}, 76)`; // Keeps some depth to the color
            }

            // Loop to generate bars dynamically
            salesData.forEach(data => {
                const barContainer = document.createElement('div');
                barContainer.classList.add('bar-container');

                const bar = document.createElement('div');
                bar.classList.add('bar');
                bar.style.height = `${data.amount / 100}px`;
                bar.setAttribute('data-amount', data.amount);  // Store numeric value
                bar.style.backgroundColor = getBarColor(data.amount, minAmount, maxAmount);

                const month = document.createElement('div');
                month.classList.add('month');
                month.textContent = data.month;

                barContainer.appendChild(bar);
                barContainer.appendChild(month);
                chart.appendChild(barContainer);
            });

            // Add event listener to the input field
            document.getElementById('searchreports').addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent the default form submission
                    reports(); // Call the drugs function to perform the search
                }
            });
            async function reports() {
                const searchTerm = document.getElementById('searchreports').value.trim();
                const resultDiv = document.getElementById('search_result');
                
                // Clear the previous result
                resultDiv.innerHTML = '';

                if (searchTerm) {
                    try {
                        // Fetch the search results from the backend
                        const response = await fetch(`../php/searchreports.php?query=${encodeURIComponent(searchTerm)}`);
                        
                        if (!response.ok) {
                            throw new Error('Error fetching search results.');
                        }

                        const result = await response.text(); // Use .json() if the backend sends JSON
                        resultDiv.innerHTML = result;
                    } catch (error) {
                        resultDiv.innerHTML = `<p style="color: red; width: 150px; margin: auto; margin-bottom:20px;">Error: ${error.message}</p>`;
                    }
                } else {
                    resultDiv.innerHTML = '<p style="color: red; width: 150px; margin: auto; margin-bottom:20px;">Please enter a search term.</p>';
                }
            }
            function resetSearch(){
                document.getElementById('searchreports').value= '';
                document.getElementById('search_result').innerHTML = '';
            }

        </script>
    </body>
</html>