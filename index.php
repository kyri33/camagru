<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once('config/database.php');
	$page_title = "Home";

	if (isset($_GET['controller']) && isset($_GET['action']))
	{
		$controller = $_GET['controller'];
		$action = $_GET['action'];
	} else {
		$controller = 'pages';
		$action = 'home';
	}

	require_once('layout.php');
 ?>
