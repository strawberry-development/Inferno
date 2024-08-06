<?php
function generateUserIdFromIp($ip): string
{
    return hash('sha256', $ip);
}

$ip = $_SERVER['REMOTE_ADDR'];
$userId = generateUserIdFromIp($ip);

if (!isset($users[$userId])) {
    $users[$userId] = [
        'username' => 'User_' . substr($userId, 0, 8),
        'ip' => $ip,
        'login_time' => date('Y-m-d H:i:s')
    ];
    // Do something
}

$_SESSION['username'] = $users[$userId]['username'];
$_SESSION['login_time'] = $users[$userId]['login_time'];