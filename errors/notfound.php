<!DOCTYPE html>
<!--
This website was built by Marcus Cole, and is licensed to any current,
and future member of the Portsmouth University Photography Society.
Conditions of this license include, but not limited to:
- Modification of any code is permitted provided the original remains backed up.
- 'Created By Marcus Cole' must remain in the footer at ALL times.
- This work may not be copied to any other project without express permission.
- This website and its code is strictly for non commercial use.


Marcus Cole is responsible for the website HTML, JS and CSS skeleton content only.
Legal responsibility for any logos, images and text content remains with the
society, regardless of the author. 
-->

<html>
    <head>
        <link rel="stylesheet" href="/CSS/DesktopCSS.css" type="text/css"/>
        <link rel="icon" type="image/png" href="/photofavicon.png">
        <title>404 Not Found</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
        <header class="TopContainer">
            <div href="index.php"> <img class="logo" src="/Photography Website PHP/Photo Logo 1000px.jpg" alt="Photography society logo - Black and purple text with a converging camera"/> </div>
            <?php 
                $path = $_SERVER['DOCUMENT_ROOT'];
                $path .= "/Photography Website PHP/navbar.php";
                include_once($path);
                ?>
        </header>
        <section><h1>404. This Page can not be found. Please check the URL and try again</h1></section>
    </body>
    </html>