
<!--
Provides the table heading, then fills the table with items from the basket,
as fetched from the database.
-->

<h2 class='Subheading' id='numberInBasket'>Your Basket</h2>
            <table class='BasketTable' id='tableOfItems'>
                <tr class='TitleRow'>
                    <th></th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Remove Item?</th>
                </tr>

<?php

//Get the posted data
$query = $_POST["item"];

//Sort out quantity!!

$cost = 0;
$quantity= 1;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "content_management_system";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $conn->prepare("SELECT PRODUCT_IMAGE, PRICE, PRODUCT_NAME, QUANTITY, PRODUCT_DESC, PRODUCT_ID FROM PRODUCTS WHERE PRODUCT_ID IN $query");
    $statement->execute();
    $currentRow = $statement->fetchAll();
    
    //For each returned result, display in a table row.
    $i = 0;
    foreach ($currentRow as &$row) {
        $cost = $cost+$row[1];
        echo "
            
            
            
                <tr class='TitleRow'>
                    <th><img src='$row[0]' id=$row[5] class='FeaturedImage' alt='Dummy image for client to change'></th>
                    <th>$row[2]</th>
                    <th>£$row[1]</th>
                    <th>$quantity</th>
                    <th><button id=$row[5] class='cell' onclick='removeItem(event)'>Remove</button></th>
                </tr>
            ";
    
    }
    
    
} catch (Exception $ex) {
 // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

echo "   
            </table>
            <p id='totalCost'>
                Total: £$cost
            </p>";

?>