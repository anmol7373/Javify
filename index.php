<?php
include 'config.php'; // Include the base URL configuration file

$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javify - Learn Java Programming</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Merriweather:wght@700&display=swap" rel="stylesheet">
</head>
<body id="index-page">

<!-- Include Header -->
<?php include __DIR__ . '/includes/header.php'; ?>

<!-- Home Section -->
<section id="home" class="section">
    <div class="index-container text-center">
        <h1>Welcome to Javify</h1>
        <p>Your journey to mastering Java begins here.</p>
    </div>
</section>

<!-- Java Introduction Section -->
<section id="introduction" class="section">
    <div class="index-container text-center">
        <h2>Java Introduction</h2>
        <h3>What is Java?</h3>
        <p>Java is a popular programming language, created in 1995. It is owned by Oracle, and more than 3 billion devices run Java.</p>

        <div class="java-uses">
            <div class="java-use">
                <i class="fas fa-mobile-alt"></i>
                <p>Mobile applications (especially Android apps)</p>
            </div>
            <div class="java-use">
                <i class="fas fa-desktop"></i>
                <p>Desktop applications</p>
            </div>
            <div class="java-use">
                <i class="fas fa-globe"></i>
                <p>Web applications</p>
            </div>
            <div class="java-use">
                <i class="fas fa-server"></i>
                <p>Web servers and application servers</p>
            </div>
            <div class="java-use">
                <i class="fas fa-gamepad"></i>
                <p>Games</p>
            </div>
            <div class="java-use">
                <i class="fas fa-database"></i>
                <p>Database connections</p>
            </div>
        </div>

        <!-- Divider Section Between "What is Java" and "Why Use Java" -->
        <div class="section-divider"></div>

        <h3>Why Use Java?</h3>
        <div class="java-benefits">
            <div class="java-benefit">
                <i class="fas fa-laptop-code"></i>
                <p>Java works on different platforms (Windows, Mac, Linux, Raspberry Pi, etc.)</p>
            </div>
            <div class="java-benefit">
                <i class="fas fa-chart-line"></i>
                <p>It is one of the most popular programming languages in the world</p>
            </div>
            <div class="java-benefit">
                <i class="fas fa-smile"></i>
                <p>It is easy to learn and simple to use</p>
            </div>
            <div class="java-benefit">
                <i class="fas fa-users"></i>
                <p>Java has huge community support (tens of millions of developers)</p>
            </div>
            <div class="java-benefit">
                <i class="fas fa-shield-alt"></i>
                <p>It is secure, fast, and powerful</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="section">
    <div class="index-container text-center">
        <h2>Interactive Features</h2>
        <p>From beginner to advanced, dive into Java with interactive quizzes, coding challenges, and real-world projects.</p>
    </div>
</section>

<!-- Video Section -->
<section id="video" class="section">
    <div class="index-container text-center">
        <h2>Get a Glimpse of Java</h2>
        <div class="video-container">
            <iframe width="560" height="415" src="https://www.youtube.com/embed/t54pgbVy6t0" frameborder="0" allowfullscreen></iframe>
        </div>
        <a href="<?php echo BASE_URL; ?>pages/courses.php" class="get-started-btn">Get Started</a>
    </div>
</section>

<!-- Include Footer -->
<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
