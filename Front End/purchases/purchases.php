<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Purchase Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
        
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <origin>
        <div id="over"><h1>Purchases</h1></div>
        <div class="search-over">
            <div class="barr">
            <button onclick="resetSearch()" id="btn-circle" ><img src="../images/clear.png"></button>
                <form name="searchpurchases" method="post">
                    <input type="text" placeholder="Search for purchases" name="query" id="searchpurchases" required data-key="search-placeholder">
                </form>
                <button class="button" type="submit" onclick="purchases()" data-key="search-button">Search</button>
            </div>
        </div>
        <div id="search_result"></div>
        <div id="report">
            <div class="button-group">
                <button class="btn btn-save" onclick="location.href='addpurchases.php'">Add</button>
            </div>
            <?php include '../php/purchasesreport.php';?>
        </div>
        </div>
        </origin>
        <?php include '../php/footer.php' ?>
        <script>
            async function purchases() {
                const searchTerm = document.getElementById('searchpurchases').value.trim();
                const resultDiv = document.getElementById('search_result');
                
                // Clear the previous result
                resultDiv.innerHTML = '';

                if (searchTerm) {
                    try {
                        // Fetch the search results from the backend
                        const response = await fetch(`../php/searchpurchases.php?query=${encodeURIComponent(searchTerm)}`);
                        
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
                document.getElementById('searchpurchases').value= '';
                document.getElementById('search_result').innerHTML = '';
            }

        </script>
    </body>
</html>