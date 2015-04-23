/* 
 * To retrieve fearured items, this simple script creates an ajax object,
 * and then retrives the content form the PHp responder file 'getItems.php', and
 * places it in the page for the viewer to se and interact with.
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
