<?php
include 'db.php'; // Include database connection

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if the user is logged in
$userIsLoggedIn = isset($_SESSION['UserID']);

// If user is logged in, update their online status to offline
if ($userIsLoggedIn) {
    $userID = $_SESSION['UserID'];
    // Update user's online status to 0 (offline)
    $stmt = $pdo->prepare("UPDATE users SET is_online = ? WHERE UserID = ?");
    $stmt->execute([0, $userID]);
    
    // Destroy the session
    session_destroy();
}

// Redirect the user to the login page or any other appropriate page
header("Location: login.html");
exit();
?>
