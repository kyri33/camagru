<?php

    class GalleryController {

        public function show() {
            $pageNum = intval($_GET['page']);
            $total = Gallery::getTotal();
            if ($total % 5 == 0)
                $totalPages = $total / 5;
            else 
                $totalPages = (int)($total / 5) + 1;
            if ($pageNum > $totalPages)
                $pageNum = 1;
            $posts = Gallery::getPosts($pageNum);
            require_once('views/gallery.php');
        }

        public function like() {

        }

    }

 ?>
