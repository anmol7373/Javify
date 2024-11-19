<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
include_once '../includes/dbConnection.php';
// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}

$username = $_SESSION['username'];
$userId = $_SESSION['user_id']; // Assume user ID is stored in session

// Database connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get submitted answers
$submittedAnswers = array_filter($_POST, function ($key) {
    return strpos($key, 'q') === 0; // Only keep keys starting with 'q'
}, ARRAY_FILTER_USE_KEY);

// Prepare placeholders for the query
$placeholders = implode(',', array_fill(0, count($submittedAnswers), '?'));

// Query to fetch correct answers and question details
$sql = "SELECT q.idQuestion, q.tdQuestionText, q.tdPoints, a.idAnswer, a.tdAnswerText, a.tdIsCorrect
        FROM answers a
        JOIN tblquestions q ON a.idQuestion = q.idQuestion
        WHERE a.idAnswer IN ($placeholders)";
$stmt = $conn->prepare($sql);
$stmt->bind_param(str_repeat('i', count($submittedAnswers)), ...array_values($submittedAnswers));
$stmt->execute();
$result = $stmt->get_result();

$feedback = [];
$totalScore = 0;

// Process results
while ($row = $result->fetch_assoc()) {
    $questionId = $row['idQuestion'];
    $isCorrect = $row['tdIsCorrect'] == 1;

    // Check if user's answer is correct
    $feedback[$questionId] = [
        'question' => $row['tdQuestionText'],
        'userAnswer' => $row['tdAnswerText'],
        'isCorrect' => $isCorrect,
        'points' => $isCorrect ? $row['tdPoints'] : 0
    ];

    if ($isCorrect) {
        $totalScore += $row['tdPoints'];
    }
}
$stmt->close();

// Store the score in tblusrscores
$courseId = 3; // Advanced course ID
$sql = "INSERT INTO tblusrscores (idUser, idCourse, tdPointsEarned, tdAttemptDate) VALUES (?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $userId, $courseId, $totalScore);
$stmt->execute();
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
</head>
<body>
    <h1>Quiz Results</h1>
    <p>Hello, <?php echo $username; ?>! Here are your results:</p>
    <ul>
        <?php foreach ($feedback as $questionId => $result): ?>
            <li>
                <p><strong>Question:</strong> <?php echo $result['question']; ?></p>
                <p><strong>Your Answer:</strong> <?php echo $result['userAnswer']; ?></p>
                <?php if ($result['isCorrect']): ?>
                    <p style="color: green;">Correct! (+<?php echo $result['points']; ?> points)</p>
                <?php else: ?>
                    <p style="color: red;">Incorrect! (0 points)</p>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <h2>Total Score: <?php echo $totalScore; ?> points</h2>
    <a href="<?php echo BASE_URL; ?>modules/advanced/advanced_quiz.php">Try Again</a>
</body>
</html>
