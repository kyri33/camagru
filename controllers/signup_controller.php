<?php

    class SignUpController {

        public function show() {
            $username = "";
            $error = "";
            $email = "";

            if (!empty($_POST)) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $repeat = $_POST['repeat'];

                if (strlen($username) < 3)
                    $error = "length";
                else if (preg_match('/[A-Za-z0-9]/', $password))
                    $error = "syntax";
                else if (strlen($password) < 8)
                    $error = "passwordlength";
                else if (strlen($email) < 4)
                    $error = "email";
                else if ($repeat != $password)
                    $error = "repeat";
                else if ($this->_check($username, $password, $email) == False)
                    $error = "match";
            }

            require_once('views/signup.php');
        }

        private function _check($username, $password, $email)

    }

 ?>
