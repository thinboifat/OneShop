<?php
$host = "localhost"; 
$username = "root";
$password = "";


try {
    $connection = new PDO("mysql:host=$host", $username, $password);
    // Sets the PDO error mode to exception
    
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    
    $create = "CREATE DATABASE IF NOT EXISTS content_management_system";
    $connection->exec($create);
    echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>