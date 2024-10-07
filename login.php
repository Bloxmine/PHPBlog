<?php
session_start();
include 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that username.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<title>Login</title>
</head>
<body>
<h2>Login</h2>
<form action="login.php" method="POST">
<label for="username">Username:</label>
<input type="text" name="username" required>
<br>
<label for="password">Password:</label>
<input type="password" name="password" required>
<br>
<button type="submit">Login</button>
</form>
<a class="bottom-text" href="register.php">Don't have an account? Register</a>
</body>
</html>
