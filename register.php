<?php
session_start();
include 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format. Please enter a valid email.");
    }


    if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
        die("Password must be at least 8 characters long, include at least one uppercase letter, and one number.");
    }

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);


    $stmt = $conn->prepare("INSERT INTO tblUsers (userName, email, passwordHash) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Database error: " . $conn->error);
    }
    $stmt->bind_param("sss", $username, $email, $passwordHash);


    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="auth-btn">Register</button>
    </form>
</div>
</body>
</html>
