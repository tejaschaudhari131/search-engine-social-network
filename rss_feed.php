<?php
header("Content-Type: application/rss+xml; charset=UTF-8");

include 'config.php';

echo '<?xml version="1.0" encoding="UTF-8" ?>';
echo '<rss version="2.0"><channel>';
echo '<title>Social Network Posts</title>';
echo '<link>http://localhost/social-network</link>';
echo '<description>Latest posts from the social network</description>';

$sql = "SELECT content, created_at FROM posts ORDER BY created_at DESC LIMIT 10";
$posts = $connection->query($sql);

while ($post = $posts->fetch_assoc()) {
    echo '<item>';
    echo '<title>' . htmlspecialchars($post['content']) . '</title>';
    echo '<pubDate>' . date(DATE_RSS, strtotime($post['created_at'])) . '</pubDate>';
    echo '</item>';
}

echo '</channel></rss>';
?>
