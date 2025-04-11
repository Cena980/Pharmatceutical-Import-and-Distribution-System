<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Customer Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1>Customer records</h1></div>
        <div class="button-group">
            <button class="btn btn-save" onclick="location.href='Insertcustomer.php'">Add</button>
        </div>
        <div id="report">
            <?php include '../php/customerreport.php';?>
        </div>
        </div>
        <?php include '../php/footer.php' ?>
    </body>
</html>