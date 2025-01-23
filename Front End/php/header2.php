<?php

echo '<script>
            function validate() {
                a =document.getElementById(\'search\');
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
                    <img src="../images/logoSmall.png" style="scale: 0.8;" alt="logo">
                    <p data-key="database-title">Phoenix Pharma</p>
                </div>
                <div class="barr">
                    <form name="search" method="post" action="php/search.php">
                        <input type="text" placeholder="Search for Drugs" name="query" id="search" required data-key="search-placeholder">
                    </form>
                    <button type="submit" onclick="validate()" data-key="search-button">Search</button>
                </div>
                <div class="barr">
                    <div id="switch">
                        <button onclick="setLanguage(\'en\')">English</button>
                        <button onclick="setLanguage(\'fa\')">فارسی</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="bar2over">
            <div id="bar2">
                <ul class="barr2">
                    <li><a href="../home.php" data-key="nav-home">Home</a></li>
                    <li><a href="../sales/sales.php" data-key="nav-sales">Sales</a></li>
                    <li><a href="../drugs/drugs.php" data-key="nav-drugs">Drugs</a></li>
                    <li><a href="../employees/employees.php" data-key="nav-employees">Employees</a></li>
                    <li><a href="../Inventory/inventory.php" data-key="nav-inventory">Inventory</a></li>
                    <li><a href="../purchases/purchases.php" data-key="nav-purchases">Purchases</a></li>
                    <li><a href="../contact.php" data-key="nav-contact">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <script>
            // Define translations
            const translations = {
                en: {
                    "title": "Home Page",
                    "database-title": "Phoenix Pharma",
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
                    "database-title": "Phoenix Pharma",
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
        </script>';


?>