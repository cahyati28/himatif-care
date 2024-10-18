<?php
$host = "127.0.0.1:3307"; // ganti dengan host database kamu
$username = "root";  // ganti dengan username database kamu
$password = "";      // ganti dengan password database kamu
$dbname = "donasi_db";

// Buat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
