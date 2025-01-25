<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Inventory Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        
        <div class="inventory">
            <div class="inventory-left">
                <div id="over"><h1>Inventory Records</h1></div>
                <div id="button-group">
                        <button class="btn btn-save" onclick="location.href='insertinventory.php'">Add</button>
                    </div>
                <div id="report">
                    <?php include '../php/inventoryreport.php';?>
                </div>

            </div>
            <div class="inventory-right">
                <div id="over"><h1>Refill List</h1></>
                <div id="report">
                    <?php include '../php/refillreport.php';?>
                </div>
            </div>
        </div>
        </div>

        <?php include '../php/footer.php' ?>
    </body>
</html>