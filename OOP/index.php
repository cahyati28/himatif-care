<?php include 'auth.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Donasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include "frontend/navbar.html"?>
    <div class="container mt-4">
        <h1 class="text-center">Manajemen Donasi</h1>
        <div class="row mt-5">
            <div class="col-md-4">
                <a href="pemasukan.php" class="btn btn-primary btn-block w-100">Pemasukan</a>
            </div>
            <div class="col-md-4">
                <a href="pengeluaran.php" class="btn btn-warning btn-block w-100">Pengeluaran</a>
            </div>
            <div class="col-md-4">
                <a href="data_transaksi.php" class="btn btn-success btn-block w-100">Data Transaksi</a>
            </div>
        </div>
    </div>
</body>
</html>

