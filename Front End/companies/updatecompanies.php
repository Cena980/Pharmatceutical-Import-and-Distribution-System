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
        <div id="over"><h1>Update Companies</h1></div>
        <form name="sale" action="../php/upadtecompanies.php" method="post">
            <table class="table table-success">
                <thead>
                <tr>
                   <th>Company ID</th>
                   <th>Company Name</th>
                   <th>Head Quarters</th>
                   <th>Phone</th>
                   <th>Email</th>
                    
                </tr>
                </thead>
                <tbody>
                   <tr>
                       <td><input type="number" name="Comp_ID" id="Comp_ID" autocomplete="off"></td>
                       <td><input type="text" name="Comp_Name" id="Comp_Name" autocomplete="off"></td>
                       <td><input type="text" name="Head_Quarters" id="Head_Quarters" autocomplete="off"></td>
                       <td><input type="text" name="Phone" id="Phone" autocomplete="off"></td>
                       <td><input type="text" name="Email" id="Email" autocomplete="off"></td>
               
                   </tr>
            
                <tr>
                    
                </tr>
                </tbody>
               </table>
               <div class="multi-button">
                    <button type="submit" class="btn btn-save" onclick="validate()" >Update</button>
                    <button type="submit" class="btn btn-delete" onclick="deleteComp()" >Delete</button>
               </div>
            </form>
        </div>
        <?php include '../php/footer.php' ?>
        <script>
            window.onload = function () {
                const urlParams = new URLSearchParams(window.location.search);
        
                // Populate input fields with values from URL parameters
                document.getElementById('Comp_ID').value = urlParams.get('Comp_ID') || '';
                document.getElementById('Comp_Name').value = urlParams.get('Comp_Name') || '';
                document.getElementById('Head_Quarters').value = urlParams.get('Head_Quarters') || '';
                document.getElementById('Phone').value = urlParams.get('Phone') || '';
                document.getElementById('Email').value = urlParams.get('Email') || '';

            };
            </script>
    </body>
</html>