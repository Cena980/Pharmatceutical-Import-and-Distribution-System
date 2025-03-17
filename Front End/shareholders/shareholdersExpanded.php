<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Shareholders Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <origin>
        <div id="over"><h1>Shareholders records</h1></div>
        <div class="button-group">
            <button class="btn btn-back" onclick="history.back()">Go Back</button>
        </div>
        <div id="report">
            <?php include '../php/shareholdersreport.php';?>
        </div>

        </div>
        </origin>
        <?php include '../php/footer.php' ?>
    </body>
</html>