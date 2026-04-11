<?php
require 'db_info.php';

// Drop the table and recreate it properly
$drop = "DROP TABLE IF EXISTS users_info";
if (mysqli_query($conn, $drop)) {
    echo "Table dropped.\n";
} else {
    echo "Error dropping table: " . mysqli_error($conn) . "\n";
}

$create = "CREATE TABLE users_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
if (mysqli_query($conn, $create)) {
    echo "Table created correctly.\n";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "\n";
}
?>
