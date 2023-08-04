<?php
// Pastikan Anda mengisi informasi koneksi database sesuai dengan pengaturan Anda
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'siswa';

// Buat koneksi ke database
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}

// Fungsi untuk membersihkan input dari karakter khusus
function cleanInput($data) {
    global $connection;
    return mysqli_real_escape_string($connection, $data);
}

// Cek apakah ada data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = cleanInput($_POST["nis"]);
    $nm_siswa = cleanInput($_POST["nm_siswa"]);
    $tmp_lahir = cleanInput($_POST["tmp_lahir"]);
    $tgl_lahir = $_POST["tgl_lahir"]; // Tidak perlu di-clean karena sudah dalam format date
    $jkel = $_POST["jkel"];
    $alamat = cleanInput($_POST["alamat"]);
    $telp = cleanInput($_POST["telp"]);
    $nm_wali = cleanInput($_POST["nm_wali"]);
    $kd_kelas = cleanInput($_POST["kd_kelas"]);
    $username = cleanInput($_POST["username"]);
    $password = cleanInput($_POST["password"]);

    // Query untuk menyimpan data siswa ke dalam database
    $query = "INSERT INTO siswa (nis, nm_siswa, tmp_lahir, tgl_lahir, jkel, alamat, telp, nm_wali, kd_kelas, username, password) 
              VALUES ('$nis', '$nm_siswa', '$tmp_lahir', '$tgl_lahir', '$jkel', '$alamat', '$telp', '$nm_wali', '$kd_kelas', '$username', '$password')";

    if (mysqli_query($connection, $query)) {
        echo "Data siswa berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($connection);
    }
}

// Tutup koneksi database
mysqli_close($connection);
?>
