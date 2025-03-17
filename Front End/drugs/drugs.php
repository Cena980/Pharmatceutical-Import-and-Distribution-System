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
        <origin>
        <div id="over"><h1 data-key="drug-records">Drug records</h1></div>
        <div class="search-over">
            <div class="barr">
            <button onclick="resetSearch()" id="btn-circle" >
                <img src="../images/clear.png">
            </button>
                <form name="searchdrugs" method="post">
                    <input type="text" placeholder="Search for drugs" name="query" id="searchdrugs" required data-key="search-placeholder">
                </form>
                <button class="button" type="submit" onclick="drugs()" data-key="search-button">Search</button>
            </div>
        </div>
        <div id="search_result"></div>
        <div class="button-group">
            <button class="btn btn-save" onclick="location.href='Insertdrug.php'" data-key="insert-button">Add</button>
        </div>
        <div id="report">
            <?php include '../php/drugreportLimited.php';?>
        </div>
        <div class="button-group">
            <button class="btn btn-back" onclick="location.href='drugsExpanded.php'">All Drugs</button>
        </div>
        </origin>
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
                        const response = await fetch(`../php/searchdrugs.php?query=${encodeURIComponent(searchTerm)}`);
                        
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

            // Add event listener to the input field
            document.getElementById('searchdrugs').addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent the default form submission
                    drugs(); // Call the drugs function to perform the search
                }
            });
        </script>
    </body>
</html>