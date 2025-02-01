<!DOCTYPE html>
<html lang="en">
    <head>
        <title data-key="drug-title">
            Drug Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1 data-key="drug-records">Drug records</h1></div>
        <div class="search-over">
            <div class="barr">
            <button onclick="resetSearch()" id="btn-circle" ><img src="../images/clear.png"></button>
                <form name="searchdrugs" method="post">
                    <input type="text" placeholder="Search for drugs" name="query" id="searchdrugs" required data-key="search-placeholder">
                </form>
                <button type="submit" onclick="drugs()" data-key="search-button">Search</button>
            </div>
        </div>
        <div id="search_result"></div>
        <div class="button-group">
            <button class="btn btn-save" onclick="location.href='Insertdrug.php'" data-key="insert-button">Add</button>
        </div>
        <div id="report">
            <?php include '../php/drugreport.php';?>
        </div>
        <?php include '../php/footer.php' ?>
        <script>
            async function drugs() {
                const searchTerm = document.getElementById('searchdrugs').value.trim();
                const resultDiv = document.getElementById('search_result');
                
                // Clear the previous result
                resultDiv.innerHTML = '';

                if (searchTerm) {
                    try {
                        // Fetch the search results from the backend
                        const response = await fetch(`../php/search.php?query=${encodeURIComponent(searchTerm)}`);
                        
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
                document.getElementById('searchdrugs').value= '';
                document.getElementById('search_result').innerHTML = '';
            }

        </script>
    </body>
</html>