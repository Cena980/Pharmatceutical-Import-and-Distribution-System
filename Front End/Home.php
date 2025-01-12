<?php require 'php/functions.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Home Page
        </title>
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body>
        <script>
            function validate() {
                a =document.getElementById('search');
                if (a.value.length<1){
                    alert("Cannot search for empty string")
                }else{
                    const form = document.forms["search"];
                    form.action = "php/search.php";
                    form.method = "post";
                    const popup = window.open("", "SearchResults", "width=600,height=400");
                    form.target = "SearchResults"; // Send the form to the popup window
                    form.submit();
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
                    <form name="search" method="post" action="php/search.php">
                        <input type="text" placeholder="Search for Drugs" id="search" name="query" id="search" required>
                    </form>
                    <button type="submit" onclick="validate()" >Search</button>
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
                        <a href="home.php">Home</a>
                    </li>
                    <li><a href="sales/sales.php">Sales</a></li>
                    <li><a href="drugs/drugs.php">Drug</a></li>
                    <li><a href="employees/employees.php">Employee</a></li>
                    <li><a href="Inventory/inventory.php">Inventory</a></li>
                    <li><a href="purchases/purchases.php">Purchases</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <main>
            <div class="left">
                <div class="section_title">Go To</div>
                <?php $tables = getTables() ?>
                <?php
                foreach ($tables as $table) {
                    $tableName = $table['table'] ?? null;
                    if ($tableName) {
                        ?>
                        <div class="tables">
                            <a href="<?php echo strtolower($tableName)?>/<?php echo strtolower($tableName)?>.php">
                                
                                <?php echo htmlspecialchars(ucfirst($tableName))?>
                            </a>
                        </div>
                        <?php
                    } else {
                        echo "Invalid table data.";
                    }
                }
                ?>
                    
            </div>
            <div class="right">
                <div class="section_title">Products</div>
                <?php $Drugs = getDrugs(4) ?>
                <div class="product">
                    <?php
                        foreach($Drugs as $Drug){
                            ?>
                                <div class="product_left">
                                <img src="product.png" alt="product">
                            </div>
                            <div class="product_right" >
                                <p class="title">
                                    <a href="Drug.php?Drug=<?php echo $Drug['drug_name']?>"><?php echo $Drug['drug_name'] ?></a>
                                </p>
                                <p class="description">
                                    <?php echo $Drug['Ingredient'] ?>
                                </p>
                                <P class="expiration">Exp Date: <?php echo $Drug['Expiration']?></P>
                                <P class="expiration"><?php echo $Drug['Initial_Amount']?> Items Available</P>
                                <p class="price"><?php echo $Drug['Price']?> ؋</p>
                            </div>

                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="far_right">
                <div class="section_title">Sales Reports</div>
                <?php include 'php/salesreportlimited.php'?>
            </div>
            
        </main>
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