<?php
session_start();
include 'includes/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO posts (title, content, user_id) VALUES ('$title', '$content',
    $user_id)";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
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
<link rel="stylesheet" href="css/style.css">
<title>Create Post</title>
</head>
<body>
<h2>Create New Post</h2>
<form action="create_post.php" method="POST">
<label for="title">Title:</label>
<input type="text" name="title" required>
<br>
<label for="content">Content:</label>
<textarea name="content" required></textarea>
<br>
<button type="submit">Create Post</button>
</form>
<a class="bottom-text" href="dashboard.php">Back to Dashboard</a>
</body>
</html>
