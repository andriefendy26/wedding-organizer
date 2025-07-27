@extends('Layout.app')

@section('title', 'Home')

@section('content')
<div class="width-full h-screen relative"
    x-data="{}"
    >
    <div class="containerHero">
        <div id="slide">
                              
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
            <button id="prev" class="left-0 border-2 backdrop-blur rounded-full p-3"><x-heroicon-o-arrow-long-left /></i></button>
            <button id="next" class="right-0 border-2 backdrop-blur rounded-full p-3"><x-heroicon-o-arrow-long-right /></i></button>
        </div>
    </div>
</div>

<div class="bg-white dark:bg-gray-800  px-30">

    <h2 class="text-black text-center py-8 text-3xl poppins-medium mx-40 dark:text-white">Hadirkan yang 
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

    <div class="grid grid-cols-3 h-[500px] gap-6 ">
    
        {{-- card 1 --}}
        <div class="flex poppins-regular flex-col p-4 text-white border-2 border-gray-300 justify-between rounded-xl bg-[url({{ asset('storage/content/wedding03.jpg') }})] bg-no-repeat bg-center bg-cover">
            <h3 class="w-auto self-end border-2 border-white px-3 py-1 rounded-full text-xs">hari yang perlu diingat</h3>
            <p class="edu-vic-wa-nt-hand-400 tracking-widest">Dari sentuhan adat hingga kemegahan perayaan, biarkan kami merencanakan pernikahan impian Anda dengan keindahan tradisi yang otentik.</p>
        </div>
    
        {{-- card 2 --}}
        <div class="flex flex-col border-2 rounded-xl border-gray-200 p-4 gap-4 items-center justify-center text-center">
            <h3 class="text-4xl edu-vic-wa-nt-hand-500 text-black dark:text-white">Dibuat dengan banyak cinta</h3>
            <p class="pt-serif-regular text-md tracking-wider dark:text-gray-400 text-gray-600">Perjalanan pernikahan Anda adalah kisah yang indah, dan kami hadir untuk menuliskannya. Dibuat dengan banyak cinta dan dedikasi, kami pastikan setiap momen pernikahan adat Anda memancarkan kehangatan dan kemegahan</p>
            
            <button class="flex group hover:scale-105 transition-all duration-300 bg-gray-300 rounded-full jusitify-center items-center">
                <p class="my-2 mx-3 ml-4 pt-serif-regular text-black">
                    Hubungi Kami
                </p>
                <x-heroicon-o-arrow-small-up  class="h-10 w-10 border-2 bg-black text-white rounded-full p-1  group-hover:rotate-45 duration-300 transition-all" />
            </button>
        </div>
    
        {{-- card 3 --}}
        <div class="flex relative overflow-hidden poppins-regular flex-col p-4 text-white border-2 border-gray-300 justify-between rounded-xl bg-[url({{ asset('storage/content/wedding04.jpg') }})] bg-no-repeat bg-center bg-cover">
            <div class="absolute inset-0 bg-black/60 mask-l-from-100% mask-r-to-90%"></div>
            <div class="relative z-10 flex gap-3 text-xs">
                <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">Elegan</span>
                <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">Unik</span>
                <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">2025</span>
            </div>
            <div class="relative z-10 flex gap-3 text-xs">
                <span class="rounded-full p-5 backdrop-blur-sm bg-white/40"><x-bi-instagram class="w-4 h-4" /></span>
                <span class="rounded-full p-5 backdrop-blur-sm bg-white/40"><x-bi-telephone class="w-4 h-4"/></span>
                <span class="rounded-full p-5 backdrop-blur-sm bg-white/40"><x-bi-tiktok class="w-4 h-4" /></span>
            </div>
        </div>
        
    </div>

    <div class="grid grid-cols-2 mt-8 gap-4">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-3 bg-gray-200 rounded-2xl p-6">
                <h3 class="text-black text-lg poppins-regular">Apa yang pasangan kami katakan :</h3>
                <p class="mt-2 edu-vic-wa-nt-hand-500 text-gray-800 text-sm">"Pelayanan sangat ramah dan profesional. Dekorasi pernikahan kami benar-benar indah dan sesuai impian! "
                    <span class=" font-semibold text-[--color-primary]">- Rina & Andi</spam>
                </p>
            </div>

            <img src="{{ asset("storage/content/wedding05.jpeg") }}" class="rounded-xl w-52 h-52" alt="Couple Tarakan">
            
            <div class="flex flex-col items-center justify-center text-center gap-4 border-2 rounded-2xl border-gray-200 p-4 text-sm">
                {{-- <h3 class="text-4xl edu-vic-wa-nt-hand-500 text-black dark:text-white">Dibuat dengan banyak cinta</h3> --}}
                <p class="pt-serif-regular  text-center tracking-wider dark:text-gray-400 text-gray-600">Perjalanan pernikahan Anda adalah kisah yang indah, dan kami hadir untuk menuliskannya.</p>
                
                <button class="flex group hover:scale-105 transition-all duration-300 bg-gray-300 rounded-full jusitify-center items-center">
                    <p class="my-2 mx-3 ml-4 pt-serif-regular text-black">
                        Hubungi Kami
                    </p>
                    <x-heroicon-o-arrow-small-up  class="h-8 w-8 border-2 bg-black text-white rounded-full p-1  group-hover:rotate-45 duration-300 transition-all" />
                </button>
            </div>

            <div class="flex bg-gray-200 flex-col items-center justify-center text-center gap-4 border-2 rounded-2xl border-gray-200 p-4 text-sm">
                {{-- <h3 class="text-4xl edu-vic-wa-nt-hand-500 text-black dark:text-white">Dibuat dengan banyak cinta</h3> --}}
                <p class="pt-serif-regular text-5xl  text-center tracking-wider dark:text-gray-400 text-gray-600">100 +</p>
                <p class="pt-serif-regular  text-center tracking-wider dark:text-gray-400 text-gray-600 mt-10">Pasangan yang puas</p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 gap-5 pt-serif-regular">
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

    <div class="mt-12">
        <div class="relative edu-vic-wa-nt-hand-500 text-black dark:text-white">
            <div class="text-xl absolute top-[20%] left-[33%]">Rancang Ruang Impian Anda</div>
            <h2 class="tracking-[50px] text-[200px] ">  
                Dekorasi
            </h2>
        </div>
        
        <div class="grid grid-cols-2 gap-20">
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
                <img class="absolute top-[-150px]" src="{{ asset('storage/content/decoration04.png') }}" alt="Decoration Tarakan">
            </div>
        </div>
    
        <div class="grid grid-cols-3 mt-30 gap-10">
            <div class="grid grid-cols-3 col-span-2 bg-gray-200 rounded-lg p-4 gap-6">
                <div class="relative">
                    <img class="absolute -top-16 w-80" src="{{ asset('storage/content/decoration05.png') }}" alt="decoration tarakan">
                </div>
                {{-- <div></div> --}}
                <div class=" text-center col-span-2">
                    <h3 class="text-3xl pt-serif-regular">Dapatkan diskon hingga 30%</h3>
                    <div class="text-start mt-2 text-md text-gray-700">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius sequi, dolorum animi hic recusandae labore quia blanditiis nam laudantium ab soluta optio esse? Odit voluptatum vel dolores, illum placeat quod.
                    </div>
                    
                </div>
            </div>
            <div class="bg-[url('{{ asset('storage/content/decoration.jpg') }}')] bg-no-repeat bg-cover bg-center rounded-xl"></div>
        </div>
    </div>
    
    <div class="mt-10">
        {{-- header --}}
        <div class="poppins-regular">
            <h2 class="text-gray-600 dark:text-gray-400 edu-vic-wa-nt-hand-500 tracking-widest text-xl">Testimoni Pelanggan <span>----></span></h2>
            <p class="text-black dark:text-white text-5xl w-1/2 mt-2">MENDENGARKAN DARI PELANGGAN KAMI YANG SENANG</p>
        </div>

        {{-- Marquee testimoni --}}

        <div class="marquee-container mt-10">
            {{-- Blur masking kiri-kanan --}}
            <div class="pointer-events-none absolute left-0 top-0 h-full w-24 z-10">
                <div class="h-full w-full bg-gradient-to-r from-white/80 via-white/0 to-transparent backdrop-blur-sm"></div>
            </div>
            <div class="pointer-events-none absolute right-0 top-0 h-full w-24 z-10">
                <div class="h-full w-full bg-gradient-to-l from-white/80 via-white/0 to-transparent backdrop-blur-sm"></div>
            </div>
            {{-- marquee ke kiri --}}
            <div class="marquee-left flex space-x-6 mb-8 whitespace-nowrap">
                @foreach($topTestimonials as $testimonial)
                    <div class="bg-white border-2 border-gray-300 rounded-xl shadow-lg p-6 max-w-80 flex-shrink-0">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center bg-black">
                                <span class="text-white font-bold text-lg">JD</span>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">John Doe</h3>
                                <p class="text-gray-500 text-sm">yap</p>
                            </div>
                        </div>
                        <p class="text-gray-700 whitespace-normal">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, recusandae!</p>
                    </div>
                @endforeach
                @foreach($topTestimonials as $testimonial)
                    <div class="bg-white border-2 border-gray-300 rounded-xl shadow-lg p-6 max-w-80 flex-shrink-0">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center bg-black">
                                <span class="text-white font-bold text-lg">JD</span>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">John Doe</h3>
                                <p class="text-gray-500 text-sm">yap</p>
                            </div>
                        </div>
                        <p class="text-gray-700 whitespace-normal">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, recusandae!</p>
                    </div>
                @endforeach
            </div>
            {{-- marquee ke kanan --}}
            <div class="marquee-right flex space-x-6 whitespace-nowrap">
                @foreach($topTestimonials as $testimonial)
                    <div class="bg-white border-2 border-gray-300 rounded-xl shadow-lg p-6 max-w-80 flex-shrink-0">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center bg-black">
                                <span class="text-white font-bold text-lg">JD</span>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">John Doe</h3>
                                <p class="text-gray-500 text-sm">yap</p>
                            </div>
                        </div>
                        <p class="text-gray-700 whitespace-normal">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, recusandae!</p>
                    </div>
                @endforeach
                @foreach($topTestimonials as $testimonial)
                    <div class="bg-white border-2 border-gray-300 rounded-xl shadow-lg p-6 max-w-80 flex-shrink-0">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center bg-black">
                                <span class="text-white font-bold text-lg">JD</span>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">John Doe</h3>
                                <p class="text-gray-500 text-sm">yap</p>
                            </div>
                        </div>
                        <p class="text-gray-700 whitespace-normal">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, recusandae!</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

<div class="px-30 mt-20">
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
        document.getElementById('slide').appendChild(lists[0]);
    }

    document.getElementById('prev').onclick = function(){
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').prepend(lists[lists.length - 1]);
    }
</script>
@endpush
@endsection
