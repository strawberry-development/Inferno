<?php
session_start();
require_once './key/key.php';

$errors = [];
$success = false;
$username = '';
$tripcode = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username)) {
        $errors[] = 'Username is required.';
    }
    if (empty($password)) {
        $errors[] = 'Password is required.';
    }

    if (empty($errors)) {
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $tripcode = generateTripcode($username, $password);
        $_SESSION['users'][$username] = $tripcode;
        $success = true;
    }
}

function generateTripcode($username, $password) {
    $salt = hash('sha256', $password . SECRET_KEY, true);
    $hash = hash_hmac('sha512', $username . $password . $salt, SECRET_KEY, true);
    return substr(base64_encode($hash), 0, 10);
}

function verifyTripcode($username, $password) {
    $expectedTripcode = generateTripcode($username, $password);
    $storedTripcode = $_SESSION['users'][$username] ?? null;
    return $storedTripcode === $expectedTripcode;
}