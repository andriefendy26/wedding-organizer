@php
    $phoneNumber = config('app.phone');
    $message = <<<TEXT
    ==============================
    *HALO, SAYA INGIN KONSULTASI*
    ==============================

    Halo *3Rasa Production* 👋

    Saya tertarik untuk berkonsultasi mengenai layanan yang tersedia.

    🙏 Terima kasih atas waktunya.
    📩 Pesan ini dikirim via: https://3rasaproduction.com
TEXT;

    $encodedMessage = urlencode($message);

@endphp

@extends('Layout.app')


{{-- @section('title', 'Home') --}}
@section('head')
    <meta charset="UTF-8" />
    <title>Home | 3Rasa Event Organizer Tarakan</title>
    <meta name="description" content="3Rasa Event Organizer di Tarakan menyediakan layanan perencanaan dan penyelenggaraan acara profesional." />

    <meta name="keywords" content="event organizer Tarakan, jasa EO Tarakan, wedding organizer Tarakan, sewa dekorasi Tarakan, jasa dekorasi pernikahan Tarakan, jasa sewa sound system Tarakan, event pernikahan Tarakan, event ulang tahun Tarakan, EO profesional Tarakan, 3Rasa Event Organizer, jasa MC Tarakan, jasa fotografer Tarakan, jasa videografer Tarakan, event kantor Tarakan, acara perusahaan Tarakan" />

    <meta name="author" content="3Rasa Event Organizer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.3rasaeventorganizer.com/" />
    <link rel="icon" type="image/png" href={{ asset('storage/content/Logo.png') }} />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/" />
    <meta property="og:title" content="3Rasa Event Organizer | Tarakan" />
    <meta property="og:description" content="Layanan event organizer profesional di Tarakan. Kami membantu merencanakan dan menyelenggarakan acara impian Anda dengan konsep unik dan berkesan." />
    <meta property="og:image" content={{ asset('storage/content/wedding11.jpg') }} />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="3Rasa Event Organizer | Tarakan" />
    <meta name="twitter:description" content="Event organizer terpercaya di Tarakan. Layanan profesional untuk pernikahan, ulang tahun, dan event perusahaan." />
    <meta name="twitter:image" content={{ asset('storage/content/wedding11.jpg') }} />
@endsection

@section('content')
<div class="relative w-full h-screen"
    x-data="{}"
    >
    <div class="containerHero">
        <div id="slide">                 
            <div x-data="{kursiIsOpen : true}" class="bg-white item sm dark:bg-gray-800" style="background-image: url('{{ asset('storage/content/gif04.gif') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div class="absolute inset-0 bg-black/50"></div>
                <div class="relative flex items-center justify-center w-full h-full pt-48 text-center content">
                    <div class="flex flex-col items-center justify-center">
                        <h1 class="lg:w-[30%] text-white text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                                Sewa Perlengkapan Lengkap di 3Rasa
                        </h1>
                        <p class="lg:w-[50%] my-6 text-gray-200 text-lg pt-serif-regular-italic">  Apapun konsepnya, kami hadirkan perlengkapan terbaik agar setiap momen Anda berjalan sempurna — dari dekorasi mewah hingga detail kecil yang memikat.</p>
                        <div class="flex items-start justify-center gap-3 font-semibold edu-vic-wa-nt-hand-500">
                            <a href="https://api.whatsapp.com/send/?phone={{ $phoneNumber }}&text={{ $encodedMessage }}&type=phone_number&app_absent=0" target="_blank">
                                <button class="p-2 px-5 tracking-wide text-black transition-all duration-300 bg-white rounded-xl hover:tracking-widest hover:px-8">
                                    Konsultasi Gratis
                            </a>
                            <a href="/portofolio">
                                </button>
                                <button class="p-2 px-5 tracking-wide text-white transition-all duration-300 rounded-xl bg-primary hover:tracking-widest hover:px-8">Lihat Portofolio</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div x-data="{kursiIsOpen : true}" class="bg-white item sm dark:bg-gray-800" style="background-image: url('{{ asset('storage/content/gif03.gif') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div class="absolute inset-0 bg-black/50"></div>
                <div class="relative flex items-center justify-center w-full h-full pt-48 text-center content">
                    <div class="flex flex-col items-center justify-center">
                        <h2 id="typewriter" class="lg:w-[30%] text-white text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                              
                        </h2>
                        <p class="lg:w-[50%] my-6 text-gray-200 text-lg pt-serif-regular-italic">Percayakan kebutuhan acara Anda pada tim profesional kami. Kami siap membantu mewujudkan momen istimewa dengan perlengkapan dan layanan yang prima.</p>
                        <div class="flex items-start justify-center gap-3 font-semibold edu-vic-wa-nt-hand-500">
                            <a href="https://api.whatsapp.com/send/?phone={{ $phoneNumber }}&text={{ $encodedMessage }}&type=phone_number&app_absent=0" target="_blank">
                                <button class="p-2 px-5 tracking-wide text-black transition-all duration-300 bg-white rounded-xl hover:tracking-widest hover:px-8">
                                    Konsultasi Gratis
                            </a>
                            <a href="/portofolio">
                                </button>
                                <button class="p-2 px-5 tracking-wide text-white transition-all duration-300 rounded-xl bg-primary hover:tracking-widest hover:px-8">Lihat Portofolio</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div x-data="{kursiIsOpen : true}" class="bg-white item sm dark:bg-gray-800" style="background-image: url('{{ asset('storage/content/gif04.gif') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div class="absolute inset-0 bg-black/50"></div>
                <div class="relative flex items-center justify-center w-full h-full pt-48 text-center content">
                    <div class="flex flex-col items-center justify-center">
                        <h2 class="lg:w-[30%] text-white text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                                Sewa Perlengkapan Lengkap di 3Rasa
                        </h2>
                        <p class="lg:w-[50%] my-6 text-gray-200 text-lg pt-serif-regular-italic">Dari pesta pernikahan yang elegan, event korporat profesional, hinggapenyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.</p>
                        <div class="flex items-start justify-center gap-3 font-semibold edu-vic-wa-nt-hand-500">
                            <a href="https://api.whatsapp.com/send/?phone={{ $phoneNumber }}&text={{ $encodedMessage }}&type=phone_number&app_absent=0" target="_blank">
                                <button class="p-2 px-5 tracking-wide text-black transition-all duration-300 bg-white rounded-xl hover:tracking-widest hover:px-8">
                                    Konsultasi Gratis
                            </a>
                            <a href="/portofolio">
                                </button>
                                <button class="p-2 px-5 tracking-wide text-white transition-all duration-300 rounded-xl bg-primary hover:tracking-widest hover:px-8">Lihat Portofolio</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div x-data="{kursiIsOpen : true}" class="bg-white item sm dark:bg-gray-800" style="background-image: url('{{ asset('storage/content/gif03.gif') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div class="absolute inset-0 bg-black/50"></div>
                <div class="relative flex items-center justify-center w-full h-full pt-48 text-center content">
                    <div class="flex flex-col items-center justify-center">
                       <h2 class="lg:w-[30%] text-white text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                              Dari Konsep hingga Kenangan Indah, Kami Ada untuk Anda
                        </h2>
                        <p class="lg:w-[50%] my-6 text-gray-200 text-lg pt-serif-regular-italic">Dari pesta pernikahan yang elegan, event korporat profesional, hinggapenyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.</p>
                        <div class="flex items-start justify-center gap-3 font-semibold edu-vic-wa-nt-hand-500">
                            <a href="https://api.whatsapp.com/send/?phone={{ $phoneNumber }}&text={{ $encodedMessage }}&type=phone_number&app_absent=0" target="_blank">
                                <button class="p-2 px-5 tracking-wide text-black transition-all duration-300 bg-white rounded-xl hover:tracking-widest hover:px-8">
                                    Konsultasi Gratis
                            </a>
                            <a href="/portofolio">
                                </button>
                                <button class="p-2 px-5 tracking-wide text-white transition-all duration-300 rounded-xl bg-primary hover:tracking-widest hover:px-8">Lihat Portofolio</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="buttons">
            <button id="prev" class="left-0 p-3 border-2 rounded-full bg-white/40"><x-heroicon-o-arrow-long-left /></i></button>
            <button id="next" class="right-0 p-3 border-2 rounded-full bg-white/40"><x-heroicon-o-arrow-long-right /></i></button>
        </div>
    </div>
</div>

{{-- Services Section --}}
<div class="px-10 pt-20 pb-10 overflow-hidden md:px-16 lg:px-24 xl:px-32">

    {{-- Header Instagram --}}
    <div class="mb-12 text-center">
        <div data-aos="zoom-in-down" class="relative text-black edu-vic-wa-nt-hand-500 dark:text-white">
            <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">Apa Yang Kami Tawarkan</div>
            <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                LAYANAN
            </h2>
        </div>
        <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
            <h3 class="mb-4 text-xl text-black md:text-2xl lg:text-4xl poppins-medium dark:text-white">Layanan Terlengkap Untuk Acara Impian Anda</h3>
            <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                Dari perencanaan hingga eksekusi, kami menyediakan layanan komprehensif untuk mewujudkan pernikahan dan acara istimewa Anda
            </p>
        </div>
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

{{-- Hiasan --}}
<div class="px-10 overflow-hidden md:px-16 lg:px-24 xl:px-32">
    <h2 data-aos="fade-right" class="py-8 mx-8 text-2xl text-center text-black lg:text-3xl poppins-medium md:mx-20 lg:mx-40 dark:text-white">Hadirkan yang 
        <span class="pt-serif-regular-italic">
            Anggun
        </span> 
            dan 
            <span class="pt-serif-regular-italic">
                Abadi
            </span>
            
            , Mengukir
            <span class="pt-serif-regular-italic">
                Kenangan Indah 
            </span>
            Dikenang 
            <span class="pt-serif-regular-italic">
                Sepanjang Masa.
            </span>
    </h2>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        {{-- card 1 --}}
        <div data-aos="fade-left" class="flex poppins-regular h-72 md:h-[500px] flex-col p-4 text-white border-2 border-gray-300 justify-between rounded-xl" style="background-image: url('{{ asset('storage/content/wedding03.jpg') }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <h3 class="self-end w-auto px-3 py-1 text-xs border-2 border-white rounded-full">hari yang perlu diingat</h3>
            <p class="tracking-widest text-md xl:text-lg edu-vic-wa-nt-hand-400">Dari sentuhan adat hingga kemegahan perayaan, biarkan kami merencanakan pernikahan impian Anda dengan keindahan tradisi yang otentik.</p>
        </div>
    
        {{-- card 2 --}}
        <div data-aos="fade-up" class="flex flex-col items-center justify-center gap-4 p-4 text-center border-2 border-gray-200 rounded-xl">
            <h3 class="text-3xl text-black lg:text-4xl edu-vic-wa-nt-hand-500 dark:text-white">Dibuat dengan banyak cinta</h3>
            <p class="text-sm tracking-wider text-gray-600 pt-serif-regular lg:text-md dark:text-gray-400">Perjalanan pernikahan Anda adalah kisah yang indah, dan kami hadir untuk menuliskannya. Dibuat dengan banyak cinta dan dedikasi, kami pastikan setiap momen pernikahan adat Anda memancarkan kehangatan dan kemegahan</p>
            

        </div>
    
        {{-- card 3 --}}
        <div data-aos="fade-down" class="h-40 lg:h-[500px] md:col-span-2 lg:col-span-1 flex relative overflow-hidden poppins-regular flex-col p-4 text-white border-2 border-gray-300 justify-between rounded-xl" style="background-image: url('{{ asset('storage/content/wedding04.jpg') }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <div class="absolute inset-0 bg-black/60 "></div>
            <div class="relative z-10 flex gap-3 text-xs">
                <span class="p-1 px-5 rounded-full backdrop-blur-sm bg-white/40">Elegan</span>
                <span class="p-1 px-5 rounded-full backdrop-blur-sm bg-white/40">Unik</span>
                <span class="p-1 px-5 rounded-full backdrop-blur-sm bg-white/40">2025</span>
            </div>
            <div class="relative z-10 flex gap-3 text-xs">
                <span class="p-2 rounded-full backdrop-blur-sm lg:p-5 bg-white/40"><x-bi-instagram class="w-4 h-4" /></span>
                <span class="p-2 rounded-full backdrop-blur-sm lg:p-5 bg-white/40"><x-bi-telephone class="w-4 h-4"/></span>
                <span class="p-2 rounded-full backdrop-blur-sm lg:p-5 bg-white/40"><x-bi-tiktok class="w-4 h-4" /></span>
            </div>
        </div>
        
    </div>

    <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">

        <div  class="grid grid-cols-3 gap-4">
            <div data-aos="zoom-in-down"  class="col-span-3 p-6 bg-gray-200 rounded-2xl">
                <h3 class="text-lg text-black poppins-regular">Apa yang pasangan kami katakan :</h3>
                <p class="mt-2 text-sm text-gray-800 edu-vic-wa-nt-hand-500">"Pelayanan sangat ramah dan profesional. Dekorasi pernikahan kami benar-benar indah dan sesuai impian! "
                    <span class="font-semibold text-primary">- Rina & Andi</spam>
                </p>
            </div>

            <div data-aos="zoom-in-down" class="col-span-3 h-52 rounded-xl xl:h-full xl:col-span-1" style="background-image: url('{{ asset("storage/content/wedding05.jpeg") }}'); background-size: cover; background-position: center;"></div>
            {{-- <img src="{{ asset("storage/content/wedding05.jpeg") }}" class="col-span-3 w-52 h-52 rounded-xl" alt="Couple Tarakan"> --}}
            
            <div data-aos="zoom-in-up"  class="flex flex-col items-center justify-center col-span-2 gap-4 p-4 text-sm text-center border-2 border-gray-200 rounded-2xl xl:col-span-1">
                {{-- <h3 class="text-4xl text-black edu-vic-wa-nt-hand-500 dark:text-white">Dibuat dengan banyak cinta</h3> --}}
                <p class="tracking-wider text-center text-gray-600 pt-serif-regular dark:text-gray-400">Perjalanan pernikahan Anda adalah kisah yang indah, dan kami hadir untuk menuliskannya.</p>
   
            </div>

            <div data-aos="zoom-in-left"  class="flex flex-col items-center justify-center gap-4 p-4 text-sm text-center bg-gray-200 border-2 border-gray-200 rounded-2xl">
                {{-- <h3 class="text-4xl text-black edu-vic-wa-nt-hand-500 dark:text-white">Dibuat dengan banyak cinta</h3> --}}
                <p class="text-3xl tracking-wider text-center text-gray-600 pt-serif-regular xl:text-5xl dark:text-gray-400">100 +</p>
                <p class="tracking-wider text-center text-gray-600 pt-serif-regular dark:text-gray-400">Pasangan yang puas</p>
            </div>
        </div>
        
        <div data-aos="fade-left"  class="grid grid-cols-1 gap-5 pt-serif-regular">
            <div class="p-6 bg-gray-200 rounded-2xl">
                <h3 class="text-black text-md"> Perencanaan menyeluruh yang dilakukan sejak awal untuk memastikan setiap detail acara pernikahan dapat terlaksana dengan baik sesuai impian Anda, mulai dari pemilihan konsep dan tema, pemetaan kebutuhan utama maupun tambahan, hingga penyusunan jadwal kerja yang matang.</h3>
            </div>
            <div class="px-6 py-4 bg-gray-200 rounded-2xl">
                <p class="text-black">01. <span class="">Diskusi awal konsep acara</span> </h3>
            </div>
            <div class="px-6 py-4 bg-gray-200 rounded-2xl">
                <p class="text-black">02. <span class=""> Pemetaan kebutuhan klien</span> </h3>
            </div>
            <div class="px-6 py-4 bg-gray-200 rounded-2xl">
                <p class="text-black">03. <span class=""> Penyusunan draft timeline</span>  </h3>
            </div>
        
        </div>
    </div>
</div>

{{-- Service Overview Section --}}
<div class="px-10 py-20 overflow-hidden md:px-16 lg:px-24 xl:px-32">
    <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
        <div data-aos="fade-right">
            <h2 class="mb-6 text-3xl font-semibold text-black lg:text-5xl edu-vic-wa-nt-hand dark:text-white">
                Menciptakan Suasana yang 
                <span class="pt-serif-regular-italic text-primary">Memukau</span>
            </h2>
            <p class="mb-6 text-lg leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">
                Setiap acara memiliki cerita uniknya sendiri. Kami hadir untuk menerjemahkan visi Anda menjadi realitas visual yang menawan melalui desain dekorasi yang thoughtful dan detail-oriented.
            </p>
            <p class="mb-8 text-lg leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">
                Dari konsep awal hingga eksekusi final, tim kreatif kami berkomitmen menghadirkan dekorasi yang tidak hanya indah dipandang, tetapi juga mencerminkan kepribadian dan gaya Anda.
            </p>
            
            <div class="grid grid-cols-2 gap-6 mb-8">
                <div class="p-4 text-center bg-gray-100 rounded-2xl dark:bg-gray-700">
                    <h3 class="text-2xl font-bold text-primary edu-vic-wa-nt-hand-500">500+</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Dekorasi Terealisasi</p>
                </div>
                <div class="p-4 text-center bg-gray-100 rounded-2xl dark:bg-gray-700">
                    <h3 class="text-2xl font-bold text-primary edu-vic-wa-nt-hand-500">5+</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Tahun Pengalaman</p>
                </div>
            </div>
        </div>
        
        <div data-aos="fade-left" class="relative">
            <div class="grid grid-cols-2 gap-4">
                <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Dekorasi 1" class="object-cover w-full h-48 shadow-lg rounded-2xl">
                <img src="{{ asset('storage/content/decoration11.jpg') }}" alt="Dekorasi 2" class="object-cover w-full h-32 mt-16 shadow-lg rounded-2xl">
                <img src="{{ asset('storage/content/decoration13.jpg') }}" alt="Dekorasi 3" class="object-cover w-full h-32 shadow-lg rounded-2xl">
                <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Dekorasi 4" class="object-cover w-full h-48 shadow-lg rounded-2xl">
            </div>
            
            {{-- Floating card --}}
            <div class="absolute p-6 bg-white border border-gray-200 shadow-xl -bottom-6 -left-6 rounded-2xl dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-primary">
                        <x-heroicon-o-sparkles class="w-6 h-6 text-white" />
                    </div>
                    <div>
                        <h4 class="font-bold text-black dark:text-white">Desain Custom</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Sesuai Keinginan Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Testimoni --}}
<div class="px-10 mt-10 overflow-hidden md:px-16 lg:px-24 xl:px-32">
    <div  class="mb-12 text-center">
        <div data-aos="zoom-in-down" class="relative text-black edu-vic-wa-nt-hand-500 dark:text-white">
            <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">Cerita Nyata, Momen Nyata</div>
            <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                Testimoni
            </h2>
        </div>
        <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
            <h3 class="mb-4 text-xl text-black md:text-2xl lg:text-4xl poppins-medium dark:text-white">Suara dari Mereka yang Telah Percaya</h3>
            <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                DENGARKAN PENGALAMAN DAN KESAN YANG MEREKA BAGIKAN UNTUK SETIAP MIMPI YANG TERWUJUD
            </p>
        </div>
    </div>


    {{-- Marquee testimoni --}}

    <div class="mt-10 marquee-container">
        {{-- marquee ke kiri --}}
        <div class="flex mb-8 space-x-6 whitespace-nowrap marquee-left">
            @foreach($testimoni as $testimonial)
                <div class="flex-shrink-0 p-6 bg-white border-2 border-gray-300 shadow-lg rounded-xl max-w-80">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-12 h-12 bg-black rounded-full bg-gradient-to-r from-purple-500 to-pink-500">
                            <span class="text-lg font-bold text-white">JD</span>
                        </div>
                        <div class="ml-3">
                            <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                            <p class="text-sm text-gray-500">
                                    <!-- Rating dalam bentuk ikon bintang -->
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-700 whitespace-normal">{{ Str::limit($testimonial->deskripsi, 100, '...') }}</p>
                </div>
            @endforeach
            @foreach($testimoni as $testimonial)
                <div class="flex-shrink-0 p-6 bg-white border-2 border-gray-300 shadow-lg rounded-xl max-w-80">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-12 h-12 bg-black rounded-full bg-gradient-to-r from-purple-500 to-pink-500">
                            <span class="text-lg font-bold text-white">JD</span>
                        </div>
                        <div class="ml-3">
                            <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                            <p class="text-sm text-gray-500">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-700 whitespace-normal">{{ Str::limit($testimonial->deskripsi, 100, '...') }}</p>
                </div>
            @endforeach
        </div>
        {{-- marquee ke kanan --}}
        <div class="flex space-x-6 whitespace-nowrap marquee-right">
            @foreach($testimoni as $testimonial)
                <div class="flex-shrink-0 p-6 bg-white border-2 border-gray-300 shadow-lg rounded-xl max-w-80">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-12 h-12 bg-black rounded-full bg-gradient-to-r from-purple-500 to-pink-500">
                            <span class="text-lg font-bold text-white">JD</span>
                        </div>
                        <div class="ml-3">
                            <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                            <p class="text-sm text-gray-500">
                                    <!-- Rating dalam bentuk ikon bintang -->
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-700 whitespace-normal">{{ Str::limit($testimonial->deskripsi, 100, '...') }}</p>
                </div>
            @endforeach
            @foreach($testimoni as $testimonial)
                <div class="flex-shrink-0 p-6 bg-white border-2 border-gray-300 shadow-lg rounded-xl max-w-80">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-12 h-12 bg-black rounded-full bg-gradient-to-r from-purple-500 to-pink-500">
                            <span class="text-lg font-bold text-white">JD</span>
                        </div>
                        <div class="ml-3">
                            <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                            <p class="text-sm text-gray-500">  <!-- Rating dalam bentuk ikon bintang -->
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-700 whitespace-normal">{{ Str::limit($testimonial->deskripsi, 100, '...') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Instagram Section --}}
<div class="px-10 pt-10 overflow-hidden md:px-16 lg:px-24 xl:px-32">
    {{-- Header Instagram --}}
    <div  class="mb-12 text-center">
        <div data-aos="zoom-in-down" class="relative text-black edu-vic-wa-nt-hand-500 dark:text-white">
            <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">Ikuti Perjalanan Kami</div>
            <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                INSTAGRAM
            </h2>
        </div>
        <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
            <h3 class="mb-4 text-xl text-black md:text-2xl lg:text-4xl poppins-medium dark:text-white">Inspirasi & Momen Terbaru</h3>
            <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                Temukan inspirasi pernikahan terbaru, behind the scenes, dan momen bahagia dari klien kami di Instagram
            </p>
        </div>
    </div>


    {{-- Instagram Profile Card --}}
    <div data-aos="zoom-in-down" class="max-w-md p-1 mx-auto mb-8 bg-gradient-to-br from-purple-500 to-orange-400 rounded-2xl via-primary">
        <div  class="p-6 bg-white rounded-2xl dark:bg-gray-800">
            <div  class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-black dark:text-white">@3rasa_wedding</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Wedding Organizer Tarakan</p>
                    </div>
                </div>
                <button class="items-center justify-center hidden px-4 py-2 transition-all duration-300 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 lg:flex group hover:scale-105">
                    <x-bi-instagram class="w-5 h-5 mr-2 text-black dark:text-white" />
                    <span class="font-semibold text-black dark:text-white">Follow</span>
                </button>
            </div>
            
            <div class="grid grid-cols-3 gap-4 text-center">
                <div>
                    <p class="text-xl font-bold text-black dark:text-white">150</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Posts</p>
                </div>
                <div>
                    <p class="text-xl font-bold text-black dark:text-white">2.5K</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Followers</p>
                </div>
                <div>
                    <p class="text-xl font-bold text-black dark:text-white">1.2K</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Following</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Instagram Feed Grid --}}
    <div class="grid grid-cols-1 gap-6 pb-8 md:grid-cols-2 lg:grid-cols-3">
        {{-- Instagram Post 1 --}}
        <div data-aos="zoom-in-up" class="relative overflow-hidden transition-all duration-300 bg-white border-2 border-gray-200 shadow-lg rounded-2xl group dark:border-gray-700 dark:bg-gray-800 hover:shadow-xl">
            <div class="flex items-center justify-center bg-gradient-to-br from-purple-100 to-pink-100 aspect-square dark:from-gray-700 dark:to-gray-600">
                <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="Wedding Post" class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
            </div>
            <div class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 bg-black/0 group-hover:bg-black/60 group-hover:opacity-100">
                <div class="text-center text-white">
                    <div class="flex items-center justify-center mb-2 space-x-6">
                        <div class="flex items-center">
                            <x-heroicon-o-heart class="w-6 h-6 mr-1" />
                            <span class="font-semibold">142</span>
                        </div>
                        <div class="flex items-center">
                            <x-heroicon-o-chat-bubble-oval-left class="w-6 h-6 mr-1" />
                            <span class="font-semibold">23</span>
                        </div>
                    </div>
                    <p class="text-sm font-medium">Pernikahan Adat Yang Memukau</p>
                </div>
            </div>
            {{-- Instagram post header --}}
            <div class="absolute flex items-center justify-between top-4 right-4 left-4">
                <div class="flex items-center">
                    <div class="p-0.5 w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full">
                        <div class="flex items-center justify-center w-full h-full bg-white rounded-full">
                            <span class="text-xs font-bold text-primary">3R</span>
                        </div>
                    </div>
                    <span class="px-2 py-1 ml-2 text-sm font-semibold text-white rounded-full bg-black/50">3rasa_wedding</span>
                </div>
                <x-heroicon-o-ellipsis-horizontal class="w-6 h-6 text-white" />
            </div>
        </div>

        {{-- Instagram Post 2 --}}
        <div data-aos="zoom-in-down" class="relative overflow-hidden transition-all duration-300 bg-white border-2 border-gray-200 shadow-lg rounded-2xl group dark:border-gray-700 dark:bg-gray-800 hover:shadow-xl">
            <div class="flex items-center justify-center bg-gradient-to-br from-orange-100 to-red-100 aspect-square dark:from-gray-700 dark:to-gray-600">
                <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Decoration Post" class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
            </div>
            <div class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 bg-black/0 group-hover:bg-black/60 group-hover:opacity-100">
                <div class="text-center text-white">
                    <div class="flex items-center justify-center mb-2 space-x-6">
                        <div class="flex items-center">
                            <x-heroicon-o-heart class="w-6 h-6 mr-1" />
                            <span class="font-semibold">89</span>
                        </div>
                        <div class="flex items-center">
                            <x-heroicon-o-chat-bubble-oval-left class="w-6 h-6 mr-1" />
                            <span class="font-semibold">15</span>
                        </div>
                    </div>
                    <p class="text-sm font-medium">Dekorasi Premium Eksklusif</p>
                </div>
            </div>
            <div class="absolute flex items-center justify-between top-4 right-4 left-4">
                <div class="flex items-center">
                    <div class="p-0.5 w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full">
                        <div class="flex items-center justify-center w-full h-full bg-white rounded-full">
                            <span class="text-xs font-bold text-primary">3R</span>
                        </div>
                    </div>
                    <span class="px-2 py-1 ml-2 text-sm font-semibold text-white rounded-full bg-black/50">3rasa_wedding</span>
                </div>
                <x-heroicon-o-ellipsis-horizontal class="w-6 h-6 text-white" />
            </div>
        </div>

        {{-- Instagram Post 3 --}}
        <div data-aos="zoom-in-up" class="relative overflow-hidden transition-all duration-300 bg-white border-2 border-gray-200 shadow-lg rounded-2xl group dark:border-gray-700 dark:bg-gray-800 hover:shadow-xl">
            <div class="flex items-center justify-center bg-gradient-to-br from-blue-100 to-indigo-100 aspect-square dark:from-gray-700 dark:to-gray-600">
                <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="Event Post" class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
            </div>
            <div class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 bg-black/0 group-hover:bg-black/60 group-hover:opacity-100">
                <div class="text-center text-white">
                    <div class="flex items-center justify-center mb-2 space-x-6">
                        <div class="flex items-center">
                            <x-heroicon-o-heart class="w-6 h-6 mr-1" />
                            <span class="font-semibold">203</span>
                        </div>
                        <div class="flex items-center">
                            <x-heroicon-o-chat-bubble-oval-left class="w-6 h-6 mr-1" />
                            <span class="font-semibold">31</span>
                        </div>
                    </div>
                    <p class="text-sm font-medium">Momen Bahagia Terpadu</p>
                </div>
            </div>
            <div class="absolute flex items-center justify-between top-4 right-4 left-4">
                <div class="flex items-center">
                    <div class="p-0.5 w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full">
                        <div class="flex items-center justify-center w-full h-full bg-white rounded-full">
                            <span class="text-xs font-bold text-primary">3R</span>
                        </div>
                    </div>
                    <span class="px-2 py-1 ml-2 text-sm font-semibold text-white rounded-full bg-black/50">3rasa_wedding</span>
                </div>
                <x-heroicon-o-ellipsis-horizontal class="w-6 h-6 text-white" />
            </div>
        </div>
    </div>
</div>




@push('styles')
<style>
    /* Hero Section Styles - Override untuk memastikan style terbaca */
    .containerHero {
        position: absolute !important;
        left: 50% !important;
        top: 50% !important;
        transform: translate(-50%, -50%) !important;
        width: 100% !important;
        height: 100vh !important;
        overflow: hidden !important;
    }

    #slide {
        /* width: max-content !important; */
        /* margin-top: 50px !important; */
    }

    .item {
        width: 150px !important;
        height: 300px !important;
        display: inline-block !important;
        transition: 0.5s !important;
        position: absolute !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        transform: translate(0, -50%) !important;
        /* border-radius: 5px !important; */
    }

    .item:nth-child(1),
    .item:nth-child(2) {
        left: 0 !important;
        top: 0 !important;
        transform: translate(0, 0) !important;
        border-radius: 0 !important;
        width: 100% !important;
        height: 100% !important;
        box-shadow: none !important;
    }

    /* Mobile First - Base styles (< 40rem) */
    .item:nth-child(3) {
        display: none !important;
        left: 9% !important;
        top: 88% !important;
        width: 38% !important;
        height: 110px !important;
    }

    .item:nth-child(4) {
        display: none !important;
        left: 53% !important;
        top: 88% !important;
        width: 38% !important;
        height: 110px !important;
    }

    .item:nth-child(n + 5) {
        left: calc(100% + 50px) !important;
        opacity: 0 !important;
    }

    .buttons {
        position: absolute !important;
        top: 80% !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        display: flex !important;
        gap: 1rem !important;
        justify-content: center !important;
        z-index: 30 !important;
    }

    .buttons button {
        width: 50px !important;
        height: 50px !important;
        transition: 0.5s !important;
    }

    /* Small devices (≥ 40rem / 640px) */
    @media (min-width: 40rem) {
        .item:nth-child(3) {
            display: block !important;
            left: 12% !important;
            top: 88% !important;
            width: 35% !important;
            height: 110px !important;
        }

        .item:nth-child(4) {
            display: block !important;
            left: calc(22% + 220px) !important;
            top: 88% !important;
            width: 35% !important;
            height: 110px !important;
        }

        .item:nth-child(n + 5) {
            left: calc(70% + 200px) !important;
            opacity: 0 !important;
        }

        .buttons {
            top: 70% !important;
            gap: 1rem !important;
        }

        .buttons button {
            width: 50px !important;
            height: 50px !important;
        }
    }

    /* Medium devices (≥ 48rem / 768px) */
    @media (min-width: 48rem) {
        .item:nth-child(3) {
            display: block !important;
            left: 18% !important;
            top: 88% !important;
            width: 30% !important;
            height: 110px !important;
        }

        .item:nth-child(4) {
            display: block !important;
            left: calc(35% + 170px) !important;
            top: 88% !important;
            width: 30% !important;
            height: 110px !important;
        }

        .item:nth-child(n + 5) {
            left: calc(70% + 200px) !important;
            opacity: 0 !important;
        }

        .buttons {
            top: 70% !important;
            gap: 1.5rem !important;
        }

        .buttons button {
            width: 50px !important;
            height: 50px !important;
        }
    }

    /* Large devices (≥ 64rem / 1024px) */
    @media (min-width: 64rem) {
        .item:nth-child(3) {
            display: block !important;
            left: 32% !important;
            top: 85% !important;
            width: 180px !important;
            height: 100px !important;
        }

        .item:nth-child(4) {
            display: block !important;
            left: calc(36% + 200px) !important;
            top: 85% !important;
            width: 180px !important;
            height: 100px !important;
        }

        .item:nth-child(n + 5) {
            left: calc(70% + 200px) !important;
            opacity: 0 !important;
        }

        .buttons {
            position: absolute !important;
            top: 80% !important;
            left: 0 !important;
            transform: translateX(0%) !important;
            display: flex !important;
            gap: 1rem !important;
            justify-content: space-around !important;
            z-index: 30 !important;
            width: 100% !important;
        }

        .buttons button {
            width: 50px !important;
            height: 50px !important;
            transition: 0.5s !important;
        }
    }

    /* Extra Large devices (≥ 80rem / 1280px) */
    @media (min-width: 80rem) {
        .item:nth-child(3) {
            display: block !important;
            left: 35% !important;
            top: 85% !important;
            width: 180px !important;
            height: 100px !important;
        }

        .item:nth-child(4) {
            display: block !important;
            left: calc(38% + 200px) !important;
            top: 85% !important;
            width: 180px !important;
            height: 100px !important;
        }

        .item:nth-child(n + 5) {
            left: calc(70% + 200px) !important;
            opacity: 0 !important;
        }

        .buttons {
            position: absolute !important;
            top: 80% !important;
            left: 0 !important;
            transform: translateX(0%) !important;
            display: flex !important;
            gap: 1rem !important;
            justify-content: space-around !important;
            z-index: 30 !important;
            padding-left: 10% !important;
            padding-right: 10% !important;
            width: 100% !important;
        }

        .buttons button {
            width: 50px !important;
            height: 50px !important;
            transition: 0.5s !important;
        }
    }

    .item .content {
        position: absolute !important;
        top: 50% !important;
        transform: translate(0, -50%) !important;
        display: none !important;
        font-family: system-ui !important;
    }

    .item .tambahan {
        display: none !important;
    }

    .item:nth-child(2) .tambahan {
        display: block !important;
    }

    .item:nth-child(2) .content {
        display: block !important;
        z-index: 2 !important;
    }

    @keyframes showcontent {
        from {
            opacity: 0;
            transform: translate(0, 50px);
            filter: blur(33px);
        }
        to {
            opacity: 1;
            transform: translate(0, 0);
            filter: blur(0);
        }
    }

    /* Marquee animations */
    @keyframes marquee-left {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    @keyframes marquee-right {
        0% { transform: translateX(-50%); }
        100% { transform: translateX(0); }
    }
    .marquee-left {
        animation: marquee-left 20s linear infinite;
    }
    .marquee-right {
        animation: marquee-right 20s linear infinite;
    }
    .marquee-container {
        overflow: hidden;
    }
</style>
@endpush

@push('scripts')

<!-- Typewriter Animation -->
<script>
    const words = ["Dari Rencana Hingga Realisasi, Kami Siap Membantu", "Dari Konsep hingga Kenangan Indah, Kami Ada untuk Anda"];
    let currentWord = 0;
    let currentChar = 0;
    const el = document.getElementById("typewriter");

    function type() {
        if (currentChar < words[currentWord].length) {
            el.innerHTML += words[currentWord].charAt(currentChar);
            currentChar++;
            setTimeout(type, 80);
        } else {
            setTimeout(erase, 1000);
        }
    }

    function erase() {
        if (currentChar > 0) {
            el.innerHTML = el.innerHTML.slice(0, -1);
            currentChar--;
            setTimeout(erase, 50);
        } else {
            currentWord = (currentWord + 1) % words.length;
            setTimeout(type, 100);
        }
    }

    document.addEventListener("DOMContentLoaded", type);
</script>

<script>
    document.getElementById('next').onclick = function(){
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').appendChild(lists[0]);
    }

    document.getElementById('prev').onclick = function(){
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').prepend(lists[lists.length - 1]);
    }
</script>
@endpush
@endsection
