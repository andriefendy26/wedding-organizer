@extends('Layout.app')

@section('title', 'Tentang Kami - 3Rasa Wedding Organizer')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen pt-14">
    {{-- Hero Section --}}
    <div class="relative h-96 bg-gradient-to-r from-[--color-primary]/20 to-[--color-primary]/40 dark:from-gray-700 dark:to-gray-600">
        <div class="absolute inset-0 bg-[url('{{ asset('storage/content/decoration01.jpeg') }}')] bg-cover bg-center opacity-20"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center">
                <h1 class="text-6xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand mb-4">
                    Tentang 3Rasa
                </h1>
                <p class="text-xl text-gray-700 dark:text-gray-300 pt-serif-regular-italic max-w-2xl mx-auto">
                    Wujudkan momen spesial Anda bersama kami dengan sentuhan cinta dan dedikasi tinggi
                </p>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="px-30 py-16">
        {{-- Our Story Section --}}
        <div class="grid grid-cols-2 gap-20 mb-20 items-center">
            <div>
                <h2 class="text-5xl edu-vic-wa-nt-hand text-black dark:text-white mb-6">
                    Cerita Kami
                </h2>
                <p class="text-gray-700 dark:text-gray-300 pt-serif-regular text-lg leading-relaxed mb-6">
                    3Rasa lahir dari impian sederhana untuk menciptakan momen-momen berharga yang tak terlupakan. 
                    Dimulai pada tahun 2018 di Tarakan, Kalimantan Utara, kami hadir dengan semangat melayani 
                    setiap pasangan yang ingin merayakan cinta mereka dengan cara yang istimewa.
                </p>
                <p class="text-gray-700 dark:text-gray-300 pt-serif-regular text-lg leading-relaxed mb-8">
                    Nama "3Rasa" mencerminkan tiga pilar utama kami: <strong>Rasa Cinta</strong> dalam setiap detail, 
                    <strong>Rasa Bangga</strong> atas kepercayaan klien, dan <strong>Rasa Bahagia</strong> 
                    melihat senyum pengantin di hari bahagia mereka.
                </p>
                <button class="flex group hover:scale-105 transition-all duration-300 bg-[--color-primary] text-white rounded-full justify-center items-center">
                    <p class="my-3 mx-4 ml-6 pt-serif-regular">
                        Hubungi Kami
                    </p>
                    <div class="h-10 w-10 border-2 bg-white text-[--color-primary] rounded-full p-1 group-hover:rotate-45 duration-300 transition-all flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l4-4 4 4m0 6l-4-4-4 4"></path>
                        </svg>
                    </div>
                </button>
            </div>
            <div class="relative">
                <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="3Rasa Story" class="rounded-2xl shadow-2xl">
                <div class="absolute -bottom-10 -left-10 bg-white dark:bg-gray-700 rounded-xl p-6 shadow-xl border border-gray-200 dark:border-gray-600">
                    <div class="text-4xl edu-vic-wa-nt-hand text-[--color-primary] font-bold">100+</div>
                    <div class="text-gray-600 dark:text-gray-300 pt-serif-regular">Pasangan Bahagia</div>
                </div>
            </div>
        </div>

        {{-- Vision & Mission --}}
        <div class="grid grid-cols-2 gap-10 mb-20">
            <div class="bg-gray-100 dark:bg-gray-700 rounded-2xl p-8">
                <div class="w-16 h-16 bg-[--color-primary] rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-3xl edu-vic-wa-nt-hand text-black dark:text-white mb-4">Visi Kami</h3>
                <p class="text-gray-700 dark:text-gray-300 pt-serif-regular leading-relaxed">
                    Menjadi wedding organizer terdepan di Kalimantan Utara yang dikenal dengan pelayanan berkualitas tinggi, 
                    kreativitas tanpa batas, dan dedikasi penuh dalam mewujudkan setiap impian pernikahan klien kami.
                </p>
            </div>
            
            <div class="bg-gray-100 dark:bg-gray-700 rounded-2xl p-8">
                <div class="w-16 h-16 bg-[--color-primary] rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-3xl edu-vic-wa-nt-hand text-black dark:text-white mb-4">Misi Kami</h3>
                <p class="text-gray-700 dark:text-gray-300 pt-serif-regular leading-relaxed">
                    Memberikan layanan wedding organizer yang profesional, inovatif, dan personal untuk setiap klien. 
                    Kami berkomitmen menciptakan pengalaman pernikahan yang tak terlupakan dengan sentuhan tradisi 
                    dan kemewahan modern.
                </p>
            </div>
        </div>

        {{-- Our Values --}}
        <div class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-5xl edu-vic-wa-nt-hand text-black dark:text-white mb-4">Nilai-Nilai Kami</h2>
                <p class="text-gray-700 dark:text-gray-300 pt-serif-regular-italic text-xl max-w-3xl mx-auto">
                    Tiga pilar yang menjadi fondasi dalam setiap layanan yang kami berikan
                </p>
            </div>
            
            <div class="grid grid-cols-3 gap-8">
                <div class="text-center group hover:scale-105 transition-all duration-300">
                    <div class="w-20 h-20 bg-gradient-to-br from-[--color-primary] to-red-700 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:shadow-xl transition-all duration-300">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5 2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl edu-vic-wa-nt-hand-500 text-black dark:text-white mb-3">Rasa Cinta</h3>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                        Setiap detail dikerjakan dengan cinta dan perhatian penuh untuk menciptakan momen yang sempurna
                    </p>
                </div>
                
                <div class="text-center group hover:scale-105 transition-all duration-300">
                    <div class="w-20 h-20 bg-gradient-to-br from-[--color-primary] to-red-700 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:shadow-xl transition-all duration-300">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5,16L3,14L5,12L6.5,13.5L11,9L12.5,10.5L6.5,16.5L5,16M19,7H22V9H19V12H17V9H14V7H17V4H19V7M17,17V15H15V17H17M13,17V15H11V17H13M9,17V15H7V17H9Z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl edu-vic-wa-nt-hand-500 text-black dark:text-white mb-3">Rasa Bangga</h3>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                        Bangga menjadi bagian dari momen bahagia Anda dan dipercaya menghadirkan yang terbaik
                    </p>
                </div>
                
                <div class="text-center group hover:scale-105 transition-all duration-300">
                    <div class="w-20 h-20 bg-gradient-to-br from-[--color-primary] to-red-700 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:shadow-xl transition-all duration-300">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl edu-vic-wa-nt-hand-500 text-black dark:text-white mb-3">Rasa Bahagia</h3>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                        Kebahagiaan Anda adalah kebahagiaan kami, senyum Anda adalah reward terbesar bagi kami
                    </p>
                </div>
            </div>
        </div>

        {{-- Team Section --}}
        <div class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-5xl edu-vic-wa-nt-hand text-black dark:text-white mb-4">Tim Profesional Kami</h2>
                <p class="text-gray-700 dark:text-gray-300 pt-serif-regular-italic text-xl max-w-3xl mx-auto">
                    Berpengalaman bertahun-tahun dalam industri wedding dan event organizer
                </p>
            </div>
            
            <div class="grid grid-cols-3 gap-8">
                <div class="text-center group">
                    <div class="relative mb-6">
                        <img src="{{ asset('storage/content/team/founder.jpg') }}" alt="Founder" class="w-48 h-48 rounded-full mx-auto object-cover shadow-xl group-hover:scale-105 transition-all duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[--color-primary]/20 to-transparent rounded-full"></div>
                    </div>
                    <h3 class="text-2xl edu-vic-wa-nt-hand-500 text-black dark:text-white mb-2">Sarah Wijaya</h3>
                    <p class="text-[--color-primary] poppins-medium mb-3">Founder & Creative Director</p>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular text-sm px-4">
                        Memiliki pengalaman 8+ tahun di industri wedding. Lulusan Desain Interior yang passionate dengan detail dan estetika.
                    </p>
                </div>
                
                <div class="text-center group">
                    <div class="relative mb-6">
                        <img src="{{ asset('storage/content/team/coordinator.jpg') }}" alt="Event Coordinator" class="w-48 h-48 rounded-full mx-auto object-cover shadow-xl group-hover:scale-105 transition-all duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[--color-primary]/20 to-transparent rounded-full"></div>
                    </div>
                    <h3 class="text-2xl edu-vic-wa-nt-hand-500 text-black dark:text-white mb-2">Michael Chen</h3>
                    <p class="text-[--color-primary] poppins-medium mb-3">Senior Event Coordinator</p>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular text-sm px-4">
                        Expert dalam koordinasi vendor dan timeline management. Berpengalaman menangani 200+ wedding events.
                    </p>
                </div>
                
                <div class="text-center group">
                    <div class="relative mb-6">
                        <img src="{{ asset('storage/content/team/decorator.jpg') }}" alt="Lead Decorator" class="w-48 h-48 rounded-full mx-auto object-cover shadow-xl group-hover:scale-105 transition-all duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[--color-primary]/20 to-transparent rounded-full"></div>
                    </div>
                    <h3 class="text-2xl edu-vic-wa-nt-hand-500 text-black dark:text-white mb-2">Ayu Lestari</h3>
                    <p class="text-[--color-primary] poppins-medium mb-3">Lead Decorator</p>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular text-sm px-4">
                        Spesialis dekorasi pernikahan adat dan modern. Kreativitas tinggi dalam transformasi ruang dan konsep tema.
                    </p>
                </div>
            </div>
        </div>

        {{-- Statistics Section --}}
        <div class="bg-gradient-to-r from-[--color-primary]/10 to-[--color-primary]/20 dark:from-gray-700 dark:to-gray-600 rounded-3xl p-12 mb-20">
            <div class="grid grid-cols-4 gap-8 text-center">
                <div class="group hover:scale-105 transition-all duration-300">
                    <div class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] font-bold mb-2">100+</div>
                    <div class="text-gray-700 dark:text-gray-300 pt-serif-regular">Pasangan Bahagia</div>
                </div>
                <div class="group hover:scale-105 transition-all duration-300">
                    <div class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] font-bold mb-2">7</div>
                    <div class="text-gray-700 dark:text-gray-300 pt-serif-regular">Tahun Pengalaman</div>
                </div>
                <div class="group hover:scale-105 transition-all duration-300">
                    <div class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] font-bold mb-2">50+</div>
                    <div class="text-gray-700 dark:text-gray-300 pt-serif-regular">Vendor Partner</div>
                </div>
                <div class="group hover:scale-105 transition-all duration-300">
                    <div class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] font-bold mb-2">98%</div>
                    <div class="text-gray-700 dark:text-gray-300 pt-serif-regular">Kepuasan Klien</div>
                </div>
            </div>
        </div>

        {{-- Why Choose Us --}}
        <div class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-5xl edu-vic-wa-nt-hand text-black dark:text-white mb-4">Mengapa Memilih 3Rasa?</h2>
                <p class="text-gray-700 dark:text-gray-300 pt-serif-regular-italic text-xl max-w-3xl mx-auto">
                    Komitmen kami untuk memberikan yang terbaik dalam setiap detail pernikahan Anda
                </p>
            </div>
            
            <div class="grid grid-cols-2 gap-8">
                <div class="flex gap-6 p-6 bg-white dark:bg-gray-700 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[--color-primary] rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl poppins-medium text-black dark:text-white mb-2">Pengalaman Terpercaya</h3>
                        <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                            Lebih dari 7 tahun melayani pasangan di Kalimantan Utara dengan track record yang sempurna.
                        </p>
                    </div>
                </div>
                
                <div class="flex gap-6 p-6 bg-white dark:bg-gray-700 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[--color-primary] rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl poppins-medium text-black dark:text-white mb-2">Personal Touch</h3>
                        <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                            Setiap pernikahan adalah unik. Kami memberikan sentuhan personal yang sesuai dengan kepribadian Anda.
                        </p>
                    </div>
                </div>
                
                <div class="flex gap-6 p-6 bg-white dark:bg-gray-700 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[--color-primary] rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl poppins-medium text-black dark:text-white mb-2">Tim Profesional</h3>
                        <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                            Didukung oleh tim profesional yang berpengalaman dan passionate di bidangnya masing-masing.
                        </p>
                    </div>
                </div>
                
                <div class="flex gap-6 p-6 bg-white dark:bg-gray-700 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[--color-primary] rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl poppins-medium text-black dark:text-white mb-2">Harga Transparan</h3>
                        <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                            Tidak ada biaya tersembunyi. Semua detail biaya akan dijelaskan dengan jelas sejak awal.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Call to Action --}}
        <div class="text-center bg-gradient-to-r from-[--color-primary] to-red-700 rounded-3xl p-12 text-white">
            <h2 class="text-4xl edu-vic-wa-nt-hand mb-4">Siap Wujudkan Pernikahan Impian Anda?</h2>
            <p class="text-xl pt-serif-regular-italic mb-8 opacity-90">
                Mari diskusikan konsep pernikahan Anda bersama tim profesional kami
            </p>
            <div class="flex justify-center gap-4">
                <button class="flex group hover:scale-105 transition-all duration-300 bg-white text-[--color-primary] rounded-full justify-center items-center">
                    <p class="my-3 mx-4 ml-6 pt-serif-regular font-semibold">
                        Konsultasi Gratis
                    </p>
                    <div class="h-10 w-10 border-2 border-[--color-primary] bg-[--color-primary] text-white rounded-full p-1 group-hover:rotate-45 duration-300 transition-all flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l4-4 4 4m0 6l-4-4-4 4"></path>
                        </svg>
                    </div>
                </button>
                <button class="flex group hover:scale-105 transition-all duration-300 bg-transparent border-2 border-white text-white rounded-full justify-center items-center">
                    <p class="my-3 mx-4 ml-6 pt-serif-regular font-semibold">
                        Lihat Portfolio
                    </p>
                    <div class="h-10 w-10 border-2 border-white bg-white text-[--color-primary] rounded-full p-1 group-hover:rotate-45 duration-300 transition-all flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>

    /* Smooth animations */
    * {
        scroll-behavior: smooth;
    }

    /* Loading animation for images */
    img {
        transition: opacity 0.3s ease-in-out;
    }

    img[loading="lazy"] {
        opacity: 0;
    }

    img[loading="lazy"].loaded {
        opacity: 1;
    }

    /* Enhanced hover effects */
    .group:hover .group-hover\:shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--color-primary);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #8b0a08;
    }

    /* Dark mode scrollbar */
    .dark ::-webkit-scrollbar-track {
        background: #374151;
    }

    /* Parallax effect for hero section */
    .parallax-bg {
        transform: translateZ(0);
        will-change: transform;
    }

    /* Counter animation */
    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-count {
        animation: countUp 0.6s ease-out forwards;
    }

    /* Stagger animations for team cards */
    .team-card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .team-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .team-card:nth-child(3) {
        animation-delay: 0.3s;
    }

    /* Fade in animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    /* Button pulse animation */
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(178, 17, 14, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(178, 17, 14, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(178, 17, 14, 0);
        }
    }

    .btn-pulse:hover {
        animation: pulse 2s infinite;
    }

    /* Gradient text animation */
    @keyframes gradientShift {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .gradient-text {
        background: linear-gradient(-45deg, var(--color-primary), #ff6b6b, var(--color-primary), #ff8e8e);
        background-size: 400% 400%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 3s ease infinite;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .px-30 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .grid-cols-2 {
            grid-template-columns: 1fr;
        }

        .grid-cols-3 {
            grid-template-columns: 1fr;
        }

        .grid-cols-4 {
            grid-template-columns: repeat(2, 1fr);
        }

        .text-6xl {
            font-size: 3rem;
        }

        .text-5xl {
            font-size: 2.5rem;
        }

        .gap-20 {
            gap: 2rem;
        }

        .gap-10 {
            gap: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .grid-cols-4 {
            grid-template-columns: 1fr;
        }

        .text-6xl {
            font-size: 2.5rem;
        }

        .text-5xl {
            font-size: 2rem;
        }

        .px-30 {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Smooth scroll animation for internal links
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements for animation
        const animateElements = document.querySelectorAll('.group, .bg-gray-100, .bg-gradient-to-r');
        animateElements.forEach(el => {
            observer.observe(el);
        });

        // Counter animation
        const counters = document.querySelectorAll('.text-5xl');
        
        const countObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.textContent.replace(/\D/g, ''));
                    const suffix = counter.textContent.replace(/[0-9]/g, '');
                    let current = 0;
                    const increment = target / 50;
                    
                    const updateCounter = () => {
                        if (current < target) {
                            current += increment;
                            counter.textContent = Math.floor(current) + suffix;
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = target + suffix;
                        }
                    };
                    
                    counter.classList.add('animate-count');
                    updateCounter();
                    countObserver.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => {
            countObserver.observe(counter);
        });

        // Parallax effect for hero section
        const hero = document.querySelector('.relative.h-96');
        const heroImage = hero?.querySelector('.absolute.inset-0');
        
        window.addEventListener('scroll', () => {
            if (heroImage) {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                heroImage.style.transform = `translateY(${rate}px)`;
            }
        });

        // Lazy loading images
        const images = document.querySelectorAll('img[src]');
        
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.classList.add('loaded');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => {
            img.setAttribute('loading', 'lazy');
            imageObserver.observe(img);
        });

        // Button interactions
        const buttons = document.querySelectorAll('button');
        
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.classList.add('btn-pulse');
            });
            
            button.addEventListener('mouseleave', function() {
                this.classList.remove('btn-pulse');
            });

            // Add click handlers for functionality
            button.addEventListener('click', function() {
                const buttonText = this.querySelector('p').textContent.trim();
                
                switch(buttonText) {
                    case 'Hubungi Kami':
                        // Add WhatsApp or contact functionality
                        window.open('https://wa.me/1234567890', '_blank');
                        break;
                    case 'Konsultasi Gratis':
                        // Add consultation booking functionality
                        window.open('https://wa.me/1234567890?text=Halo, saya ingin konsultasi gratis untuk wedding organizer', '_blank');
                        break;
                    case 'Lihat Portfolio':
                        // Navigate to portfolio page
                        window.location.href = '/portfolio';
                        break;
                }
            });
        });

        // Dark mode toggle functionality (if needed)
        const darkModeToggle = document.querySelector('.dark-mode-toggle');
        if (darkModeToggle) {
            darkModeToggle.addEventListener('click', function() {
                document.documentElement.classList.toggle('dark');
                localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
            });

            // Check for saved dark mode preference
            if (localStorage.getItem('darkMode') === 'true') {
                document.documentElement.classList.add('dark');
            }
        }

        // Add smooth transitions to all hover effects
        const hoverElements = document.querySelectorAll('.group, .hover\\:scale-105, .hover\\:shadow-xl');
        hoverElements.forEach(element => {
            element.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        });

        // Add typing effect to main heading (optional)
        const mainHeading = document.querySelector('.text-6xl');
        if (mainHeading) {
            const text = mainHeading.textContent;
            mainHeading.textContent = '';
            let i = 0;
            
            const typeWriter = () => {
                if (i < text.length) {
                    mainHeading.textContent += text.charAt(i);
                    i++;
                    setTimeout(typeWriter, 100);
                }
            };
            
            // Start typing effect after a short delay
            setTimeout(typeWriter, 500);
        }

        // Add floating animation to decorative elements
        const floatingElements = document.querySelectorAll('.w-20.h-20, .w-16.h-16');
        floatingElements.forEach((element, index) => {
            element.style.animation = `float ${3 + (index * 0.5)}s ease-in-out infinite`;
        });

        // Add CSS for floating animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }
        `;
        document.head.appendChild(style);

        console.log('3Rasa About Us page loaded successfully!');
    });

    // Performance optimization
    window.addEventListener('load', function() {
        // Remove loading states
        document.body.classList.add('loaded');
        
        // Preload critical images
        const criticalImages = [
            "{{ asset('storage/content/wedding01.jpg') }}",
            "{{ asset('storage/content/team/founder.jpg') }}",
            "{{ asset('storage/content/team/coordinator.jpg') }}",
            "{{ asset('storage/content/team/decorator.jpg') }}"
        ];

        criticalImages.forEach(src => {
            const img = new Image();
            img.src = src;
        });
    });

    // Error handling for missing images
    document.addEventListener('error', function(e) {
        if (e.target.tagName === 'IMG') {
            e.target.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkltYWdlIG5vdCBmb3VuZDwvdGV4dD48L3N2Zz4=';
            e.target.alt = 'Image not found';
        }
    }, true);
</script>
@endpush

@endsection