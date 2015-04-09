/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var dummy = document.getElementById("dummyData");
var kill = document.getElementById("killDummyData");
init();


function init() {
    dummy.addEventListener("click", buildDummyDB, false);
    dummy.addEventListener("click", killDummyDB, false);
}

function buildDummyDB(){
    var xml = new XMLHttpRequest();
    xml.open("GET", "/WebscriptSite/database/createDummy.php", true);
    return false;
}

function killDummyDB(){
    var xml = new XMLHttpRequest();
    xml.open("GET", "/WebscriptSite/database/killDummy.php", true);
    return false;
}

function log(text) {
    console.log(text);
}