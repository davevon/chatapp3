<?php
include 'header.php'; 

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to update user's online status
function updateUserOnlineStatus($pdo, $userID, $isOnline) {
    $stmt = $pdo->prepare("UPDATE users SET is_online = ? WHERE UserID = ?");
    $stmt->execute([$isOnline, $userID]);
}

// Function to get the avatar URL or default avatar
function getUserAvatar($user) {
    // If user has an avatar URL, return it; otherwise, return the default avatar URL
    return (!empty($user['Avatar']) && file_exists($user['Avatar'])) ? $user['Avatar'] : 'default_avatar.jpg';
}

// Function to check if two users are friends
function areFriends($pdo, $userID1, $userID2) {
    $stmt = $pdo->prepare("SELECT FriendshipID FROM friends WHERE (UserID1 = ? AND UserID2 = ?) OR (UserID1 = ? AND UserID2 = ?) AND Status = 'accepted'");
    $stmt->execute([$userID1, $userID2, $userID2, $userID1]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Check if the user is logged in and update online status
if (isset($_SESSION['UserID'])) {
    $userID = $_SESSION['UserID'];
    // Update user's online status to 1 (online)
    updateUserOnlineStatus($pdo, $userID, 1);
} else {
    // User is not logged in, update all users' online status to 0 (offline)
    $stmt = $pdo->prepare("UPDATE users SET is_online = ?");
    $stmt->execute([0]);
}

// Fetch all users from the database with additional information
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!-- Main Content -->
<div class="container mt-5">
    <h2>All Users</h2>
    <div class="row">
        <?php foreach ($users as $user): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="<?php echo getUserAvatar($user); ?>" class="card-img-top" alt="Profile Picture">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $user['Username']; ?></h5>
                        <p class="card-text"><?php echo $user['Email']; ?></p>
                        <p class="card-text">Age: <?php echo calculateAge($user['DateOfBirth']); ?></p>
                        <p class="card-text">Gender: <?php echo $user['Gender']; ?></p>
                        <p class="card-text">Bio: <?php echo $user['Bio']; ?></p>
                        <p class="card-text"><?php echo ($user['is_online'] == 1) ? "Online" : "Offline"; ?></p>
                        <a href="send_request.php?receiverID=<?php echo $user['UserID']; ?>" class="btn btn-primary">Send Friend Request</a>
                  
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'footer.php'; ?>

<?php
// Function to calculate age based on date of birth
function calculateAge($dob) {
    $today = new DateTime('today');
    $birthdate = new DateTime($dob);
    $age = $birthdate->diff($today)->y;
    return $age;
}
?>
