<?php
$host = "sql104.infinityfree.com";
$user = "if0_42843290";
$pass = "xEptszfCm7F"; 
$db   = "if0_42843290_memot";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");
?>