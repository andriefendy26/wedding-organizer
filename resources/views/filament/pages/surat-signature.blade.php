<x-filament-panels::page>
    <div x-data="{
        pdfFile: null,
        pdfUrl: null,
        showPreview: false,
        currentPage: 1,
        scale: 1,
        position: { x: 50, y: 50 },
        isDragging: false,
        startPosition: { x: 0, y: 0 },
        showQrCode: @entangle('qrCodeGenerated'),
        qrCodeUrl: null,
        processingStatus: @entangle('processingStatus'),
        
        init() {
            this.$watch('pdfFile', (value) => {
                if (value) {
                    this.pdfUrl = URL.createObjectURL(value);
                    this.showPreview = true;
                }
            });

            // Listen for QR code generation
            this.$wire.on('qr-code-generated', (event) => {
                console.log('QR Code data received:', event);
                this.qrCodeUrl = event.qrCodeUrl;
                this.showQrCode = true;
            });

            // Get QR code URL from backend when component loads
            this.updateQrCodeFromBackend();
        },

        async updateQrCodeFromBackend() {
            try {
                const qrUrl = await this.$wire.call('getQrCodeUrl');
                if (qrUrl) {
                    this.qrCodeUrl = qrUrl;
                }
            } catch (error) {
                console.error('Error getting QR code URL:', error);
            }
        },

        async generateQrCodeImage(data) {
            console.log('Generating QR code with data:', data);
            
            // Create QR code data string
            const qrData = JSON.stringify(data, null, 2);
            
            // Try to use QRCode library if available
            if (typeof QRCode !== 'undefined') {
                try {
                    this.qrCodeUrl = await QRCode.toDataURL(qrData, {
                        width: 150,
                        height: 150,
                        margin: 1,
                        errorCorrectionLevel: 'M',
                        color: {
                            dark: '#000000',
                            light: '#FFFFFF'
                        }
                    });
                    console.log('QR Code generated successfully');
                    return;
                } catch (error) {
                    console.error('QRCode library failed:', error);
                }
            }

            // Fallback: Get QR code from backend
            try {
                const qrUrl = await this.$wire.call('getQrCodeUrl');
                if (qrUrl) {
                    this.qrCodeUrl = qrUrl;
                    console.log('QR Code loaded from backend');
                } else {
                    this.qrCodeUrl = this.generateFallbackQrCode(qrData);
                    console.log('Using fallback QR code');
                }
            } catch (error) {
                console.error('Backend QR code generation failed:', error);
                this.qrCodeUrl = this.generateFallbackQrCode(qrData);
            }
        },

        generateFallbackQrCode(data) {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.width = 150;
            canvas.height = 150;
            
            // Create a simple grid pattern to simulate QR code
            ctx.fillStyle = '#ffffff';
            ctx.fillRect(0, 0, 150, 150);
            
            // Draw border
            ctx.strokeStyle = '#000000';
            ctx.lineWidth = 2;
            ctx.strokeRect(0, 0, 150, 150);
            
            // Draw some patterns
            ctx.fillStyle = '#000000';
            const blockSize = 7.5;
            for (let i = 0; i < 20; i++) {
                for (let j = 0; j < 20; j++) {
                    if ((i + j) % 3 === 0 || (i % 2 === 0 && j % 2 === 0)) {
                        ctx.fillRect(i * blockSize, j * blockSize, blockSize, blockSize);
                    }
                }
            }
            
            // Add text overlay
            ctx.fillStyle = 'rgba(255, 255, 255, 0.9)';
            ctx.fillRect(30, 55, 90, 35);
            ctx.fillStyle = '#000000';
            ctx.font = 'bold 10px Arial';
            ctx.textAlign = 'center';
            ctx.fillText('QR CODE', 75, 68);
            ctx.font = '8px Arial';
            ctx.fillText('Digital Signature', 75, 80);
            
            return canvas.toDataURL('image/png');
        },

        startDrag(e) {
            e.preventDefault();
            this.isDragging = true;
            const rect = e.target.closest('.preview-container').getBoundingClientRect();
            this.startPosition = {
                x: e.clientX - rect.left - this.position.x,
                y: e.clientY - rect.top - this.position.y
            };
            
            document.addEventListener('mousemove', this.onDrag.bind(this));
            document.addEventListener('mouseup', this.stopDrag.bind(this));
        },

        onDrag(e) {
            if (this.isDragging) {
                const rect = document.querySelector('.preview-container').getBoundingClientRect();
                this.position = {
                    x: Math.max(0, Math.min(e.clientX - rect.left - this.startPosition.x, rect.width - 120)),
                    y: Math.max(0, Math.min(e.clientY - rect.top - this.startPosition.y, rect.height - 120))
                };
                
                // Update Livewire component
                this.$wire.call('updateSignaturePosition', this.position.x, this.position.y);
            }
        },

        stopDrag() {
            this.isDragging = false;
            document.removeEventListener('mousemove', this.onDrag);
            document.removeEventListener('mouseup', this.stopDrag);
        },

        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file && file.type === 'application/pdf') {
                if (file.size > 10 * 1024 * 1024) { // 10MB limit
                    alert('File terlalu besar! Maksimal 10MB.');
                    event.target.value = '';
                    return;
                }
                this.pdfFile = file;
                this.$wire.set('pdfFile', file);
            } else if (file) {
                alert('Please select a PDF file only!');
                event.target.value = '';
            }
        }
    }"
    class="space-y-4"
    >
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Digital Signature Surat</h1>
            <p class="text-gray-600 dark:text-gray-400">Upload PDF dan tambahkan tanda tangan digital dengan QR Code untuk verifikasi dokumen</p>
        </div>

        <!-- Processing Status -->
        <div x-show="processingStatus" class="mb-4">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-center">
                    <svg class="animate-spin h-5 w-5 text-blue-600 mr-3" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-blue-800 font-medium" x-text="processingStatus"></span>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Upload dan Informasi -->
            <div class="space-y-4">
                <x-filament::card>
                    <div class="space-y-4">
                        <!-- File Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Upload PDF <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="file" 
                                    accept="application/pdf" 
                                    x-on:change="handleFileUpload($event)"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                >
                                <div class="mt-2 text-xs text-gray-500">
                                    📄 Format: PDF | 📏 Maksimal: 10MB | 🔒 Secure Processing
                                </div>
                            </div>
                            @error('pdfFile')
                                <p class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Form Fields -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Nomor Surat <span class="text-red-500">*</span>
                                </label>
                                <x-filament::input 
                                    type="text"
                                    placeholder="Contoh: 001/DIR/2024"
                                    wire:model="noSurat"
                                    class="transition-all duration-200"
                                />
                                <p class="text-xs text-gray-500 mt-1">Format yang disarankan: nomor/kode/tahun</p>
                                @error('noSurat')
                                    <p class="text-red-500 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Perihal <span class="text-red-500">*</span>
                                </label>
                                <x-filament::input 
                                    type="text"
                                    placeholder="Contoh: Undangan Rapat Koordinasi"
                                    wire:model="perihal"
                                    class="transition-all duration-200"
                                />
                                @error('perihal')
                                    <p class="text-red-500 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Penandatangan <span class="text-red-500">*</span>
                                </label>
                                <x-filament::input 
                                    type="text"
                                    placeholder="Contoh: Dr. John Doe, M.Si"
                                    wire:model="penandatangan"
                                    class="transition-all duration-200"
                                />
                                <p class="text-xs text-gray-500 mt-1">Nama lengkap dengan gelar (jika ada)</p>
                                @error('penandatangan')
                                    <p class="text-red-500 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- PDF Controls -->
                        <div class="border-t pt-4" x-show="showPreview">
                            <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Kontrol Preview
                            </h3>
                            <div class="flex items-center gap-2 flex-wrap">
                                <button 
                                    class="px-3 py-2 bg-primary-600 text-white text-sm rounded-lg hover:bg-primary-700 transition-all duration-200 flex items-center"
                                    x-on:click="scale = Math.min(scale + 0.1, 2)"
                                    type="button"
                                >
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Zoom In
                                </button>
                                <button 
                                    class="px-3 py-2 bg-primary-600 text-white text-sm rounded-lg hover:bg-primary-700 transition-all duration-200 flex items-center"
                                    x-on:click="scale = Math.max(scale - 0.1, 0.5)"
                                    type="button"
                                >
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                    Zoom Out
                                </button>
                                <button 
                                    class="px-3 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition-all duration-200 flex items-center"
                                    x-on:click="scale = 1"
                                    type="button"
                                >
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Reset
                                </button>
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-500 bg-gray-100 dark:bg-gray-700 px-3 py-2 rounded-lg font-mono" x-text="Math.round(scale * 100) + '%'"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="border-t pt-4 space-y-3">
                            <x-filament::button
                                type="button"
                                color="primary"
                                wire:click="generateQrCode"
                                class="w-full"
                                wire:loading.attr="disabled"
                                x-bind:disabled="!showPreview || processingStatus"
                            >
                                <svg wire:loading.remove wire:target="generateQrCode" class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                </svg>
                                <div wire:loading wire:target="generateQrCode" class="w-4 h-4 mr-2">
                                    <svg class="animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </div>
                                <span x-show="!showQrCode">Generate QR Code Digital Signature</span>
                                <span x-show="showQrCode">Perbarui QR Code</span>
                            </x-filament::button>

                            <x-filament::button
                                type="button"
                                color="success"
                                x-show="showQrCode"
                                wire:click="downloadSignedPdf"
                                class="w-full"
                                wire:loading.attr="disabled"
                                x-bind:disabled="processingStatus"
                            >
                                <svg wire:loading.remove wire:target="downloadSignedPdf" class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <div wire:loading wire:target="downloadSignedPdf" class="w-4 h-4 mr-2">
                                    <svg class="animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </div>
                                <span wire:loading.remove wire:target="downloadSignedPdf">
                                    Download PDF dengan Tanda Tangan Digital
                                </span>
                                <span wire:loading wire:target="downloadSignedPdf">
                                    Sedang memproses PDF...
                                </span>
                            </x-filament::button>

                            <x-filament::button
                                type="button"
                                color="gray"
                                wire:click="resetForm"
                                class="w-full"
                                outline
                            >
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Reset Form
                            </x-filament::button>
                            
                            <!-- Info Helper -->
                            <div x-show="showQrCode" class="text-sm text-blue-600 bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg border border-blue-200 dark:border-blue-800">
                                <div class="flex">
                                    <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <p class="font-medium">Tips:</p>
                                        <ul class="mt-1 text-sm space-y-1">
                                            <li>• Geser QR Code pada preview untuk posisi yang diinginkan</li>
                                            <li>• QR Code berisi informasi verifikasi dokumen</li>
                                            <li>• PDF yang didownload sudah include tanda tangan digital</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- QR Code Debug Info (for development) -->
                        @if(app()->environment('local'))
                        <div x-show="showQrCode" class="border-t pt-4">
                            <details class="text-xs">
                                <summary class="cursor-pointer text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">Debug Info (Development Only)</summary>
                                <div class="mt-2 p-2 bg-gray-100 dark:bg-gray-800 rounded text-gray-700 dark:text-gray-300 font-mono">
                                    <p>QR Code Generated: <span x-text="showQrCode ? 'Yes' : 'No'"></span></p>
                                    <p>QR Code URL Available: <span x-text="qrCodeUrl ? 'Yes' : 'No'"></span></p>
                                    <p>Position: <span x-text="JSON.stringify(position)"></span></p>
                                    <p>Scale: <span x-text="scale"></span></p>
                                </div>
                            </details>
                        </div>
                        @endif

                        <!-- Flash Messages moved to Filament notifications -->
                    </div>
                </x-filament::card>
            </div>

            <!-- Preview Section -->
            <div class="preview-container relative border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl overflow-hidden bg-gray-50 dark:bg-gray-800 transition-all duration-200" style="height: 800px;">
                <!-- PDF Preview -->
                <div x-show="showPreview" class="w-full h-full relative">
                    <iframe
                        x-bind:src="pdfUrl"
                        class="w-full h-full transition-transform duration-200 border-0"
                        x-bind:style="'transform: scale(' + scale + '); transform-origin: top left;'"
                        loading="lazy"
                    ></iframe>

                    <!-- Draggable QR Code -->
                    <div
                        x-show="showPreview && showQrCode"
                        class="absolute cursor-move bg-white p-2 rounded-lg shadow-xl border-2 border-dashed border-primary-400 hover:border-primary-600 transition-all duration-200 hover:shadow-2xl group"
                        x-bind:style="'left: ' + position.x + 'px; top: ' + position.y + 'px; z-index: 10;'"
                        x-on:mousedown="startDrag($event)"
                        title="Drag untuk mengubah posisi tanda tangan digital"
                    >
                        <!-- QR Code Preview -->
                        <div class="w-24 h-24 bg-white flex items-center justify-center border rounded overflow-hidden">
                            <img x-show="qrCodeUrl" x-bind:src="qrCodeUrl" alt="QR Code Digital Signature" class="w-full h-full object-contain"/>
                            <div x-show="!qrCodeUrl" class="animate-pulse bg-gray-200 w-full h-full rounded flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Digital Signature Info -->
                        <div class="mt-1 text-xs text-center text-gray-700">
                            <div class="font-semibold truncate max-w-24" title="{{ $penandatangan ?: 'Penandatangan' }}">
                                {{ Str::limit($penandatangan ?: 'Penandatangan', 12) }}
                            </div>
                            <div class="text-[10px] text-gray-500 truncate max-w-24" title="{{ $noSurat ?: 'No. Surat' }}">
                                {{ Str::limit($noSurat ?: 'No. Surat', 15) }}
                            </div>
                            <div class="text-[10px] text-gray-500">{{ date('d/m/Y') }}</div>
                            <div class="text-[9px] text-blue-600 font-medium">Digital Sign</div>
                        </div>
                        
                        <!-- Drag indicator -->
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-primary-500 rounded-full flex items-center justify-center shadow-lg group-hover:bg-primary-600 transition-colors duration-200">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                            </svg>
                        </div>

                        <!-- Position indicator -->
                        <div class="absolute -bottom-6 left-0 right-0 text-center">
                            <span class="text-xs bg-black text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                x:<span x-text="Math.round(position.x)"></span> y:<span x-text="Math.round(position.y)"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div x-show="!showPreview" class="w-full h-full flex flex-col items-center justify-center text-gray-500 dark:text-gray-400">
                    <div class="text-center max-w-md">
                        <svg class="w-24 h-24 mb-4 text-gray-300 dark:text-gray-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 3v6a2 2 0 002 2h6"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m-3-3l3 3 3-3"/>
                        </svg>
                        <h3 class="text-lg font-medium mb-2 text-gray-600 dark:text-gray-300">Upload PDF untuk melihat preview</h3>
                        <p class="text-sm text-gray-400 mb-4">File yang didukung: PDF (maksimal 10MB)</p>
                        
                        <div class="grid grid-cols-1 gap-3 text-xs text-gray-400">
                            <div class="flex items-center justify-center space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Tanda tangan digital
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    QR Code verification
                                </span>
                            </div>
                            <div class="flex items-center justify-center space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Drag & drop positioning
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Secure & encrypted
                                </span>
                            </div>
                        </div>

                        <!-- Steps guide -->
                        <div class="mt-6 p-4 bg-gray-100 dark:bg-gray-700/50 rounded-lg text-left">
                            <h4 class="font-medium text-gray-700 dark:text-gray-300 mb-2">Langkah-langkah:</h4>
                            <ol class="text-xs text-gray-600 dark:text-gray-400 space-y-1">
                                <li>1. Upload file PDF dokumen Anda</li>
                                <li>2. Isi informasi nomor surat, perihal, dan penandatangan</li>
                                <li>3. Generate QR Code untuk tanda tangan digital</li>
                                <li>4. Atur posisi QR Code dengan drag & drop</li>
                                <li>5. Download PDF yang sudah ditandatangani</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
    @endpush
</x-filament-panels::page>