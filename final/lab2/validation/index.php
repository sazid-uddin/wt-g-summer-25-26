<?php
// validation logic (do not run when page loads for the first time (GET method))
// validation logic (only run when form is submitted (POST method))

// echo $_SERVER['REQUEST_METHOD'] . "<br>";
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // if POST, then we can assume form was submitted
	$fullname = $_POST["fn"];

	// validation logic
	// full name should not be empty
	if (empty($fullname)) {
		// echo "Full name is required <br>";
		$errors['fn'] = "Full name is required <br>";
	} else if (strlen($fullname) < 3) {
		// echo "Full name is too short <br>";
		$errors['fn'] = "Full name is too short <br>";
	}

	// email validation - pattern check
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		// echo "Email pattern is invalid <br>";
		$errors['email'] = "Email pattern is invalid <br>";
	}

	// password validation - minimum length 6 chars
	if (strlen($_POST['password']) < 6) {
		// echo "Password is too weak <br>";
		$errors['password'] = "Password is too weak <br>";
	}

	// confirm password validation - needs to be equal to password
	if ($_POST['password'] != $_POST['confirm_password']) {
		// echo "Passwords do not match <br>";
		$errors['confirm_password'] = "Passwords do not match <br>";
	}
} else {
	echo "Form was not submitted <br>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<style>
		.error {
			color: red;
			font-size: smaller;
		}
	</style>
	<script>
		function validate() {
			// check rules
			// Rule no. 2
			// get the fullname input element -> get the element's value -> check the length of the value
			var fullnameInput = document.getElementById("fullname");
			if (fullnameInput.value.length < 3) {
				document.getElementById("fullname_error").innerText = "Name must be at least 3 characters";
				return false;
			}

			// Rule no. 3.5
			// get the email input element -> get the element's value -> check if value ends with aiub.edu
			var emailInput = document.getElementById("email");
			if (!emailInput.value.endsWith("aiub.edu")) {
				document.getElementById("email_error").innerText = "Email must end with aiub.edu";
				return false;
			}

			// Rule no. 4
			// get the password input element -> get the element's value -> check the length of the value
			var passwordInput = document.getElementById("password");
			if (passwordInput.value.length < 6) {
				document.getElementById("password_error").innerText = "Password must be at least 6 characters";
				return false;
			}

			// Rule no. 5
			var confirmPasswordInput = document.getElementById("confirm_password");
			console.log(passwordInput.value);
			console.log(confirmPasswordInput.value);
			if (passwordInput.value !== confirmPasswordInput.value) {
				document.getElementById("confirm_password_error").innerText = "Password and Confirm Password must match";
				return false;
			}

			return true;
			// sumitted to backend
		}
	</script>
	<form onsubmit="return validate()" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<!-- <form onsubmit="return true" action="wtg/final/lab2/index.php" method="post"> -->
		<label for="fullname">Fullname:</label>
		<input type="text" id="fullname" name="fn" value="<?php echo $_POST['fn'] ?>" />
		<?php if (isset($errors['fn'])) echo "<span class='error'>" . $errors['fn'] . "</span>" ?>
		<br />
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="<?php echo $_POST['email'] ?>" />
		<?php if (isset($errors['email'])) echo "<span class='error'>" . $errors['email'] . "</span>" ?>
		<br />
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" />
		<?php if (isset($errors['password'])) echo "<span class='error'>" . $errors['password'] . "</span>" ?>
		<br />
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password" />
		<?php if (isset($errors['confirm_password'])) echo "<span class='error'>" . $errors['confirm_password'] . "</span>" ?>
		<br />
		<input type="submit" value="Create Account" />
		<input type="reset" value="Reset Form" />
	</form>
</body>

</html>