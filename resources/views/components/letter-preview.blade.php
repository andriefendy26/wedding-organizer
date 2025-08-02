{{-- resources/views/filament/components/letter-preview.blade.php --}}
<div class="space-y-4" x-data="letterPreview">
    @if($letter->signed_file_path)
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Preview Surat dengan QR Code</h3>
                <div class="flex space-x-2">
                    <button 
                        type="button"
                        @click="previewInNewTab('{{ url('/letters/preview/' . $letter->id) }}')"
                        class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Preview PDF
                    </button>
                    
                    <a 
                        href="{{ url('/letters/download/' . $letter->id) }}"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Download Surat Bertanda QR
                    </button>
                </div>
            </div>
            
            <!-- PDF Embed -->
            <div class="bg-gray-50 rounded-lg p-4">
                <!-- PDF.js Viewer (Primary Option) -->
                <div x-show="viewerType === 'pdfjs'" x-cloak>
                    <iframe 
                        src="https://mozilla.github.io/pdf.js/web/viewer.html?file={{ urlencode(url('/letters/preview/' . $letter->id)) }}"
                        class="w-full h-96 border border-gray-300 rounded"
                        frameborder="0">
                    </iframe>
                </div>

                <!-- Embed Object (Fallback 1) -->
                <div x-show="viewerType === 'embed'" x-cloak>
                    <object 
                        data="{{ Storage::url($letter->signed_file_path) }}#toolbar=1&view=FitH" 
                        type="application/pdf" 
                        class="w-full h-96 border rounded">
                        <p class="text-center py-8">
                            PDF tidak bisa ditampilkan. 
                            <a href="{{ Storage::url($letter->signed_file_path) }}" target="_blank" 
                            class="text-blue-600">Buka di tab baru</a>
                        </p>
                    </object>
                </div>

                <!-- Google Docs Viewer (Fallback 2) -->
                <div x-show="viewerType === 'google'" x-cloak>
                    <iframe 
                        src="https://docs.google.com/gview?url={{ urlencode(url('/letters/preview/' . $letter->id)) }}&embedded=true"
                        class="w-full h-96 border border-gray-300 rounded"
                        frameborder="0">
                    </iframe>
                </div>

                <!-- Manual Download Option -->
                <div x-show="viewerType === 'download'" class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-500 mb-4">Browser tidak mendukung preview PDF.</p>
                    <a 
                        href="{{ url('/letters/download/' . $letter->id) }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Download PDF untuk Melihat
                    </a>
                </div>

                <!-- Viewer Options -->
                <div class="mt-4 flex justify-center space-x-2">
                    <button @click="setViewer('pdfjs')" 
                            :class="viewerType === 'pdfjs' ? 'bg-indigo-100 text-indigo-700' : 'text-gray-500 hover:text-gray-700'"
                            class="px-3 py-1 text-xs rounded-full border">
                        PDF.js
                    </button>
                    <button @click="setViewer('embed')" 
                            :class="viewerType === 'embed' ? 'bg-indigo-100 text-indigo-700' : 'text-gray-500 hover:text-gray-700'"
                            class="px-3 py-1 text-xs rounded-full border">
                        Browser Native
                    </button>
                    <button @click="setViewer('google')" 
                            :class="viewerType === 'google' ? 'bg-indigo-100 text-indigo-700' : 'text-gray-500 hover:text-gray-700'"
                            class="px-3 py-1 text-xs rounded-full border">
                        Google Viewer
                    </button>
                    <button @click="setViewer('download')" 
                            :class="viewerType === 'download' ? 'bg-indigo-100 text-indigo-700' : 'text-gray-500 hover:text-gray-700'"
                            class="px-3 py-1 text-xs rounded-full border">
                        Download Only
                    </button>
                </div>
            </div>
        </div>

        <!-- QR Code Info -->
        <div class="bg-blue-50 rounded-lg border border-blue-200 p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 flex-1">
                    <h4 class="text-sm font-medium text-blue-900">Informasi QR Code</h4>
                    <div class="mt-2 text-sm text-blue-700">
                        <p class="mb-2">QR Code telah ditambahkan ke pojok kanan bawah surat. QR Code berisi link untuk verifikasi surat:</p>
                        <div class="bg-white rounded border p-2 font-mono text-xs break-all">
                            {{ url($letter->public_link) }}
                        </div>
                        @if($letter->public_link)
                            <div class="mt-2">
                                <a href="{{ url($letter->public_link) }}" target="_blank" 
                                   class="text-blue-600 hover:text-blue-500 text-xs underline">
                                    Test link verifikasi →
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Letter Details -->
        <div class="bg-gray-50 rounded-lg p-4">
            <h4 class="text-sm font-medium text-gray-900 mb-3">Detail Surat</h4>
            <dl class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <div>
                    <dt class="text-xs font-medium text-gray-500">Nomor Surat</dt>
                    <dd class="text-sm text-gray-900">{{ $letter->nomor_surat }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium text-gray-500">Penandatangan</dt>
                    <dd class="text-sm text-gray-900">{{ $letter->penandatangan }}</dd>
                </div>
                <div class="sm:col-span-2">
                    <dt class="text-xs font-medium text-gray-500">Perihal</dt>
                    <dd class="text-sm text-gray-900">{{ $letter->perihal }}</dd>
                </div>
            </dl>
        </div>
    @else
        <div class="bg-yellow-50 rounded-lg border border-yellow-200 p-4">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <p class="text-sm text-yellow-800">
                    Surat sedang diproses. QR Code akan ditambahkan setelah data disimpan.
                </p>
            </div>
        </div>
    @endif
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('letterPreview', () => ({
        viewerType: 'embed', // Default viewer
        
        init() {
            // Try to detect best viewer for browser
            this.detectBestViewer();
        },
        
        detectBestViewer() {
            // Check if PDF.js is available
            if (this.isPdfJsAvailable()) {
                this.viewerType = 'pdfjs';
            } else if (this.supportsPdfEmbed()) {
                this.viewerType = 'embed';
            } else {
                this.viewerType = 'google';
            }
        },
        
        isPdfJsAvailable() {
            // Check if PDF.js viewer is available in public folder
            return fetch('/pdfjs/web/viewer.html', { method: 'HEAD' })
                .then(response => response.ok)
                .catch(() => false);
        },
        
        supportsPdfEmbed() {
            // Check browser support for PDF embed
            const isChrome = /Chrome/.test(navigator.userAgent);
            const isFirefox = /Firefox/.test(navigator.userAgent);
            const isSafari = /Safari/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent);
            const isEdge = /Edg/.test(navigator.userAgent);
            
            return isChrome || isFirefox || isEdge || isSafari;
        },
        
        setViewer(type) {
            this.viewerType = type;
        },
        
        downloadFile(url, filename) {
            // Create download link
            const link = document.createElement('a');
            link.href = url;
            link.download = filename;
            link.target = '_blank'; // Open in new tab as backup
            
            // Add to DOM temporarily
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        },
        
        previewInNewTab(url) {
            // Open PDF in new tab with specific parameters to force display
            const newWindow = window.open(url + '#toolbar=1&navpanes=1&scrollbar=1', '_blank');
            if (!newWindow) {
                alert('Pop-up diblokir! Silakan izinkan pop-up untuk preview PDF.');
            }
        }
    }));
});
</script>