/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var ajaxObj = new XMLHttpRequest();
ajaxObj.open("Get", '/WebscriptSite/scripts/datafile.txt', true);
ajaxObj.onreadystatechange = function()
{if (ajaxObj.status === 200)
        if (ajaxObj.readyState === 4)
    { document.getElementById("featured1").innerHTML = ajaxObj.responseText;
      document.getElementById("featured2").innerHTML = ajaxObj.responseText;
      document.getElementById("featured3").innerHTML = ajaxObj.responseText;
      document.getElementById("featured4").innerHTML = ajaxObj.responseText;
      document.getElementById("featured5").innerHTML = ajaxObj.responseText;
      document.getElementById("featured6").innerHTML = ajaxObj.responseText;
      console.log("Featured Items Pulled Successfully"); }
    };
ajaxObj.send(null);
