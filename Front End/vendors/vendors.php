<html lang="en">
<head>
    <title>Sales</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <?php include '../php/header2.php' ?>
    <origin>
        <div id="over">
            <h1>Vendors</h1>
        </div>
        <div class="search-over">
            <div class="barr">
            <button onclick="resetSearch()" id="btn-circle" ><img src="../images/clear.png"></button>
                <form name="searchsales" method="post">
                    <input type="text" placeholder="Search for Vendors" name="query" id="searchvendors" required data-key="search-placeholder">
                </form>
                <button class="button" type="submit" onclick="vendors()" data-key="search-button">Search</button>
            </div>
        </div>
        <div id="search_result"></div>
        <div class="button-group">
            <button data-key="insert-over" class="btn btn-save" onclick="location.href='addvendors.php'">Add</button>
        </div>
        <div id="report">
             <?php include '../php/vendorsreport.php' ?>
        </div>
   </origin>
   <?php include '../php/footer.php' ?>
   <script>
            // Add event listener to the input field
            document.getElementById('searchvendors').addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent the default form submission
                    vendors(); // Call the drugs function to perform the search
                }
            });
            async function vendors() {
                const searchTerm = document.getElementById('searchvendors').value.trim();
                const resultDiv = document.getElementById('search_result');
                
                // Clear the previous result
                resultDiv.innerHTML = '';

                if (searchTerm) {
                    try {
                        // Fetch the search results from the backend
                        const response = await fetch(`../php/searchvendors.php?query=${encodeURIComponent(searchTerm)}`);
                        
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
                document.getElementById('searchvendors').value= '';
                document.getElementById('search_result').innerHTML = '';
            }

        </script>
</body>
</html>