<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "content_management_system";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $conn->prepare("SELECT DISTINCT PRODUCT_CAT FROM PRODUCTS");
    $statement->execute();
    $currentRow = $statement->fetchAll();
    
    echo "<div href='index.html'> <img class='logo' src='/WebscriptSite/cms/uploads/logo/logo.png' alt='Dummy Logo for client to change'/> </div>
            <nav class='topMenu'>
            <ul>
            <li><a href='/WebscriptSite/customer/checkout.php'>Checkout</a></li>
            ";
    
    
    $i = 0;
    $pages = [];
    foreach ($currentRow as &$row) {
        $page = "category";
        $page .= ($i+1);
        $row[0];
        array_push($pages,$row[0]);
        echo "
                <li><a href='/WebscriptSite/customer/$page.php'>$row[0]</a></li>
                
               ";
        $i++;
     }          
        echo "
        <li><a href='/WebscriptSite/customer/index.php'>Home</a></li>
        </ul>
        </nav>
        <h1 class='Title' id='homepageTitle'>Welcome To One-Shop!</h1>
        <form action='/WebscriptSite/customer/customerSearch.php' method='GET'>
            <input id='searchForName' onclick='clearNameText()' value='Search' type='text' name='search'>
            </form>";
    
    
} catch (Exception $ex) {
 // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}
            

?>