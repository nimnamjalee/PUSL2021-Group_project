<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'] ?? '';
	$email = $_POST['email'] ?? '';
	$password = $_POST['password'] ?? '';

	if (empty($username) || empty($email) || empty($password)) {
		$error = 'Please fill in all fields.';
	} else {

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		$stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $username, $email, $hashedPassword);


		if ($stmt->execute()) {
			header('Location: login.php');
			exit();
		} else {
			$error = 'An error occurred while registering. Please try again.';
		}

		$stmt->close();
	}

	$mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<div class="form-container">
			<h2>Register</h2>
			<?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" id="email" name="email" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" required>
				</div>
				<button type="submit" class="btn">Register</button>
			</form>
			<p>Already have an account? <a href="login.php">Login</a></p>
		</div>
	</div>
</body>

</html>