<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat {{ $surat->jenis_surat_label }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 0;
            padding: 20px;
            color: #000;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 20px;
        }
        
        .header h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .header p {
            margin: 5px 0;
            font-size: 12px;
        }
        
        .content {
            margin-bottom: 30px;
        }
        
        .content p {
            text-align: justify;
            margin: 10px 0;
        }
        
        .content table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        
        .content table td {
            padding: 5px 0;
            vertical-align: top;
        }
        
        .content table td:first-child {
            width: 150px;
            font-weight: bold;
        }
        
        .signature {
            text-align: right;
            margin-top: 50px;
        }
        
        .signature p {
            margin: 5px 0;
        }
        
        .qr-code {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 80px;
            height: 80px;
        }
        
        .qr-code img {
            width: 100%;
            height: 100%;
        }
        
        .qr-code-text {
            font-size: 8px;
            text-align: center;
            margin-top: 5px;
        }
        
        .status-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .status-diajukan {
            background-color: #fef3c7;
            color: #92400e;
            border: 1px solid #f59e0b;
        }
        
        .status-disetujui {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #10b981;
        }
        
        .status-ditolak {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #ef4444;
        }
        
        .footer {
            position: absolute;
            bottom: 10px;
            left: 20px;
            font-size: 8px;
            color: #666;
        }
    </style>
</head>
<body>
    <!-- Status Badge -->
    <div class="status-badge status-{{ $surat->status }}">
        {{ $surat->status_label }}
    </div>
    
    <!-- Header -->
    <div class="header">
        @if(!empty($logoDataUri))
            <img src="{{ $logoDataUri }}" alt="Logo" style="max-height: 60px; margin-bottom: 10px;">
        @endif
        
        <h1>{{ $header->nama_instansi }}</h1>
        <p>{{ $header->alamat_instansi }}</p>
        @if($header->telepon || $header->email || $header->website)
            <p>
                @if($header->telepon)Telp: {{ $header->telepon }}@endif
                @if($header->email && $header->telepon) | @endif
                @if($header->email)Email: {{ $header->email }}@endif
                @if($header->website && ($header->telepon || $header->email)) | @endif
                @if($header->website)Website: {{ $header->website }}@endif
            </p>
        @endif
    </div>
    
    <!-- Content -->
    <div class="content">
        {!! $content !!}
    </div>
    
    <!-- QR Code -->
    <div class="qr-code">
        <img src="{{ $qrCodeUrl }}" alt="QR Code">
        <div class="qr-code-text">
            Scan untuk verifikasi
        </div>
    </div>
    
    <!-- Footer -->
    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis pada {{ now()->format('d/m/Y H:i:s') }}</p>
        <p>Nomor Referensi: {{ $surat->id }}</p>
    </div>
</body>
</html>
