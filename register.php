<?php
include 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format. Please enter a valid email.";
    } elseif (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
        // Validate password complexity
        $error_message = "Password must be at least 8 characters long, include at least one uppercase letter, and one number.";
    } else {
        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Insert into the database
        $stmt = $conn->prepare("INSERT INTO tblUsers (userName, email, passwordHash) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Database error: " . $conn->error);
        }
        $stmt->bind_param("sss", $username, $email, $passwordHash);

        if ($stmt->execute()) {
            $success_message = "Registration successful. <a href='login.php'>Login here</a>";
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Javify</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="register-page">

<?php include 'header.php'; ?>

<div class="register-wrapper">
    <div class="register-container">
        <h2>Register</h2>

        <!-- Display success or error message -->
        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php elseif (!empty($success_message)): ?>
            <p class="success-message"><?php echo $success_message; ?></p>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="auth-btn">Register</button>
        </form>
        <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
