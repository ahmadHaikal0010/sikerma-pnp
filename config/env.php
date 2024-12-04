<?php 

function loadEnv($filePath)
{
    if (!file_exists($filePath)) {
        throw new Exception("File .env tidak ditemukan");
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), "#") === 0) {
            continue; // Abaikan komentar
        }

        [$key, $value] = explode("=", $line, 2);
        $_ENV[trim($key)] = trim($value);
    }
}