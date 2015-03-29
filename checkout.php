<!DOCTYPE html>
<!--
This website was built by Marcus Cole
-->

<html>
    <head>
        <link rel="stylesheet" href="css/shoppingCSS.css" type="text/css"/>
        <link rel="icon" type="image/png" href="/assets/favicon.png">
        <title>One Shop Shopping</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content=" One Shop Shopping. All your shopping desires, in one place." />
        <meta name="keywords" content="one shop shopping" />
        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
        <script src="scripts/frontpage.js"> </script>

    </head>
    <body>
        <header class="TopContainer">
        <?php include('assets/navbar.php');?>
        <h1 class="Title" id="homepageTitle">Checkout</h1>
        </header>
        <section class="MainSection">
        <h2 class="Subheading">Featured Items</h2>
            <div class="FeaturedContainer">
                <div class="featuredItem" id="featured1"></div>
                <div class="featuredItem" id="featured2"></div>
                <div class="featuredItem" id="featured3"></div>
            </div>
        <h2 class="Subheading">Popular This Week</h2>
            <div class="itemContainer">
                <div class="itemContainer" id="item1"></div>
                <div class="featuredItem" id="featured4"></div>
                <div class="featuredItem" id="featured5"></div>
                <div class="featuredItem" id="featured6"></div>
                </div>        
        </section>
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
</html>