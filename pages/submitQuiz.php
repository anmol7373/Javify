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


$submittedAnswers = array_filter($_POST, function ($key) {
    return strpos($key, 'q') === 0;
}, ARRAY_FILTER_USE_KEY);
if (empty($submittedAnswers)) {
    die('No answers submitted. Please go back and complete the quiz.');
}

$placeholders = implode(',', array_fill(0, count($submittedAnswers), '?'));


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


while ($row = $result->fetch_assoc()) {
    $questionId = $row['idQuestion'];
    $isCorrect = $row['tdIsCorrect'] == 1;


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



$sql = "INSERT INTO tblusrscores (idUser, idCourse, tdPointsEarned) VALUES (?, ?, ?)";
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

</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>