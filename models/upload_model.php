<?php

	class Upload {
		public static function add($image, $userId) {
			$db = Db::getInstance();
			$query_upload = $db->prepare("INSERT INTO tbl_posts(userId, image)
				VALUES(:userId, :image);");
			$data = $image;
			list(, $data) = explode(',', $data);
			$name = rand(1000, 9999);
			file_put_contents('images/'.$name.'.png', base64_decode($data));
			$query_upload->execute(array('userId' => $userId, 'image' => $name));
			return 1;
		}
	}

?>