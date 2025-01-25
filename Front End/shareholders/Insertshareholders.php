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
        <div id="over"><h1>Insert into Shareholders</h1></div>
        <form name="Shareholder">
            <table class="table table-success">
                <thead>
                   <tr>
                       <th>Shareholder ID</th>
                       <th>Shareholder Name</th>
                       <th>Phone</th>
                      
                   </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="number" name="Share_ID" id="sid" autocomplete="on"></td>
                        <td><input type="text" name="Holder_Name" id="did" autocomplete="on"></td>
                        <td><input type="number" name="Phone" id="pid" autocomplete="on"></td>
                    </tr>
            
                <tr>
                    <td id="nsid"></td>
                    <td id="noty"></td>
                </tr>
                </tbody>
               </table>
            </form>
        </div>
        <div class="insertButtons">
            <button class="btn btn-save" onclick="validate()" >Insert</button>
        </div>
    </div>
            <?php include '../php/footer.php' ?>



        </div>
        <script>
            function validate(){
        
                let valid = true;
                let share = document.getElementById("sid").value;
        
                if(!/^\d+$/.test(share) || share === ""){
                        document.getElementById("nsid").innerHTML = "Please enter a valid ShareHolder ID.";
                        valid = false;
                    } else {
        
                        document.getElementById("nsid").innerHTML = "";
        
                    }
                if(valid){
                    var message = document.getElementById("noty");
                    message.style.color = "green";
                    message.innerHTML = "Your record has been saved.";
                    const form = document.forms["Shareholder"];
                    form.action="../php/insertshareholders.php"; 
                    form.method="post"
                    form.submit();

                }else{
                    message.innerHTML="Error";
                }
        
            }
            </script>
    </body>
</html>