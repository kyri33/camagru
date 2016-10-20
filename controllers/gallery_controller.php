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
            $response["Success"] = 0;
            
            if (isset($_SESSION['logged_on_user']) && $_SESSION['logged_on_user'] != "") {
                if (Gallery::like($_SESSION['logged_on_user'], $_GET['id']) == 1)
                    $response['Success'] = 1;
            }
            echo json_encode($response);
        }

        public function unlike() {
            $response['Success'] = 0;
            if (Gallery::unlike($_SESSION['logged_on_user'], $_GET['id']) == 1)
                $response['Success'] = 1;
            echo json_encode($response);
        }

    }

 ?>
