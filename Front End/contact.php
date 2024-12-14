<?php require 'php/functions.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Home Page
        </title>
        <link rel="stylesheet" href="css/home.css">
        
    </head>
    <body>
        <div id="bar">
            <ul class="barr">
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li><a href="sales/sales.php">Sales</a></li>
                <li><a href="drugs/drugs.php">Drug</a></li>
                <li><a href="employees/employees.php">Employee</a></li>
                <li><a href="Inventory/inventory.php">Inventory</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            <div class="barr">
                <form>
                    <input type="text" id="search" name="Search" style="width: 85%;" id="search">
                    <input type="submit" value="Search" style="width: 10%; text-align: center; height: 20px;" onclick="validation()">
                </form>
                <script>
                    a = document.getElementById("search");
                    function validation() {
                        if (a.value.length<1){
                            alert("Cannot search for empty string")
                        }
                        
                    }
                    
                    
                </script>
                <select >
                    <option>Persian</option>
                    <option>Pashto</option>
                    <option>English</option>
                </select>
            </div>
        </div> 
        <main>
            <?php $Shareholders = getShareholders() ?>
            <?php
                foreach($Shareholders as $Shareholder){
                    ?>
                    <div class="card">
                        <img src="avatar.jpeg" alt="dp" style="width:100%">
                        <div class="container_card">
                            <h3><b><?php echo $Shareholder['Holder_Name']?></b></h3>
                            <h4><b><?php echo $Shareholder['Phone']?></b></h4>
                        </div>
                    </div>

                    <?php
                }
            ?>
        </main>
        <div id="bottom">
            <div class="bott">
                <h3>Abdul Bashir Arsine</h3>

            </div>
            <div class="bott">
                <h3>Ali Sina Nazari</h3>

            </div>
            <div class="bott">
                <h3>...</h3>
            </div>
        </div>
    </body>
</html>