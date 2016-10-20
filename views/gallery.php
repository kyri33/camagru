<script type="application/javascript" src="js/gallery.js"></script>
<ul>
<?php
   foreach($posts as $post) {
       ?>
       <li><img src="<?php echo 'images/'.$post['image'].'.png';?>">
       <input type="checkbox" onchange="like(this)" id="<?php echo $post['id']; ?>">
       <label for="<?php echo $post['id']; ?>">Like</label>
       </li>
   <?php }
 ?>
 <ul>
