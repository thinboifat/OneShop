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
        <section class="MainBasketSection" id="basketSection">
        <h2 class="Subheading" id="numberInBasket">Your Basket</h2>
        </section>
        <footer>
            <section class="Copyright">
                This site was developed by Marcus Cole.
                 <ul class="footerMenu">
                    <li> <a href="http://validator.w3.org/check?uri=referer">
                            HTML</a></li>
                            <li><a href="http://jigsaw.w3.org/css-validator/check/referer"> CSS </a></li>
                </ul>
                <?php 
                $path = $_SERVER['DOCUMENT_ROOT'];
                $path .= "/WebscriptSite/customer/orderConfirm.php";
                //include_once($path);
            ?>
            </section>
        </footer>
    </body>
    <script src="/WebscriptSite/scripts/checkout.js"> </script>
</html>