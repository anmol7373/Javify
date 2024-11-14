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
    <title>Javify - Java Courses</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/courses.css">
</head>
<body id="courses-page">

<div class="courses-wrapper">
    <div class="courses-container">
        <h1>Explore Our Java Courses</h1>

        <?php if ($isLoggedIn): ?>
            <p class="welcome-message">Welcome back, <strong><?php echo htmlspecialchars($username); ?></strong>! Choose your course to continue learning.</p>
        <?php else: ?>
            <p class="welcome-message">Welcome to Javify! To track your progress, <a href="<?php echo BASE_URL; ?>pages/register.php">create an account</a> or <a href="<?php echo BASE_URL; ?>pages/login.php">log in</a>.</p>
        <?php endif; ?>

        <div class="course-list">
    <div class="course-card">
        <h2>Beginner Java</h2>
        <p>Start with the basics of Java programming.</p>
        <?php if ($isLoggedIn): ?>
            <a href="<?php echo BASE_URL; ?>modules/beginner/beginner_theory.php" class="btn">Start Beginner Course</a>
        <?php else: ?>
            <a href="<?php echo BASE_URL; ?>pages/login.php" class="btn">Login to Start</a>
        <?php endif; ?>
    </div>

    <div class="course-card">
        <h2>Intermediate Java</h2>
        <p>Enhance your skills with intermediate concepts.</p>
        <?php if ($isLoggedIn): ?>
            <a href="<?php echo BASE_URL; ?>modules/intermediate/intermediate_theory.php" class="btn">Start Intermediate Course</a>
        <?php else: ?>
            <a href="<?php echo BASE_URL; ?>pages/login.php" class="btn">Login to Start</a>
        <?php endif; ?>
    </div>

    <div class="course-card">
        <h2>Advanced Java</h2>
        <p>Master Java with advanced programming patterns.</p>
        <?php if ($isLoggedIn): ?>
            <a href="<?php echo BASE_URL; ?>modules/advanced/advanced_theory.php" class="btn">Start Advanced Course</a>
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
