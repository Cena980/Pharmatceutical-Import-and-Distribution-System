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
                <th>Drug Name</th>
                <th>Expiration</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Initial Amount</th>
                 
             </tr>
             </thead>
             <tbody>
                 <tr>
                     <td>
                        <input type="text" name="drug_name_1" id="drug_name_1" autocomplete="off">
                        <div class="suggestion-box" id="suggestion_1" style="display: none; position: absolute; background: white;"></div>
                    </td>
                     <td><input type="month" name="Expiration_1" id="eid" autocomplete="off"></td>
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
            // Function to add event listeners for drug name input
            document.querySelector("table tbody").addEventListener("input", function (e) {
                if (e.target.name.startsWith("drug_name_")) {
                    const rowNumber = e.target.name.split("_")[2]; // Extract the row number
                    const query = e.target.value;
                    const suggestionBox = document.getElementById(`suggestion_${rowNumber}`);

                    if (query.length > 1) {
                        fetch(`../php/get_drug_suggestions1.php?query=${encodeURIComponent(query)}`)
                            .then(response => response.json())
                            .then(data => {
                                suggestionBox.innerHTML = "";
                                suggestionBox.style.display = "block";

                                if (data.error) {
                                    suggestionBox.style.display = "none";
                                } else {
                                    const table = document.createElement("table");
                                    table.style.borderCollapse = "collapse";
                                    table.style.width = "100%";
                                    const header = document.createElement("tr");
                                    header.innerHTML = `
                                        <th style="border: 1px solid #ccc; padding: 8px;">Drug Name</th>
                                    `;
                                    table.appendChild(header);
                                    data.forEach(drug => {
                                        const row = document.createElement("tr");
                                        row.innerHTML = `
                                            <td style="border: 1px solid #ccc; padding: 8px;">${drug.Drug_Name}</td>
                                        `;
                                        row.style.cursor = "pointer";
                                        row.onclick = () => {
                                            document.getElementById(`drug_name_${rowNumber}`).value = drug.Drug_Name;
                                            suggestionBox.style.display = "none";
                                        };
                                        table.appendChild(row);
                                    });
                                    suggestionBox.appendChild(table);
                                }
                            })
                            .catch(error => {
                                console.error("Error fetching drug suggestions:", error);
                            });
                    } else {
                        suggestionBox.style.display = "none";
                    }
                }
            });
            for (let i = 1; i <= qnt; i++) {
                const inputField = document.getElementById(`drug_name_${i}`);

                inputField.addEventListener("input", function () {
                    const suggestionBox = document.getElementById(`suggestion_${i}`);

                    // Hide the suggestion box when the user starts typing in a new field
                    suggestionBox.style.display = "none";

                    // Get the position and size of the current input field
                    const rect = inputField.getBoundingClientRect();

                    // Set the suggestion box's position relative to the current input field
                    suggestionBox.style.top = rect.bottom + window.scrollY + "px"; // Account for vertical scroll
                    suggestionBox.style.left = rect.left + window.scrollX + "px";  // Account for horizontal scroll
                    suggestionBox.style.width = rect.width + "px"; // Match the input width

                    // Show the suggestion box at the new position
                    suggestionBox.style.display = "block";
                });
            };

            function create_inventory() {
                qnt += 1;  // Increment the quantity to update the row number

                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td>
                        <input type="text" name="drug_name_${qnt}" id="drug_name_${qnt}" autocomplete="off">
                        <div id="suggestion_${qnt}" class ='suggestion-box' style="display: none; position: absolute; background-color: white;"></div>
                    </td>
                     <td><input type="month" name="Expiration_${qnt}" id="eid" autocomplete="off"></td>
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