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
    <title>Javify - Intermediate Java</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="intermediate-page">

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
<section id="intermediate-content">
    <div class="index-container text-center">
        <h1>Intermediate Java Theory</h1>
        
        <h2>Interfaces in Java</h2>
        <p>Interfaces provide full abstraction by allowing developers to define methods without implementations. They enable multiple inheritance in Java.</p>

        <h2>Abstract Classes</h2>
        <p>Abstract classes are similar to interfaces but can have method bodies. They provide a common base for subclasses with specific implementations.</p>

        <h2>Generics in Java</h2>
        <p>Generics provide type safety and allow code reuse for different data types.</p>

        <h2>Lambda Expressions and Functional Interfaces</h2>
        <p>Introduced in Java 8, lambda expressions offer a way to implement functional interfaces concisely.</p>

        <h2>Streams API</h2>
        <p>The Streams API enables data processing in a functional style with operations like filter, map, and reduce.</p>

        <h2>Concurrency with Executors</h2>
        <p>The Executor framework simplifies asynchronous task execution by managing thread lifecycles.</p>

        <h2>Java Reflection</h2>
        <p>Reflection allows a program to inspect and modify classes, methods, and fields at runtime.</p>
    </div>
</section>

</body>
</html>
