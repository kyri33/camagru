<?php

	function call($controller, $action)
	{
		require_once($root.'/controllers/'.$controller'._controller.php');

		switch($controller) {
		case 'pages':
			$controller = new PagesController();
			break;
		}

		$controller->{$action}();
	}

	$controllers = array('pages' => ['home', 'error']);

	if (array_key

?>
