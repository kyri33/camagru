
<script type="application/javascript" src="js/upload.js"></script>

<div class="img">
 <input type="radio" name="filter" id="Pow"/>
   <label id='colourful' for="Pow"><img src="Pow.png" alt="Forest" width="300" height="200"></label>
 </a>
 <div class="desc">Pow</div>
</div>

<div class="img">
 <input type="radio" name="filter" id="Fire"/>
   <label id='colourful' for="Fire"><img src="Fire.png" alt="Forest" width="300" height="200"></label>
 </a>
 <div class="desc">Fire</div>
</div>

<div class="img">
 <input type="radio" name="filter" id="Hat"/>
   <label id='colourful' for="Hat"><img src="Hat.png" alt="Forest" width="300" height="200"></label>
 </a>
 <div class="desc">Hat</div>
</div>

<div class="img">
 <input type="radio" name="filter" id="Up"/>
   <label id='colourful' for="Up"><img src="Up.png" alt="Forest" width="300" height="200"></label>
 </a>
 <div class="desc">Up</div>
</div>

<div class="img">
 <input type="radio" name="filter" id="Cig"/>
   <label id='colourful' for="Cig"><img src="Cig.png" alt="Forest" width="300" height="200"></label>
 </a>
 <div class="desc">Cigarrette</div>
</div>

<div class="img">
 <input type="radio" name="filter" id="Face"/>
   <label id='colourful' for="Face"><img src="Face.png" alt="Forest" width="300" height="200"></label>
 </a>
 <div class="desc">Face</div>
</div>

<div class="img">
 <input type="radio" name="filter" id="Glasses"/>
   <label id='colourful' for="Glasses"><img src="Glasses.png" alt="Forest" width="300" height="200"></label>
 </a>
 <div class="desc">Filter Name</div>
</div>

</br>

<div class="img">
 <input type="radio" name="filter" id="LightningStrike"/>
   <label id='colourful' for="LightningStrike"><img src="LightningStrike.png" alt="Forest" width="300" height="200"></label>
 </a>
 <div class="desc">Lightning Strike</div>
</div>

<div class="side">
   <div id="camera-div" width="640" height="480">
     
          <video id="camera" width="640" height="480"></video>
     <img id="super-image" src="">
   </div>
        <div id="capture">
           <i class="fa fa-camera" aria-hidden="true"></i>
        </div>
       <div class="side">
            <canvas id="canvas" width="640" height="480"></canvas>
        </div>
    </div>
    <div>
        <input type="file" name="fileToUpload" id="fileToUpload">
       <input type="text" name="selectedImage" id="selectedImage">
        <div id="buts">
           <button id="submit">Submit</button>
        </div>
    </div>