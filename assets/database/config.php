<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
        $oneShopDB = new PDO("mysql:$servername;dbname=myDB charset=utf8", $username, $password);
        // set error mode to produce an exception
        $oneShopDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE content_management_system";
        //no results to be returned, use exec
        $oneShopDB->exec($sql);
        echo "Database Created.";
    }
catch(PDOException $e)
    {
    echo "Connected to Database";
    }
    
    //Create Initial Tables
    $oneShopDB = null;
?>