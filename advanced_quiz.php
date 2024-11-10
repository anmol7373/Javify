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
    <title>Javify - Advanced Java Quiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="advanced-quiz-page">

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
<section id="advanced-quiz-content">
    <div class="index-container text-center">
        <h1>Advanced Java Quiz</h1>
        
        <h2>Multiple Choice Questions</h2>
        <ol>
            <li>Which garbage collector in Java is designed to balance between throughput and low-latency applications?
                <ul>
                    <li>A) Serial GC</li>
                    <li>B) Parallel GC</li>
                    <!-- Continue listing options -->
                </ul>
            </li>
            <!-- Continue listing all MCQ questions in similar format -->
        </ol>

        <h2>Open-ended Questions</h2>
        <ol start="6">
            <li>What is the difference between synchronized and ReentrantLock in Java, and when would you use ReentrantLock over synchronized?</li>
            <!-- Continue listing all open-ended questions -->
        </ol>

        <h2>Drag-and-Drop Questions</h2>
        <p>Match the garbage collectors to their descriptions:</p>
        <ul>
            <li>Serial GC</li>
            <li>Parallel GC</li>
            <!-- Continue listing components -->
        </ul>
        <p>Descriptions:
            <ol>
                <li>Low-latency garbage collection with concurrent phases, but susceptible to memory fragmentation.</li>
                <!-- Continue listing descriptions -->
            </ol>
        </p>
        
        <h2>True or False Questions (Bonus)</h2>
        <ol start="13">
            <li>The flatMap() method in the Stream API is used to flatten collections of elements into a single stream.</li>
            <!-- Continue listing all true or false questions -->
        </ol>
    </div>
</section>

</body>
</html>
