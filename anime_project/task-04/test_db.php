<?php
require 'db_info.php';
$result = mysqli_query($conn, "DESCRIBE users_info");
while($row = mysqli_fetch_assoc($result)) {
    print_r($row);
}
echo "\n---USERS---\n";
$result2 = mysqli_query($conn, "SELECT * FROM users_info");
if ($result2) {
    while($row = mysqli_fetch_assoc($result2)) {
        print_r($row);
    }
} else {
    echo mysqli_error($conn);
}
?>
