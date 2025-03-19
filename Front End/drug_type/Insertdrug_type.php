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
        <div id="over"><h1>New Drug Type</h1></div>
        <div class="alerts" id="feedback"></div>
        <form name="type">
            <table class="table table-success">
                <thead>
                   <tr>
                       <th>Type Name</th>
                      
                   </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="type" id="type" autocomplete="on"></td>
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
                let drugType = document.getElementById("type").value;
                if (!/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/.test(drugType.trim()) || drugType.trim() === "") {
                    document.getElementById("feedback").innerHTML = "Please enter a valid Drug Type.";
                    valid = false;
                } else {
                    document.getElementById("feedback").innerHTML = "";
                }



                if (valid) {
                    const form = document.forms['type'];
                    const formData = new FormData(form);

                    // Send form data using AJAX (fetch)
                    fetch("../php/insertdrugtype.php", {
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
            </script>
    </body>
</html>