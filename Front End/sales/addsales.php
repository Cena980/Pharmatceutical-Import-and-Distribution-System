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
                    <Script>
                        // Search function for the drugs
                        function drugSearch() {
                            a =document.getElementById('search');
                            if (a.value.length<1){
                                alert("Cannot search for empty string")
                            }else{
                                const form = document.forms["search"];
                                form.action = "../php/search.php";
                                form.method = "post";
                                const popup = window.open("", "SearchResults", "width=600,height=400");
                                form.target = "SearchResults"; // Send the form to the popup window
                                form.submit();
                            }
                        }
                    </Script>
                    <form name="search" method="post" action="../php/search.php">
                        <input type="text" placeholder="Search for Drugs" name="query" id="search" required>
                    </form>
                    <button type="submit" onclick="drugSearch()" >Search</button>
                    
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
        <div id="over"><h1>New Sale</h1></div>
        <form name="sale" method="post">
            <input type="hidden" name="qnt" id="qnt" value="1">
            <table class="table table-success">
             <thead>
             <tr>
                 <th>Drug Name</th>
                 
                 <th>Quantity</th>
                 <th>Discount</th>
                 <th>Price</th>
                 <th>Total</th>
                 <th>Note</th>
                 <th>Date</th>
                 <th>Amount_Received</th>
                 <th>Employee Cut ID</th>
                 <th>Customer ID</th>
                 
                 
             </tr>
             </thead>
             <tbody>
                 <tr>
                    <td><input type="text" name = "Drug_Name_1" id="drug_name_1" name="Drug_Name" autocomplete="off" placeholder="Enter Drug Name"></td>
                    <div id="suggestions" style="border: 1px solid #ccc; display: none; position: absolute; background: white;"></div>
                     <td><input type="number" name="Quantity_1" id="qy_1" autocomplete="off"></td>
                     <td><input type="number" name="Discount_1" id="dt_1" autocomplete="off"></td>
                     <td><input type="number" name="Price_1" id="pr_1" autocomplete="off"></td>
                     <td><input type="number" name="Total_1" id="tl_1" autocomplete="off"></td>
                     <td><input type="text" name="Note" id="Note_1" autocomplete="off"></td>
                     <td><input type="date" name="Date_1" id="de_1" autocomplete="off"></td>
                     <td><input type="number" name="Amount_Received_1" id="AR_1" autocomplete="off"></td>
                     <td><input type="number" name="Cut_ID_1" id="ci_1" autocomplete="off"></td>
                     <td><input type="number" name="Location_ID_1" id="lid_1" autocomplete="off"></td>
                     
                 </tr>
         
                 <tr>
                     <td id="ndid"></td>
                     <td id="nde"></td>
                     <td id="nqy"></td>
                     <td id="ndt"></td>
                     <td id="npr"></td>
                     <td id="nec"></td>
                     <td id="nlid"></td>
                     <td id="ntl"></td>
                     
                 </tr>
             <tr>
                 <td id="noty" class="table"></td>
             </tr>
             </tbody>
            </table>
            <button class="btn btn-save" onclick="validate()" >Save</button>
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
            let qnt = 1;

            // Function to attach event listeners to drug name inputs
            function attachEventListeners(rowNumber) {
                document.getElementById(`drug_name_${rowNumber}`).addEventListener("input", function () {
                    const query = this.value;
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
                                    // Create a table to display the suggestions
                                    const table = document.createElement("table");
                                    table.style.borderCollapse = "collapse";
                                    table.style.width = "100%";

                                    // Add table header
                                    const header = document.createElement("tr");
                                    header.innerHTML = `
                                        <th style="border: 1px solid #ccc; padding: 8px;">Drug Name</th>
                                        <th style="border: 1px solid #ccc; padding: 8px;">Expiration Date</th>
                                        <th style="border: 1px solid #ccc; padding: 8px;">Amount</th>
                                    `;
                                    table.appendChild(header);

                                    // Add rows for each suggestion
                                    data.forEach(drug => {
                                        const row = document.createElement("tr");
                                        row.innerHTML = `
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Drug_Name}</td>
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Expiration_Date}</td>
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Amount}</td>
                                        `;
                                        row.style.cursor = "pointer";

                                        // Handle click on a row
                                        row.onclick = () => {
                                            document.getElementById(`drug_name_${rowNumber}`).value = drug.Drug_Name;
                                            suggestionsDiv.style.display = "none";
                                            fetchPrice(rowNumber); // Call fetchPrice for the current row
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
                });
            }

            // Attach event listener to calculate totals for dynamic inputs
            document.addEventListener("input", function (e) {
                if (
                    e.target.name.startsWith("Price_") || 
                    e.target.name.startsWith("Quantity_") || 
                    e.target.name.startsWith("Discount_")
                ) {
                    calculateTotal();
                }
            });

            // Function to calculate total for each row
            function calculateTotal() {
                const rows = document.querySelectorAll("table tbody tr");
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
                });
            }

            // Function to fetch price for each drug row
            function fetchPrice(rowNumber) {
                const drugName = document.getElementById(`drug_name_${rowNumber}`).value;

                if (drugName.trim() !== "") {
                    fetch(`../php/get_price.php?Drug_Name=${encodeURIComponent(drugName)}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.price) {
                                document.getElementById(`pr_${rowNumber}`).value = data.price;
                                calculateTotal(); // Recalculate totals for all rows after price is set
                            } else {
                                alert("Price not found for the selected drug.");
                            }
                        });
                }
            }

            // Function to create a new sale row
            function create_sale() {
                qnt += 1; // Increment the quantity to update the row number

                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td><input type="text" name="Drug_Name_${qnt}" id="drug_name_${qnt}" autocomplete="off" placeholder="Enter Drug Name"></td>
                    <td><input type="number" name="Quantity_${qnt}" id="qi_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="Discount_${qnt}" id="dt_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="Price_${qnt}" id="pr_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="Total_${qnt}" id="tl_${qnt}" autocomplete="off"></td>
                    <td><input type="text" name="Note_${qnt}" id="Note_${qnt}" autocomplete="off"></td>
                `;
                tbody.appendChild(newRow);

                // Attach event listener for the new row
                attachEventListeners(qnt);

                // Update the hidden input field for quantity
                document.getElementById("qnt").value = qnt;
            }

            // Attach the event listener to the first row initially
            attachEventListeners(1);


            // Function to delete the last sale row
            function delete_last_row() {
                const tbody = document.querySelector("table tbody");
                if (tbody.rows.length > 1 && qnt > 1) {
                    tbody.removeChild(tbody.lastElementChild);
                    qnt -= 1;
                    document.getElementById("qnt").value = qnt; // Update the hidden input field
                } else {
                    alert("Cannot delete the last row!");
                }
            }

            // Validate function before form submission
            function validate() {
                const message = document.getElementById("noty");
                message.style.color = "green";
                message.innerHTML = "Your record has been saved.";

                let valid = true;
                const form = document.forms["sale"];
                if (valid) {
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