<?php

	class UploadController {

		public function show() {
			if (!isset($_SESSION["logged_on_user"]) || $_SESSION["logged_on_user"] == "")
				header('Location: index.php?controller=pages&action=error');
			else
				require_once('views/upload/upload.php');
		}
	}

?>