<?php
require 'vendor/autoload.php';
session_start();

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

$client = new Google_Client();
$client->setClientId(getenv("GOOGLE_CLIENT_ID"));
$client->setClientSecret(getenv("GOOGLE_CLIENT_SECRET"));
$client->setRedirectUri(getenv("REDIRECT_URL"));

if (isset($_GET['code'])) {

    $client->authenticate($_GET['code']);
    $token = $client->getAccessToken();
    $client->setAccessToken($token);

    $oauth = new Google_Service_Oauth2($client);
    $user = $oauth->userinfo->get();

    $_SESSION['user'] = $user;

    header("Location: dashboard.php");
    exit();
} else {
    // No code returned — redirect back to login
    header("Location: index.php");
    exit();
}