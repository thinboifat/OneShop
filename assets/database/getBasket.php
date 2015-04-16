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

$currentItem = "(5,6,7)";
$items = [3,4,6,7]; //$_POST[]
$toRetrieve = "(";

//For each item in basket, add to a bracketed list for the SQL to select.
foreach ($items as &$item) {
   $toRetrieve .= "$item,";
}
substr_replace($toRetrieve ,"",-2);
$toRetrieve .= "0)"; 
        
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
    $statement = $conn->prepare("SELECT PRODUCT_IMAGE, PRICE, PRODUCT_NAME, QUANTITY, PRODUCT_DESC, PRODUCT_ID FROM PRODUCTS WHERE PRODUCT_ID IN $toRetrieve");
    $statement->execute();
    $currentRow = $statement->fetchAll();
    
    foreach ($currentRow as &$row) {
        $cost = $cost+$row[1];
        echo "
            
            
            
                <tr class='TitleRow'>
                    <th><img src='$row[0]' id=$row[5]] class='FeaturedImage' ondragstart='addBasketDrag(event)' alt='Dummy image for client to change'></th>
                    <th>$row[2]</th>
                    <th>£$row[1]</th>
                    <th>$quantity</th>
                    <th>Remove</th>
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