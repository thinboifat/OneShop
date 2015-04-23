/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var ajaxObj = new XMLHttpRequest();
ajaxObj.open("Get", '/647395/assets/database/getItems.php', true);
ajaxObj.onreadystatechange = function()
{if (ajaxObj.status === 200)
        if (ajaxObj.readyState === 4)
    { document.getElementById("featuredContainer").innerHTML = ajaxObj.responseText;
      console.log("Featured Items Pulled Successfully"); }
    };
ajaxObj.send(null);
