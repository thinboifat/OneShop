<!DOCTYPE html>
<!--
This website was built by Marcus Cole
-->

<html>
    <head>
        <link rel="stylesheet" href="/WebscriptSite/css/shoppingCSS.css" type="text/css"/>
        <link rel="icon" type="image/png" href="/WebscriptSite/assets/favicon.ico">
        <title>One Shop Shopping</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content=" One Shop Shopping. All your shopping desires, in one place." />
        <meta name="keywords" content="one shop shopping" />
        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
        

    </head>
    <body>
        <header class="TopContainer">
            <?php 
                $path = $_SERVER['DOCUMENT_ROOT'];
                $path .= "/WebscriptSite/assets/navbar.php";
                include_once($path);
            ?>
        
        </header>
        <section class="MainSection">
        <h2 class="Subheading">Your search for '<?php $term =$_GET['search']; echo $term; ?>' returned these results:</h2>
            <div class="FeaturedContainer" id="featuredContainer">



<?php
$search = $_GET['search'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "content_management_system";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $conn->prepare("SELECT PRODUCT_IMAGE, PRICE, PRODUCT_NAME, QUANTITY, PRODUCT_DESC, PRODUCT_ID FROM PRODUCTS WHERE PRODUCT_NAME LIKE '%$search%'");
    $statement->execute(array(':name' => $_GET["search"]));
    $currentRow = $statement->fetchAll();
    $i=0;
    foreach ($currentRow as &$row) {
        $i++;
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
    
    if ($i === 0) {
        echo '<p>No Matches In Database Found</p>';
    }
    
} catch (Exception $ex) {
 // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

?>

            </div>
        </section>
        <article ondrop="addBasketDrop(event)" ondragover="allowImageDrop(event)" id="ShoppingBasket">
            <h2 class="ProductBar" id="basket">Basket</h2>
            <div class="Container" id="basketContainer">
            <h3 class="BasketText" id="numberInBasket">Javascript must be enabled!</h3>
            <h3 class="BasketText" id="numberInBasket">Items</h3>
            <button id="clearBasket">Clear Basket</button>
            </div>
        </article>
        <article>
            <h2 class="ProductBar" id="recentItems">Recently Viewed Items</h2>
            <p id="recentItemList">Items appear here</p>
        </article>
        <footer>
            <section class="Copyright">
                This site was developed by Marcus Cole.
                 <ul class="footerMenu">
                    <li> <a href="http://validator.w3.org/check?uri=referer">
                            HTML</a></li>
                            <li><a href="http://jigsaw.w3.org/css-validator/check/referer"> CSS </a></li>
                </ul>
            </section>
        </footer>
    </body>
    <script src="/WebscriptSite/scripts/basketManager.js"> </script>
</html>                