<?php require 'php/functions.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Home Page
        </title>
        <link rel="stylesheet" href="css/home.css">
        <style>
            body {
                direction: ltr; /* Force left-to-right layout */
            }
        </style>
    </head>
    <body>
        <!-- fetching header from server  -->
        <?php include 'php/header1.php' ?>
        <origin>
        <main>
        <div class="left">
            <div data-key="goto" class="section_title">Go To</div>
            <div class="tables">
                <a href="invoices/invoiceManager.php">Invoice Manager</a>
            </div>
            <div class="tables">
                <a href="backup/backup.php">Database Backup</a>
            </div>
            <?php $tables = getTables(); ?>
            <?php
            foreach ($tables as $table) {
                $tableName = $table['table'] ?? null;
                if ($tableName) {
                    $filePath = strtolower($tableName) . '/' . strtolower($tableName) . '.php';
                    if (file_exists($filePath)) {
                        ?>
                        <div class="tables">
                            <a href="<?php echo $filePath; ?>">
                                <?php echo htmlspecialchars(ucfirst($tableName)); ?>
                            </a>
                        </div>
                        <?php
                    } else {
                        // Optionally, log or display a message if the file doesn't exist
                        // echo "File does not exist: $filePath";
                    }
                } else {
                    echo "Invalid table data.";
                }
            }
            ?>
        </div>

            <div class="right">
                <div data-key="products" class="section_title">Products</div>
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
                <div data-key="salesreport" class="section_title">Sales Reports</div>
                <?php include 'php/salesreportlimited.php'?>
            </div>
            
        </main>
                    </origin>
        <!-- fetching footer from server -->
         <?php include 'php/footer.php' ?>
    </body>
</html>