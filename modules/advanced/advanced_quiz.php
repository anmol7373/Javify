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

$courseId = 3; // Advanced Quiz
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
    <title>Advanced Java Quiz</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <script defer src="<?php echo BASE_URL; ?>js/advanced_quiz.js"></script>
</head>
<body id="advanced-quiz-page">

<div class="quiz-wrapper">
    <!-- Main Quiz Box -->
    <div class="question-box">
        <h1>Advanced Java Quiz</h1>
        <div id="question-container">
            <?php
            $questionNumber = 1;
            foreach ($questions as $questionId => $question):
            ?>
            <div class="question-block" id="question-<?php echo $questionNumber; ?>" data-question-id="<?php echo $questionId; ?>" style="display: none;">
                <p class="question"><?php echo $question['text']; ?> (<?php echo $question['points']; ?> points)</p>
                <div class="answer-options">
                    <?php foreach ($question['answers'] as $answer): ?>
                    <label>
                        <input type="radio" name="q<?php echo $questionId; ?>" value="<?php echo $answer['id']; ?>">
                        <?php echo $answer['text']; ?>
                    </label>
                    <?php endforeach; ?>
                </div>
                <div class="nav-buttons">
                    <button class="btn prev-btn" onclick="navigateQuestion(<?php echo $questionNumber - 1; ?>)" style="display: none;">Previous</button>
                    <?php if ($questionNumber === count($questions)): ?>
                        <button class="btn submit-btn" onclick="submitQuiz()">Submit Quiz</button>
                    <?php else: ?>
                        <button class="btn next-btn" onclick="navigateQuestion(<?php echo $questionNumber + 1; ?>)">Next</button>
                    <?php endif; ?>
                </div>
            </div>
            <?php $questionNumber++; endforeach; ?>
        </div>
    </div>

    <!-- Sidebar with Question Numbers -->
    <div class="sidebar">
        <h2>Questions</h2>
        <div class="question-numbers">
            <?php
            $questionNumber = 1;
            foreach ($questions as $questionId => $question):
            ?>
            <div class="question-number" id="question-number-<?php echo $questionNumber; ?>" onclick="navigateQuestion(<?php echo $questionNumber; ?>)">
                <?php echo $questionNumber; ?>
            </div>
            <?php $questionNumber++; endforeach; ?>
        </div>
    </div>
</div>

<!-- Popup for Confirm Submission -->
<div id="popup-overlay" class="popup-overlay" style="display: none;">
    <div class="popup">
        <p id="popup-message"></p>
        <div class="popup-buttons">
            <button class="popup-btn confirm-btn" onclick="confirmSubmit()">Yes</button>
            <button class="popup-btn cancel-btn" onclick="closePopup()">No</button>
        </div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

</body>
</html>
