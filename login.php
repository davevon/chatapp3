<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve user from the database based on the username
    $sql = "SELECT UserID, Password FROM Users WHERE Username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Verify password
    if ($user && password_verify($password, $user["Password"])) {
        // Start session and store user ID
        session_start();
        $_SESSION["UserID"] = $user["UserID"];

        // Redirect to chat app or dashboard page
        header("Location: chat_app.php");
        exit();
    } else {
        // Redirect back to login page with error message
        header("Location: login.html?error=1");
        exit();
    }
}
?>
