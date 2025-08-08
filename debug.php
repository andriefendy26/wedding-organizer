<?php
// Buat file debug.php di root Laravel project untuk troubleshooting

require_once 'vendor/autoload.php';

// Load Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Storage;
use App\Models\Letter;

echo "=== DEBUG FILE PATHS ===\n\n";

// 1. Cek konfigurasi storage
echo "1. Storage Configuration:\n";
echo "Default disk: " . config('filesystems.default') . "\n";
echo "Storage path: " . storage_path('app') . "\n";
echo "Public path: " . public_path('storage') . "\n\n";

// 2. Cek direktori
echo "2. Directory Check:\n";
$directories = [
    'letters' => storage_path('app/letters'),
    'letters/original' => storage_path('app/letters/original'),
    'letters/signed' => storage_path('app/letters/signed'),
    'qr-codes' => storage_path('app/qr-codes'),
];

foreach ($directories as $name => $path) {
    $exists = is_dir($path);
    $writable = $exists && is_writable($path);
    echo "  {$name}: " . ($exists ? 'EXISTS' : 'NOT EXISTS') . 
         ($writable ? ' (WRITABLE)' : ' (NOT WRITABLE)') . " - {$path}\n";
}

echo "\n3. Letters in Database:\n";
$letters = Letter::all();
foreach ($letters as $letter) {
    echo "ID: {$letter->id}\n";
    echo "  Nomor: {$letter->nomor_surat}\n";
    echo "  Status: {$letter->status}\n";
    echo "  Original Path: {$letter->original_file_path}\n";
    
    // Cek apakah file ada
    $fullPath = storage_path('app/' . $letter->original_file_path);
    $exists = file_exists($fullPath);
    $filesize = $exists ? filesize($fullPath) : 0;
    
    echo "  Full Path: {$fullPath}\n";
    echo "  File Exists: " . ($exists ? 'YES' : 'NO') . "\n";
    echo "  File Size: {$filesize} bytes\n";
    
    // Cek dengan Storage facade
    $storageExists = Storage::exists($letter->original_file_path);
    echo "  Storage::exists(): " . ($storageExists ? 'YES' : 'NO') . "\n";
    
    if ($exists) {
        echo "  File Info: " . json_encode(pathinfo($fullPath)) . "\n";
    }
    echo "  ---\n";
}

echo "\n4. List Files in letters/original:\n";
$originalPath = storage_path('app/letters/original');
if (is_dir($originalPath)) {
    $files = scandir($originalPath);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $filePath = $originalPath . '/' . $file;
            $size = filesize($filePath);
            echo "  {$file} ({$size} bytes)\n";
        }
    }
} else {
    echo "  Directory does not exist!\n";
}

echo "\n5. Storage URL Test:\n";
if ($letters->count() > 0) {
    $testLetter = $letters->first();
    if ($testLetter->original_file_path) {
        echo "Storage URL: " . Storage::url($testLetter->original_file_path) . "\n";
        echo "Asset URL: " . asset('storage/' . $testLetter->original_file_path) . "\n";
    }
}

echo "\n=== END DEBUG ===\n";
?>