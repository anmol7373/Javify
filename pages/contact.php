<!-- Handle contact page -->

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Javify</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
</head>
<body id="contact-page">

<!-- Include Header -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php'; ?>

<!-- Contact Form Section -->
<section id="contact-content">
    <div class="contact-container">
        <h1>Contact Us</h1>
        <p>If you have any questions, feel free to reach out to us using the form below.</p>

        <form action="<?php echo BASE_URL; ?>pages/process_contact.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
            </div>
            <button type="submit" class="contact-btn">Send Message</button>
        </form>
    </div>
</section>

<!-- Include Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

</body>
</html>
