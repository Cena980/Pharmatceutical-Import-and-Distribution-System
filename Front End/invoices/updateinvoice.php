<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Page</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <?php include '../php/header2.php' ?>
    <div id="over"><h1>Update Invoice</h1></div>
    <form name="sale">
        <input type="hidden" name="qnt" id="qnt" value="1">
        <div class="fixed-input">
            <div class="form-group">
                <label data-key="invoice-id" for="invoice_id">Invoice ID</label>
                <input type="number" name="invoice_id" id="invoice_id" autocomplete="off">
            </div>
        </div>
        <div class="fixed-input">
            <div class="form-group">
                <label data-key="date" for="Date_1">Date</label>
                <input type="date" name="Date_1" id="Date_1" autocomplete="off">
            </div>
            <div class="form-group">
                <label data-key="amount-received" for="AR_1">Amount Received</label>
                <input type="number" name="Amount_Received_1" id="AR_1" autocomplete="off">
            </div>
            <div class="form-group">
                <label data-key="cut-id" for="ci_1">Employee Cut ID</label>
                <input type="number" name="Cut_ID_1" id="ci_1" autocomplete="off">
            </div>
            <div class="form-group">
                <label data-key="customer" for="customer_shop_1">Customer</label>
                <input type="text" name="Customer_Shop_1" id="customer_shop_1" autocomplete="off">
                <div class="suggestion" id="suggestion_customer" style="border: 1px solid #ccc; display: none; position: fixed; background: white;"></div>
            </div>
            <div class="form-group">
                <label data-key="sales-officer" for="Sales_Officer">Sales Officer</label>
                <input name="Sales_Officer" id="Sales_Officer">
            </div>
        </div>

        <table class="table table-success">
            <thead>
                <tr>
                    <th data-key="no">No</th>
                    <th data-key="drug-name">Drug Name</th>
                    <th data-key="quantity">Quantity</th>
                    <th data-key="discount">Discount</th>
                    <th data-key="price">Price</th>
                    <th data-key="total">Total</th>
                    <th data-key="note">Note</th>
                    <th data-key="Delete"></th>
                </tr>
            </thead>
            <tbody id="salesRows">
                <!-- Rows will be dynamically added here -->
            </tbody>
        </table>
        <div class="addRemove">
                    <button data-key="add-button" class="btn btn-add" onclick="create_sale(); return false;">+</button>
                </div>

        <div class="grand_total">
            <div class="form-group">
                <label data-key="sub-total" for="grand_total">Sub Total</label>
                <input type="number" name="grand_total" id="grand_total" autocomplete="off">
            </div>
        </div>
        <div class="grand_total">
            <div class="form-group">
                <label data-key="due-date" for="dueDate">Due Date</label>
                <input type="date" name="dueDate" id="dueDate" autocomplete="off">
            </div>
        </div>

        <div class="insertButtons">
            <button class="btn btn-update" onclick="updateInvoice(event)">Update</button>
            <button class="btn btn-refresh" onclick="window.location.reload()">Refresh</button>
            <button class="btn btn-delete" onclick="deleteInvoice(event)">Delete</button>
        </div>
    </form>
    <?php include '../php/footer.php' ?>
    <script>
        let qnt = 1;
            function deleteRow(rowNumber) {
                const row = document.getElementById(`row_${rowNumber}`);
                if (row) {
                    row.remove();
                    qnt--;
                    document.getElementById("qnt").value = qnt;
                    renumberRows(rowNumber);
                    addEventForClickOutSide();
                    calculateTotal();
                }
            }
            function renumberRows(number){
                for (let i = 1; i <= qnt; i++) {
                    let NewRowNumber = number + i; // This should be inside the loop
                    let rowNum = NewRowNumber - 1; // One less than NewRowNumber

                    const Row = document.getElementById(`row_${NewRowNumber}`);
                    if (Row) Row.id = `row_${rowNum}`;

                    const drugInput = document.getElementById(`drug_name_${NewRowNumber}`);
                    if (drugInput) {
                        drugInput.id = `drug_name_${rowNum}`;
                        drugInput.name = `Drug_Name_${rowNum}`;
                    }
                    const rowNo = document.getElementById(`no_${NewRowNumber}`);
                    if (rowNo) {
                        rowNo.id = `no_${rowNum}`;
                        rowNo.textContent = rowNum;

                    }

                    const drugSuggestion = document.getElementById(`suggestion_${NewRowNumber}`);
                    if (drugSuggestion) {
                        drugSuggestion.id = `suggestion_${rowNum}`;
                        drugSuggestion.name = `suggestion_${rowNum}`;
                    }

                    const drugAmount = document.getElementById(`Amount_${NewRowNumber}`);
                    if (drugAmount) {
                        drugAmount.id = `Amount_${rowNum}`;
                        drugAmount.name = `Amount_${rowNum}`;
                    }

                    
                    const drugExp = document.getElementById(`Expiration_${NewRowNumber}`);
                    if (drugExp) {
                        drugExp.id = `Expiration_${rowNum}`;
                        drugExp.name = `Expiration_${rowNum}`;
                    }

                    const Delete = document.getElementById(`delete_${NewRowNumber}`);
                    if (Delete) {
                        Delete.id = `delete_${rowNum}`;
                        Delete.onclick = function () {
                            deleteRow(rowNum); // Call the function properly
                        };
                    }


                    const quantity = document.getElementById(`qi_${NewRowNumber}`);
                    if (quantity) {
                        quantity.id = `qi_${rowNum}`;
                        quantity.name = `Quantity_${rowNum}`;
                    }

                    const discount = document.getElementById(`dt_${NewRowNumber}`);
                    if (discount) {
                        discount.id = `dt_${rowNum}`;
                        discount.name = `Discount_${rowNum}`;
                    }

                    const price = document.getElementById(`pr_${NewRowNumber}`);
                    if (price) {
                        price.id = `pr_${rowNum}`;
                        price.name = `Price_${rowNum}`;
                    }

                    const total = document.getElementById(`tl_${NewRowNumber}`);
                    if (total) {
                        total.id = `tl_${rowNum}`;
                        total.name = `Total_${rowNum}`;
                    }

                    const note = document.getElementById(`Note_${NewRowNumber}`);
                    if (note) {
                        note.id = `Note_${rowNum}`;
                        note.name = `Note_${rowNum}`;
                    }
                }

            }
        // Function to parse the URL and populate the form
        async function parseURLAndPopulateForm() {
            const urlParams = new URLSearchParams(window.location.search);

            // Populate the fixed inputs
            document.getElementById('invoice_id').value = urlParams.get('invoice_id');
            document.getElementById('Date_1').value = urlParams.get('date');
            document.getElementById('AR_1').value = urlParams.get('received');
            document.getElementById('ci_1').value = urlParams.get('cut_id');
            document.getElementById('customer_shop_1').value = urlParams.get('shop');
            document.getElementById('Sales_Officer').value = urlParams.get('sales_officer');

            // Parse the sales_data JSON
            const salesData = JSON.parse(decodeURIComponent(urlParams.get('sales_data')));

            // Create a variable to store the number of rows
            qnt = salesData.length; // Number of rows equals the length of salesData
            updateQnt();

            // Update the hidden input field for qnt
            document.getElementById('qnt').value = qnt;

            // Fetch drug names and create rows
            const salesRows = document.getElementById('salesRows');

            // Clear existing rows
            salesRows.innerHTML = '';

            // Helper function to fetch drug name
            async function fetchDrugName(inventoryId) {
                try {
                    const response = await fetch(`../php/getDrugName.php?inventory_id=${inventoryId}`);
                    const data = await response.json();
                    return data.drug_name || 'Unknown';
                } catch (error) {
                    console.error('Error fetching drug name:', error);
                    return 'Unknown';
                }
            }

            // Create rows with drug names
            for (const [index, sale] of salesData.entries()) {
                document.getElementById('ci_1').value = sale.cut_id;
                const drugName = await fetchDrugName(sale.inventory_id);

                const row = document.createElement('tr');
                row.id = `row_${index + 1}`;

                row.innerHTML = `
                    <input type="hidden" name="Amount_${index + 1}" id="Amount_${index + 1}">
                    <input type="hidden" name="Expiration_${index + 1}" id="Expiration_${index + 1}">
                    <td><p id="no_${index + 1}">${index + 1}</p></td>
                    <td>
                        <input type="text" name="Drug_Name_${index + 1}" id="drug_name_${index + 1}" 
                            autocomplete="off" placeholder="Enter Drug Name" value="${drugName}">
                        <div class="suggestion-box" id="suggestion_${index + 1}" 
                            style="display: none; position: absolute; background: white;"></div>
                    </td>
                    <td><input type="number" name="Quantity_${index + 1}" id="qy_${index + 1}" 
                            autocomplete="off" value="${sale.quantity}"></td>
                    <td><input type="number" name="Discount_${index + 1}" id="dt_${index + 1}" 
                            autocomplete="off" value="${sale.discount}"></td>
                    <td><input type="number" name="Price_${index + 1}" id="pr_${index + 1}" 
                            autocomplete="off" value="${sale.price}"></td>
                    <td><input type="number" name="Total_${index + 1}" id="tl_${index + 1}" 
                            autocomplete="off" value="${sale.total_price}"></td>
                    <td><input type="text" name="Note_${index + 1}" id="Note_${index + 1}" 
                            autocomplete="off" value="${sale.note}"></td>
                    <td><div class="delete-btn" id="delete_${index + 1}" onclick="deleteRow(${index + 1})">
                        <img style="width:25px;" src="../images/delete.png" alt="Delete"></div></td>
                `;


                salesRows.appendChild(row);
            }

            // Set the grand total
            document.getElementById('grand_total').value = urlParams.get('total_sales');
        }

        // Start the population process when the page loads
        window.addEventListener('DOMContentLoaded', async () => {
            await parseURLAndPopulateForm();
        });

        function updateInvoice(event) {
            event.preventDefault(); // Prevent default form submission
            const form = document.forms["sale"];
            form.action = "../php/updateinvoice.php"; // Set action to the desired PHP script
            form.method = "post";
            form.submit();
        }

        function deleteInvoice(event) {
            const form = document.forms["sale"];
            event.preventDefault();
            form.action = "../php/deleteinvoice.php";
            form.method = "post";
            form.submit();
        }
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
            // Hide the suggestion box when clicking outside
            function addEventForClickOutSide() {
                for(let i=1; i<=qnt; i++){
                    document.addEventListener("click", function (e) {
                        const suggestionBox = document.getElementById(`suggestion_${i}`);
                        if (!e.target.closest(`#Drug_Name_${i}`) && !e.target.closest(`suggestion_${i}`)) {
                            suggestionBox.style.display = "none";
                        }
                    });
                }
            }
            document.querySelector("table tbody").addEventListener("input", function (e) {
                if (e.target.name.startsWith("Drug_Name_")) {
                    const rowNumber = e.target.name.split("_")[2]; // Extract the row number
                    const query = e.target.value;
                    const suggestionBox = document.getElementById(`suggestion_${rowNumber}`);

                    if (query.length > 1) {
                        fetch(`../php/get_drug_suggestions.php?query=${encodeURIComponent(query)}`)
                            .then(response => response.json())
                            .then(data => {
                                suggestionBox.innerHTML = "";
                                suggestionBox.style.display = "block";

                                if (data.error) {
                                    suggestionBox.style.display = "none";
                                } else {
                                    const table = document.createElement("table");
                                    table.style.borderCollapse = "collapse";
                                    table.style.width = "100%";
                                    const header = document.createElement("tr");
                                    header.innerHTML = `
                                        <th style="border: 1px solid #ccc; padding: 8px;">Drug Type</th>
                                        <th style="border: 1px solid #ccc; padding: 8px;">Drug Name</th>
                                        <th style="border: 1px solid #ccc; padding: 8px;">Expiration Date</th>
                                        <th style="border: 1px solid #ccc; padding: 8px;">Amount</th>
                                    `;
                                    table.appendChild(header);
                                    data.forEach(drug => {
                                        const row = document.createElement("tr");
                                        row.innerHTML = `
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Drug_Type}</td>
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Drug_Name}</td>
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Expiration_Date}</td>
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Amount}</td>
                                        `;
                                        row.style.cursor = "pointer";
                                        row.onclick = () => {
                                            document.getElementById(`drug_name_${rowNumber}`).value = drug.Drug_Name;
                                            document.getElementById(`Amount_${rowNumber}`).value = drug.Amount;
                                            document.getElementById(`Expiration_${rowNumber}`).value = drug.Expiration_Date;
                                            suggestionBox.style.display = "none";
                                            fetchPrice(rowNumber);
                                        };
                                        table.appendChild(row);
                                    });
                                    suggestionBox.appendChild(table);
                                }
                            })
                            .catch(error => {
                                console.error("Error fetching drug suggestions:", error);
                            });
                    } else {
                        suggestionBox.style.display = "none";
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

            // Function to create a new sale row
            function create_sale() {
                qnt += 1;  // Increment the quantity to update the row number

                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.id = `row_${qnt}`;
                newRow.innerHTML = `
        
                    <td><p id="no_${qnt}">${qnt}</p></td>
                    <input type="hidden" name="Amount_${qnt}" id="Amount_${qnt}">
                    <input type="hidden" name="Expiration_${qnt}" id="Expiration_${qnt}">
                    <td>
                        <input type="text" name="Drug_Name_${qnt}" id="drug_name_${qnt}" autocomplete="off" placeholder="Enter Drug Name">
                        <div class="suggestion-box" id="suggestion_${qnt}" style="display: none; position: absolute; background: white;"></div>
                    </td>
                    <td><input type="number" name="Quantity_${qnt}" id="qi_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="Discount_${qnt}" id="dt_${qnt}" value="0" autocomplete="off"></td>
                    <td><input type="number" name="Price_${qnt}" id="pr_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="Total_${qnt}" id="tl_${qnt}" autocomplete="off"></td>
                    <td><input type="text" name="Note_${qnt}" id="Note_${qnt}" autocomplete="off"></td>
                    <td><div class="delete-btn" id="delete_${qnt}" onclick="deleteRow(${qnt})"><img style="width:25px;" src="../images/delete.png" alt="Delete"></div></td>
                `;
                tbody.appendChild(newRow);

                // Update the hidden input field for quantity
                document.getElementById("qnt").value = qnt;
                addEventForClickOutSide();
            }
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
            const amount = document.getElementById(`Amount_${rowNumber}`).value.trim();

            if (drugName !== "") {
                let url = `../php/get_price.php?Drug_Name=${encodeURIComponent(drugName)}`;
                if (amount !== "") {
                    url += `&Amount=${encodeURIComponent(amount)}`;
                }

                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.price) {
                            document.getElementById(`pr_${rowNumber}`).value = data.price;
                            calculateTotal();  // Recalculate totals for all rows after price is set
                        } else {
                            alert("Price not found for the selected drug.");
                        }
                    })
                    .catch(error => {
                        console.error("Fetch error:", error);
                        alert("Error fetching price. Please try again.");
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
    </script>
</body>
</html>