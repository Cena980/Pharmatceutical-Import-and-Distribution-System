<?php require 'php/functions.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Home Page
        </title>
        <link rel="stylesheet" href="css/home.css">
        
    </head>
    <body>
        <?php include 'php/header1.php' ?>
        <main>
            <?php $Shareholders = getShareholders() ?>
            <?php
                foreach($Shareholders as $Shareholder){
                    ?>
                    <div class="card">
                    <img src="images/<?php echo $Shareholder['Holder_Name']; ?>.jpg" alt="dp" style="width:200px">
                        <div class="container_card">
                            <h3><b><?php echo $Shareholder['Holder_Name']?></b></h3>
                            <h4><b><?php echo $Shareholder['Phone']?></b></h4>
                        </div>
                    </div>

                    <?php
                }
            ?>
        </main>
        <?php include 'php/footer.php' ?>
    </body>
</html>