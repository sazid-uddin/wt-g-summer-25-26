<?php
session_start();
// check session
// ...

// collect users list from session
$usersList = $_SESSION['usersList'];
?>

<html>

<head>
	<title>MVC Demo</title>
</head>

<body>
	<h1>MVC Demo</h1>
	<h2>Hello, <?php echo $_SESSION['username'] ?></h2>
</body>
<style>
	table,
	th,
	td {
		border: 1px solid black;
		border-collapse: collapse;
		padding: 5px 10px;
	}
</style>

<!-- User list from DB -->
<table>
	<a href="./view/create.php">Create New User</a>
	<br>
	<br>
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Email</th>
		<th>Created At</th>
		<th>Actions</th>

	</tr>
	<?php
	for ($i = 0; $i < count($usersList); $i++) {
		$id = $usersList[$i]['id'];
		$username = $usersList[$i]['username'];
		$email = $usersList[$i]['email'];
		$created_at = $usersList[$i]['created_at'];

		$id_td = "<td>$id</td>";
		$username_td = "<td>$username</td>";
		$email_td = "<td>$email</td>";
		$created_at_td = "<td>$created_at</td>";

		// action buttons
		$edit = "<form action='./controller/edit'> <input type='hidden' name='id' value='$id'><input type='submit' value='Edit'> </form>";
		$delete = "<form action='./controller/delete'> <input type='hidden' name='id' value='$id'> <input type='submit' value='Delete'> </form>";
		$action_td = "<td> $edit $delete </td>";

		$row = "<tr> $id_td $username_td $email_td $created_at_td $action_td </tr>";
		echo $row;
	}

	?>
</table>
<!-- <form action='./controller/edit' method="post"> 
	<input type='text' name='id' value='$id'>
	<input type='submit' value='Edit'> 
</form> -->
<?php
if (isset($_SESSION['insert_error'])) {
	echo $_SESSION['insert_error'];
}
?>
<br>
<br>

<form action="./controller/logout-handler.php" method="post">
	<input type="submit" value="Logout">
</form>

</html>