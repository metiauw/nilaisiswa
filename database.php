<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = ""; // Jika Anda menggunakan kata sandi, masukkan di sini
    private $dbname = "nilaisiswa";

    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Koneksi sukses!";
        } catch (PDOException $e) {
            echo "Koneksi gagal: " . $e->getMessage();
        }
    }
}
?>
