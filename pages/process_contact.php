<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));


    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Thank You - Javify</title>
        <link rel='stylesheet' href='" . BASE_URL . "css/style.css'>
        <!-- Meta Refresh to redirect to homepage after 5 seconds -->
        <meta http-equiv='refresh' content='5;url=" . BASE_URL . "index.php'>
    </head>
    <body id='thank-you-page'>
        <div class='thank-you-container'>
            <h2>Thank you for your message, $name!</h2>
            <p>We will get back to you at <strong>$email</strong> as soon as possible.</p>
            <p>You will be redirected to the homepage in 5 seconds.</p>
            <p>If you are not redirected, <a href='" . BASE_URL . "index.php'>click here</a>.</p>
        </div>
    </body>
    </html>";
} else {
    // Redirect back to the contact page if accessed directly
    header("Location: " . BASE_URL . "pages/contact.php");
    exit;
}
