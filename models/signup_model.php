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
                $protect = hash("whirlpool", "kyriakos".rand(0, 1000));
                $query_insert = $db->prepare("INSERT INTO tbl_users (username, email, password, protect)
                    VALUES (:username, :email, :password, :protect);");
                $query_insert->execute(array('username' => $username, 'email' => $email, 'password' => $hash, 'protect' => $protect));
                $from = "From: noreply@camagru.co.za"."\r\n";
                $subject = "Camagru Account Verificateion";
                $url = "http://localhost:8080/camagru/index.php?controller=signup&action=verify&protect=".$protect;
                $message = "Thank you for signing up to camagru. Click here to verfiy your account ".$url;
                mail($email, $subject, $message, $from);
                return 1;
            }
        }

        public static function verify($protect)
	{
		    $db = Db::getInstance();
		    $query_match = $db->prepare("SELECT id FROM tbl_users WHERE protect = :protect;");
		    $query_match->execute(array('protect' => $protect));
		    $ret = $query_match->fetch();
		    if (empty($ret))
			    return 0;
		    else
		    {
			    $query_insert = $db->prepare("UPDATE tbl_users SET protect = '1' WHERE protect = :protect;");
			    $query_insert->execute(array('protect' => $protect));
			    return 1;
		    }
	    }
    }
 ?>
