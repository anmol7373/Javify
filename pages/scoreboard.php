<!-- Handle scoreboard page -->

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

// Function to fetch scores by course
function fetchScores($conn, $courseId) {
    $sql = "SELECT s.idScore, u.tdUserName, s.tdPointsEarned 
            FROM tblusrscores s
            JOIN tblusers u ON s.idUser = u.idUser
            WHERE s.idCourse = ?
            ORDER BY s.tdPointsEarned DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $courseId);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

// Fetch scores for Beginner, Intermediate, and Advanced
$beginnerScores = fetchScores($conn, 1);
$intermediateScores = fetchScores($conn, 2);
$advancedScores = fetchScores($conn, 3);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <script>
        // JavaScript to toggle scoreboard views
        function showScoreboard(level) {
            document.getElementById('beginner-scoreboard').style.display = level === 'beginner' ? 'block' : 'none';
            document.getElementById('intermediate-scoreboard').style.display = level === 'intermediate' ? 'block' : 'none';
            document.getElementById('advanced-scoreboard').style.display = level === 'advanced' ? 'block' : 'none';
        }
    </script>
</head>
<body id="scoreboard-page">
    <div class="scoreboard-wrapper">
        <h1>Scoreboard</h1>

        <!-- Buttons to toggle scoreboards -->
        <div class="scoreboard-buttons">
            <button class="btn level-btn" onclick="showScoreboard('beginner')">Beginner</button>
            <button class="btn level-btn" onclick="showScoreboard('intermediate')">Intermediate</button>
            <button class="btn level-btn" onclick="showScoreboard('advanced')">Advanced</button>
        </div>

        <!-- Beginner Scoreboard -->
        <div id="beginner-scoreboard" class="scoreboard" style="display: block;">
            <h2>Beginner Scoreboard</h2>
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Username</th>
                        <th>Points Earned</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($beginnerScores->num_rows > 0): ?>
                        <?php $rank = 1; ?>
                        <?php while ($row = $beginnerScores->fetch_assoc()): ?>
                            <tr>
                                <td class="<?php echo $rank === 1 ? 'gold' : ($rank === 2 ? 'silver' : ($rank === 3 ? 'bronze' : '')); ?>">
                                    <?php echo $rank++; ?>
                                </td>
                                <td><?php echo htmlspecialchars($row['tdUserName']); ?></td>
                                <td><?php echo htmlspecialchars($row['tdPointsEarned']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No scores available for Beginner level.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Intermediate Scoreboard -->
        <div id="intermediate-scoreboard" class="scoreboard" style="display: none;">
            <h2>Intermediate Scoreboard</h2>
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Username</th>
                        <th>Points Earned</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($intermediateScores->num_rows > 0): ?>
                        <?php $rank = 1; ?>
                        <?php while ($row = $intermediateScores->fetch_assoc()): ?>
                            <tr>
                                <td class="<?php echo $rank === 1 ? 'gold' : ($rank === 2 ? 'silver' : ($rank === 3 ? 'bronze' : '')); ?>">
                                    <?php echo $rank++; ?>
                                </td>
                                <td><?php echo htmlspecialchars($row['tdUserName']); ?></td>
                                <td><?php echo htmlspecialchars($row['tdPointsEarned']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No scores available for Intermediate level.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Advanced Scoreboard -->
        <div id="advanced-scoreboard" class="scoreboard" style="display: none;">
            <h2>Advanced Scoreboard</h2>
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Username</th>
                        <th>Points Earned</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($advancedScores->num_rows > 0): ?>
                        <?php $rank = 1; ?>
                        <?php while ($row = $advancedScores->fetch_assoc()): ?>
                            <tr>
                                <td class="<?php echo $rank === 1 ? 'gold' : ($rank === 2 ? 'silver' : ($rank === 3 ? 'bronze' : '')); ?>">
                                    <?php echo $rank++; ?>
                                </td>
                                <td><?php echo htmlspecialchars($row['tdUserName']); ?></td>
                                <td><?php echo htmlspecialchars($row['tdPointsEarned']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No scores available for Advanced level.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <a href="<?php echo BASE_URL; ?>pages/quizzes.php" class="btn back-btn">Back to Quizzes</a>
    </div>
</body>
</html>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>
