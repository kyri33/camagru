<?php

    class ValidationController {
		
		public function login()
		{
			if (!empty($_POST)) {
				$login = $_POST['login'];
				$hash = hash("whirlpool", "kyriakos".$_POST['password']);
				$id = Validation::check($login, $hash);
				if ($id != 0) {
					$_SESSION["logged_on_user"] = $id;
					header('Location: index.php');
				}
				$error = "incorrect";
			}
			require_once('views/login.php');
		}
    }

 ?>
