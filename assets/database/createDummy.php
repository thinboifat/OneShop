<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "content_management_system";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $conn->beginTransaction();
    
    //SQL

    //Gardening Dummy
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE, FEATURED)
    VALUES ('GARDENING', 'Secateurs', 24.99, 50, 'A sturdy pair of metal secateurs, perfect for a light trim', '/WebscriptSite/images/item1.png', TRUE)");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('GARDENING', '2m Hose Reel', 14.99, 5, '2m of quality PVC hose reel, with standard UK hose fittings included.', '/WebscriptSite/images/item2.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('GARDENING', 'Apple Tree', 29.99, 5, 'Golden Delicious. Hybrid root stock, grows up to 7.5 meters.', '/WebscriptSite/images/item3.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('GARDENING', 'Plum Tree', 29.99, 5, 'Ariel. Hybrid Root Stock, grows up to 6 meters.', '/WebscriptSite/images/item4.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('GARDENING', 'Multipurpose Compost, 200L.', 24.99, 50, '200L of compost, suitable for sowing, potting on, and many other uses.', '/WebscriptSite/images/item5.png')");
    
    //Lighting Dummy
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('LIGHTING', '3 Bulb Floor Lamp.', 44.99, 10, 'A metal floor lamp, with 3 dimmable bayonet bulbs (included).', '/WebscriptSite/images/item6.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('LIGHTING', '2 Bulb Desk Lamp (Brown)', 17.50, 50, 'A metal desk lamp, with 2 dimmable bayonet bulbs (included).', '/WebscriptSite/images/item7.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE, FEATURED)
    VALUES ('LIGHTING', '2 Bulb Desk Lamp (Red)', 24.99, 50, 'A metal desk lamp, with 2 dimmable bayonet bulbs.', '/WebscriptSite/images/item8.png', TRUE)");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('LIGHTING', 'Bayonet 20w Bulb', 4.99, 50, 'A power saving 20w bulb (not dimmable)', '/WebscriptSite/images/item9.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('LIGHTING', 'Bayonet 20w Dimmable Bulb', 7.99, 50, 'A power saving 20w bulb (dimmable)', '/WebscriptSite/images/item10.png')");
    
    //DIY Dummy
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('DIY', 'BLACK AND DECKER Cordless Drill', 89.99, 20, 'A sturdy drill, suitable for most indoor tasks', '/WebscriptSite/images/item11.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('DIY', 'BLACK AND DECKER Hammer Drill', 99.99, 20, 'A sturdy drill, suitable for heavy duty task', '/WebscriptSite/images/item12.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('DIY', 'ELECTRIC SCREWDRIVER', 24.99, 50, 'A cordless electric screwdriver, with interchangeable heads (Flat Head, Cross type and star heads included)', '/WebscriptSite/images/item13.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('DIY', 'BLACK AND DECKER Strimmer', 54.99, 50, 'Powerful strimmer, suitable for all jobs. ', '/WebscriptSite/images/item14.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('DIY', 'BLACK AND DECKER Petrol Mower', 124.99, 50, 'A petrol powered lawn mower, with a roller for awesome lawn stripes', '/WebscriptSite/images/item15.png')");
    
    //BATHROOM Dummy
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('BATHROOM', 'Aqualisa Power Shower', 224.99, 50, 'Freshen up, with this power shower system. Requires medium water pressure.', '/WebscriptSite/images/item16.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('BATHROOM', 'Aqualisa Power Shower Suite', 424.99, 50, 'Refresh yourself with this shower suite. Requires high water pressure.', '/WebscriptSite/images/item17.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE, FEATURED)
    VALUES ('BATHROOM', 'Gold Mixer Tap', 9.99, 50, 'Attractive mixer taps, yet they provide an efficient flow.', '/WebscriptSite/images/item18.png', TRUE)");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('BATHROOM', 'Silver Mixer Tap.', 9.99, 50, 'Attractive, yet they provide an efficient flow.', '/WebscriptSite/images/item19.png')");
    
    $conn->exec("INSERT INTO PRODUCTS (PRODUCT_CAT, PRODUCT_NAME, PRICE, Quantity, PRODUCT_DESC, PRODUCT_IMAGE)
    VALUES ('BATHROOM', '500L Bathtub', 184.99, 50, 'Tough and large. White Bathtub.', '/WebscriptSite/images/item20.png')");
    
    $statement = $conn->prepare("INSERT INTO ORDERS (PRODUCT_ID, PRODUCT_NAME, PRICE, QUANTITY, RECIPIENT, RECIPIENT_ADDRESS)
    VALUES (:id, :name, :price, :quantity, :recipient, :address)");
    $statement->bindParam(':id', $id);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':price', $price);
    $statement->bindParam(':quantity', $quantity);
    $statement->bindParam(':recipient', $recipient);
    $statement->bindParam(':address', $address);
    
    //Insert a sql row
    $id = 1;
    $name = "Secateurs";
    $price = 24.99;
    $quantity = 1;
    $recipient = "MARCUS COLE";
    $address = "52 KINGS ROAD, TONBRIDGE, KENT, TN9 2HD";
    $statement->execute();
    
    //Insert a sql row
    $id = 2;
    $name = "2m Hose Reel";
    $price = 14.99;
    $quantity = 1;
    $recipient = "MARCUS COLE";
    $address = "5 NORMAN ROAD, SOUTHSEA, PO4 0LP";
    $statement->execute();
    
    //Insert a sql row
    $id = 3;
    $name = "Apple Tree";
    $price = 29.99;
    $quantity = 1;
    $recipient = "MARCUS COLE";
    $address = "5 NORMAN ROAD, SOUTHSEA, PO4 0LP";
    $statement->execute(); 
    
    
    $conn->commit();
    
    echo "Dummy data created successfully";
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

$conn = null;
?>