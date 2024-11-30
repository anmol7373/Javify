<?php
// Start the session to manage user login state
session_start();

// Include the configuration file for site-wide constants or settings
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
?>

<header id="index-header">
    <div class="container">
        <!-- Logo section -->
        <div class="logo">
            <img src="<?php echo BASE_URL; ?>images/Logo-2.png" alt="Javify Logo">
        </div>
        
        <!-- Navigation menu -->
        <nav>
            <ul class="nav-links">
                <!-- Core navigation links -->
                <li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>pages/courses.php">Courses</a></li>
                <li><a href="<?php echo BASE_URL; ?>pages/quizzes.php">Quizzes</a></li>
                <!-- Display "Scoreboard" link only if the user is logged in -->
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <li><a href="<?php echo BASE_URL; ?>pages/scoreboard.php">Scoreboard</a></li>
                <?php endif; ?>
                <li><a href="<?php echo BASE_URL; ?>pages/contact.php">Contact</a></li>
            </ul>

            <!-- Authentication-related links -->
            <ul class="auth-links">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <!-- Display personalized greeting and logout option if the user is logged in -->
                    <li><a href="<?php echo BASE_URL; ?>pages/profile.php" class="auth-btn">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                    <li><a href="<?php echo BASE_URL; ?>pages/logout.php" class="auth-btn">Logout</a></li>
                <?php else: ?>
                    <!-- Display login and register options if the user is not logged in -->
                    <li><a href="<?php echo BASE_URL; ?>pages/login.php" class="auth-btn">Login</a></li>
                    <li><a href="<?php echo BASE_URL; ?>pages/register.php" class="auth-btn">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
