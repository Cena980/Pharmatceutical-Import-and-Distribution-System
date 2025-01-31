<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Insertion Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
    <?php include '../php/header2.php' ?>
        <div id="over"><h1>New purchase</h1></div>
        <form name="purchase">
            <table class="table">
                <input type="hidden" name="qnt" id="qnt" value="1">
                <div class="fixed-input" style="max-width: 800px;">
                <div class="form-group">
                    <label data-key="vendor" for="vendor_name_1">Vendor</label>
                    <input type="text" name="vendor_name_1" id="vendor_name_1" autocomplete="off">
                    <div class="suggestions_vendors" id="suggestions_vendors" style="display: none; position: absolute; background-color: white"></div>
                </div>  
                <div class="form-group">
                    <label data-key="date" for="purchase_date_1">Date</label>
                    <input type="date" name="purchase_date_1" id="purchase_date_1" autocomplete="off">
                </div>
                <div class="form-group">
                    <label data-key="amount-paid" for="amount_paid_1">Amount Paid</label>
                    <input type="number" name="amount_paid_1" id="amount_paid_1" autocomplete="off">
                </div>
                <div class="form-group">
                    <label data-key="order_by" for="order_by">Order By</label>
                    <input type="text" name="order_by" id="order_by" autocomplete="off">
                </div>
                    
                </div>
                <tr>
                    <th data-key="drug-name">Drug Name</th>
                    <th data-key="price">Price</th>
                    <th data-key="quantity">Quantity</th>
                    <th data-key="discount">Drug Discount</th>
                    <th data-key="exp-date">Expiration</th>
                    <th data-key="total">Total Amount</th>
                    
                </tr>
                <tr>
                    <td>
                        <input type="text" name="drug_name_1" id="drug_name_1" autocomplete="off">
                        <div id="suggestion_1" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                    </td>
                    <td><input type="number" name="price_1" id="price_1" autocomplete="off"></td>
                    <td><input type="number" name="quantity_1" id="quantity_1" autocomplete="off"></td>
                    <td><input type="number" name="discount_1" id="discount_1" autocomplete="off"></td>
                    <td><input type="month" name="expiration_1" id="expiration_1" autocomplete="off"></td>
                    <td><input data-key="total" type="number" name="total_amount_1" id="total_amount_1" autocomplete="off"></td>
                </tr>
                <tr>
                    <td id="nvendor_id"></td>
                    <td id="ndid"></td>
                    
                    <td id="nqnt"></td>
                    <td id="ndate"></td>
                    <td id="ntotal"></td>
                    
                </tr>
                <tr>
                    <td id="noty" class="table"></td>
                </tr>
            
            </table>
            
        </div>
        </form>
    </div>
    <div class="grand_total">
        <div class="form-group">
            <label data-key="sub-total" for="grand_total">Sub Total</label>
            <input type="number" name="grand_total" id="grand_total" autocomplete="off">
        </div>
    </div>
            <div class="insertButtons">
                <div class="addRemove">
                <button class="btn btn-add" onclick="create_purchase(); return false;">+</button>
                <button class="btn btn-remove" onclick="delete_last_row(); return false;">-</button>
                </div>
                <button  class="btn btn-save" onclick="validate()" >Save</button>
            </div>

        <?php include '../php/footer.php' ?>
        <script>
            let qnt = 1;
            window.onload = function() {
                const dateInput = document.getElementById("purchase_date_1");
                const today = new Date();

                // Format the date as YYYY-MM-DD
                const formattedDate = today.toISOString().split("T")[0];

                // Set the value of the input
                dateInput.value = formattedDate;
                addVendorNameEventListener(1);

                addTotalAmountEventListeners(qnt);
            };
            let grandTotal = 0;

            function calculateTotalAmount(rowNumber) {
                const price = parseFloat(document.getElementById(`price_${rowNumber}`).value) || 0;
                const quantity = parseFloat(document.getElementById(`quantity_${rowNumber}`).value) || 0;
                const discount = parseFloat(document.getElementById(`discount_${rowNumber}`).value) || 0;

                // Total amount calculation
                const discountAmount = (price * quantity * discount) / 100;
                const totalAmount = (price * quantity) - discountAmount;

                // Update the total amount field
                document.getElementById(`total_amount_${rowNumber}`).value = totalAmount.toFixed(2);

                // Recalculate grand total
                recalculateGrandTotal();
            }


            // Function to recalculate the grand total
            function recalculateGrandTotal() {
                grandTotal = 0; // Reset the grand total to 0

                // Loop through all rows to sum the total amounts
                for (let i = 1; i <= qnt; i++) {
                    const totalAmount = parseFloat(document.getElementById(`total_amount_${i}`).value) || 0;
                    grandTotal += totalAmount;
                }

                grandTotalInput();
            };

            function grandTotalInput() {
                const grandTotalInput = document.getElementById("grand_total");
                if (grandTotalInput) {
                    grandTotalInput.value = grandTotal.toFixed(2); // Ensure the grand total has two decimal places
                }
            };



            // Function to add event listeners for total amount calculation
            function addTotalAmountEventListeners(rowNumber) {
                const fields = [`#price_${rowNumber}`, `#quantity_${rowNumber}`, `#discount_${rowNumber}`];
                fields.forEach(fieldSelector => {
                    const field = document.querySelector(fieldSelector);
                    if (field) {
                        field.addEventListener("input", () => calculateTotalAmount(rowNumber));
                    }
                });
            }

            // Function to add event listeners for drug name input
            document.querySelector("table tbody").addEventListener("input", function (e) {
                if (e.target.name.startsWith("drug_name_")) {
                    const rowNumber = e.target.name.split("_")[2]; // Extract the row number
                    const query = e.target.value;
                    const suggestionBox = document.getElementById(`suggestion_${rowNumber}`);

                    if (query.length > 1) {
                        fetch(`../php/get_drug_suggestions1.php?query=${encodeURIComponent(query)}`)
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
                                        <th style="border: 1px solid #ccc; padding: 8px;">Drug Name</th>
                                    `;
                                    table.appendChild(header);
                                    data.forEach(drug => {
                                        const row = document.createElement("tr");
                                        row.innerHTML = `
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Drug_Name}</td>
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
            });

            // Function to add event listeners for vendor name input
            function addVendorNameEventListener(rowNumber) {
                document.getElementById(`vendor_name_${rowNumber}`).addEventListener("input", function () {
                    const query = this.value;
                    const suggestionsDiv = document.getElementById("suggestions_vendors");
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
                                            document.getElementById(`vendor_name_${rowNumber}`).value = vendor.Vendor_Name;
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
            for (let i = 1; i <= qnt; i++) {
                const inputField = document.getElementById(`drug_name_${i}`);

                inputField.addEventListener("input", function () {
                    const suggestionBox = document.getElementById(`suggestion_${i}`);

                    // Hide the suggestion box when the user starts typing in a new field
                    suggestionBox.style.display = "none";

                    // Get the position and size of the current input field
                    const rect = inputField.getBoundingClientRect();

                    // Set the suggestion box's position relative to the current input field
                    suggestionBox.style.top = rect.bottom + window.scrollY + "px"; // Account for vertical scroll
                    suggestionBox.style.left = rect.left + window.scrollX + "px";  // Account for horizontal scroll
                    suggestionBox.style.width = rect.width + "px"; // Match the input width

                    // Show the suggestion box at the new position
                    suggestionBox.style.display = "block";
                });
            };

            // Hide the suggestion box when clicking outside any of the input fields or the suggestion box
            document.addEventListener("click", function (e) {
                const suggestionBox = document.getElementById("suggestions_vendors");
                let clickedInside = false;

                // Check if the click is inside any of the input fields
                for (let i = 1; i <= qnt; i++) {
                    const inputField = document.getElementById(`drug_name_${i}`);
                    if (e.target === inputField || e.target.closest(`#drug_name_${i}`)) {
                        clickedInside = true;
                        break;
                    }
                }

                // Hide the suggestion box if the click is outside all input fields and the suggestion box
                if (!clickedInside && !e.target.closest("#suggestions")) {
                    suggestionBox.style.display = "none";
                }
            });



            document.getElementById(`vendor_name_1`).addEventListener("input", function () {
                    const inputField = this;
                    const suggestionBox = document.getElementById("suggestions_vendors");

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
                    const suggestionBox = document.getElementById("suggestions_vendors");
                    if (!e.target.closest(`#vendor_name_1`) && !e.target.closest(`#suggestions_vendors`)) {
                        suggestionBox.style.display = "none";
                    }
                });

            // Function to create a new purchase row
            function create_purchase() {
                qnt += 1;

                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td>
                        <input type="text" name="drug_name_${qnt}" id="drug_name_${qnt}" autocomplete="off">
                        <div id="suggestion_${qnt}" class ='suggestion-box' style="display: none; position: absolute; background-color: white;"></div>
                    </td>
                    <td><input type="number" name="price_${qnt}" id="price_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="quantity_${qnt}" id="quantity_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="discount_${qnt}" id="discount_${qnt}" autocomplete="off"></td>
                    <td><input type="month" name="expiration_${qnt}" id="expiration_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="total_amount_${qnt}" id="total_amount_${qnt}" autocomplete="off" readonly></td>
                `;
                tbody.appendChild(newRow);

                // Add event listeners for the new row after it's added to the DOM
                addTotalAmountEventListeners(qnt);

                // Update the hidden input field
                document.getElementById("qnt").value = qnt;
            }


            function delete_last_row() {
                const tbody = document.querySelector("table tbody");
                if (tbody.rows.length > 1 && qnt > 1) {
                    tbody.removeChild(tbody.lastElementChild);
                    qnt -= 1;
                    document.getElementById("qnt").value = qnt; // Update the hidden input field
                } else {
                    alert("Cannot delete the last row!");
                }
            };

            function validate() {

                let valid = true;

                // Dynamically update form action if valid
                const form = document.forms["purchase"]; // Get the form by name
                if (valid) {
                    var message = document.getElementById("noty");
                    message.style.color = "green";
                    message.innerHTML = "Your record has been saved.";
                    form.action = "../php/insertpurchases.php"; // Set action to the desired PHP script
                    form.method = "post"; // Ensure the method is correct'
                    form.submit();
                } else {
                    // Reset action to prevent unintended submission
                    form.action = "";
                    message.style.color = "red";
                    message.innerHTML = "Validation failed. Please correct the errors.";
                }

                return valid; // Prevent form submission if invalid
            };

        </script>
    </body>
</html>