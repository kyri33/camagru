<script type="application/javascript" src="js/gallery.js"></script>
<ul id="page-size">
<?php
   foreach($posts as $post) {
       $comments = Gallery::getComments($post['id']);
?>
       <li>
       <div>
       <img src="<?php echo 'images/'.$post['image'].'.png';?>">
       <label id="<?php echo 'likes'.$post['id'];?>"><?php echo $post['likes'];?></label><label> Likes</label>
       <input type="checkbox" onchange="like(this)" id="<?php echo $post['id']; ?>">
       <label for="<?php echo $post['id']; ?>"><i class="fa fa-heart" aria-hidden="true"></i></label>
       <div id="box">
       <div id="comment-box">
       <?php if (!empty($comments)) { ?>
            <ul id="<?php echo 'commentList'.$post['id']; ?>">
            <?php
                foreach($comments as $comment) {
            ?>
                <li>
                    <p id="user-name"><?php echo $comment['username']; ?> </p>
                    <p id="comment"><?php echo $comment['comment']; ?> </p>
                </li>
            <?php } ?>
            </ul>
            <?php } ?>
        <div id="comment-text">
            <div>       
                 <input type="text" id="<?php echo 'commentText'.$post['id']; ?>">
                 <button type="submit" class=".commentButton" id="<?php echo $post['id']; ?>" onclick="comment(this)">Comment</button>
            </div>
        </div>
        </div>
            </div>
        </div> 
       </li>
   <?php }
 ?>
 </ul>
<?php
    $nextPage = $pageNum + 1;
    $previousPage = $pageNum - 1;
    if ($pageNum > 1) {
        ?>
        <a href="<?php echo 'index.php?controller=gallery&action=show&page='.$previousPage;?>">Previous</a>
    <?php } ?>

<a href="<?php echo 'index.php?controller=gallery&action=show&page='.$nextPage;?>">Next</a>
