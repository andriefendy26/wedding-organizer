{{-- resources/views/components/discount-overlay.blade.php --}}
<div id="discount-overlay" class="fixed inset-0 z-50 hidden">
    <!-- Background Backdrop -->
    <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>
    
    <!-- Modal Content -->
    <div class="relative flex items-center justify-center min-h-screen p-4">
        <div class="relative max-w-md w-full bg-red-700 rounded-2xl shadow-2xl transform transition-all duration-300 scale-95 hover:scale-100">
            
            <!-- Close Button -->
            <button id="close-overlay" class="absolute top-4 right-4 text-white hover:text-gray-200 transition-colors duration-200 z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Content -->
            <div class="p-8 text-center text-white">
                <!-- Icon/Badge -->
                <div class="mx-auto w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732L14.146 12.8l-1.179 4.456a1 1 0 01-1.934 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732L9.854 7.2l1.179-4.456A1 1 0 0112 2z" clip-rule="evenodd"></path>
                    </svg>
                </div>

                <!-- Heading -->
                <h2 class="text-3xl font-bold mb-2">Selamat Datang!</h2>
                <p class="text-lg mb-6 text-white text-opacity-90">Dapatkan diskon spesial untuk pembelian pertama Anda</p>

                <!-- Discount Badge -->
                <div class="bg-white bg-opacity-20 rounded-xl p-4 mb-6 backdrop-blur-sm">
                    <div class="text-5xl font-black text-yellow-300 mb-2">25%</div>
                    <div class="text-sm font-semibold uppercase tracking-wider">Diskon Khusus</div>
                </div>

                <!-- Description -->
                <p class="text-sm mb-6 text-white text-opacity-80">
                    Gunakan kode <span class="font-bold text-yellow-300">WELCOME25</span> 
                    untuk mendapatkan diskon 25% pada pembelian pertama Anda!
                </p>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <button class="w-full bg-white text-purple-600 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors duration-200 transform hover:scale-105">
                        Gunakan Sekarang
                    </button>
                    <button id="close-overlay-secondary" class="w-full bg-transparent border-2 border-white text-white font-semibold py-2 px-6 rounded-lg hover:bg-white hover:text-purple-600 transition-all duration-200">
                        Nanti Saja
                    </button>
                </div>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden rounded-2xl pointer-events-none">
                <div class="absolute -top-10 -right-10 w-20 h-20 bg-white bg-opacity-10 rounded-full"></div>
                <div class="absolute -bottom-6 -left-6 w-16 h-16 bg-white bg-opacity-10 rounded-full"></div>
                <div class="absolute top-1/3 -right-4 w-8 h-8 bg-yellow-300 bg-opacity-30 rounded-full"></div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const overlay = document.getElementById('discount-overlay');
    const closeButtons = [
        document.getElementById('close-overlay'),
        document.getElementById('close-overlay-secondary')
    ];
    
    // Check if user has seen the overlay before
    const hasSeenOverlay = localStorage.getItem('discount_overlay_shown');
    
    if (!hasSeenOverlay) {
        // Show overlay after a short delay
        setTimeout(() => {
            overlay.classList.remove('hidden');
            overlay.querySelector('.relative > div').classList.add('scale-100');
        }, 1000);
    }
    
    // Close overlay function
    function closeOverlay() {
        overlay.classList.add('hidden');
        // Mark as seen in localStorage
        localStorage.setItem('discount_overlay_shown', 'true');
    }
    
    // Add click event to close buttons
    closeButtons.forEach(button => {
        if (button) {
            button.addEventListener('click', closeOverlay);
        }
    });
    
    // Close on backdrop click
    overlay.addEventListener('click', function(e) {
        if (e.target === overlay || e.target === overlay.firstElementChild) {
            closeOverlay();
        }
    });
    
    // Close on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !overlay.classList.contains('hidden')) {
            closeOverlay();
        }
    });
});
</script>