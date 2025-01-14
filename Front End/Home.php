<?php require 'php/functions.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Home Page
        </title>
        <link rel="stylesheet" href="css/home.css">
        <style>
            body {
                direction: ltr; /* Force left-to-right layout */
            }
        </style>
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
                    <p data-key="database-title">B&S Database</p>
                </div>
                <div class="barr">
                    <form name="search" method="post" action="php/search.php">
                        <input type="text" placeholder="Search for Drugs" name="query" id="search" required data-key="search-placeholder">
                    </form>
                    <button type="submit" onclick="validate()" data-key="search-button">Search</button>
                </div>
                <div class="barr">
                    <div id="switch">
                        <button onclick="setLanguage('en')">English</button>
                        <button onclick="setLanguage('fa')">فارسی</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="bar2over">
            <div id="bar2">
                <ul class="barr2">
                    <li><a href="home.php" data-key="nav-home">Home</a></li>
                    <li><a href="sales/sales.php" data-key="nav-sales">Sales</a></li>
                    <li><a href="drugs/drugs.php" data-key="nav-drugs">Drugs</a></li>
                    <li><a href="employees/employees.php" data-key="nav-employees">Employees</a></li>
                    <li><a href="Inventory/inventory.php" data-key="nav-inventory">Inventory</a></li>
                    <li><a href="purchases/purchases.php" data-key="nav-purchases">Purchases</a></li>
                    <li><a href="contact.php" data-key="nav-contact">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <script>
            // Define translations
            const translations = {
                en: {
                    "title": "Home Page",
                    "database-title": "B&S Database",
                    "search-placeholder": "Search for Drugs",
                    "search-button": "Search",
                    "nav-home": "Home",
                    "nav-sales": "Sales",
                    "nav-drugs": "Drugs",
                    "nav-employees": "Employees",
                    "nav-inventory": "Inventory",
                    "nav-purchases": "Purchases",
                    "nav-contact": "Contact Us"
                },
                fa: {
                    "title": "صفحه اصلی",
                    "database-title": "پایگاه داده B&S",
                    "search-placeholder": "جستجو داروها",
                    "search-button": "جستجو",
                    "nav-home": "خانه",
                    "nav-sales": "فروشات",
                    "nav-drugs": "داروها",
                    "nav-employees": "کارمندان",
                    "nav-inventory": "موجودی",
                    "nav-purchases": "خریدها",
                    "nav-contact": "تماس با ما"
                }
            };

            // Function to switch language
            function setLanguage(language) {

                // Update text content for elements with translation keys
                document.querySelectorAll("[data-key]").forEach(el => {
                    const key = el.getAttribute("data-key");
                    el.textContent = translations[language][key] || el.textContent;
                    if (el.placeholder) {
                        el.placeholder = translations[language][key] || el.placeholder;
                    }
                });
            }

            // Default to English on page load
            setLanguage("en");
        </script>
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