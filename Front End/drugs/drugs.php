<!DOCTYPE html>
<html lang="en">
    <head>
        <title data-key="drug-title">
            Drug Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <div id="over"><h1 data-key="drug-records">Drug records</h1></div>
        <div class="button-group">
            <button class="btn btn-save" onclick="location.href='Insertdrug.php'" data-key="insert-button">Add</button>
        </div>
        <div id="report">
            <?php include '../php/drugreport.php';?>
        </div>
        <?php include '../php/footer.php' ?>
    </body>
</html>