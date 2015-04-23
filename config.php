<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Check if Database exists.

//If Yes, continue to CMS screen

//If No, create a database called content_management_system with config.php
$createDB = $_SERVER['DOCUMENT_ROOT'];
$createDB .= "/647395/assets/database/createDB.php";
require_once($createDB);


$buildDB = $_SERVER['DOCUMENT_ROOT'];
$buildDB .= "/647395/assets/database/initialdatabasetables.php";
require_once($buildDB);

$addDummy = $_SERVER['DOCUMENT_ROOT'];
$addDummy .= "/647395/assets/database/createDummy.php";
require_once($addDummy);
            

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
                    <li><a href="/647395/admin/index.php">Admin</a></li>
                    <li><a href="/647395/customer/index.php">Customer</a></li>
                    <li><a href="/647395/cms/index.php">CMS</a>
                </ul>
            </nav>
        <h1 class="Title" id="homepageTitle">CMS Manager</h1>
        </header>
        <section class="MainCMSSection">        
        <h2 class="Subheading" id="numberInCMS">All Items</h2>
        <p>
            Welcome to one shop. You shall only need to visit this page once.
            This page creates all the database tables you need - you simply
            need to add your own database tables, and populate this website
            with your products. It does not matter what you sell, this API
            will intelligently display your products by category, and by those
            you want featured on the start page. You can have up to five
            categories displayed. 
        </p>
         </section>
        <footer>
            <section class="Copyright">
                <p>Switch to <a href="/647395/customer/index.php">Customer View</a></p>
                <p>Switch to <a href="/647395/admin/index.php">Admin View</a></p>
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
    <script src="/647395/scripts/databaseFunctions.js"> </script>
</html>