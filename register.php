<?php
include "../config/db.php";

$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];

/* Basic validation */
if ($password !== $confirm) {
    die("Passwords do not match");
}

/* Check if user already exists */
$check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    die("Email already registered");
}

/* Secure password hashing */
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

/* Insert user */
mysqli_query(
    $conn,
    "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')"
);

/* Redirect to login */
header("Location: ../index.php");
exit;
