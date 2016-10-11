<?php

    class Validation
    {

        public static function check($login, $hash)
        {
			$db = Db::getInstance();
            $query = $db->prepare('SELECT id FROM tbl_users WHERE
				(username = :login OR email = :login) AND password = :hash;');
			$query->execute(array('login' => $login, 'hash' => $hash));
			$ret = $query->fetch();
			if (empty($ret)) {
				return 0;
			}
			else {
                return $ret["id"];
            }
        }

    }

 ?>
