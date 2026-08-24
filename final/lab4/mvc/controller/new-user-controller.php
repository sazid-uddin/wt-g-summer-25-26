<?php
require_once __DIR__ . '/../model/User.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$new_username = $_POST['username'];
	$new_email = $_POST['email'];
	$new_password = $_POST['password'];

	$user = new User();
	$result = $user->insertUser($new_username, $new_email, $new_password);
	// var_dump($result);
	if (is_int($result)) {
		$usersList = $user->getAllUsers();
		$_SESSION['usersList'] = $usersList;
		unset($_SESSION['insert_error']);
		header('Location: ../');
	} else {
		$_SESSION['insert_error'] = 'Unable to create new user: ' . $result;
		header('Location: ../');
	}

}