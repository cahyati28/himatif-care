<?php
include 'config.php'; // Pastikan file config.php sudah benar

$username = 'admin'; // Ganti sesuai dengan username yang diinginkan
$password = password_hash('admin123', PASSWORD_BCRYPT); // Ganti sesuai dengan password yang diinginkan

$query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
if ($conn->query($query) === TRUE) {
    echo "Admin berhasil ditambahkan!";
} else {
    echo "Error: " . $conn->error;
}
?>
