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
        <origin>
        <div id="over"><h1>Drug Types</h1></div>
        <div class="button-group">
            <button onclick="location.href='insertdrug_type.php'" class="btn btn-add">Add</button>
        </div>
        <div id="report">
            <?php include '../php/drugtypereport.php';?>
        </div>
        <div class="button-group">
            <button onclick="location.href='drug_typeExpanded.php'" class="btn btn-back">View All</button>
        </div>
        </origin>
        <?php include '../php/footer.php' ?>
    </body>
</html>