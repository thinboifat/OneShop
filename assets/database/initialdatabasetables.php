<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "content_management_system";

try {
  
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Sets the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    $sql ="
    CREATE TABLE IF NOT EXISTS PRODUCTS (
    PRODUCT_ID INT(6) NOT NULL AUTO_INCREMENT,
    PRODUCT_CAT VARCHAR(75) NOT NULL,
    PRODUCT_NAME VARCHAR(75) NOT NULL,
    PRICE DECIMAL(10,2) NOT NULL,
    Quantity INTEGER(1) NOT NULL,
    PRODUCT_DESC TINYTEXT NOT NULL,
    PRODUCT_IMAGE VARCHAR(75),
    PRIMARY KEY (PRODUCT_ID),
    UNIQUE (PRODUCT_NAME),
    UNIQUE (PRODUCT_IMAGE)
   ) AUTO_INCREMENT=1; 
   
    CREATE TABLE IF NOT EXISTS ORDERS (
    ORDER_ID INT(6) NOT NULL AUTO_INCREMENT,
    PRODUCT_ID INT(6) NOT NULL,
    PRODUCT_NAME VARCHAR(75) NOT NULL,
    PRICE DECIMAL(10,2) NOT NULL,
    Quantity INTEGER(1) NOT NULL,
    ORDER_DATE TIMESTAMP,
    RECIPIENT VARCHAR(75) NOT NULL,
    RECIPIENT_ADDRESS VARCHAR(75) NOT NULL,
    PRIMARY KEY (ORDER_ID),
    FOREIGN KEY (PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID)
   ) AUTO_INCREMENT=1;
    ";
    
    // use exec() as no results are to be returned
    $connection->exec($sql);
    echo "Products Tables Created. ";
    
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
$connection = null;
        
?>