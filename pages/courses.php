<?php
// Include the header file from the includes directory, allowing for consistent header content across pages
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';

// Include the configuration file, which contains important settings and constants
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';

// Include the database connection script, which handles connecting to the database
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/dbConnection.php';

// Check if the user is logged in by checking the 'logged_in' session variable
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

// Set the username variable if the user is logged in, otherwise set it to null
$username = $isLoggedIn ? $_SESSION['username'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set the character encoding for the document -->
    <meta charset="UTF-8">
    <!-- Make the page responsive to different screen sizes -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set the title of the page -->
    <title>Javify - Java Courses</title>
    <!-- Link to the general stylesheet for common styles -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <!-- Link to the specific stylesheet for the courses page -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/courses.css">
</head>
<body id="courses-page">

<div class="courses-wrapper">
    <div class="courses-container">
        <!-- Main heading of the courses page -->
        <h1>Explore Our Java Courses</h1>

        <!-- Display a welcome message based on whether the user is logged in -->
        <?php if ($isLoggedIn): ?>
            <p class="welcome-message">Welcome back, <strong><?php echo htmlspecialchars($username); ?></strong>! Choose your course to continue learning.</p>
        <?php else: ?>
            <p class="welcome-message">Welcome to Javify! To track your progress, <a href="<?php echo BASE_URL; ?>pages/register.php">create an account</a> or <a href="<?php echo BASE_URL; ?>pages/login.php">log in</a>.</p>
        <?php endif; ?>

        <!-- Container for the list of courses -->
        <div class="course-list">
            <!-- Beginner Java course card -->
            <div class="course-card">
                <h2>Beginner Java</h2>
                <p>Start with the basics of Java programming.</p>
                <!-- Display appropriate button based on user's login status -->
                <?php if ($isLoggedIn): ?>
                    <a href="<?php echo BASE_URL; ?>modules/beginner/beginner_theory.php" class="btn">Start Beginner Course</a>
                <?php else: ?>
                    <a href="<?php echo BASE_URL; ?>pages/login.php" class="btn">Login to Start</a>
                <?php endif; ?>
            </div>

            <!-- Intermediate Java course card -->
            <div class="course-card">
                <h2>Intermediate Java</h2>
                <p>Enhance your skills with intermediate concepts.</p>
                <!-- Display appropriate button based on user's login status -->
                <?php if ($isLoggedIn): ?>
                    <a href="<?php echo BASE_URL; ?>modules/intermediate/intermediate_theory.php" class="btn">Start Intermediate Course</a>
                <?php else: ?>
                    <a href="<?php echo BASE_URL; ?>pages/login.php" class="btn">Login to Start</a>
                <?php endif; ?>
            </div>

            <!-- Advanced Java course card -->
            <div class="course-card">
                <h2>Advanced Java</h2>
                <p>Master Java with advanced programming patterns.</p>
                <!-- Display appropriate button based on user's login status -->
                <?php if ($isLoggedIn): ?>
                    <a href="<?php echo BASE_URL; ?>modules/advanced/advanced_theory.php" class="btn">Start Advanced Course</a>
                <?php else: ?>
                    <a href="<?php echo BASE_URL; ?>pages/login.php" class="btn">Login to Start</a>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<!-- Include the footer file for consistent footer content across pages -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

</body>
</html>
