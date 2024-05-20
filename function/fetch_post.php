<?php
include '../config/connection.php';

$sql = "SELECT * FROM posts ORDER BY createdAt DESC"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-12">';
        echo '  <div class="card">';
        echo '    <img src="' . $row['img_url'] . '" style="height: 400px; object-fit: cover" class="card-img-top img-fluid" />';
        echo '    <div class="card-title mt-1 px-2">';
        echo '      <h3 class="text-muted">' . htmlspecialchars($row['title']) . '</h3>';
        echo '      <p class="text-muted">Category: ' . htmlspecialchars($row['category']) . '</p>';
        echo '    </div>';
        echo '    <div class="card-body px-2">';
        echo '      <p>' . htmlspecialchars($row['content']) . '</p>';
        echo '    </div>';
        echo '    <div class="card-footer">';
        echo '      <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editModal" ';
        echo '        data-id="' . $row['id'] . '" ';
        echo '        data-title="' . htmlspecialchars($row['title']) . '" ';
        echo '        data-category="' . htmlspecialchars($row['category']) . '" ';
        echo '        data-content="' . htmlspecialchars($row['content']) . '">';
        echo '        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">';
        echo '          <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>';
        echo '        </svg>';
        echo '        Edit';
        echo '      </button>';
        echo '      <button class="btn btn-outline-danger deletePostBtn" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . $row['id'] . '" data-title="' . htmlspecialchars($row['title']) . '">';
        echo '        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">';
        echo '          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>';
        echo '        </svg>';
        echo '        Delete';
        echo '      </button>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    }
} else {
    echo '<div class="row"><p class="text-center">No posts available.</p></div>';
}

$conn->close();
?>
