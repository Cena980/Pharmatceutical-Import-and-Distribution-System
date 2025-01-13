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
                    <form name="search">
                        <input type="text" placeholder="Search for Drugs" id="search" name="query" id="search" required>
                    </form>
                    <button type="submit" onclick="search()" >Search</button>
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
                 <th>Inventory ID</th>
                 
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
                     <td><input type="number" name="Inventory_ID_1" id="did" autocomplete="off"></td>
                     <td><input type="number" name="Quantity_1" id="qy" autocomplete="off"></td>
                     <td><input type="number" name="Discount_1" id="dt" autocomplete="off"></td>
                     <td><input type="number" name="Price_1" id="pr" autocomplete="off"></td>
                     <td><input type="number" name="Total_1" id="tl" autocomplete="off"></td>
                     <td><input type="text" name="Note" id="Note" autocomplete="off"></td>
                     <td><input type="date" name="Date_1" id="de" autocomplete="off"></td>
                     <td><input type="number" name="Amount_Received_1" id="AR" autocomplete="off"></td>
                     <td><input type="number" name="Cut_ID_1" id="ci" autocomplete="off"></td>
                     <td><input type="number" name="Location_ID_1" id="lid" autocomplete="off"></td>
                     
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
            <button class="btn btn-success" onclick="validate()" >Save</button>
            <button class="btn btn-success" onclick="create_sale(); return false;">--+--</button>
            <button class="btn btn-danger" onclick="delete_last_row(); return false;">__-__</button>
        
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
            function search() {
                a =document.getElementById('search');
                if (a.value.length<1){
                    alert("Cannot search for empty string")
                }else{
                    const search = document.forms["search"];
                    search.action = "../php/search.php";
                    search.method = "post";
                    const popup = window.open("", "SearchResults", "width=600,height=400");
                    search.target = "SearchResults"; // Send the form to the popup window
                    search.submit();
                }
            }

            let qnt = 1;

                function create_sale() {
                    qnt += 1;

                    const tbody = document.querySelector("table tbody");
                    const newRow = document.createElement("tr");
                    newRow.innerHTML = `
                        <td><input type="number" name="Inventory_ID_${qnt}" autocomplete="off"></td>
                        <td><input type="number" name="Quantity_${qnt}" autocomplete="off"></td>
                        <td><input type="number" name="Discount_${qnt}" autocomplete="off"></td>
                        <td><input type="number" name="Price_${qnt}" autocomplete="off"></td>
                        <td><input type="number" name="Total_${qnt}" autocomplete="off"></td>
                        <td><input type="text" name="Note_${qnt}" id="Note" autocomplete="off"></td>
                    `;
                    tbody.appendChild(newRow);

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
                }



                function validate() {
                    // Reference the notification message element
                    var message = document.getElementById("noty");
                    message.style.color = "green";
                    message.innerHTML = "Your record has been saved.";

                    let valid = true;

                    /*// Sale ID validation
                    let sale = document.getElementById("sid").value;
                    if (!/^\d+$/.test(sale) || sale === "") {
                        document.getElementById("nsid").innerHTML = "Please enter a valid Sale ID.";
                        valid = false;
                    } else {
                        document.getElementById("nsid").innerHTML = "";
                    }*/

                    // Drug ID validation
                    let drug = document.getElementById("did").value;
                    if (!/^\d+$/.test(drug) || drug === "") {
                        document.getElementById("ndid").innerHTML = "Please enter a valid Drug ID.";
                        valid = false;
                    } else {
                        document.getElementById("ndid").innerHTML = "";
                    }

                    // Dynamically update form action if valid
                    const form = document.forms["sale"]; // Get the form by name
                    if (valid) {
                        form.action = "../php/insertsales.php"; // Set action to the desired PHP script
                        form.method = "post"; // Ensure the method is correct
                        form.submit();
                    } else {
                        // Reset action to prevent unintended submission
                        form.action = "";
                        message.style.color = "red";
                        message.innerHTML = "Validation failed. Please correct the errors.";
                    }

                    return valid; // Prevent form submission if invalid
                }

            </script>
    </body>
</html>