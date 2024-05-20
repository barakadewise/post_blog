<?php
include '../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $category = $_POST['category'];
  $content = $_POST['content'];
  $img_url = '';

  $response = '';

  // Handle file upload
  if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $originalName = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $uniqueName = $originalName . '_' . uniqid() . '.' . $extension;
    $targetDir = "../assets/uploads/";
    $targetFilePath = $targetDir . $uniqueName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
      
      $img_url = 'http://localhost/post/assets/uploads/' .$uniqueName;
    }
  }

  // Insert post data into database
  $sql = "INSERT INTO posts (title, content, category,  img_url) VALUES ('$title', '$content','$category', '$img_url')";
  if ($conn->query($sql) === TRUE) {
   
    echo '<div class="alert alert-success" role="alert">New post added successfully!</div>';
  } else {
    
    echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . $conn->error . '</div>';
  }

  $conn->close();
}
?>
