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
                 
             </tr>
             </thead>
             <tbody>
                <tr>
                    <td><input type="number" name="Inventory_ID" id="iid" autocomplete="off"></td>
                    <td><input type="number" name="Drug_ID" id="did" autocomplete="off"></td>
                    <div id="ndid"></div>
                    <td><input type="date" name="Expiration" id="eid" autocomplete="off"></td>
                    <td><input type="number" name="Cost" id="cost" autocomplete="off"></td>
                    <td><input type="number" name="Price" id="price" autocomplete="off"></td>
                    <td><input type="number" name="Initial_Amount" id="IA" autocomplete="off"></td>
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
                    var message = document.getElementById("noty");
                    message.style.color = "green";
                    message.innerHTML = "Your record has been saved.";
                    form.action = "../php/updateinventory.php"; // Set action to the desired PHP script
                    form.method = "post";
                    form.submit();
                } else {
                    form.action = "";
                    message.style.color = "red";
                    message.innerHTML = "Validation failed. Please correct the errors.";
                }

                return valid;
            }
            function deleteinventory(){
                const form = document.forms["inventory"];
                form.action = "../php/deleteinventory.php"; // Set action to the desired PHP script
                form.method = "post";
                form.submit();
            }
            </script>
    </body>
</html>