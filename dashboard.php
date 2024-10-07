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
        <a href="edit_post.php?id=<?php echo $post['id']; ?>" class="no-link-style">Edit</a>
        <a class="delete no-link-style" href="delete_post.php?id=<?php echo $post['id']; ?>">Delete</a>
    </div>
    <h4><a href="view_post.php?id=<?php echo $post['id']; ?>" class="no-link-style"><?php echo $post['title']; ?></a></h4>
    <p><a href="view_post.php?id=<?php echo $post['id']; ?>" class="no-link-style"><?php echo $post['content']; ?></a></p>
    <a style="font-size: 0.8em; color: gray;" class="no-link-style">Posted on: <?php echo date('F j, Y, H:i', strtotime($post['created_at'])); ?></a>
</div>
<?php endwhile; ?>
</body>
</html>