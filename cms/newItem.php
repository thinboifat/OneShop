<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$database = true;

//Form validation and submittion.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["photoUploads"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photoUploads"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["photoUploads"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["photoUploads"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["photoUploads"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

  
  $itemName = test_input($_POST["ItemName"]);
  $itemCat = test_input($_POST["ItemCat"]);
  $Price = test_price($_POST["Price"]);
  $Quantity = test_quantity($_POST["Quantity"]);
  $Description = test_input($_POST["Description"]);
  $Featured = test_input($_POST["Featured"]);
  $Photo = "/647395/cms/uploads/";
  $Photo .= $_FILES["photoUploads"]["name"];

  $addToDB = $_SERVER['DOCUMENT_ROOT'];
  $addToDB .= "/647395/assets/database/newRecord.php";
  echo $Featured;
     
  require_once($addToDB);
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function test_image($data) {
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

function test_price($data) {
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
        <title>CMS - Add Items</title>
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
        <h1 class="Title" id="homepageTitle">CMS - Add Items</h1>
        </header>
        <section class="MainCMSSection">
        <h2 class="Subheading" id="numberInCMS">Add Items</h2>
        <?php 
        if ($database == false)  {
            echo "<p id='noItemMessage'>Error. No database has been created.</p>";
            }
            ?>
        
        <p> To upload a product, first choose an image of the product. (Square 300px x 300px files work best!). Multiple images can be uploaded at the same time. </p>
        <p> Then, fill in the product information, and press submit. </p>

        <!-- Shopping basket is generated here depending on number of items -->
        <form id="addToDBForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST">
            <table class="CMSItemList" id="CMSAddItems">
                <tr class='TitleRow'>
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity On Hand</th>
                    <th>Description</th>
                    <th>Featured</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr class="AddItemRow">
                    <th >
                        <input id="imageDropzone" type="file" name="photoUploads" >
                        </th>
                    <th class="EditableItem"><input type="text" name="ItemName" required></th>
                    <th class="EditableItem"><input type="text" name="ItemCat" required></th>
                    <th class="EditableItem"><input type="text" name="Price" required></th>
                    <th class="EditableItem"><input type="text" name="Quantity" required></th>
                    <th class="EditableItem"><input type="text" name="Description" required></th>
                    <th class="EditableItem">
                        <select name="Featured">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </th>
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
    <script src="/647395/scripts/addNewItems.js"> </script>
</html>