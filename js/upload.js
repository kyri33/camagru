window.addEventListener("load", function() {

	var camera = document.getElementById("camera");
	var capture = document.getElementById("capture");
	var canvas = document.getElementById(("canvas"));
	var context = canvas.getContext("2d");
	var constraints = {audio:false, video: true};
	var submit = document.getElementById("submit");
	var inputFile = document.getElementById("fileToUpload");

	var captured = false;

	function success(stream) {
		camera.src = window.URL.createObjectURL(stream);
		camera.play();
	}
//console.log("Check");
	function failure(error) {
		alert(JSON.stringify(error));
	}

	if (navigator.mediaDevices && navigator.getUserMedia)
		navigator.getUserMedia(constraints, success, failure);
	else
		alert("Your browser does not support webcam");

	capture.addEventListener("click", function() {
		captured = true;
		if (inputFile.value === "")
			console.log("nada");
		context.drawImage(camera, 0, 0, 640, 480);
	});

      //var image = canvas.toDataURL(); // data:image/png....

}, false);