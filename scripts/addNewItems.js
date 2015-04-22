/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// call initialization file
if (window.File && window.FileList && window.FileReader) {
	//init();
}

function init() {
    //handleDrop();
    //uploadImage();
    var fileselect = $id("fileselect"),
    filedrag = $id("filedrag");

    // file select
    fileselect.addEventListener("change", FileSelectHandler, false);

    // Check the clients browser can handle XML uploads
    var xhr = new XMLHttpRequest();
    if (xhr.upload) {
	
    // file drop
    filedrag.addEventListener("dragover", FileDragHover, false);
    filedrag.addEventListener("dragleave", FileDragHover, false);
    filedrag.addEventListener("drop", FileSelectHandler, false);
    filedrag.style.display = "block";
		
    
    
	}
    
}

// file drag hover
function FileDragHover(e) {
	e.stopPropagation();
	e.preventDefault();
	e.target.className = (e.type === "dragover" ? "hover" : "");
}

// file selection
function FileSelectHandler(e) {

	// cancel event and hover styling
	FileDragHover(e);

	// fetch FileList object
	var files = e.target.files || e.dataTransfer.files;

	// process all File objects
	for (var i = 0, f; f = files[i]; i++) {
		ParseFile(f);
                UploadFile(f);
	}

}

//Displays information about the file and its size.
function ParseFile(file) {

	Output(
		"<p>File information: <strong>" + file.name +
		"</strong> type: <strong>" + file.type +
		"</strong> size: <strong>" + file.size +
		"</strong> bytes</p>"
	);

        // display an image
		if (file.type.indexOf("image") === 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
				Output(
					"<p><strong>" + file.name + ":</strong><br />" +
					'<img src="' + e.target.result + '" /></p>'
				);
			}
			reader.readAsDataURL(file);
		}

		// display text
		if (file.type.indexOf("text") === 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
				Output(
					"<p><strong>" + file.name + ":</strong></p><pre>" +
					e.target.result.replace(/</g, "&lt;").replace(/>/g, "&gt;") +
					"</pre>"
				);
			}
			reader.readAsText(file);
		}
	
}

// upload JPEG and PNG files
function UploadFile(file) {

	var xhr = new XMLHttpRequest();
	if (xhr.upload && file.type === "image/jpeg") {
            // create progress bar
		var o = $id("progress");
		var progress = o.appendChild(document.createElement("p"));
		progress.appendChild(document.createTextNode("upload " + file.name));
            // progress bar
		xhr.upload.addEventListener("progress", function(e) {
			var pc = parseInt(100 - (e.loaded / e.total * 100));
			progress.style.backgroundPosition = pc + "% 0";
		}, false);
            // file received/failed
		xhr.onreadystatechange = function(e) {
			if (xhr.readyState === 4) {
				progress.className = (xhr.status === 200 ? "success" : "failure");
			}
		};
            // start upload
		xhr.open("POST", $id("upload").action, true);
		xhr.setRequestHeader("X_FILENAME", file.name);
		xhr.send(file);
        
        }
        if (xhr.upload && file.type === "image/png") {
            // create progress bar
		var o = $id("progress");
		var progress = o.appendChild(document.createElement("p"));
		progress.appendChild(document.createTextNode("upload " + file.name));
            // progress bar
		xhr.upload.addEventListener("progress", function(e) {
			var pc = parseInt(100 - (e.loaded / e.total * 100));
			progress.style.backgroundPosition = pc + "% 0";
		}, false);
            // file received/failed
		xhr.onreadystatechange = function(e) {
			if (xhr.readyState === 4) {
				progress.className = (xhr.status === 200 ? "success" : "failure");
			}
		};
            // start upload
		xhr.open("POST", $id("upload").action, true);
		xhr.setRequestHeader("X_FILENAME", file.name);
		xhr.send(file);
        }
}

// getElementById
function $id(id) {
	return document.getElementById(id);
}

//
// output information
function Output(msg) {
	var m = $id("messages");
	m.innerHTML = msg + m.innerHTML;
}

function handleDrop() {
 var dropzone = document.getElementById("imageDropzone");
 dropzone.addEventListener("dragenter", reachedDropzone, false);
 document.addEventListener("dragenter", showDraggableArea, false);
 document.addEventListener("dragstart", showDraggableArea, false);
 document.addEventListener("dragend", hideDraggableArea, false);
 document.addEventListener("dragleave", hideDraggableArea, false);
 document.addEventListener("drop", onImageDrop, false);
 
}

//Handles the upload when submit is used. A event listener is NOT used, as the 
//id of upload box will change when drag and drop is used.
function uploadImage() {
        var uploadForm = document.getElementById("addToDBForm");
        var fileSelector = document.getElementById("imageDropzone");
        var submitButton = document.getElementById("submitToDB");
        
        uploadForm.onsubmit = function(event) {
            event.preventDefault();
            submitButton.innerHTML = "Uploading to Database...";
            
            //Before uploading images, add the product info to the database.
            addDetailsToDatabase();
        
        // Get the file from the input form.
        var files = fileSelector.files;
        // Create a new FormData object.
        var formData = new FormData();
        
        // Loop through each of the selected files.
        for (var i = 0; i < files.length; i++) {
        var file = files[i];
        
        // Check the file type.
        if (!file.type.match('image.*')) {
        continue;
        }
        
            // Add the file to the request.
            formData.append('photos[]', file, file.name);
        }
            // Set up the request.
            var xhr = new XMLHttpRequest();
            
            // Open the connection.
            xhr.open('POST', '/WebscriptSite/scripts/uploadImage.php', true);
            xhr.setRequestHeader("X_FILENAME", file.name);
            xhr.send(file);

            // Set up a handler for when the request finishes.
            xhr.onload = function () {
            if (xhr.status === 200) {
                // File(s) uploaded.
                submitButton.innerHTML = 'Submit';
                //Clear Tables
                refreshAfterSuccess();
            } else {
                alert('An error occurred!');
                submitButton.innerHTML = 'Submit';
            }
            };
            // Send the Data.
            xhr.send(formData);
        
    };
}

//Add the submitted data to the product database.
function addDetailsToDatabase(){
    
}

function refreshAfterSuccess() {
    alert('Items added To Database Successfully.');
}

function hideDraggableArea() {
    log("dropped");
}

function showDraggableArea() {
    log("drag started");
    if (document.getElementById("imageDropzone")) {
    document.getElementById("imageDropzone").id = "imageDropzoneActive";
    }
}

function reachedDropzone() {
    log("dragged over dropzone");
}

function onImageDrop(e) {
    log("drop has fired");
    preventDefault(e);
    if (document.getElementById("imageDropzoneActive")) {
    document.getElementById("imageDropzoneActive").id = "imageDropzone";
    }
    e.dataTransfer.dropEffect = 'copy';
    
    // fetch FileList object
    var uploadFiles = e.target.files || e.dataTransfer.files;
    	log(uploadFiles);
    // process all File objects
    for (var i = 0, f; f = uploadFiles[i]; i++) {
    ParseFile(f);
    }
    
}
  
function ParseFile(file) {
    
	Output(
		"<p>File information: <strong>" + file.name +
		"</strong> type: <strong>" + file.type +
		"</strong> size: <strong>" + file.size +
		"</strong> bytes</p>"
	);
        	// display an image
	if (file.type.indexOf("image") === 0) {
		var reader = new FileReader();
		reader.onload = function(e) {
			Output(
				"<p><strong>" + file.name + ":</strong><br />" +
				'<img src="' + e.target.result + '" /></p>'
			);
		};
		reader.readAsDataURL(file);
                }
}

function preventDefault(e) {
    e.stopPropagation();
    e.preventDefault();
}

//Refresh the scripts to apply to new elements created after the user adds a new
// item to the database;
function refresh() {
    
}

//ondrop="addBasketDrop(event)" ondragover="allowImageDrop(event)"

//Log a message to the console for testing purposes
function log(text) {
    console.log(text);
}