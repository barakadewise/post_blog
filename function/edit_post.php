<?php
include '../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $postId = $_POST['postId'];
  $title = $_POST['title'];
  $category = $_POST['category'];
  $content = $_POST['content'];

  $sql = "UPDATE posts SET title=?, category=?, content=? WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sssi', $title, $category, $content, $postId);

  if ($stmt->execute()) {
    echo "Post updated successfully";
  } else {
    echo "Error updating post: " . $conn->error;
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Invalid request method";
}
?>
