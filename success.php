<?php
session_start();

if (!isset($_SESSION['user_id'])) {
	header('Location: login.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Success</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<div class="success-container">
			<h2>Login Success</h2>
			<p>You have successfully logged in.</p>
			<a href="logout.php" class="btn">Logout</a>
		</div>
	</div>
</body>

</html>