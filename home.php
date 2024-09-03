<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user posts
$sql = "SELECT content, created_at FROM posts WHERE user_id = $user_id ORDER BY created_at DESC";
$posts = $connection->query($sql);

// Fetch friends
$sql = "SELECT users.username FROM friends
        JOIN users ON friends.friend_id = users.id
        WHERE friends.user_id = $user_id AND friends.status = 'accepted'";
$friends = $connection->query($sql);
?>

<h1>Welcome to your Home Page</h1>

<h2>Your Posts</h2>
<?php if ($posts->num_rows > 0): ?>
    <?php while($post = $posts->fetch_assoc()): ?>
        <p><?php echo $post['content']; ?> <em>(<?php echo $post['created_at']; ?>)</em></p>
    <?php endwhile; ?>
<?php else: ?>
    <p>You have not posted anything yet.</p>
<?php endif; ?>

<h2>Your Friends</h2>
<?php if ($friends->num_rows > 0): ?>
    <?php while($friend = $friends->fetch_assoc()): ?>
        <p><?php echo $friend['username']; ?></p>
    <?php endwhile; ?>
<?php else: ?>
    <p>You have no friends yet.</p>
<?php endif; ?>

<a href="post.php">Create a New Post</a> | <a href="logout.php">Logout</a>
