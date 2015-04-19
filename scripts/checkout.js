/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var numberOfItems = 0;
var items = [];
var basket = document.getElementById("numberInBasket");
var totalCost = 0;
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
    console.log(localStorage);
    //loadShoppingBasket();
    if (localStorage.length !== 0) getShoppingBasket();
    
}

// For every item in the shopping basket, append a new table row as a child, and
// fill with information from the database. (AJAX?)
// Update the cost of these items, and show a message id no items are in basket.
function loadShoppingBasket(){
    var table = document.getElementById("tableOfItems");
    var whileLoop = 0;
    
    
    document.getElementById("totalCost").innerHTML = "£" + totalCost;
    
    if (numberOfItems === 0) {
        document.getElementById("tableOfItems").id= "hide";
    }
    
    else {
        document.getElementById("noItemMessage").id= "hide";
    // While Loop: (Cycle through all basket elements)
    while (whileLoop < numberOfItems) {
    var newRow = table.insertRow(whileLoop + 1);
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    cell1.className = "BasketImage";
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);
    
    var imageURL = "/WebscriptSite/images/item1.png";
    var image = document.createElement("IMG");
    image.src = imageURL;
    
    //cell1.innerHTML = "Item Image";
    cell2.innerHTML = "Secateurs";
    cell1.appendChild(image);
    cell3.innerHTML = "£24.99";
    cell4.innerHTML = "1";
    cell5.innerHTML = "Remove";
    whileLoop++;
    }
}
}

//New, replacement code to create a basket that loads items from cookies.
function getShoppingBasket() {
    var inBasket = getItems();
    console.log(inBasket);
    var basketContents = inBasket;
    items = basketContents;
    var ajaxObj = new XMLHttpRequest();
    
    ajaxObj.onreadystatechange = function()
    {if (ajaxObj.status === 200)
        if (ajaxObj.readyState === 4) {
     document.getElementById("basketSection").innerHTML = ajaxObj.responseText;
     document.getElementById("submitOrder").addEventListener('click', createOrder, true);
     //createHiddenForms();
      console.log("Basket Pulled Successfully"); }
    };
    ajaxObj.open("POST", '/WebscriptSite/assets/database/getBasket.php', true);
    ajaxObj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    ajaxObj.send(basketContents);
}

//Get items from local storage, and add them to an array of itemIDs to be posted
//to php by getSHoppingBasket(). Adds the nessessary grammar for sql to read.
function getItems() {
    var itemsFound = 0;
    var itemList = "item=(";
    var i = 1;
    
    while (itemsFound < numberOfItems) {
        var currentItem = localStorage.getItem("item"+i);
        if (currentItem === null) {i++;}
        else {
            if (i === 1) {{itemList = itemList + currentItem;}}
            else {itemList = itemList + "," + currentItem;}
            i++;
            itemsFound++;
            items.push(currentItem);
        }
    }
    itemList = itemList + ")";
    //Check that the string does not contain a comma before the first number.
    itemList = itemList.replace('(,', '(');
    toSend = [itemList];
    return toSend;
    log(localStorage.getItem("item1"));
}

//Remove item from the shooping basket storage
function removeFromStorage(itemToRemove) {
    localStorage.removeItem(itemToRemove);
}

//Update the shopping basket to reflect the items the user has added to basket.
function updateBasket() {
    numberOfItems = localStorage.length;
    if (numberOfItems === 1) basket.innerHTML = ("You Have " + numberOfItems + " Item In Your Basket");
    else basket.innerHTML = ("You Have " + numberOfItems + " Items In Your Basket");
    //See whats in local storage;
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
    totalCost = 0;
}

function initLocalStorage() {
    if(typeof(Storage) !== "undefined") {
    return true;    
    }
    else { //log("noSystemStorage");
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
        console.log(localStorage.getItem("item"+String(i)));
        i++;
    }
    console.log(localStorage.getItem("item"+String(1)));
}

//Gets the item ID from the removed button, and seaches through localstorage for
//the key, then removes the key-value pair from local storage.
function removeItem(event) {
    event.preventDefault();
    var itemID = event.target.id;
    var sure = confirm("Are you sure you want to delete item#" + itemID +"?");
    log(itemID);
    if (sure) {
        
        for(var i=0, len=localStorage.length; i<len; i++) {
        var key = localStorage.key(i);
        var value = localStorage[key];
        if(value === (itemID)) {
        console.log(key);
        removeFromStorage(key);
        location.reload();
        }
        }
        
        
    }
    
}

function clearNameText(){
    document.getElementById("searchForName").value="";
}

function createOrder() {
    var order = [];
    var itemNumber = 1;
    var recip = document.getElementById("recipient").value;
    var lineOne = document.getElementById("lineOne").value;
    var lineTwo = document.getElementById("lineTwo").value;
    var county = document.getElementById("county").value;  
    var postcode = document.getElementById("PostCode").value;
    var item1name = document.getElementById("name1").innerHTML;
    var item1price = document.getElementById("price1").innerHTML;
    item1price = item1price.replace("£", "");
    var item1quantity = document.getElementById("quantity1").innerHTML;
    console.log(item1name);
    
    if (lineTwo !== "") {var address = lineOne + "," + lineTwo + "," + county + "," + postcode;}
    else {var address = lineOne + "," + county + "," + postcode;}
    order.push("item" + itemNumber + "=" +item1name, "item1price=" + item1price, "item1quantity=" + item1quantity, "recipient=" +recip ,"address=" + address);
    log(order);
    
    var ajaxObj = new XMLHttpRequest();
    
    ajaxObj.onreadystatechange = function()
    {if (ajaxObj.status === 200)
        if (ajaxObj.readyState === 4) {
      
      console.log(ajaxObj.responseText);
      console.log("Order Sent"); }
    };
    ajaxObj.open("POST", '/WebscriptSite/customer/orderConfirm.php', true);
    ajaxObj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    ajaxObj.send(order);
    
}
