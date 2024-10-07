<?php
include 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password) VALUES ('$username',
    '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
</head>
<body>
<h2>Register</h2>
<form action="register.php" method="POST">
<label for="username">Username:</label>
<input type="text" name="username" required>
<br>
<label for="password">Password:</label>
<input type="password" name="password" required>
<br>
<button type="submit">Register</button>
</form>
<a href="login.php">Already have an account? Login</a>
</body>
</html>
