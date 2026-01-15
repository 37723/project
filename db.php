<?php
$host = "sql310.infinityfree.com";
$user = "if0_40911058";
$pass = "pTmEsn2ZsHHHds";
$db   = "if0_40911058_webpagedb";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed");
}
?>
