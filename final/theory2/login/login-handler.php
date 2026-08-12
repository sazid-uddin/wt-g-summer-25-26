<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Dummy DB Check
	// Real checks will look like this: SELECT * FROM users WHERE username = $username;
	$users = [ // indexed array
		["username" => "abc", "password" => "123", "role"=>"user"], // [0] associative array
		["username" => "xyz", "password" => "456", "role"=>"admin"] // [1] associative array
	];

	// login check logic
	// step 1: check if username exists in DB
	for ($i = 0; $i < count($users); $i++) {
		if ($users[$i]['username'] == $username) {
			// step 2: check if passwords match
			if ($users[$i]['password'] == $password) {
				// login successful
				unset($_SESSION['error_message']);
				$_SESSION['username'] = $users[$i]['username'];
				$_SESSION['role'] = $users[$i]['role'];

				if ($users[$i]['role'] == 'admin') {
					header("Location: admin-home.php");
				} else {
					header("Location: home.php");
				}
				exit();
			} else {
				// password did not match
				$_SESSION['error_message'] = "Username or Password is invalid";
				header("Location: login.php");
				exit();
			}
		}
	}
	// the following block needs to be stopped if username was found: use exit() function
	/////////////////////////////////////////////
	// username not found
	// $error_message = "Username is invalid";
	$_SESSION['error_message'] = "Username or Password is invalid";
	header("Location: login.php");
	exit();
	////////////////////////////////////////////

} else {
	header("Location: login.php");
}
