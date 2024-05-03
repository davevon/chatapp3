// Function to check if a user has already sent a friend request to another user
function hasSentFriendRequest($pdo, $userID1, $userID2) {
    $stmt = $pdo->prepare("SELECT FriendshipID FROM friends WHERE (UserID1 = ? AND UserID2 = ?) AND Status = 'pending'");
    $stmt->execute([$userID1, $userID2]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Main Content
// Your code that uses the hasSentFriendRequest() function
