<?php
include '../config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $postId = $_POST['id'];

  
  $sql = "DELETE FROM posts WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $postId);

  if ($stmt->execute()) {
    echo "Post deleted successfully.";
  } else {
    echo "Error deleting post: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>
