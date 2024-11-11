<?php
session_start();
session_unset();
session_destroy();

include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php'; // Ensure BASE_URL is included

// Redirect to the login page after logout
header("Location: " . BASE_URL . "pages/login.php");
exit;
?>
