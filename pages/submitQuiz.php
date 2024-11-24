<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';
include_once '../includes/dbConnection.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}

$username = $_SESSION['username'];
$userId = $_SESSION['userId'];

if (isset($_POST['courseId']) && is_numeric($_POST['courseId'])) {
    $courseId = intval($_POST['courseId']); // Ensure courseId is an integer
} else {
    die('Invalid course ID.');
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve all questions for the course
$sql = "SELECT q.idQuestion, q.tdQuestionText, q.tdPoints, a.idAnswer, a.tdAnswerText, a.tdIsCorrect
        FROM tblquestions q
        JOIN answers a ON q.idQuestion = a.idQuestion
        WHERE q.idCourse = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $courseId);
$stmt->execute();
$result = $stmt->get_result();

$questions = [];
while ($row = $result->fetch_assoc()) {
    $questionId = $row['idQuestion'];
    if (!isset($questions[$questionId])) {
        $questions[$questionId] = [
            'text' => $row['tdQuestionText'],
            'points' => $row['tdPoints'],
            'answers' => [],
            'correctAnswer' => null,
        ];
    }
    $questions[$questionId]['answers'][$row['idAnswer']] = $row['tdAnswerText'];
    if ($row['tdIsCorrect']) {
        $questions[$questionId]['correctAnswer'] = $row['tdAnswerText'];
    }
}
$stmt->close();

// Process submitted answers
$submittedAnswers = array_filter($_POST, function ($key) {
    return strpos($key, 'q') === 0;
}, ARRAY_FILTER_USE_KEY);

$feedback = [];
$totalScore = 0;

foreach ($questions as $questionId => $question) {
    $userAnswerId = $submittedAnswers["q{$questionId}"] ?? null;
    $isCorrect = false;
    $userAnswerText = $userAnswerId ? $question['answers'][$userAnswerId] : 'No Answer';

    if ($userAnswerId && $question['answers'][$userAnswerId] === $question['correctAnswer']) {
        $isCorrect = true;
        $totalScore += $question['points'];
    }

    $feedback[] = [
        'question' => $question['text'],
        'userAnswer' => $userAnswerText,
        'isCorrect' => $isCorrect,
        'points' => $isCorrect ? $question['points'] : 0,
        'correctAnswer' => $question['correctAnswer']
    ];
}

// Update or insert the user's total score
$sql = "SELECT tdPointsEarned FROM tblusrscores WHERE idUser = ? AND idCourse = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $userId, $courseId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update existing score
    $existingRow = $result->fetch_assoc();
    $newPoints = $existingRow['tdPointsEarned'] + $totalScore;

    $sql = "UPDATE tblusrscores SET tdPointsEarned = ? WHERE idUser = ? AND idCourse = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $newPoints, $userId, $courseId);
    $stmt->execute();
} else {
    // Insert new score
    $sql = "INSERT INTO tblusrscores (idUser, idCourse, tdPointsEarned) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $userId, $courseId, $totalScore);
    $stmt->execute();
}
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
    <div class="quiz-results-wrapper">
        <h1>Quiz Results</h1>
        <p>Hello, <?php echo $username; ?>! Here are your results:</p>
        <ul>
            <?php foreach ($feedback as $result): ?>
                <li>
                    <p><strong>Question:</strong> <?php echo $result['question']; ?></p>
                    <p><strong>Your Answer:</strong> <?php echo $result['userAnswer']; ?></p>
                    <?php if ($result['isCorrect']): ?>
                        <p class="correct-answer">Correct! (+<?php echo $result['points']; ?> points)</p>
                    <?php else: ?>
                        <p class="incorrect-answer">Incorrect! (0 points)</p>
                        <p><strong>Correct Answer:</strong> <?php echo $result['correctAnswer']; ?></p>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <h2>Total Score: <?php echo $totalScore; ?> points</h2>
        <div class="results-buttons">
            <?php if ($courseId == 1): ?>
                <a href="<?php echo BASE_URL; ?>modules/beginner/beginner_quiz.php" class="btn retry-btn">Try Again</a>
                <a href="<?php echo BASE_URL; ?>modules/beginner/beginner_theory.php" class="btn theory-btn">Go Back to Theory</a>
            <?php elseif ($courseId == 2): ?>
                <a href="<?php echo BASE_URL; ?>modules/intermediate/intermediate_quiz.php" class="btn retry-btn">Try Again</a>
                <a href="<?php echo BASE_URL; ?>modules/intermediate/intermediate_theory.php" class="btn theory-btn">Go Back to Theory</a>
            <?php endif; ?>
            <?php if ($courseId == 3): ?>
                <a href="<?php echo BASE_URL; ?>modules/advanced/advanced_quiz.php" class="btn retry-btn">Try Again</a>
                <a href="<?php echo BASE_URL; ?>modules/advanced/advanced_theory.php" class="btn theory-btn">Go Back to Theory</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>
