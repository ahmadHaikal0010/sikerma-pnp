<?php

namespace Config;

use Exception;

class Env
{
    private string $host;
    private string $port;
    private string $dbname;
    private string $username;
    private string $password;

    public function __construct($filePath)
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

        // Ambil variabel ari $_ENV
        $this->host = $_ENV['DB_HOST'] ?? '';
        $this->port = $_ENV['DB_PORT'] ?? '';
        $this->dbname = $_ENV['DB_NAME'] ?? '';
        $this->username = $_ENV['DB_USERNAME'] ?? '';
        $this->password = $_ENV['DB_PASSWORD'] ?? '';
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getDBName()
    {
        return $this->dbname;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
