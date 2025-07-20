<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Transaksi #{{ $transaksi->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        .card { box-shadow: 0 2px 8px rgba(0,0,0,0.07); margin-top: 2rem; }
        .table th, .table td { vertical-align: middle; }
        .upload-section { background: #f1f5f9; padding: 1rem; border-radius: 8px; }
        .img-preview { border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">Detail Pembayaran</h1>
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>Customer:</strong> {{ $transaksi->customer->nama }}</li>
                        <li class="list-group-item"><strong>Layanan:</strong> {{ $transaksi->layanan->nama ?? '-' }}</li>
                    </ul>

                    <h4 class="mb-3">Rincian Barang</h4>
                    <table class="table table-bordered table-striped mb-4">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi->barangTransaksi as $item)
                            <tr>
                                <td>{{ $item->barang->nama }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>Rp {{ number_format($item->harga_satuan,0,',','.') }}</td>
                                <td>Rp {{ number_format($item->total,0,',','.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total Biaya</th>
                                <th class="text-success">Rp {{ number_format($transaksi->total_biaya, 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>

                    @if($transaksi->paketLayanan)
                    <div class="mb-4">
                        <div class="alert alert-info d-flex align-items-center" role="alert">
                            <div>
                                <strong>Paket Layanan:</strong> {{ $transaksi->paketLayanan->nama_paket }}
                                <span class="badge bg-primary ms-2">Rp {{ number_format($transaksi->paketLayanan->harga, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($transaksi->status)
                    <div class="mb-4">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <div>
                                <strong>Status Pembayaran:</strong> Sudah diverifikasi
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="mb-4">
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <div>
                                <strong>Status Pembayaran:</strong> Belum diverifikasi
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="upload-section mb-4">
                        <h5 class="mb-3">Upload Bukti Bayar</h5>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('bayar.update', $transaksi->public_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-2">
                                <input type="file" class="form-control" name="bukti_bayar" accept="image/*" required>
                                <button class="btn btn-primary" type="submit">Upload</button>
                            </div>
                        </form>
                        @if($transaksi->bukti_bayar)
                            <div class="mt-3">
                                <p>Bukti bayar saat ini:</p>
                                <img src="{{ asset('storage/'.$transaksi->bukti_bayar) }}" alt="Bukti Bayar" class="img-fluid img-preview" width="300">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
