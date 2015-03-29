<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oneShop";

try {
  
    $sql ="CREATE TABLE IF NOT EXISTS 'PRODUCTS' (
    'ID' INT(7) NOT NULL AUTO_INCREMENT,
    'PRODUCT NUMBER' VARCHAR(75) NOT NULL,
    'PRODUCT_NAME' VARCHAR(75) NOT NULL,
    'PRICE' DECIMAL(10,2) NOT NULL,
    'PRODUCT_DESC' TINYTEXT NOT NULL,
    'PRODUCT_IMAGE' VARCHAR(75),
    PRIMARY KEY ('ID'),
    UNIQUE KEY 'PRODUCT_NUMBER' ('PRODUCT_NUMBER')
   ) AUTO_INCREMENT=1 ;";
    
    $result= $oneShop->query($query);
    echo "Product Table Added";
    
    
} catch (Exception $ex) {
    echo "failure";
}

        
?>