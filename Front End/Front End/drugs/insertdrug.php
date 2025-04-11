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
                            <th data-key="company-id">Company</th>
                            <th data-key="drug-name">Drug Name</th>
                            <th data-key="ingredients">Ingredients</th>
                            <th data-key="quantity-pb">Quantity per Box</th>
                            <th data-key="type-id">Type</th>
                            <th data-key="demo-id">Demography</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="Comp_Name_1" id="Comp_Name_1">
                                <div id="suggestion_1" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
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
                                <input type="text" name="Type_1" id="Type_1">
                                <div id="suggestionType_1" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                                <div id="nty1" class="error"></div>
                            </td>
                            <td>
                                <input type="text" name="Demography_1" id="Demography_1">
                                <div id="suggestionDemo_1" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
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
        </div>
        <?php include '../php/footer.php' ?>
        <script>
            let qnt = 1;

            // Function to handle input events for all input fields
            document.querySelector("table tbody").addEventListener("input", function (e) {
                const target = e.target;

                // Handle Company Name input
                if (target.name.startsWith("Comp_Name_")) {
                    const parts = target.name.split("_");
                    if (parts.length < 2) {
                        console.error(`Invalid name attribute: ${target.name}. Expected format: Comp_Name_<rowNumber>`);
                        return;
                    }
                    const rowNumber = parts[2]; // Extract the row number
                    const query = target.value;
                    const suggestionBox = document.getElementById(`suggestion_${rowNumber}`);

                    //console.log(`Looking for suggestion_${rowNumber}:`, suggestionBox); // Debugging log

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
                    } else {
                        console.error(`Suggestion box with ID suggestion_${rowNumber} not found.`);
                    }
                }

                // Handle Type input
                if (target.name.startsWith("Type_")) {
                    const parts = target.name.split("_");
                    if (parts.length < 2) {
                        console.error(`Invalid name attribute: ${target.name}. Expected format: Type_<rowNumber>`);
                        return;
                    }
                    const rowNumber = parts[1]; // Extract the row number
                    const query = target.value;
                    const suggestionBox = document.getElementById(`suggestionType_${rowNumber}`);

                    //console.log(`Looking for suggestionType_${rowNumber}:`, suggestionBox); // Debugging log

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
                    } else {
                        console.error(`Suggestion box with ID suggestionType_${rowNumber} not found.`);
                    }
                }

                // Handle Demography input
                if (target.name.startsWith("Demography_")) {
                    const parts = target.name.split("_");
                    if (parts.length < 2) {
                        console.error(`Invalid name attribute: ${target.name}. Expected format: Demography_<rowNumber>`);
                        return;
                    }
                    const rowNumber = parts[1]; // Extract the row number
                    const query = target.value;
                    const suggestionBox = document.getElementById(`suggestionDemo_${rowNumber}`);

                    //console.log(`Looking for suggestionDemo_${rowNumber}:`, suggestionBox); // Debugging log

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
                    } else {
                        console.error(`Suggestion box with ID suggestionDemo_${rowNumber} not found.`);
                    }
                }
            });

            // Function to create new drug rows
            function create_drugs() {
                qnt += 1;

                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td>
                        <input type="text" name="Comp_Name_${qnt}" id="Comp_Name_${qnt}">
                        <div id="suggestion_${qnt}" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                    </td>
                    <td><input type="text" name="Drug_Name_${qnt}" autocomplete="off"></td>
                    <td><input type="text" name="Ingredients_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="Tablet_PB_${qnt}" autocomplete="off"></td>
                    <td>
                        <input type="text" name="Type_${qnt}" id="Type_${qnt}">
                        <div id="suggestionType_${qnt}" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                    </td>
                    <td>
                        <input type="text" name="Demography_${qnt}" id="Demography_${qnt}">
                        <div id="suggestionDemo_${qnt}" class="suggestion-box" style="display: none; position: absolute; background-color: white;"></div>
                    </td>
                `;
                tbody.appendChild(newRow);

                // Update the hidden input field
                document.getElementById("qnt").value = qnt;
            }

            // Function to delete the last row
            function delete_last_row() {
                const tbody = document.querySelector("table tbody");
                if (tbody.rows.length > 1 && qnt > 1) {
                    tbody.removeChild(tbody.lastElementChild);
                    qnt -= 1;
                    document.getElementById("qnt").value = qnt;
                } else {
                    alert("Cannot delete the last row!");
                }
            }

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