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
        <div id="over"><h1>Update Shareholders</h1></div>
        <form name="Shareholder" action="../php/updateshareholders.php" method="post">
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
                        <td><input type="number" name="Share_ID" id="sid" autocomplete="off"></td>
                        <td><input type="text" name="Holder_Name" id="hn" autocomplete="off"></td>
                        <td><input type="text" name="Phone" id="phone" autocomplete="off"></td>
                    </tr>
            
                <tr>
                    
                </tr>
                </tbody>
               </table>
                <div class="multi-button">
                    <button type="submit" class="btn btn-save" onclick="validate()" >Update</button>
                    <button type="submit" class="btn btn-delete" onclick="deleteshareholder()" >Delete</button>
                </div>
            </form>

            <?php include '../php/footer.php' ?>
            <script>
            // Wait for the DOM to load
            window.onload = function () {
                const urlParams = new URLSearchParams(window.location.search);

                // Get input elements
                const sid = document.getElementById('sid');
                const hn = document.getElementById('hn');
                const phone = document.getElementById('phone');

                // Ensure elements exist before setting values
                if (sid) sid.value = urlParams.get('Share_ID') || '';
                if (hn) hn.value = urlParams.get('Holder_Name') || '';
                if (phone) phone.value = urlParams.get('Phone') || '';
            };
        </script>
        <script>
            const form = document.forms["Shareholder"];
            function deleteshareholder(){
                form.action="../php/deleteshareholders.php";
                form.method="post";
                form.submit();
            }
            function validate(){
                var message = document.getElementById("noty");
                message.style.color = "green";
                message.innerHTML = "Your record has been saved.";
        
                let valid = true;
                if(valid){
                    form.action="../php/updateshareholders.php";
                    form.method="post";
                    form.submit();
                }
        
            }
            </script>
    </body>
</html>