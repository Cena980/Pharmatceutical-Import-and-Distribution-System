<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Drug Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
    <script>
            function search(){
                a = document.getElementById("search");
                    if (a.value.length<1){
                        alert("Cannot search for empty string")
                    }else{
                        const form = document.forms["search"];
                        form.action = "../php/search.php";
                        form.method = "get";
                    }
            }
        </script>
        <div id="barover">
            <div id="bar">
                <div class="barr">
                    <img>
                    <p>B&S Database</p>
                </div>
                <div class="barr">
                    <form method="GET" action="php/search.php">
                        <input type="text" id="search" name="query" style="width: 85%;" id="search" required>
                    </form>
                    <button type="submit" value="Search" onclick="search()">Search</button>
                </div>
                <div class="barr">
                    <div id="switch" >
                        <button id="switch">En</button>
                        <button id="switch">Fa</button>
                    </div>
                </div>
            </div>  
        </div>
        <div id="bar2over">
            <div id="bar2">
                <ul class="barr2">
                <li>
                        <a href="../home.php">Home</a>
                    </li>
                    <li><a href="../sales/sales.php">Sales</a></li>
                    <li><a href="../drugs/drugs.php">Drug</a></li>
                    <li><a href="../employees/employees.php">Employee</a></li>
                    <li><a href="../Inventory/inventory.php">Inventory</a></li>
                    <li><a href="../purchases/purchases.php">Purchases</a></li>
                    <li><a href="../contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div id="over"><h1>Drug records</h1></div>
        <div id="buttons">
            <button><a href="Insertdrug.html">Add</a> </button>
        </div>
        <div id="report">
            <?php include '../php/drugreport.php';?>
        </div>
        <div id="bottom">
            <div class="bott">
                <h3 class="section_title">Database Usage Guidelines</h3>
                <div id="points">
                    <div class="points">Authorized Access Only: Access to this database is restricted to authorized personnel only.</div>
                    <div class="points">Data Integrity: Ensure the accuracy and completeness of all data entries.</div>
                    <div class="points">Privacy Protection: Handle user data responsibly and comply with relevant privacy regulations.</div>
                    <div class="points">Activity Monitoring: All activities may be logged and monitored for security purposes.</div>
                    <div class="points">Reporting Issues: Report any technical issues or security concerns immediately to the system administrator.</div>
                    <div class="points">Prohibited Actions: Unauthorized copying, redistribution, or alteration of the database or its components is strictly prohibited.</div>
                </div>

            </div>
            <div class="bott">
                <h3 class="section_title">Technical Support</h3>
                <div id="points">
                    <div class="points">BSDatabases.tech@gmail.com</div>
                </div>

            </div>
            <div class="bott">
                <h3>...</h3>
            </div>
        </div>
    </body>
</html>