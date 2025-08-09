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
    <link rel="icon" type="image/png" href="/Logo.png" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/" />
    <meta property="og:title" content="3Rasa Event Organizer | Tarakan" />
    <meta property="og:description" content="Layanan event organizer profesional di Tarakan. Kami membantu merencanakan dan menyelenggarakan acara impian Anda dengan konsep unik dan berkesan." />
    <meta property="og:image" content="https://www.3rasaeventorganizer.com/Logo.png" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="3Rasa Event Organizer | Tarakan" />
    <meta name="twitter:description" content="Event organizer terpercaya di Tarakan. Layanan profesional untuk pernikahan, ulang tahun, dan event perusahaan." />
    <meta name="twitter:image" content="https://www.3rasaeventorganizer.com/Logo.png" />
@endsection


@section('content')
<div class="width-full h-screen relative"
    x-data="{}"
    >
    <div class="containerHero">
        <div id="slide">
                            
                        
            <div x-data="{kursiIsOpen : true}" class="item sm bg-white  dark:bg-gray-800  bg-[url({{ asset('storage/content/gif04.gif') }})] " >
                <div class="absolute inset-0 bg-black/50 "></div>
                <div class="content relative w-full h-full pt-48 flex text-center justify-center items-center">
                    <div class="flex flex-col justify-center items-center">
                        <h1 class="lg:w-[30%] text-white text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                                Sewa Perlengkapan Lengkap di 3Rasa
                        </h1>
                        <p class="lg:w-[50%] my-6 text-gray-200 text-lg pt-serif-regular-italic">  Apapun konsepnya, kami hadirkan perlengkapan terbaik agar setiap momen Anda berjalan sempurna — dari dekorasi mewah hingga detail kecil yang memikat.</p>
                        <div class="flex justify-center items-start edu-vic-wa-nt-hand-500 font-semibold gap-3">
                            <a href="https://api.whatsapp.com/send/?phone={{ $phoneNumber }}&text={{ $encodedMessage }}&type=phone_number&app_absent=0" target="_blank">
                                <button class="tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 text-black bg-white rounded-xl px-5 p-2">
                                    Konsultasi Gratis
                            </a>
                            <a href="/portofolio">
                                </button>
                                <button class=" text-white bg-[--color-primary] rounded-xl tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 px-5 p-2 ">Lihat Portofolio</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div x-data="{kursiIsOpen : true}" class="item sm bg-white  dark:bg-gray-800  bg-[url({{ asset('storage/content/gif03.gif') }})] " >
                <div class="absolute inset-0 bg-black/50 "></div>
                <div class="content relative w-full h-full pt-48 flex text-center justify-center items-center">
                    <div class="flex flex-col justify-center items-center">
                        <h2 id="typewriter" class="lg:w-[30%] text-white text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                              
                        </h2>
                        <p class="lg:w-[50%] my-6 text-gray-200 text-lg pt-serif-regular-italic">Percayakan kebutuhan acara Anda pada tim profesional kami. Kami siap membantu mewujudkan momen istimewa dengan perlengkapan dan layanan yang prima.</p>
                        <div class="flex justify-center items-start edu-vic-wa-nt-hand-500 font-semibold gap-3">
                            <a href="https://api.whatsapp.com/send/?phone={{ $phoneNumber }}&text={{ $encodedMessage }}&type=phone_number&app_absent=0" target="_blank">
                                <button class="tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 text-black bg-white rounded-xl px-5 p-2">
                                    Konsultasi Gratis
                            </a>
                            <a href="/portofolio">
                                </button>
                                <button class=" text-white bg-[--color-primary] rounded-xl tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 px-5 p-2 ">Lihat Portofolio</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div x-data="{kursiIsOpen : true}" class="item sm bg-white  dark:bg-gray-800  bg-[url({{ asset('storage/content/gif04.gif') }})] " >
                <div class="absolute inset-0 bg-black/50 "></div>
                <div class="content relative w-full h-full pt-48 flex text-center justify-center items-center">
                    <div class="flex flex-col justify-center items-center">
                        <h2 class="lg:w-[30%] text-white text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                                Sewa Perlengkapan Lengkap di 3Rasa
                        </h2>
                        <p class="lg:w-[50%] my-6 text-gray-200 text-lg pt-serif-regular-italic">Dari pesta pernikahan yang elegan, event korporat profesional, hinggapenyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.</p>
                        <div class="flex justify-center items-start edu-vic-wa-nt-hand-500 font-semibold gap-3">
                            <a href="https://api.whatsapp.com/send/?phone={{ $phoneNumber }}&text={{ $encodedMessage }}&type=phone_number&app_absent=0" target="_blank">
                                <button class="tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 text-black bg-white rounded-xl px-5 p-2">
                                    Konsultasi Gratis
                            </a>
                            <a href="/portofolio">
                                </button>
                                <button class=" text-white bg-[--color-primary] rounded-xl tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 px-5 p-2 ">Lihat Portofolio</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div x-data="{kursiIsOpen : true}" class="item sm bg-white  dark:bg-gray-800  bg-[url({{ asset('storage/content/gif03.gif') }})] " >
                <div class="absolute inset-0 bg-black/50 "></div>
                <div class="content relative w-full h-full pt-48 flex text-center justify-center items-center">
                    <div class="flex flex-col justify-center items-center">
                       <h2 id="typewriter" class="lg:w-[30%] text-white text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                              
                        </h2>
                        <p class="lg:w-[50%] my-6 text-gray-200 text-lg pt-serif-regular-italic">Dari pesta pernikahan yang elegan, event korporat profesional, hinggapenyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.</p>
                        <div class="flex justify-center items-start edu-vic-wa-nt-hand-500 font-semibold gap-3">
                            <a href="https://api.whatsapp.com/send/?phone={{ $phoneNumber }}&text={{ $encodedMessage }}&type=phone_number&app_absent=0" target="_blank">
                                <button class="tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 text-black bg-white rounded-xl px-5 p-2">
                                    Konsultasi Gratis
                            </a>
                            <a href="/portofolio">
                                </button>
                                <button class=" text-white bg-[--color-primary] rounded-xl tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 px-5 p-2 ">Lihat Portofolio</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="buttons">
            <button id="prev" class="left-0 border-2 backdrop-blur bg-white/40 rounded-full p-3"><x-heroicon-o-arrow-long-left /></i></button>
            <button id="next" class="right-0 border-2 backdrop-blur bg-white/40 rounded-full p-3"><x-heroicon-o-arrow-long-right /></i></button>
        </div>
    </div>
</div>



<div class="bg-white dark:bg-gray-800 px-10 md:px-16 lg:px-24 xl:px-32">
            {{-- Services Section --}}
    <div class="pt-20 pb-10 bg-white dark:bg-gray-800">

        {{-- Header Instagram --}}
            <div class="text-center mb-12">
                <div data-aos="zoom-in-down" class="relative edu-vic-wa-nt-hand-500 text-black dark:text-white">
                    <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">Apa Yang Kami Tawarkan</div>
                    <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                        LAYANAN
                    </h2>
                </div>
                <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
                    <h3 class=" text-xl md:text-2xl lg:text-4xl poppins-medium text-black dark:text-white mb-4">Layanan Terlengkap Untuk Acara Impian Anda</h3>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-2xl mx-auto">
                        Dari perencanaan hingga eksekusi, kami menyediakan layanan komprehensif untuk mewujudkan pernikahan dan acara istimewa Anda
                    </p>
                </div>
            </div>

        {{-- Services Grid--}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Service 1: Wedding Organizer --}}
                <div data-aos="fade-up" class="group relative bg-white/70 dark:bg-gray-800/70  rounded-3xl overflow-hidden border border-gray-200/50 dark:border-gray-700/50 hover:border-[--color-primary]/30 transition-all duration-500 hover:shadow-xl hover:shadow-[--color-primary]/10 hover:-translate-y-2">
                    {{-- Image with modern overlay --}}
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-[url({{ asset('storage/content/wedding11.jpg') }})] bg-cover bg-center scale-105 group-hover:scale-100 transition-transform duration-700"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent group-hover:from-black/40 transition-all duration-500"></div>
                        
                        {{-- Floating badge --}}
                        <div class="absolute top-4 right-4">
                            <span class="bg-[--color-primary]/90  text-white px-3 py-1.5 rounded-full text-xs font-medium tracking-wide">
                                POPULER
                            </span>
                        </div>
                        
                        {{-- Service icon --}}
                        <div class="absolute bottom-4 left-4">
                            <div class="w-12 h-12 bg-white/90 dark:bg-gray-800/90  rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <x-heroicon-o-heart class="w-6 h-6 text-[--color-primary]" />
                            </div>
                        </div>
                    </div>
                    
                    {{-- Content --}}
                    <div class="p-6 space-y-4">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-[--color-primary] transition-colors duration-300">
                                Wedding Organizer
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                                Perencana pernikahan lengkap dari konsep hingga eksekusi yang tak terlupakan.
                            </p>
                        </div>
                        
                        {{-- Features with modern pills --}}
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Konsultasi
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Koordinasi
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Pengawasan
                            </span>
                        </div>
                        
                        {{-- CTA Button --}}
                        <a href="/layananwedding" class="block">
                            <button class="w-full border-2 border-[--color-primary] text-[--color-primary] dark:text-white dark:border-white rounded-2xl py-3 px-4 font-medium text-sm hover:bg-[--color-primary] hover:text-white dark:hover:bg-white dark:hover:text-gray-900 transition-all duration-300 hover:shadow-lg hover:shadow-[--color-primary]/25">
                                Pelajari Selengkapnya
                            </button>
                        </a>
                    </div>
                </div>

                {{-- Service 2: Event --}}
                <div data-aos="fade-down"  class="group relative bg-white/70 dark:bg-gray-800/70  rounded-3xl overflow-hidden border border-gray-200/50 dark:border-gray-700/50 hover:border-[--color-primary]/30 transition-all duration-500 hover:shadow-xl hover:shadow-[--color-primary]/10 hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-[url({{ asset('storage/content/event01.png') }})] bg-cover bg-center scale-105 group-hover:scale-100 transition-transform duration-700"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent group-hover:from-black/40 transition-all duration-500"></div>
                        
                        <div class="absolute bottom-4 left-4">
                            <div class="w-12 h-12 bg-white/90 dark:bg-gray-800/90  rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <x-heroicon-o-sparkles class="w-6 h-6 text-[--color-primary]" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-[--color-primary] transition-colors duration-300">
                                Event Organizer
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                                Layanan perencanaan acara yang profesional dan terorganisir.
                            </p>
                        </div>
                        
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Perencanaan Acara
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Dekorasi
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Koordinasi Tim
                            </span>
                        </div>
                        <a href="/layanandekorasi" class="block">
                            <button class="w-full border-2 border-[--color-primary] text-[--color-primary] dark:text-white dark:border-white rounded-2xl py-3 px-4 font-medium text-sm hover:bg-[--color-primary] hover:text-white dark:hover:bg-white dark:hover:text-gray-900 transition-all duration-300 hover:shadow-lg hover:shadow-[--color-primary]/25">
                                Pelajari Selengkapnya
                            </button>
                        </a>
                    </div>
                </div>

                {{-- Service 3: Sewa Perlengkapan --}}
                <div data-aos="fade-left" class="group relative bg-white/70 dark:bg-gray-800/70  rounded-3xl overflow-hidden border border-gray-200/50 dark:border-gray-700/50 hover:border-[--color-primary]/30 transition-all duration-500 hover:shadow-xl hover:shadow-[--color-primary]/10 hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-[url({{ asset('storage/content/decoration01.jpeg') }})] bg-cover bg-center scale-105 group-hover:scale-100 transition-transform duration-700"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent group-hover:from-black/40 transition-all duration-500"></div>
                        
                        <div class="absolute bottom-4 left-4">
                            <div class="w-12 h-12 bg-white/90 dark:bg-gray-800/90 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <x-heroicon-o-cube class="w-6 h-6 text-[--color-primary]" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-[--color-primary] transition-colors duration-300">
                                Sewa Perlengkapan
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                                Penyewaan berbagai perlengkapan acara berkualitas tinggi.
                            </p>
                        </div>
                        
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Furniture
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Sound System
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Tenda
                            </span>
                        </div>
                        
                        <a href="/layanansewa" class="block">
                            <button class="w-full border-2 border-[--color-primary] text-[--color-primary] dark:text-white dark:border-white rounded-2xl py-3 px-4 font-medium text-sm hover:bg-[--color-primary] hover:text-white dark:hover:bg-white dark:hover:text-gray-900 transition-all duration-300 hover:shadow-lg hover:shadow-[--color-primary]/25">
                                Pelajari Selengkapnya
                            </button>
                        </a>
                    </div>
                </div>
            </div>
    </div>

    <h2 data-aos="fade-right" class="text-black text-center py-8 text-2xl lg:text-3xl poppins-medium mx-8 md:mx-20 lg:mx-40 dark:text-white">Hadirkan yang 
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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-6 ">
        {{-- card 1 --}}
        <div data-aos="fade-left" class="flex poppins-regular h-72 md:h-[500px] flex-col p-4 text-white border-2 border-gray-300 justify-between rounded-xl bg-[url({{ asset('storage/content/wedding03.jpg') }})] bg-no-repeat bg-center bg-cover">
            <h3 class="w-auto self-end border-2 border-white px-3 py-1 rounded-full text-xs">hari yang perlu diingat</h3>
            <p class="text-md xl:text-lg edu-vic-wa-nt-hand-400 tracking-widest">Dari sentuhan adat hingga kemegahan perayaan, biarkan kami merencanakan pernikahan impian Anda dengan keindahan tradisi yang otentik.</p>
        </div>
    
        {{-- card 2 --}}
        <div data-aos="fade-up" class="flex flex-col border-2 rounded-xl border-gray-200 p-4 gap-4 items-center justify-center text-center">
            <h3 class="text-3xl lg:text-4xl edu-vic-wa-nt-hand-500 text-black dark:text-white">Dibuat dengan banyak cinta</h3>
            <p class="pt-serif-regular text-sm lg:text-md tracking-wider dark:text-gray-400 text-gray-600">Perjalanan pernikahan Anda adalah kisah yang indah, dan kami hadir untuk menuliskannya. Dibuat dengan banyak cinta dan dedikasi, kami pastikan setiap momen pernikahan adat Anda memancarkan kehangatan dan kemegahan</p>
            

        </div>
    
        {{-- card 3 --}}
        <div data-aos="fade-down" class="h-40 lg:h-[500px] md:col-span-2 lg:col-span-1 flex relative overflow-hidden poppins-regular flex-col p-4 text-white border-2 border-gray-300 justify-between rounded-xl bg-[url({{ asset('storage/content/wedding04.jpg') }})] bg-no-repeat bg-center bg-cover">
            <div class="absolute inset-0 bg-black/60 mask-l-from-100% mask-r-to-90%"></div>
            <div class="relative z-10 flex gap-3 text-xs">
                <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">Elegan</span>
                <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">Unik</span>
                <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">2025</span>
            </div>
            <div class="relative z-10 flex gap-3 text-xs">
                <span class="rounded-full p-2 lg:p-5 backdrop-blur-sm bg-white/40"><x-bi-instagram class="w-4 h-4" /></span>
                <span class="rounded-full p-2 lg:p-5 backdrop-blur-sm bg-white/40"><x-bi-telephone class="w-4 h-4"/></span>
                <span class="rounded-full p-2 lg:p-5 backdrop-blur-sm bg-white/40"><x-bi-tiktok class="w-4 h-4" /></span>
            </div>
        </div>
        
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 mt-4 gap-4">

        <div  class="grid grid-cols-3 gap-4">
            <div data-aos="zoom-in-down"  class="col-span-3 bg-gray-200 rounded-2xl p-6">
                <h3 class="text-black text-lg poppins-regular">Apa yang pasangan kami katakan :</h3>
                <p class="mt-2 edu-vic-wa-nt-hand-500 text-gray-800 text-sm">"Pelayanan sangat ramah dan profesional. Dekorasi pernikahan kami benar-benar indah dan sesuai impian! "
                    <span class=" font-semibold text-[--color-primary]">- Rina & Andi</spam>
                </p>
            </div>

            <div data-aos="zoom-in-down" class="h-52 xl:h-full bg-[url({{ asset("storage/content/wedding05.jpeg") }})] rounded-xl xl:col-span-1 col-span-3 bg-cover bg-center"></div>
            {{-- <img src="{{ asset("storage/content/wedding05.jpeg") }}" class="rounded-xl col-span-3 w-52 h-52" alt="Couple Tarakan"> --}}
            
            <div data-aos="zoom-in-up"  class="flex col-span-2 xl:col-span-1 flex-col items-center justify-center text-center gap-4 border-2 rounded-2xl border-gray-200 p-4 text-sm">
                {{-- <h3 class="text-4xl edu-vic-wa-nt-hand-500 text-black dark:text-white">Dibuat dengan banyak cinta</h3> --}}
                <p class="pt-serif-regular  text-center tracking-wider dark:text-gray-400 text-gray-600">Perjalanan pernikahan Anda adalah kisah yang indah, dan kami hadir untuk menuliskannya.</p>
   
            </div>

            <div data-aos="zoom-in-left"  class="flex bg-gray-200 flex-col items-center justify-center text-center gap-4 border-2 rounded-2xl border-gray-200 p-4 text-sm">
                {{-- <h3 class="text-4xl edu-vic-wa-nt-hand-500 text-black dark:text-white">Dibuat dengan banyak cinta</h3> --}}
                <p class="pt-serif-regular text-3xl xl:text-5xl  text-center tracking-wider dark:text-gray-400 text-gray-600">100 +</p>
                <p class="pt-serif-regular  text-center tracking-wider dark:text-gray-400 text-gray-600">Pasangan yang puas</p>
            </div>
        </div>
        
        <div data-aos="fade-left"  class="grid grid-cols-1 gap-5 pt-serif-regular">
            <div class="bg-gray-200 rounded-2xl p-6">
                <h3 class="text-md text-black"> Perencanaan menyeluruh yang dilakukan sejak awal untuk memastikan setiap detail acara pernikahan dapat terlaksana dengan baik sesuai impian Anda, mulai dari pemilihan konsep dan tema, pemetaan kebutuhan utama maupun tambahan, hingga penyusunan jadwal kerja yang matang.</h3>
            </div>
            <div class="bg-gray-200 rounded-2xl px-6 py-4">
                <p class="text-black">01. <span class="">Diskusi awal konsep acara</span> </h3>
            </div>
            <div class="bg-gray-200 rounded-2xl px-6 py-4">
                <p class="text-black">02. <span class=""> Pemetaan kebutuhan klien</span> </h3>
            </div>
            <div class="bg-gray-200 rounded-2xl px-6 py-4">
                <p class=" text-black">03. <span class=""> Penyusunan draft timeline</span>  </h3>
            </div>
        
        </div>
    </div>

    {{-- Decoration Section --}}
    {{-- <div class="mt-12">
        <div data-aos="zoom-in-down"  class="relative edu-vic-wa-nt-hand-500 text-black dark:text-white">
            <div class="text-xl lg:absolute lg:top-[20%] lg:left-[33%]">Rancang Ruang Impian Anda</div>
            <h2 class="lg:tracking-[30px] xl:tracking-[50px] text-[70px] md:text-[100px] lg:text-[180px] xl:text-[200px]">  
                Dekorasi
            </h2>
        </div>
        
        <div data-aos="fade-up" class="grid grid-cols-1 lg:grid-cols-2 gap-20">
            <div>
                <p class="text-gray-700 dark:text-gray-300">
                    Dekorasi pernikahan adat Anda, dirancang dengan 'banyak cinta' dan perhatian pada setiap detail. Kami menciptakan latar belakang yang memukau, memadukan keindahan tradisi dengan sentuhan personal Anda, menjadikan perayaan Anda benar-benar istimewa dan tak terlupakan.</p>
                <button class="flex mt-10 group hover:scale-105 transition-all duration-300 bg-gray-300 rounded-full jusitify-center items-center">
                    <p class="my-2 mx-3 ml-4 pt-serif-regular text-black">
                        Selengkapnya
                    </p>
                    <x-heroicon-o-arrow-small-up  class="h-10 w-10 border-2 bg-black text-white rounded-full p-1  group-hover:rotate-45 duration-300 transition-all" />
                </button>
            </div>
            <div class="relative">
                <img class="lg:absolute lg:top-[-120px]" src="{{ asset('storage/content/decoration04.png') }}" alt="Decoration Tarakan">
            </div>
        </div>
    </div> --}}

    {{-- Service Overview Section --}}
    <div class="py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl lg:text-5xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white">
                    Menciptakan Suasana yang 
                    <span class="pt-serif-regular-italic text-[--color-primary]">Memukau</span>
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-lg mb-6 pt-serif-regular leading-relaxed">
                    Setiap acara memiliki cerita uniknya sendiri. Kami hadir untuk menerjemahkan visi Anda menjadi realitas visual yang menawan melalui desain dekorasi yang thoughtful dan detail-oriented.
                </p>
                <p class="text-gray-600 dark:text-gray-300 text-lg mb-8 pt-serif-regular leading-relaxed">
                    Dari konsep awal hingga eksekusi final, tim kreatif kami berkomitmen menghadirkan dekorasi yang tidak hanya indah dipandang, tetapi juga mencerminkan kepribadian dan gaya Anda.
                </p>
                
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="text-center p-4 bg-gray-100 dark:bg-gray-700 rounded-2xl">
                        <h3 class="text-2xl font-bold text-[--color-primary] edu-vic-wa-nt-hand-500">500+</h3>
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Dekorasi Terealisasi</p>
                    </div>
                    <div class="text-center p-4 bg-gray-100 dark:bg-gray-700 rounded-2xl">
                        <h3 class="text-2xl font-bold text-[--color-primary] edu-vic-wa-nt-hand-500">5+</h3>
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Tahun Pengalaman</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="fade-left" class="relative">
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Dekorasi 1" class="rounded-2xl shadow-lg h-48 w-full object-cover">
                    <img src="{{ asset('storage/content/decoration11.jpg') }}" alt="Dekorasi 2" class="rounded-2xl shadow-lg h-32 w-full object-cover mt-16">
                    <img src="{{ asset('storage/content/decoration13.jpg') }}" alt="Dekorasi 3" class="rounded-2xl shadow-lg h-32 w-full object-cover ">
                    <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Dekorasi 4" class="rounded-2xl shadow-lg h-48 w-full object-cover">
                </div>
                
                {{-- Floating card --}}
                <div class="absolute -bottom-6 -left-6 bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-[--color-primary] rounded-full flex items-center justify-center">
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

    
    <div class="mt-10">
        <div  class="text-center mb-12">
            <div data-aos="zoom-in-down" class="relative edu-vic-wa-nt-hand-500 text-black dark:text-white">
                <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">Cerita Nyata, Momen Nyata</div>
                <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                    Testimoni
                </h2>
            </div>
            <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
                <h3 class=" text-xl md:text-2xl lg:text-4xl poppins-medium text-black dark:text-white mb-4">Suara dari Mereka yang Telah Percaya</h3>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-2xl mx-auto">
                    DENGARKAN PENGALAMAN DAN KESAN YANG MEREKA BAGIKAN UNTUK SETIAP MIMPI YANG TERWUJUD
                </p>
            </div>
        </div>
    

        {{-- Marquee testimoni --}}

        <div class="marquee-container mt-10 mask-x-from-90% mask-x-to-100%">
            {{-- Blur masking kiri-kanan --}}
            <div class="pointer-events-none absolute left-0 top-0 h-full w-24 z-10">
                <div class="h-full w-full bg-gradient-to-r from-white/80 via-white/0 to-transparent backdrop-blur-sm"></div>
            </div>
            <div class="pointer-events-none absolute right-0 top-0 h-full w-24 z-10">
                <div class="h-full w-full bg-gradient-to-l from-white/80 via-white/0 to-transparent backdrop-blur-sm"></div>
            </div>
            {{-- marquee ke kiri --}}
            <div class="marquee-left flex space-x-6 mb-8 whitespace-nowrap">
                @foreach($testimoni as $testimonial)
                    <div class="bg-white border-2 border-gray-300 rounded-xl shadow-lg p-6 max-w-80 flex-shrink-0">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center bg-black">
                                <span class="text-white font-bold text-lg">JD</span>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                                <p class="text-gray-500 text-sm">
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
                    <div class="bg-white border-2 border-gray-300 rounded-xl shadow-lg p-6 max-w-80 flex-shrink-0">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center bg-black">
                                <span class="text-white font-bold text-lg">JD</span>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                                <p class="text-gray-500 text-sm">
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
            <div class="marquee-right flex space-x-6 whitespace-nowrap">
                @foreach($testimoni as $testimonial)
                    <div class="bg-white border-2 border-gray-300 rounded-xl shadow-lg p-6 max-w-80 flex-shrink-0">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center bg-black">
                                <span class="text-white font-bold text-lg">JD</span>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                                <p class="text-gray-500 text-sm">
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
                    <div class="bg-white border-2 border-gray-300 rounded-xl shadow-lg p-6 max-w-80 flex-shrink-0">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center bg-black">
                                <span class="text-white font-bold text-lg">JD</span>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                                <p class="text-gray-500 text-sm">  <!-- Rating dalam bentuk ikon bintang -->
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
    <div class="pt-10  bg-white dark:bg-gray-800">
        {{-- Header Instagram --}}
        <div  class="text-center mb-12">
            <div data-aos="zoom-in-down" class="relative edu-vic-wa-nt-hand-500 text-black dark:text-white">
                <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">Ikuti Perjalanan Kami</div>
                <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                    INSTAGRAM
                </h2>
            </div>
            <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
                <h3 class=" text-xl md:text-2xl lg:text-4xl poppins-medium text-black dark:text-white mb-4">Inspirasi & Momen Terbaru</h3>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-2xl mx-auto">
                    Temukan inspirasi pernikahan terbaru, behind the scenes, dan momen bahagia dari klien kami di Instagram
                </p>
            </div>
        </div>
    
    
        {{-- Instagram Profile Card --}}
        <div data-aos="zoom-in-down" class="bg-gradient-to-br from-purple-500 via-[--color-primary] to-orange-400 p-1 rounded-2xl mb-8 max-w-md mx-auto">
            <div  class="bg-white dark:bg-gray-800 rounded-2xl p-6">
                <div  class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        
                        <div class="ml-4">
                            <h3 class="font-bold text-black dark:text-white text-lg">@3rasa_wedding</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Wedding Organizer Tarakan</p>
                        </div>
                    </div>
                    <button class="lg:flex hidden group hover:scale-105 transition-all duration-300 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full justify-center items-center px-4 py-2">
                        <x-bi-instagram class="w-5 h-5 text-black dark:text-white mr-2" />
                        <span class="text-black dark:text-white font-semibold">Follow</span>
                    </button>
                </div>
                
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div>
                        <p class="font-bold text-xl text-black dark:text-white">150</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Posts</p>
                    </div>
                    <div>
                        <p class="font-bold text-xl text-black dark:text-white">2.5K</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Followers</p>
                    </div>
                    <div>
                        <p class="font-bold text-xl text-black dark:text-white">1.2K</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Following</p>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- Instagram Feed Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            {{-- Instagram Post 1 --}}
            <div data-aos="zoom-in-up" class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="aspect-square bg-gradient-to-br from-purple-100 to-pink-100 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center">
                    <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="Wedding Post" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                    <div class="text-white text-center">
                        <div class="flex items-center justify-center space-x-6 mb-2">
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
                <div class="absolute top-4 left-4 right-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full p-0.5">
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                                <span class="text-xs font-bold text-[--color-primary]">3R</span>
                            </div>
                        </div>
                        <span class="ml-2 text-white font-semibold text-sm bg-black/50 px-2 py-1 rounded-full">3rasa_wedding</span>
                    </div>
                    <x-heroicon-o-ellipsis-horizontal class="w-6 h-6 text-white" />
                </div>
            </div>
    
            {{-- Instagram Post 2 --}}
            <div data-aos="zoom-in-down" class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="aspect-square bg-gradient-to-br from-orange-100 to-red-100 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center">
                    <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Decoration Post" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                    <div class="text-white text-center">
                        <div class="flex items-center justify-center space-x-6 mb-2">
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
                <div class="absolute top-4 left-4 right-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full p-0.5">
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                                <span class="text-xs font-bold text-[--color-primary]">3R</span>
                            </div>
                        </div>
                        <span class="ml-2 text-white font-semibold text-sm bg-black/50 px-2 py-1 rounded-full">3rasa_wedding</span>
                    </div>
                    <x-heroicon-o-ellipsis-horizontal class="w-6 h-6 text-white" />
                </div>
            </div>
    
            {{-- Instagram Post 3 --}}
            <div data-aos="zoom-in-up" class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="aspect-square bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center">
                    <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="Event Post" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                    <div class="text-white text-center">
                        <div class="flex items-center justify-center space-x-6 mb-2">
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
                <div class="absolute top-4 left-4 right-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full p-0.5">
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                                <span class="text-xs font-bold text-[--color-primary]">3R</span>
                            </div>
                        </div>
                        <span class="ml-2 text-white font-semibold text-sm bg-black/50 px-2 py-1 rounded-full">3rasa_wedding</span>
                    </div>
                    <x-heroicon-o-ellipsis-horizontal class="w-6 h-6 text-white" />
                </div>
            </div>
        </div>
    </div>

</div>




@push('styles')
<style>
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
