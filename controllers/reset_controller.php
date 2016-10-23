<?php

    class ResetController {

        public function fpass()
	{
		$email = "";
		$error = "";
		if (!empty($_POST)) 
		{
			$email = $_POST['email'];
			if ($this->_check($email) == False)
				$error = "mismatch";
		}
		require_once('views/reset.php');
	}
	private function _check($email)
	{
		if (ResetModel::mail($email) == 1)
			return True;
		else
			return False;
	}
	public function verify()
	{
		$reset = $_GET['reset'];
		if (ResetModel::verify($reset) == 1)
		{
			echo "Hmmm...maybe let's try something you can remember this time :/";
			header("refresh:2; url='index.php?controller=reset&action=npass'");
		}
		else
		{
			echo "It seems that there may have been a problem, kindly re-verify your email address.";
			header("refresh:2; url=index.php?controller=reset&action=fpass");
		}
	}
	public function npass()
	{
		$error = "";
		
		if (!empty($_POST))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			$confirm = $_POST['confirm'];
			if (!(preg_match('/[A-Z][a-z][0-9]/', $password)) && strlen($password) < 8)
					$error = "password_syntax";
			else if ($confirm != $password)
					$error = "confirm";
			$id = ResetModel::check($login);
			if ($id != 0)
			{
				$hash = hash("whirlpool", "kyriakos".$password);
				$db = Db::getInstance();
				$query_update = $db->prepare("UPDATE tbl_users SET password = :hash WHERE id = :id;");
				$query_update->bindParam(":hash", $hash);
				$query_update->bindParam(":id", $id);
				$query_update->execute();
			} else
			    $error = "incorrect";
		}
		require_once('views/npass.php');
	}

    }

?>