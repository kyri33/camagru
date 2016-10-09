<?php

    class Validation()
    {

        public static function check($login, $pass)
        {

            $hash = hash("whirlpool", "kyriakos".$pass);
            $db = Db::getInstance();
            $query = $db->query('SELECT id FROM tbl_users WHERE
                (username = :login OR email = :login) AND password = :hash;');
            $query->execute(array('login' => $login, 'hash' => $hash));
            $ret = $query->fetch();
            if (empty($ret))
                return 0;
            else {
                return $ret["id"];
            }
        }

    }

 ?>
