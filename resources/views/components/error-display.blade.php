{{-- resources/views/filament/components/error-display.blade.php --}}
<div class="bg-red-50 border border-red-200 rounded-lg p-4">
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="ml-3 flex-1">
            <h4 class="text-sm font-medium text-red-900 mb-2">Terjadi Error Saat Memproses Surat</h4>
            <div class="text-sm text-red-700">
                <p class="mb-3">{{ $error }}</p>
                
                <div class="bg-red-100 rounded p-3 mb-3">
                    <p class="text-xs text-red-800 font-medium mb-1">Kemungkinan Penyebab:</p>
                    <ul class="text-xs text-red-700 list-disc list-inside space-y-1">
                        <li>File PDF rusak atau dalam format yang tidak didukung</li>
                        <li>File PDF memiliki password atau proteksi</li>
                        <li>Ukuran file terlalu besar</li>
                        <li>Masalah permission pada folder storage</li>
                        <li>Library QR Code atau FPDI belum terinstall dengan benar</li>
                    </ul>
                </div>
                
                <div class="flex flex-wrap gap-2">
                    <button 
                        type="button"
                        onclick="$wire.mountAction('retry_processing')"
                        class="inline-flex items-center px-3 py-1.5 border border-red-300 text-xs font-medium rounded text-red-700 bg-white hover:bg-red-50"
                    >
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Coba Lagi
                    </button>
                    
                    <span class="text-xs text-red-600">
                        atau upload ulang file PDF yang berbeda
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>