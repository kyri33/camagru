<?php

    class GalleryController {

        public function show() {

            $pageNum = intval($_GET['page']);
            require_once('views/gallery.php');
        }

        public function like() {

        }

    }

 ?>
