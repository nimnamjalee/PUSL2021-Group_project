<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
    <style>
       {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
 td{
	text-align: center;
		}

 td,  th {
  border: 1px solid #E3A6DD;
  padding: 8px;
}

 tr:nth-child(even){background-color: #EBB7F9;}

tr:hover {background-color: #ddd;}

 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #B346C7;
  color: white;
        }
    </style>
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet" type="text/css">
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
      </nav>
    <h1>Feedback Page</h1>
    
    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shoedb";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name = $_POST['name'];
        $feedback = $_POST['feedback'];

        
        if (empty($name) || empty($feedback)) {
            echo "<p>Please provide your name and feedback</p>";
        } else {
            
            $sql = "INSERT INTO comments (name, feedback) VALUES ('$name', '$feedback')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Thank you for your feedback!</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Display existing comments in a table
    $sql = "SELECT name, feedback ,created_at FROM comments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Existing Comments:</h2>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Feedback</th><th>Date</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"]. "</td><td>" . $row["feedback"]. "</td><td>" . $row["created_at"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No comments yet.</p>";
    }

    // Close database connection
    $conn->close();
    ?>
<div id="bo">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="feedback">Your Feedback:</label><br>
        <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</div>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap-4.4.1.js"></script>
</body>
</
