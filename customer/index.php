<!DOCTYPE html>
<!--
This website was built by Marcus Cole
-->

<html>
    <head>
        <link rel="stylesheet" href="/647395/css/shoppingCSS.css" type="text/css"/>
        <link rel="icon" type="image/png" href="/647395/assets/favicon.ico">
        <title>One Shop Shopping</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content=" One Shop Shopping. All your shopping desires, in one place." />
        <meta name="keywords" content="one shop shopping" />
        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
        <script src="/647395/scripts/frontpage.js"> </script>
        

    </head>
    <body>
        <header class="TopContainer">
            <?php 
                $path = $_SERVER['DOCUMENT_ROOT'];
                $path .= "/647395/assets/navbar.php";
                include_once($path);
            ?>
        
        </header>
        <section class="MainSection">
        <h2 class="Subheading">Featured Items</h2>
            <div class="FeaturedContainer" id="featuredContainer">
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
    <script src="/647395/scripts/basketManager.js"> </script>
</html>