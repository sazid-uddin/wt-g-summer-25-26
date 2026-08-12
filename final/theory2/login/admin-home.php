<?php
session_start();
// check if logged in
if(!isset($_SESSION['username'])) {
	header("Location: login.php");
	// header("Location: error-403.php");
} else if ($_SESSION['role'] != 'admin') {
	header("Location: home.php");
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
	<h1>Hello admin, <?php echo $_SESSION['username'] ?></h1>	

	<form action="logout-handler.php" method="post">
		<input type="submit" value="Logout">
	</form>
</body>
</html>