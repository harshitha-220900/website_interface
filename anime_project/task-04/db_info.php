<?php
require __DIR__ . '/../vendor/autoload.php';

try {
    // Connect to MongoDB
    $client = new MongoDB\Client("mongodb://localhost:27017");
    
    // Select the database
    $db = $client->selectDatabase('anime_db');
    
    // Select the collection (equivalent to a MySQL table)
    $users_collection = $db->selectCollection('users_info');

    // For simplicity, we can also keep a reference to the collection in a variable named $conn
    // if we want to minimize changes, but it's better to be explicit.
    $conn = $client; 
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
