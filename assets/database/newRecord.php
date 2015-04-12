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
    
    // Prepare SQl for insertion, and bind parameters
    
    $statement = $conn->prepare("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE, FEATURED)
        VALUES (:cat, :name, :price, :quantity, :desc, :image, :featured)");
    $statement->bindParam(':cat', $cat);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':price', $price);
    $statement->bindParam(':quantity', $quantity);
    $statement->bindParam(':desc', $desc);
    $statement->bindParam(':image', $image);
    $statement->bindParam(':featured', $featured);
    
    //Insert a sql row
    $cat = $itemCat;
    $name = $itemName;
    $price = $Price;
    $quantity = $Quantity;
    $desc = $Description;
    $image = $Photo;
    if ($Featured == 'Yes') {$featured = TRUE;}
    else {$featured == FALSE;}
    $statement->execute();
    
    echo $itemName + "Record Added Successfully.";
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

$conn = null;
?>