<?php
include 'db.php';

$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");

while ($row = $result->fetch_assoc()) {
    echo "<div class='post'>";
    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
    echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
    echo "<img src='" . htmlspecialchars($row['image']) . "' alt='Imagen del post'>";
    echo "<small>Publicado el " . $row['created_at'] . "</small>";
    echo "</div>";
}

$conn->close();
?>