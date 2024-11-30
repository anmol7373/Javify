<?php
// Define database credentials
$servername = "localhost";  // Server name
$username = "root";         // Database username
$password = "";             // Database password
$dbname = "javify";         // Name of the database

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection for errors
if ($conn->connect_error) {
    // If the connection fails, terminate the script and display an error message
    die("Connection failed: " . $conn->connect_error);
}
?>
