<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$username = $isLoggedIn ? $_SESSION['username'] : '';

if (!$isLoggedIn) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javify - Java Courses</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
</head>
<body id="courses-page">

<!-- Include Header -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php'; ?>

<!-- Main Content Section -->
<section id="course-selection">
    <div class="index-container text-center">
        <h1>Choose Your Java Level</h1>
        <p>Select your level to start learning Java.</p>
        <div class="course-levels">
            <div class="course-card">
                <h2>Beginner Java</h2>
                <p>Start with the basics of Java programming.</p>
                <a href="<?php echo BASE_URL; ?>pages/beginner.php" class="btn course-btn">Start Beginner Level</a>
            </div>
            <div class="course-card">
                <h2>Intermediate Java</h2>
                <p>Enhance your skills with object-oriented programming.</p>
                <a href="<?php echo BASE_URL; ?>pages/intermediate.php" class="btn course-btn">Start Intermediate Level</a>
            </div>
            <div class="course-card">
                <h2>Advanced Java</h2>
                <p>Master advanced Java concepts and patterns.</p>
                <a href="<?php echo BASE_URL; ?>pages/advanced.php" class="btn course-btn">Start Advanced Level</a>
            </div>
        </div>
    </div>
</section>

<!-- Include Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

</body>
</html>
