<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Lakukan validasi kredensial di sini (misalnya dengan query ke tabel "admin")
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "nilaisiswa";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM admin WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            // Jika login berhasil, Anda dapat mengatur sesi atau tindakan lain di sini
            echo "Login berhasil!";
        } else {
            echo "Login gagal. Periksa kembali username dan password Anda.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beranda</title>
</head>
<body>
    <h1>Selamat Datang di Beranda</h1>
    <p>Silakan pilih menu yang ingin diakses:</p>
    
    <!-- Tombol untuk menuju halaman datasiswa.html -->
    <form action="inputsiswa.html">
        <input type="submit" value="Input Siswa">
    </form>

    <!-- Tombol untuk menuju halaman dataguru.html -->
    <form action="dataguru.html">
        <input type="submit" value="Data Guru">
    </form>

    <!-- Tombol untuk logout -->
    <form action="proses_logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
</html>

