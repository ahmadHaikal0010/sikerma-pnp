<?php 

namespace App\Models;

use PDO;

class User
{
    private int $id;
    private string $nama;
    private string $email;
    private string $username;
    private string $password;
    private string $role;

    public function __construct($id, $nama, $email, $username, $password, $role)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    // Create
    public function create()
    {
        // Query untuk menyisipkan data
        $sql = "INSERT INTO tb_user (namaUser, emailUser, username, password, role) VALUES (:namaUser, :emailUser, :username, :password, :role)";
        // $stmt = $pdo->prepare($sql);
    }

    // Read
    // Update
    // Delete
}