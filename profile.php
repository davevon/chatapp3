<?php
// Include database connection
include 'db.php';

// Start session
session_start();

// Check if user is logged in
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

    // Update user's information in the database
    $updateStmt = $pdo->prepare("UPDATE users SET LastName = ?, FirstName = ?, MiddleName = ?, Gender = ?, ContactNumber = ?, DateOfBirth = ? WHERE UserID = ?");
    $updateStmt->execute([$lastName, $firstName, $middleName, $gender, $contactNumber, $dateOfBirth, $userID]);

    // Handle file upload for avatar (if applicable)
    if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        // Handle avatar upload
    }

    // Redirect the user to the profile page or display a success message
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<body>
    <h1>Update Profile</h1>
    <form action="update_profile.php" method="post" enctype="multipart/form-data">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $user['LastName']; ?>"><br>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $user['FirstName']; ?>"><br>

        <label for="middleName">Middle Name:</label>
        <input type="text" id="middleName" name="middleName" value="<?php echo $user['MiddleName']; ?>"><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="Male" <?php echo ($user['Gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($user['Gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
            <option value="Other" <?php echo ($user['Gender'] === 'Other') ? 'selected' : ''; ?>>Other</option>
        </select><br>

        <label for="contactNumber">Contact Number:</label>
        <input type="text" id="contactNumber" name="contactNumber" value="<?php echo $user['ContactNumber']; ?>"><br>

        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" id="dateOfBirth" name="dateOfBirth" value="<?php echo $user['DateOfBirth']; ?>"><br>

        <!-- Avatar Upload -->
        <label for="avatar">Avatar:</label>
        <input type="file" id="avatar" name="avatar"><br>

        <!-- Submit Button -->
        <button type="submit">Update Profile</button>
    </form>
</body>
</html>
