<?php

echo '<script>
        function validate(event) {
            if (event) event.preventDefault(); // Prevent form from reloading page

            let searchInput = document.getElementById("search");
            let searchport = document.getElementById("searchport");
            let bar = document.getElementById("bar");
            let barover = document.getElementById("barover");

            if (searchInput.value.trim().length < 1) {
                alert("Cannot search for an empty string");
                return;
            }
            const bar1 = document.querySelector(".bar-center");
            const formData = new FormData(document.forms["search"]);
            const query = new URLSearchParams(formData).toString();

            fetch("php/searchdrugs.php?" + query, {
                method: "GET",
            })
            .then(response => response.text()) // Use .json() if PHP returns JSON
            .then(data => {
                if (data.trim()) {
                    searchport.innerHTML = data;
                    searchport.style.display = "block"; // Show results

                    // Wait for the DOM to update before calculating height
                    setTimeout(() => {
                        let rows = searchport.querySelectorAll("tr").length;
                        let rowHeight = 35; // Approximate row height in pixels
                        let minHeight = 180; // Minimum height for #bar
                        
                        let newHeight = Math.min(minHeight + rows * rowHeight);
                        
                        barover.style.height = newHeight + "px"; // Dynamically adjust height
                        searchport.style.height= newHeight-140 + "px";
                        searchport.style.display= "block";
                        


                    }, 10);
                } else {
                    searchport.style.display = "none";
                    searchport.style.height = "0px"; // Reset height when no results
                    searchport.style.height = "70px";
                    barover.style.height = "100px"; // Reset height when no results
                }
            })
            .catch(error => console.error("Error:", error));
        }

        function resetSearch() {
            document.getElementById(\'search\').value = \'\';
            document.getElementById(\'searchport\').innerHTML = \'\';
            let searchport = document.getElementById("bar");
            searchport.style.height = "0px"; // Reset height
            bar.style.height = "100px";
            barover.style.height = "110px";
        }


        </script>
        <div id="barover">
            <div id="bar">
                <div class="barr bar-left">
                    <img src="images/logoSmall.png" style="scale: 0.8;" alt="logo">
                    <p data-key="database-title">Phoenix Pharma</p>
                </div>
                <div class="barr  bar-center">
                    <div class="bar-in">
                        <div class="search-container">
                            <button onclick="resetSearch()" id="btn-circle" ><img src="images/clear.png"></button>
                            <form name="search" onsubmit="validate(event); return false;">
                                <input type="text" placeholder="Search for Drugs" name="query" id="search" required data-key="search-placeholder">
                            </form>
                            <button class="buttonS" type="submit" onclick="validate(event)" data-key="search-button">Search</button>
                        </div>
                            
                    </div>
                </div>
                <div class="barr bar-right">
                    <div id="switch">
                        <button id="buttonSwitchR" onclick="setLanguage(\'en\')">En</button>
                        <p>|</p>
                        <button id="buttonSwitchL" onclick="setLanguage(\'fa\')">فا</button>
                    </div>
                </div>
            </div>
            <div>
                <div id="searchport"></div>
            </div>
        </div>


        <div id="bar2over">
            <div id="bar2">
                <ul class="barr2">
                    <li class="button" onclick = "location.href=\'home.php\'">
                        <img class="logo" src="images/home.png" alt="Home Icon">
                        <a href="home.php" data-key="nav-home">Home</a>
                    </li>
                    <li class="button" onclick = "location.href=\'sales/sales.php\'">
                        <img class="logo" src="images/sales.png" alt="Sales Icon">
                        <a href="sales/sales.php" data-key="nav-sales">Sales</a>
                    </li>
                    <li class="button" onclick = "location.href=\'drugs/drugs.php\'">
                        <img class="logo" src="images/drug1.png" alt="Drug Icon">
                        <a href="drugs/drugs.php" data-key="nav-drugs">Drugs</a>
                    </li>
                    <li class="button" onclick = "location.href=\'employees/employees.php\'">
                        <img class="logo" src="images/employees.png" alt="Employees Icon">
                        <a href="employees/employees.php" data-key="nav-employees">Employees</a>
                    </li>
                    <li class="button" onclick = "location.href=\'inventory/inventory.php\'">
                        <img class="logo" src="images/inventory.png" alt="Inventory Icon">
                        <a href="inventory/inventory.php" data-key="nav-inventory">Inventory</a>
                    </li>
                    <li class="button" onclick = "location.href=\'purchases/purchaseManager.php\'">
                        <img class="logo" src="images/purchases.png" alt="Purchases Icon">
                        <a href="purchases/purchaseManager.php" data-key="nav-purchases">Purchases</a>
                    </li>
                    <li class="button" onclick = "location.href=\'reports/reports.php\'">
                        <img class="logo" src="images/reports.png" alt="Reports Icon">
                        <a href="reports/reports.php" data-key="nav-reports">Reports</a>
                    </li>
                    <li class="button" onclick = "location.href=\'contact.php\'">
                        <img class="logo" src="images/contact.png" alt="Contact Icon">
                        <a href="contact.php" data-key="nav-contact">Contact Us</a>
                    </li>

                </ul>
            </div>
        </div>
        <script>
            // Add event listener to the input field
            document.getElementById(\'search\').addEventListener(\'keypress\', function(event) {
                if (event.key === \'Enter\') {
                    event.preventDefault(); // Prevent the default form submission
                    validate(); // Call the validate function to perform the search
                }
            });
            (function() {
                const currentPath = window.location.pathname.split(\'/\').pop();
                document.addEventListener(\'DOMContentLoaded\', () => {
                    document.querySelectorAll(\'.button a\').forEach(link => {
                        const linkPath = new URL(link.href, window.location.origin).pathname.split(\'/\').pop();
                        if (linkPath === currentPath) {
                            link.parentElement.classList.add(\'active\'); // Apply before full load
                        }
                    });
                });
            })();
        </script>

        <script>
                document.addEventListener(\'DOMContentLoaded\', () => {
            document.body.classList.add(\'loaded\');
        });
            document.addEventListener(\'DOMContentLoaded\', () => {
                // Get the last part of the current path (everything after the last slash)
                const currentPath = window.location.pathname.substring(window.location.pathname.lastIndexOf(\'/\') + 1);

                // Get all `li` elements with the class `button`
                const buttons = document.querySelectorAll(\'.button\');

                // Add click event listeners for navigation
                buttons.forEach(button => {
                    button.addEventListener(\'click\', () => {
                        const url = button.getAttribute(\'data-url\');
                        if (url) {
                            window.location.href = url;
                        }
                    });
                });
            });

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
                    "nav-contact": "Contact Us",
                    "insert-button": "Add",
                    "drug-title": "Drugs",
                    "drug-records": "Drug records",
                    "drug-insert": "Insertion Page",
                    "no": "No",
                    "sales-insert": "Sales insertion Page",
                    "drug-update": "Update Drug",
                    "insert-over": "Insert",
                    "َupdate-over": "Update",
                    "company-id": "Company ID",
                    "drug-name": "Drug Name",
                    "drug-id": "Drug ID",
                    "ingredients": "Ingredients",
                    "quantity-pb": "Quantity Per Box",
                    "type-id": "Tyle ID",
                    "demo-id": "Demography ID",
                    "sales-add": "Insert",
                    "date": "Date",
                    "amount-received": "Amount Received",
                    "cut-id": "Emp Cut ID",
                    "customer": "Customer",
                    "sales-officer": "Sales Officer",
                    "quantity": "Quantity",
                    "discount": "Discount",
                    "price": "Price",
                    "total": "Total",
                    "note": "Note",
                    "sub-total": "Sub Total",
                    "due-date": "Due Date",
                    "save-button": "Save",
                    "delete-button": "Delete",
                    "update-button": "Update",
                    sale_id: "Sale ID",
                    inventory_id: "Inventory ID",
                    date: "Date",
                    quantity: "Quantity",
                    discount: "Discount",
                    price: "Price",
                    cut_id: "Cut ID",
                    customer_id: "Customer ID",
                    total_price: "Total Price",
                    note: "Note",
                    actions: "Actions",
                    products: "Products",
                    salesreport: "Sales Report",
                    goto: "Go To",
                    "invoice-manager": "ّInvoice Manager",
                    "databse-backup": "Database Backup",
                    "companies": "Companies",
                    "drug_type": "Drug Type",
                    "drugs": "Drugs",
                    "employee": "Employees",
                    "inventory": "Inventory",
                    "purchases": "Purchases",
                    "sales": "Sales",
                    "shareholders": "Share holders"

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
                    "nav-contact": "تماس با ما",
                    "insert-button": "اضافه کردن",
                    "drug-title": "دوا ها",
                    "drug-records": "دوا های ثبت شده",
                    "drug-insert": "صفحه اضافه کردن دوا",
                    "no": "شماره",
                    "sales-insert": "صفحه افزودن به فروشات",
                    "drug-update": "صفحه ویرایش دوا",
                    "insert-over": "اضافه کردن",
                    "update-over": "ویرایش کردن",
                    "company-id": "نمبر شرکت",
                    "drug-name": "نام دوا",
                    "drug-id": "نمبر دوا",
                    "ingredients": "ترکیبات",
                    "quantity-pb": "تعداد در جعبه",
                    "type-id": "نمبر نوعیت",
                    "demo-id": "نمبر دیموگرافی",
                    "sales-add": " افزودن به فروشات",
                    "date": "تاریخ",
                    "amount-received": "پول اخذ شده",
                    "cut-id": "نمبر سهم کارمند",
                    "customer": "مشتری",
                    "sales-officer": "مسُول",
                    "quantity": "تعداد",
                    "discount": "تخفیف",
                    "price": "قیمت",
                    "total": "قیمت کل",
                    "note": "یادداشت",
                    "sub-total": "مجموع",
                    "due-date": "تاریخ انقضا",
                    "save-button": "ذخیره",
                    "delete-button": "حذف",
                    "update-button": "ویرایش",
                    sale_id: "نمبر فروش",
                    inventory_id: "نمبر موجودی",
                    date: "تاریخ",
                    quantity: "تعداد",
                    discount: "تخفیف",
                    price: "قیمت",
                    cut_id: "نمبر برش",
                    customer_id: "نمبر مشتری",
                    total_price: "قیمت کل",
                    note: "یادداشت",
                    actions: "اقدامات",
                    products: "محصولات",
                    salesreport: "گزارش فروشات",
                    goto: "برو به",
                    "invoice-manager": "مدیریت فاکتور",
                    "database-backup": "پشتیبان گیری دیتابیس",
                    "companies": "شرکت ها",
                    "drug_type": "Drug Type",
                    "drugs": "Drugs",
                    "employee": "Employees",
                    "inventory": "Inventory",
                    "purchases": "Purchases",
                    "sales": "Sales",
                    "shareholders": "Share holders"
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