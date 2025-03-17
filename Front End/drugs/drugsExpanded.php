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
        <origin>
        <div id="over"><h1 data-key="drug-records">Drug records</h1></div>
        <div class="button-group">
            <button class="btn btn-back" onclick="history.back()">Go Back</button>
        </div>
        <div id="reportExpanded">
            <?php include '../php/drugreport.php';?>
        </div>
        </origin>
        <?php include '../php/footer.php' ?>
        
    </body>
</html>