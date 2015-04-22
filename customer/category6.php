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
                $header = $pages[5];
            ?>
        </header>
        <section class="MainSection">
        <?php echo" <div> <h2 id='itemCat' class='Subheading'> $header </h2></div>"; ?>    
        
            <div class="FeaturedContainer" id="featuredContainer">
                <?php 
                $path = $_SERVER['DOCUMENT_ROOT'];
                $path .= "/WebscriptSite/assets/database/getCategory.php";
                include_once($path);
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