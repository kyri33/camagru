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
		case 'validation':
			require_once('modes/validation_model.php');
			$controller = new ValidationController();
			break;
		}

		$controller->{ $action }();
	}

	$controllers = array('pages' => ['home', 'error', 'about'],
						'signup' => ['show'],
						'validation' => ['login']);

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
