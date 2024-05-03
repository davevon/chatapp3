<?php include 'header.php'; ?>

<?php
// Check if search input is provided
$searchInput = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($searchInput)) {
    // Display filtered users based on search input
    displayFilteredUsers($pdo, $searchInput);
} else {
    // Display all conversations by default
    displayAllConversations($pdo);
}

function displayAllConversations($pdo) {
    // Fetch users with whom the current user has had conversations or exchanged messages
    $stmt = $pdo->prepare("SELECT DISTINCT u.UserID, u.Username, u.FirstName, u.LastName, u.Avatar 
                           FROM users u
                           LEFT JOIN messages m ON u.UserID = m.SenderID OR u.UserID = m.ReceiverID
                           WHERE (m.SenderID = :userID OR m.ReceiverID = :userID)
                                 AND u.UserID != :currentUserID");
    $stmt->execute(['userID' => $_SESSION['UserID'], 'currentUserID' => $_SESSION['UserID']]);
    
    // Display users with whom the current user has had conversations
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        displayChatItem($row);
    }
}

function displayFilteredUsers($pdo, $searchInput) {
    // Fetch users based on search input
    $stmt = $pdo->prepare("SELECT UserID, Username, FirstName, LastName, Avatar FROM users 
                           WHERE (Username LIKE :searchInput 
                                  OR FirstName LIKE :searchInput 
                                  OR LastName LIKE :searchInput) 
                                 AND UserID != :currentUserID");
    $stmt->execute(['searchInput' => "%$searchInput%", 'currentUserID' => $_SESSION['UserID']]);

    // Display users based on search results
    echo '<div class="chat-list-container">'; // Container for horizontal display
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        displayChatItem($row);
    }
    echo '</div>'; // Close the container
}

function displayChatItem($row) {
    $username = $row['Username'];
    $fullname = $row['FirstName'] . ' ' . $row['LastName'];
    $avatar = $row['Avatar'] ? $row['Avatar'] : 'default_avatar.jpg';

    ?>
    <div class="chat-item" data-username="<?php echo $username; ?>">
        <img src="<?php echo $avatar; ?>" alt="Profile Picture">
        <div class="chat-details">
            <div class="contact-name"><?php echo $fullname; ?></div>
            <!-- You can add more details here such as last message, timestamp, etc. -->
        </div>
    </div>
    <?php
}
?>

<!-- Search Bar -->
<div class="search-bar">
    <form action="chat_app.php" method="GET">
        <div class="search-container">
            <input type="text" name="search" placeholder="Search" id="searchInput">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>

<!-- Message Area -->
<div class="message-area">
    <!-- Messages will be displayed here -->
</div>

<!-- Message Input -->
<div class="message-input">
    <textarea placeholder="Type your message..."></textarea>
    <i class="fas fa-paperclip"></i> <!-- Attach icon -->
    <button><i class="fas fa-paper-plane"></i></button> <!-- Send icon -->
</div>

<style>
    
    
    /* Style for search bar */
    .search-bar {
        margin-bottom: 20px;
    }
    .search-container {
        position: relative;
        display: flex;
    }
    .search-container input[type=text] {
        width: 100%;
        padding: 10px 40px 10px 10px;
        border: none;
        border-bottom: 1px solid #ccc;
        font-size: 16px;
        background-color: #f1f1f1;
    }
    .search-container button {
        position: absolute;
        right: 0;
        top: 0;
        padding: 10px;
        border: none;
        background: none;
        cursor: pointer;
    }
</style>

<script>
    // Function to filter chat list based on search input
    function filterChatList() {
        var input, filter, chatItems, i, txtValue;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        chatItems = document.querySelectorAll('.chat-list .chat-item');
        for (i = 0; i < chatItems.length; i++) {
            txtValue = chatItems[i].getAttribute('data-username').toUpperCase();
            if (txtValue.indexOf(filter) > -1) {
                chatItems[i].style.display = '';
            } else {
                chatItems[i].style.display = 'none';
            }
        }
    }

    // Add event listener for the input event on the search input
    document.getElementById('searchInput').addEventListener('input', filterChatList);
</script>

<?php include 'footer.php'; ?>
