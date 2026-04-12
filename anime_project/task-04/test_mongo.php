<?php
require_once 'db_info.php';

try {
    // List databases to test connection
    $dbs = $client->listDatabases();
    echo "<h3>Successfully connected to MongoDB!</h3>";
    echo "<b>Available Databases:</b><ul>";
    foreach ($dbs as $db_info) {
        echo "<li>" . $db_info->getName() . "</li>";
    }
    echo "</ul>";

    // Test collection
    $count = $users_collection->countDocuments();
    echo "<b>Collection 'users_info' in 'anime_db' has $count documents.</b>";
} catch (Exception $e) {
    echo "<h3>Failed to connect to MongoDB</h3>";
    echo "Error: " . $e->getMessage();
}
?>
