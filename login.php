<?php
session_start();
include 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];


    if (empty($username) || empty($password)) {
        die("Please fill in both username and password.");
    }


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
        header("Location: index.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="auth-btn">Login</button>
    </form>
</div>
</body>
</html>
