<?php
require 'User.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Check username and password against DB
	$user = new User();
	$loginSuccess = $user->loginCheck($username, $password);

	if($loginSuccess) {
		// create session and load home page
	} else {
		// go back to login page with error message
	}
} else {
	// back to login page
}