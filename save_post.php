<?php
include 'db.php';

$title = $_POST['title'];
$content = $_POST['content'];

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    die('Error al subir la imagen.');
}

$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$imageName = basename($_FILES['image']['name']);
$targetFile = $uploadDir . time() . '_' . $imageName;

if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
    $stmt = $conn->prepare("INSERT INTO posts (title, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $targetFile);
    $stmt->execute();
    echo "Post guardado correctamente.";
    $stmt->close();
} else {
    echo "Error al guardar la imagen.";
}

$conn->close();
?>