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
            $query = $db->prepare("SELECT * FROM tbl_posts ORDER BY id DESC LIMIT $begin, 5;");
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
        }

        public static function getComments($postId) {
            
        }
    }

 ?>
