<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tgl = $_POST['tgl'];
    $price = $_POST['price'];
    $kategori = $_POST['kategori'];
    $status = $_POST['status'];

    $query = "INSERT INTO transaksi (nama, email, tgl, price, kategori_donasi, jenis_transaksi, status) 
              VALUES ('$nama', '$email', '$tgl', '$price', '$kategori', 'pengeluaran', '$status')";
    $conn->query($query);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM transaksi WHERE id=$id";
    $conn->query($query);
}

$result = $conn->query("SELECT * FROM transaksi WHERE jenis_transaksi='pengeluaran'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengeluaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include "frontend/navbar.html"?>
    <div class="container mt-4">
        <h1 class="text-center">Manajemen Pengeluaran</h1>

        <form action="pengeluaran.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="tgl" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tgl" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="price" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Pengeluaran</label>
                <input type="text" class="form-control" name="kategori" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" name="status" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Pengeluaran</button>
        </form>

        <h2 class="mt-5">Daftar Pengeluaran</h2>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['tgl'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['kategori_donasi'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                        <a href="pengeluaran.php?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
