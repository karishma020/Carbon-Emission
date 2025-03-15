<?php
$host = "localhost";
$user = "root"; // Change if needed
$pass = ""; // Your MySQL password
$dbname = "carbon_tracking";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
