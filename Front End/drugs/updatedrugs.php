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
        <div class="alerts" id="feedback"></div>
        
            <form name="updatedrug">
                <table class="table table-warning">
                    <thead>
                        <tr>
                            <th data-key="drug-id">Drug ID</th>
                            <th data-key="company">Company ID</th>
                            <th data-key="drug-name">Drug Name</th>
                            <th data-key="ingredients">Ingredients</th>
                            <th data-key="quantity-pb">Quantity per Box</th>
                            <th data-key="type">Type ID</th>
                            <th data-key="demo">Demography ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="number" name="Drug_ID" id="d1">
                                <div id="nd1" class="error"></div>
                            </td>
                            <td>
                                <input type="text" name="Comp_Name" id="c1">
                                <div id="suggestion_1" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
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
                                <input type="text" name="Type" id="ty1">
                                <div id="suggestionType_1" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                                <div id="nty1" class="error"></div>
                            </td>
                            <td>
                                <input type="text" name="Demo" id="de1">
                                <div id="suggestionDemo_1" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                                <div id="nde1" class="error"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </form>
            <div class="multi-button">
                <button data-key="save-button" class="btn btn-update" onclick="validate()">Update</button>
                <button data-key="delete-button" class="btn btn-delete" onclick="remove()">Delete</button>
                </div>
        
            <script>
            
            window.onload = function () {
                const urlParams = new URLSearchParams(window.location.search);
        
                // Populate input fields with values from URL parameters
                document.getElementById('d1').value = urlParams.get('Drug_ID') || '';
                document.getElementById('c1').value = urlParams.get('Comp') || '';
                document.getElementById('dr1').value = urlParams.get('Drug_Name') || '';
                document.getElementById('i1').value = urlParams.get('Ingredient') || '';
                document.getElementById('t1').value = urlParams.get('Tablet_PB') || '';
                document.getElementById('ty1').value = urlParams.get('Type') || '';
                document.getElementById('de1').value = urlParams.get('Demo') || '';


                document.getElementById('c1').addEventListener('input', handleInputEvent);
                document.getElementById('ty1').addEventListener('input', handleInputEvent);
                document.getElementById('de1').addEventListener('input', handleInputEvent);

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

                // Drug Name validation (letters, spaces, and hyphens allowed)
                let drugName = document.getElementById("dr1").value;
                if (!/^[A-Za-z0-9\s\-]+$/.test(drugName.trim())) {
                    document.getElementById("ndr1").innerHTML = "Drug Name can only include letters, numbers, spaces, and hyphens.";
                    valid = false;
                } else {
                    document.getElementById("ndr1").innerHTML = "";
                }

                // Ingredient validation (letters, spaces,numers, and punctuation allowed)
                let ingredient = document.getElementById("i1").value;
                if (!/^[A-Za-z0-9\s,\.\-]*$/.test(ingredient.trim())) {
                    document.getElementById("ni1").innerHTML = "Ingredient can include numbers, letters, spaces, commas, periods, and hyphens.";
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

                // Final success or error message
                let message = document.getElementById("noty");
                if (valid) {
                    const form = document.forms['updatedrug'];
                    const formData = new FormData(form);

                    // Send form data using AJAX (fetch)
                    fetch("../php/updatedrug.php", {
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
                    message.style.color = "red";
                    message.innerHTML = "Please correct the errors above.";
                    return false; // Prevent form submission if validation fails
                }
            }
           
                function remove(){
                    const form = document.forms["updatedrug"];
                    const formData = new FormData(form);

                    // Send form data using AJAX (fetch)
                    fetch("../php/deletedrug.php", {
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
                function handleInputEvent(e) {
                const target = e.target;

                // Handle Company Name input
                if (target.name.startsWith("Comp")) {
                    const query = target.value;
                    const suggestionBox = document.getElementById(`suggestion_1`);

                    if (suggestionBox) {
                        if (query.length > 1) {
                            fetch(`../php/get_company_suggestions.php?query=${encodeURIComponent(query)}`)
                                .then(response => response.json())
                                .then(data => {
                                    suggestionBox.innerHTML = "";
                                    suggestionBox.style.display = "block";

                                    if (!data.error) {
                                        const table = document.createElement("table");
                                        table.style.borderCollapse = "collapse";
                                        table.style.width = "100%";
                                        const header = document.createElement("tr");
                                        header.innerHTML = `
                                            <th style="border: 1px solid #ccc; padding: 8px;">Company Name</th>
                                        `;
                                        table.appendChild(header);
                                        data.forEach(comp => {
                                            const row = document.createElement("tr");
                                            row.innerHTML = `
                                                <td style="border: 1px solid #ccc; padding: 8px;">${comp.Comp_Name}</td>
                                            `;
                                            row.style.cursor = "pointer";
                                            row.onclick = () => {
                                                document.getElementById(`c1`).value = comp.Comp_Name;
                                                suggestionBox.style.display = "none";
                                            };
                                            table.appendChild(row);
                                        });
                                        suggestionBox.appendChild(table);
                                    }
                                })
                                .catch(error => {
                                    console.error("Error fetching company suggestions:", error);
                                });
                        } else {
                            suggestionBox.style.display = "none";
                        }
                    }
                }

                // Handle Type input
                if (target.name.startsWith("Type")) {
                    const query = target.value;
                    const suggestionBox = document.getElementById(`suggestionType_1`);

                    if (suggestionBox) {
                        if (query.length > 1) {
                            fetch(`../php/get_type_suggestions.php?query=${encodeURIComponent(query)}`)
                                .then(response => response.json())
                                .then(data => {
                                    suggestionBox.innerHTML = "";
                                    suggestionBox.style.display = "block";

                                    if (!data.error) {
                                        const table = document.createElement("table");
                                        table.style.borderCollapse = "collapse";
                                        table.style.width = "100%";
                                        const header = document.createElement("tr");
                                        header.innerHTML = `
                                            <th style="border: 1px solid #ccc; padding: 8px;">Type</th>
                                        `;
                                        table.appendChild(header);
                                        data.forEach(type => {
                                            const row = document.createElement("tr");
                                            row.innerHTML = `
                                                <td style="border: 1px solid #ccc; padding: 8px;">${type.Type_Name}</td>
                                            `;
                                            row.style.cursor = "pointer";
                                            row.onclick = () => {
                                                document.getElementById(`ty1`).value = type.Type_Name;
                                                suggestionBox.style.display = "none";
                                            };
                                            table.appendChild(row);
                                        });
                                        suggestionBox.appendChild(table);
                                    }
                                })
                                .catch(error => {
                                    console.error("Error fetching type suggestions:", error);
                                });
                        } else {
                            suggestionBox.style.display = "none";
                        }
                    }
                }

                // Handle Demography input
                if (target.name.startsWith("Demo")) {
                    const query = target.value;
                    const suggestionBox = document.getElementById(`suggestionDemo_1`);

                    if (suggestionBox) {
                        if (query.length > 1) {
                            fetch(`../php/get_demo_suggestions.php?query=${encodeURIComponent(query)}`)
                                .then(response => response.json())
                                .then(data => {
                                    suggestionBox.innerHTML = "";
                                    suggestionBox.style.display = "block";

                                    if (!data.error) {
                                        const table = document.createElement("table");
                                        table.style.borderCollapse = "collapse";
                                        table.style.width = "100%";
                                        const header = document.createElement("tr");
                                        header.innerHTML = `
                                            <th style="border: 1px solid #ccc; padding: 8px;">Demography</th>
                                        `;
                                        table.appendChild(header);
                                        data.forEach(demo => {
                                            const row = document.createElement("tr");
                                            row.innerHTML = `
                                                <td style="border: 1px solid #ccc; padding: 8px;">${demo.demo_name}</td>
                                            `;
                                            row.style.cursor = "pointer";
                                            row.onclick = () => {
                                                document.getElementById(`de1`).value = demo.demo_name;
                                                suggestionBox.style.display = "none";
                                            };
                                            table.appendChild(row);
                                        });
                                        suggestionBox.appendChild(table);
                                    }
                                })
                                .catch(error => {
                                    console.error("Error fetching demography suggestions:", error);
                                });
                        } else {
                            suggestionBox.style.display = "none";
                        }
                    }
                }
            }
            </script>
        </div>
        
        <?php include '../php/footer.php' ?>
    </body>
</html>