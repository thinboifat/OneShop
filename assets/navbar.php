<?php

echo '<div href="index.html"> <img class="logo" src="/WebscriptSite/images/logo.png" alt="Dummy Logo for client to change"/> </div>
    <nav class="topMenu">
            <ul>
                <li><a href="/WebscriptSite/customer/checkout.php">Checkout</a></li>
                <li><a href="/WebscriptSite/customer/bathroom.php">Bathroom</a></li>
                <li><a href="/WebscriptSite/customer/gardening.php">Gardening</a></li>
                <li><a href="/WebscriptSite/customer/diy.php">DIY</a></li>
                <li><a href="/WebscriptSite/customer/lighting.php">Lighting</a></li>
                <li><a href="/WebscriptSite/customer/index.php">Home</a>
            </ul>
        </nav>
        <h1 class="Title" id="homepageTitle">Welcome To One-Shop!</h1>
        <form action="/WebscriptSite/customer/customerSearch.php" method="GET">
            <input id="searchForName" onclick="clearNameText()" value="Search" type="text" name="search">
            </form>';
            

?>