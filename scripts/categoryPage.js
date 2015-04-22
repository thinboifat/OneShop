/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var category = document.getElementById("itemCat").innerHTML;
var ajaxObj = new XMLHttpRequest();
ajaxObj.open("POST", '/WebscriptSite/assets/database/getCategory.php', true);
ajaxObj.onreadystatechange = function()
{if (ajaxObj.status === 200)
        if (ajaxObj.readyState === 4)
    { document.getElementById("featuredContainer").innerHTML = ajaxObj.responseText;
      console.log("Featured Items Pulled Successfully"); }
    };
    ajaxObj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    ajaxObj.send("cat=" + category);
    