<h1>Password Reset</h1>
<h4>Complete the form below to reset your password</h4>

	<?PHP
        $errorMessage = "";
        //if ($error == "password_length")
            //$errorMessage = "Password must be at least 8 characters";
        if ($error == "password_syntax")
            $errorMessage = "Password must be at least 8 characters; and must contain at least one lower case letter, one upper case later and one number";
        else if ($error == "confirm")
            $errorMessage = "Passwords do not match";
        if ($error == 'incorrect')
            $errorMessage = "There seems to be a problem, kindly resubmit the forgot password form";
    ?>

    <p id="error"> <?PHP echo $errorMessage ?> </p>

<form action="index.php?controller=reset&action=npass" method="POST">
	<input type="text" placeholder="Email address" name="login">
	<input type="password" placeholder="New password" name="password">
	<input type="password" placeholder="Confirm new password" name="confirm">

	<input type="submit" value="Reset password">
</form>