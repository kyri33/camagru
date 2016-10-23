<?php

    class Gallery {

        public static function getTotal() {
            $db = Db::getInstance();
            $query = $db->prepare('SELECT COUNT(id) as total FROM tbl_posts;');
            $query->execute();
            $ret = $query->fetch();
            return intval($ret['total']);
        }
        
        public static function getPosts($pageNum) {
            $pageNum -= 1;
            $begin = $pageNum * 5;
            $db = Db::getInstance();
            $query = $db->prepare("SELECT id, (SELECT username FROM tbl_users
                WHERE tbl_users.id = tbl_posts.userId) AS username, image, 
                (SELECT COUNT(tbl_likes.id) FROM tbl_likes
                WHERE postId = tbl_posts.id) as likes FROM tbl_posts ORDER BY id DESC LIMIT $begin, 5;");
            $query->execute();
            $ret = $query->fetchAll();
            return $ret;
        }

        public static function like($userId, $postId) {
            $db = Db::getInstance();
            $query = $db->prepare("INSERT INTO tbl_likes (userId, postId)
                VALUES(:user_id, :post_id);");
            $query->execute(array('user_id' => $userId, 'post_id' => $postId));
            return 1;
        }

        public static function unlike($userId, $postId) {
            $db = Db::getInstance();
            $query = $db->prepare("DELETE FROM tbl_likes WHERE userId = :userId
                AND postId = :postId;");
            $query->execute(array('userId'=>$userId, 'postId'=>$postId));
            return 1;
        }

        public static function getComments($postId) {
            $db = Db::getInstance();
            $query = $db->prepare("SELECT tbl_users.username, comment FROM tbl_comments LEFT JOIN tbl_users
                ON tbl_comments.userId = tbl_users.id WHERE postId = :postId ORDER BY tbl_comments.id DESC;");
            $query->execute(array('postId'=>$postId));
            $ret = $query->fetchAll();
            return $ret;
        }

        public static function comment($userId, $comment, $postId) {

            $db = Db::getInstance();
            $query = $db->prepare("INSERT INTO tbl_comments (userId, postId, comment)
                VALUES(:userId, :postId, :comment);");
            $query->execute(array('userId'=>$userId, 'postId'=>$postId, 'comment'=>$comment));

            return 1;
        }
    }

 ?>
