<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Surat - {{ $surat->nomor_surat }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                    <i class="fas fa-file-alt text-blue-600 mr-2"></i>
                    Verifikasi Surat
                </h1>
                <p class="text-gray-600">Sistem Verifikasi Keaslian Dokumen Digital</p>
            </div>

            <!-- Main Content -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Status Banner -->
                <div class="px-6 py-4 border-b">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900">
                                {{ $surat->jenis_surat_label }}
                            </h2>
                            <p class="text-gray-600">{{ $surat->nomor_surat }}</p>
                        </div>
                        <div class="text-right">
                            @if($surat->isApproved())
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Disetujui
                                </span>
                            @elseif($surat->isRejected())
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1"></i>
                                    Ditolak
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-clock mr-1"></i>
                                    Diajukan
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Document Details -->
                <div class="px-6 py-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4">
                                    <i class="fas fa-user mr-2 text-blue-600"></i>
                                    Data Pemohon
                                </h3>
                                <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-700">Nama:</span>
                                        <span class="text-gray-900">{{ $surat->nama_pemohon }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-700">NIK:</span>
                                        <span class="text-gray-900">{{ $surat->nik }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-700">Alamat:</span>
                                        <span class="text-gray-900">{{ $surat->alamat }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-700">Keperluan:</span>
                                        <span class="text-gray-900">{{ $surat->keperluan }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-700">Tanggal Surat:</span>
                                        <span class="text-gray-900">{{ $surat->tanggal_surat->format('d F Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4">
                                    <i class="fas fa-info-circle mr-2 text-blue-600"></i>
                                    Informasi Dokumen
                                </h3>
                                <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-700">Jenis Surat:</span>
                                        <span class="text-gray-900">{{ $surat->jenis_surat_label }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-700">Status:</span>
                                        <span class="text-gray-900">{{ $surat->status_label }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-700">Tanggal Dibuat:</span>
                                        <span class="text-gray-900">{{ $surat->created_at->format('d F Y H:i') }}</span>
                                    </div>
                                    @if($surat->isApproved())
                                        <div class="flex justify-between">
                                            <span class="font-medium text-gray-700">Disetujui Oleh:</span>
                                            <span class="text-gray-900">{{ $surat->approvedBy->name ?? 'Admin' }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-gray-700">Tanggal Disetujui:</span>
                                            <span class="text-gray-900">{{ $surat->tanggal_disetujui->format('d F Y') }}</span>
                                        </div>
                                    @endif
                                    @if($surat->isRejected())
                                        <div class="flex justify-between">
                                            <span class="font-medium text-gray-700">Ditolak Oleh:</span>
                                            <span class="text-gray-900">{{ $surat->rejectedBy->name ?? 'Admin' }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-gray-700">Tanggal Ditolak:</span>
                                            <span class="text-gray-900">{{ $surat->tanggal_ditolak->format('d F Y') }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-gray-700">Alasan Penolakan:</span>
                                            <span class="text-gray-900">{{ $surat->alasan_penolakan }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                        @if($surat->isApproved())
                            <a href="{{ route('surat.download', $surat->public_link) }}" 
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="fas fa-download mr-2"></i>
                                Download PDF
                            </a>
                        @endif
                        
                        <a href="{{ route('surat.preview', $surat->public_link) }}" 
                           target="_blank"
                           class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-eye mr-2"></i>
                            Preview Surat
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center text-gray-500 text-sm">
                <p>
                    <i class="fas fa-shield-alt mr-1"></i>
                    Dokumen ini telah diverifikasi oleh sistem keamanan digital
                </p>
                <p class="mt-1">
                    Nomor Referensi: {{ $surat->id }} | 
                    Terakhir diperbarui: {{ $surat->updated_at->format('d/m/Y H:i:s') }}
                </p>
            </div>
        </div>
    </div>
</body>
</html>
