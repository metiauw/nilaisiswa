<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nis = $_POST["nis"];
    $nama = $_POST["nama"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $jkel = $_POST["jkel"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];
    $nm_wali = $_POST["nm_wali"];
    $kd_kelas = $_POST["kd_kelas"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Koneksi ke database
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "nilaisiswa";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query untuk memasukkan data ke dalam tabel 'siswa'
        $query = "INSERT INTO siswa (nis, nm_siswa, tmp_lahir, tgl_lahir, jkel, alamat, telp, nm_wali, kd_kelas, username, password) 
                  VALUES (:nis, :nama, :tempat_lahir, :tgl_lahir, :jkel, :alamat, :telepon, :nm_wali, :kd_kelas, :username, :password)";
        $stmt = $conn->prepare($query);

        // Bind parameter ke query
        $stmt->bindParam(':nis', $nis);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':tempat_lahir', $tempat_lahir);
        $stmt->bindParam(':tgl_lahir', $tgl_lahir);
        $stmt->bindParam(':jkel', $jkel);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':telepon', $telepon);
        $stmt->bindParam(':nm_wali', $nm_wali);
        $stmt->bindParam(':kd_kelas', $kd_kelas);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        // Eksekusi query
        $stmt->execute();

        echo "Data siswa berhasil diinput.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
