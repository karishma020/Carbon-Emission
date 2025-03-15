<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["user"] = $row["email"];
            header("Location: dashboard.html");
            exit();
        } else {
            echo "<script>alert('Invalid Credentials'); window.location='index.html';</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials'); window.location='index.html';</script>";
    }
}
?>
