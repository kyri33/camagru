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
			require_once('models/validation_model.php');
			$controller = new ValidationController();
			break;
		case 'upload':
			require_once('models/upload_model.php');
			$controller = new UploadController();
			break;
		case 'gallery':
			require_once('models/gallery_model.php');
			$controller = new GalleryController();
			break;
		}

		$controller->{ $action }();
	}

	$controllers = array('pages' => ['home', 'error', 'about'],
						'signup' => ['show'],
						'validation' => ['login', 'logout'],
						'upload' => ['show', 'upload'],
						'gallery' => ['show', 'like', 'unlike']);

	if (array_key_exists($controller, $controllers))
	{
		if (in_array($action, $controllers[$controller]))
			call($controller, $action);
		else
			;
	}
	else
		;

?>
