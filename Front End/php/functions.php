<?php
    require "config.php";
    function dbConnect(){
        $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
        if($mysqli->connect_error !=0){
            return FALSE;
        }else{
            return $mysqli;
        }
    }

    function getTables() {
        try {
            // Use constants from config.php for the connection
            $pdo = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USERNAME, PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $stmt = $pdo->query("SHOW TABLES");
            $tables = $stmt->fetchAll(PDO::FETCH_NUM);
    
            // Map to desired structure
            return array_map(fn($row) => ['table' => $row[0]], $tables);
        } catch (PDOException $e) {
            // Handle connection errors
            return ['error' => $e->getMessage()];
        }
    }
    function getDrugs($int) {
        $mysqli = dbConnect();
        $result = $mysqli->query("Select * from drug_sales_summary order by total_sales desc limit $int");
        while($row = $result->fetch_assoc()){
            $Drugs[] =$row; 
        }
        return $Drugs;
    }

    function getShareholders() {
        $mysqli = dbConnect();
        $result = $mysqli->query("Select * from shareholders");
        while($row = $result->fetch_assoc()){
            $Shareholders[] =$row; 
        }
        return $Shareholders;
    }
    function getPrice($int){
        $mysqli = dbConnect();
        $result = $mysqli->query("Select Price from inventory where inventory_id = $int");
        return $result;
    }
