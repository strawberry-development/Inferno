<?php
define('AUDIO_FILE_PATH', './key/audio_key/example.mp3');
define('SALT', bin2hex('example'));

function generateSecretKeyFromAudio($filePath, $salt): string
{
    $audioData = file_get_contents($filePath);

    $hash = hash('sha512', $audioData . $salt, true);

    $iterations = 10000;
    $keyLength = 64; //bytes
    $secretKey = hash_pbkdf2('sha512', $hash, $salt, $iterations, $keyLength, true);

    return $secretKey;
}

define('SECRET_KEY', bin2hex(generateSecretKeyFromAudio(AUDIO_FILE_PATH, SALT)));