<script type="application/javascript" src="js/upload.js"></script>
	<div class="side">
		<video id="camera" width="640" height="480"></video>
	</div>
	<div class="side">
		<canvas id="canvas" width="640" height="480"></canvas>
	</div>
<br/>
<button id="capture">Capture</button>
<br>
<select size="2" multiple id="images">
	<option id ="o1">1</option>
	<option id="o2">2</option>
	<option id="o3">3</option>
</select>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="text" name="selectedImage" id="selectedImage">
    <button id="submit">Submit</button>