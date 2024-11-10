<?php
session_start();
?>
<header id="index-header">
    <div class="container">
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
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <li><a href="profile.php" class="auth-btn">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                    <li><a href="logout.php" class="auth-btn">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php" class="auth-btn">Login</a></li>
                    <li><a href="register.php" class="auth-btn">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
