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

// Fetch user points per course
$stmt = $conn->prepare("
    SELECT c.tdCourseTitle, IFNULL(s.tdPointsEarned, 0) as points
    FROM tblcourses c
    LEFT JOIN tblusrscores s ON c.idCourse = s.idCourse AND s.idUser = ?
    ORDER BY c.idCourse
");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$coursePoints = [];
while ($row = $result->fetch_assoc()) {
    $coursePoints[$row['tdCourseTitle']] = $row['points'];
}
$stmt->close();

// Handle password change
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['current_password'], $_POST['new_password'], $_POST['confirm_password'])) {
    $currentPassword = trim($_POST['current_password']);
    $newPassword = trim($_POST['new_password']);
    $confirmPassword = trim($_POST['confirm_password']);

    if ($newPassword !== $confirmPassword) {
        $errorMessage = "Passwords do not match.";
    } elseif (strlen($newPassword) < 8 || !preg_match("/[A-Z]/", $newPassword) || !preg_match("/[0-9]/", $newPassword)) {
        $errorMessage = "Password must be at least 8 characters long, include at least one uppercase letter, and one number.";
    } else {
        $stmt = $conn->prepare("SELECT tdPasswordHash FROM tblusers WHERE idUser = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($passwordHash);
        $stmt->fetch();
        $stmt->close();

        if (!password_verify($currentPassword, $passwordHash)) {
            $errorMessage = "Current password is incorrect.";
        } else {
            $passwordHash = password_hash($newPassword, PASSWORD_BCRYPT);
            $updateStmt = $conn->prepare("UPDATE tblusers SET tdPasswordHash = ? WHERE idUser = ?");
            $updateStmt->bind_param("si", $passwordHash, $userId);
            if ($updateStmt->execute()) {
                session_destroy();
                header("Location: " . BASE_URL . "pages/login.php?password_changed=1");
                exit;
            } else {
                $errorMessage = "Error updating password. Please try again.";
            }
            $updateStmt->close();
        }
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
    <script>
        function togglePasswordForm() {
            const form = document.getElementById('password-change-form');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
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
            <h2>Your Points</h2>
            <div class="profile-stats">
                <?php foreach ($coursePoints as $course => $points): ?>
                    <div class="stat-item">
                        <h3><?php echo htmlspecialchars($course); ?></h3>
                        <p><?php echo htmlspecialchars($points); ?> Points</p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <button class="btn toggle-btn" onclick="togglePasswordForm()">Change Password</button>

        <div id="password-change-form" style="display: none;">
            <h2>Change Password</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
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
