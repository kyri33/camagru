<h1 id="top-heading">Log in</h1>

<div id="center-box">

	<?php
		$errorMessage = "";
		if ($error == "incorrect")
			$errorMessage = "There was an error loggin in. Please make sure your credentials are correct and your account is verified";
	?>

	<p> <?php echo $errorMessage ?> </p>

<form class="validation-form" action="index.php?controller=validation&action=login" method="post">
	<ul>
	<li><input type="text" placeholder="username/emaill" name="login" value="" /></li>
	<li><input type="password" name="password" placeholder="password" /></li>
	<li><input id="submit" type="submit" value="Log In" name="submit" /></li>
	</ul>
</form>
<a href="index.php?controller=reset&action=fpass">Forgot Password</a>
</div>
