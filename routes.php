<?php

	function call($controller, $action)
	{
		require_once('controllers/'.$controller.'_controller.php');
		switch($controller) {
		case 'pages':
			$controller = new PagesController();
			break;
		case 'signup':
			require_once('models/signup_model.php');
			$controller = new SignUpController();
			break;
		}

		$controller->{ $action }();
	}

	$controllers = array('pages' => ['home', 'error', 'about'],
						 'signup' =>['show']);

	if (array_key_exists($controller, $controllers))
	{
		if (in_array($action, $controllers[$controller]))
			call($controller, $action);
		else
			call('pages', 'error');
	}
	else
		call('pages', 'error');

?>
