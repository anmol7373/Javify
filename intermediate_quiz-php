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
    <title>Javify - Intermediate Java Quiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="intermediate-quiz-page">

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
<section id="intermediate-quiz-content">
    <div class="index-container text-center">
        <h1>Intermediate Java Quiz</h1>
        
        <h2>Multiple Choice Questions</h2>
        <ol>
            <li>Which of the following is true about interfaces in Java?
                <ul>
                    <li>A) Interfaces can contain constructors</li>
                    <li>B) A class can implement multiple interfaces</li>
                    <!-- Continue listing options -->
                </ul>
            </li>
            <!-- Continue listing all MCQ questions in similar format -->
        </ol>

        <h2>Open-ended Questions</h2>
        <ol start="6">
            <li>What is the key difference between an abstract class and an interface in Java?</li>
            <!-- Continue listing all open-ended questions -->
        </ol>

        <h2>Drag-and-Drop Questions</h2>
        <p>Match the components with their descriptions:</p>
        <ul>
            <li>Abstract Class</li>
            <li>Lambda Expression</li>
            <!-- Continue listing components -->
        </ul>
        <p>Descriptions:
            <ol>
                <li>Provides a mechanism for thread management and task execution</li>
                <!-- Continue listing descriptions -->
            </ol>
        </p>
        
        <h2>True or False Questions (Bonus)</h2>
        <ol start="13">
            <li>Generics in Java ensure type safety at runtime.</li>
            <!-- Continue listing all true or false questions -->
        </ol>
    </div>
</section>

</body>
</html>
