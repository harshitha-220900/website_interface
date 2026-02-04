<?php
$conn = mysqli_connect("localhost", "root", "", "anime_db");
if (!$conn) {
  die("Database connection failed");
}

$username    = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users_info 
        WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
  header("Location: index.html");
} else {
  echo "<script>alert('Login failed')</script>";
  mysqli_error($conn);
  header("Location: login.html");
}
?>

