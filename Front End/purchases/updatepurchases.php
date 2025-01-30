<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Update Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
        <script>
            // Wait for the DOM to load
            document.addEventListener("DOMContentLoaded", function () {
                const urlParams = new URLSearchParams(window.location.search);

                function setValue(id, param) {
                    const element = document.getElementById(id);
                    if (element) {
                        let value = urlParams.get(param);
                        if (value !== null) {
                            element.value = value;
                        }
                    }
                }

                setValue('purchase_id', 'purchase_id');
                setValue('vendor_id', 'vendor_id');
                setValue('drug_id', 'drug_id');
                setValue('price', 'price');
                setValue('quantity', 'quantity');
                setValue('Discount', 'Discount');  // Fix case sensitivity here
                setValue('purchase_date', 'purchase_date');
                setValue('expiration_date', 'expiration_date');
                setValue('total_amount', 'total_amount');
                setValue('amount_paid', 'amount_paid');

                console.log("Extracted Parameters:");
                urlParams.forEach((value, key) => {
                    console.log(`${key}: ${value}`);
                });
            });


        </script>
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1>Update</h1></div>
        <form name="updatepurchases">
                <table class="table table-success">
                <thead>
                <tr>
                    <th>purchase ID</th>
                    <th>Vendor ID</th>
                    <th>Drug ID</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Purchase Date</th>
                    <th>Expiration Date</th>
                    <th>Total Amount</th>
                    <th>Amount Paid</th>

                    
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="number" name="purchase_id" id="purchase_id" autocomplete="off"></td>
                        <td><input type="number" name="vendor_id" id="vendor_id" autocomplete="off"></td>
                        <td><input type="number" name="drug_id" id="drug_id" autocomplete="off"></td>
                        <td><input type="number" name="price" id="price" autocomplete="off"></td>
                        <td><input type="number" name="quantity" id="quantity" autocomplete="off"></td>
                        <td><input type="number" step="0.01" name="Discount" id="Discount" autocomplete="off"></td>
                        <td><input type="date" name="purchase_date" id="purchase_date" autocomplete="off"></td>
                        <td><input type="date" name="expiration_date" id="expiration_date" autocomplete="off"></td>
                        <td><input type="number" name="total_amount" id="total_amount" autocomplete="off"></td>
                        <td><input type="number" name="amount_paid" id="amount_paid" autocomplete="off"></td>
                        
                    </tr>
            
                    <tr>
                        <td id="pid"></td>
                        <td id="vid"></td>
                        <td id="did"></td>
                        <td id="p"></td>
                        <td id="q"></td>
                        <td id="d"></td>
                        <td id="pd"></td>
                        <td id="ta"></td>
                        <td id="ap"></td>
                        
                    </tr>
                <tr>
                    <td id="noty" class="table"></td>
                </tr>
                </tbody>
                </table>
                <div class="multi-button">
                <button type="submit" class="btn btn-update" onclick="Update()" >Update</button>
                <button type="submit" class="btn btn-delete" onclick="Delete()">Delete</button>
                </div>
            </form>
        </div>
        <?php include '../php/footer.php' ?>
        <script>
            function Update(){
                var message = document.getElementById("noty");
                message.style.color = "green";
                message.innerHTML = "Your record has been saved.";
        
                let valid = true;
                let sale = document.getElementById("purchase_id").value;
        
                if(!/^\d+$/.test(sale) || sale === ""){
                        document.getElementById("pid").innerHTML = "Please enter a valid Drug ID.";
                        valid = false;
                    } else {
        
                        document.getElementById("pid").innerHTML = "";
        
                    }
        
                let drug = document.getElementById("drug_id");
        
                /*if(!/^\d+$/.test(drug)){
                        document.getElementById("did").innerHTML = "Please enter a valid Drug ID.";
                        valid = false;
                    } else {
                        document.getElementById("did").innerHTML = "";
                    }*/
                const form = document.forms["updatepurchases"]; // Get the form by name
                if (valid) {
                    form.action = "../php/updatepurchases.php"; // Set action to the desired PHP script
                    form.method = "post"; // Ensure the method is correct
                } else {
                    // Reset action to prevent unintended submission
                    form.action = "";
                    message.style.color = "red";
                    message.innerHTML = "Validation failed. Please correct the errors.";
                }

                return valid;
            }
            function Delete(){
                var message = document.getElementById("noty");
                message.style.color = "green";
                message.innerHTML = "Your record has been saved.";
        
                let valid = true;
                let sale = document.getElementById("purchase_id").value;
        
                if(!/^\d+$/.test(sale) || sale === ""){
                        document.getElementById("pid").innerHTML = "Please enter a valid Drug ID.";
                        valid = false;
                    } else {
        
                        document.getElementById("pid").innerHTML = "";
        
                    }
        
                let drug = document.getElementById("drug_id");
        
                /*if(!/^\d+$/.test(drug)){
                        document.getElementById("did").innerHTML = "Please enter a valid Drug ID.";
                        valid = false;
                    } else {
                        document.getElementById("did").innerHTML = "";
                    }*/
                const form = document.forms["updatepurchases"]; // Get the form by name
                if (valid) {
                    form.action = "../php/deletepurchases.php"; // Set action to the desired PHP script
                    form.method = "post"; // Ensure the method is correct
                } else {
                    // Reset action to prevent unintended submission
                    form.action = "";
                    message.style.color = "red";
                    message.innerHTML = "Validation failed. Please correct the errors.";
                }

                return valid;
            }

            </script>
    </body>
</html>