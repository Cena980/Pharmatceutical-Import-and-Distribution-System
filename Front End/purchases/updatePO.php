<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Page</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <?php include '../php/header2.php' ?>
    <div id="over"><h1>Update Purchase Order</h1></div>
    <form name="purchase">
        <input type="hidden" name="qnt" id="qnt" value="1">
        <div class="fixed-input">
            <div class="form-group">
                <label data-key="po-id" for="po_id">Order ID</label>
                <input type="number" name="po_id" id="po_id" autocomplete="off" readonly>
            </div>
        </div>
        <div class="fixed-input">
            <div class="form-group">
                <label data-key="date" for="Date_1">Date</label>
                <input type="date" name="Date_1" id="Date_1" autocomplete="off">
            </div>
            <div class="form-group">
                <label data-key="amount-paid" for="Amount_Paid">Amount Paid</label>
                <input type="number" name="Amount_Paid" id="Amount_Paid" autocomplete="off">
            </div>
            <div class="form-group">
                <label data-key="vendor" for="vendor">Vendor</label>
                <input type="text" name="vendor" id="vendor" autocomplete="off">
                <div class="suggestion" id="suggestion_vendor" style="border: 1px solid #ccc; display: none; position: fixed; background: white;"></div>
            </div>
            <div class="form-group">
                <label data-key="ordered-by" for="ordered_by">Ordered By</label>
                <input name="ordered_by" id="ordered_by">
            </div>
        </div>

        <table class="table table-success">
            <thead>
                <tr>
                    <th data-key="no">No</th>
                    <th data-key="drug-name">Drug Name</th>
                    <th data-key="quantity">Quantity</th>
                    <th data-key="price">Cost</th>
                    <th data-key="discount">Discount %</th>
                    <th data-key="selling-price">Selling Price</th>
                    <th data-key="expiration">Expiration</th>
                    <th data-key="total">Total</th>
                    <th data-key="Delete"></th>
                </tr>
            </thead>
            <tbody id="PurchaseRows">
                <!-- Rows will be dynamically added here -->
            </tbody>
        </table>
        <div class="addRemove">
            <button type="button" data-key="add-button" class="btn btn-add" onclick="Create_Purchase(event)">+</button>
        </div>

        <div class="grand_total">
            <div class="form-group">
                <label data-key="sub-total" for="grand_total">Sub Total</label>
                <input type="number" name="grand_total" id="grand_total" autocomplete="off">
            </div>
        </div>

        <div class="insertButtons">
            <button class="btn btn-update" onclick="updatePO(event)">Update</button>
            <button class="btn btn-refresh" onclick="window.location.reload()">Refresh</button>
            <button class="btn btn-delete" onclick="deletePO(event)">Delete</button>
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
                        drugInput.name = `drug_name_${rowNum}`;
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

                    
                    const drugExp = document.getElementById(`expiration_${NewRowNumber}`);
                    if (drugExp) {
                        drugExp.id = `expiration_${rowNum}`;
                        drugExp.name = `expiration_${rowNum}`;
                    }

                    const Delete = document.getElementById(`delete_${NewRowNumber}`);
                    if (Delete) {
                        Delete.id = `delete_${rowNum}`;
                        Delete.onclick = function () {
                            deleteRow(rowNum); // Call the function properly
                        };
                    }
                    const price = document.getElementById(`price_${NewRowNumber}`);
                    if (price) {
                        price.id = `price_${rowNum}`;
                        price.name = `price_${rowNum}`;
                    }


                    const quantity = document.getElementById(`quantity_${NewRowNumber}`);
                    if (quantity) {
                        quantity.id = `quantity_${rowNum}`;
                        quantity.name = `quantity_${rowNum}`;
                    }

                    const discount = document.getElementById(`discount_${NewRowNumber}`);
                    if (discount) {
                        discount.id = `discount_${rowNum}`;
                        discount.name = `discount_${rowNum}`;
                    }

                    const selling_price = document.getElementById(`selling_price_${NewRowNumber}`);
                    if (discount) {
                        discount.id = `selling_price_${rowNum}`;
                        discount.name = `selling_price_${rowNum}`;
                    }

                    const total = document.getElementById(`total_amount_${NewRowNumber}`);
                    if (total) {
                        total.id = `total_amount_${rowNum}`;
                        total.name = `total_amount_${rowNum}`;
                    }
                    addPriceEventListeners(rowNum);
                }

            }

            async function fetchVendorName(vendor_id) {
                try {
                    const response = await fetch(`../php/getVendorName.php?vendor_id=${vendor_id}`);
                    const data = await response.json();
                    return data.vendor_name || 'Unknown';
                } catch (error) {
                    console.error('Error fetching Vendor name:', error);
                    return 'Unknown';
                }
            }
        // Function to parse the URL and populate the form
        async function parseURLAndPopulateForm() {
            const urlParams = new URLSearchParams(window.location.search);

            // Populate the fixed inputs
            document.getElementById('po_id').value = urlParams.get('po_id');
            document.getElementById('Date_1').value = urlParams.get('po_date');
            document.getElementById('Amount_Paid').value = urlParams.get('Amount_Paid');
            document.getElementById('ordered_by').value = urlParams.get('ordered_by');
            document.getElementById('grand_total').value = urlParams.get('Total_amount');

            const VendorName = await fetchVendorName(urlParams.get('vendor_id'));
            document.getElementById('vendor').value = VendorName;

            // Parse the purchases_data JSON
            const purchaseData = JSON.parse(decodeURIComponent(urlParams.get('po_data')));

            // Create a variable to store the number of rows
            qnt = purchaseData.length; // Number of rows equals the length of purchasesData
            updateQnt();

            // Update the hidden input field for qnt
            document.getElementById('qnt').value = qnt;

            // Fetch drug names and create rows
            const purchaseRows = document.getElementById('PurchaseRows');

            // Clear existing rows
            purchaseRows.innerHTML = '';

            // Helper function to fetch drug name
            async function fetchDrugName(drug_id) {
                try {
                    const response = await fetch(`../php/getDrugNameDrugs.php?drug_id=${drug_id}`);
                    const data = await response.json();
                    return data.drug_name || 'Unknown';
                } catch (error) {
                    console.error('Error fetching drug name:', error);
                    return 'Unknown';
                }
            }

            // Create rows with drug names
            for (const [index, purchase] of purchaseData.entries()) {

                const drugName = await fetchDrugName(purchase.drug_id);

                const row = document.createElement('tr');
                row.id = `row_${index + 1}`;

                row.innerHTML = `
                    <td><p id="no_${index + 1}">${index + 1}</p></td>
                    <td>
                        <input type="text" name="drug_name_${index + 1}" id="drug_name_${index + 1}" 
                            autocomplete="off" placeholder="Enter Drug Name" value="${drugName}">
                        <div class="suggestion-box" id="suggestion_${index + 1}" 
                            style="display: none; position: absolute; background: white;"></div>
                    </td>
                    <td><input type="number" name="quantity_${index + 1}" id="quantity_${index + 1}" 
                            autocomplete="off" value="${purchase.quantity}"></td>
                    <td><input type="number" name="price_${index + 1}" id="price_${index + 1}" 
                            autocomplete="off" value="${purchase.price}"></td>
                    <td><input type="number" name="discount_${index + 1}" id="discount_${index + 1}" 
                            autocomplete="off" value="${purchase.discount}"></td>
                    <td><input type="number" name="selling_price_${index + 1}" id="selling_price_${index + 1}" 
                            autocomplete="off" value="${purchase.price}"></td>
                    <td><input type="month" name="expiration_${index + 1}"
                        id="expiration_${index + 1}" value="${purchase.expiration}"></td>
                    <td><input type="number" name="total_${index + 1}" id="total_${index + 1}" 
                            autocomplete="off" value="${purchase.total_amount}"></td>
                    <td><div class="delete-btn" id="delete_${index + 1}" onclick="deleteRow(${index + 1})">
                        <img style="width:25px;" src="../images/delete.png" alt="Delete"></div></td>
                `;


                purchaseRows.appendChild(row);
            }
        }
        

        window.addEventListener('DOMContentLoaded', async () => {
            await parseURLAndPopulateForm();
            calculateTotal(); // Add this to calculate initial totals
        });

        function updatePO(event) {
            event.preventDefault(); // Prevent default form submission
            const form = document.forms["purchase"];
            form.action = "../php/updatePO.php"; // Set action to the desired PHP script
            form.method = "post";
            form.submit();
        }

        function deletePO(event) {
            const form = document.forms["purchase"];
            event.preventDefault();
            form.action = "../php/deletePO.php";
            form.method = "post";
            form.submit();
        }
        document.getElementById("vendor").addEventListener("input", function () {
                const inputField = this;
                const suggestionBox = document.getElementById("suggestion_vendor");

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
                const suggestionBox = document.getElementById("suggestion_vendor");
                if (!e.target.closest("#vendor") && !e.target.closest("#suggestion_vendor")) {
                    suggestionBox.style.display = "none";
                }
            });
            // Hide the suggestion box when clicking outside
            function addEventForClickOutSide() {
                for(let i=1; i<=qnt; i++){
                    document.addEventListener("click", function (e) {
                        const suggestionBox = document.getElementById(`suggestion_${i}`);
                        if (!e.target.closest(`#drug_name_${i}`) && !e.target.closest(`suggestion_${i}`)) {
                            suggestionBox.style.display = "none";
                        }
                    });
                }
            }
            document.querySelector("table tbody").addEventListener("input", function (e) {
                if (e.target.name.startsWith("drug_name_")) {
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
                                            suggestionBox.style.display = "none";
                                            
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

            // Function to create a new purchase row
            function Create_Purchase(event) {
                event.preventDefault();
                qnt += 1;  // Increment the quantity to update the row number
                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.id = `row_${qnt}`;
                newRow.innerHTML = `
                    <td><p id="no_${qnt}">${qnt}</p></td>
                    <td>
                        <input type="text" name="drug_name_${qnt}" id="drug_name_${qnt}" autocomplete="off">
                        <div id="suggestion_${qnt}" class='suggestion-box' style="display: none; position: absolute; background-color: white;"></div>
                    </td>
                    <td><input type="number" name="quantity_${qnt}" id="quantity_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="price_${qnt}" id="price_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="discount_${qnt}" id="discount_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="selling_price_${qnt}" id="selling_price_${qnt}" autocomplete="off"></td>
                    <td><input type="month" name="expiration_${qnt}" id="expiration_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="total_${qnt}" id="total_${qnt}" autocomplete="off"></td>
                    <td><div class="delete-btn" id="delete_${qnt}" onclick="deleteRow(${qnt})"><img style="width:25px;" src="../images/delete.png" alt="Delete"></div></td>
                `;
                tbody.appendChild(newRow);

                // Update the hidden input field for quantity
                document.getElementById("qnt").value = qnt;
                addEventForClickOutSide();
                addTotalAmountEventListeners(qnt);
                
                
            }
            // Function to add event listeners for vendor name input
            function addVendorNameEventListener() {
                document.getElementById(`vendor`).addEventListener("input", function () {
                    const query = this.value;
                    const suggestionsDiv = document.getElementById("suggestion_vendor");
                    if (query.length > 1) {
                        fetch(`../php/get_vendor_suggestions.php?query=${encodeURIComponent(query)}`)
                            .then(response => response.json())
                            .then(data => {
                                suggestionsDiv.innerHTML = "";
                                suggestionsDiv.style.display = "block";

                                if (data.error) {
                                    suggestionsDiv.style.display = "none";
                                } else {
                                    const table = document.createElement("table");
                                    table.style.borderCollapse = "collapse";
                                    table.style.width = "100%";

                                    const header = document.createElement("tr");
                                    header.innerHTML = `<th style="border: 1px solid #ccc; padding: 8px;">Vendor Name</th>`;
                                    table.appendChild(header);

                                    data.forEach(vendor => {
                                        const row = document.createElement("tr");
                                        row.innerHTML = `<td style="border: 1px solid #ccc; padding: 8px;">${vendor.Vendor_Name}</td>`;
                                        row.style.cursor = "pointer";

                                        row.onclick = () => {
                                            document.getElementById(`vendor`).value = vendor.Vendor_Name;
                                            suggestionsDiv.style.display = "none";
                                        };

                                        table.appendChild(row);
                                    });

                                    suggestionsDiv.appendChild(table);
                                }
                            })
                            .catch(error => {
                                console.error("Error fetching vendor suggestions:", error);
                            });
                    } else {
                        suggestionsDiv.style.display = "none";
                    }
                });
            };

            addVendorNameEventListener();
        // Function to calculate total for each row
        function calculateTotal() {
            // Only select rows that have IDs starting with 'row_'
            const rows = document.querySelectorAll("table tbody tr[id^='row_']");
            let grandTotal = 0;

            rows.forEach(row => {
                // Get row number from the row ID
                const rowNumber = row.id.split('_')[1];
                
                // Find inputs using consistent lowercase naming
                const priceInput = row.querySelector(`input[name="price_${rowNumber}"]`);
                const quantityInput = row.querySelector(`input[name="quantity_${rowNumber}"]`);
                const discountInput = row.querySelector(`input[name="discount_${rowNumber}"]`);
                const totalInput = row.querySelector(`input[name="total_${rowNumber}"]`);

                // Parse values with proper fallbacks
                const price = parseFloat(priceInput?.value) || 0;
                const quantity = parseFloat(quantityInput?.value) || 0;
                const discount = parseFloat(discountInput?.value) || 0;

                // Calculate totals
                const discountAmount = (price * quantity * discount) / 100;
                const rowTotal = (price * quantity) - discountAmount;

                // Update row total if the input exists
                if (totalInput) {
                    totalInput.value = rowTotal.toFixed(2);
                }

                // Add to grand total
                grandTotal += rowTotal;
            });

            // Update grand total
            const grandTotalInput = document.getElementById("grand_total");
            if (grandTotalInput) {
                grandTotalInput.value = grandTotal.toFixed(2);
            }
        }
        // Function to add event listeners for total amount calculation
        function addTotalAmountEventListeners(rowNumber) {
            const inputs = [
                document.getElementById(`price_${rowNumber}`),
                document.getElementById(`quantity_${rowNumber}`),
                document.getElementById(`discount_${rowNumber}`)
            ];
            
            inputs.forEach(input => {
                if (input) {
                    // Remove any existing listener to avoid duplicates
                    input.removeEventListener('input', calculateTotal);
                    // Add new listener
                    input.addEventListener('input', calculateTotal);
                }
            });
        }

            function updateQnt() {
                document.getElementById("qnt").value = qnt;  // Update the hidden input field
            }
    </script>
</body>
</html>