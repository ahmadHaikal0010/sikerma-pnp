<?php 

require "env.php";

try {
    // Load konfigurasi dari .env
    loadEnv(__DIR__ . "/../.env");

    // Ambil variabel ari $_ENV
    $host = $_ENV["DB_HOST"];
    $port = $_ENV["DB_PORT"];
    $dbname = $_ENV["DB_DATABASE"];
    $username = $_ENV["DB_USERNAME"];
    $password = $_ENV["DB_PASSWORD"];

    // Buat koneksi menggunakan PDO
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);

    // Set opsi PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Koneksi berhasil!";
} catch (Exception $e) {
    die("koenksi gagal: " . $e->getMessage());
}