<?php require '../php/functions.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Insertion Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <div id="barover">
            <div id="bar">
                <div class="barr">
                    <img>
                    <p>B&S Database</p>
                </div>
                <div class="barr">
                    <script>
                        // Search function for the drugs
                        function drugSearch() {
                            a = document.getElementById('search');
                            if (a.value.length < 1) {
                                alert("Cannot search for empty string")
                            } else {
                                const form = document.forms["search"];
                                form.action = "../php/search.php";
                                form.method = "post";
                                const popup = window.open("", "SearchResults", "width=600,height=400");
                                form.target = "SearchResults"; // Send the form to the popup window
                                form.submit();
                            }
                        }
                    </script>
                    <form name="search" method="post" action="../php/search.php">
                        <input type="text" placeholder="Search for Drugs" name="query" id="search" required>
                    </form>
                    <button type="submit" onclick="drugSearch()">Search</button>
                    
                </div>
                <div class="barr">
                    <div id="switch">
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
        <div id="over"><h1>New Sale</h1></div>
        <form name="sale" method="post">
            <input type="hidden" name="qnt" id="qnt" value="1">
            <div class="fixed-input">
                <label>Date</label>
                <input type="date" name="Date_1" id="Date_1" autocomplete="off">
                <label>Amount Received</label>
                <input type="number" name="Amount_Received_1" id="AR_1" autocomplete="off">
                <label>Employee Cut ID</label>
                <input type="number" name="Cut_ID_1" id="ci_1" autocomplete="off">
                <label >Customer</label>
                <input type="text" name="Customer_Shop_1" id="customer_shop_1" autocomplete="off">
                <div class="suggestion" id="suggestion_customer" style="border: 1px solid #ccc; display: none; position: fixed; background: white;"></div>
                <label>Sales Officer</label>
                <input name="Sales_Officer" id="Sales_Officer">
            </div>
            <table class="table table-success">
             <thead>
             <tr>
                 <th>Drug Name</th>
                 
                 <th>Quantity</th>
                 <th>Discount</th>
                 <th>Price</th>
                 <th>Total</th>
                 <th>Note</th>
             </tr>
             </thead>
             <tbody>

                 <tr>
                    <input type="hidden" name="Amount_1" id="Amount_1">
                    <td><input type="text" name="Drug_Name_1" id="drug_name_1" autocomplete="off" placeholder="Enter Drug Name"></td>
                    <td><input type="number" name="Quantity_1" id="qy_1" autocomplete="off"></td>
                    <td><input type="number" name="Discount_1" id="dt_1" autocomplete="off"></td>
                    <td><input type="number" name="Price_1" id="pr_1" autocomplete="off"></td>
                    <td><input type="number" name="Total_1" id="tl_1" autocomplete="off"></td>
                    <td><input type="text" name="Note" id="Note_1" autocomplete="off"></td>

                     
                     
                 </tr>
                 <tr>
                    <td><div id="suggestions" style="display: none; position: absolute; background: white;"></div></td>
                     <td id="ndid"></td>
                     <td id="nde"></td>
                     <td id="nqy"></td>
                     <td id="ndt"></td>
                     <td id="npr"></td>
                     <td id="nec"></td>
                 </tr>
                 <tr>
                     <td id="noty"></td>
                 </tr>
             </tbody>
            </table>
            <div class="grand_total">
                <label>Sub Total</label>
                <input type="number" name="grand_total" id="grand_total" autocomplete="off">
            </div>
            <div class="grand_total">
                <label>Due Date</label>
                <input type="date" name="dueDate" id="dueDate" autocomplete="off">
            </div>
            <div class="button-group">
                <button class="btn btn-save" onclick="validate()">Save</button>
                <button class="btn btn-add" onclick="create_sale(); return false;">+</button>
                <button class="btn btn-remove" onclick="delete_last_row(); return false;">-</button>
            </div>
        </form>
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

        <script>
            window.onload = function() {
                const dateInput = document.getElementById("Date_1");
                const today = new Date();

                // Format the date as YYYY-MM-DD
                const formattedDate = today.toISOString().split("T")[0];

                // Set the value of the input
                dateInput.value = formattedDate;

                //Setting due date auto 7-days from now
                const dueDateInput = document.getElementById("dueDate");
                if (dueDateInput) {
                    const today = new Date();
                    const dueDate = new Date(today);
                    dueDate.setDate(today.getDate() + 7); // Add 7 days to the current date

                    // Format the date as YYYY-MM-DD (to match most input[type="date"] requirements)
                    const year = dueDate.getFullYear();
                    const month = String(dueDate.getMonth() + 1).padStart(2, '0'); // Months are 0-based
                    const day = String(dueDate.getDate()).padStart(2, '0');
                    dueDateInput.value = `${year}-${month}-${day}`;
                }
            };
            document.getElementById("customer_shop_1").addEventListener("input", function () {
                const inputField = this;
                const suggestionBox = document.getElementById("suggestion_customer");

                // Get the position and size of the input field
                const rect = inputField.getBoundingClientRect();

                // Position the suggestion box below the input field
                suggestionBox.style.top = rect.bottom + window.scrollY + "px"; // Add window.scrollY for scrolling
                suggestionBox.style.left = rect.left + window.scrollX + "px"; // Add window.scrollX for horizontal scrolling
                suggestionBox.style.width = rect.width + "px";

                // Show the suggestion box
                suggestionBox.style.display = "block";
            });

            // Hide the suggestion box when clicking outside
            document.addEventListener("click", function (e) {
                const suggestionBox = document.getElementById("suggestion_customer");
                if (!e.target.closest("#customer_shop_1") && !e.target.closest("#suggestion_customer")) {
                    suggestionBox.style.display = "none";
                }
            });
            let qnt = 1;
            document.querySelector("table tbody").addEventListener("input", function (e) {
                if (e.target.name.startsWith("Drug_Name_")) {
                    const rowNumber = e.target.name.split("_")[2]; // Extract the row number
                    const query = e.target.value;
                    if (query.length > 1) {
                        fetch(`../php/get_drug_suggestions.php?query=${encodeURIComponent(query)}`)
                            .then(response => response.json())
                            .then(data => {
                                const suggestionsDiv = document.getElementById("suggestions");
                                suggestionsDiv.innerHTML = "";
                                suggestionsDiv.style.display = "block";

                                if (data.error) {
                                    suggestionsDiv.style.display = "none";
                                } else {
                                    const table = document.createElement("table");
                                    table.style.borderCollapse = "collapse";
                                    table.style.width = "100%";
                                    const header = document.createElement("tr");
                                    header.innerHTML = `
                                        <th style="border: 1px solid #ccc; padding: 8px;">Drug Name</th>
                                        <th style="border: 1px solid #ccc; padding: 8px;">Expiration Date</th>
                                        <th style="border: 1px solid #ccc; padding: 8px;">Amount</th>
                                    `;
                                    table.appendChild(header);
                                    data.forEach(drug => {
                                        const row = document.createElement("tr");
                                        row.innerHTML = `
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Drug_Name}</td>
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Expiration_Date}</td>
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Amount}</td>
                                        `;
                                        row.style.cursor = "pointer";
                                        row.onclick = () => {
                                            document.getElementById(`drug_name_${rowNumber}`).value = drug.Drug_Name;
                                            document.getElementById(`Amount_${rowNumber}`).value = drug.Amount;
                                            suggestionsDiv.style.display = "none";
                                            fetchPrice(rowNumber);
                                        };
                                        table.appendChild(row);
                                    });
                                    suggestionsDiv.appendChild(table);
                                }
                            })
                            .catch(error => {
                                console.error("Error fetching drug suggestions:", error);
                            });
                    } else {
                        document.getElementById("suggestions").style.display = "none";
                    }
                }

                if (
                    e.target.name.startsWith("Price_") ||
                    e.target.name.startsWith("Quantity_") ||
                    e.target.name.startsWith("Discount_")
                ) {
                    calculateTotal();
                }
            });
            function addCustomerShopEventListener(rowNumber) {
            document.getElementById(`customer_shop_${rowNumber}`).addEventListener("input", function () {
                const query = this.value;
                const suggestionsDiv = document.getElementById("suggestion_customer"); // Updated to match your HTML

                if (query.length > 1) {
                    fetch(`../php/get_customer_suggestions.php?query=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            suggestionsDiv.innerHTML = ""; // Clear previous suggestions
                            suggestionsDiv.style.display = "block"; // Show suggestions

                            if (data.error) {
                                suggestionsDiv.style.display = "none"; // Hide if there is an error
                            } else {
                                const table = document.createElement("table");
                                table.style.borderCollapse = "collapse";
                                table.style.width = "100%";

                                const header = document.createElement("tr");
                                header.innerHTML = `<th style="border: 1px solid #ccc; padding: 8px;">Customer Name</th>`;
                                table.appendChild(header);

                                data.forEach(customer => {
                                    const row = document.createElement("tr");
                                    row.innerHTML = `<td style="border: 1px solid #ccc; padding: 8px;">${customer.customer_shop}</td>`;
                                    row.style.cursor = "pointer";

                                    row.onclick = () => {
                                        document.getElementById(`customer_shop_${rowNumber}`).value = customer.customer_shop;
                                        suggestionsDiv.style.display = "none"; // Hide suggestions when an item is clicked
                                    };

                                    table.appendChild(row);
                                });

                                suggestionsDiv.appendChild(table);
                            }
                        })
                        .catch(error => {
                            console.error("Error fetching customer suggestions:", error);
                        });
                } else {
                    suggestionsDiv.style.display = "none"; // Hide suggestions if query length is <= 1
                }
            });
        }

        // Call the function for row 1
        addCustomerShopEventListener(qnt);


                    // Function to fetch price for each drug row
            function fetchPrice(rowNumber) {
            const drugName = document.getElementById(`drug_name_${rowNumber}`).value.trim();

            if (drugName.trim() !== "") {
                fetch(`../php/get_price.php?Drug_Name=${encodeURIComponent(drugName)}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.price) {
                            document.getElementById(`pr_${rowNumber}`).value = data.price;
                            calculateTotal();  // Recalculate totals for all rows after price is set
                        } else {
                            alert("Price not found for the selected drug.");
                        }
                    });
            }
        }
        // Function to calculate total for each row
        function calculateTotal() {
            const rows = document.querySelectorAll("table tbody tr");
            let grandTotal = 0; // Initialize grand total

            rows.forEach(row => {
                const priceInput = row.querySelector('input[name^="Price_"]');
                const quantityInput = row.querySelector('input[name^="Quantity_"]');
                const discountInput = row.querySelector('input[name^="Discount_"]');
                const totalInput = row.querySelector('input[name^="Total_"]');

                // Ensure valid values for price, quantity, and discount
                const price = parseFloat(priceInput?.value || 0);
                const quantity = parseFloat(quantityInput?.value || 0);
                const discount = parseFloat(discountInput?.value || 0);

                // Calculate the discount amount
                const discountAmount = (price * quantity * discount) / 100;

                // Calculate the total
                const total = (price * quantity) - discountAmount;

                // Update the total input field
                if (totalInput) {
                    totalInput.value = total.toFixed(2); // Ensure the total has two decimal places
                }

                // Add the current row's total to the grand total
                grandTotal += total;
            });

            // Update the grand total input field
            const grandTotalInput = document.getElementById("grand_total");
            if (grandTotalInput) {
                grandTotalInput.value = grandTotal.toFixed(2); // Ensure the grand total has two decimal places
            }
        }

            function updateQnt() {
                document.getElementById("qnt").value = qnt;  // Update the hidden input field
}


            // Create a new row
            // Function to create a new sale row
            function create_sale() {
                qnt +=1;  // Increment the quantity to update the row number

                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <input type="hidden" name="Amount_${qnt}" id="Amount_${qnt}">
                    <td><input type="text" name="Drug_Name_${qnt}" id="drug_name_${qnt}" autocomplete="off" placeholder="Enter Drug Name"></td>
                    <td><input type="number" name="Quantity_${qnt}" id="qi_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="Discount_${qnt}" id="dt_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="Price_${qnt}" id="pr_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="Total_${qnt}" id="tl_${qnt}" autocomplete="off"></td>
                    <td><input type="text" name="Note_${qnt}" id="Note_${qnt}" autocomplete="off"></td>
                `;
                tbody.appendChild(newRow);
                // Update the hidden input field for quantity
                document.getElementById("qnt").value = qnt;
            }


            // Delete the last row
            function delete_last_row() {
                if (qnt > 1) {
                    document.querySelector("table tbody").lastElementChild.remove();
                    qnt--;
                } else {
                alert("Cannot delete the last row!");
            }
            }

            // Validate function before form submission
            function validate() {

                let valid = true;
                const form = document.forms["sale"];
                if (valid) {
                    const message = document.getElementById("noty");
                    message.style.color = "green";
                    message.innerHTML = "Your record has been saved.";
                    form.action = "../php/insertsales.php"; // Set action to the desired PHP script
                    form.method = "post";
                    form.submit();
                } else {
                    form.action = "";
                    message.style.color = "red";
                    message.innerHTML = "Validation failed. Please correct the errors.";
                }

                return valid;
            }
        </script>
    </body>
</html>

