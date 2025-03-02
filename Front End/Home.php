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
            <div class="tables" onclick="location.href='invoices/invoiceManager.php'">
                <img class="logo1" src="images/invoice.png" alt="icon">
                <a data-key="invoice-manager" href="invoices/invoiceManager.php">Invoice Manager</a>
            </div>
            <div class="tables" onclick="location.href='backup/backup.php'">
                <img class="logo1" src="images/backup.png" alt="icon">
                <a data-key="database-backup" href="backup/backup.php">Database Backup</a>
            </div>
            <div class="tables" onclick="location.href='payments/payments.php'">
                <img class="logo1" src="images/payments.png" alt="icon">
                <a data-key="payments" href="payments/payments.php">Payment Processing</a>
            </div>
            <?php $tables = getTables(); ?>
            <?php
            foreach ($tables as $table) {
                $tableName = $table['table'] ?? null;
                if ($tableName) {
                    $filePath = strtolower($tableName) . '/' . strtolower($tableName) . '.php';
                    if (file_exists($filePath)) {
                        ?>
                        <div class="tables" onclick="location.href='<?php echo htmlspecialchars($filePath); ?>'">
                            <img class="logo1" src="images/<?php echo htmlspecialchars(($tableName)); ?>.png" alt="icon">
                            <a data-key="<?php echo htmlspecialchars(strtolower($tableName)); ?>" href="<?php echo $filePath; ?>">
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
                <div data-key="products" class="section_title">Popular Products</div>
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
                                <p class="description" style="font-weight:bold;">
                                    Total sales: <?php echo $Drug['total_sales'] ?>
                                </p>
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