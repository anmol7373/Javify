<?php
// Include the configuration file for site-wide constants or settings
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
?>

<footer id="main-footer">
    <div class="footer-container">
        <!-- Footer logo and description -->
        <div class="footer-logo">
            <img src="<?php echo BASE_URL; ?>images/Logo-2.png" alt="Javify Logo">
            <p>Javify - Your journey to mastering Java</p>
        </div>
        
        <!-- Quick links section -->
        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>pages/courses.php">Courses</a></li>
                <li><a href="<?php echo BASE_URL; ?>pages/quizzes.php">Quizzes</a></li>
                <!-- Display "Scoreboard" link only if the user is logged in -->
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <li><a href="<?php echo BASE_URL; ?>pages/scoreboard.php">Scoreboard</a></li>
                <?php endif; ?>
                <li><a href="<?php echo BASE_URL; ?>pages/contact.php">Contact</a></li>
                <!-- Display "Profile" link only if the user is logged in -->
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <li><a href="<?php echo BASE_URL; ?>pages/profile.php">Profile</a></li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Contact information section -->
        <div class="footer-contact">
            <h4>Contact Us</h4>
            <p>Email: support@javify.com</p>
            <p>Phone: +123 456 7890</p>
        </div>
    </div>

    <!-- Footer bottom section for copyright -->
    <div class="footer-bottom">
        <p>&copy; 2024 Javify. All rights reserved.</p>
    </div>
</footer>
