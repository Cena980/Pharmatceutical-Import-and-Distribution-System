<?php require 'php/functions.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Home Page
        </title>
        <link rel="stylesheet" href="css/1.css">
        <style>
            body {
                direction: ltr; /* Force left-to-right layout */
            }
        </style>
    </head>
    <body>
        <!-- fetching header from server  -->
        <?php include 'php/header1.php' ?>
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
                <?php $Drugs = getDrugs(4) ?>
                <div class="product">
                    <?php
                        foreach($Drugs as $Drug){
                            ?>
                                <div class="product_left">
                                <img src="product.png" alt="product">
                            </div>
                            <div class="product_right" >
                                <p class="title">
                                    <a href="https://www.google.com/search?q=what is <?php echo $Drug['drug_name']?>"><?php echo $Drug['drug_name'] ?></a>
                                </p>
                                <p class="description">
                                    <?php echo $Drug['Ingredient'] ?>
                                </p>
                                <P class="expiration">Exp Date: <?php echo $Drug['Expiration']?></P>
                                <P class="expiration"><?php echo $Drug['Initial_Amount']?> Items Available</P>
                                <p class="price"><?php echo $Drug['Price']?> ؋</p>
                            </div>

                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="far_right">
                <div class="section_title">Sales Reports</div>
                <?php include 'php/salesreportlimited.php'?>
            </div>
            
        </main>
        <!-- fetching footer from server -->
         <?php include 'php/footer.php' ?>
    </body>
</html>