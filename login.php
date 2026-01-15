<?php
session_start();
include "../config/db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user['email'];
    header("Location: ../dashboard.php");
} else {
    echo "Invalid login";
}
