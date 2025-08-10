@extends('Layout.app')

@section('title', 'Wedding Organizer - Layanan Pernikahan Terlengkap')

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

    .shooting-star:nth-child(1) { top: 10%; animation-duration: 3s; animation-delay: 0s; }
    .shooting-star:nth-child(2) { top: 20%; animation-duration: 4s; animation-delay: 2s; }
    .shooting-star:nth-child(3) { top: 30%; animation-duration: 2.5s; animation-delay: 4s; }
    .shooting-star:nth-child(4) { top: 40%; animation-duration: 3.5s; animation-delay: 1s; }
    .shooting-star:nth-child(5) { top: 60%; animation-duration: 4.5s; animation-delay: 5s; }


    .dark .shooting-star {
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 0 6px rgba(255, 255, 255, 0.6);
    }

    /* Marquee animation for gallery */
    @keyframes marquee-left {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .marquee-left {
        animation: marquee-left 25s linear infinite;
    }
    .marquee-container {
        overflow: hidden;
    }

    /* Gradient overlay for price cards */
    .price-gradient {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    

    /* Accordion animation */
    .accordion-content {
        transition: max-height 0.3s ease-out, padding 0.3s ease-out;
        overflow: hidden;
    }

    /* Tab styles */
    .tab-active {
        background: #B2110E;
        color: white;
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
</div>

<div>

    {{-- About Service Section --}}
    <div class="px-10 py-20 overflow-hidden bg-white dark:bg-gray-800 md:px-16 lg:px-24 xl:px-32 mt-14">
        <div class="grid items-center grid-cols-1 gap-16 lg:grid-cols-2">
            <div data-aos="fade-right">
                <h2 class="mb-6 text-3xl font-semibold text-black lg:text-5xl dark:text-white edu-vic-wa-nt-hand">
                    Pernikahan Impian Anda, Misi Kami
                </h2>
                <p class="mb-6 text-lg text-gray-600 dark:text-gray-300 pt-serif-regular">
                    Kami memahami bahwa pernikahan adalah momen paling berharga dalam hidup Anda. Dengan pengalaman lebih dari 5 tahun, tim profesional kami siap menghadirkan pernikahan yang sempurna sesuai dengan visi dan budget Anda.
                </p>
                <p class="mb-8 text-lg text-gray-600 dark:text-gray-300 pt-serif-regular">
                    Dari pernikahan adat tradisional hingga konsep modern kontemporer, kami menangani setiap detail dengan penuh perhatian dan dedikasi tinggi.
                </p>
                <div class="flex flex-wrap gap-4 mb-8">
                    <div class="flex items-center">
                        <x-heroicon-o-check-circle class="w-6 h-6 mr-2 text-primary" />
                        <span class="text-gray-700 dark:text-gray-300">Perencanaan Menyeluruh</span>
                    </div>
                    <div class="flex items-center">
                        <x-heroicon-o-check-circle class="w-6 h-6 mr-2 text-primary" />
                        <span class="text-gray-700 dark:text-gray-300">Tim Berpengalaman</span>
                    </div>
                    <div class="flex items-center">
                        <x-heroicon-o-check-circle class="w-6 h-6 mr-2 text-primary" />
                        <span class="text-gray-700 dark:text-gray-300">Garansi Kepuasan</span>
                    </div>
                </div>
            </div>
            <div data-aos="fade-left" class="relative">
                <div class="relative">
                    <img src="{{ asset('storage/content/wedding06.jpg') }}" alt="Wedding Planning" class="shadow-xl rounded-2xl">
                    <div class="absolute p-6 text-white -bottom-6 -right-6 bg-primary rounded-2xl">
                        <div class="text-3xl font-bold edu-vic-wa-nt-hand">100+</div>
                        <div class="text-sm">Pasangan Bahagia</div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    {{-- Venue Packages Section --}}
    <div class="relative px-10 py-20 overflow-hidden md:px-16 lg:px-24 xl:px-32">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute w-20 h-20 border-2 border-black rounded-full top-10 left-10 dark:border-white"></div>
            <div class="absolute w-16 h-16 border-2 border-black rounded-full top-32 right-20 dark:border-white"></div>
            <div class="absolute w-12 h-12 border-2 border-black rounded-full bottom-20 left-32 dark:border-white"></div>
            <div class="absolute w-24 h-24 border-2 border-black rounded-full bottom-40 right-10 dark:border-white"></div>
        </div>

        <div class="relative z-10">
            <div class="mb-16 text-center">
                <div class="inline-block px-6 py-2 mb-6 rounded-full bg-white/10 backdrop-blur-sm">
                    <span class="text-sm font-medium tracking-wider text-black dark:text-white ">PAKET VENUE EKSKLUSIF</span>
                </div>
                <h2 class="mb-6 text-4xl font-bold text-black lg:text-6xl dark:text-white edu-vic-wa-nt-hand">
                    Daftar Venue Terbaik 2024
                </h2>
                <p class="max-w-3xl mx-auto text-xl text-gray-700 dark:text-white/80 pt-serif-regular-italic">
                    Venue mewah dan eksklusif untuk momen berharga Anda dengan fasilitas lengkap dan pelayanan premium
                </p>
            </div>

            {{-- Venue Category Tabs --}}
            <div x-data="{ activeTab: 'rumahan' }" class="w-full">
                {{-- Tab Navigation --}}
                <div class="flex flex-wrap justify-center mb-12 space-x-2">
                    <button @click="activeTab = 'rumahan'" 
                            :class="activeTab === 'rumahan' ? 'tab-active' : ' bg-gray-300 text-gray-800 dark:bg-white/10 dark:text-white dark:hover:bg-white/20'" 
                            class="px-6 py-3 mb-2 font-medium transition-all duration-300 rounded-full">
                        <span class="flex items-center">
                            <x-heroicon-o-home class="w-5 h-5 mr-2" />
                            Rumahan
                        </span>
                    </button>
                    <button @click="activeTab = 'gedung'" 
                            :class="activeTab === 'gedung' ? 'tab-active' : 'bg-gray-300 text-gray-800 dark:bg-white/10 dark:text-white dark:hover:bg-white/20'" 
                            class="px-6 py-3 mb-2 font-medium transition-all duration-300 rounded-full">
                        <span class="flex items-center">
                            <x-heroicon-o-building-office-2 class="w-5 h-5 mr-2" />
                            Gedung
                        </span>
                    </button>
                    <button @click="activeTab = 'hotel'" 
                            :class="activeTab === 'hotel' ? 'tab-active' : 'bg-gray-300 text-gray-800 dark:bg-white/10 dark:text-white dark:hover:bg-white/20'" 
                            class="px-6 py-3 mb-2 font-medium transition-all duration-300 rounded-full">
                        <span class="flex items-center">
                            <x-heroicon-o-building-office class="w-5 h-5 mr-2" />
                            Hotel
                        </span>
                    </button>
                </div>

                {{-- Tab Content --}}
                <div class="min-h-[600px]">
                    {{-- Rumahan Tab --}}
                    <div x-show="activeTab === 'rumahan'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2 lg:grid-cols-3">
                            @php
                                $rumahanPakets = $dataPaket->filter(function($paket) {
                                    $namaPaket = strtolower($paket->nama_paket);
                                    // Masukkan semua yang tidak mengandung 'gedung' atau 'hotel'
                                    return !str_contains($namaPaket, 'gedung') && !str_contains($namaPaket, 'hotel');
                                });
                            @endphp

                            @foreach($rumahanPakets as $index => $paket)
                                <div data-aos="fade-up" 
                                    @if($index % 2 == 1) data-aos-delay="300" @endif
                                    class="border-[1px] dark:backdrop-blur-[10px] bg-gray-100 dark:bg-gray-100/10 rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500">
                                            <x-heroicon-o-home class="w-6 h-6 text-black dark:text-white" />
                                        </div>
                                        <div class="text-right">
                                            <div class="text-2xl font-bold text-[#B2110E]">
                                                Rp {{ number_format($paket->harga, 0, ',', '.') }}
                                            </div>
                                            <div class="text-sm text-gray-600 dark:text-white/60">per acara</div>
                                        </div>
                                    </div>
                                    <h4 class="mb-2 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">
                                        {{ $paket->nama_paket }}
                                    </h4>
                                    <p class="mb-4 text-sm text-gray-700 dark:text-white/70">
                                        @if(str_contains($paket->nama_paket, 'C'))
                                            Kapasitas 200-250 tamu
                                        @elseif(str_contains($paket->nama_paket, 'D'))
                                            Kapasitas 250-300 tamu
                                        @else
                                            Kapasitas 150-200 tamu
                                        @endif
                                    </p>
                                    <div class="space-y-2 text-sm text-gray-700 dark:text-white/80">
                                        <div class="flex items-center">
                                            <x-heroicon-o-check class="w-4 h-4 mr-2 text-[#B2110E]" />
                                            <span>Dekorasi luxury</span>
                                        </div>
                                        <div class="flex items-center">
                                            <x-heroicon-o-check class="w-4 h-4 mr-2 text-[#B2110E]" />
                                            <span>Full lighting & sound</span>
                                        </div>
                                        <div class="flex items-center">
                                            <x-heroicon-o-check class="w-4 h-4 mr-2 text-[#B2110E]" />
                                            <span>Catering setup</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Gedung Tab --}}
                    <div x-show="activeTab === 'gedung'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2 lg:grid-cols-3">
                            @php
                                $gedungPakets = $dataPaket->filter(function($paket) {
                                    return str_contains(strtolower($paket->nama_paket), 'gedung');
                                });
                            @endphp

                            @foreach($gedungPakets as $index => $paket)
                                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="border-[1px] dark:backdrop-blur-[10px] bg-gray-100 dark:bg-gray-100/10 rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500">
                                            <x-heroicon-o-building-office-2 class="w-6 h-6 text-black dark:text-white" />
                                        </div>
                                        <div class="text-right">
                                            <div class="text-2xl font-bold text-[#B2110E]">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
                                            <div class="text-sm text-white/60">per acara</div>
                                        </div>
                                    </div>
                                    <h4 class="mb-2 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">{{ $paket->nama_paket }}</h4>
                                    <p class="mb-4 text-sm text-gray-700 dark:text-white/70">
                                        @if($paket->harga >= 40000000)
                                            Kapasitas 400-500 tamu
                                        @elseif($paket->harga >= 35000000)
                                            Kapasitas 350-450 tamu
                                        @else
                                            Kapasitas 200-300 tamu
                                        @endif
                                    </p>
                                    <div class="space-y-2 text-sm text-gray-700 dark:text-white/80">
                                        <div class="flex items-center">
                                            <x-heroicon-o-check class="w-4 h-4 mr-2 text-[#B2110E]" />
                                            <span>
                                                @if(str_contains(strtolower($paket->nama_paket), 'wisma') || str_contains(strtolower($paket->nama_paket), 'indoor'))
                                                    AC & sound system
                                                @else
                                                    Premium facilities
                                                @endif
                                            </span>
                                        </div>
                                        <div class="flex items-center">
                                            <x-heroicon-o-check class="w-4 h-4 mr-2 text-[#B2110E]" />
                                            <span>
                                                @if(str_contains(strtolower($paket->nama_paket), 'bandara'))
                                                    Strategic location
                                                @else
                                                    Professional setup
                                                @endif
                                            </span>
                                        </div>
                                        <div class="flex items-center">
                                            <x-heroicon-o-check class="w-4 h-4 mr-2 text-[#B2110E]" />
                                            <span>
                                                @if(str_contains(strtolower($paket->nama_paket), 'kpknl'))
                                                    Security included
                                                @else
                                                    Complete facilities
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Hotel Tab --}}
                    <div x-show="activeTab === 'hotel'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2 lg:grid-cols-3">
                            @php
                                $hotelPakets = $dataPaket->filter(function($paket) {
                                    return str_contains(strtolower($paket->nama_paket), 'hotel');
                                });
                            @endphp

                            @foreach($hotelPakets as $index => $paket)
                                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="border-[1px] dark:backdrop-blur-[10px] bg-gray-100 dark:bg-gray-100/10 rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500">
                                            <x-heroicon-o-building-office class="w-6 h-6 text-black dark:text-white" />
                                        </div>
                                        <div class="text-right">
                                            <div class="text-2xl font-bold text-[#B2110E]">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
                                            <div class="text-sm text-white/60">per acara</div>
                                        </div>
                                    </div>
                                    <h4 class="mb-2 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">{{ $paket->nama_paket }}</h4>
                                     <p class="mb-4 text-sm text-gray-700 dark:text-white/70">
                                        @if(str_contains($paket->nama_paket, 'C'))
                                            Kapasitas 200-250 tamu
                                        @elseif(str_contains($paket->nama_paket, 'D'))
                                            Kapasitas 250-300 tamu
                                        @else
                                            Kapasitas 150-200 tamu
                                        @endif
                                    </p>
                                    <div class="space-y-2 text-sm text-gray-700 dark:text-white/80">
                                        <div class="flex items-center">
                                            <x-heroicon-o-check class="w-4 h-4 mr-2 text-[#B2110E]" />
                                            <span>
                                                @if(str_contains(strtolower($paket->nama_paket), 'lotus'))
                                                    Resort experience
                                                @elseif(str_contains(strtolower($paket->nama_paket), 'paradise'))
                                                    Garden setting
                                                @elseif(str_contains(strtolower($paket->nama_paket), 'diamond'))
                                                    Diamond standard
                                                @else
                                                    Hotel-grade service
                                                @endif
                                            </span>
                                        </div>
                                        <div class="flex items-center">
                                            <x-heroicon-o-check class="w-4 h-4 mr-2 text-[#B2110E]" />
                                            <span>
                                                @if(str_contains(strtolower($paket->nama_paket), 'lotus') || str_contains(strtolower($paket->nama_paket), 'monaco'))
                                                    Luxury amenities
                                                @elseif(str_contains(strtolower($paket->nama_paket), 'paradise'))
                                                    Natural ambiance
                                                @else
                                                    Professional catering
                                                @endif
                                            </span>
                                        </div>
                                        <div class="flex items-center">
                                            <x-heroicon-o-check class="w-4 h-4 mr-2 text-[#B2110E]" />
                                            <span>
                                                @if(str_contains(strtolower($paket->nama_paket), 'lotus'))
                                                    VIP treatment
                                                @elseif(str_contains(strtolower($paket->nama_paket), 'paradise'))
                                                    Outdoor option
                                                @else
                                                    Valet parking
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Include Section --}}
    <div class="relative px-10 py-20 overflow-hidden md:px-16 lg:px-24 xl:px-32 ">
  
        <div class="relative z-10">
            <div class="mb-16 text-center">
                <div class="inline-block px-8 py-3 mb-6 rounded-full bg-gradient-to-r from-purple-500/20 to-pink-500/20 backdrop-blur-sm">
                    <span class="text-sm font-bold tracking-wider text-black uppercase dark:text-white">WHAT'S INCLUDED</span>
                </div>
                <h2 class="mb-6 text-4xl font-bold text-black dark:text-white lg:text-6xl bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text edu-vic-wa-nt-hand">
                    Paket Lengkap untuk Hari Bahagia Anda
                </h2>
                <p class="max-w-4xl mx-auto text-xl leading-relaxed text-gray-700 dark:text-white/80 pt-serif-regular-italic">
                    Semua yang Anda butuhkan untuk pernikahan impian, mulai dari dekorasi mewah hingga dokumentasi profesional, telah kami siapkan dalam satu paket komprehensif
                </p>
            </div>

            {{-- Include Items Grid --}}
            <div class="grid grid-cols-1 gap-6 mb-16 md:grid-cols-2 lg:grid-cols-4">
                @foreach($dataInclude as $index => $include)
                <div data-aos="fade-up" 
                    data-aos-delay="{{ $index * 100 }}"
                    class="group">
                    
                    {{-- Card Container --}}
                    <div class="relative h-full p-6 transition-all duration-300 bg-white border border-gray-200 dark:bg-gray-800 rounded-2xl dark:border-gray-700 hover:border-primary/30 hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/10">
                        
                        {{-- Header with Icon --}}
                        <div class="flex items-center gap-3 mb-6">
                            <div class="flex items-center justify-center w-10 h-10 transition-transform duration-300 bg-gradient-to-br from-primary to-pink-500 rounded-xl group-hover:scale-110">
                                <x-heroicon-o-check class="w-5 h-5 text-white" />
                            </div>
                            <h3 class="text-lg font-semibold text-black transition-colors duration-300 dark:text-white poppins-medium group-hover:text-primary">
                                {{ $include->nama_include }}
                            </h3>
                        </div>
                        
                        {{-- Items List --}}
                        <div class="space-y-2.5">
                            @foreach($include->items as $item)
                            <div class="flex items-start gap-3 group/item">
                                <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2 group-hover/item:scale-125 transition-transform duration-200"></div>
                                <span class="text-sm leading-relaxed text-gray-600 transition-colors duration-200 dark:text-gray-300 group-hover/item:text-gray-900 dark:group-hover/item:text-white">
                                    {{ $item }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                        
                        {{-- Bottom accent line --}}
                        <div class="absolute bottom-0 left-6 right-6 h-0.5 bg-gradient-to-r from-transparent via-primary/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- Service Features Section --}}
    <div class="px-10 py-20 overflow-hidden bg-gray-50 dark:bg-gray-900 md:px-16 lg:px-24 xl:px-32">
        <div class="mb-16 text-center">
            <h2 class="mx-8 mb-4 text-3xl text-center text-black lg:text-4xl poppins-medium md:mx-20 lg:mx-40 dark:text-white">
                Layanan Wedding Organizer yang 
                <span class="pt-serif-regular-italic text-primary">Komprehensif</span>
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                Setiap aspek pernikahan Anda ditangani dengan profesional dan penuh perhatian
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            {{-- Feature 1 --}}
            <div data-aos="fade-up" class="p-6 transition-all duration-300 bg-white shadow-lg dark:bg-gray-800 rounded-2xl hover:shadow-xl hover:-translate-y-2">
                <div class="flex items-center justify-center w-16 h-16 mb-4 bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl">
                    <x-heroicon-o-heart class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="mb-3 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Konsultasi & Perencanaan</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Diskusi mendalam tentang visi pernikahan, pemilihan vendor, dan penyusunan timeline yang detail.</p>
            </div>

            {{-- Feature 2 --}}
            <div data-aos="fade-up" data-aos-delay="100" class="p-6 transition-all duration-300 bg-white shadow-lg dark:bg-gray-800 rounded-2xl hover:shadow-xl hover:-translate-y-2">
                <div class="flex items-center justify-center w-16 h-16 mb-4 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl">
                    <x-heroicon-o-users class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="mb-3 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Koordinasi Vendor</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Mengelola semua vendor mulai dari catering, fotografer, hingga entertainment dengan koordinasi yang rapi.</p>
            </div>

            {{-- Feature 3 --}}
            <div data-aos="fade-up" data-aos-delay="200" class="p-6 transition-all duration-300 bg-white shadow-lg dark:bg-gray-800 rounded-2xl hover:shadow-xl hover:-translate-y-2">
                <div class="flex items-center justify-center w-16 h-16 mb-4 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl">
                    <x-heroicon-o-sparkles class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="mb-3 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Desain & Dekorasi</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Konsep dekorasi yang disesuaikan dengan tema dan preferensi Anda untuk menciptakan suasana yang magis.</p>
            </div>

            {{-- Feature 4 --}}
            <div data-aos="fade-up" data-aos-delay="300" class="p-6 transition-all duration-300 bg-white shadow-lg dark:bg-gray-800 rounded-2xl hover:shadow-xl hover:-translate-y-2">
                <div class="flex items-center justify-center w-16 h-16 mb-4 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl">
                    <x-heroicon-o-calendar-days class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="mb-3 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Manajemen Hari-H</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Pengawasan penuh selama acara berlangsung untuk memastikan semuanya berjalan sesuai rencana.</p>
            </div>

            {{-- Feature 5 --}}
            <div data-aos="fade-up" data-aos-delay="400" class="p-6 transition-all duration-300 bg-white shadow-lg dark:bg-gray-800 rounded-2xl hover:shadow-xl hover:-translate-y-2">
                <div class="flex items-center justify-center w-16 h-16 mb-4 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl">
                    <x-heroicon-o-document-text class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="mb-3 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Administrasi & Perizinan</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Pengurusan semua dokumen dan perizinan yang diperlukan untuk kelancaran acara pernikahan.</p>
            </div>

            {{-- Feature 6 --}}
            <div data-aos="fade-up" data-aos-delay="500" class="p-6 transition-all duration-300 bg-white shadow-lg dark:bg-gray-800 rounded-2xl hover:shadow-xl hover:-translate-y-2">
                <div class="flex items-center justify-center w-16 h-16 mb-4 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-2xl">
                    <x-heroicon-o-gift class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="mb-3 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Paket Customizable</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Berbagai pilihan paket yang dapat disesuaikan dengan budget dan kebutuhan spesifik Anda.</p>
            </div>
        </div>
    </div>

    {{-- Process Timeline Section --}}
    <div class="px-10 py-20 overflow-hidden bg-gray-50 dark:bg-gray-900 md:px-16 lg:px-24 xl:px-32">
        <div class="mb-16 text-center">
            <h2 class="mb-4 text-3xl font-semibold text-black lg:text-5xl dark:text-white edu-vic-wa-nt-hand">
                Timeline Persiapan Pernikahan
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                Dari konsultasi awal hingga hari bahagia Anda, kami akan mendampingi setiap langkah perjalanan
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="relative">
                {{-- Timeline line --}}
                <div class="absolute top-0 bottom-0 w-1 transform left-8 md:left-1/2 md:-translate-x-1/2 bg-primary opacity-30"></div>
                
                {{-- Timeline items --}}
                <div class="space-y-12">
                    {{-- 6 Months Before --}}
                    <div data-aos="fade-right" class="relative flex items-center">
                        <div class="z-10 flex items-center justify-center flex-shrink-0 w-16 h-16 font-bold text-white rounded-full bg-primary">
                            6M
                        </div>
                        <div class="ml-8 md:ml-0 md:w-1/2 md:pr-8">
                            <div class="p-6 bg-white shadow-lg dark:bg-gray-800 rounded-2xl">
                                <h3 class="mb-2 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Konsultasi Awal</h3>
                                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Diskusi visi pernikahan, budget planning, dan pemilihan tanggal. Pembahasan konsep tema dan style yang diinginkan.</p>
                            </div>
                        </div>
                    </div>

                    {{-- 4 Months Before --}}
                    <div data-aos="fade-left" class="relative flex items-center md:flex-row-reverse">
                        <div class="z-10 flex items-center justify-center flex-shrink-0 w-16 h-16 font-bold text-white rounded-full bg-primary md:ml-8">
                            4M
                        </div>
                        <div class="ml-8 md:ml-0 md:w-1/2 md:pl-8">
                            <div class="p-6 bg-white shadow-lg dark:bg-gray-800 rounded-2xl">
                                <h3 class="mb-2 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Booking Vendor</h3>
                                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Pemilihan dan booking venue, catering, fotografer, entertainment, dan vendor lainnya sesuai kebutuhan.</p>
                            </div>
                        </div>
                    </div>

                    {{-- 2 Months Before --}}
                    <div data-aos="fade-right" class="relative flex items-center">
                        <div class="z-10 flex items-center justify-center flex-shrink-0 w-16 h-16 font-bold text-white rounded-full bg-primary">
                            2M
                        </div>
                        <div class="ml-8 md:ml-0 md:w-1/2 md:pr-8">
                            <div class="p-6 bg-white shadow-lg dark:bg-gray-800 rounded-2xl">
                                <h3 class="mb-2 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Finalisasi Detail</h3>
                                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Konfirmasi menu, dekorasi detail, rundown acara, dan koordinasi final dengan semua vendor.</p>
                            </div>
                        </div>
                    </div>

                    {{-- 1 Week Before --}}
                    <div data-aos="fade-left" class="relative flex items-center md:flex-row-reverse">
                        <div class="z-10 flex items-center justify-center flex-shrink-0 w-16 h-16 font-bold text-white rounded-full bg-primary md:ml-8">
                            1W
                        </div>
                        <div class="ml-8 md:ml-0 md:w-1/2 md:pl-8">
                            <div class="p-6 bg-white shadow-lg dark:bg-gray-800 rounded-2xl">
                                <h3 class="mb-2 text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Final Check</h3>
                                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Rehearsal, final meeting dengan vendor, dan persiapan emergency kit untuk mengantisipasi hal tak terduga.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Wedding Day --}}
                    <div data-aos="zoom-in" class="relative flex items-center justify-center">
                        <div class="z-10 flex items-center justify-center w-20 h-20 text-lg font-bold text-black rounded-full bg-gradient-to-br from-pink-500 to-rose-500 dark:text-white">
                            <x-heroicon-o-heart class="w-8 h-8" />
                        </div>
                        <div class="absolute w-64 left-24 md:left-1/2 md:transform md:translate-x-8">
                            <div class="p-6 text-black shadow-lg bg-gradient-to-br from-pink-500 to-rose-500 dark:text-white rounded-2xl">
                                <h3 class="mb-2 text-xl font-bold edu-vic-wa-nt-hand">Hari Bahagia Anda!</h3>
                                <p class="pt-serif-regular">Full supervision dan koordinasi untuk memastikan semuanya berjalan sempurna sesuai rencana.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

{{-- Add Alpine.js for interactive components
@push('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
@endpush --}}
@endsection