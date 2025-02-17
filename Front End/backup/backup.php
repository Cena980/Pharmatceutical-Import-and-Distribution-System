<!DOCTYPE html>
<html lang="en">
    <head>
        <title data-key="backup-title">
            Backup Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <origin>
        <div id="over"><h1 data-key="drug-records">Backup records</h1></div>
        <div class="search-over">
            <select id="searchBy" name="searchBy">
                <option value="name">Search by Name</option>
                <option value="date">Search by Date</option>
            </select>
            <div class="barr">
            <button onclick="resetSearch()" id="btn-circle" >
                <img src="../images/clear.png">
            </button>
                <form name="searchBackup" method="Get" action="../php/searchsql.php">
                    <input type="text" placeholder="Search for Backups" name="query" id="searchBackup" required data-key="search-placeholder">
                </form>
                <button class="button" type="submit" onclick="Backup()" data-key="search-button">Search</button>
            </div>
        </div>
        <div id="search_result"></div>
        <div class="button-group">
            <button class="btn btn-save" onclick="location.href='../php/backup.php'" data-key="insert-button">Create New Backup</button>
        </div>
        <div id="report">
            <?php include '../php/sql.php';?>
        </div>
        </origin>
        <?php include '../php/footer.php' ?>
        <script>
            async function Backup() {
                const searchTerm = document.getElementById('searchBackup').value.trim();
                const searchBy = document.getElementById('searchBy').value;
                const resultDiv = document.getElementById('search_result');

                // Clear the previous result
                resultDiv.innerHTML = '';

                if (searchTerm) {
                    try {
                        // Fetch the search results from the backend
                        const response = await fetch(`../php/searchbackup.php?query=${encodeURIComponent(searchTerm)}&searchBy=${encodeURIComponent(searchBy)}`);

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
                document.getElementById('searchBackup').value= '';
                document.getElementById('search_result').innerHTML = '';
            }

            // Add event listener to the input field
            document.getElementById('searchBackup').addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent the default form submission
                    drugs(); // Call the drugs function to perform the search
                }
            });
        </script>
    </body>
</html>