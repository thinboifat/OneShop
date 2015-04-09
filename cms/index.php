<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$database = false;

//Check if Database exists.

//If Yes, continue to CMS screen

//If No, create a database called content_management_system with config.php

//Intergrate into config.php
$buildDB = $_SERVER['DOCUMENT_ROOT'];
$buildDB .= "/WebscriptSite/assets/database/initialdatabasetables.php";
require_once($buildDB);
            
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
            <form>
                <input id="searchForItem" value="Search" type="text" required>
                <input type="submit" required>
            </form>
        <!-- Shopping basket is generated here depending on number of items -->
            <table class="CMSItemList" id="CMSTableOfItems">
                <tr class='TitleRow'>
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity Remaining</th>
                    <th>Remove Item?</th>
                </tr>                
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