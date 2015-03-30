/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var numberOfItems = 0;
var items = [];
var basket = document.getElementById("numberInBasket");
log(document.cookie);
initialise();


function addTestItems() {
    addToBasket("grapes");
    addToBasket("apples");
    addToBasket("pears");
}

//Update the shopping basket to reflect the items the user has added to basket.
function updateBasket() {
    numberOfItems = lengthOfBasket();
    basket.innerHTML = numberOfItems;
}

//Check for cookies, update basket if basketContents cookie exists, else create it.
function initialise() {
    //Check for any existing shopping basket cookie data. If found, update 
    //numberOfItems with the amount of items in basket, and basket[] with items.
    if (document.cookie.indexOf("basketContents") >= 0) {
        log("cookies here");
    }
    else {
        createCookie("basketContents", "");
        log("no cookies here, one has been created");
    }
    updateBasket();
    //addToBasket("whey protien");
}

//Add the selected item to the basket. Increase number of items by one, and update cookies.
function addToBasket(itemName) {
    numberOfItems ++;
    cookie = document.cookie;
    cookie = cookie + itemName + ",";
    modifyCookie(cookie);
    log (itemName + " added to basket");
    updateBasket();
}

//Log a message to the console for testing purposes
function log(text) {
    console.log(text);
}
//Creates a cookie from entered data, and sets expiry.
function createCookie(name, contents) {
    document.cookie = name + "=" + contents + "; " + "expires=Thu, 1 Jan 2020 00:00:00 UTC;";
}

function modifyCookie(contents){
    document.cookie = contents + "; " + "expires=Thu, 1 Jan 2020 00:00:00 UTC;";
}

// Created from http://www.quirksmode.org/js/cookies.html
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)===' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

// Read how many items have been added to the basket. Split the cookie to access
// the basket contents, then split the list by numbe of commas to find the lenght.
// Take one away to allow for the extra comma. Return the length.
function lengthOfBasket() {
        if (document.cookie !== null) {
            var cookie = document.cookie.split(';');
            log(cookie);
            var splitCookie = cookie[0].split ('Contents=');
            log(splitCookie);
            //Check if basketCookie is present, if yes, split items by comma.
            basketCookie = readCookie('basketContents');
            if (basketCookie !== null) {
                var len = splitCookie[1].split(',').length - 1;
                log(len);
                return len; }
            return 0;
        }
        return 0;
    
        //numberOfCookies = len.length;
	
}