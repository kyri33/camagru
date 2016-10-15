window.addEventListener("load", function() {

	var camera = document.getElementById("camera");
	var capture = document.getElementById("capture");
	var canvas = document.getElementById(("canvas"));
	var context = canvas.getContext("2d");
	var constraints = {audio:false, video: true};

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
		context.drawImage(camera, 0, 0, 640, 480);
	});

	document.getElementById('form').addEventListener("submit",function(){
		console.log("Come on");
      var image = canvas.toDataURL(); // data:image/png....
      document.getElementById('fileToUpload').value = image;
      console.log("added");
   },false);

}, false);