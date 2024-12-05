<?php

namespace App\Core;

use PDO;
use Exception;
use Config\Env;


class Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Env(__DIR__ . "../../../.env");
    }

    public function connect()
    {
        try {
            // Ambil data dari Objek Env
            $host = $this->conn->getHost();
            $port = $this->conn->getPort();
            $dbname = $this->conn->getDBName();
            $username = $this->conn->getUsername();
            $password = $this->conn->getPassword();

            // Buat koneksi menggunakan PDO
            $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
            $pdo = new PDO($dsn, $username, $password);
        
            // Set opsi PDO
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
            echo "Koneksi Berhasil!";
        } catch (Exception $e) {
            die("koenksi gagal: " . $e->getMessage());
        }

        return $pdo;
    }
}
