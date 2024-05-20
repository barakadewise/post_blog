<?php 
$hostname = "localhost"; 
$database = "blog_db";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
return $conn;  
?>
