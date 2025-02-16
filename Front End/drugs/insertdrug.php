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
                            <th data-key="no">No</th>
                            <th data-key="company-id">Company</th>
                            <th data-key="drug-name">Drug Name</th>
                            <th data-key="ingredients">Ingredients</th>
                            <th data-key="quantity-pb">Quantity per Box</th>
                            <th data-key="type-id">Type</th>
                            <th data-key="demo-id">Demography</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="row_1">
                            <td><p id="no_1">1</p></td>
                            <td>
                                <input type="text" name="Comp_Name_1" id="Comp_Name_1">
                                <div id="suggestion_1" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                                <div id="nc1" class="error"></div>
                            </td>
                            <td>
                                <input type="text" name="Drug_Name_1" id="Drug_Name_1">
                                <div id="ndr1" class="error"></div>
                            </td>
                            <td>
                                <input type="text" name="Ingredients_1" id="Ingredients_1">
                                <div id="ni1" class="error"></div>
                            </td>
                            <td>
                                <input type="number" name="Tablet_PB_1" id="Tablet_PB_1">
                                <div id="nt1" class="error"></div>
                            </td>
                            <td>
                                <input type="text" name="Type_1" id="Type_1">
                                <div id="suggestionType_1" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                                <div id="nty1" class="error"></div>
                            </td>
                            <td>
                                <input type="text" name="Demography_1" id="Demography_1">
                                <div id="suggestionDemo_1" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                                <div id="nde1" class="error"></div>
                            </td>
                            <td>
                                <div class="delete-btn" id="delete_1" onclick="deleteRow(1)">
                                    <img style="width:25px;" src="../images/delete.png" alt="Delete">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="addRemove">
                    <button data-key="add-button" class="btn btn-add" type="button" onclick="create_drugs()">+</button>
                </div>
                <div class="insertButtons" >
                    <button data-key="save-button" class="btn btn-save" onclick="validate()">Save</button>
                </div>
               
            </form>
        </div>
        <?php include '../php/footer.php' ?>
        <script>
            let qnt = 1;
            function deleteRow(rowNumber) {
                const row = document.getElementById(`row_${rowNumber}`);
                if (row) {
                    row.remove();
                    qnt--;
                    document.getElementById("qnt").value = qnt;
                    renumberRows(rowNumber);
                    addEventForClickOutSide();
                }
            }
            function renumberRows(number) {
                for (let i = 1; i <= qnt; i++) {
                    let NewRowNumber = number + i; // This should be inside the loop
                    let rowNum = NewRowNumber - 1;

                    // Update the row ID
                    const row = document.getElementById(`row_${NewRowNumber}`);
                    if (row) row.id = `row_${rowNum}`;

                    // Update the row number text
                    const rowNo = document.getElementById(`no_${NewRowNumber}`);
                    if (rowNo) {
                        rowNo.id = `no_${rowNum}`;
                        rowNo.textContent = rowNum;
                    }

                    // Update Company Name input and suggestion box
                    const compInput = document.getElementById(`Comp_Name_${NewRowNumber}`);
                    if (compInput) {
                        compInput.id = `Comp_Name_${rowNum}`;
                        compInput.name = `Comp_Name_${rowNum}`;
                    }
                    const compSuggestion = document.getElementById(`suggestion_${NewRowNumber}`);
                    if (compSuggestion) {
                        compSuggestion.id = `suggestion_${rowNum}`;
                    }

                    // Update Drug Name input and error div
                    const drugInput = document.getElementById(`Drug_Name_${NewRowNumber}`);
                    if (drugInput) {
                        drugInput.id = `Drug_Name_${rowNum}`;
                        drugInput.name = `Drug_Name_${rowNum}`;
                    }
                    const drugError = document.getElementById(`ndr${NewRowNumber}`);
                    if (drugError) {
                        drugError.id = `ndr${rowNum}`;
                    }

                    // Update Ingredients input and error div
                    const ingredientsInput = document.getElementById(`Ingredients_${NewRowNumber}`);
                    if (ingredientsInput) {
                        ingredientsInput.id = `Ingredients_${rowNum}`;
                        ingredientsInput.name = `Ingredients_${rowNum}`;
                    }
                    const ingredientsError = document.getElementById(`ni${NewRowNumber}`);
                    if (ingredientsError) {
                        ingredientsError.id = `ni${rowNum}`;
                    }

                    // Update Quantity per Box input and error div
                    const quantityInput = document.getElementById(`Tablet_PB_${NewRowNumber}`);
                    if (quantityInput) {
                        quantityInput.id = `Tablet_PB_${rowNum}`;
                        quantityInput.name = `Tablet_PB_${rowNum}`;
                    }
                    const quantityError = document.getElementById(`nt${NewRowNumber}`);
                    if (quantityError) {
                        quantityError.id = `nt${rowNum}`;
                    }

                    // Update Type input, suggestion box, and error div
                    const typeInput = document.getElementById(`Type_${NewRowNumber}`);
                    if (typeInput) {
                        typeInput.id = `Type_${rowNum}`;
                        typeInput.name = `Type_${rowNum}`;
                    }
                    const typeSuggestion = document.getElementById(`suggestionType_${NewRowNumber}`);
                    if (typeSuggestion) {
                        typeSuggestion.id = `suggestionType_${rowNum}`;
                    }
                    const typeError = document.getElementById(`nty${NewRowNumber}`);
                    if (typeError) {
                        typeError.id = `nty${rowNum}`;
                    }

                    // Update Demography input, suggestion box, and error div
                    const demoInput = document.getElementById(`Demography_${NewRowNumber}`);
                    if (demoInput) {
                        demoInput.id = `Demography_${rowNum}`;
                        demoInput.name = `Demography_${rowNum}`;
                    }
                    const demoSuggestion = document.getElementById(`suggestionDemo_${NewRowNumber}`);
                    if (demoSuggestion) {
                        demoSuggestion.id = `suggestionDemo_${rowNum}`;
                    }
                    const demoError = document.getElementById(`nde${NewRowNumber}`);
                    if (demoError) {
                        demoError.id = `nde${rowNum}`;
                    }

                    // Update Delete button
                    const deleteButton = document.getElementById(`delete_${NewRowNumber}`);
                    if (deleteButton) {
                        deleteButton.id = `delete_${rowNum}`;
                        deleteButton.onclick = function () {
                            deleteRow(rowNum);
                        };
                    }
                }
            }

            function create_drugs() {
                qnt += 1;

                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.id = `row_${qnt}`;
                newRow.innerHTML = `
                    <td><p id="no_${qnt}">${qnt}</p></td>
                    <td>
                        <input type="text" name="Comp_Name_${qnt}" id="Comp_Name_${qnt}" autocomplete="off">
                        <div id="suggestion_${qnt}" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                        <div id="nc${qnt}" class="error"></div>
                    </td>
                    <td>
                        <input type="text" name="Drug_Name_${qnt}" id="Drug_Name_${qnt}" autocomplete="off">
                        <div id="ndr${qnt}" class="error"></div>
                    </td>
                    <td>
                        <input type="text" name="Ingredients_${qnt}" id="Ingredients_${qnt}" autocomplete="off">
                        <div id="ni${qnt}" class="error"></div>
                    </td>
                    <td>
                        <input type="number" name="Tablet_PB_${qnt}" id="Tablet_PB_${qnt}" autocomplete="off">
                        <div id="nt${qnt}" class="error"></div>
                    </td>
                    <td>
                        <input type="text" name="Type_${qnt}" id="Type_${qnt}" autocomplete="off">
                        <div id="suggestionType_${qnt}" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                        <div id="nty${qnt}" class="error"></div>
                    </td>
                    <td>
                        <input type="text" name="Demography_${qnt}" id="Demography_${qnt}" autocomplete="off">
                        <div id="suggestionDemo_${qnt}" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                        <div id="nde${qnt}" class="error"></div>
                    </td>
                    <td>
                        <div class="delete-btn" id="delete_${qnt}" onclick="deleteRow(${qnt})">
                            <img style="width:25px;" src="../images/delete.png" alt="Delete">
                        </div>
                    </td>
                `;
                tbody.appendChild(newRow);

                // Update the hidden input field
                document.getElementById("qnt").value = qnt;

                // Add event listeners to the new inputs
                const newInputs = newRow.querySelectorAll("input");
                newInputs.forEach(input => {
                    input.addEventListener("input", handleInputEvent);
                });
            }
            // Hide the suggestion box when clicking outside
            function addEventForClickOutSide() {
                for(let i=1; i<=qnt; i++){
                    document.addEventListener("click", function (e) {
                        const suggestionBox = document.getElementById(`suggestion_${i}`);
                        if (!e.target.closest(`#Comp_Name_${i}`) && !e.target.closest(`suggestion_${i}`)) {
                            suggestionBox.style.display = "none";
                        }
                    });
                }
            }

            // Function to handle input events for all input fields
            function handleInputEvent(e) {
                const target = e.target;

                // Handle Company Name input
                if (target.name.startsWith("Comp_Name_")) {
                    const parts = target.name.split("_");
                    const rowNumber = parts[2];
                    const query = target.value;
                    const suggestionBox = document.getElementById(`suggestion_${rowNumber}`);

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
                                                document.getElementById(`Comp_Name_${rowNumber}`).value = comp.Comp_Name;
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
                if (target.name.startsWith("Type_")) {
                    const parts = target.name.split("_");
                    const rowNumber = parts[1];
                    const query = target.value;
                    const suggestionBox = document.getElementById(`suggestionType_${rowNumber}`);

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
                                                document.getElementById(`Type_${rowNumber}`).value = type.Type_Name;
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
                if (target.name.startsWith("Demography_")) {
                    const parts = target.name.split("_");
                    const rowNumber = parts[1];
                    const query = target.value;
                    const suggestionBox = document.getElementById(`suggestionDemo_${rowNumber}`);

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
                                                document.getElementById(`Demography_${rowNumber}`).value = demo.demo_name;
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

            // Add event listener to the table for input events
            document.querySelector("table tbody").addEventListener("input", handleInputEvent);

            // Function to validate the form
            function validate() {
                let valid = true;

                // Validation logic here...

                if (valid) {
                    const form = document.forms["insertdrug"];
                    form.action = "../php/insertdrug.php";
                    form.method = "post";
                    form.submit();
                } else {
                    alert("Please correct the errors above.");
                }
            }
        </script>
    </body>
</html>