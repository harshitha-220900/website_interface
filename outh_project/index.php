<?php
// Load .env file manually
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($key, $value) = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value));
    }
}

require 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId(getenv("GOOGLE_CLIENT_ID"));
$client->setClientSecret(getenv("GOOGLE_CLIENT_SECRET"));
$client->setRedirectUri(getenv("REDIRECT_URL"));

$client->addScope("email");
$client->addScope("profile");

$login_url = $client->createAuthUrl();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Customer Support</title>
</head>

<body>
    <h2>Customer Support Page</h2>
    <a href="<?= $login_url ?>">Login with Google</a>
</body>

</html>