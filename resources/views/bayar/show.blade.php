<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pembayaran #{{ $transaksi->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: #f8fafc; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .invoice-container { 
            background: white; 
            box-shadow: 0 4px 16px rgba(0,0,0,0.1); 
            margin: 2rem auto;
            max-width: 210mm;
            min-height: 297mm;
            padding: 0;
        }
        .invoice-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 8px 8px 0 0;
        }
        .company-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .logo-container {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            border: 2px solid rgba(255,255,255,0.3);
            overflow: hidden;
        }
        .logo-placeholder {
            background: rgba(255,255,255,0.2);
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .company-logo {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: rgba(255,255,255,0.9);
            border-radius: 6px;
        }
        .invoice-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 0;
        }
        .invoice-number {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        .invoice-body {
            padding: 2rem;
        }
        .info-section {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
        .table th {
            background: #667eea;
            color: white;
            border: none;
            font-weight: 600;
        }
        .table td {
            vertical-align: middle;
            border-color: #e9ecef;
        }
        .total-section {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            border-left: 4px solid #28a745;
        }
        .upload-section {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 2rem;
        }
        .status-paid {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .status-unpaid {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        .bank-info {
            background: #e3f2fd;
            border: 1px solid #bbdefb;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
        }
        .website-link {
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .website-link:hover {
            color: white;
            text-decoration: underline;
        }
        @media print {
            .upload-section { display: none; }
            .invoice-container { box-shadow: none; margin: 0; }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="invoice-container">
        <!-- Header Invoice -->
        <div class="invoice-header">
            <div class="row">
                <div class="col-md-8">
                    <div class="company-info">
                        <div class="logo-container">
                            @if($company_logo && $company_logo !== 'Default Company')
                                <img src="{{ asset($company_logo) }}" alt="{{ $company_name }}" class="company-logo">
                            @else
                                <img src="{{ asset('storage/content/Logo.png') }}" alt="{{ $company_name }}" class="company-logo">
                                {{-- <div class="logo-placeholder">
                                    <i class="fas fa-building"></i>
                                </div> --}}
                            @endif
                        </div>
                        <div>
                            <h1 class="invoice-title">INVOICE</h1>
                            <p class="invoice-number">No: {{ $invoice_prefix ?? 'INV' }}-{{ str_pad($transaksi->id, 6, '0', STR_PAD_LEFT) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="text-white">
                        <h5>{{ $company_name ?? 'PT. NAMA PERUSAHAAN' }}</h5>
                        <p class="mb-1">{{ $company_address ?? 'Jl. Contoh Alamat No. 123' }}</p>
                        <p class="mb-1">{{ $company_city ?? 'Jakarta Selatan 12345' }}</p>
                        <p class="mb-1">Telp: {{ $company_phone ?? '(021) 1234-5678' }}</p>
                        <p class="mb-1">Email: {{ $company_email ?? 'info@perusahaan.com' }}</p>
                        @if($company_website && $company_website !== 'https://3rasaproduction.com/')
                            <p class="mb-0">
                                <a href="{{ $company_website }}" class="website-link" target="_blank">
                                    {{ str_replace(['http://', 'https://'], '', $company_website) }}
                                </a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Body Invoice -->
        <div class="invoice-body">
            <!-- Informasi Customer dan Tanggal -->
            <div class="mb-4 row">
                <div class="col-md-6">
                    <div class="info-section">
                        <h5 class="mb-3 text-primary">BILL TO:</h5>
                        <h6>{{ $transaksi->customer->nama }}</h6>
                        <p class="mb-1">{{ $transaksi->customer->alamat ?? 'Alamat belum diisi' }}</p>
                        <p class="mb-1">Telp: {{ $transaksi->customer->telpon ?? '-' }}</p>
                        <p class="mb-0">Email: {{ $transaksi->customer->email ?? '-' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-section">
                        <h5 class="mb-3 text-primary">INVOICE INFO:</h5>
                        <div class="row">
                            <div class="col-6"><strong>Invoice Date:</strong></div>
                            <div class="col-6">{{ $transaksi->created_at->format('d/m/Y') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Due Date:</strong></div>
                            <div class="col-6">{{ $transaksi->created_at->addDays(7)->format('d/m/Y') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Layanan:</strong></div>
                            <div class="col-6">{{ $transaksi->layanan->nama ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paket Layanan (jika ada) -->
            @if($transaksi->paketLayanan)
            <div class="mb-4 alert alert-info">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="mb-1"><i class="fas fa-box"></i> Paket Layanan</h6>
                        <span>{{ $transaksi->paketLayanan->nama_paket }}</span>
                    </div>
                    <div class="col-auto">
                        <span class="badge bg-primary fs-6">Rp {{ number_format($transaksi->paketLayanan->harga, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
            @endif

            <!-- Tabel Barang -->
            <h5 class="mb-3">RINCIAN BARANG/JASA</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang/Jasa</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-end">Harga Satuan</th>
                            <th class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksi->barangTransaksi as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $item->barang?->nama ?? '-' }}</td>
                                <td class="text-center">{{ $item->jumlah }}</td>
                                <td class="text-end">Rp {{ number_format($item->harga_satuan,0,',','.') }}</td>
                                <td class="text-end">Rp {{ number_format($item->total,0,',','.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 text-center text-muted">
                                    <em>Tidak ada barang dalam transaksi ini</em>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Total Section -->
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="total-section">
                        <div class="mb-2 row">
                            <div class="col-6"><strong>Subtotal:</strong></div>
                            <div class="col-6 text-end">Rp {{ number_format($transaksi->total_biaya, 0, ',', '.') }}</div>
                        </div>
                        {{-- <div class="mb-2 row">
                            <div class="col-6">PPN (11%):</div>
                            <div class="col-6 text-end">Rp {{ number_format($transaksi->total_biaya * 0.11, 0, ',', '.') }}</div>
                        </div> --}}
                        <hr>
                        <div class="row">
                            <div class="col-6"><h5><strong>TOTAL:</strong></h5></div>
                            <div class="col-6 text-end"><h5 class="text-success"><strong>Rp {{ number_format($transaksi->total_biaya, 0, ',', '.') }}</strong></h5></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Pembayaran -->
            <div class="mt-4 row">
                <div class="col-md-6">
                    @if($transaksi->status)
                        <div class="alert status-paid">
                            <h6 class="mb-1"><i class="fas fa-check-circle"></i> Status Pembayaran</h6>
                            <span>Sudah diverifikasi</span>
                        </div>
                    @else
                        <div class="alert status-unpaid">
                            <h6 class="mb-1"><i class="fas fa-clock"></i> Status Pembayaran</h6>
                            <span>Menunggu Verifikasi</span>
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="bank-info">
                        <h6><i class="fas fa-university"></i> INFORMASI BANK</h6>
                        <p class="mb-1"><strong>{{ $companyBankName ?? 'Bank Mandiri' }}</strong></p>
                        <p class="mb-1">No. Rek: {{ $bank_account ?? '1234-5678-9012-3456' }}</p>
                        <p class="mb-0">a.n. {{ $bank_holder ?? $company_name ?? 'PT. Nama Perusahaan' }}</p>
                    </div>
                </div>
            </div>

            <!-- Upload Bukti Bayar -->
            <div class="upload-section">
                <h5 class="mb-3"><i class="fas fa-upload"></i> Upload Bukti Pembayaran</h5>
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check"></i> {{ session('success') }}
                    </div>
                @endif
                
                <form action="{{ route('bayar.update', $transaksi->public_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-md-8">
                            <label class="form-label">Pilih file bukti pembayaran (JPG, PNG, PDF)</label>
                            <input type="file" class="form-control" name="bukti_bayar" accept="image/*,.pdf" required>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary w-100" type="submit">
                                <i class="fas fa-paper-plane"></i> Upload Bukti
                            </button>
                        </div>
                    </div>
                </form>

                @if($transaksi->bukti_bayar)
                    <div class="mt-4">
                        <h6>Bukti pembayaran yang sudah diupload:</h6>
                        <div class="p-3 border rounded bg-light">
                            <img src="{{ asset('storage/'.$transaksi->bukti_bayar) }}" 
                                 alt="Bukti Bayar" 
                                 class="rounded shadow-sm img-fluid" 
                                 style="max-width: 400px; max-height: 300px; object-fit: cover;">
                        </div>
                    </div>
                @endif
            </div>

            <!-- Footer -->
            <div class="pt-4 mt-5 row border-top">
                <div class="col-md-6">
                    <p class="mb-0 text-muted small">Terima kasih atas kepercayaan Anda kepada kami.</p>
                    <p class="text-muted small">Untuk pertanyaan, hubungi customer service kami.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 text-muted small">Invoice ini dibuat secara otomatis</p>
                    <p class="text-muted small">Tanggal cetak: {{ now()->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>
</html>