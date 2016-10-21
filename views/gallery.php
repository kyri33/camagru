<script type="application/javascript" src="js/gallery.js"></script>
<ul>
<?php
   foreach($posts as $post) {
       $comments = Gallery::getComments($post['id']);
?>
       <li><img src="<?php echo 'images/'.$post['image'].'.png';?>">
       <label id="<?php echo 'likes'.$post['id'];?>"><?php echo $post['likes'];?></label><label> Likes</label>
       <input type="checkbox" onchange="like(this)" id="<?php echo $post['id']; ?>">
       <label for="<?php echo $post['id']; ?>">Like</label>
       <div id="comment-box">
       <?php if (!empty($comments)) { ?>
            <ul id="comment-list">
            <?php
                foreach($comments as $comment) {
            ?>
                <li>
                    <p id="user-name"><?php echo $comment['userName']; ?> </p>
                    <p id="comment"><?php echo $comment['comment']; ?> </p>
                </li>
            <?php } ?>
            </ul>
            <?php } ?>
       </div>
       </li>
   <?php }
 ?>
 </ul>
