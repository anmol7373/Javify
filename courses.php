<?php
    session_start();
    $isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    if (!$isLoggedIn) {

        header("Location: index.php");
        exit;
    }
    $username = $isLoggedIn ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javify - Java Courses</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="courses-page">

<!-- Navbar (Include the same navbar as in the index) -->
<header id="index-header">
    <div class="index-container">
        <div class="logo">
            <img src="images/Logo-2.png" alt="Javify Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="courses.php" class="active">Courses</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="auth-links">
                <?php if ($isLoggedIn): ?>
                    <li><a href="profile.php" class="btn auth-btn">Hello, <?php echo htmlspecialchars($username); ?></a></li>
                    <li><a href="logout.php" class="btn auth-btn">Logout</a></li>
                <?php else: ?>
                    <li><a href="login_register.php" class="btn auth-btn">Login / Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<!-- Main Content Section -->
<section id="course-selection">
    <div class="index-container text-center">
        <h1>Choose Your Java Level</h1>
        <p>Select your level to start learning Java.</p>
        <div class="course-levels">
            <div class="course-card">
                <h2>Beginner Java</h2>
                <p>Start with the basics of Java programming.</p>
                <a href="beginner.php" class="btn course-btn">Start Beginner Level</a>
            </div>
            <div class="course-card">
                <h2>Intermediate Java</h2>
                <p>Enhance your skills with object-oriented programming.</p>
                <a href="intermediate.php" class="btn course-btn">Start Intermediate Level</a>
            </div>
            <div class="course-card">
                <h2>Advanced Java</h2>
                <p>Master advanced Java concepts and patterns.</p>
                <a href="advanced.php" class="btn course-btn">Start Advanced Level</a>
            </div>
        </div>
    </div>
</section>

</body>
</html>
