<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Registration Successful'); window.location='index.html';</script>";
    } else {
        echo "<script>alert('Error: Email already exists'); window.location='register.html';</script>";
    }
}
?>
