<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



?>

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
        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header class="TopContainer">
            <nav class="topMenu">
                <ul>
                    <li><a href="/WebscriptSite/admin/stock.php">Stock Checks</a></li>
                    <li><a href="/WebscriptSite/admin/finance.php">Finance</a></li>
                    <li><a href="/WebscriptSite/admin/index.php">Home</a>
                </ul>
            </nav>
        <h1 class="Title" id="homepageTitle">Stock Checks</h1>
        </header>
        <section class="MainCMSSection">        
        <h2 class="Subheading" id="numberInCMS">Stock Checker</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <select name="selection">
                    <option value="less">Less Than Or Equal To</option>
                    <option value="more">More Than</option>
                    <option value="reset">All Records</option>
                </select>
                <input value="Find" onclick="clearNameText()" type="text" name="find" id="finder">
                <input type="submit">
            </form>
        <!-- Shopping basket is generated here depending on number of items -->
            <table class="CMSItemList" id="CMSTableOfItems">
                <tr class='TitleRow'>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Quantity In Stock</th>
                </tr>
                <?php 
                // If the user has searched for an item, show the item(s).
                // Else, show all items.
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
                
                $selection = test_input($_POST["selection"]);
                $search = test_input($_POST["find"]);
                }
                else {
                    $selection = null;
                    $search = null;
                    
                }
                $addToDB = $_SERVER['DOCUMENT_ROOT'];
                $addToDB .= "/WebscriptSite/assets/database/getStock.php";
                require_once($addToDB);
  
                ?>
            </table>
        </section>
        <footer>
            <section class="Copyright">
                <p>Switch to <a href="/WebscriptSite/customer/index.php">Customer View</a></p>
                <p>Switch to <a href="/WebscriptSite/cms/index.php">CMS View</a></p>
                 <ul class="footerMenu">
            </section>
        </footer>
    </body>
    <script src="/WebscriptSite/scripts/adminFunctions.js"> </script>
</html>