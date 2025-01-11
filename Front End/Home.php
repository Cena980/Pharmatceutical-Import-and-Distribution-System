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
                    <li><a href="Inventory/inventory.php">Inventory</a></li>
                    <li><a href="purchases/purchases.php">Purchases</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <main>
            <div class="left">
                <div class="section_title">Go To</div>
                <?php $tables = getTables() ?>
                <?php
                foreach ($tables as $table) {
                    $tableName = $table['table'] ?? null;
                    if ($tableName) {
                        ?>
                        <div class="tables">
                            <a href="<?php echo strtolower($tableName)?>/<?php echo strtolower($tableName)?>.php">
                                
                                <?php echo htmlspecialchars(ucfirst($tableName))?>
                            </a>
                        </div>
                        <?php
                    } else {
                        echo "Invalid table data.";
                    }
                }
                ?>
                    
            </div>
            <div class="right">
                <div class="section_title">Products</div>
                <?php $Drugs = getDrugs(3) ?>
                <div class="product">
                    <?php
                        foreach($Drugs as $Drug){
                            ?>
                                <div class="product_left">
                                <img src="product.png" alt="product">
                            </div>
                            <div class="product_right" >
                                <p class="title">
                                    <a href="Drug.php?Drug=<?php echo $Drug['drug_name']?>"><?php echo $Drug['drug_name'] ?></a>
                                </p>
                                <p class="description">
                                    <?php echo $Drug['Ingredient'] ?>
                                </p>
                                <P class="expiration">Exp Date: <?php echo $Drug['Expiration']?></P>
                                <P class="expiration"><?php echo $Drug['Initial_Amount']?> Items Available</P>
                                <p class="price">00.00 ؋</p>
                            </div>

                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="far_right">
                <div class="section_title">Sales Reports</div>
                <?php include 'php/salesreport.php'?>
            </div>
            
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