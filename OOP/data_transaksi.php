<?php
include 'config.php';

$whereClause = "WHERE 1=1"; // Default untuk semua transaksi
$filter_kategori = isset($_POST['filter_kategori']) ? $_POST['filter_kategori'] : '';
$filter_jenis_transaksi = isset($_POST['filter_jenis_transaksi']) ? $_POST['filter_jenis_transaksi'] : '';

if (!empty($filter_kategori)) {
    $whereClause .= " AND kategori_donasi='$filter_kategori'";
}

if (!empty($filter_jenis_transaksi)) {
    $whereClause .= " AND jenis_transaksi='$filter_jenis_transaksi'";
}

$query = "SELECT * FROM transaksi $whereClause";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include "frontend/navbar.html"; ?>
    <div class="container mt-4">
        <h1 class="text-center">Data Transaksi</h1>

        <!-- Filter Form -->
        <form method="POST" action="../OOP/data_transaksi.php" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="filter_kategori" class="form-label">Filter Berdasarkan Kategori</label>
                    <select name="filter_kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="pemasukan" <?= $filter_kategori == 'pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
                        <option value="pengeluaran" <?= $filter_kategori == 'pengeluaran' ? 'selected' : '' ?>>Pengeluaran</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="filter_jenis_transaksi" class="form-label">Filter Berdasarkan Jenis Transaksi</label>
                    <select name="filter_jenis_transaksi" class="form-select">
                        <option value="">Semua Jenis Transaksi</option>
                        <option value="Pemasukan" <?= $filter_jenis_transaksi == 'Pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
                        <option value="Pengeluaran" <?= $filter_jenis_transaksi == 'Pengeluaran' ? 'selected' : '' ?>>Pengeluaran</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="../OOP/data_transaksi.php" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <h2>Daftar Transaksi</h2>

        <!-- Table Data Transaksi -->
        <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Kategori</th>
                    <th>Jenis Transaksi</th>
                    <th>Status</th>
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
                    <td><?= $row['jenis_transaksi'] ?></td>
                    <td><?= $row['status'] ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="alert alert-warning" role="alert">
            Tidak ada transaksi yang ditemukan untuk filter yang diterapkan.
        </div>
        <?php endif; ?>

        <!-- Export Buttons -->
        <div class="mt-4">
            <a href="export_excel.php" class="btn btn-success">Ekspor ke Excel</a>
            <a href="export_pdf.php" class="btn btn-danger">Ekspor ke PDF</a>
        </div>
    </div>
</body>
</html>
