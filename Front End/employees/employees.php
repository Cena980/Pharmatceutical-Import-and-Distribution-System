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
        <div id="over"><h1>Employee records</h1></div>
        <div id="buttons">
            <button><a href="Insertemployee.html">Add</a> </button>
        </div>
        <div id="report">
            <?php include '../php/employeereport.php';?>
        </div>
     </div>
     <?php include '../php/footer.php' ?>
    </body>
</html>