<!DOCTYPE html>
<html lang="en">
    <head>
        <title data-key="drug-update">
            Update Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1 data-key="update-over">Update</h1></div>
        
            <form name="updatedrug">
                <table class="table table-warning">
                    <thead>
                        <tr>
                            <th data-key="drug-id">Drug ID</th>
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
                                <input type="number" name="Drug_ID" id="d1">
                                <div id="nd1" class="error"></div>
                            </td>
                            <td>
                                <input type="number" name="Comp_ID" id="c1">
                                <div id="nc1" class="error"></div>
                            </td>
                            <td>
                                <input type="text" name="Drug_Name" id="dr1">
                                <div id="ndr1" class="error"></div>
                            </td>
                            <td>
                                <input type="text" name="Ingredients" id="i1">
                                <div id="ni1" class="error"></div>
                            </td>
                            <td>
                                <input type="number" name="Tablet_PB" id="t1">
                                <div id="nt1" class="error"></div>
                            </td>
                            <td>
                                <input type="number" name="Type_ID" id="ty1">
                                <div id="nty1" class="error"></div>
                            </td>
                            <td>
                                <input type="number" name="Demo_ID" id="de1">
                                <div id="nde1" class="error"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </form>
            <button data-key="save-button" class="btn btn-update" onclick="validate()">Update</button>
            <button data-key="delete-button" class="btn btn-delete" onclick="remove()">Delete</button>
        
            <script>
            
            window.onload = function () {
                const urlParams = new URLSearchParams(window.location.search);
        
                // Populate input fields with values from URL parameters
                document.getElementById('d1').value = urlParams.get('Drug_ID') || '';
                document.getElementById('c1').value = urlParams.get('Comp_ID') || '';
                document.getElementById('dr1').value = urlParams.get('Drug_Name') || '';
                document.getElementById('i1').value = urlParams.get('Ingredients') || '';
                document.getElementById('t1').value = urlParams.get('Tablet_PB') || '';
                document.getElementById('ty1').value = urlParams.get('Type_ID') || '';
                document.getElementById('de1').value = urlParams.get('Demo_ID') || '';

            };
            function validate() {
                // Define a variable to track overall validity
                let valid = true;

                // Drug ID validation
                let drugId = document.getElementById("d1").value;
                if (!/^\d+$/.test(drugId.trim())) {
                    document.getElementById("nd1").innerHTML = "Drug ID must contain only numbers.";
                    valid = false;
                } else {
                    document.getElementById("nd1").innerHTML = "";
                }

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
                if (!/^[A-Za-z\s,\.\-]*$/.test(ingredient.trim())) {
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
                    const form = document.forms["updatedrug"];
                    form.action = "../php/updatedrug.php";
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
           
                function remove(){
                    const form1 = document.forms["updatedrug"];
                    form1.action = "../php/deletedrug.php";
                    form1.method = "post";
                    form1.submit();
                }
            </script>
        </div>
        
        <?php include '../php/footer.php' ?>
    </body>
</html>