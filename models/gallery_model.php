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
    }

 ?>
