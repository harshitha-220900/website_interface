<?php
session_start();
$_SESSION['user_id'] = 1;
$_SESSION['username'] = 'test_user';
$_SESSION['email'] = 'test@example.com';
require 'home_page.php';
?>
