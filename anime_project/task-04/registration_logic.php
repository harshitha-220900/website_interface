<?php
session_start();
require_once 'db_info.php'; // This now provides $users_collection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
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
    // MongoDB usage: findOne with $or operator
    $existingUser = $users_collection->findOne([
        '$or' => [
            ['username' => $username],
            ['email' => $email]
        ]
    ]);

    if ($existingUser) {
        die("Username or Email already exists. <a href='register.html'>Try again</a>");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    try {
        $result = $users_collection->insertOne([
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password,
            'created_at' => new MongoDB\BSON\UTCDateTime()
        ]);

        if ($result->getInsertedCount() === 1) {
            // Fetch the user ID (MongoDB ObjectId converted to string)
            $user_id = (string)$result->getInsertedId();
            
            // Auto-login the user
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            // Redirect to the dashboard
            header("Location: ../home_page.php");
            exit();
        } else {
            die("Error joining the anime world. Please try again.");
        }
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: register.html");
    exit();
}
?>
