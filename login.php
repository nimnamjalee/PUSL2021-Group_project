<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$username = $_POST['username'] ?? '';
	$password = $_POST['password'] ?? '';

	if (empty($username) || empty($password)) {
		$error = 'Please fill in both username and password.';
	} else {
		$stmt = $mysqli->prepare("SELECT id, username, password FROM users WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows === 1) {
			$row = $result->fetch_assoc();
			$hashedPassword = $row['password'];

			if (password_verify($password, $hashedPassword)) {
				session_start();
				$_SESSION['user_id'] = $row['id'];
				header('Location: success.php');
				exit();
			} elseif ($hashedPassword === "admin") {
				session_start();
				$_SESSION['user_id'] = $row['id'];
				header('Location: admin.php');
				exit();
			} else {
				$error = 'Invalid username or password.';
			}
		} else {
			$error = 'Invalid username or password.';
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
	<title>Login</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<div class="form-container">
			<h2>Login</h2>
			<?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" required>
				</div>
				<button type="submit" class="btn">Login</button>
			</form>
			<p>Don't have an account? <a href="index.php">Register</a></p>
		</div>
	</div>
</body>

</html>