@extends('Layout.app')

@section('title', 'Layanan Kami')

@push('styles')
<style>
    /* Shooting Stars Animation */
    .shooting-stars {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
    }

    .shooting-star {
        position: absolute;
        width: 2px;
        height: 2px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        opacity: 0;
        animation: shoot linear infinite;
    }

    .shooting-star::before {
        content: '';
        position: absolute;
        top: 50%;
        right: 0;
        width: 0;
        height: 1px;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.8) 100%);
        transform: translateY(-50%);
        animation: tail linear infinite;
    }

    @keyframes shoot {
        0% {
            opacity: 0;
            transform: translateX(-100px) translateY(100px);
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            transform: translateX(calc(100vw + 100px)) translateY(-100px);
        }
    }

    @keyframes tail {
        0% {
            width: 0;
        }
        10% {
            width: 50px;
        }
        90% {
            width: 50px;
        }
        100% {
            width: 0;
        }
    }

    /* Different shooting star variants */
    .shooting-star:nth-child(1) {
        top: 10%;
        left: -100px;
        animation-duration: 3s;
        animation-delay: 0s;
    }

    .shooting-star:nth-child(2) {
        top: 20%;
        left: -100px;
        animation-duration: 4s;
        animation-delay: 2s;
    }

    .shooting-star:nth-child(3) {
        top: 30%;
        left: -100px;
        animation-duration: 2.5s;
        animation-delay: 4s;
    }

    .shooting-star:nth-child(4) {
        top: 40%;
        left: -100px;
        animation-duration: 3.5s;
        animation-delay: 1s;
    }

    .shooting-star:nth-child(5) {
        top: 60%;
        left: -100px;
        animation-duration: 4.5s;
        animation-delay: 5s;
    }

    .shooting-star:nth-child(6) {
        top: 70%;
        left: -100px;
        animation-duration: 2.8s;
        animation-delay: 3s;
    }

    .shooting-star:nth-child(7) {
        top: 80%;
        left: -100px;
        animation-duration: 3.2s;
        animation-delay: 6s;
    }

    .shooting-star:nth-child(8) {
        top: 15%;
        left: -100px;
        animation-duration: 3.8s;
        animation-delay: 7s;
    }

    /* Ensure content is above shooting stars */
    .content-wrapper {
        position: relative;
        z-index: 10;
    }

    /* Add subtle glow effect for dark theme */
    .dark .shooting-star {
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 0 6px rgba(255, 255, 255, 0.6);
    }

    .dark .shooting-star::before {
        background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 100%);
    }
</style>
@endpush

@section('content')
{{-- Shooting Stars Background --}}
<div class="shooting-stars">
    <div class="shooting-star"></div>
    <div class="shooting-star"></div>
    <div class="shooting-star"></div>
    <div class="shooting-star"></div>
    <div class="shooting-star"></div>
    <div class="shooting-star"></div>
    <div class="shooting-star"></div>
    <div class="shooting-star"></div>
</div>

<div class="overflow-hidden content-wrapper">

    <div class="relative h-[70vh] overflow-hidden" 
    style="background: url({{ asset('storage/content/gif02.gif') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 class="mb-4 text-4xl font-semibold tracking-wide lg:text-6xl edu-vic-wa-nt-hand">
                    Layanan Kami
                </h1>
                <p class="max-w-2xl mx-auto text-xl pt-serif-regular-italic">
                    Wujudkan acara impian Anda dengan layanan profesional dan berkualitas tinggi
                </p>
                </p>
            </div>
        </div>
    </div>

    {{-- Main Services Section --}}
    <div class="px-6 py-20 bg-white dark:bg-gray-800 lg:px-20">
        <div class="mx-auto max-w-7xl">
            {{-- Section Header --}}
            <div data-aos="fade-down"  class="mb-16 text-center">
                <h2 class="mb-4 text-5xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">
                    Layanan Unggulan
                </h2>
                <p class="max-w-3xl mx-auto text-xl text-gray-600 dark:text-gray-300 pt-serif-regular-italic">
                    Dari pernikahan tradisional hingga event korporat modern, kami siap menghadirkan pengalaman tak terlupakan
                </p>
            </div>

            {{-- Services Grid--}}
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                {{-- Service 1: Wedding Organizer --}}
                <div data-aos="fade-up" class="relative overflow-hidden transition-all duration-500 border rounded-3xl group bg-white/70 dark:bg-gray-800/70 border-gray-200/50 dark:border-gray-700/50 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-2">
                    {{-- Image with modern overlay --}}
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 transition-transform duration-700 scale-105 group-hover:scale-100" style="background-image: url('{{ asset('storage/content/wedding11.jpg') }}'); background-size: cover; background-position: center;"></div>
                        <div class="absolute inset-0 transition-all duration-500 bg-gradient-to-t to-transparent from-black/60 via-black/20 group-hover:from-black/40"></div>
                        
                        {{-- Floating badge --}}
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1.5 text-xs font-medium tracking-wide text-white rounded-full bg-primary/90">
                                POPULER
                            </span>
                        </div>
                        
                        {{-- Service icon --}}
                        <div class="absolute bottom-4 left-4">
                            <div class="flex items-center justify-center w-12 h-12 transition-transform duration-300 rounded-2xl bg-white/90 dark:bg-gray-800/90 group-hover:scale-110">
                                <x-heroicon-o-heart class="w-6 h-6 text-primary" />
                            </div>
                        </div>
                    </div>
                    
                    {{-- Content --}}
                    <div class="p-6 space-y-4">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-gray-900 transition-colors duration-300 dark:text-white group-hover:text-primary">
                                Wedding Organizer
                            </h3>
                            <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                                Perencana pernikahan lengkap dari konsep hingga eksekusi yang tak terlupakan.
                            </p>
                        </div>
                        
                        {{-- Features with modern pills --}}
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                Konsultasi
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                Koordinasi
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                Pengawasan
                            </span>
                        </div>
                        
                        {{-- CTA Button --}}
                        <a href="/layananwedding" class="block">
                            <button class="w-full px-4 py-3 text-sm font-medium transition-all duration-300 border-2 rounded-2xl border-primary text-primary dark:text-white dark:border-white hover:bg-primary hover:text-white dark:hover:bg-white dark:hover:text-gray-900 hover:shadow-lg hover:shadow-primary/25">
                                Pelajari Selengkapnya
                            </button>
                        </a>
                    </div>
                </div>

                {{-- Service 2: Event --}}
                <div data-aos="fade-down"  class="relative overflow-hidden transition-all duration-500 border rounded-3xl group bg-white/70 dark:bg-gray-800/70 border-gray-200/50 dark:border-gray-700/50 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 transition-transform duration-700 scale-105 group-hover:scale-100" style="background-image: url('{{ asset('storage/content/event01.png') }}'); background-size: cover; background-position: center;"></div>
                        <div class="absolute inset-0 transition-all duration-500 bg-gradient-to-t to-transparent from-black/60 via-black/20 group-hover:from-black/40"></div>
                        
                        <div class="absolute bottom-4 left-4">
                            <div class="flex items-center justify-center w-12 h-12 transition-transform duration-300 rounded-2xl bg-white/90 dark:bg-gray-800/90 group-hover:scale-110">
                                <x-heroicon-o-sparkles class="w-6 h-6 text-primary" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-gray-900 transition-colors duration-300 dark:text-white group-hover:text-primary">
                                Event Organizer
                            </h3>
                            <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                                Layanan perencanaan acara yang profesional dan terorganisir.
                            </p>
                        </div>
                        
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                Perencanaan Acara
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                Dekorasi
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                Koordinasi Tim
                            </span>
                        </div>
                        <a href="/layanandekorasi" class="block">
                            <button class="w-full px-4 py-3 text-sm font-medium transition-all duration-300 border-2 rounded-2xl border-primary text-primary dark:text-white dark:border-white hover:bg-primary hover:text-white dark:hover:bg-white dark:hover:text-gray-900 hover:shadow-lg hover:shadow-primary/25">
                                Pelajari Selengkapnya
                            </button>
                        </a>
                    </div>
                </div>

                {{-- Service 3: Sewa Perlengkapan --}}
                <div data-aos="fade-left" class="relative overflow-hidden transition-all duration-500 border rounded-3xl group bg-white/70 dark:bg-gray-800/70 border-gray-200/50 dark:border-gray-700/50 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 transition-transform duration-700 scale-105 group-hover:scale-100" style="background-image: url('{{ asset('storage/content/decoration01.jpeg') }}'); background-size: cover; background-position: center;"></div>
                        <div class="absolute inset-0 transition-all duration-500 bg-gradient-to-t to-transparent from-black/60 via-black/20 group-hover:from-black/40"></div>
                        
                        <div class="absolute bottom-4 left-4">
                            <div class="flex items-center justify-center w-12 h-12 transition-transform duration-300 rounded-2xl bg-white/90 dark:bg-gray-800/90 group-hover:scale-110">
                                <x-heroicon-o-cube class="w-6 h-6 text-primary" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-gray-900 transition-colors duration-300 dark:text-white group-hover:text-primary">
                                Sewa Perlengkapan
                            </h3>
                            <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                                Penyewaan berbagai perlengkapan acara berkualitas tinggi.
                            </p>
                        </div>
                        
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                Furniture
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                Sound System
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                Tenda
                            </span>
                        </div>
                        
                        <a href="/layanansewa" class="block">
                            <button class="w-full px-4 py-3 text-sm font-medium transition-all duration-300 border-2 rounded-2xl border-primary text-primary dark:text-white dark:border-white hover:bg-primary hover:text-white dark:hover:bg-white dark:hover:text-gray-900 hover:shadow-lg hover:shadow-primary/25">
                                Pelajari Selengkapnya
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Process Section --}}
    <div class="px-6 py-20 bg-gray-50 dark:bg-gray-900 lg:px-20">
        <div class="mx-auto max-w-7xl">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-5xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">
                    Proses Kerja Kami
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 pt-serif-regular-italic">
                    Langkah demi langkah menuju acara impian Anda
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                {{-- Step 1 --}}
                <div class="text-center group">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-300 rounded-full bg-primary group-hover:scale-110">
                        <span class="text-2xl font-bold text-white">01</span>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">
                        Konsultasi
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                        Diskusi mendalam tentang visi, kebutuhan, dan budget acara Anda
                    </p>
                </div>

                {{-- Step 2 --}}
                <div class="text-center group">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-300 rounded-full bg-primary group-hover:scale-110">
                        <span class="text-2xl font-bold text-white">02</span>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">
                        Perencanaan
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                        Penyusunan timeline, konsep desain, dan koordinasi vendor
                    </p>
                </div>

                {{-- Step 3 --}}
                <div class="text-center group">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-300 rounded-full bg-primary group-hover:scale-110">
                        <span class="text-2xl font-bold text-white">03</span>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">
                        Persiapan
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                        Setup dekorasi, instalasi equipment, dan persiapan final
                    </p>
                </div>

                {{-- Step 4 --}}
                <div class="text-center group">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-300 rounded-full bg-primary group-hover:scale-110">
                        <span class="text-2xl font-bold text-white">04</span>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">
                        Eksekusi
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                        Pelaksanaan acara dengan pengawasan penuh dan koordinasi tim
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA Section --}}
    <div class="px-6 py-20 bg-white dark:bg-gray-800 lg:px-20">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="mb-6 text-5xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">
                Siap Mewujudkan Acara Impian Anda?
            </h2>
            <p class="mb-10 text-xl text-gray-600 dark:text-gray-300 pt-serif-regular-italic">
                Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik
            </p>
            <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                <button class="flex px-8 py-4 font-semibold text-white transition-all duration-300 group hover:scale-105 bg-primary rounded-xl">
                    <span class="mr-3 text-lg edu-vic-wa-nt-hand">Konsultasi Gratis</span>
                    <x-heroicon-o-arrow-small-up class="w-6 h-6 transition-all duration-300 group-hover:rotate-45" />
                </button>
                <button class="flex px-8 py-4 font-semibold transition-all duration-300 border-2 group hover:scale-105 border-primary text-primary dark:text-white dark:border-white rounded-xl">
                    <span class="mr-3 text-lg edu-vic-wa-nt-hand">Lihat Portfolio</span>
                    <x-heroicon-o-arrow-small-up class="w-6 h-6 transition-all duration-300 group-hover:rotate-45" />
                </button>
            </div>
            
        </div>
    </div>
</div>

@endsection