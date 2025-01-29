<?php
    // Include the config file
    require_once 'config.php';

    // Create connection
    try {
        $connect = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

        // Check connection
        if ($connect->connect_error) {
            throw new Exception("Connection failed: " . $connect->connect_error);
        }


    } catch (Exception $e) {
        echo "Could not connect: " . $e->getMessage();
    }
?>
