<?php
// Include configuration file to use constants such as BASE_URL
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';

// Include the header file for the HTML structure
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';

// Include the database connection file
include_once '../../includes/dbConnection.php';

// Check if user is logged in, if not, redirect to the index page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}

// Set the username of the logged-in user
$username = $_SESSION['username'];

// Check if the database connection is established
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch quiz questions and their respective answers for the intermediate course
$courseId = 2; // Intermediate quiz
$sql = "SELECT q.idQuestion, q.tdQuestionText, q.tdPoints, a.idAnswer, a.tdAnswerText
        FROM tblquestions q
        LEFT JOIN answers a ON q.idQuestion = a.idQuestion
        WHERE q.idCourse = ?
        ORDER BY q.idQuestion, a.idAnswer";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $courseId);
$stmt->execute();
$result = $stmt->get_result();

// Store questions and answers in an associative array
$questions = [];
while ($row = $result->fetch_assoc()) {
    $questionId = $row['idQuestion'];
    if (!isset($questions[$questionId])) {
        // Initialize the question details
        $questions[$questionId] = [
            'text' => $row['tdQuestionText'],
            'points' => $row['tdPoints'],
            'answers' => []
        ];
    }
    // Add the answers to the current question
    $questions[$questionId]['answers'][] = [
        'id' => $row['idAnswer'],
        'text' => $row['tdAnswerText']
    ];
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intermediate Quiz</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <!-- Link to external JavaScript file for quiz functionality -->
    <script defer src="<?php echo BASE_URL; ?>js/quiz.js"></script>
</head>
<body id="intermediate-quiz-page">

<div class="quiz-wrapper">
    <!-- Main Quiz Box -->
    <div class="question-box">
        <h1>Intermediate Quiz</h1>
        <form id="quiz-form" method="POST" action="<?php echo BASE_URL; ?>pages/submitQuiz.php">
            <input type="hidden" name="courseId" value="2">
            <div id="question-container">
                <?php
                $questionNumber = 1;
                // Loop through each question and render it on the page
                foreach ($questions as $questionId => $question):
                ?>
                <div class="question-block" id="question-<?php echo $questionNumber; ?>" data-question-id="<?php echo $questionId; ?>" style="display: none;">
                    <p class="question">
                        <?php echo $question['text']; ?> (<?php echo $question['points']; ?> points)
                    </p>
                    <div class="answer-options">
                        <?php // Loop through the answers for each question and render them
                        foreach ($question['answers'] as $answer): ?>
                        <label>
                            <input type="radio" name="q<?php echo $questionId; ?>" value="<?php echo $answer['id']; ?>">
                            <?php echo $answer['text']; ?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                    <div class="nav-buttons">
                        <!-- Previous button, hidden for the first question -->
                        <button type="button" class="btn prev-btn" onclick="navigateQuestion(<?php echo $questionNumber - 1; ?>)" style="display: none;">Previous</button>
                        <?php if ($questionNumber === count($questions)): ?>
                            <!-- Submit button for the last question -->
                            <button type="button" class="btn submit-btn" onclick="submitQuiz()">Submit Quiz</button>
                        <?php else: ?>
                            <!-- Next button for other questions -->
                            <button type="button" class="btn next-btn" onclick="navigateQuestion(<?php echo $questionNumber + 1; ?>)">Next</button>
                        <?php endif; ?>
                    </div>
                </div>
                <?php $questionNumber++; endforeach; ?>
            </div>
        </form>
    </div>

    <!-- Sidebar with Question Numbers -->
    <div class="sidebar">
        <h2>Questions</h2>
        <div class="question-numbers">
            <?php
            $questionNumber = 1;
            // Loop to render the question numbers in the sidebar
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
