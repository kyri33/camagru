window.addEventListener("load", function() {

	var camera = document.getElementById("camera");
	var play = document.getElementById("play");
	var pause = document.getElementById("stop");
	var constraints = {audio:false, video: true};
	function success(stream) {
		camera.src = window.URL.createObjectURL(stream);
		camera.play();
	}

	function failure(error) {
		alert(JSON.stringify(error));
	}

	if (navigator.mediaDevices && navigator.getUserMedia)
		navigator.getUserMedia(constraints, success, failure);
	else
		alert("Your browser does not support webcam");

	play.addEventListener("click", function() {
		camera.play();
	}, false);

}, false);