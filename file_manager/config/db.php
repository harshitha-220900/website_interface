<?php
require __DIR__ . '/../vendor/autoload.php';

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->selectDatabase('my_file_manager');
    $users = $db->users;
} catch (Exception $e) {
    die("Error connecting to database: " . $e->getMessage());
}
?>
