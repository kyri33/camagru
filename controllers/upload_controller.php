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
				$selectedImage = $_POST['selectedImage'];

				$finalImage = imagecreatetruecolor(640, 480);
				imagesavealpha($finalImage, true);
				$transparent = imagecolorallocatealpha($finalImage, 0, 0, 0, 127);
				imagefill($finalImage, 0, 0, $transparent);

				$selected = imagecreatefrompng($selectedImage.'.png');

				list(, $image) = explode(',', $image);
				$tmpName = rand(0, 1000);
				file_put_contents($tmpName.'.png', base64_decode($image));

				$main = imagecreatefrompng($tmpName.'.png');
				imagecopy($finalImage, $main, 0, 0, 0, 0, 640, 480);
				imagecopy($finalImage, $selected, 0, 0, 0, 0, 640, 480);

				ob_start();
					imagepng($finalImage);
					$contents = ob_get_contents();
				ob_end_clean();

				$image = "data:image/png;base64,".base64_encode($contents);

				if (Upload::add($image, $userId) == 1)
					echo json_encode(array("Success" => '1'));
				else
					echo "Failure";
				//unlink($tmpName.'.png');
				exit(1);
			}
		}
	}

?>