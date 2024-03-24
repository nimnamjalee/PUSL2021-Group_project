<?php
session_start(); // Start session for storing logged-in user information

// Database connection
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "shoedb"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind statement
    $stmt = $conn->prepare("SELECT username, password FROM sign WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Store result
    $stmt->store_result();

    // Check if there is a match for the username
    if ($stmt->num_rows == 1) {
        // Bind result variables
        $stmt->bind_result($db_username, $db_password);

        // Fetch values
        $stmt->fetch();

        // Verify password
        if ($password === $db_password) {
            // Password is correct, set session variables
            $_SESSION['username'] = $username;

            // Redirect to cus.html
            header("Location: cus.html");
            exit();
        } else {
            // Password is incorrect
            echo "Invalid password.";
        }
    } else {
        // No match for the username
        echo "Invalid username.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
  <link href="styles.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4; /* Light background color */
}


.login-form {
    background-color: #ffffff; /* White background color for form */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
}

.login-form label {
    display: block;
    margin-bottom: 5px;
}

.login-form input[type="text"],
.login-form input[type="password"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.login-form input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background-color: #ff69b4; /* Pink color for button */
    color: #fff;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.login-form input[type="submit"]:hover {
    background-color: #e05a9f; /* Darker pink color on hover */
}
</style>
</head>
<body>
<div class="container-fluid">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light nav-fill">
        <a class="navbar-brand" href="index.html"><img src="images/57.png" alt="logo" width="160" height="70" class="d-block mx-auto rounded"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="adlogin.php">Admin</a>
                <a class="dropdown-item" href="log.php">Customer</a>
               
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbaDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="gal 1.html">Ladies</a>
                <a class="dropdown-item" href="gal 2.html">weddings</a>
                <a class="dropdown-item" href="gal 3.html">Mens</a>
                <a class="dropdown-item" href="gal 4.html">kids</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="serv.php">Other Adds</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="comment.php">Comments</a>
            </li>
            <li>
              <a class="nav-link" href="galon.html">
                <button>Give Your Sandal Details</button>
              </a>
            </li>
          </ul>
        </div>
      </nav><br><br>
    <h2 style="text-align: center">Login</h2>
  <div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"class="login-form">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
<h1>sign up</h1>
 <a class="nav-link" href="sign.php">
                <button>sign</button>
              </a>
</div></div></div>
<script src="js/jquery-3.4.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>