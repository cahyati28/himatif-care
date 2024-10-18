<?php
include 'config.php';
require __DIR__ . '/../vendor/autoload.php';

$pdf = new FPDF('L','mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(30, 10, 'Nama', 1);
$pdf->Cell(40, 10, 'Email', 1);
$pdf->Cell(30, 10, 'Tanggal', 1);
$pdf->Cell(30, 10, 'Jumlah', 1);
$pdf->Cell(40, 10, 'Kategori', 1);
$pdf->Cell(30, 10, 'Jenis', 1);
$pdf->Cell(20, 10, 'Status', 1);
$pdf->Ln();

$query = "SELECT * FROM transaksi";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(10, 10, $row['id'], 1);
    $pdf->Cell(30, 10, $row['nama'], 1);
    $pdf->Cell(40, 10, $row['email'], 1);
    $pdf->Cell(30, 10, $row['tgl'], 1);
    $pdf->Cell(30, 10, $row['price'], 1);
    $pdf->Cell(40, 10, $row['kategori_donasi'], 1);
    $pdf->Cell(30, 10, $row['jenis_transaksi'], 1);
    $pdf->Cell(20, 10, $row['status'], 1);
    $pdf->Ln();
}

$pdf->Output();
?>
