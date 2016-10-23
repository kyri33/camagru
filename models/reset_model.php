<?php

    class ResetModel {
        public static function mail($email)
	{
		$db = Db::getInstance();
		$query_match = $db->prepare("SELECT id FROM tbl_users WHERE email = :email AND protect = '1';");
		$query_match->bindParam(":email", $email);
		$query_match->execute();
		//$query_match->execute(array('email' => $email));
		$ret = $query_match->fetch();
		if (empty($ret))
			return 0;
		else
		{
			$gen = rand(0, 9999999);
			$reset = hash('whirlpool', "kyriakos".$gen);
			$query_update = $db->prepare("UPDATE tbl_users SET reset = :reset WHERE email = :email;");
			$query_update->bindParam(":reset", $reset);
			$query_update->bindParam(":email", $email);
			$query_update->execute();
			//$query_insert->execute(array('reset' => $reset));
			
			$from = "From: noreply@camagru.co.za"."\r\n";
			$subject = "Camagru Reset Password";
			$url = "http://localhost:8080/camagru/index.php?controller=reset&action=verify&reset=".$reset;
			$message = "Hi there,\n\nPlease click on the following link to reset your password:\n".$url;
			mail($email, $subject, $message, $from);
			return 1;
		}
	}
	public static function verify($reset)
	{
		$db = Db::getInstance();
		$query_match = $db->prepare("SELECT id FROM tbl_users WHERE reset = :reset;");
		$query_match->bindParam(":reset", $reset);
		$query_match->execute();
		//$query_match->execute(array('reset' => $reset));
		$ret = $query_match->fetch();
		if (empty($ret))
			return 0;
		else
		{
			$query_update = $db->prepare("UPDATE tbl_users SET reset = '1' WHERE reset = :reset;");
			$query_update->bindParam(":reset", $reset);
			$query_update->execute();
			return 1;
		}
	}
	public static function check($login)
	{
		$db = Db::getInstance();
		$query_match = $db->prepare('SELECT id FROM tbl_users WHERE (username = :login OR email = :login) AND reset = "1";');
		$query_match->bindParam(":login", $login);
		$query_match->execute();
		$ret = $query_match->fetch();
		if (empty($ret))
			return 0;
		else
			return $ret["id"];
	}
    }

?>