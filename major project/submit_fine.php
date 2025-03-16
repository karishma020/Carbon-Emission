<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carbon_emission_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$ref_number = $_POST['ref-number'];
$amount = $_POST['amount'];

// Insert into database
$sql = "INSERT INTO fines (name, email, phone, ref_number, amount) VALUES ('$name', '$email', '$phone', '$ref_number', '$amount')";

if ($conn->query($sql) === TRUE) {
    echo "Fine recorded successfully!";
    header("Location: profile.php?email=" . urlencode($email));
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
