<?php
include '../db/db.php';
class User {
	public function loginCheck($username, $password) {
		$sql = 'SELECT * FROM users WHERE username = $username';
		$db = new DBConnection();
		$conn = $db->connect();
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if ($row['password'] == $password) {
					// login succesful	
					return true;
				} else {
					// invalid password
					return false;
				}
			}
		} else {
			// invalid username
			return false;
		}
	}
}