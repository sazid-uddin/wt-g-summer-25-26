<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Page Title</title>
	<link rel='stylesheet' href='main.css'>
</head>
<body>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px 10px;
		}
	</style>
	<h1>Hello, <?php echo $_SESSION['username'] ?></h1>	

	<h2>Create new user</h2>
	<form action="../controller/new-user-controller.php" method="post">
		Username: <input type="text" name="username" id="username">
		<br>
		Email: <input type="email" name="email" id="email">
		<br>
		Password: <input type="password" name="password" id="password">
		<br>
		<br>
		<input type="submit" value="Create">
	</form>

	<br>
	<br>
	<form action="./controller/logout-handler.php" method="post">
		<input type="submit" value="Logout">
	</form>
</body>
</html>
