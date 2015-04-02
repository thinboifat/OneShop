/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var numberOfItems = 0;
var items = [];
var basket = document.getElementById("numberInBasket");
//log(document.cookie);
initialise();


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
    var storage = initLocalStorage();
    if (storage) {
        log("Storage Is Supported");
    }
    updateBasket();
    //addToBasket("whey protien");
}

//Remove item from the shooping basket storage
function removeFromStorage(itemToRemove) {
    localStorage.removeItem(itemToRemove);
}

//Update the shopping basket to reflect the items the user has added to basket.
function updateBasket() {
    numberOfItems = lengthOfBasket();
    if (numberOfItems === 1) basket.innerHTML = ("You Have " + numberOfItems + " Item In Your Basket");
    else basket.innerHTML = ("You Have " + numberOfItems + " Items In Your Basket");
    readStorage();
}

function onChangeInStorage(storageEvent) {
    updateBasket();
    //alert(storageEvent.Id + "Added To Basket");
}

function clearStorage() {
    if (confirm("Are You Sure You Want To Empty Your Basket?") === true) {}
    else return;
    //remove cookies
    createCookie("basketContents", "");
    //remove storage
    localStorage.clear();
    updateBasket();
}

function initLocalStorage() {
    if(typeof(Storage) !== "undefined") {
    return true;    
    }
    else { log("noSystemStorage");
        return false;
    }
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

// Read how many items have been added to the basket. Split the cookie to access
// the basket contents, then split the list by numbe of commas to find the lenght.
// Take one away to allow for the extra comma. Return the length.
function lengthOfBasket() {
        if (document.cookie !== null) {
            var cookie = document.cookie.split(';');
            var splitCookie = cookie[0].split ('Contents=');
            //log(splitCookie);
            //Check if basketCookie is present, if yes, split items by comma.
            basketCookie = readCookie('basketContents');
            if (basketCookie !== null) {
                var len = splitCookie[1].split(',').length - 1;
                log(len);
                return len; }
            return 0;
        }
        return 0;
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

function readStorage() {
    if (numberOfItems === 0) return;
    i = 1;
    while (i <= numberOfItems) {
        log(localStorage.getItem("item"+String(i)));
        i++;
    }
    //log(localStorage.getItem("item"+String(1)));
}