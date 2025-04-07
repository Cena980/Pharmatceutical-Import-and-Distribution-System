<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Companies Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <origin>
        <div id="over"><h1>Company records</h1></div>
        <div class="button-group">
            <button class="btn btn-save" onclick="location.href='insertcompanies.php'" data-key="insert-button">Add</button>
        </div>
        <div id="report">
            <?php include '../php/companiesreportLimited.php';?>
        </div>
        <div class="button-group">
            <button class="btn btn-back" onclick="location.href='companiesExpanded.php'">View All</button>
        </div>
        </div>
        </origin>
        <?php include '../php/footer.php' ?>
    </body>
</html>