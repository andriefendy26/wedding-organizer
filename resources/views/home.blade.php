@extends('Layout.app')

@section('title', 'Home')

@section('content')
<div class="width-full h-screen relative"
    x-data="{}"
    >
    <div class="containerHero">
        <div id="slide">
                      
    


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
                                <button class=" text-white bg-[--color-primary] rounded-xl tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 border-2 px-5 p-2">Hubungi Kami</button>
                            </div>
                        </div>
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="Wedding Organizer" class=" [mask-image:url({{  asset('storage/content/masking/mask1.png') }})] [mask-repeat:no-repeat] [mask-position:center] [mask-size:contain] rounded-lg shadow-lg">
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="item bg-white brightness-125 dark:bg-gray-800 bg-[url({{ asset('storage/content/decoration01.jpeg') }})] " >
                {{-- <div class="absolute inset-0 bg-white dark:bg-gray-800 "></div> --}}
                <div class="content relative w-full h-full pt-48 flex text-center justify-center items-center">
                    <div class="flex flex-col justify-center items-center">
                        <h2 class="w-[50%] dark:text-white text-black text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
                                Sewa Perlengkapan Pernikahan & Acara Lengkap di 3Rasa
                        </h2>
                        <p class="w-[50%] my-6 text-gray-200 dark:text-gray-200 text-lg pt-serif-regular-italic">Dari pesta pernikahan yang elegan, event korporat profesional, hinggapenyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.</p>
                    </div>

                    
                </div>
                {{-- titik titik --}}
                <div class="absolute z-[2] cursor-pointer top-[60%] left-[25%] w-4 h-4 rounded-full bg-white border-[3px]  border-gray-600 "></div>
                {{-- Card kecil, letakkan di dalam salah satu .item --}}
                
                <div class="tambahan absolute bottom-44 left-40 z-20">
                    <div class="bg-white/40 backdrop-blur-lg dark:bg-gray-800/80 rounded-xl shadow-lg p-4 flex items-center gap-4 min-w-[150px] max-w-[250px] border border-gray-200 dark:border-gray-700">
                        <img src="{{ asset('storage/content/LogoFont.png') }}" alt="Logo" class="w-10 h-10 rounded-lg shadow">
                        <div>
                            <div class="font-bold text-[--color-primary] text-sm">Promo Spesial!</div>
                            <div class="text-xs text-gray-700 dark:text-gray-200">Kursi premium berbahan plastik tebal dengan rangka kokoh</div>
                        </div>
                    </div>
                </div>
                
            </div>






            <div class="item" style="background-image: url('https://cdn.dribbble.com/userupload/39124469/file/original-3957ead0937d5c6b5d15166f0965b392.jpg?resize=1504x1130&vertical=center');">
                <div class="content relative z-10 text-white text-center p-8">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Wedding Organizer</h1>
                    <p class="text-lg">Kami siap membantu mewujudkan hari istimewa Anda.</p>
                </div>
            </div>
            <div class="item" style="background-image: url('https://cdn.dribbble.com/userupload/39124469/file/original-3957ead0937d5c6b5d15166f0965b392.jpg?resize=1504x1130&vertical=center');">
                <div class="content relative z-10 text-white text-center p-8">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Wedding Organizer</h1>
                    <p class="text-lg">Kami siap membantu mewujudkan hari istimewa Anda.</p>
                </div>
            </div>
        </div>
        <div class="buttons">
            <button id="prev" class="left-0 border-2 backdrop-blur rounded-full p-3"><x-heroicon-o-arrow-long-left /></i></button>
            <button id="next" class="right-0 border-2 backdrop-blur rounded-full p-3"><x-heroicon-o-arrow-long-right /></i></button>
        </div>
    </div>
</div>

<div>Halaman Bawah</div>


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
