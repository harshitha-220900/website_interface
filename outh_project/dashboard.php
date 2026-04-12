<?php
require 'vendor/autoload.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];
?>

<h2>Welcome
    <?= $user->name ?>
</h2>
<p>Email:
    <?= $user->email ?>
</p>
<img src="<?= $user->picture ?>" width="100">

<br><br>
<a href="logout.php">Logout</a>