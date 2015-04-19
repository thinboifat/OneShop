<?php

/* 
 * Built with the help of a PDO and SQL Guide at http://www.w3schools.com/php/php_mysql_select.asp
 */

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td class='cell'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</td> </tr>" . "\n";
    } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "content_management_system";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($selection == "less") {
        $statement = $conn->prepare("SELECT PRODUCT_ID, PRODUCT_NAME, QUANTITY FROM PRODUCTS WHERE QUANTITY <= $search ORDER BY QUANTITY");
    }
    else if ($selection == "more") {
        $statement = $conn->prepare("SELECT PRODUCT_ID, PRODUCT_NAME, QUANTITY FROM PRODUCTS WHERE QUANTITY > $search ORDER BY QUANTITY");
    }
    else {
        $statement = $conn->prepare("SELECT PRODUCT_ID, PRODUCT_NAME, QUANTITY FROM PRODUCTS ORDER BY QUANTITY");
    }
    
    $statement->execute();
    
    $i = 0;
    
    // set the resulting array to associative
    $result = $statement->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($statement->fetchAll())) as $k=>$v) { 
        echo $v;
        $i++;
    }
    
    if ($i === 0) {
        echo '<p>No Matches In Database Found</p>';
    }
        
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>