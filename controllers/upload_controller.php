<?php

	class UploadController {

		public function show() {
			if (!isset($_SESSION["logged_on_user"]) || $_SESSION["logged_on_user"] == "")
				header('Location: index.php?controller=pages&action=error');
			else
				require_once('views/upload/upload.php');
		}

		public function upload() {
			$target_dir = "images";
			$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES['fileToUpload']['tmp_name']);
				if ($check !== false) {
					$uploadOk = 1;
				} else {
					echo "File is not an image";
					$uploadOk = 0;
				}
			}

			if ($_FILES['fileToUpload']['size'] > 500000) {
				echo "File is too big";
				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				echo "ERROR";
			} else {
				if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
					echo "file uploaded";
				} else {
					echo "Error uploading file";
				}
			}
		}
	}

?>