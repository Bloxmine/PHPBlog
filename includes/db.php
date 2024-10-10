<?php
// Include the secrets file
include 'secrets.php';

// Database connection
$host = $db_credentials['host'];
$db = $db_credentials['db'];
$user = $db_credentials['user'];
$pass = $db_credentials['pass'];

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>