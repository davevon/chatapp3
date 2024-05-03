<?php
session_start();

include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Check if the receiverID is provided
if (!isset($_GET['receiverID'])) {
    // Redirect to the users.php page if receiverID is not provided
    header("Location: users.php");
    exit();
}

// Get the receiverID from the GET parameters
$receiverID = $_GET['receiverID'];

// Check if the receiverID is valid
$stmt = $pdo->prepare("SELECT * FROM users WHERE UserID = ?");
$stmt->execute([$receiverID]);
$receiver = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$receiver) {
    // Redirect to the users.php page if the receiverID is invalid
    header("Location: users.php");
    exit();
}

// Check if a friend request has already been sent to the receiver
$stmt = $pdo->prepare("SELECT FriendshipID FROM friends WHERE (UserID1 = ? AND UserID2 = ?) OR (UserID1 = ? AND UserID2 = ?)");
$stmt->execute([$_SESSION['UserID'], $receiverID, $receiverID, $_SESSION['UserID']]);
$requestExists = $stmt->fetch(PDO::FETCH_ASSOC);

if ($requestExists) {
    // Redirect to the users.php page if a friend request already exists
    header("Location: users.php");
    exit();
}

// Insert a new friend request into the friends table
$stmt = $pdo->prepare("INSERT INTO friends (UserID1, UserID2, Status) VALUES (?, ?, 'pending')");
$stmt->execute([$_SESSION['UserID'], $receiverID]);

// Redirect back to the users.php page after sending the friend request
header("Location: users.php");
exit();
?>
