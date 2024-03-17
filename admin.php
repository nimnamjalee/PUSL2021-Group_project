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
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Admin Interface</title>
	<link rel="stylesheet" href="style_admin.css" />
</head>

<body>
	<div class="admin-container">
		<h1>Admin</h1>
		<div class="admin-name">Admin Name</div>
		<a href="">
			<div class="section">
				<h2>Manage Product</h2>
			</div>
		</a>
		<a href="">
			<div class="section">
				<h2>View Orders</h2>
			</div>
		</a>
		<a href="">
			<div class="section">
				<h2>Confirmed Orders</h2>
			</div>
		</a>
		<div class="separator"></div>
		<a href="logout.php" class="btn">Logout</a>
	</div>
</body>

</html>