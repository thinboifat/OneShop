<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$database = true;

//Check if Database exists.

//If Yes, continue to CMS screen

//If No, create a database called content_management_system with config.php


//Form validation and submittion.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

  $oldData = test_input($_POST["itemID"]);
  $newData = test_quantity($_POST["quantity"]);
  
  //echo $itemID;
  //echo $Quantity;
  
  $addToDB = $_SERVER['DOCUMENT_ROOT'];
  $addToDB .= "/647395/assets/database/editRecord.php";
       
  require_once($addToDB);
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  function test_quantity($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<!--
This website was built by Marcus Cole
-->

<html>
    <head>
        <link rel="stylesheet" href="/647395/css/shoppingCSS.css" type="text/css"/>
        <link rel="icon" type="image/png" href="/647395/assets/favicon.ico">
        <title>CMS - Stock</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <header class="TopContainer">
            <nav class="topMenu">
                <ul>
                    <li><a href="/647395/cms/aesthetics.php">Change Aesthetics</a>
                    <li><a href="/647395/cms/addStock.php">Edit Quantity</a></li>
                    <li><a href="/647395/cms/newItem.php">Add Items</a></li>
                    <li><a href="/647395/cms/index.php">Home</a>
                </ul>
            </nav>
        <h1 class="Title" id="homepageTitle">Stock Manager</h1>
        </header>
        <section class="MainCMSSection">
        <h2 class="Subheading" id="numberInCMS">Change Item Stock</h2>
        <?php 
        if ($database == false)  {
            echo "<p id='noItemMessage'>Error. No database has been created.</p>";
            }
            ?>
        <!-- Shopping basket is generated here depending on number of items -->
        <form id="addToDBForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <table class="CMSItemList" id="CMSAddItems">
                <tr class='TitleRow'>
                    <th>Item ID</th>
                    <th>Quantity On Hand</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    //Display the data they submitted.
                }
                ?>
                <tr class="AddItemRow">
                    <th class="EditableItem"><input type="text" name="itemID" required></th>
                    <th class="EditableItem"><input type="text" name="quantity" required></th>
                    
                    <th class="EditableItem"><input type="reset"></th>
                    <th id="submitToDB" class="EditableItem"><input type="submit"></th>
                    
                </tr>
            </table>
        </form>
        
         </section>
        <footer>
            <section class="Copyright">
                <p>Switch to <a href="/647395/customer/index.php">Customer View</a></p>
                <p>Switch to <a href="/647395/admin/index.php">Admin View</a></p>
                 <ul class="footerMenu">
                    <li> <a href="http://validator.w3.org/check?uri=referer">
                            HTML</a></li>
                            <li><a href="http://jigsaw.w3.org/css-validator/check/referer"> CSS </a></li>
                </ul>
            </section>
        </footer>
    </body>
</html>