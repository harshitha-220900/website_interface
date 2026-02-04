<?php
$conn = mysqli_connect("localhost", "root", "", "anime_db");
if (!$conn) {
  die("Database connection failed");
}
if(!isset($_POST['username'], $_POST['email'], $_POST['password'])) {
  die("Please complete the registration form");
}
$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users_info (username, email, password)
        VALUES ('$username', '$email', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
  header("Location: index.html");
} else {
  echo "Registration failed";
mysqli_error($conn);
}
?>


