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
        <div id="over"><h1>Insert into Companies</h1></div>
        <form name="sale" action="../php/insertcompanies.php" method="post">
            <table class="table table-success">
                <thead>
                <tr>
                   <th>Company Name</th>
                   <th>Head Quarters</th>
                   <th>Phone</th>
                   <th>Email</th>
                    
                </tr>
                </thead>
                <tbody>
                   <tr>
                       <td><input type="text" name="Comp_Name" id="did" autocomplete="off"></td>
                       <td><input type="text" name="Head_Quarters" id="de" autocomplete="off"></td>
                       <td><input type="text" name="Phone" id="qy" autocomplete="off"></td>
                       <td><input type="text" name="Email" id="dt" autocomplete="off"></td>
               
                   </tr>
            
                <tr>
                    
                </tr>
                </tbody>
               </table>
               <div class="insertButtons">
               <button type="submit" class="btn btn-save" onclick="validate()" >Save</button>
               </div>
            </form>
            <?php include '../php/footer.php' ?>
        <script>
            function validate(){
                var message = document.getElementById("noty");
                message.style.color = "green";
                message.innerHTML = "Your record has been saved.";
        
                let valid = true;
                let sale = document.getElementById("sid").value;
        
                if(!/^\d+$/.test(sale) || sale === ""){
                        document.getElementById("nsid").innerHTML = "Please enter a valid Drug ID.";
                        valid = false;
                    } else {
        
                        document.getElementById("nsid").innerHTML = "";
        
                    }
        
                let drug = document.getElementById("did");
        
                if(!/^\d+$/.test(drug) || drug === ""){
                        document.getElementById("ndid").innerHTML = "Please enter a valid Drug ID.";
                        valid = false;
                    } else {
                        document.getElementById("ndid").innerHTML = "";
                    }
        
            }
            </script>
    </body>
</html>