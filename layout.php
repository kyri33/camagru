<?php

	header("Content-Type: text/html");
	session_start();

?>

<html>
<head>
	<title><?php echo $page_title?></title>
	<link type="text/css" rel="stylesheet" href="css/theme.css">
</head>
<body>

<div id="top-nav">
	<div class="row">
	<ul id="top-menu">
		<li class="top-menu-item"><a href="index.php?controller=pages&action=home">Home</a></li>
		<li class="top-menu-item"><a href="index.php?controller=pages&action=about">About</a></li>
	</ul>
</div>
</div>

<?php require_once('routes.php'); ?>

</body>
</html>
