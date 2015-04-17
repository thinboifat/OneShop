<?php

$currentItem = 0;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "content_management_system";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $conn->prepare("SELECT PRODUCT_IMAGE, PRICE, PRODUCT_NAME, QUANTITY, PRODUCT_DESC, PRODUCT_ID FROM PRODUCTS WHERE FEATURED = :id");
    $statement->execute(array(':id' => true));
    $currentRow = $statement->fetchAll();
    
    foreach ($currentRow as &$row) {
        
        echo "
            <div class='featuredItem' id='featured'>
            <img src='$row[0]' id=$row[5] class='FeaturedImage' ondragstart='addBasketDrag(event)' alt='Dummy image for client to change'>
            <p>$row[2]</p>
            <p>$row[4]</p>
            <p>£$row[1]</p>
                <button id='$row[5]' class='addToBasket' onclick='addBasketClick(event)' onclicktype='button'>Add To Basket</button>
            </div>
            ";
    
    }
    
    
} catch (Exception $ex) {
 // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

?>

