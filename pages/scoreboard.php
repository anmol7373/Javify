<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/dbConnection.php';

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: " . BASE_URL . "pages/login.php");
    exit;
}

// Fetch all users and their scores, ordered by score descending
$stmt = $conn->prepare("SELECT tblUsers.userName, tbluserpoints.totalPoints 
                        FROM tblUsers 
                        JOIN tbluserpoints ON tblUsers.userId = tbluserpoints.userId
                        ORDER BY tbluserpoints.totalPoints DESC");
$stmt->execute();
$stmt->bind_result($username, $score);

$scoreboard = [];
while ($stmt->fetch()) {
    $scoreboard[] = ['username' => $username, 'score' => $score];
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard - Javify</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/scoreboard.css">
</head>
<body id="scoreboard-page">

<div class="scoreboard-wrapper">
    <div class="scoreboard-container">
        <h1>Leaderboard</h1>
        <table class="scoreboard-table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Username</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($scoreboard as $index => $entry): ?>
                    <tr>
                        <td class="rank <?php echo ($index === 0 ? 'gold' : ($index === 1 ? 'silver' : ($index === 2 ? 'bronze' : ''))); ?>">
                            <?php echo $index + 1; ?>
                        </td>
                        <td><?php echo htmlspecialchars($entry['username']); ?></td>
                        <td><?php echo htmlspecialchars($entry['score']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

</body>
</html>
