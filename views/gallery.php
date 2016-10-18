<ul>
<?php
   foreach($posts as $post) {
       ?>
       <li><img src="<?php echo 'images/'.$post['image'].'.png';?>">
       <input type="checkbox" id="<?php echo $post['id']; ?>">
       <label for="<?php echo $post['id']; ?>">Like</label>
       </li>
   <?php } 
 ?>
 <ul>
