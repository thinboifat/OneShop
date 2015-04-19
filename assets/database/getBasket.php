
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
$numberOfItems = 0;

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
        $i++;
        $itemNamePosition = "name";
        $itemNamePosition .= $i;
        $itemPricePosition = "price";
        $itemPricePosition .= $i;
        $itemPriceQuantity = "quantity";
        $itemPriceQuantity .= $i;
        $cost = $cost+$row[1];
        echo "
            
            
            
                <tr class='TitleRow'>
                    <th><img src='$row[0]' id=$row[5] class='FeaturedImage' alt='Dummy image for client to change'></th>
                    <th name='$row[2]' id='$itemNamePosition'>$row[2]</th>
                    <th name='$row[1]' id='$itemPricePosition'>£$row[1]</th>
                    <th name='$quantity' id='$itemPriceQuantity' >$quantity</th>
                    <th><button id=$row[5] class='cell' onclick='removeItem(event)'>Remove</button></th>
                </tr>
            ";
    
    }
    
    
} catch (Exception $ex) {
 // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}
//Now Present the rest of the checkout area, with the price, and order submition.
echo "   
            </table>
            <p name='$cost' id='totalCost'>
                Total: £$cost
            </p>
            
            <div id='userDetails' class='UserDetails'>
            
            <p class='BasicText'>Enter the name and address you want to send the items to.</p>
            <p class='BasicText'>Name Of Recipient</p>
            <input label='Recipient' name='recipient' id='recipient' class='addressForm' required>
            <p class='BasicText'>Address Line 1</p>
            <input name='lineOne' id='lineOne' class='addressForm' required>
            <p class='BasicText'>Address Line 2</p>
            <input name='lineTwo' id='lineTwo' class='addressForm'>
            <p class='BasicText'>County</p>
            <input name='county' id='county' class='addressForm' required>
            <p class='BasicText'>Post Code</p>
            <input name='postCode' id='PostCode' class='addressForm' required>
            <p></p>
            <button type='submit' id='submitOrder'>Submit Order</button>
            </div>
        ";

?>