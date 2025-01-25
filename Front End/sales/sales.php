<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Sales Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1>Sales</h1></div>
        <div class="button-group">
            <button class="btn btn-save"><a href="addsales.php">Add</a> </button>
        </div>
        <div id="report">
            <?php include '../php/salesreport.php';?>
        </div>
        </div>
        <?php include '../php/footer.php' ?>
    </body>
</html>