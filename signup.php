<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Hash the password (using bcrypt or any secure hashing algorithm)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $sql = "INSERT INTO Users (Username, Password, Email) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $hashedPassword, $email]);

    // Redirect to login page
    header("Location: login.html");
    exit();
}
?>
