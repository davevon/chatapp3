<?php
include 'db.php'; // Include database connection

session_start();

// Check if the user is logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve user's current information
$userID = $_SESSION['UserID'];

// Query to retrieve user's information
$stmt = $pdo->prepare("SELECT * FROM users WHERE UserID = ?");
$stmt->execute([$userID]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $lastName = $_POST["lastName"];
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $gender = $_POST["gender"];
    $contactNumber = $_POST["contactNumber"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $bio = $_POST["bio"]; // Added line to retrieve bio from form

    // Update user's information in the database
    $updateStmt = $pdo->prepare("UPDATE users SET LastName = ?, FirstName = ?, MiddleName = ?, Gender = ?, ContactNumber = ?, DateOfBirth = ?, Bio = ? WHERE UserID = ?");
    $updateStmt->execute([$lastName, $firstName, $middleName, $gender, $contactNumber, $dateOfBirth, $bio, $userID]);

    // Handle file upload for avatar (if applicable)
    if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $avatarName = $_FILES['avatar']['name'];
        $avatarTmpName = $_FILES['avatar']['tmp_name'];
        $avatarPath = "avatars/" . $userID . "_" . $avatarName; // Unique avatar path
        move_uploaded_file($avatarTmpName, $avatarPath); // Move avatar to folder
        // Update avatar path in database
        $updateAvatarStmt = $pdo->prepare("UPDATE users SET Avatar = ? WHERE UserID = ?");
        $updateAvatarStmt->execute([$avatarPath, $userID]);
        // Remove previous avatar if exists
        if (!empty($user['Avatar']) && file_exists($user['Avatar'])) {
            unlink($user['Avatar']);
        }
    }

    // Redirect the user to the profile page or display a success message
    header("Location: profile.php");
    exit();
}
?>
