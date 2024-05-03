<?php
// Include the database connection file
include 'db.php';

// Function to search for users in the database
function searchUsers($query) {
    global $pdo;
    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare("SELECT * FROM users WHERE Username LIKE :query");
        // Bind parameters
        $stmt->bindParam(':query', $query, PDO::PARAM_STR);
        // Execute the query
        $stmt->execute();
        // Fetch all matching users
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    } catch (PDOException $e) {
        // Handle database error
        return false;
    }
}

// Function to display chat items for searched users
function displaySearchedUsers($query) {
    $users = searchUsers('%' . $query . '%'); // Add wildcard % to search for partial matches
    if ($users !== false) {
        foreach ($users as $userData) {
            echo '<div class="chat-item">';
            echo '<img src="' . $userData['Avatar'] . '" alt="Profile Picture">';
            echo '<div class="chat-details">';
            echo '<div class="contact-name">' . $userData['Username'] . '</div>';
            echo '<div class="last-message">Last Message: ...</div>'; // You can fetch and display the actual last message here
            echo '<div class="timestamp">Timestamp: ...</div>'; // You can fetch and display the actual timestamp here
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No users found.";
    }
}
?>
