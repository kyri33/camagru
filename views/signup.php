

<h1 id="top-heading">Sign Up</h1>

<div id="center-box">

    <?php
        $errorMessage = "";
        if ($error == 'length')
            $errorMessage = "Username must be at least 3 characters";
        else if ($error == "syntax")
            $errorMessage = "Password must contain at least one lower case letter, one upper case later and one number";
        else if ($error == "passwordlength")
            $errorMessage = "Password must be at least 8 characters";
        else if ($error == "email")
            $errorMessage = "Please enter a valid email address.";
        else if ($error == "repeat")
            $errorMessage = "Passwords do not match";
        else if ($error == "match")
            $errorMessage = "Username already exists";
        else if ($error = "verify")
            $errorMessage = "A verification email has been sent to ".$email." please check your email to verify your account";
     ?>

     <p> <?php echo $errorMessage ?> </p>

<form class="validation-form" action="index.php?controller=signup&action=show" method="post">
    <ul>
    <li><input type="text" placeholder="username" name="username" value='<?php echo $username?>'/></li>
    <li><input type="password" name="password" placeholder="password" /></li>
    <li><input type="text" name="email" placeholder="email address" value='<?php echo $email ?>'/></li>
    <li><input type="password" name="repeat" placeholder="repeat password" /></li>
    <li><input id="submit" type="submit" value="Sign Up"/></li>
</ul>
</form>

</div>
