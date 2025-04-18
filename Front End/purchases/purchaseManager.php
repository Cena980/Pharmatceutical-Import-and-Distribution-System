<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Purchase Manager
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <origin>
        <div id="over"><h1 data-key="sales">Purchase Manager</h1></div>
        <div class="search-over">
            <div class="barr">
            <button onclick="resetSearch()" id="btn-circle" ><img src="../images/clear.png"></button>
                <form name="searchPurchases" method="post">
                    <input type="text" placeholder="Search for purchases" name="query" id="searchPurchases" required data-key="search-placeholder">
                </form>
                <button class="button" type="submit" onclick="Purchases()" data-key="search-button">Search</button>
            </div>
        </div>
        <div id="search_result"></div>
        <div class="button-group">
            <button data-key="insert-over" class="btn btn-save" onclick="location.href='addpurchases.php'">Add</button>
        </div>
        <div id="report">
            <?php include '../php/purchaseOrderReportLimited.php';?>
        </div>
        </div>
        <div class="button-group-two">
            <button data-key="view-all" class="btn btn-back" onclick="location.href='purchaseManagerExpanded.php'">View All</button>
            <button data-key="ind-purchase" class="btn-exp btn-back" onclick="location.href='purchases.php'">Individual Purchase Records</button>
        </div>
        </origin>
        <?php include '../php/footer.php' ?>
        <script>
            // Add event listener to the input field
            document.getElementById('searchPurchases').addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent the default form submission
                    Purchases(); // Call the drugs function to perform the search
                }
            });
            async function Purchases() {
                const searchTerm = document.getElementById('searchPurchases').value.trim();
                const resultDiv = document.getElementById('search_result');
                
                // Clear the previous result
                resultDiv.innerHTML = '';

                if (searchTerm) {
                    try {
                        // Fetch the search results from the backend
                        const response = await fetch(`../php/searchPurchases.php?query=${encodeURIComponent(searchTerm)}`);
                        
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
                document.getElementById('searchPurchases').value= '';
                document.getElementById('search_result').innerHTML = '';
            }

        </script>
    </body>
</html>