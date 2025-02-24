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
        <div id="over"><h1>Update inventory</h1></div>
        <div class="alerts" id="feedback"></div>
        <form name="inventory" action="../php/updateinventory.php" method="post">
            <table class="table table-success">
             <thead>
             <tr>
                <th>Inventory ID</th>
                <th>Drug ID</th>
                <th>Expiration</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Initial Amount</th>
                <th>Amount Left</th>
                 
             </tr>
             </thead>
             <tbody>
                <tr>
                    <td><input type="number" name="Inventory_ID" id="iid" autocomplete="off"></td>
                    <td><input type="number" name="Drug_ID" id="did" autocomplete="off"></td>
                    <div id="ndid"></div>
                    <td><input type="month" name="Expiration" id="eid" autocomplete="off"></td>
                    <td><input type="number" name="Cost" id="cost" autocomplete="off"></td>
                    <td><input type="number" name="Price" id="price" autocomplete="off"></td>
                    <td><input type="number" name="Initial_Amount" id="IA" autocomplete="off"></td>
                    <td><input type="number" name="Amount_Left" id="AL" autocomplete="off"></td>
                </tr>
             <tr>
                 <td id="noty" class="table"></td>
             </tr>
             </tbody>
            </table>
            </form>
        </div>
            <div class="multi-button">
            <button class="btn btn-update" onclick="validate()" >Update</button>
            <button class="btn btn-delete" onclick="deleteinventory()" >Delete</button>
            </div>
            <?php include '../php/footer.php' ?>
        <script>
            window.onload = function () {
                const urlParams = new URLSearchParams(window.location.search);
        
                // Populate input fields with values from URL parameters
                document.getElementById('iid').value = urlParams.get('Inventory_ID') || '';
                document.getElementById('did').value = urlParams.get('Drug_ID') || '';
                document.getElementById('eid').value = urlParams.get('Expiration') || '';
                document.getElementById('cost').value = urlParams.get('Cost') || '';
                document.getElementById('price').value = urlParams.get('Price') || '';
                document.getElementById('IA').value = urlParams.get('Initial_Amount') || '';
                document.getElementById('AL').value = urlParams.get('Amount_Left') || '';
            };
            function validate(){
            
                let valid = true;
        
                let drug = document.getElementById("did").value;
        
                if (!/^\d+$/.test(drug)) {
                    document.getElementById("ndid").innerHTML = "Please enter a valid Drug ID.";
                    valid = false;
                } else {
                    document.getElementById("ndid").innerHTML = "";
                }

                
                const form = document.forms["inventory"];
                if (valid) {
                    const formData = new FormData(form);

                    // Send form data using AJAX (fetch)
                    fetch("../php/updateinventory.php", {
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
                    form.action = "";
                    message.style.color = "red";
                    message.innerHTML = "Validation failed. Please correct the errors.";
                }

                return valid;
            }
            function deleteinventory(){
                const form = document.forms["inventory"];
                    const formData = new FormData(form);

                    // Send form data using AJAX (fetch)
                    fetch("../php/deleteinventory.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.text()) // Use .json() if PHP returns JSON
                    .then(data => {
                        document.getElementById("feedback").innerHTML = data; // Display response in a div
                        alert(data); // Optional alert for user feedback
                    })
                    .catch(error => console.error("Error:", error));
            }
            </script>
    </body>
</html>