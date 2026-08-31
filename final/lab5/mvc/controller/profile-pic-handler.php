<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$tmp_location = $_FILES['profile_pic']['tmp_name'];
	$target_file_name = $_SESSION['username'] . '_' . $_FILES['profile_pic']['name'];
	$target_folder = __DIR__ . '/../images/';
	// .../images/profile.jpg
	$target_file_path = $target_folder . $target_file_name;
	// echo $target_file_path;

	if (move_uploaded_file($tmp_location, $target_file_path)) {
		echo "Images succesfully uploaded";
	} else {
		echo "Image upload failed";
	}

}