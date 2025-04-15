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
                                <td>Vendor: </td>
                                <td id="vendor"></td>
                                </tr>
                                <tr>
                                <td>Address: </td>
                                <td id="vendor_address"></td>
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
                    <h1 class ='title'>Purchase Order</h1>
                    <div id='underHead'>
                                <div class='topimage'>
                                    <img src='../images/logoLarge.png'>
                                </div>
                        </div>
                        <table class='invoice-table'>
                                    <tr>
                                    <td class='no'>Order NO: </td>
                                    <td class='no' id="order_no"></td>
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
                                <td>Ordered By: </td>
                                <td id="ordered_by"></td>
                                </tr>
                                <tr>
                                <td>Currency:</td>
                                <td>AFN ؋</td>
                                </tr>
                    </table>
                </div>
    
            </div>
                <table id='tblinvoice'>
                    <tbody id="purchase_table_body">
                        <tr>
                            <th>Drug Type</th>
                            <th>Drug Name</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                            <th>Discount</th>
                            <th>Total Cost</th>
                        </tr>
                        <tr id="row">
                        </tr>
                    </tbody>
                </table>
                <table id= 'tblinvoice'>
                    <tr>
                    <th>Sub Total:</th>
                    <th>Old Balance</th>
                    <th>Amount Paid</th>
                    <th>Grand Total</th>
                </tr>
                    <td id="total_purchase"></td>
                    <td id="balance_o"></td>
                    <td id="paid"></td>
                    <td id="grand"></td>
                </tr>
                </table>
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
                
                document.getElementById('order_no').textContent = urlParams.get('po_id') || '';
                document.getElementById('date1').textContent = urlParams.get('po_date') || '';
                document.getElementById('paid').textContent = urlParams.get('Amount_Paid') || '';
                document.getElementById('ordered_by').textContent = urlParams.get('ordered_by') || '';
                document.getElementById('total_purchase').textContent = urlParams.get('Total_amount') || '';

                // Convert Gregorian dates to Hijri Shamsi
                const gregorianDate = document.getElementById("date1").textContent;
                const dateObj = new Date(gregorianDate);

                document.getElementById("date").textContent = convertToHijriShamsi(gregorianDate);

                // Process purchase_data
                const po_data = urlParams.get('po_data');
                if (po_data) {
                    try {
                        const purchaseData = JSON.parse(decodeURIComponent(po_data));

                        // Reference to the table body
                        const purchaseTableBody = document.getElementById('purchase_table_body');

                        purchaseData.forEach((purchase, index) => {
                            const row = document.createElement('tr');

                            // Fetch drug name using inventory_id
                            fetch(`../php/getDrugNameDrugs.php?drug_id=${purchase.drug_id}`)
                                .then(response => response.json())
                                .then(data => {
                                    row.innerHTML = `
                                        <td>${index + 1}</td>
                                        <td>${data.drug_name}</td>
                                        <td>${purchase.quantity}</td>
                                        <td>${purchase.price.toFixed(2)}</td>
                                        <td>${purchase.discount.toFixed(2)}</td>
                                        <td>${purchase.total_amount.toFixed(2)}</td>
                                    `;
                                    purchaseTableBody.appendChild(row);
                                })
                                .catch(error => {
                                    console.error("Error fetching drug name:", error);
                                    row.innerHTML = `
                                        <td>${index + 1}</td>
                                        <td>N/A</td> <!-- Display N/A if drug name fetch fails -->
                                        <td>${purchase.quantity}</td>
                                        <td>${purchase.price.toFixed(2)}</td>
                                        <td>${purchase.discount.toFixed(2)}</td>
                                        <td>${purchase.total_amount.toFixed(2)}</td>
                                    `;
                                    purchaseTableBody.appendChild(row);
                                });
                        });
                    } catch (error) {
                        console.error("Error parsing purchase_data:", error);
                    }
                }
            };
            async function populateInput(){

                const urlParams = new URLSearchParams(window.location.search);
                const VendorName = await fetchVendorName(urlParams.get('vendor_id'));
                document.getElementById('vendor').innerHTML = VendorName;

            }

            window.addEventListener('DOMContentLoaded', async () => {
            await populateInput();
        });
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
