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
            <button class="btn btn-delete" onclick="deleteemployee()" >Delete</button>
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
                    form.action="../php/updateemployee.php";
                    form.method="post";
                    form.submit();
                }


            }
            function deleteemployee(){
                const form = document.forms['employee'];
                form.action="../php/deleteemployee.php";
                form.method="post";
                form.submit();
            }
            </script>
    </body>
</html>