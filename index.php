<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once($root.'/config/database.php');
	$page_title = "Home";

	//require_once($root.'/views/header.php');

	if (isset($_GET['controller']) && isset($_GET['action']))
	{
		$controller = $_GET['controller'];
		$action = $_GET['action'];
	} else {
		$controller = 'pages';
		$action = 'home';
	}
 ?>
