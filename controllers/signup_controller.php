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
                else if (preg_match('/[A-Z][a-z][0-9]/', $password))
                    $error = "syntax";
                else if (strlen($password) < 8)
                    $error = "passwordlength";
                else if (strlen($email) < 4)
                    $error = "email";
                else if ($repeat != $password)
                    $error = "repeat";
                else if ($this->_check($username, $password, $email) == False)
                    $error = "match";
                else
                    $error = "verify";
            }

            require_once('views/signup.php');
        }

        private function _check($username, $password, $email) {
            if (SignUp::add($username, $email, $password) == 1)
                return True;
            else
                return False;
        }

        public function verify()
	    {
		    $protect = $_GET['protect'];
		
		    if (SignUp::verify($protect) == 1)
		    {
			    echo "Your account has been successfully verified, please sign in.";
			    header("refresh:2; url='index.php?controller=validation&action=login'");
		    }
		    else
		    {
			    echo "There was a problem verifying your account, please sign up again.";
			    header("refresh:2; url=index.php?controller=signup&action=show");
		    }
	    }

    }

 ?>
