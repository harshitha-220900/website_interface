<?php
session_start();
require_once 'db_info.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username_email = mysqli_real_escape_string($conn, $_POST['username_email']);
    $password = $_POST['password'];

    if (empty($username_email) || empty($password)) {
        die("Please fill all fields.");
    }

    // Check user in database
    $sql = "SELECT * FROM users_info WHERE username='$username_email' OR email='$username_email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Login success
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            header("Location: ../home_page.php");
            exit();
        } else {
            die("Invalid password. <a href='sign_in.html'>Go back</a>");
        }
    } else {
        die("User not found. <a href='register.html'>Register here</a>");
    }
} else {
    header("Location: sign_in.html");
    exit();
}
?>
