<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
?>
<header id="index-header">
    <div class="container">
        <div class="logo">
            <img src="<?php echo BASE_URL; ?>images/Logo-2.png" alt="Javify Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>pages/courses.php">Courses</a></li>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <li><a href="<?php echo BASE_URL; ?>pages/scoreboard.php">Scoreboard</a></li>
                <?php endif; ?>
                <li><a href="<?php echo BASE_URL; ?>pages/contact.php">Contact</a></li>
            </ul>
            <ul class="auth-links">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <li><a href="<?php echo BASE_URL; ?>pages/profile.php" class="auth-btn">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                    <li><a href="<?php echo BASE_URL; ?>pages/logout.php" class="auth-btn">Logout</a></li>
                <?php else: ?>
                    <li><a href="<?php echo BASE_URL; ?>pages/login.php" class="auth-btn">Login</a></li>
                    <li><a href="<?php echo BASE_URL; ?>pages/register.php" class="auth-btn">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
