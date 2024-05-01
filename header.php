<?php
include 'db.php'; // Include database connection

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if the user is logged in
$userIsLoggedIn = isset($_SESSION['id']);


// Get user information if logged in
$user = null;
if ($userIsLoggedIn && isset($_SESSION['id'])) {
    // Retrieve user information from the session or database
    // Example: $user = getUserInfo($_SESSION['id']);
    // Replace getUserInfo with your function to retrieve user info
    // For now, let's assume user information is stored in the session
    $user = $_SESSION;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css"> <!-- External CSS file -->
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <a href="chat_app.php">Chat App</a> <!-- Logo with link to the main chat page -->
        </div>
        <div class="user-info">
            <!-- Display logged-in user's information -->
            <?php if ($user !== null && isset($user['firstname'])): ?>
            <span>Welcome, <?php echo $user['firstname']; ?></span> <!-- Display username -->
            <?php else: ?>
            <span>Error: User information not available</span>
            <?php endif; ?>
        </div>
        <div class="icons">

        <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-cog"></i> <!-- Settings icon -->
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="profile.php">My Profile</a>
        <a class="dropdown-item" href="logout.php">Log Out</a> <!-- Logout link -->
    </div>
</div>






            <a href="contacts.php"><i class="fas fa-user-friends"></i></a> <!-- Contacts page -->
            <a href="notifications.php"><i class="fas fa-bell"></i></a> <!-- Notifications page -->
        </div>
    </header>

