<?php
session_start();
?>

<html>

<head>
	<title>Profile</title>
</head>

<body>
	<style>
		#profile_pic {
			width: 100px;
			height: 100px;
		}
	</style>
	<h1>Profile</h1>

	<form action="../controller/profile-pic-handler.php" method="post" enctype="multipart/form-data">
		<input type="file" name="profile_pic" id="profile_pic">
		<input type="submit" value="Upload">	
	</form>
	
	<p>Username: <?php echo $_SESSION['username'] ?></p>
	<a href="../">Back to Home</a>

</html>