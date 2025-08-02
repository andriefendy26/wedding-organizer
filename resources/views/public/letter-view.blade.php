{{-- resources/views/public/letter-view.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Surat - {{ $letter->nomor_surat }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 min-h-screen" x-data="letterVerification">
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h1 class="text-lg font-medium text-gray-900">Surat Terverifikasi</h1>
                            <p class="text-sm text-gray-500">Dokumen ini telah diverifikasi dan sah</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-xs text-gray-500">Diverifikasi pada</div>
                        <div class="text-sm font-medium text-gray-900">{{ now()->format('d M Y, H:i') }} WIB</div>
                    </div>
                </div>
            </div>
            
            <!-- Letter Details -->
            <div class="px-6 py-4">
                <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide">Nomor Surat</dt>
                        <dd class="mt-1 text-sm font-semibold text-gray-900">{{ $letter->nomor_surat }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide">Penandatangan</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $letter->penandatangan }}</dd>
                    </div>
                    <div class="sm:col-span-2 lg:col-span-1">
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide">Tanggal Dibuat</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $letter->created_at->format('d M Y') }}</dd>
                    </div>
                    <div class="sm:col-span-2 lg:col-span-3">
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide">Perihal</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $letter->perihal }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Document Viewer -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-medium text-gray-900">Dokumen Surat</h2>
                    <div class="flex space-x-2">
                        <button 
                            @click="toggleFullscreen"
                            class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                            </svg>
                            <span x-text="isFullscreen ? 'Exit Fullscreen' : 'Fullscreen'"></span>
                        </button>
                        
                        <a 
                            href="{{ route('letters.public.download', basename($letter->public_link)) }}"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Download PDF
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="p-6">
                <div 
                    x-ref="documentContainer"
                    :class="{ 'fixed inset-0 z-50 bg-black bg-opacity-75 flex items-center justify-center p-4': isFullscreen }"
                >
                    <div :class="{ 'bg-white rounded-lg shadow-xl max-w-6xl w-full h-full overflow-hidden': isFullscreen }">
                        <div x-show="isFullscreen" class="flex justify-between items-center p-4 border-b">
                            <h3 class="text-lg font-medium">{{ $letter->nomor_surat }}</h3>
                            <button @click="toggleFullscreen" class="text-gray-500 hover:text-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <iframe 
                            src="{{ Storage::url($letter->signed_file_path) }}" 
                            :class="isFullscreen ? 'w-full h-full' : 'w-full h-96 md:h-[600px] border border-gray-300 rounded'"
                            type="application/pdf"
                        >
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="mt-2 text-sm text-gray-500">Browser Anda tidak mendukung preview PDF.</p>
                                <a 
                                    href="{{ route('letters.public.download', basename($letter->public_link)) }}"
                                    class="mt-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-blue-600 hover:text-blue-500"
                                >
                                    Download PDF untuk melihat dokumen
                                </a>
                            </div>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Verification Notice -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-900">Informasi Verifikasi</h3>
                    <div class="mt-1 text-sm text-blue-700">
                        <p>• Dokumen ini telah diverifikasi menggunakan QR Code yang tertanam dalam surat.</p>
                        <p>• QR Code mengarah ke halaman verifikasi ini sebagai bukti keaslian dokumen.</p>
                        <p>• Jika Anda memiliki keraguan tentang keaslian dokumen, silakan hubungi penerbit surat.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-gray-500">
            <p>Sistem Verifikasi Surat Digital</p>
            <p class="mt-1">Halaman ini dibuat pada {{ now()->format('d M Y, H:i:s') }} WIB</p>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('letterVerification', () => ({
                isFullscreen: false,
                
                toggleFullscreen() {
                    this.isFullscreen = !this.isFullscreen;
                    
                    if (this.isFullscreen) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow = 'auto';
                    }
                },
                
                init() {
                    // Handle escape key for fullscreen
                    document.addEventListener('keydown', (e) => {
                        if (e.key === 'Escape' && this.isFullscreen) {
                            this.toggleFullscreen();
                        }
                    });
                }
            }));
        });
    </script>
</body>
</html>