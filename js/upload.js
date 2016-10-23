window.addEventListener("load", function() {

    var camera = document.getElementById("camera");
    var capture = document.getElementById("capture");
    var canvas = document.getElementById(("canvas"));
    var context = canvas.getContext("2d");
    var constraints = {audio:false, video: true};
    var submit = document.getElementById("submit");
    var inputFile = document.getElementById("fileToUpload");
    var captured = false;
    var selected = null;
    var selectedImage = document.getElementById('super-image');
    selectedImage.style.visibility = "hidden";

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
        if (selected != null) {
            captured = true;
            context.drawImage(camera, 0, 0, 640, 480);
            console.log(selected);
        }
    });

        var radios = document.getElementsByName('filter');
        for (var i = 0; i < radios.length; i++) {
            radios[i].addEventListener("click", function() {
                selected = this.id;
                selectedImage.src = this.id + '.png';
                selectedImage.style.visibility = 'visible';
            }, false );
        }

    inputFile.addEventListener('change', function() {
        var reader = new FileReader();
        reader.onload = function(event) {
            var img = new Image();
            img.onload = function () {
                context.drawImage(img, 0, 0);
            }
            img.src = event.target.result;
        }
        reader.readAsDataURL(inputFile.files[0]);
    });

    submit.addEventListener("click", function() {
        if (inputFile.value != "" || captured == true) {
            var image = canvas.toDataURL();
            var http = new XMLHttpRequest();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    console.log(response.Success);
                    alert("Image successfully uploaded");
                }
            };
            var data = new FormData();
            data.append('fileToUpload', image);
            data.append('selectedImage', selected);
            http.open("POST", "index.php?controller=upload&action=upload&type=json", true);
            http.send(data);
        }
    });

}, false);