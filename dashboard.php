<?php
session_start();
include 'includes/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM posts WHERE user_id = $user_id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/dashboard.css">
<title>Dashboard</title>
</head>
<body>
<h2>Baby's First PHP Blog</h2>
<div class="top-right-buttons">
    <a class="create-post" href="create_post.php">Create New Post</a>
    <a class="logout" href="logout.php">Logout</a>
</div>
<h3>Your Posts</h3>
<?php while ($post = $result->fetch_assoc()): ?>
<div class="post">
    <div class="post-actions">
        <a href="edit_post.php?id=<?php echo $post['id']; ?>">Edit</a>
        <a class="delete" href="delete_post.php?id=<?php echo $post['id']; ?>">Delete</a>
    </div>
    <h4><?php echo $post['title']; ?></h4>
    <p><?php echo $post['content']; ?></p>
    <a style="font-size: 0.8em; color: gray;">Posted on: <?php echo date('F j, Y, H:i', strtotime($post['created_at'])); ?></a>
</div>
<?php endwhile; ?>
</body>
</html>
