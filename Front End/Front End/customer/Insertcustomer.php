<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Insertion Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php'?>
        <div id="over"><h1>Insert into Customer</h1></div>
        <form name="customer">
            <input type="hidden" name="qnt" id="qnt" value="1">
            <table class="table table-success">
                <thead>
                <tr>
                   <th>Customer Shop</th>
                   <th>Customer Name</th>
                   <th>Address</th>
                   <th>Phone</th>
                   <th>Useful Info</th>
                    
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="customer_shop_1" id="customer_shop" autocomplete="off"></td>
                        <td><input type="text" name="customer_name_1" id="customer_name" autocomplete="off"></td>
                        <td><input type="text" name="address_1" id="address" autocomplete="off"></td>
                        <td><input type="text" name="phone_1" id="phone" autocomplete="off"></td>
                        <td><input type="longtext" name="useful_info_1" id="useful_info" autocomplete="off"></td>
                    </tr>
            
                    <tr>
                        <div id="note"></div>
                        <div id="noty"></div>
                    </tr>
                </tbody>
               </table>
               </form>
            </div>



        </div>
        <div class="insertButtons" >
            <div class="addRemove">
            <button class="btn btn-add" onclick="create_customer()" >+</button>
            <button class="btn btn-remove" onclick="delete_last_row()" >-</button>
            </div>
            <button class="btn btn-save" onclick="validate()" >Save</button>

        </div>
            <?php include'../php/footer.php'    ?>
        <script>
            let qnt = 1;
            function create_customer() {
                qnt += 1;  // Increment the quantity to update the row number

                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                        <td><input type="text" name="customer_shop_${qnt}" id="customer_shop" autocomplete="off"></td>
                        <td><input type="text" name="customer_name_${qnt}" id="customer_name" autocomplete="off"></td>
                        <td><input type="text" name="address_${qnt}" id="address" autocomplete="off"></td>
                        <td><input type="text" name="phone_${qnt}" id="phone" autocomplete="off"></td>
                        <td><input type="longtext" name="useful_info_${qnt}" id="useful_info" autocomplete="off"></td>
                `;
                tbody.appendChild(newRow);

                // Update the hidden input field for quantity
                document.getElementById("qnt").value = qnt;
            }

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
            function validate(){
                let valid = true;
        
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
                    form.action="../php/insertcustomer.php";
                    form.method="post";
                    form.submit();
                }else {
                    var message = document.getElementById("noty");
                    message.style.color = "red";
                    message.innerHTML = "Your record has not been updated.";
                }

        
            }
        </script>
    </body>
</html>