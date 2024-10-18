<?php
include 'config.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Header tabel
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'Email');
$sheet->setCellValue('D1', 'Tanggal');
$sheet->setCellValue('E1', 'Jumlah');
$sheet->setCellValue('F1', 'Kategori');
$sheet->setCellValue('G1', 'Jenis Transaksi');
$sheet->setCellValue('H1', 'Status');

$query = "SELECT * FROM transaksi";
$result = $conn->query($query);

$rowIndex = 2;  // Mulai dari baris ke-2 untuk data
while ($row = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $rowIndex, $row['id']);
    $sheet->setCellValue('B' . $rowIndex, $row['nama']);
    $sheet->setCellValue('C' . $rowIndex, $row['email']);
    $sheet->setCellValue('D' . $rowIndex, $row['tgl']);
    $sheet->setCellValue('E' . $rowIndex, $row['price']);
    $sheet->setCellValue('F' . $rowIndex, $row['kategori_donasi']);
    $sheet->setCellValue('G' . $rowIndex, $row['jenis_transaksi']);
    $sheet->setCellValue('H' . $rowIndex, $row['status']);
    $rowIndex++;
}

$writer = new Xlsx($spreadsheet);
$filename = 'data_transaksi.xlsx';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
