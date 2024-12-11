<?php
    $dbhost ="localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "drugwholesale";


    try{ $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }catch(mysqli_sql_exception){
        echo "Could not Connect";
    }
?>