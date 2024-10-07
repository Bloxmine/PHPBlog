<?php
// Database connection
$host = '192.168.15.55';
$db = 'i426389_databasea';
$user = 'i426389_databasea';
$pass = 'Qqb5S5mJcDzyg4NBNdEF';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
