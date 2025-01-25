<!DOCTYPE html>
<html lang="en">
    <head>
        <title data-key="drug-insert">
            Insertion Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1 data-key="insert-over">Insert</h1></div>
            <form name="insertdrug">
                <input type="hidden" name="qnt" id="qnt" value="1">
                <table class="table table-warning">
                    <thead>
                        <tr>
                            <th data-key="company-id">Company ID</th>
                            <th data-key="drug-name">Drug Name</th>
                            <th data-key="ingredients">Ingredients</th>
                            <th data-key="quantity-pb">Quantity per Box</th>
                            <th data-key="type-id">Type ID</th>
                            <th data-key="demo-id">Demography ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="number" name="Comp_ID_1" id="c1">
                                <div id="nc1" class="error"></div>
                            </td>
                            <td>
                                <input type="text" name="Drug_Name_1" id="dr1">
                                <div id="ndr1" class="error"></div>
                            </td>
                            <td>
                                <input type="text" name="Ingredients_1" id="i1">
                                <div id="ni1" class="error"></div>
                            </td>
                            <td>
                                <input type="number" name="Tablet_PB_1" id="t1">
                                <div id="nt1" class="error"></div>
                            </td>
                            <td>
                                <input type="number" name="Type_ID_1" id="ty1">
                                <div id="nty1" class="error"></div>
                            </td>
                            <td>
                                <input type="number" name="Demo_ID_1" id="de1">
                                <div id="nde1" class="error"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
               
            </form>
            <div class="insertButtons" >
                <div class="addRemove">
                <button data-key="add-button" class="btn btn-add" onclick="create_drugs(); return false;">+</button>
                <button data-key="remove-button" class="btn btn-remove" onclick="delete_last_row(); return false;">-</button>
                </div>
                <button data-key="save-button" class="btn btn-save" onclick="validate()">Save</button>

            </div>
        
            <script>
                function validate() {
                    // Define a variable to track overall validity
                    let valid = true;

                    // Company ID validation
                    let companyId = document.getElementById("c1").value;
                    if (!/^\d+$/.test(companyId.trim())) {
                        document.getElementById("nc1").innerHTML = "Company ID must contain only numbers.";
                        valid = false;
                    } else {
                        document.getElementById("nc1").innerHTML = "";
                    }

                    // Drug Name validation (letters, spaces, and hyphens allowed)
                    let drugName = document.getElementById("dr1").value;
                    if (!/^[A-Za-z0-9\s\-]+$/.test(drugName.trim())) {
                        document.getElementById("ndr1").innerHTML = "Drug Name can only include letters, numbers, spaces, and hyphens.";
                        valid = false;
                    } else {
                        document.getElementById("ndr1").innerHTML = "";
                    }

                    // Ingredient validation (letters, spaces, and punctuation allowed)
                    let ingredient = document.getElementById("i1").value;
                    if (!/^[A-Za-z0-9\s,\.\-]*$/.test(ingredient.trim())) {
                        document.getElementById("ni1").innerHTML = "Ingredient can include letters, spaces, commas, periods, and hyphens.";
                        valid = false;
                    } else {
                        document.getElementById("ni1").innerHTML = "";
                    }

                    // Tablet per Box validation (numbers only)
                    let tablets = document.getElementById("t1").value;
                    if (!/^\d+$/.test(tablets.trim())) {
                        document.getElementById("nt1").innerHTML = "Tablets per Box must be a number.";
                        valid = false;
                    } else {
                        document.getElementById("nt1").innerHTML = "";
                    }

                    // Type ID validation (numbers only)
                    let typeId = document.getElementById("ty1").value;
                    if (!/^\d+$/.test(typeId.trim())) {
                        document.getElementById("nty1").innerHTML = "Type ID must contain only numbers.";
                        valid = false;
                    } else {
                        document.getElementById("nty1").innerHTML = "";
                    }

                    // Demography ID validation (numbers only)
                    let demoId = document.getElementById("de1").value;
                    if (!/^\d+$/.test(demoId.trim())) {
                        document.getElementById("nde1").innerHTML = "Demography ID must contain only numbers.";
                        valid = false;
                    } else {
                        document.getElementById("nde1").innerHTML = "";
                    }

                    // Final success or error message
                    let message = document.getElementById("noty");
                    if (valid) {
                        const form = document.forms["insertdrug"];
                        form.action = "../php/insertdrug.php";
                        form.method = "post";
                        form.submit();  // Submit the form after successful validation
                        message.style.color = "green";
                        message.innerHTML = "Your record has been saved.";
                    } else {
                        message.style.color = "red";
                        message.innerHTML = "Please correct the errors above.";
                        return false; // Prevent form submission if validation fails
                    }
                }
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

                function create_drugs() {
                    qnt += 1;

                    const tbody = document.querySelector("table tbody");
                    const newRow = document.createElement("tr");
                    newRow.innerHTML = `
                        <td><input type="number" name="Comp_ID_${qnt}" autocomplete="off"></td>
                        <td><input type="text" name="Drug_Name_${qnt}" autocomplete="off"></td>
                        <td><input type="text" name="Ingredients_${qnt}" autocomplete="off"></td>
                        <td><input type="number" name="Tablet_PB_${qnt}" autocomplete="off"></td>
                        <td><input type="number" name="Type_ID_${qnt}" autocomplete="off"></td>
                        <td><input type="number" name="Demo_ID_${qnt}" autocomplete="off"></td>
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
                function remove(){
                    var message = document.getElementById("noty");
                    message.style.color = "red";
                    message.innerHTML = "The selected record is deleted."
                }
            </script>
        </div>
        
        <?php include '../php/footer.php' ?>
    </body>
</html>