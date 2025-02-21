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
        <div id="over"><h1>Insert into Employee</h1></div>
        <div class="alerts" id="feedback"></div>
        <form name="employee">
            <input type="hidden" name="qnt" id="qnt" value="1">
            <table class="table table-success">
             <thead>
             <tr>
                <th data-key="no">No</th>
                <th>Tazkira</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Job ID</th>
                <th>Salary</th>
                 
             </tr>
             </thead>
             <tbody>
                 <tr id="row_1">
                    <td><p id="no_1">1</p></td>
                     <td><input type="number" name="Tazkira_1" id="Tazkira_1" autocomplete="off"></td>
                     <div id="tazkira_1" class="alerts"></div>
                     <td><input type="text" name="Emp_Name_1" id="Emp_Name_1" autocomplete="off"></td>
                     <td><input type="text" name="Emp_Last_Name_1" id="Emp_Last_Name_1" autocomplete="off"></td>
                     <td><input type="number" name="Job_ID_1" id="Job_ID_1" autocomplete="off"></td>
                     <td><input type="number" name="Salary_1" id="Salary_1" autocomplete="off"></td>
                     <td><div class="delete-btn" id="delete_1" onclick="deleteRow(1)"><img style="width:25px;" src="../images/delete.png" alt="Delete"></div></td>
                 </tr>
         
             <tr>
                 
             </tr>
             </tbody>
            </table>
            <div class="addRemove">
                <button type="button" class="btn btn-add" onclick="create_employee(event)">+</button>

            </div>
            </form>
        </div>

        <div class="insertButtons" >
            <button type="submit" class="btn btn-save" onclick="validate()" >Save</button>
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
                }
            }
            function renumberRows(number){
                for (let i = 1; i <= qnt; i++) {
                    let NewRowNumber = number + i; // This should be inside the loop
                    let rowNum = NewRowNumber - 1; // One less than NewRowNumber

                    const Row = document.getElementById(`row_${NewRowNumber}`);
                    if (Row) Row.id = `row_${rowNum}`;

                    const rowNo = document.getElementById(`no_${NewRowNumber}`);
                    if (rowNo) {
                        rowNo.id = `no_${rowNum}`;
                        rowNo.textContent = rowNum;

                    }

                    const Tazkira = document.getElementById(`Tazkira_${NewRowNumber}`);
                    if (Tazkira) {
                        Tazkira.id = `Tazkira_${rowNum}`;
                        
                    }
                    const Emp_Name = document.getElementById(`Emp_Name_${NewRowNumber}`);
                    if (Emp_Name) {
                        Emp_Name.id = `Emp_Name_${rowNum}`;
                        Tazkira.name = `Emp_Name_${rowNum}`;

                    }

                    const Emp_Last_Name = document.getElementById(`Emp_Last_Name_${NewRowNumber}`);
                    if (Emp_Last_Name) {
                        Emp_Last_Name.id = `Emp_Last_Name_${rowNum}`;
                        Emp_Last_Name.name = `Emp_Last_Name_${rowNum}`;
                    }

                    const Job_ID = document.getElementById(`Job_ID_${NewRowNumber}`);
                    if (Job_ID) {
                        Job_ID.id = `Job_ID_${rowNum}`;
                        Job_ID.name = `Job_ID_${rowNum}`;
                    }

                    
                    const Salary = document.getElementById(`Salary_${NewRowNumber}`);
                    if (Salary) {
                        Salary.id = `Salary_${rowNum}`;
                        Salary.name = `Salary_${rowNum}`;
                    }
                }

            }
            function validate() {
                let valid = true;
                for(let i =1; i<=qnt; i++){
                    let tazkira = document.getElementById(`Tazkira_${qnt}`).value;

                    // Validate Tazkira Number
                    if (!/^\d+$/.test(tazkira) || tazkira === "") {
                        document.getElementById("feedback").innerHTML = "Please enter a valid Tazkira Number.";
                        valid = false;
                    } else {
                        document.getElementById("feedback").innerHTML = "";
                    }
                }

                if (valid) {
                    const form = document.forms['employee'];
                    const formData = new FormData(form);

                    // Send form data using AJAX (fetch)
                    fetch("../php/insertemployee.php", {
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
            }

            function create_employee(event) {
                event.preventDefault(); // Prevent form submission

                qnt += 1;  // Increment the row count

                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.id = `row_${qnt}`;
                newRow.innerHTML = `
                    <td><p id="no_${qnt}">${qnt}</p></td>
                    <td>
                        <input type="number" name="Tazkira_${qnt}" id="Tazkira_${qnt}" autocomplete="off">
                    </td>
                    <td><input type="text" name="Emp_Name_${qnt}" id="Emp_Name_${qnt}" autocomplete="off"></td>
                    <td><input type="text" name="Emp_Last_Name_${qnt}" id="Emp_Last_Name_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="Job_ID_${qnt}" id="Job_ID_${qnt}" autocomplete="off"></td>
                    <td><input type="number" name="Salary_${qnt}" id="Salary_${qnt}" autocomplete="off"></td>
                    <td>
                        <div class="delete-btn" id="delete_${qnt}" onclick="deleteRow(${qnt})">
                            <img style="width:25px;" src="../images/delete.png" alt="Delete">
                        </div>
                    </td>
                `;
                tbody.appendChild(newRow);

                // Update the hidden input field for quantity
                document.getElementById("qnt").value = qnt;
            }



            </script>
    </body>
</html>