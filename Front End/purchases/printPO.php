<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Print
        </title>
        <link rel="stylesheet" href="../css/home.css">
        <script src="../converter/jalaali.min.js"></script>
    </head>
    <body>
    <?php include '../php/header2.php' ?>

    <div id='printableSection'>
            <div class='row'>
                <div class='column'>
                    <table class='invoice-table'>
                                <tr>
                                <td>Bill To: </td>
                                <td id="customer_shop"></td>
                                </tr>
                                <tr>
                                <td>Name: </td>
                                <td id="customer_name"></td>
                                </tr>
                                <tr>
                                <td>Address: </td>
                                <td id="customer_address"></td>
                                </tr>
                                <tr class='date_r'>
                                <td rowspan='2'>Date: </td>
                                <td id="date1"></td>
                                </tr>
                                <tr>
                                <td id='date'></td>
                                </tr>
                    </table>
                </div>
                <div class='column'>
                    <h1 class ='title'>INVOICE</h1>
                    <div id='underHead'>
                                <div class='topimage'>
                                    <img src='../images/logoLarge.png'>
                                </div>
                        </div>
                        <table class='invoice-table'>
                                    <tr>
                                    <td class='no'>INVOICE NO: </td>
                                    <td class='no' id="invoice_no"></td>
                                    </tr>
                        </table>
                </div>
                <div class='column'>
                    <table class='invoice-table'>
                                <tr>
                                <td>Address:</td>
                                <td>Mazar Hotel</td>
                                </tr>
                                <tr>
                                <td>Shop No:</td>
                                <td>207</td>
                                </tr>
                                <tr>
                                <td>Booked By: </td>
                                <td id="sales_officer"></td>
                                </tr>
                                <tr>
                                <td>Currency:</td>
                                <td>AFN ؋</td>
                                </tr>
                                <tr class='date_r'>
                                <td rowspan='2'>Due Date:</td>
                                <td id="dueDate1"></td>
                                </tr>
                                <tr>
                                <td id='dueDate'></td>
                                </tr>
                    </table>
                </div>
    
            </div>
                <table id='tblinvoice'>
                    <tbody id="sales_table_body">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Total Price</th>
                        </tr>
                        <tr id="row">
                        </tr>
                    </tbody>
                </table>
                <table id= 'tblinvoice'>
                    <tr>
                    <th>Sub Total:</th>
                    <th>Received:</th>
                    <th>Owed:</th>
                </tr>
                    <td id="total_sales"></td>
                    <td id="received"></td>
                    <td id="owed"></td>
                </tr>
                </table>
                <div id='invoice-msg'>
                    <p>Thank you for choosing us—we appreciate your business and look forward to working with you again!</p>
                </div>
            </div>
            </div>
    <div class='button-print'>
        <button class="btn btn-save" onclick="printSection('printableSection')">Print</button>
    </div>
    <div class='button-print'>
        <button class="btn btn-back" onclick="GoBack()">Go Back</button>
    </div>
        <script>
            window.onload = function () {
                // Populate input fields with values from URL parameters
                const urlParams = new URLSearchParams(window.location.search);
                document.getElementById('invoice_no').innerHTML = urlParams.get('invoice_id') || '';
                document.getElementById('customer_shop').innerHTML = urlParams.get('shop') || '';
                document.getElementById('date1').innerHTML = urlParams.get('date') || '';
                document.getElementById('received').innerHTML = urlParams.get('received') || '';
                document.getElementById('owed').innerHTML = urlParams.get('owed') || '';
                document.getElementById('sales_officer').innerHTML = urlParams.get('sales_officer') || '';
                document.getElementById('total_sales').innerHTML = urlParams.get('total_sales') || '';

                // Convert Gregorian dates to Hijri Shamsi
                const gregorianDate = document.getElementById("date1").innerHTML;
                const dateObj = new Date(gregorianDate);
                if (!isNaN(dateObj.getTime())) { // Check if it's a valid date
                    dateObj.setDate(dateObj.getDate() + 7); // Add 7 days
                    
                    // Format the date to YYYY-MM-DD
                    const formattedDueDate = dateObj.toISOString().split('T')[0];

                    // Set the due date in the element with id="dueDate"
                    document.getElementById('dueDate1').innerHTML = formattedDueDate;
                        } else {
                    console.error("Invalid date format:", gregorianDate);
                }
                const gregorianDueDate = document.getElementById("dueDate1").innerHTML;

                document.getElementById("date").innerHTML = convertToHijriShamsi(gregorianDate);
                document.getElementById("dueDate").innerHTML = convertToHijriShamsi(gregorianDueDate);

                // Process sales_data
                const salesDataStr = urlParams.get('sales_data');
                if (salesDataStr) {
                    try {
                        const salesData = JSON.parse(decodeURIComponent(salesDataStr));

                        // Reference to the table body
                        const salesTableBody = document.getElementById('sales_table_body');

                        salesData.forEach((sale, index) => {
                            const row = document.createElement('tr');

                            // Fetch drug name using inventory_id
                            fetch(`../php/getDrugName.php?inventory_id=${sale.inventory_id}`)
                                .then(response => response.json())
                                .then(data => {
                                    row.innerHTML = `
                                        <td>${index + 1}</td>
                                        <td>${data.drug_name}</td> <!-- Display drug name -->
                                        <td>${sale.quantity}</td>
                                        <td>${sale.price.toFixed(2)}</td>
                                        <td>${sale.discount.toFixed(2)}</td>
                                        <td>${sale.total_price.toFixed(2)}</td>
                                    `;
                                    salesTableBody.appendChild(row);
                                })
                                .catch(error => {
                                    console.error("Error fetching drug name:", error);
                                    row.innerHTML = `
                                        <td>${index + 1}</td>
                                        <td>N/A</td> <!-- Display N/A if drug name fetch fails -->
                                        <td>${sale.quantity}</td>
                                        <td>${sale.price.toFixed(2)}</td>
                                        <td>${sale.discount.toFixed(2)}</td>
                                        <td>${sale.total_price.toFixed(2)}</td>
                                    `;
                                    salesTableBody.appendChild(row);
                                });
                        });
                    } catch (error) {
                        console.error("Error parsing sales_data:", error);
                    }
                }
            };
            function GoBack(){
                history.back();}

            // Function to print a specific section of the page
            function printSection(sectionId) {
                const section = document.getElementById(sectionId);
        
                if (section) {
                    const originalContent = document.body.innerHTML;
                    document.body.innerHTML = section.outerHTML;
                    window.print();
                    document.body.innerHTML = originalContent;
                } else {
                    console.error("Section not found: " + sectionId);
                }
            }

            // Function to convert Gregorian date to Hijri Shamsi (Solar Hijri)
            function convertToHijriShamsi(gregorianDate) {
                const date = new Date(gregorianDate);
                const { jy, jm, jd } = jalaali.toJalaali(
                    date.getFullYear(),
                    date.getMonth() + 1,
                    date.getDate()
                );
                return `${String(jd).padStart(2, "0")}/${String(jm).padStart(2, "0")}/${jy}`;
            }
        </script>
        <?php include '../php/footer.php' ?>
    </body>
</html>
