@extends('Layout.app')

@section('head')
    <meta charset="UTF-8" />
    <title>Kontak Kami | 3Rasa Event Organizer Tarakan</title>
    <meta name="description" content="Hubungi 3Rasa Event Organizer di Tarakan untuk konsultasi dan pemesanan layanan wedding organizer, dekorasi, sewa perlengkapan event, dokumentasi foto & video, MC profesional, dan event perusahaan." />

    <meta name="keywords" content="kontak event organizer Tarakan, hubungi wedding organizer Tarakan, jasa dekorasi Tarakan, sewa perlengkapan acara Tarakan, jasa MC Tarakan, jasa fotografer Tarakan, jasa videografer Tarakan, event perusahaan Tarakan, 3Rasa Event Organizer" />

    <meta name="author" content="3Rasa Event Organizer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.3rasaeventorganizer.com/kontak" />
    <link rel="icon" type="image/png" href="{{ asset('storage/content/Logo.png') }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/kontak" />
    <meta property="og:title" content="Kontak Kami | 3Rasa Event Organizer Tarakan" />
    <meta property="og:description" content="Hubungi kami untuk konsultasi dan pemesanan layanan acara di Tarakan. 3Rasa Event Organizer siap membantu Anda mewujudkan acara impian." />
    <meta property="og:image" content="{{ asset('storage/content/Logo.png') }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Kontak Kami | 3Rasa Event Organizer Tarakan" />
    <meta name="twitter:description" content="Hubungi 3Rasa Event Organizer di Tarakan untuk layanan wedding organizer, dekorasi, sewa perlengkapan event, dan dokumentasi profesional." />
    <meta name="twitter:image" content="{{ asset('storage/content/Logo.png') }}" />
@endsection


@section('content')
<div class="min-h-screen bg-white dark:bg-gray-800">
    {{-- Hero Section --}}

    <div class="relative h-[70vh] bg-cover bg-center overflow-hidden"
    style="background: url({{ asset('storage/content/gif02.gif') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="absolute inset-0 bg-black/80"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 data-aos="zoom-in-down" class="mb-4 text-6xl font-semibold tracking-wide edu-vic-wa-nt-hand">
                    Hubungi Kami
                </h1>
                <p data-aos="zoom-in-up" class="max-w-2xl mx-auto text-xl pt-serif-regular-italic">
                    Siap mewujudkan pernikahan impian Anda? Mari berkonsultasi dan rencanakan momen spesial bersama tim profesional kami
                </p>
            </div>
        </div>
    </div>


    {{-- Main Contact Section --}}
    <div class="px-4 py-16 mx-auto sm:px-6 lg:px-32">
        <div class="grid grid-cols-1 gap-16 lg:grid-cols-2">
            {{-- Get In Touch Form --}}
            <div>
                <div class="mb-8">
                    <h2 class="mb-4 text-4xl font-semibold text-black edu-vic-wa-nt-hand dark:text-white">
                        Get In Touch
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 pt-serif-regular-italic">
                        Ceritakan visi pernikahan impian Anda, dan biarkan kami membantu mewujudkannya menjadi kenyataan yang menakjubkan.
                    </p>
                </div>

                <!-- Tambahkan di dalam form section, setelah opening form tag -->
                <form data-aos="fade-right" x-data="contactForm()" @submit.prevent="submitForm" class="space-y-6">
                    <!-- Error Message -->
                    <div x-show="errorMessage" x-transition class="p-4 border border-red-200 bg-red-50 dark:bg-red-900/20 dark:border-red-800 rounded-xl">
                        <div class="flex items-center gap-2 text-red-800 dark:text-red-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="font-medium" x-text="errorMessage"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nama Lengkap *
                            </label>
                            <input 
                                x-model="form.name"
                                type="text" 
                                required
                                class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                                placeholder="Masukkan nama lengkap Anda"
                            />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nomor WhatsApp *
                            </label>
                            <input 
                                x-model="form.phone"
                                @input="formatPhone"
                                type="tel" 
                                required
                                class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                                placeholder="contoh: 081234567890"
                            />
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Email
                        </label>
                        <input 
                            x-model="form.email"
                            type="email" 
                            class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                            placeholder="nama@email.com"
                        />
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Tanggal Acara *
                            </label>
                            <input 
                                x-model="form.event_date"
                                @change="validateEventDate"
                                type="date" 
                                required
                                :min="new Date().toISOString().split('T')[0]"
                                class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                            />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Estimasi Budget
                            </label>
                            <select 
                                x-model="form.budget"
                                class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
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
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Jenis Layanan *
                        </label>
                        <div class="grid grid-cols-2 gap-3 md:grid-cols-3">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="wedding-organizer"
                                    class="border-gray-300 rounded text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">Wedding Organizer</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="decoration"
                                    class="border-gray-300 rounded text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">Dekorasi</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="catering"
                                    class="border-gray-300 rounded text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">Catering</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="photography"
                                    class="border-gray-300 rounded text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">Fotografi</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="sound-system"
                                    class="border-gray-300 rounded text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">Sound System</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="mc"
                                    class="border-gray-300 rounded text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">MC</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Pesan & Detail Acara *
                        </label>
                        <textarea 
                            x-model="form.message"
                            rows="5" 
                            required
                            class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 resize-none dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                            placeholder="Ceritakan konsep pernikahan impian Anda, jumlah tamu, lokasi yang diinginkan, dan detail lainnya..."
                        ></textarea>
                    </div>

                    <button 
                        type="submit"
                        :disabled="loading"
                        class="w-full px-8 py-4 text-lg font-medium text-white transition-all duration-300 bg-primary rounded-xl hover:scale-105 edu-vic-wa-nt-hand disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span x-show="!loading">Kirim Pesan</span>
                        <span x-show="loading" class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Mengirim...
                        </span>
                    </button>

                    <!-- Success Message -->
                    <div x-show="success" x-transition class="p-4 border border-green-200 bg-green-50 dark:bg-green-900/20 dark:border-green-800 rounded-xl">
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
                    <h3 class="mb-4 text-2xl font-semibold text-black edu-vic-wa-nt-hand dark:text-white">
                        Lokasi Kami
                    </h3>
                    <div class="overflow-hidden bg-gray-100 shadow-lg dark:bg-gray-700 rounded-2xl">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d995.791256998401!2d117.61308987388932!3d3.30932746315719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32138ba9e5fc4035%3A0x9789bc310bda2509!2sDekorasi%20tiga%20rasa!5e0!3m2!1sid!2sid!4v1754933077601!5m2!1sid!2sid"
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
                <div class="p-8 bg-gray-50 dark:bg-gray-700 rounded-2xl">
                    <h3 class="mb-6 text-2xl font-semibold text-black edu-vic-wa-nt-hand dark:text-white">
                        Jam Operasional
                    </h3>
                    <div class="space-y-4 pt-serif-regular">
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">Senin - Jumat</span>
                            <span class="font-medium text-black dark:text-white">09.00 - 18.00</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">Sabtu</span>
                            <span class="font-medium text-black dark:text-white">09.00 - 18.00</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">Minggu</span>
                            <span class="font-medium text-black dark:text-white">09.00 - 18.00</span>
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <span class="text-gray-700 dark:text-gray-300">Hari Libur Nasional</span>
                            <span class="font-medium text-black dark:text-white">09.00 - 18.00</span>
                        </div>
                    </div>
                    
                    <div class="p-4 mt-6 border border-blue-200 bg-blue-50 dark:bg-blue-900/20 rounded-xl dark:border-blue-800">
                        <p class="text-sm text-blue-800 dark:text-blue-200">
                            <strong>Catatan:</strong> Untuk konsultasi di luar jam operasional, hubungi WhatsApp kami. Kami siap melayani konsultasi darurat 24/7.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- FAQ Section --}}
    <div class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container px-4 mx-auto sm:px-6 lg:px-8">
            <div data-aos="zoom-in-left" class="mb-12 text-center">
                <h2 class="mb-4 text-4xl font-semibold text-black edu-vic-wa-nt-hand dark:text-white">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-300 pt-serif-regular-italic">
                    Temukan jawaban untuk pertanyaan umum seputar layanan wedding organizer kami
                </p>
            </div>

            <div data-aos="fade-right" class="max-w-4xl mx-auto space-y-4" x-data="{ openFaq: null }">
                {{-- FAQ Item 1 --}}
                <div class="bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 1 ? null : 1"
                        class="flex items-center justify-between w-full px-6 py-6 text-left transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl"
                    >
                        <h3 class="pr-4 text-lg font-semibold text-black dark:text-white">
                            Berapa lama waktu yang dibutuhkan untuk merencanakan pernikahan?
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 1 }" 
                            class="w-6 h-6 transition-transform duration-300 text-primary"
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
                <div class="bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 2 ? null : 2"
                        class="flex items-center justify-between w-full px-6 py-6 text-left transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl"
                    >
                        <h3 class="pr-4 text-lg font-semibold text-black dark:text-white">
                            Apakah ada paket wedding organizer yang bisa disesuaikan dengan budget?
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 2 }" 
                            class="w-6 h-6 transition-transform duration-300 text-primary"
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
                <div class="bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 3 ? null : 3"
                        class="flex items-center justify-between w-full px-6 py-6 text-left transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl"
                    >
                        <h3 class="pr-4 text-lg font-semibold text-black dark:text-white">
                            Bagaimana proses konsultasi dan perencanaan dengan tim 3Rasa?
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 3 }" 
                            class="w-6 h-6 transition-transform duration-300 text-primary"
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
                <div class="bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 4 ? null : 4"
                        class="flex items-center justify-between w-full px-6 py-6 text-left transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl"
                    >
                        <h3 class="pr-4 text-lg font-semibold text-black dark:text-white">
                            Apakah 3Rasa melayani pernikahan adat tradisional?
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 4 }" 
                            class="w-6 h-6 transition-transform duration-300 text-primary"
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
                <div class="bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 5 ? null : 5"
                        class="flex items-center justify-between w-full px-6 py-6 text-left transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl"
                    >
                        <h3 class="pr-4 text-lg font-semibold text-black dark:text-white">
                            Bagaimana jika ada perubahan mendadak pada hari pernikahan?
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 5 }" 
                            class="w-6 h-6 transition-transform duration-300 text-primary"
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