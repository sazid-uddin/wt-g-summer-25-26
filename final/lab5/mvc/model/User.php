<?php
require_once __DIR__ . '/../db/db.php';
class User {
	public function establishConnection() {
		$db = new DBConnection();
		$conn = $db->connect();
		return $conn;
	}
	public function insertUser($new_username, $new_email, $new_password) {
		// prepare your SQL statemetns
		$sql = "INSERT INTO users (username, email, password) VALUE (?, ?, ?)";
		// $sql = "INSERT INTO users (username, email, password) VALUE ('; DROP TABLE users;', 'somethi@gmail.com', '$new_password')";
		$conn = $this->establishConnection();
		$prepared_statement = $conn->prepare($sql);
		$prepared_statement->bind_param('sss', $new_username, $new_email, $new_username);
		$success = $prepared_statement->execute();
		// $success = $conn->query($sql);
		if ($success) {
			return $conn->insert_id;
		} else {
			$conn->error;
		}
	}
	public function getAllUsers() {
		$sql = "SELECT id, username, email, created_at FROM users;";
		$conn = $this->establishConnection();
		$result = $conn->query($sql);

		$usersList = [];
		if ( $result->num_rows > 0 ) {
			while ($row = $result->fetch_assoc()) {
				array_push($usersList, $row);
			}
			return $usersList;
		} else {
			return [];
		}
	}
	public function loginCheck($username, $password) {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		// echo '<br>' . $sql;
		$conn = $this->establishConnection();
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