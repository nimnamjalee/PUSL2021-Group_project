<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoedb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // Prepare and bind SQL statement
    $sql = "INSERT INTO contact_details (first_name, last_name, home_address, email, message)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $first_name, $last_name, $home_address, $email, $message);

    // Escape user inputs to prevent SQL injection
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $home_address = $_POST['homeadd'];
    $email = $_POST['emailaddress'];
    $message = $_POST['message'];

    // Execute the statement
    if ($stmt->execute()) {
        // Success: Redirect to contact.html with success message
        header("Location: contact.html?status=success");
        exit();
    } else {
        // Error: Redirect to contact.html with error message
        header("Location: contact.html?status=error&message=" . urlencode($conn->error));
        exit();
    }
}

$conn->close();
?>
