<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $shoeSize = $_POST["shoeSize"];
    $price = $_POST["price"];
    $itemName = $_POST["itemName"];

    // Assuming you have a database connection
    // Insert the data into your database table
    // Example using PDO
    $dsn = "mysql:host=localhost;dbname=shoedb";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO website_order (name, phone_number, address, shoe_size, price, item_name) VALUES (:name, :phone, :address, :shoeSize, :price, :itemName)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':shoeSize', $shoeSize);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':itemName', $itemName);

        $stmt->execute();

        echo "Order placed successfully!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    $pdo = null;
}
?>
