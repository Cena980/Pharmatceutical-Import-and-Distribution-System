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
    <script>
            function search(){
                a = document.getElementById("search");
                    if (a.value.length<1){
                        alert("Cannot search for empty string")
                    }else{
                        const form = document.forms["search"];
                        form.action = "../php/search.php";
                        form.method = "get";
                    }
            }
        </script>
        <div id="barover">
            <div id="bar">
                <div class="barr">
                    <img>
                    <p>B&S Database</p>
                </div>
                <div class="barr">
                    <form method="GET" action="php/search.php">
                        <input type="text" id="search" name="query" style="width: 85%;" id="search" required>
                    </form>
                    <button type="submit" value="Search" onclick="search()">Search</button>
                </div>
                <div class="barr">
                    <div id="switch" >
                        <button id="switch">En</button>
                        <button id="switch">Fa</button>
                    </div>
                </div>
            </div>  
        </div>
        <div id="bar2over">
            <div id="bar2">
                <ul class="barr2">
                <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li><a href="sales/sales.php">Sales</a></li>
                    <li><a href="drugs/drugs.php">Drug</a></li>
                    <li><a href="employees/employees.php">Employee</a></li>
                    <li><a href="inventory/inventory.php">Inventory</a></li>
                    <li><a href="purchases/purchases.php">Purchases</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
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