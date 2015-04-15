/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var dummy = document.getElementById("dummyData");
var kill = document.getElementById("killDummyData");
init();


function init() {
    assignIDs();
    //dummy.addEventListener("click", buildDummyDB, false);
    //dummy.addEventListener("click", killDummyDB, false);
}

function buildDummyDB(){
    var xml = new XMLHttpRequest();
    xml.open("GET", "/WebscriptSite/database/createDummy.php", true);
    return false;
}

function clearNameText(){
    document.getElementById("searchForItemName").value="";
}

function clearIDText(){
    document.getElementById("searchForItemID").value="";
}

function killDummyDB(){
    var xml = new XMLHttpRequest();
    xml.open("GET", "/WebscriptSite/database/killDummy.php", true);
    return false;
}

function log(text) {
    console.log(text);
}

//Gets the item ID from the removed button, and sets up an AJAX responder, to
// remove the item from the DB with removeRecord.php.
function removeItem(event) {
    event.preventDefault();
    var itemID = event.target.id;
    var sure = confirm("Are you sure you want to delete item#" + itemID +"?");
    if (sure) {
    var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
            }
        else {
            // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
    xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState===4 && xmlhttp.status===200)
        {
            alert("Item #" + itemID + " deleted");
            window.location.reload(true);
        }
    }
    toSend = "itemID=" + itemID;
    xmlhttp.open("POST","/WebscriptSite/assets/database/removeRecord.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(toSend);
}
}

// Gets the value of each cell, and assigns it to the ID value.
// The remove button is given the item ID as its ID, for easy SQL editing.
function assignIDs() {
    var cells = document.getElementsByClassName("cell");
    var arrayLen = cells.length;
    var columnCount = 0;
    for (var i = 0; i < arrayLen; i++) {
        columnCount++;
        if (columnCount === 8) {columnCount = 1};
        if (columnCount === 7) {}
        else {
            cells[i].id = cells[i].innerHTML;
            if (columnCount === 1) {
                cells[i+6].id = cells[i].innerHTML;
                }
            }
        }
    }
