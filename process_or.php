<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $category = htmlspecialchars($_POST['category']);
    $address = htmlspecialchars($_POST['address']);
    $pn = htmlspecialchars($_POST['pn']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $size = floatval($_POST['size']);
    $s1 = floatval($_POST['s1']);
    $materialColor = htmlspecialchars($_POST['materialColor']);
    $costume = htmlspecialchars($_POST['costume']);
    $heel = htmlspecialchars($_POST['heel']);
    $hyperlink = htmlspecialchars($_POST['hyperlink']);
    $detail = htmlspecialchars($_POST['detail']);
    $requiredDate = htmlspecialchars($_POST['requiredDate']);
    $orderPrice = floatval($_POST['orderPrice']);

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shoedb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO online (name, category, address, pn, email, size, s1, materialColor, costume, heel, hyperlink, detail, requiredDate, orderPrice)
    VALUES ('$name', '$category', '$address', '$pn', '$email', '$size', '$s1', '$materialColor', '$costume', '$heel', '$hyperlink', '$detail', '$requiredDate', '$orderPrice')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
 header("Location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Form submission failed";
}
?>
