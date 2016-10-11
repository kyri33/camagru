<?php

    class SignUp {

        public static function add($username, $email, $password) {

            $db = Db::getInstance();
            $query_match = $db->prepare("SELECT id FROM tbl_users WHERE
                username = :username;");
            $query_match->execute(array('username' => $username));
            $ret = $query_match->fetch();
            if (!empty($ret))
                return 0;
            else
            {
                $hash = hash("whirlpool", "kyriakos".$password);
                $query_insert = $db->prepare("INSERT INTO tbl_users (username, email, password)
                    VALUES (:username, :email, :password);");
                $query_insert->execute(array('username' => $username, 'email' => $email, 'password' => $hash));
                return 1;
            }
        }
    }
 ?>
