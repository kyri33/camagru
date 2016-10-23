<h1>Forgot your password?</h1>
<h4>Enter you email below to reset your password</h4>

	<?PHP
        $errorMessage = "";
        if ($error == "mismatch")
            $errorMessage = "This email address does not correspond to an active account, please verify";
    ?>

    <p id="error"> <?PHP echo $errorMessage ?> </p>

<form action="index.php?controller=reset&action=fpass" method="POST">
	<input type="text" placeholder="Email" name="email">

	<input type="submit" value="Send reset link">
</form>