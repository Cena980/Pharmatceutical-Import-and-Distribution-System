<?php
    $dbhost ="127.0.0.1";
    $dbuser = "root";
    $dbpass = "cena_980";
    $dbname = "drugwholesale";


    try{ $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }catch(mysqli_sql_exception){
        echo "Could not Connect";
    }
?>