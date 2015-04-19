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
    if ($selection == "itemName") {
        $statement = $conn->prepare("SELECT * FROM ORDERS WHERE PRODUCT_NAME LIKE '%$search%'");
    }
    else if ($selection == "itemID") {
        $statement = $conn->prepare("SELECT * FROM ORDERS WHERE ORDER_ID = $search"); 
    }
    
    else if ($selection == "address") {
        $statement = $conn->prepare("SELECT * FROM ORDERS WHERE RECIPIENT_ADDRESS LIKE '%$search%'"); 
    }
    
    else if ($selection == "recipient") {
        $statement = $conn->prepare("SELECT * FROM ORDERS WHERE RECIPIENT LIKE '%$search%'"); 
    }
    
    else if ($selection == "date") {
        $statement = $conn->prepare("SELECT * FROM ORDERS WHERE ORDER_DATE LIKE '%$search%'");  
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