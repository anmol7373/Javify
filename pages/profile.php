<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/dbConnection.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: " . BASE_URL . "pages/login.php");
    exit;
}

$userId = $_SESSION['userId'];
$username = $_SESSION['username'];

// Fetch user data from database
$stmt = $conn->prepare("SELECT totalPoints FROM tbluserpoints WHERE userId = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($score);
$stmt->fetch();
$stmt->close();

// Handle password change
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_password'], $_POST['confirm_password'])) {
    $newPassword = trim($_POST['new_password']);
    $confirmPassword = trim($_POST['confirm_password']);

    // Validate password
    if ($newPassword !== $confirmPassword) {
        $errorMessage = "Passwords do not match.";
    } elseif (strlen($newPassword) < 8 || !preg_match("/[A-Z]/", $newPassword) || !preg_match("/[0-9]/", $newPassword)) {
        $errorMessage = "Password must be at least 8 characters long, include at least one uppercase letter, and one number.";
    } else {
        // Hash the password
        $passwordHash = password_hash($newPassword, PASSWORD_BCRYPT);

        // Update the database
        $updateStmt = $conn->prepare("UPDATE tblUsers SET passwordHash = ? WHERE userId = ?");
        $updateStmt->bind_param("si", $passwordHash, $userId);
        if ($updateStmt->execute()) {
            $successMessage = "Password updated successfully!";
        } else {
            $errorMessage = "Error updating password. Please try again.";
        }
        $updateStmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Javify</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
</head>
<body id="profile-page">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php'; ?>

<div class="profile-wrapper">
    <div class="profile-card">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>

        <?php if (!empty($successMessage)): ?>
            <div class="alert success"><?php echo $successMessage; ?></div>
        <?php elseif (!empty($errorMessage)): ?>
            <div class="alert error"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <div class="profile-info">
            <h2>Your Details</h2>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Score:</strong> <?php echo htmlspecialchars($score); ?></p>
        </div>

        <div class="profile-password">
            <h2>Change Password</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                </div>
                <button type="submit" class="btn">Update Password</button>
            </form>
        </div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

</body>
</html>
