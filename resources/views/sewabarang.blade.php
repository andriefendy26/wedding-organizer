@extends('Layout.app')

@section('title', 'Layanan Penyewaan')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen">
    <div class="bg-white dark:bg-gray-800 px-10 md:px-16 lg:px-24 xl:px-32 pt-32">
        
        {{-- Header Section --}}
        <h2 class="text-black text-center py-8 text-2xl lg:text-3xl poppins-medium mx-8 md:mx-20 lg:mx-40 dark:text-white">
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
                
                {{-- Card 1 - Featured Sofa Set --}}
                <div class="flex poppins-regular h-72 md:h-[400px] flex-col p-4 text-black dark:text-white border-2 border-gray-300 justify-between rounded-xl bg-[url({{ asset('storage/content/prop/decoration04.png') }})] bg-no-repeat bg-center bg-cover">
                    <h3 class="w-auto self-end border-2 dark:border-white px-3 py-1 rounded-full text-xs">Premium Collection</h3>
                    <div>
                        <h4 class="text-xl edu-vic-wa-nt-hand-400 tracking-widest mb-2">Sofa Premium Set</h4>
                        <p class="text-md xl:text-lg edu-vic-wa-nt-hand-400 tracking-widest">Set sofa premium berbahan kulit sintetis berkualitas tinggi dengan rangka kayu solid.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="text-2xl font-bold edu-vic-wa-nt-hand">Rp 350.000</div>
                            <button class="px-4 py-2 bg-white text-black rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Card 2 - Info Card --}}
                <div class="flex flex-col border-2 rounded-xl border-gray-200 p-4 gap-4 items-center justify-center text-center">
                    <h3 class="text-3xl lg:text-4xl edu-vic-wa-nt-hand-500 text-black dark:text-white">Kualitas Premium Terjamin</h3>
                    <p class="pt-serif-regular text-sm lg:text-md tracking-wider dark:text-gray-400 text-gray-600">Semua perlengkapan dalam kondisi prima dan selalu terawat. Kami pastikan kualitas terbaik untuk acara istimewa Anda.</p>
                    
                    <button class="flex group hover:scale-105 transition-all duration-300 bg-gray-300 rounded-full justify-center items-center">
                        <p class="my-2 mx-3 ml-4 pt-serif-regular text-sm lg:text-lg text-black">
                            Konsultasi Gratis
                        </p>
                        <x-heroicon-o-arrow-small-up class="w-8 h-8 lg:h-10 lg:w-10 border-2 bg-black text-white rounded-full p-1 group-hover:rotate-45 duration-300 transition-all" />
                    </button>
                </div>

                {{-- Card 3 - Service Features --}}
                <div class="h-40 lg:h-[400px] md:col-span-2 lg:col-span-1 flex relative overflow-hidden poppins-regular flex-col p-4 text-white border-2 border-gray-300 justify-between rounded-xl bg-[url({{ asset('storage/content/wedding04.jpg') }})] bg-no-repeat bg-center bg-cover">
                    <div class="absolute inset-0 bg-black/60"></div>
                    <div class="relative z-10 flex gap-3 text-xs">
                        <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">Gratis Antar</span>
                        <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">Setup</span>
                        <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">Maintenance</span>
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-lg edu-vic-wa-nt-hand-400 mb-2">Layanan Lengkap</h4>
                        <p class="text-sm">Gratis antar-jemput, setup profesional, dan maintenance selama acara</p>
                    </div>
                </div>
            </div>

            {{-- Product Grid --}}
          
           <div x-show="activeCategory === 'furniture'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                @foreach ($dataBarang as $barang)
                    <div class="group relative bg-white/70 dark:bg-gray-800/70 rounded-3xl overflow-hidden border border-gray-200/50 dark:border-gray-700/50 hover:border-[--color-primary]/30 transition-all duration-500 hover:shadow-xl hover:shadow-[--color-primary]/10 hover:-translate-y-2">
                        {{-- Image with modern overlay --}}
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('storage/barang/' . $barang['foto']) }}" 
                                alt="{{ $barang['nama'] }}" 
                                class="absolute inset-0 w-full h-full object-cover scale-105 group-hover:scale-100 transition-transform duration-700" 
                                onerror="this.src='{{ asset('storage/content/decoration01.jpeg') }}'">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent group-hover:from-black/40 transition-all duration-500"></div>
                            
                            {{-- Floating availability badge --}}
                            <div class="absolute top-4 right-4">
                                <span class="bg-[--color-primary]/90 text-white px-3 py-1.5 rounded-full text-xs font-medium tracking-wide">
                                    TERSEDIA
                                </span>
                            </div>
                            
                            {{-- Furniture icon --}}
                            <div class="absolute bottom-4 left-4">
                                <div class="w-12 h-12 bg-white/90 dark:bg-gray-800/90 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-[--color-primary]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Content --}}
                        <div class="p-6 space-y-4">
                            <div class="space-y-2">
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-[--color-primary] transition-colors duration-300 edu-vic-wa-nt-hand">
                                    {{ $barang['nama'] }}
                                </h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed pt-serif-regular">
                                     {{ Str::limit($barang['deskripsi'], 100) }}
                                </p>
                            </div>
                            
                            {{-- Price section --}}
                            <div class="space-y-1">
                                <div class="text-2xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">
                                    Rp {{ number_format($barang['harga'], 0, ',', '.') }}
                                </div>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                    per item/hari
                                </span>
                            </div>
                            
                            {{-- CTA Button --}}
                            <button class="w-full border-2 border-[--color-primary] text-[--color-primary] dark:text-white dark:border-white rounded-2xl py-3 px-4 font-medium text-sm hover:bg-[--color-primary] hover:text-white dark:hover:bg-white dark:hover:text-gray-900 transition-all duration-300 hover:shadow-lg hover:shadow-[--color-primary]/25 hover:scale-105">
                                Pesan Sekarang
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Why Choose Us Section (sama seperti homepage) --}}
        <div class="grid pb-16 grid-cols-1 md:grid-cols-2 mt-10 gap-4">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3 bg-gray-200 rounded-2xl p-6">
                    <h3 class="text-black text-lg poppins-regular">Keunggulan layanan penyewaan kami :</h3>
                    <p class="mt-2 edu-vic-wa-nt-hand-500 text-gray-800 text-sm">"Kualitas premium, harga terjangkau, dan layanan antar-jemput gratis area Tarakan!"
                        <span class="font-semibold text-[--color-primary]">- Tim 3Rasa</span>
                    </p>
                </div>

                <div class="h-52 xl:h-full bg-[url({{ asset('storage/content/prop/kursi.jpg') }})] rounded-xl xl:col-span-1 col-span-3 bg-cover bg-center"></div>
                
                <div class="flex col-span-2 xl:col-span-1 flex-col items-center justify-center text-center gap-4 border-2 rounded-2xl border-gray-200 p-4 text-sm">
                    <p class="pt-serif-regular text-center tracking-wider dark:text-gray-400 text-gray-600">Semua perlengkapan dalam kondisi prima dan selalu terawat untuk acara istimewa Anda.</p>
                    
                    <button class="flex group hover:scale-105 transition-all duration-300 bg-gray-300 rounded-full justify-center items-center">
                        <p class="my-2 mx-3 ml-4 pt-serif-regular text-black">
                            Konsultasi
                        </p>
                        <x-heroicon-o-arrow-small-up class="h-8 w-8 border-2 bg-black text-white rounded-full p-1 group-hover:rotate-45 duration-300 transition-all" />
                    </button>
                </div>

                <div class="flex bg-gray-200 flex-col items-center justify-center text-center gap-4 border-2 rounded-2xl border-gray-200 p-4 text-sm">
                    <p class="pt-serif-regular text-3xl xl:text-5xl text-center tracking-wider dark:text-gray-400 text-gray-600">500 +</p>
                    <p class="pt-serif-regular text-center tracking-wider dark:text-gray-400 text-gray-600">Item tersedia</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 gap-5 pt-serif-regular">
                <div class="bg-gray-200 rounded-2xl p-6">
                    <h3 class="text-md text-black">Layanan penyewaan lengkap dengan kualitas premium dan harga terjangkau. Kami menyediakan berbagai perlengkapan pernikahan mulai dari furniture, dekorasi, hingga peralatan pendukung lainnya.</h3>
                </div>
                <div class="bg-gray-200 rounded-2xl px-6 py-4">
                    <p class="text-black">01. <span>Gratis antar-jemput area Tarakan</span></p>
                </div>
                <div class="bg-gray-200 rounded-2xl px-6 py-4">
                    <p class="text-black">02. <span>Setup dan maintenance profesional</span></p>
                </div>
                <div class="bg-gray-200 rounded-2xl px-6 py-4">
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