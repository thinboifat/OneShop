<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "content_management_system";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $sql = "INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('GARDENING', 'Secateurs', 24.99, 50, 'A sturdy pair of metal secateurs, perfect for a light trim', '/WebscriptSite/images/item1.png')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Dummy data created successfully";
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

$conn = null;
?>