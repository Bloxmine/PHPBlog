<?php
session_start();
include 'includes/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$post_id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $post_id";
$result = $conn->query($sql);
$post = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/dashboard.css">
        <title><?php echo $post['title']; ?></title>
    </head>
<body>
<h2><?php echo $post['title']; ?></h2>
<p><?php echo $post['content']; ?></p>
<a style="font-size: 0.8em; color: gray;">Posted on: <?php echo date('F j, Y, H:i', strtotime($post['created_at'])); ?></a>
<div class="post-actions">
    <a href="edit_post.php?id=<?php echo $post['id']; ?>">Edit</a>
    <a class="delete" href="delete_post.php?id=<?php echo $post['id']; ?>">Delete</a>
</div>
<a href="dashboard.php">Back to Dashboard</a>
</body>
</html>