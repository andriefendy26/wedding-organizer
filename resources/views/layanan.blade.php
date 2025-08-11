@extends('Layout.app')

@section('head')
    <meta charset="UTF-8" />
    <title>Layanan | 3Rasa Event Organizer Tarakan</title>
    <meta name="description" content="3Rasa Event Organizer di Tarakan menyediakan berbagai layanan untuk acara Anda, termasuk wedding organizer, dekorasi, sewa perlengkapan event, dokumentasi foto & video, MC profesional, dan perencanaan acara perusahaan." />

    <meta name="keywords" content="layanan event organizer Tarakan, wedding organizer Tarakan, jasa dekorasi Tarakan, sewa perlengkapan acara Tarakan, jasa MC Tarakan, jasa fotografer Tarakan, jasa videografer Tarakan, event perusahaan Tarakan, layanan EO Tarakan, 3Rasa Event Organizer" />

    <meta name="author" content="3Rasa Event Organizer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.3rasaeventorganizer.com/layanan" />
    <link rel="icon" type="image/png" href="{{ asset('storage/content/Logo.png') }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/layanan" />
    <meta property="og:title" content="Layanan | 3Rasa Event Organizer Tarakan" />
    <meta property="og:description" content="Layanan lengkap untuk acara Anda di Tarakan, mulai dari wedding organizer, dekorasi, sewa perlengkapan event, hingga dokumentasi foto & video profesional." />
    <meta property="og:image" content="{{ asset('storage/content/Logo.png') }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Layanan | 3Rasa Event Organizer Tarakan" />
    <meta name="twitter:description" content="Wedding organizer, dekorasi, sewa perlengkapan event, dokumentasi foto & video, MC, dan layanan profesional lainnya di Tarakan." />
    <meta name="twitter:image" content="{{ asset('storage/content/Logo.png') }}" />
@endsection


@push('styles')

@endpush

@section('content')

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
    <div class="px-6 py-20 lg:px-20">
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
    <div class="px-6 py-20 lg:px-20">
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

</div>

@endsection