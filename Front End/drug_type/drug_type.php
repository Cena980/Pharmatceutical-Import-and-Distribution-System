<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Drug Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1>Drug Types</h1></div>
        <div class="button-group">
            <button class="btn btn-save"><a href="Insertdrugtype.html">Add</a> </button>
        </div>
        <div id="report">
            <?php include '../php/drugtypereport.php';?>
        </div>
        <?php include '../php/footer.php' ?>
    </body>
</html>