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
            $posts = Gallery::getPosts($pageNum - 1);
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
            $response['Success'] = '0';
            if (Gallery::unlike($_SESSION['logged_on_user'], $_GET['id']) == 1)
                $response['Success'] = '1';
            echo json_encode($response);
        }

        public function comment() {
            $response['Success'] = 0;
            $comment = $_POST['comment'];
            $postId = $_GET['id'];
            if (!isset($_SESSION['logged_on_user']) || $_SESSION['logged_on_user'] == "") {
                die(json_encode($response));
            }
            if (Gallery::comment($_SESSION['logged_on_user'], $comment, $postId) == 1)
                $response['Success'] = '1';
            
            $email = Gallery::getEmail($postId);
            $from = "From: noreply@camagru.co.za"."\r\n";
            $subject = "One of your photos recieved a comment";
            $url = "http://localhost:8080/camagru/index.php?controller=gallery&action=show&page=1";
            $message = "Someone commented on your photo, Log in to view the comment ".$url;
            mail($email, $subject, $message, $from);
            echo(json_encode($response));
        }

    }

 ?>
