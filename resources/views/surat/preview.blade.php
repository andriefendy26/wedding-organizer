<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Surat - {{ $surat->nomor_surat }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        
        .header {
            background-color: #fff;
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        
        .header .info {
            margin-top: 5px;
            font-size: 14px;
            color: #666;
        }
        
        .actions {
            background-color: #fff;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        
        .btn:hover {
            opacity: 0.9;
        }
        
        .pdf-container {
            height: calc(100vh - 120px);
            background-color: #fff;
        }
        
        .pdf-iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .status-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .status-disetujui {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-diajukan {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-ditolak {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            font-size: 16px;
            color: #666;
        }
        
        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #007bff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
            margin-right: 10px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Preview Surat</h1>
        <div class="info">
            <strong>Nomor:</strong> {{ $surat->nomor_surat }} | 
            <strong>Jenis:</strong> {{ $surat->jenis_surat_label }} | 
            <strong>Status:</strong> 
            <span class="status-badge status-{{ $surat->status }}">
                {{ $surat->status_label }}
            </span>
        </div>
    </div>
    
    <div class="actions">
        <a href="{{ route('surat.download', ['publicLink' => $surat->public_token]) }}" class="btn btn-primary">
            📥 Download PDF
        </a>
        <a href="{{ route('surat.verify', ['publicLink' => $surat->public_token]) }}" class="btn btn-secondary">
            🔍 Verifikasi Publik
        </a>
        <button onclick="window.close()" class="btn btn-secondary">
            ❌ Tutup
        </button>
    </div>
    
    <div class="pdf-container">
        <div class="loading" id="loading">
            <div class="spinner"></div>
            Memuat PDF...
        </div>
        <iframe 
            src="{{ $pdfUrl }}" 
            class="pdf-iframe" 
            id="pdfFrame"
            onload="hideLoading()"
            onerror="showError()">
        </iframe>
    </div>
    
    <script>
        function hideLoading() {
            document.getElementById('loading').style.display = 'none';
        }
        
        function showError() {
            document.getElementById('loading').innerHTML = 
                '<div style="color: #dc3545;">❌ Gagal memuat PDF. Silakan coba download manual.</div>';
        }
        
        // Fallback jika iframe tidak berfungsi
        setTimeout(function() {
            if (document.getElementById('loading').style.display !== 'none') {
                showError();
            }
        }, 10000);
    </script>
</body>
</html>

