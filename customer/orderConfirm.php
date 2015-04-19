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

$input = $_POST["item1"];


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare SQl for insertion, and bind parameters
    
    $statement = $conn->prepare("INSERT INTO ORDERS (PRODUCT_ID, PRODUCT_NAME, PRICE, Quantity, RECIPIENT, RECIPIENT_ADDRESS)
        VALUES (:id, :name, :price, :quantity, :recipient, :address)");
    $statement->bindParam(':id', $id);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':price', $price);
    $statement->bindParam(':quantity', $quantity);
    $statement->bindParam(':recipient', $recipient);
    $statement->bindParam(':address', $address);
    
    //Insert a sql row
    $id = 4;
    $name = $item1name;
    $price = $item1price;
    $quantity = $item1quantity;
    $recipient = $_POST["recipient"];
    $address= $_POST["address"];
    $statement->execute();
    
    echo "Order Complete";
    
    }
catch(PDOException $e)
    {
    echo $item1name;
    echo $item1price;
    echo $item1quantity;
    echo $e->getMessage();
    }

    
    
$conn = null;
?>

