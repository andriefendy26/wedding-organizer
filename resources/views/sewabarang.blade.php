@extends('Layout.app')

@section('title', 'Layanan Penyewaan')

@section('content')
<div class="min-h-screen ">
    <div class="px-10 pt-32 bg-white dark:bg-gray-800 md:px-16 lg:px-24 xl:px-32">
        
        {{-- Header Section --}}
        <h2 class="py-8 mx-8 text-2xl text-center text-black lg:text-3xl poppins-medium md:mx-20 lg:mx-40 dark:text-white">
            Sewa yang 
            <span class="pt-serif-regular-italic">Premium</span> 
            dengan Harga 
            <span class="pt-serif-regular-italic">Terjangkau</span>,
            Wujudkan
            <span class="pt-serif-regular-italic">Pernikahan Sempurna</span>
            Sesuai
            <span class="pt-serif-regular-italic">Impian Anda.</span>
        </h2>

        {{-- Category Selection --}}
        <div class="mt-12 mb-16" x-data="{ activeCategory: 'furniture' }">

            {{-- Featured Product Grid (similar to homepage cards) --}}
            <div class="grid grid-cols-1 gap-6 mb-16 md:grid-cols-2 lg:grid-cols-3">
                
                {{-- Card 1 - Featured Sofa Set --}}
                <div class="flex poppins-regular h-72 md:h-[400px] flex-col p-4 text-black dark:text-white border-2 border-gray-300 justify-between rounded-xl"
                style="background-image: url('{{ asset('storage/content/decoration04.jpg') }}'); background-size: cover; background-position: center;">
                    <h3 class="self-end w-auto px-3 py-1 text-xs border-2 rounded-full dark:border-white">Premium Collection</h3>
                    <div>
                        <h4 class="mb-2 text-xl tracking-widest edu-vic-wa-nt-hand-400">Sofa Premium Set</h4>
                        <p class="tracking-widest text-md xl:text-lg edu-vic-wa-nt-hand-400">Set sofa premium berbahan kulit sintetis berkualitas tinggi dengan rangka kayu solid.</p>
                        <div class="flex items-center justify-between mt-4">
                            <div class="text-2xl font-bold edu-vic-wa-nt-hand">Rp 350.000</div>
                            <button class="px-4 py-2 text-sm text-black transition-transform bg-white rounded-lg hover:scale-105">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Card 2 - Info Card --}}
                <div class="flex flex-col items-center justify-center gap-4 p-4 text-center border-2 border-gray-200 rounded-xl">
                    <h3 class="text-3xl text-black lg:text-4xl edu-vic-wa-nt-hand-500 dark:text-white">Kualitas Premium Terjamin</h3>
                    <p class="text-sm tracking-wider text-gray-600 pt-serif-regular lg:text-md dark:text-gray-400">Semua perlengkapan dalam kondisi prima dan selalu terawat. Kami pastikan kualitas terbaik untuk acara istimewa Anda.</p>
                    
                    <button class="flex items-center justify-center transition-all duration-300 bg-gray-300 rounded-full group hover:scale-105">
                        <p class="mx-3 my-2 ml-4 text-sm text-black pt-serif-regular lg:text-lg">
                            Konsultasi Gratis
                        </p>
                        <x-heroicon-o-arrow-small-up class="w-8 h-8 p-1 text-white transition-all duration-300 bg-black border-2 rounded-full lg:h-10 lg:w-10 group-hover:rotate-45" />
                    </button>
                </div>

                {{-- Card 3 - Service Features --}}
                <div class="h-40 lg:h-[400px] md:col-span-2 lg:col-span-1 flex relative overflow-hidden poppins-regular flex-col p-4 text-white border-2 border-gray-300 justify-between rounded-xl"
                style="background-image: url('{{ asset('storage/content/wedding04.jpg') }}'); background-size: cover; background-position: center;">
                    <div class="absolute inset-0 bg-black/60"></div>
                    <div class="relative z-10 flex gap-3 text-xs">
                        <span class="p-1 px-5 rounded-full backdrop-blur-sm bg-white/40">Gratis Antar</span>
                        <span class="p-1 px-5 rounded-full backdrop-blur-sm bg-white/40">Setup</span>
                        <span class="p-1 px-5 rounded-full backdrop-blur-sm bg-white/40">Maintenance</span>
                    </div>
                    <div class="relative z-10">
                        <h4 class="mb-2 text-lg edu-vic-wa-nt-hand-400">Layanan Lengkap</h4>
                        <p class="text-sm">Gratis antar-jemput, setup profesional, dan maintenance selama acara</p>
                    </div>
                </div>
            </div>

            {{-- Product Grid --}}
          
           <div x-show="activeCategory === 'furniture'" class="grid grid-cols-1 gap-6 mb-16 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($dataBarang as $barang)
                    <div class="relative overflow-hidden transition-all duration-500 border rounded-3xl group bg-white/70 dark:bg-gray-800/70 border-gray-200/50 dark:border-gray-700/50 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-2">
                        {{-- Image with modern overlay --}}
                        <div class="relative h-48 overflow-hidden">
                            @if($barang['foto'] && !empty($barang['foto']))
                                {{-- Show image if available --}}
                                <img src="{{ asset('storage/barang/' . $barang['foto']) }}" 
                                    alt="{{ $barang['nama'] }}" 
                                    class="absolute inset-0 object-cover w-full h-full transition-transform duration-700 scale-105 group-hover:scale-100" 
                                    >
                                
                                <div class="absolute inset-0 transition-all duration-500 bg-gradient-to-t to-transparent from-black/60 via-black/20 group-hover:from-black/40"></div>
                            @else
                                {{-- No image layer --}}
                                <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-gray-200 to-gray-300 dark:from-gray-600 dark:to-gray-700">
                                    <div class="text-center">
                                        <svg class="w-16 h-16 mx-auto mb-2 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tidak Ada Gambar</p>
                                    </div>
                                </div>
                            @endif
                            
                            {{-- Floating availability badge --}}
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1.5 text-xs font-medium tracking-wide text-white rounded-full bg-primary/90">
                                    TERSEDIA
                                </span>
                            </div>
                            
                            {{-- Furniture icon --}}
                            <div class="absolute bottom-4 left-4">
                                <div class="flex items-center justify-center w-12 h-12 transition-transform duration-300 rounded-2xl bg-white/90 dark:bg-gray-800/90 group-hover:scale-110">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Content --}}
                        <div class="p-6 space-y-4">
                            <div class="space-y-2">
                                <h4 class="text-xl font-bold text-gray-900 transition-colors duration-300 dark:text-white group-hover:text-primary edu-vic-wa-nt-hand">
                                    {{ $barang['nama'] }}
                                </h4>
                                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">
                                     {{ Str::limit($barang['deskripsi'], 100) }}
                                </p>
                            </div>
                            
                            {{-- Price section --}}
                            <div class="space-y-1">
                                <div class="text-2xl font-bold text-primary edu-vic-wa-nt-hand">
                                    Rp {{ number_format($barang['harga'], 0, ',', '.') }}
                                </div>
                                <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                    per item/hari
                                </span>
                            </div>
                            
                            {{-- CTA Button --}}
                            <button class="w-full px-4 py-3 text-sm font-medium transition-all duration-300 border-2 rounded-2xl border-primary text-primary dark:text-white dark:border-white hover:bg-primary hover:text-white dark:hover:bg-white dark:hover:text-gray-900 hover:shadow-lg hover:shadow-primary/25 hover:scale-105">
                                Pesan Sekarang
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Why Choose Us Section (sama seperti homepage) --}}
        <div class="grid grid-cols-1 gap-4 pb-16 mt-10 md:grid-cols-2">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3 p-6 bg-gray-200 rounded-2xl">
                    <h3 class="text-lg text-black poppins-regular">Keunggulan layanan penyewaan kami :</h3>
                    <p class="mt-2 text-sm text-gray-800 edu-vic-wa-nt-hand-500">"Kualitas premium, harga terjangkau, dan layanan antar-jemput gratis area Tarakan!"
                        <span class="font-semibold text-primary">- Tim 3Rasa</span>
                    </p>
                </div>

                <div class="h-52 xl:h-full bg-[url({{ asset('storage/content/prop/kursi.jpg') }})] rounded-xl xl:col-span-1 col-span-3 bg-cover bg-center"
                style="background: url({{ asset('storage/content/degoration13.jpg') }}); background-size: cover; background-position: center;"
                ></div>
                
                <div class="flex flex-col items-center justify-center col-span-2 gap-4 p-4 text-sm text-center border-2 border-gray-200 rounded-2xl xl:col-span-1">
                    <p class="tracking-wider text-center text-gray-600 pt-serif-regular dark:text-gray-400">Semua perlengkapan dalam kondisi prima dan selalu terawat untuk acara istimewa Anda.</p>
                    
                    <button class="flex items-center justify-center transition-all duration-300 bg-gray-300 rounded-full group hover:scale-105">
                        <p class="mx-3 my-2 ml-4 text-black pt-serif-regular">
                            Konsultasi
                        </p>
                        <x-heroicon-o-arrow-small-up class="w-8 h-8 p-1 text-white transition-all duration-300 bg-black border-2 rounded-full group-hover:rotate-45" />
                    </button>
                </div>

                <div class="flex flex-col items-center justify-center gap-4 p-4 text-sm text-center bg-gray-200 border-2 border-gray-200 rounded-2xl">
                    <p class="text-3xl tracking-wider text-center text-gray-600 pt-serif-regular xl:text-5xl dark:text-gray-400">500 +</p>
                    <p class="tracking-wider text-center text-gray-600 pt-serif-regular dark:text-gray-400">Item tersedia</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 gap-5 pt-serif-regular">
                <div class="p-6 bg-gray-200 rounded-2xl">
                    <h3 class="text-black text-md">Layanan penyewaan lengkap dengan kualitas premium dan harga terjangkau. Kami menyediakan berbagai perlengkapan pernikahan mulai dari furniture, dekorasi, hingga peralatan pendukung lainnya.</h3>
                </div>
                <div class="px-6 py-4 bg-gray-200 rounded-2xl">
                    <p class="text-black">01. <span>Gratis antar-jemput area Tarakan</span></p>
                </div>
                <div class="px-6 py-4 bg-gray-200 rounded-2xl">
                    <p class="text-black">02. <span>Setup dan maintenance profesional</span></p>
                </div>
                <div class="px-6 py-4 bg-gray-200 rounded-2xl">
                    <p class="text-black">03. <span>Garansi kualitas premium</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .edu-vic-wa-nt-hand {
        font-family: 'Edu VIC WA NT Beginner', cursive;
    }
    
    .edu-vic-wa-nt-hand-500 {
        font-family: 'Edu VIC WA NT Beginner', cursive;
        font-weight: 500;
    }
    
    .edu-vic-wa-nt-hand-400 {
        font-family: 'Edu VIC WA NT Beginner', cursive;
        font-weight: 400;
    }
    
    .pt-serif-regular {
        font-family: 'PT Serif', serif;
    }
    
    .pt-serif-regular-italic {
        font-family: 'PT Serif', serif;
        font-style: italic;
    }
    
    .poppins-regular {
        font-family: 'Poppins', sans-serif;
    }
    
    .poppins-medium {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
    }

    .containerHero {
        width: 100%;
        height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .containerHero #slide {
        width: max-content;
        margin-top: 50px;
    }

    .containerHero .item {
        width: 100vw;
        height: 80vh;
        position: relative;
        background-size: cover;
        background-position: center;
    }

    .containerHero .item .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 1200px;
        text-align: center;
    }
</style>
@endpush

@push('scripts')
<script>
    // Add any additional JavaScript here if needed
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Wedding Rental Page Loaded');
    });
</script>
@endpush
@endsection