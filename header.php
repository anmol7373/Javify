<header id="main-header">
    <div class="header-container">
        <div class="logo">
            <img src="images/Logo-2.png" alt="Javify Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <div class="auth-links">
            <!-- Adjust links based on user login status -->
            <?php if ($isLoggedIn): ?>
                <a href="profile.php" class="btn auth-btn">Hello, <?php echo htmlspecialchars($username); ?></a>
                <a href="logout.php" class="btn auth-btn">Logout</a>
            <?php else: ?>
                <a href="login_register.php" class="btn auth-btn">Login / Register</a>
            <?php endif; ?>
        </div>
    </div>
</header>
