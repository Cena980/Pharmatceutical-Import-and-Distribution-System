<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Purchase Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
        
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1>Purchases</h1></div>
        <div id="report">
            <div class="button-group">
                <button class="btn btn-save"><a href="addpurchases.php">Add</a> </button>
            </div>
            <?php include '../php/purchasesreport.php';?>
        </div>
        </div>
        <?php include '../php/footer.php' ?>
    </body>
</html>