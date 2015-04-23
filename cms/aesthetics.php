

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
$target_dir = "uploads/logo/";
$target_file = $target_dir . basename($_FILES["photoUploads"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$tmp = $_FILES['photoUploads']['tmp_name'];
$file_name = $tmp;


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
    move_uploaded_file($tmp, $target_dir . "logo.png");
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
    if (move_uploaded_file($_FILES["photoUploads"]["tmp_name"], $target_dir . "logo.png")) {
        echo "The file ". basename( $_FILES["photoUploads"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
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
        
        <h2 class="Subheading" id="numberInCMS">Change The Appearance Of Your Web Site.</h2>
        
        <p> Here you can change the appearance of your web site.
            The first thing to do is change the logo to your match your companies brand.
        </p>
        <form id="addToDBForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST">
        <input id="imageDropzone" type="file" name="photoUploads" >
        <input id=submitLogo" type="submit">
        
        </form>
        <p> </p>
        <p>Here, you can change the look of the site, by switching designs.</p>
        <div class="changeCSS" id="negative">
        <p>Negative Design</p>
        </div>
        <div class="changeCSS" id="positive">
        <p>Positive Design</p>
        </div>
        
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
    <script src="/647395/scripts/changecss.js"> </script>
</html>