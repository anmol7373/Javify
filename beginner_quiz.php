<?php
session_start();
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javify - Beginner Java Quiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="beginner-quiz-page">

<!-- Navbar -->
<header id="index-header">
    <div class="index-container">
        <div class="logo">
            <img src="images/Logo-2.png" alt="Javify Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="contact.php">Contact</a></li>
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

<!-- Quiz Content Section -->
<section id="beginner-quiz-content">
    <div class="index-container text-center">
        <h1>Beginner Java Quiz</h1>
        
        <h2>Multiple Choice Questions</h2>
        <ol>
            <li>Who developed Java?
                <ul>
                    <li>A) Dennis Ritchie</li>
                    <li>B) James Gosling</li>
                    <li>C) Bjarne Stroustrup</li>
                    <li>D) Guido van Rossum</li>
                </ul>
            </li>
            <li>Which edition of Java is used for desktop applications?
                <ul>
                    <li>A) Java Standard Edition (JSE)</li>
                    <li>B) Java Micro Edition (JME)</li>
                    <li>C) Java Enterprise Edition (JEE)</li>
                    <li>D) Java Virtual Edition (JVE)</li>
                </ul>
            </li>
            <!-- Continue listing all MCQ questions in similar format -->
        </ol>

        <h2>Open-ended Questions</h2>
        <ol start="6">
            <li>What is a class in Java?</li>
            <li>Why is Java considered platform-independent?</li>
            <!-- Continue listing all open-ended questions -->
        </ol>

        <h2>Drag-and-Drop Questions</h2>
        <p>Match the types of Java applications with their descriptions:</p>
        <ul>
            <li>Standalone Application</li>
            <li>Web Application</li>
            <li>Enterprise Application</li>
            <li>Mobile Application</li>
        </ul>
        <p>Descriptions:
            <ol>
                <li>Applications that run on a desktop with a graphical user interface</li>
                <li>Applications that run on servers</li>
                <li>Distributed applications for large businesses</li>
                <li>Applications designed for smartphones</li>
            </ol>
        </p>
        <!-- Continue with the second drag-and-drop set -->

        <h2>True or False Questions (Bonus)</h2>
        <ol start="13">
            <li>Java supports multi-threading, allowing multiple tasks to run simultaneously.</li>
            <li>Java was originally called OAK.</li>
            <!-- Continue listing all true or false questions -->
        </ol>
    </div>
</section>

</body>
</html>
