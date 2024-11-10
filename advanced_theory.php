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
    <title>Javify - Advanced Java</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="advanced-page">

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

<!-- Content Section -->
<section id="advanced-content">
    <div class="index-container text-center">
        <h1>Advanced Java Theory</h1>
        
        <h2>Java Memory Management and Garbage Collection</h2>
        <p>Java provides different garbage collection algorithms to manage memory, such as Serial, Parallel, CMS, and G1.</p>

        <h2>Java Concurrency and Synchronization Mechanisms</h2>
        <p>Advanced concurrency mechanisms include ReentrantLock and ThreadLocal variables.</p>

        <h2>Design Patterns in Java</h2>
        <ul>
            <li><strong>Singleton Pattern:</strong> Ensures a class has only one instance.</li>
            <li><strong>Factory Pattern:</strong> Provides an interface for creating objects.</li>
            <li><strong>Observer Pattern:</strong> Notifies dependents when an object’s state changes.</li>
        </ul>

        <h2>Java Stream API Advanced Operations</h2>
        <ul>
            <li><strong>flatMap:</strong> Flattens nested collections.</li>
            <li><strong>reduce:</strong> Combines stream elements.</li>
            <li><strong>Parallel Streams:</strong> Utilizes multiple cores for data processing.</li>
        </ul>

        <h2>Annotations and Meta-Annotations</h2>
        <p>Annotations provide metadata for code elements. Custom annotations can be created as well.</p>

        <h2>Java Modules</h2>
        <p>Java modules allow developers to encapsulate code and explicitly state dependencies.</p>

        <h2>Java Native Interface (JNI)</h2>
        <p>JNI allows Java to interact with native code written in other languages like C and C++.</p>
    </div>
</section>

</body>
</html>
