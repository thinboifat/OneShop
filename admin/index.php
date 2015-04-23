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
        <link rel="stylesheet" href="/647395/css/shoppingCSS.css" type="text/css"/>
        <link rel="icon" type="image/png" href="/647395/assets/favicon.ico">
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
                    <li><a href="/647395/admin/stock.php">Stock Checks</a></li>
                    <li><a href="/647395/admin/finance.php">Finance</a></li>
                    <li><a href="/647395/admin/index.php">Home</a>
                </ul>
            </nav>
        <h1 class="Title" id="homepageTitle">Admin Panel</h1>
        </header>
        <section class="MainCMSSection">        
        <h2 class="Subheading" id="numberInCMS">All Orders</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <select name="selection">
                    <option value="itemID">Order ID</option>
                    <option value="itemName">Item Name</option>
                    <option value="recipient">Recipient</option>
                    <option value="address">Address</option>
                    <option value="date">Order Date</option>
                </select>
                <input id="searchForItemID" onclick="clearIDText()" value="Search" type="text" name="search">
                <input type="submit">
            </form>
        <!-- Shopping basket is generated here depending on number of items -->
            <table class="CMSItemList" id="CMSTableOfItems">
                <tr class='TitleRow'>
                    <th>Order</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity Ordered</th>
                    <th>Order Date</th>
                    <th>Recipient</th>
                    <th>Address</th>
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
  
                $search = test_input($_POST["search"]);
                $selection = test_input($_POST["selection"]);

                $addToDB = $_SERVER['DOCUMENT_ROOT'];
                $addToDB .= "/647395/assets/database/orderSearch.php";
                require_once($addToDB);
  
                }
                else {
                    $loadTables = $_SERVER['DOCUMENT_ROOT'];
                    $loadTables .= "/647395/assets/database/getOrders.php";
                    include_once($loadTables);
                }
                ?>
            </table>
         </section>
        <footer>
            <section class="Copyright">
                <p>Switch to <a href="/647395/customer/index.php">Customer View</a></p>
                <p>Switch to <a href="/647395/cms/index.php">CMS View</a></p>
                 <ul class="footerMenu">
            </section>
        </footer>
    </body>
    <script src="/647395/scripts/adminFunctions.js"> </script>
</html>