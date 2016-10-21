<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once('config/database.php');
	$page_title = "Title";

	if (!isset($_SESSION["logged_on_user"]))
		$_SESSION["logged_on_user"] = "";

	if (isset($_GET['controller']) && isset($_GET['action']))
	{
		$controller = $_GET['controller'];
		$action = $_GET['action'];
	} else {
		$controller = 'pages';
		$action = 'home';
	}

	if (isset($_GET['type']) && $_GET['type'] == 'json') {
		header('Content-Type: application/json');
		require_once('routes.php');
	} else {
		require_once('layout.php');
	}
 ?>
