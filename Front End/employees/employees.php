<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Employee Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php include '../php/header2.php' ?>
        <origin>
        <div id="over"><h1>Employee records</h1></div>
        <div class="button-group">
            <button class="btn btn-save" onclick="location.href='Insertemployee.php'">Add </button>
        </div>
        <div id="report">
            <?php include '../php/employeereportLimited.php';?>
        </div>
        <div class="button-group">
            <button class="btn btn-back" onclick="location.href='employeesExpanded.php'">View All </button>
        </div>
     </div>
     </origin>
     <?php include '../php/footer.php' ?>
    </body>
</html>