<?php
session_start();
include 'includes/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$post_id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$post_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM posts WHERE id=$post_id";
    $result =
    $conn->query($sql);
    $post = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Post</title>
</head>
<body>
<h2>Edit Post</h2>
<form action="edit_post.php?id=<?php echo $post_id; ?>" method="POST">
<label for="title">Title:</label>
<input type="text" name="title" value="<?php echo $post['title']; ?>" required>
<br>
<label for="content">Content:</label>
<textarea name="content" required><?php echo $post['content']; ?></textarea>
<br>
<button type="submit">Update Post</button>
</form>
<a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
