<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Update Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1>Update Customer</h1></div>
        <form name="customer">
            <table class="table table-success">
                <thead>
                <tr>
                   <th>Customer ID</th>
                   <th>Customer Shop</th>
                   <th>Customer Name</th>
                   <th>Address</th>
                   <th>Phone</th>
                   <th>Useful Info</th>
                    
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="number" name="customer_id" id="customer_id" autocomplete="off"></td>
                        <td><input type="text" name="customer_shop" id="customer_shop" autocomplete="off"></td>
                        <td><input type="text" name="customer_name" id="customer_name" autocomplete="off"></td>
                        <td><input type="text" name="address" id="address" autocomplete="off"></td>
                        <td><input type="text" name="phone" id="phone" autocomplete="off"></td>
                        <td><input type="longtext" name="useful_info" id="useful_info" autocomplete="off"></td>
                    </tr>
            
                    <tr>
                        <div id="note"></div>
                        <div id="noty"></div>
                    </tr>
                </tbody>
               </table>
            </form>
        </div>
            <div class="multi-button">
            <button class="btn btn-update" onclick="validate()" >Update</button>
            <button class="btn btn-delete" onclick="delete_customer()" >Delete</button>
            </div>
            

            <?php include '../php/footer.php' ?>
        <script>
            window.onload = function () {
                const urlParams = new URLSearchParams(window.location.search);
        
                // Populate input fields with values from URL parameters
                document.getElementById('customer_id').value = urlParams.get('customer_id') || '';
                document.getElementById('customer_shop').value = urlParams.get('customer_shop') || '';
                document.getElementById('customer_name').value = urlParams.get('customer_name') || '';
                document.getElementById('address').value = urlParams.get('address') || '';
                document.getElementById('phone').value = urlParams.get('phone') || '';
                document.getElementById('useful_info').value = urlParams.get('useful_info') || '';
            };
            function validate(){
                let valid = true;
                let sale = document.getElementById("customer_id").value;
        
                if(!/^\d+$/.test(sale) || sale === ""){
                        document.getElementById("note").innerHTML = "Please enter a valid Customer ID.";
                        valid = false;
                    } else {
        
                        document.getElementById("note").innerHTML = "";
        
                    }
        
                let phone = document.getElementById("phone").value;
        
                if (!/^0\d{9}$/.test(phone) || phone === "") {
                    document.getElementById("note").innerHTML = "Please enter a valid Phone Number.";
                    valid = false;
                } else {
                    document.getElementById("note").innerHTML = "";
                }
                const form = document.forms['customer'];
                if(valid){
                    var message = document.getElementById("noty");
                    message.style.color = "green";
                    message.innerHTML = "Your record has been updated.";
                    form.action="../php/updatecustomer.php";
                    form.method="post";
                    form.submit();
                }else {
                    var message = document.getElementById("noty");
                    message.style.color = "red";
                    message.innerHTML = "Your record has not been updated.";
                }

        
            }
            function delete_customer(){
                let valid = true;
                let sale = document.getElementById("customer_id").value;
        
                if(!/^\d+$/.test(sale) || sale === ""){
                        document.getElementById("note").innerHTML = "Please enter a valid Customer ID.";
                        valid = false;
                    } else {
        
                        document.getElementById("note").innerHTML = "";
        
                    }

                const form = document.forms['customer'];
                if(valid){
                    var message = document.getElementById("noty");
                    message.style.color = "green";
                    message.innerHTML = "Your record has been deleted.";
                    form.action="../php/deletecustomer.php";
                    form.method="post";
                    form.submit();
                }else {
                    var message = document.getElementById("noty");
                    message.style.color = "red";
                    message.innerHTML = "Your record has not been deleted.";
                }
            }
            </script>
    </body>
</html>