<!DOCTYPE html>
<html lang="en">
    <head>
        <title data-key="payment-insert">
            Insertion Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1 data-key="payments-add">Balance Processing</h1></div>
        <div class="alerts" id="feedback"></div>
        <form name="payments" method="post">
            <div class="fixed-input">
            <div class="form-group">
                    <label data-key="receipt" for="receipt">Receipt ID</label>
                    <input type="text" name="receipt" id="receipt" autocomplete="off">
                    
                </div>
                <div class="form-group">
                    <label data-key="customer" for="customer_shop_1">Customer ID</label>
                    <input type="text" name="Customer_Shop_1" id="customer_shop_1" autocomplete="off">
                    <div class="suggestion" id="suggestion_customer" style="border: 1px solid #ccc; display: none; position: fixed; background: white;"></div>
                </div>
                <div class="form-group">
                    <label data-key="balance" for="customer_balance_1">Customer Balance</label>
                    <input type="text" name="customer_balance_1" id="customer_balance_1" autocomplete="off" readonly>
                    <div class="suggestion" id="suggestion_balance" style="border: 1px solid #ccc; display: none; position: fixed; background: white;"></div>
                </div>
                <div class="form-group">
                    <label data-key="note" for="note">Note</label>
                    <input type="text" name="note" id="note" autocomplete="off">
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
                    <label data-key="currency" for="currency">Currency ID</label>
                    <input type="text" name="currency" id="currency" autocomplete="off">
                    <div class="suggestion" id="suggestion_currency" style="border: 1px solid #ccc; display: none; position: fixed; background: white;"></div>
                </div>
                <div class="form-group">
                    <label data-key="conversion_rate" for="conversion_rate">Conversion Rate</label>
                    <input type="number" name="conversion_rate" id="conversion_rate" autocomplete="off">
                </div>
                <div class="form-group">
                    <label data-key="sales-officer" for="Sales_Officer">Received By</label>
                    <input name="Sales_Officer" id="Sales_Officer">
                </div>
            </div>

            <div class="insertButtons">
                <button data-key="save-button" class="btn btn-save" onclick="validate()">Update</button>
                <button data-key="delete-button" class="btn btn-remove" onclick="Delete()">Delete</button>
            </div>
        </form>

        <!-- fetching footer from server-->
        <?php include '../php/footer.php' ?>

        <script>
            async function parseURLAndPopulateForm() {
                const urlParams = new URLSearchParams(window.location.search);

                // Populate customer-related fields
                document.getElementById('receipt').value = urlParams.get('receipt_id') || '';
                document.getElementById('customer_shop_1').value = urlParams.get('customer_id') || '';
                document.getElementById('customer_balance_1').value = urlParams.get('old_balance') || '';
                document.getElementById('note').value = urlParams.get('notes') || '';

                // Populate transaction-related fields
                let rawDate = urlParams.get('payment_date');
                
                if (rawDate) {
                    let dateObj = new Date(rawDate);
                    if (!isNaN(dateObj.getTime())) { // Ensure it's a valid date
                        let day = String(dateObj.getDate()).padStart(2, '0'); // Ensure two digits
                        let month = String(dateObj.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                        let year = dateObj.getFullYear();
                        rawDate = `${year}-${month}-${day}`;
                    } else {
                        rawDate = ''; // If invalid, set empty
                    }
                }

                document.getElementById('Date_1').value = rawDate;
                document.getElementById('AR_1').value = urlParams.get('payment_amount') || '';
                document.getElementById('currency').value = urlParams.get('currency_id') || '';
                document.getElementById('conversion_rate').value = urlParams.get('conversion_rate') || '';
                document.getElementById('Sales_Officer').value = urlParams.get('recorded_by') || '';
            }
            // Start the population process when the page loads
            window.addEventListener('DOMContentLoaded', async () => {
                await parseURLAndPopulateForm();
            });

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
            // Call the function for row 1
        function addCurrencyCodeEventListener() {
            document.getElementById(`currency`).addEventListener("input", function () {
                const query = this.value;
                const suggestionsDiv = document.getElementById("suggestion_currency"); // Updated to match your HTML

                if (query.length > 1) {
                    fetch(`../php/get_currency_code.php?query=${encodeURIComponent(query)}`)
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
                                header.innerHTML = `<th style="border: 1px solid #ccc; padding: 8px;">Currency Code</th>`;
                                table.appendChild(header);

                                data.forEach(currency => {
                                    const row = document.createElement("tr");
                                    row.innerHTML = `<td style="border: 1px solid #ccc; padding: 8px;">${currency.currency_code}</td>`;
                                    row.style.cursor = "pointer";

                                    row.onclick = () => {
                                        document.getElementById(`currency`).value = currency.currency_code;
                                        suggestionsDiv.style.display = "none"; // Hide suggestions when an item is clicked
                                    };

                                    table.appendChild(row);
                                });

                                suggestionsDiv.appendChild(table);
                            }
                        })
                        .catch(error => {
                            console.error("Error fetching currency suggestions:", error);
                        });
                } else {
                    suggestionsDiv.style.display = "none"; // Hide suggestions if query length is <= 1
                }
            });
        }

        // Call the function for row 1
        addCurrencyCodeEventListener();
        document.getElementById("currency").addEventListener("input", function () {
                const inputField = this;
                const suggestionBox = document.getElementById("suggestion_currency");

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
                const suggestionBox = document.getElementById("suggestion_currency");
                if (!e.target.closest("#currency") && !e.target.closest("#suggestion_currency")) {
                    suggestionBox.style.display = "none";
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
                                            suggestionsDiv.style.display = "none"; // Hide suggestions

                                            // Fetch and display balance
                                            fetch(`../php/get_customer_balance.php?customer_shop=${encodeURIComponent(customer.customer_shop)}`)
                                                .then(response => response.json())
                                                .then(balanceData => {
                                                    if (balanceData.error) {
                                                        console.error("Error fetching balance:", balanceData.error);
                                                    } else {
                                                        document.getElementById(`customer_balance_${rowNumber}`).value = balanceData.balance;
                                                    }
                                                })
                                                .catch(error => console.error("Error fetching balance:", error));
                                        };

                                        table.appendChild(row);
                                    });

                                    suggestionsDiv.appendChild(table);
                                }
                            })
                            .catch(error => console.error("Error fetching customer suggestions:", error));
                    } else {
                        suggestionsDiv.style.display = "none"; // Hide suggestions if query length is <= 1
                    }
                });
            }

        // Call the function for row 1
        addCustomerShopEventListener(1);


            // Validate function before form submission
            function validate() {

                let valid = true;
                const form = document.forms["payments"];
                if (valid) {
                    const formData = new FormData(form);

                    // Send form data using AJAX (fetch)
                    fetch("../php/updatereceipt.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.text()) // Use .json() if PHP returns JSON
                    .then(data => {
                        document.getElementById("feedback").innerHTML = data; // Display response in a div
                        alert(data); // Optional alert for user feedback
                    })
                    .catch(error => console.error("Error:", error));
                } else {
                    message.style.color = "red";
                    message.innerHTML = "Please correct the errors above.";
                    return false; // Prevent form submission if validation fails
                }

                return valid;
            }
            function Delete() {

                let valid = true;
                const form = document.forms["payments"];
                if (valid) {
                    const formData = new FormData(form);

                    // Send form data using AJAX (fetch)
                    fetch("../php/deletereceipt.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.text()) // Use .json() if PHP returns JSON
                    .then(data => {
                        document.getElementById("feedback").innerHTML = data; // Display response in a div
                        alert(data); // Optional alert for user feedback
                    })
                    .catch(error => console.error("Error:", error));
                } else {
                    message.style.color = "red";
                    message.innerHTML = "Please correct the errors above.";
                    return false; // Prevent form submission if validation fails
                }

                return valid;
                }
        </script>
    </body>
</html>