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
        <div id="over"><h1>Insert into inventory</h1></div>
        <form name="inventory">
            <input type="hidden" name="qnt" id="qnt" value="1">
            <table class="table table-success">
             <thead>
             <tr>
                <th>Drug ID</th>
                <th>Expiration</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Initial Amount</th>
                 
             </tr>
             </thead>
             <tbody>
                 <tr>
                     <td><input type="number" name="Drug_ID_1" id="did" autocomplete="off"></td>
                     <td><input type="date" name="Expiration_1" id="eid" autocomplete="off"></td>
                     <td><input type="number" name="Cost_1" id="cost" autocomplete="off"></td>
                     <td><input type="number" name="Price_1" id="price" autocomplete="off"></td>
                     <td><input type="number" name="Initial_Amount_1" id="IA" autocomplete="off"></td>
                 </tr>
         
             <tr>
                <div id="ndid"></div>
                 <td id="noty" class="table"></td>
             </tr>
             </tbody>
            </table>
            </form>
        </div>
        <div class="insertButtons" >
            <div class="addRemove">
            <button class="btn btn-add" onclick="create_inventory()" >+</button>
            <button class="btn btn-remove" onclick="delete_last_row()" >-</button>
            </div>
            <button class="btn btn-save" onclick="validate()" >Save</button>
        </div>

        <?php include '../php/footer.php' ?>
        <script>
            let qnt = 1;

            function create_inventory() {
                qnt += 1;  // Increment the quantity to update the row number

                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td><input type="number" name="Drug_ID_${qnt}" id="did" autocomplete="off"></td>
                     <td><input type="date" name="Expiration_${qnt}" id="eid" autocomplete="off"></td>
                     <td><input type="number" name="Cost_${qnt}" id="cost" autocomplete="off"></td>
                     <td><input type="number" name="Price_${qnt}" id="price" autocomplete="off"></td>
                     <td><input type="number" name="Initial_Amount_${qnt}" id="IA" autocomplete="off"></td>
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
                        form.action = "../php/insertinventory.php"; // Set action to the desired PHP script
                        form.method = "post";
                        form.submit();
                    } else {
                        form.action = "";
                        message.style.color = "red";
                        message.innerHTML = "Validation failed. Please correct the errors.";
                    }

                    return valid;
                }
            </script>
    </body>
</html>