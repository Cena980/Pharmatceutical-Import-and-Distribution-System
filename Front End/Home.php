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
                                    <a href="Drug.php?Drug=<?php echo $Drug['Drug_Name']?>"><?php echo $Drug['Drug_Name'] ?></a>
                                </p>
                                <p class="description">
                                    <?php echo $Drug['Ingredient'] ?>
                                </p>
                                <P class="expiration"><?php echo $Drug['Expiration']?></P>
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