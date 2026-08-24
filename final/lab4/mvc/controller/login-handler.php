<?php
require_once __DIR__ . '/../model/User.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// echo "login check beginning";
	// Check DB
	$user = new User();
	$loginSuccess = $user->loginCheck($username, $password);
	// echo "login check succeeded";
	// var_dump($loginSuccess);

	if ($loginSuccess) {
		$_SESSION['username'] = $username;
		// collect data for homepage
		$usersList = $user->getAllUsers();
		$_SESSION['usersList'] = $usersList;
	} else {
		$_SESSION["login_error"] = "Invalid username or password";
	}
	header("Location: ../");
}
?>