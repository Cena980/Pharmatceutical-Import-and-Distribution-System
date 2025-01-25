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
        <form name="employee">
            <input type="hidden" name="qnt" id="qnt" value="1">
            <table class="table table-success">
             <thead>
             <tr>
                <th>Employee ID</th>
                <th>Tazkira</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Job ID</th>
                <th>Salary</th>
                 
             </tr>
             </thead>
             <tbody>
                 <tr>
                     <td><input type="number" name="Emp_ID_1" id="Emp_ID" autocomplete="off"></td>
                     <div id="emp2"></div>
                     <td><input type="number" name="Tazkira_1" id="Tazkira" autocomplete="off"></td>
                     <div id="tazkira2"></div>
                     <td><input type="text" name="Emp_Name_1" id="Emp_Name" autocomplete="off"></td>
                     <td><input type="text" name="Emp_Last_Name_1" id="Emp_Last_Name" autocomplete="off"></td>
                     <td><input type="number" name="Job_ID_1" id="Job_ID" autocomplete="off"></td>
                     <td><input type="number" name="Salary_1" id="Salary" autocomplete="off"></td>
                 </tr>
         
             <tr>
                 
             </tr>
             </tbody>
            </table>
            </form>
        </div>

        <div class="insertButtons" >
            <div class="addRemove">
            <button type="submit" class="btn btn-add" onclick="create_employee()" >+</button>
            <button type="submit" class="btn btn-remove" onclick="delete_last_row()" >-</button>
            </div>
            <button type="submit" class="btn btn-save" onclick="validate()" >Save</button>
        </div>
            <?php include '../php/footer.php' ?>
        <script>
            function validate(){
                let valid = true;
                let emp = document.getElementById("Emp_ID").value;
        
                if(!/^\d+$/.test(emp) || emp === ""){
                        document.getElementById("emp2").innerHTML = "Please enter a valid Employee ID.";
                        valid = false;
                    } else {
        
                        document.getElementById("emp2").innerHTML = "";
        
                    }
        
                let Tazkira = document.getElementById("Tazkira").value;
        
                if(!/^\d+$/.test(Tazkira) || Tazkira === ""){
                        document.getElementById("tazkira2").innerHTML = "Please enter a valid Tazkira Number.";
                        valid = false;
                    } else {
                        document.getElementById("tazkira2").innerHTML = "";
                    }
                if(valid){
                    const form = document.forms['employee'];
                    form.action="../php/insertemployee.php";
                    form.method="post";
                    form.submit();
                }
        
            }

            let qnt = 1;
            function create_employee() {
                qnt += 1;  // Increment the quantity to update the row number

                const tbody = document.querySelector("table tbody");
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                     <td><input type="number" name="Emp_ID_${qnt}" id="Emp_ID" autocomplete="off"></td>
                     <td><input type="number" name="Tazkira_${qnt}" id="Tazkira" autocomplete="off"></td>
                     <td><input type="text" name="Emp_Name_${qnt}" id="Emp_Name" autocomplete="off"></td>
                     <td><input type="text" name="Emp_Last_Name_${qnt}" id="Emp_Last_Name" autocomplete="off"></td>
                     <td><input type="number" name="Job_ID_${qnt}" id="Job_ID" autocomplete="off"></td>
                     <td><input type="number" name="Salary_${qnt}" id="Salary" autocomplete="off"></td>
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

            </script>
    </body>
</html>