@extends('Layout.app')

@section('title', 'Home')

@section('content')
<div class="width-full h-screen relative"
    x-data="{}"
    >
    <div class="containerHero">
        <div id="slide">
                              
            {{-- <div x-data="{kursiIsOpen : true}" class="item sm bg-white  dark:bg-gray-800 bg-[url({{ asset('storage/content/decoration01.jpeg') }})] " > --}}
                {{-- <div class="absolute inset-0 bg-white dark:bg-gray-800 "></div> --}}
                {{-- <div class="content relative w-full h-full pt-48 flex text-center justify-center items-center">
                    <div class="flex flex-col justify-center items-center">
                        <h2 class="lg:w-[30%] dark:text-white text-black text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                                Sewa Perlengkapan Pernikahan & Acara Lengkap di 3Rasa
                        </h2>
                        <p class="lg:w-[50%] my-6 text-black dark:text-gray-200 text-lg pt-serif-regular-italic">Dari pesta pernikahan yang elegan, event korporat profesional, hinggapenyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.</p>
                    </div>
                </div> --}}
                {{-- titik titik --}}
                {{-- <div x-on:click="kursiIsOpen = ! kursiIsOpen" class="absolute z-[2] cursor-pointer top-[60%] left-[25%] w-4 h-4 rounded-full bg-white border-[3px]  border-gray-600 "></div> --}}
                {{-- Card kecil, letakkan di dalam salah satu .item --}}
                {{--                 
                <div x-show="kursiIsOpen" class="tambahan absolute bottom-44 left-24 z-20">
                    <div class="bg-white dark:bg-gray-800/80 rounded-xl shadow-lg p-4 flex items-center gap-4 min-w-[150px] max-w-[250px] border border-gray-200 dark:border-gray-700">
                        <img src="{{ asset('storage/content/prop/kursi.jpg') }}" alt="Logo" class="w-20 h-20 rounded-lg shadow">
                        <div>
                            <div class="font-bold text-[--color-primary] text-sm">Sofa</div>
                            <div class="text-xs text-gray-700 dark:text-gray-200">Sofa premium berbahan plastik tebal dengan rangka kokoh</div>
                        </div>
                    </div>
                </div> --}}
            {{-- </div> --}}
            
            <div x-data="{kursiIsOpen : true}" class="item sm bg-white  dark:bg-gray-800 bg-[url({{ asset('storage/content/decoration01.jpeg') }})] " >
                {{-- <div class="absolute inset-0 bg-white dark:bg-gray-800 "></div> --}}
                <div class="content relative w-full h-full pt-48 flex text-center justify-center items-center">
                    <div class="flex flex-col px-10 justify-center items-center">
                        <h2 class="lg:w-[30%] dark:text-white text-black text-3xl lg:text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                                Sewa Perlengkapan Pernikahan & Acara Lengkap di 3Rasa
                        </h2>
                        <p class="w-[70%] lg:w-[50%] my-3 lg:my-6 text-black dark:text-gray-200 text-md lg:text-lg pt-serif-regular-italic">Dari pesta pernikahan yang elegan, event korporat profesional, hinggapenyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.</p>
                    </div>
                </div>
               
            </div>
            
            <div x-data="{kursiIsOpen : true}" class="item sm bg-white  dark:bg-gray-800 bg-[url({{ asset('storage/content/gif03.gif') }})] " >
                {{-- <div class="absolute inset-0 bg-white dark:bg-gray-800 "></div> --}}
                <div class="content relative w-full h-full pt-48 flex text-center justify-center items-center">
                    <div class="flex flex-col justify-center items-center">
                        <h2 class="lg:w-[30%] text-white text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                                Wujudkan Momen Spesial Anda Bersama Kami!
                        </h2>
                        <p class="lg:w-[50%] my-6 text-gray-200 text-lg pt-serif-regular-italic">Dari pesta pernikahan yang elegan, event korporat profesional, hinggapenyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.</p>
                        <div class="flex justify-center items-start edu-vic-wa-nt-hand-500 font-semibold gap-3">
                            <button class="tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 text-black bg-white rounded-xl px-5 p-2">
                                Konsultasi Gratis
                            </button>
                            <button class=" text-white bg-[--color-primary] rounded-xl tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 border-2 px-5 p-2 ">Lihat Portofolio</button>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="item bg-white dark:bg-gray-800 bg-[url({{ asset('storage/content/wedding01.jpg') }})] " >
                {{-- <div class="absolute inset-0 bg-white dark:bg-gray-800 "></div> --}}
                <div class="content z-1 p-8 bg-white lg:dark:bg-gray-800 dark:bg-gray-800">
                    <div class="lg:grid grid-cols-1 my-32 lg:my-0 lg:grid-cols-2 lg:px-20">
                        {{-- <div class="absolute inset-0 bg-gray-800/50 lg:hidden"></div> --}}
                        <div class="flex flex-col justify-center items-start">
                            <h1 class="dark:text-white text-black text-2xl lg:text-4xl xl:text-5xl tracking-wide font-semibold edu-vic-wa-nt-hand">
                                  Wujudkan Momen Spesial Anda Bersama Kami!
                            </h1>
                            <p class="my-3 text-gray-600 dark:text-gray-200 text-lg pt-serif-regular-italic">Dari pesta pernikahan yang elegan, event korporat profesional, hinggapenyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.</p>
                            <div class="edu-vic-wa-nt-hand-500 font-semibold">
                                <button class="border-2 tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300  border-[--color-primary] text-[--color-primary] dark:text-black dark:bg-white dark:border-none rounded-xl px-5 p-2">
                                    Lihat Katalog Sewa 
                                </button>
                                <button class=" text-white bg-[--color-primary] rounded-xl tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 border-2 px-5 p-2 ">Hubungi Kami</button>
                            </div>
                        </div>

                        <div class="lg:flex justify-center items-center hidden">
                            <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="Wedding Organizer" class=" [mask-image:url({{  asset('storage/content/masking/mask1.png') }})] [mask-repeat:no-repeat] [mask-position:center] [mask-size:contain] rounded-lg shadow-lg">
                        </div>
                    </div>
                </div>
            </div>
            
            <div x-data="{kursiIsOpen : true}" class="item bg-white  dark:bg-gray-800 bg-[url({{ asset('storage/content/decoration01.jpeg') }})] " >
                {{-- <div class="absolute inset-0 bg-white dark:bg-gray-800 "></div> --}}
                <div class="content relative w-full h-full pt-48 flex text-center justify-center items-center">
                    <div class="flex flex-col justify-center items-center">
                        <h2 class="w-[30%] dark:text-white text-black text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                                Sewa Perlengkapan Pernikahan & Acara Lengkap di 3Rasa
                        </h2>
                        <p class="w-[50%] my-6 text-black dark:text-gray-200 text-lg pt-serif-regular-italic">Dari pesta pernikahan yang elegan, event korporat profesional, hinggapenyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.</p>
                    </div>

                    
                </div>
                {{-- titik titik --}}
                <div x-on:click="kursiIsOpen = ! kursiIsOpen" class="absolute z-[2] cursor-pointer top-[60%] left-[25%] w-4 h-4 rounded-full bg-white border-[3px]  border-gray-600 "></div>
                {{-- Card kecil, letakkan di dalam salah satu .item --}}
                
                <div x-show="kursiIsOpen" class="tambahan absolute bottom-44 left-24 z-20">
                    <div class="bg-white dark:bg-gray-800/80 rounded-xl shadow-lg p-4 flex items-center gap-4 min-w-[150px] max-w-[250px] border border-gray-200 dark:border-gray-700">
                        <img src="{{ asset('storage/content/prop/kursi.jpg') }}" alt="Logo" class="w-20 h-20 rounded-lg shadow">
                        <div>
                            <div class="font-bold text-[--color-primary] text-sm">Sofa</div>
                            <div class="text-xs text-gray-700 dark:text-gray-200">Sofa premium berbahan plastik tebal dengan rangka kokoh</div>
                        </div>
                    </div>
                </div>
                
            </div>

            
            <div class="item bg-white dark:bg-gray-800 bg-[url({{ asset('storage/content/wedding01.jpg') }})] " >
                {{-- <div class="absolute inset-0 bg-white dark:bg-gray-800 "></div> --}}
                <div class="content z-1 p-8 bg-white dark:bg-gray-800">
                    <div class="grid grid-cols-2 px-20">
                        <div class="flex flex-col justify-center items-start">
                            <h1 class="dark:text-white text-black text-6xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                                  
                                  Wujudkan Momen Spesial Anda Bersama Kami!
                            </h1>
                            <p class="my-6 text-gray-600 dark:text-gray-200 text-lg pt-serif-regular-italic">Dari pesta pernikahan yang elegan, event korporat profesional, hinggapenyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.</p>
                            <div class="edu-vic-wa-nt-hand-500 font-semibold">
                                <button class="border-2 tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300  border-[--color-primary] text-[--color-primary] dark:text-black dark:bg-white dark:border-none rounded-xl px-5 p-2">
                                    Lihat Katalog Sewa 
                                </button>
                                <button class=" text-white bg-[--color-primary] rounded-xl tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 border-2 px-5 p-2 ">Hubungi Kami</button>
                            </div>
                        </div>
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="Wedding Organizer" class=" [mask-image:url({{  asset('storage/content/masking/mask1.png') }})] [mask-repeat:no-repeat] [mask-position:center] [mask-size:contain] rounded-lg shadow-lg">
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
            
            <button class="flex group hover:scale-105 transition-all duration-300 bg-gray-300 rounded-full jusitify-center items-center">
                <p class="my-2 mx-3 ml-4 pt-serif-regular text-sm lg:text-lg text-black">
                    Hubungi Kami
                </p>
                <x-heroicon-o-arrow-small-up  class="w-8 h-8 lg:h-10 lg:w-10 border-2 bg-black text-white rounded-full p-1  group-hover:rotate-45 duration-300 transition-all" />
            </button>
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
                
                <button class="flex group hover:scale-105 transition-all duration-300 bg-gray-300 rounded-full jusitify-center items-center">
                    <p class="my-2 mx-3 ml-4 pt-serif-regular text-black">
                        Hubungi Kami
                    </p>
                    <x-heroicon-o-arrow-small-up  class="h-8 w-8 border-2 bg-black text-white rounded-full p-1  group-hover:rotate-45 duration-300 transition-all" />
                </button>
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
    <div class="mt-12">
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
    
        <div data-aos="zoom-in-down"  class="grid grid-cols-1 lg:grid-cols-3 mt-30 gap-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:col-span-2 bg-gray-200 rounded-lg p-4 gap-6">
                
                <div class="hidden lg:block relative mx-auto lg:mx-0">
                    <img class="lg:absolute lg:-top-16 h-40 md:h-56" src="{{ asset('storage/content/decoration05.png') }}" alt="decoration tarakan">
                </div>
                {{-- <div></div> --}}
                <div class=" text-center my-auto col-span-3 lg:col-span-2">
                    <h3 class="text-3xl pt-serif-regular">Dapatkan diskon hingga 30%</h3>
                    <div class="text-start mt-2 text-sm md:text-md text-gray-700">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius sequi, dolorum animi hic recusandae labore quia blanditiis nam laudantium ab soluta optio esse? Odit voluptatum vel dolores, illum placeat quod.
                    </div>
                </div>
            </div>

            <div class="h-52 lg:h-full bg-[url('{{ asset('storage/content/decoration.jpg') }}')] bg-no-repeat bg-cover bg-center rounded-xl"></div>
        </div>
    </div>
    
    <div class="mt-10">
        {{-- header --}}
        <div data-aos="fade-right" class="poppins-regular">
            <h2 class="text-gray-600 dark:text-gray-400 edu-vic-wa-nt-hand-500 tracking-widest text-xl">Testimoni Pelanggan <span>----></span></h2>
            <p class="text-black dark:text-white text-3xl lg:text-5xl lg:w-2/3 mt-2">MENDENGARKAN DARI PELANGGAN KAMI YANG SENANG</p>
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
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-20">
                {{-- Service 1: Wedding Organizer --}}
                <div data-aos="fade-up" class="group relative bg-white/70 dark:bg-gray-800/70  rounded-3xl overflow-hidden border border-gray-200/50 dark:border-gray-700/50 hover:border-[--color-primary]/30 transition-all duration-500 hover:shadow-xl hover:shadow-[--color-primary]/10 hover:-translate-y-2">
                    {{-- Image with modern overlay --}}
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-[url({{ asset('storage/content/wedding01.jpg') }})] bg-cover bg-center scale-105 group-hover:scale-100 transition-transform duration-700"></div>
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

                {{-- Service 2: Dekorasi --}}
                <div data-aos="fade-down"  class="group relative bg-white/70 dark:bg-gray-800/70  rounded-3xl overflow-hidden border border-gray-200/50 dark:border-gray-700/50 hover:border-[--color-primary]/30 transition-all duration-500 hover:shadow-xl hover:shadow-[--color-primary]/10 hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-[url({{ asset('storage/content/decoration01.jpeg') }})] bg-cover bg-center scale-105 group-hover:scale-100 transition-transform duration-700"></div>
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
                                Dekorasi Acara
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                                Desain dekorasi kreatif dan elegan sesuai tema dan budget Anda.
                            </p>
                        </div>
                        
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Konsep Tema
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Backdrop
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                Lighting
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
                        <div class="absolute inset-0 bg-[url({{ asset('storage/content/prop/kursi.jpg') }})] bg-cover bg-center scale-105 group-hover:scale-100 transition-transform duration-700"></div>
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

        {{-- Service Features Highlight --}}
        <div data-aos="fade-up" class="bg-gray-50 dark:bg-gray-900 rounded-3xl p-12 mb-16">
            <div class="text-center mb-10">
                <h3 class="text-3xl poppins-medium text-black dark:text-white mb-4">Mengapa Memilih Layanan Kami?</h3>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-2xl mx-auto">
                    Komitmen kami adalah memberikan pelayanan terbaik dengan standar kualitas tinggi
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Feature 1 --}}
                <div class="text-center group">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <x-heroicon-o-check-badge class="w-10 h-10 text-black dark:text-white " />
                    </div>
                    <h4 class="text-lg font-bold text-black dark:text-white mb-2 edu-vic-wa-nt-hand-500">Berpengalaman</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-sm pt-serif-regular">Lebih dari 5 tahun melayani pernikahan di Tarakan</p>
                </div>

                {{-- Feature 2 --}}
                <div class="text-center group">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <x-heroicon-o-users class="w-10 h-10 text-black dark:text-white" />
                    </div>
                    <h4 class="text-lg font-bold text-black dark:text-white mb-2 edu-vic-wa-nt-hand-500">Tim Profesional</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-sm pt-serif-regular">Tim ahli yang berpengalaman dan bersertifikat</p>
                </div>

                {{-- Feature 3 --}}
                <div class="text-center group">
                    <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <x-heroicon-o-clock class="w-10 h-10 text-black dark:text-white" />
                    </div>
                    <h4 class="text-lg font-bold text-black dark:text-white mb-2 edu-vic-wa-nt-hand-500">Tepat Waktu</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-sm pt-serif-regular">Komitmen menyelesaikan setiap project sesuai jadwal</p>
                </div>

                {{-- Feature 4 --}}
                <div class="text-center group">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <x-heroicon-o-heart class="w-10 h-10 text-black dark:text-white" />
                    </div>
                    <h4 class="text-lg font-bold text-black dark:text-white mb-2 edu-vic-wa-nt-hand-500">Pelayanan Prima</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-sm pt-serif-regular">Melayani dengan sepenuh hati hingga detail terkecil</p>
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
<script>
    document.getElementById('next').onclick = function(){
        let lists = document.querySelectorAll('.item');
        document                                                                                        .getElementById('slide').appendChild(lists[0]);
    }

    document.getElementById('prev').onclick = function(){
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').prepend(lists[lists.length - 1]);
    }
</script>
@endpush
@endsection
