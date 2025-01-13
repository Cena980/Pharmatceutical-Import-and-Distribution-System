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
        $pdo = new PDO('mysql:host=localhost;dbname=drugwholesale', 'root', '');
        $stmt = $pdo->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_NUM);
        return array_map(fn($row) => ['table' => $row[0]], $tables); // Map to desired structure
    }
    function getDrugs($int) {
        $mysqli = dbConnect();
        $result = $mysqli->query("Select * from main order by rand() limit $int");
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
