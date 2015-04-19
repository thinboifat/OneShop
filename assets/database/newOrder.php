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
    
    $statement = $conn->prepare("INSERT INTO ORDERS (PRODUCT_ID, PRODUCT_NAME, PRICE, QUANTITY, RECIPIENT, RECIPIENT_ADDRESS)
        VALUES (:id, :name, :price, :quantity, :recipient, :address)");
    $statement->bindParam(':id', $id);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':price', $price);
    $statement->bindParam(':quantity', $quantity);
    $statement->bindParam(':recipient', $recipient);
    $statement->bindParam(':address', $address);
    
    //Insert a sql row
    $id = $itemId;
    $name = $itemName;
    $price = $Price;
    $quantity = $Quantity;
    $recipient = $Recipient;
    $image = $Photo;
    $statement->execute();
    
    echo $itemName + "Record Added Successfully.";
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

$conn = null;
?>