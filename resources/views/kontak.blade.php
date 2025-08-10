@extends('Layout.app')

@section('title', 'Hubungi Kami - 3Rasa Wedding Organizer')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen">
    {{-- Hero Section --}}

    <div class="relative h-[70vh] bg-cover bg-center overflow-hidden"
    style="background: url({{ asset('storage/content/gif02.gif') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="absolute inset-0 bg-black/80"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 data-aos="zoom-in-down" class="text-6xl font-semibold mb-4 edu-vic-wa-nt-hand tracking-wide">
                    Hubungi Kami
                </h1>
                <p data-aos="zoom-in-up" class="text-xl pt-serif-regular-italic max-w-2xl mx-auto">
                    Siap mewujudkan pernikahan impian Anda? Mari berkonsultasi dan rencanakan momen spesial bersama tim profesional kami
                </p>
            </div>
        </div>
    </div>


    {{-- Main Contact Section --}}
    <div class="mx-auto px-4 sm:px-6 lg:px-32 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            {{-- Get In Touch Form --}}
            <div>
                <div class="mb-8">
                    <h2 class="text-4xl font-semibold mb-4 edu-vic-wa-nt-hand text-black dark:text-white">
                        Get In Touch
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 text-lg pt-serif-regular-italic">
                        Ceritakan visi pernikahan impian Anda, dan biarkan kami membantu mewujudkannya menjadi kenyataan yang menakjubkan.
                    </p>
                </div>

                <!-- Tambahkan di dalam form section, setelah opening form tag -->
                <form data-aos="fade-right" x-data="contactForm()" @submit.prevent="submitForm" class="space-y-6">
                    <!-- Error Message -->
                    <div x-show="errorMessage" x-transition class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-4">
                        <div class="flex items-center gap-2 text-red-800 dark:text-red-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="font-medium" x-text="errorMessage"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Nama Lengkap *
                            </label>
                            <input 
                                x-model="form.name"
                                type="text" 
                                required
                                class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none bg-white dark:bg-gray-700 text-black dark:text-white poppins-regular transition-colors"
                                placeholder="Masukkan nama lengkap Anda"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Nomor WhatsApp *
                            </label>
                            <input 
                                x-model="form.phone"
                                @input="formatPhone"
                                type="tel" 
                                required
                                class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none bg-white dark:bg-gray-700 text-black dark:text-white poppins-regular transition-colors"
                                placeholder="contoh: 081234567890"
                            />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Email
                        </label>
                        <input 
                            x-model="form.email"
                            type="email" 
                            class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none bg-white dark:bg-gray-700 text-black dark:text-white poppins-regular transition-colors"
                            placeholder="nama@email.com"
                        />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Tanggal Acara *
                            </label>
                            <input 
                                x-model="form.event_date"
                                @change="validateEventDate"
                                type="date" 
                                required
                                :min="new Date().toISOString().split('T')[0]"
                                class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none bg-white dark:bg-gray-700 text-black dark:text-white poppins-regular transition-colors"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Estimasi Budget
                            </label>
                            <select 
                                x-model="form.budget"
                                class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none bg-white dark:bg-gray-700 text-black dark:text-white poppins-regular transition-colors"
                            >
                                <option value="">Pilih range budget</option>
                                <option value="10-25">10 - 25 Juta</option>
                                <option value="25-50">25 - 50 Juta</option>
                                <option value="50-100">50 - 100 Juta</option>
                                <option value="100+">100+ Juta</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Jenis Layanan *
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="wedding-organizer"
                                    class="rounded border-gray-300 text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">Wedding Organizer</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="decoration"
                                    class="rounded border-gray-300 text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">Dekorasi</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="catering"
                                    class="rounded border-gray-300 text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">Catering</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="photography"
                                    class="rounded border-gray-300 text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">Fotografi</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="sound-system"
                                    class="rounded border-gray-300 text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">Sound System</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="mc"
                                    class="rounded border-gray-300 text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">MC</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Pesan & Detail Acara *
                        </label>
                        <textarea 
                            x-model="form.message"
                            rows="5" 
                            required
                            class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none bg-white dark:bg-gray-700 text-black dark:text-white poppins-regular transition-colors resize-none"
                            placeholder="Ceritakan konsep pernikahan impian Anda, jumlah tamu, lokasi yang diinginkan, dan detail lainnya..."
                        ></textarea>
                    </div>

                    <button 
                        type="submit"
                        :disabled="loading"
                        class="w-full bg-primary text-white py-4 px-8 rounded-xl hover:scale-105 transition-all duration-300 font-medium text-lg edu-vic-wa-nt-hand disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span x-show="!loading">Kirim Pesan</span>
                        <span x-show="loading" class="flex items-center justify-center gap-2">
                            <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Mengirim...
                        </span>
                    </button>

                    <!-- Success Message -->
                    <div x-show="success" x-transition class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-4">
                        <div class="flex items-center gap-2 text-green-800 dark:text-green-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="font-medium">Konsultasi berhasil dikirim!</p>
                                <p class="text-sm">Tim kami akan menghubungi Anda segera untuk membahas detail pernikahan impian Anda.</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Google Maps & Business Hours --}}
            <div data-aos="fade-left" class="space-y-8">
                {{-- Google Maps --}}
                <div>
                    <h3 class="text-2xl font-semibold mb-4 edu-vic-wa-nt-hand text-black dark:text-white">
                        Lokasi Kami
                    </h3>
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255282.32734509213!2d117.35089995!3d3.325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x321463d73b98b9bd%3A0x9b2c484fdad86b21!2sTarakan%2C%20North%20Kalimantan!5e0!3m2!1sen!2sid!4v1701234567890!5m2!1sen!2sid"
                            width="100%" 
                            height="350" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="rounded-2xl"
                        ></iframe>
                    </div>
                </div>

                {{-- Business Hours --}}
                <div class="bg-gray-50 dark:bg-gray-700 rounded-2xl p-8">
                    <h3 class="text-2xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white">
                        Jam Operasional
                    </h3>
                    <div class="space-y-4 pt-serif-regular">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">Senin - Jumat</span>
                            <span class="font-medium text-black dark:text-white">09.00 - 18.00</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">Sabtu</span>
                            <span class="font-medium text-black dark:text-white">09.00 - 18.00</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">Minggu</span>
                            <span class="font-medium text-black dark:text-white">09.00 - 18.00</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-700 dark:text-gray-300">Hari Libur Nasional</span>
                            <span class="font-medium text-black dark:text-white">09.00 - 18.00</span>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl border border-blue-200 dark:border-blue-800">
                        <p class="text-blue-800 dark:text-blue-200 text-sm">
                            <strong>Catatan:</strong> Untuk konsultasi di luar jam operasional, hubungi WhatsApp kami. Kami siap melayani konsultasi darurat 24/7.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- FAQ Section --}}
    <div class="bg-gray-50 dark:bg-gray-900 py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="zoom-in-left" class="text-center mb-12">
                <h2 class="text-4xl font-semibold mb-4 edu-vic-wa-nt-hand text-black dark:text-white">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-lg pt-serif-regular-italic max-w-2xl mx-auto">
                    Temukan jawaban untuk pertanyaan umum seputar layanan wedding organizer kami
                </p>
            </div>

            <div data-aos="fade-right" class="max-w-4xl mx-auto space-y-4" x-data="{ openFaq: null }">
                {{-- FAQ Item 1 --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 1 ? null : 1"
                        class="w-full px-6 py-6 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl transition-colors"
                    >
                        <h3 class="text-lg font-semibold text-black dark:text-white pr-4">
                            Berapa lama waktu yang dibutuhkan untuk merencanakan pernikahan?
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 1 }" 
                            class="w-6 h-6 text-primary transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 1" x-transition class="px-6 pb-6">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                            Idealnya, perencanaan pernikahan dimulai 6-12 bulan sebelum hari H. Namun, kami juga bisa menangani pernikahan dengan waktu persiapan yang lebih singkat, bahkan hingga 1-2 bulan sebelumnya, tergantung ketersediaan vendor dan kompleksitas acara.
                        </p>
                    </div>
                </div>

                {{-- FAQ Item 2 --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 2 ? null : 2"
                        class="w-full px-6 py-6 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl transition-colors"
                    >
                        <h3 class="text-lg font-semibold text-black dark:text-white pr-4">
                            Apakah ada paket wedding organizer yang bisa disesuaikan dengan budget?
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 2 }" 
                            class="w-6 h-6 text-primary transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 2" x-transition class="px-6 pb-6">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                            Tentu saja! Kami menyediakan berbagai paket mulai dari basic hingga premium. Setiap paket bisa dikustomisasi sesuai kebutuhan dan budget Anda. Tim kami akan membantu memaksimalkan budget yang ada untuk hasil terbaik.
                        </p>
                    </div>
                </div>

                {{-- FAQ Item 3 --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 3 ? null : 3"
                        class="w-full px-6 py-6 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl transition-colors"
                    >
                        <h3 class="text-lg font-semibold text-black dark:text-white pr-4">
                            Bagaimana proses konsultasi dan perencanaan dengan tim 3Rasa?
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 3 }" 
                            class="w-6 h-6 text-primary transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 3" x-transition class="px-6 pb-6">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                            Proses dimulai dengan konsultasi gratis untuk memahami visi dan kebutuhan Anda. Setelah itu, kami akan menyusun proposal detail beserta timeline. Sepanjang proses, Anda akan mendapat update rutin dan bisa berkonsultasi kapan saja.
                        </p>
                    </div>
                </div>

                {{-- FAQ Item 4 --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 4 ? null : 4"
                        class="w-full px-6 py-6 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl transition-colors"
                    >
                        <h3 class="text-lg font-semibold text-black dark:text-white pr-4">
                            Apakah 3Rasa melayani pernikahan adat tradisional?
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 4 }" 
                            class="w-6 h-6 text-primary transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 4" x-transition class="px-6 pb-6">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                            Ya, kami sangat berpengalaman dalam menyelenggarakan pernikahan adat, khususnya adat Kalimantan dan tradisi lokal lainnya. Tim kami memahami protokol adat dan bekerjasama dengan tetua adat untuk memastikan setiap ritual berjalan dengan sempurna.
                        </p>
                    </div>
                </div>

                {{-- FAQ Item 5 --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 5 ? null : 5"
                        class="w-full px-6 py-6 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl transition-colors"
                    >
                        <h3 class="text-lg font-semibold text-black dark:text-white pr-4">
                            Bagaimana jika ada perubahan mendadak pada hari pernikahan?
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 5 }" 
                            class="w-6 h-6 text-primary transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 5" x-transition class="px-6 pb-6">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                            Tim 3Rasa selalu memiliki contingency plan untuk berbagai situasi darurat. Kami menyediakan koordinator lapangan yang siap menangani perubahan mendadak dan memastikan acara tetap berjalan lancar tanpa mengurangi kualitas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    function contactForm() {
        return {
            loading: false,
            success: false,
            errorMessage: '',
            form: {
                name: '',
                phone: '',
                email: '',
                event_date: '',
                budget: '',
                services: [],
                message: ''
            },
            
            async submitForm() {
                this.loading = true;
                this.success = false;
                this.errorMessage = '';
                
                try {
                    // Validasi client-side
                    if (!this.form.name || !this.form.phone || !this.form.event_date || !this.form.message) {
                        throw new Error('Mohon lengkapi semua field yang wajib diisi');
                    }
                    
                    if (this.form.services.length === 0) {
                        throw new Error('Pilih minimal satu jenis layanan');
                    }

                    // Kirim data ke Laravel controller
                    const response = await fetch('/konsultasi', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(this.form)
                    });

                    const result = await response.json();

                    if (!response.ok) {
                        // Handle validation errors
                        if (result.errors) {
                            const errorMessages = Object.values(result.errors).flat();
                            throw new Error(errorMessages.join(', '));
                        } else {
                            throw new Error(result.message || 'Terjadi kesalahan pada server');
                        }
                    }

                    if (result.success) {
                        this.success = true;
                        this.resetForm();
                        
                        // Auto-hide success message after 8 seconds
                        setTimeout(() => {
                            this.success = false;
                        }, 8000);

                        // Optional: Redirect to WhatsApp with pre-filled message
                        const whatsappMessage = encodeURIComponent(
                            `Halo 3Rasa Wedding Organizer!\n\n` +
                            `Saya ${this.form.name} baru saja mengirim form konsultasi melalui website. ` +
                            `Mohon informasi lebih lanjut untuk pernikahan saya pada ${this.form.event_date}.\n\n` +
                            `Terima kasih!`
                        );
                        
                        // Uncomment jika ingin auto redirect ke WhatsApp
                        // setTimeout(() => {
                        //     window.open(`https://wa.me/6281234567890?text=${whatsappMessage}`, '_blank');
                        // }, 2000);
                    } else {
                        throw new Error(result.message || 'Gagal mengirim konsultasi');
                    }
                    
                } catch (error) {
                    console.error('Error submitting form:', error);
                    this.errorMessage = error.message;
                    
                    // Show error for 5 seconds
                    setTimeout(() => {
                        this.errorMessage = '';
                    }, 5000);
                } finally {
                    this.loading = false;
                }
            },
            
            resetForm() {
                this.form = {
                    name: '',
                    phone: '',
                    email: '',
                    event_date: '',
                    budget: '',
                    services: [],
                    message: ''
                };
            },

            // Format phone number as user types
            formatPhone() {
                let phone = this.form.phone.replace(/\D/g, '');
                
                // Add +62 prefix if not present and starts with 0
                if (phone.startsWith('0')) {
                    phone = '62' + phone.substring(1);
                } else if (!phone.startsWith('62')) {
                    phone = '62' + phone;
                }
                
                this.form.phone = phone;
            },

            // Validate event date
            validateEventDate() {
                const selectedDate = new Date(this.form.event_date);
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                
                if (selectedDate <= today) {
                    alert('Tanggal acara harus setelah hari ini');
                    this.form.event_date = '';
                }
            }
        }
    }
</script>
@endpush
@endsection