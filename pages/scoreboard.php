<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';
include_once '../includes/dbConnection.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT s.idScore, u.tdUserName, c.tdCourseTitle, s.tdPointsEarned 
        FROM tblusrscores s
        JOIN tblusers u ON s.idUser = u.idUser
        JOIN tblcourses c ON s.idCourse = c.idCourse
        ORDER BY s.tdPointsEarned DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
</head>
<body>
    <h1>Scoreboard</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Course</th>
                <th>Points Earned</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php $rank = 1; ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $rank++; ?></td>
                        <td><?php echo htmlspecialchars($row['tdUserName']); ?></td>
                        <td><?php echo htmlspecialchars($row['tdCourseTitle']); ?></td>
                        <td><?php echo htmlspecialchars($row['tdPointsEarned']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No scores available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="<?php echo BASE_URL; ?>pages/quizzes.php">Back to Quizzes</a>
</body>
</html>

<?php
$conn->close();
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>