<?php
include 'dbConnection.php';

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validate inputs
    if (empty($username) || empty($password)) {
        $error_message = "Please fill in both username and password.";
    } else {
        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("SELECT userId, passwordHash FROM tblUsers WHERE userName = ?");
        if (!$stmt) {
            die("Database error: " . $conn->error);
        }
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($userId, $passwordHash);
        $stmt->fetch();
        $stmt->close();

        // Verify password hash
        if ($userId && password_verify($password, $passwordHash)) {
            $_SESSION['userId'] = $userId;
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;
            header("Location: index.php"); // Redirect to homepage
            exit;
        } else {
            $error_message = "Invalid username or password.";
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Javify</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="login-page">

<?php include 'header.php'; ?>

<div class="login-wrapper">
    <div class="login-container">
        <h2>Login</h2>

        <!-- Display error message if login fails -->
        <?php if (!empty($error_message)): ?>
            <p class="login-error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST" class="login-form">
            <input type="text" name="username" class="login-input" placeholder="Username" required>
            <input type="password" name="password" class="login-input" placeholder="Password" required>
            <button type="submit" class="login-btn">Login</button>
        </form>

        <!-- Link to Registration Page -->
        <p class="register-link">Don't have an account? <a href="register.php">Create an account</a></p>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
