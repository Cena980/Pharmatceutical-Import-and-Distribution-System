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
        <div id="over"><h1>Drug records</h1></div>
        <div id="buttons">
            <button><a href="Insertdrug.html">Add</a> </button>
        </div>
        <div id="report">
            <?php include '../php/drugreport.php';?>
        </div>
        <?php include '../php/footer.php' ?>
    </body>
</html>