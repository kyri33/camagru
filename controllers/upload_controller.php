<?php

	class UploadController {

		public function show() {
			if (!isset($_SESSION["logged_on_user"]) || $_SESSION["logged_on_user"] == "")
				header('Location: index.php?controller=pages&action=error');
			else
				require_once('views/upload/upload.php');
		}

		public function upload() {
			if (isset($_POST)) {
				$image = $_POST['fileToUpload'];
				$userId = $_SESSION["logged_on_user"];

				if (Upload::add($image, $userId) == 1)
					echo json_encode(array("Success" => '1'));
				else
					echo "Failure";
			}
		}
	}

?>