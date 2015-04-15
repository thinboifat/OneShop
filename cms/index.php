<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$database = TRUE;
$search = FALSE;

//Check if Database exists.

//If Yes, continue to CMS screen

//If No, create a database called content_management_system with config.php

$buildDB = $_SERVER['DOCUMENT_ROOT'];
$buildDB .= "/WebscriptSite/assets/database/initialdatabasetables.php";
require_once($buildDB);

$addDummy = $_SERVER['DOCUMENT_ROOT'];
$addDummy .= "/WebscriptSite/assets/database/createDummy.php";
//require_once($addDummy);
            

//
   //Create tables, place in seperate file?
    //try {
    //include_once 'initialdatabasetables.php';
    //} catch (Exception $ex) {
    //
    //}
    //Confirm creation of table creation.
?>

<!DOCTYPE html>
<!--
This website was built by Marcus Cole
-->

<html>
    <head>
        <link rel="stylesheet" href="/WebscriptSite/css/shoppingCSS.css" type="text/css"/>
        <link rel="icon" type="image/png" href="/WebscriptSite/assets/favicon.png">
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
                    <li><a href="/WebscriptSite/cms/newItem.php">Add Items</a></li>
                    <li><a href="/WebscriptSite/cms/index.php">Home</a>
                </ul>
            </nav>
        <h1 class="Title" id="homepageTitle">CMS Manager</h1>
        </header>
        <section class="MainCMSSection">        
        <h2 class="Subheading" id="numberInCMS">All Items</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <select name="selection">
                    <option value="itemID">Item ID</option>
                    <option value="itemName">Item Name</option>
                    <option value="itemCat">Item Category</option>
                </select>
                <input id="searchForItemID" onclick="clearIDText()" value="Search" type="text" name="search">
                <input type="submit">
            </form>
        <!-- Shopping basket is generated here depending on number of items -->
            <table class="CMSItemList" id="CMSTableOfItems">
                <tr class='TitleRow'>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity Remaining</th>
                    <th>Image URL</th>
                    <th>Remove Item?</th>
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
                $addToDB .= "/WebscriptSite/assets/database/recordSearch.php";
                require_once($addToDB);
  
                }
                else {
                    $loadTables = $_SERVER['DOCUMENT_ROOT'];
                    $loadTables .= "/WebscriptSite/assets/database/getRecords.php";
                    include_once($loadTables);
                }
                ?>
            </table>
        <?php 
        if ($database == false)  {
            echo "<p id='noItemMessage'>No items in database.</p>";
            }
            ?>
         </section>
        <footer>
            <section class="Copyright">
                <p>Switch to <a href="/WebscriptSite/customer/index.php">Customer View</a></p>
                <p>Switch to <a href="/WebscriptSite/admin/index.php">Admin View</a></p>
                 <ul class="footerMenu">
                    <li> <a href="http://validator.w3.org/check?uri=referer">
                            HTML</a></li>
                            <li><a href="http://jigsaw.w3.org/css-validator/check/referer"> CSS </a></li>
                            <li><a id="dummyData" href=""> Create Dummy Data </a></li>
                            <li><a id="killdummyData" href=""> Remove Dummy Data </a></li>
                </ul>
            </section>
        </footer>
    </body>
    <script src="/WebscriptSite/scripts/databaseFunctions.js"> </script>
</html>