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

class TablePrice extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "" . parent::current(). "";
    }

    function beginChildren() { 
        echo "<p id=totalCost>Total Takings for Period: £"; 
    } 

    function endChildren() { 
        echo "</p>" . "\n";
    } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "content_management_system";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($selection == "today") {
        $statement = $conn->prepare("SELECT ORDER_ID, PRODUCT_ID, PRODUCT_NAME, PRICE, QUANTITY, ORDER_DATE FROM ORDERS WHERE ORDER_DATE BETWEEN CURDATE() - INTERVAL 1 DAY AND NOW()");
    }
    else if ($selection == "week") {
        $statement = $conn->prepare("SELECT ORDER_ID, PRODUCT_ID, PRODUCT_NAME, PRICE, QUANTITY, ORDER_DATE FROM ORDERS WHERE ORDER_DATE BETWEEN CURDATE() - INTERVAL 7 DAY AND NOW()");
    }
    
    else if ($selection == "month") {
        $statement = $conn->prepare("SELECT ORDER_ID, PRODUCT_ID, PRODUCT_NAME, PRICE, QUANTITY, ORDER_DATE FROM ORDERS WHERE ORDER_DATE BETWEEN CURDATE() - INTERVAL 30 DAY AND NOW()");
    }
    
    else if ($selection == "year") {
        $statement = $conn->prepare("SELECT ORDER_ID, PRODUCT_ID, PRODUCT_NAME, PRICE, QUANTITY, ORDER_DATE FROM ORDERS WHERE ORDER_DATE BETWEEN CURDATE() - INTERVAL 365 DAY AND NOW()");
    }
    
    else {
        $statement = $conn->prepare("SELECT ORDER_ID, PRODUCT_ID, PRODUCT_NAME, PRICE, QUANTITY, ORDER_DATE FROM ORDERS WHERE ORDER_DATE BETWEEN '2011/01/01' AND NOW()");
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
    
    if ($i  !== "0") {
        
        if ($selection == "today") {
            $statement = $conn->prepare("SELECT SUM(PRICE) FROM ORDERS WHERE ORDER_DATE BETWEEN CURDATE() - INTERVAL 1 DAY AND NOW()");
        }
        else if ($selection == "week") {
            $statement = $conn->prepare("SELECT SUM(PRICE) FROM ORDERS WHERE ORDER_DATE BETWEEN CURDATE() - INTERVAL 7 DAY AND NOW()");
        }
        
        else if ($selection == "month") {
            $statement = $conn->prepare("SELECT SUM(PRICE) FROM ORDERS WHERE ORDER_DATE BETWEEN CURDATE() - INTERVAL 30 DAY AND NOW()");
        }
        
        else if ($selection == "year") {
            $statement = $conn->prepare("SELECT SUM(PRICE) FROM ORDERS WHERE ORDER_DATE BETWEEN CURDATE() - INTERVAL 365 DAY AND NOW()");
        }
    
        else {
          $statement = $conn->prepare("SELECT SUM(PRICE) FROM ORDERS WHERE ORDER_DATE BETWEEN '2011/01/01' AND NOW()");
        }
        
        $statement->execute();
    
    
        // set the resulting array to associative
        $result = $statement->setFetchMode(PDO::FETCH_ASSOC); 
        foreach(new TablePrice(new RecursiveArrayIterator($statement->fetchAll())) as $k=>$v) { 
            echo $v;
            $i++;
        }
        
    }
    
    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>