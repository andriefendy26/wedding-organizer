<?php
require_once 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

// Buat QR Code
$qrCode = QrCode::create('https://example.com')->setSize(300)->setMargin(10);

// Render ke PNG
$writer = new PngWriter();
$result = $writer->write($qrCode);

// Simpan ke file
('test_qr.png', $result->getString());

echo "QR Code berhasil dibuat!\n";
