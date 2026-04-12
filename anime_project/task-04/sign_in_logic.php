<?php
session_start();
require_once 'db_info.php'; // This now provides $users_collection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username_email = $_POST['username_email'];
    $password = $_POST['password'];

    if (empty($username_email) || empty($password)) {
        die("Please fill all fields.");
    }

    // Check user in MongoDB
    // We search for a match in either the 'username' or 'email' field
    $user = $users_collection->findOne([
        '$or' => [
            ['username' => $username_email],
            ['email' => $username_email]
        ]
    ]);

    if ($user) {
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Login success
            // Convert MongoDB ObjectId to string for session storage
            $_SESSION['user_id'] = (string)$user['_id'];
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
