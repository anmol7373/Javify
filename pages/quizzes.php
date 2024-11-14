<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/dbConnection.php';

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$username = $isLoggedIn ? $_SESSION['username'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javify - Java Quizzes</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/courses.css">
</head>
<body id="quizzes-page">

<div class="quizzes-wrapper">
    <div class="quizzes-container">
        <h1>Explore Our Java Quizzes</h1>

        <?php if ($isLoggedIn): ?>
            <p class="welcome-message">Welcome back, <strong><?php echo htmlspecialchars($username); ?></strong>! Choose your quiz to test your knowledge.</p>
        <?php else: ?>
            <p class="welcome-message">Welcome to Javify! To track your progress, <a href="<?php echo BASE_URL; ?>pages/register.php">create an account</a> or <a href="<?php echo BASE_URL; ?>pages/login.php">log in</a>.</p>
        <?php endif; ?>

        <div class="quiz-list">
    <div class="quiz-card">
        <h2>Beginner Java Quiz</h2>
        <p>Start with the basics of Java programming.</p>
        <?php if ($isLoggedIn): ?>
            <a href="<?php echo BASE_URL; ?>modules/beginner/beginner_quiz.php" class="btn">Start Beginner Quiz</a>
        <?php else: ?>
            <a href="<?php echo BASE_URL; ?>pages/login.php" class="btn">Login to Start</a>
        <?php endif; ?>
    </div>

    <div class="quiz-card">
        <h2>Intermediate Java Quiz</h2>
        <p>Enhance your skills with intermediate concepts.</p>
        <?php if ($isLoggedIn): ?>
            <a href="<?php echo BASE_URL; ?>modules/intermediate/intermediate_quiz.php" class="btn">Start Intermediate Quiz</a>
        <?php else: ?>
            <a href="<?php echo BASE_URL; ?>pages/login.php" class="btn">Login to Start</a>
        <?php endif; ?>
    </div>

    <div class="quiz-card">
        <h2>Advanced Java Quiz</h2>
        <p>Master Java with advanced programming patterns.</p>
        <?php if ($isLoggedIn): ?>
            <a href="<?php echo BASE_URL; ?>modules/advanced/advanced_quiz.php" class="btn">Start Advanced Quiz</a>
        <?php else: ?>
            <a href="<?php echo BASE_URL; ?>pages/login.php" class="btn">Login to Start</a>
        <?php endif; ?>
    </div>
</div>

    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

</body>
</html>
