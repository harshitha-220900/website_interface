<?php
session_start();
require_once 'db_info.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic validation
    if (empty($username) || empty($email) || empty($password)) {
        die("Please fill all fields.");
    }

    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Check if user already exists
    $check_user = "SELECT * FROM users_info WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $check_user);
    if (mysqli_num_rows($result) > 0) {
        die("Username or Email already exists. <a href='register.html'>Try again</a>");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $sql = "INSERT INTO users_info (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        // Fetch the user ID of the inserted record
        $user_id = mysqli_insert_id($conn);
        
        // Auto-login the user
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        // Redirect to the dashboard
        header("Location: ../home_page.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: register.html");
    exit();
}
?>
