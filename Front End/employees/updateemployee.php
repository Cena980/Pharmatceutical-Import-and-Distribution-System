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
        <div id="over"><h1>Update Employee</h1></div>
        <div class="alerts" id="feedback"></div>
        <form name="employee" >
            <table class="table table-success">
             <thead>
             <tr>
                <th>Employee ID</th>
                <th>Tazkira</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Job ID</th>
                <th>Salary ID</th>
                 
             </tr>
             </thead>
             <tbody>
                 <tr>
                     <td><input type="number" name="Emp_ID" id="Emp_ID" autocomplete="off"></td>
                     <div id="emp2"></div>
                     <td><input type="number" name="Tazkira" id="Tazkira" autocomplete="off"></td>
                     <div id="tazkira2"></div>
                     <td><input type="text" name="Emp_Name" id="Emp_Name" autocomplete="off"></td>
                     <td><input type="text" name="Emp_Last_Name" id="Emp_Last_Name" autocomplete="off"></td>
                     <td><input type="number" name="Job_ID" id="Job_ID" autocomplete="off"></td>
                     <td><input type="number" name="Salary" id="Salary_ID" autocomplete="off"></td>
                 </tr>
         
             <tr>
                 
             </tr>
             </tbody>
            </table>
            </form>
        </div>
         </div>
         <div class="multi-button">
            <button class="btn btn-update" onclick="validate()" >Update</button>
            <button class="btn btn-delete" onclick="deleteEmployee()" >Delete</button>
         </div>
         <?php include '../php/footer.php' ?>
        <script>
            window.onload = function () {
                const urlParams = new URLSearchParams(window.location.search);
        
                // Populate input fields with values from URL parameters
                document.getElementById('Emp_ID').value = urlParams.get('Emp_ID') || '';
                document.getElementById('Tazkira').value = urlParams.get('Tazkira') || '';
                document.getElementById('Emp_Name').value = urlParams.get('Emp_Name') || '';
                document.getElementById('Emp_Last_Name').value = urlParams.get('Emp_Last_Name') || '';
                document.getElementById('Job_ID').value = urlParams.get('Job_ID') || '';
                document.getElementById('Salary_ID').value = urlParams.get('Salary_ID') || '';
            };
            function validate() {
                let valid = true;
                let emp = document.getElementById("Emp_ID").value;
                let tazkira = document.getElementById("Tazkira").value;

                // Validate Employee ID
                if (!/^\d+$/.test(emp) || emp === "") {
                    document.getElementById("emp2").innerHTML = "Please enter a valid Employee ID.";
                    valid = false;
                } else {
                    document.getElementById("emp2").innerHTML = "";
                }

                // Validate Tazkira Number
                if (!/^\d+$/.test(tazkira) || tazkira === "") {
                    document.getElementById("tazkira2").innerHTML = "Please enter a valid Tazkira Number.";
                    valid = false;
                } else {
                    document.getElementById("tazkira2").innerHTML = "";
                }

                if (valid) {
                    const form = document.forms['employee'];
                    const formData = new FormData(form);

                    // Send form data using AJAX (fetch)
                    fetch("../php/updateemployee.php", {
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

            function deleteEmployee() {
                const form = document.forms['employee'];
                const formData = new FormData(form); // Collect form data

                fetch('../php/deleteemployee.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text()) // Change to response.json() if PHP returns JSON
                .then(data => {
                    document.getElementById('feedback').innerHTML = data; // Show response in a div
                    alert(data); // Optional alert
                })
                .catch(error => console.error('Error:', error));
            }

            </script>
    </body>
</html>