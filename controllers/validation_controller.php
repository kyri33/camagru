<?php

    class ValidationController {

		public function login()
		{
            $error = "";
			if (!empty($_POST)) {
				$login = $_POST['login'];
				$hash = hash("whirlpool", "kyriakos".$_POST['password']);
				$id = Validation::check($login, $hash);
				if ($id != 0) {
					$_SESSION["logged_on_user"] = $id;
					header('Location: index.php?controller=upload&action=show');
				}
				$error = "incorrect";
			}
			require_once('views/login.php');
		}

        public function logout() {
            $_SESSION['logged_on_user'] = "";
            header('Location: index.php');
        }
    }

 ?>
