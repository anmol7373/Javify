<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';
include_once '../../includes/dbConnection.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}

$username = $_SESSION['username'];



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$courseId = 1;
$sql = "SELECT q.idQuestion, q.tdQuestionText, q.tdPoints, a.idAnswer, a.tdAnswerText
        FROM tblquestions q
        JOIN answers a ON q.idQuestion = a.idQuestion
        WHERE q.idCourse = ?
        ORDER BY q.idQuestion, a.idAnswer";
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
            'answers' => []
        ];
    }
    $questions[$questionId]['answers'][] = [
        'id' => $row['idAnswer'],
        'text' => $row['tdAnswerText']
    ];
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beginner Java Quiz</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
</head>
<body id="beginner-quiz-page">
<section id="beginner-quiz-content">
    <div class="index-container text-center">
        <h1>Beginner Java Quiz</h1>
        <form id="quiz-form" action="<?php echo BASE_URL; ?>pages/submitQuiz.php" method="post">
            <input type="hidden" name="courseId" value="1">
            <?php foreach ($questions as $questionId => $question): ?>
                <div class="question-block">
                    <p><strong><?php echo $question['text']; ?> (<?php echo $question['points']; ?> points)</strong></p>
                    <?php foreach ($question['answers'] as $answer): ?>
                        <input type="radio" name="q<?php echo $questionId; ?>" value="<?php echo $answer['id']; ?>">
                        <?php echo $answer['text']; ?><br>
                    <?php endforeach; ?>
                </div>
                <br>
            <?php endforeach; ?>
            <button type="submit" class="btn submit-btn">Submit Quiz</button>
        </form>
    </div>
</section>
</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>