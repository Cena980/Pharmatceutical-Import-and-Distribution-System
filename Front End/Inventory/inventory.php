<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Inventory Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <origin>
        <div class="search-over">
            <div class="barr">
            <button onclick="resetSearch()" id="btn-circle" ><img src="../images/clear.png"></button>
                <form name="searchinventory" method="post">
                    <input type="text" placeholder="Search for Inventory" name="query" id="searchinventory" required data-key="search-placeholder">
                </form>
                <button class="button" type="submit" onclick="Inventory()" data-key="search-button">Search</button>
            </div>
        </div>
        <div id="search_result"></div>
        <div class="inventory">
            <div class="inventory-left">
                <div id="over"><h1>Inventory Records</h1></div>
                <div id="button-group">
                        <button class="btn btn-save" onclick="location.href='insertinventory.php'">Add</button>
                    </div>
                <div id="report">
                    <?php include '../php/inventoryreport.php';?>
                </div>

            </div>
            <div class="inventory-right">
                <div id="over"><h1>Refill List</h1></div>
                <div id="report">
                    <?php include '../php/refillreport.php';?>
                </div>
            </div>
        </div>
        </div>
        </origin>

        <?php include '../php/footer.php' ?>
        <script>
            async function Inventory() {
                const searchTerm = document.getElementById('searchinventory').value.trim();
                const resultDiv = document.getElementById('search_result');
                
                // Clear the previous result
                resultDiv.innerHTML = '';

                if (searchTerm) {
                    try {
                        // Fetch the search results from the backend
                        const response = await fetch(`../php/searchinventory.php?query=${encodeURIComponent(searchTerm)}`);
                        
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
                document.getElementById('searchinventory').value= '';
                document.getElementById('search_result').innerHTML = '';
            }
        </script>
    </body>
</html>