<?php

$desiredCSS = "";
$negative = "shoppingcssNegative.css";
$positive = "shoppingcssPositive.css";
$cssinuse = "shoppingcss.css";


if ($_POST["style"] == "positive") {

    if (!copy($positive, $cssinuse)) {
        echo "failed to copy $postive...\n";
    }
}

else {


if (!copy($negative, $cssinuse)) {
    echo "failed to copy $negative...\n";
}


}

//header("Location: /WebscriptSite/cms/aesthetics.php");
//die();