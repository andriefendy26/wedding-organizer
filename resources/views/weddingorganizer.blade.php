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

    .content-wrapper {
        position: relative;
        z-index: 10;
    }

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

<div class="content-wrapper">

    {{-- About Service Section --}}
    <div class="bg-white dark:bg-gray-800 px-10 md:px-16 lg:px-24 xl:px-32 py-20 mt-14">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl lg:text-5xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand mb-6">
                    Pernikahan Impian Anda, Misi Kami
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 pt-serif-regular mb-6">
                    Kami memahami bahwa pernikahan adalah momen paling berharga dalam hidup Anda. Dengan pengalaman lebih dari 5 tahun, tim profesional kami siap menghadirkan pernikahan yang sempurna sesuai dengan visi dan budget Anda.
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-300 pt-serif-regular mb-8">
                    Dari pernikahan adat tradisional hingga konsep modern kontemporer, kami menangani setiap detail dengan penuh perhatian dan dedikasi tinggi.
                </p>
                <div class="flex flex-wrap gap-4 mb-8">
                    <div class="flex items-center">
                        <x-heroicon-o-check-circle class="w-6 h-6 text-[--color-primary] mr-2" />
                        <span class="text-gray-700 dark:text-gray-300">Perencanaan Menyeluruh</span>
                    </div>
                    <div class="flex items-center">
                        <x-heroicon-o-check-circle class="w-6 h-6 text-[--color-primary] mr-2" />
                        <span class="text-gray-700 dark:text-gray-300">Tim Berpengalaman</span>
                    </div>
                    <div class="flex items-center">
                        <x-heroicon-o-check-circle class="w-6 h-6 text-[--color-primary] mr-2" />
                        <span class="text-gray-700 dark:text-gray-300">Garansi Kepuasan</span>
                    </div>
                </div>
            </div>
            <div data-aos="fade-left" class="relative">
                <div class="relative">
                    <img src="{{ asset('storage/content/wedding06.jpg') }}" alt="Wedding Planning" class="rounded-2xl shadow-xl">
                    <div class="absolute -bottom-6 -right-6 bg-[--color-primary] text-white p-6 rounded-2xl">
                        <div class="text-3xl font-bold edu-vic-wa-nt-hand">100+</div>
                        <div class="text-sm">Pasangan Bahagia</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 

  

    {{-- Venue Packages Section --}}
    <div class="md:px-16 lg:px-24 xl:px-32 py-20 relative overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-20 h-20 border-2 border-black dark:border-white rounded-full"></div>
            <div class="absolute top-32 right-20 w-16 h-16 border-2 border-black dark:border-white rounded-full"></div>
            <div class="absolute bottom-20 left-32 w-12 h-12 border-2 border-black dark:border-white rounded-full"></div>
            <div class="absolute bottom-40 right-10 w-24 h-24 border-2 border-black dark:border-white rounded-full"></div>
        </div>

        <div class="relative z-10">
            <div class="text-center mb-16">
                <div class="inline-block bg-white/10 backdrop-blur-sm rounded-full px-6 py-2 mb-6">
                    <span class="text-black dark:text-white font-medium tracking-wider text-sm ">PAKET VENUE EKSKLUSIF</span>
                </div>
                <h2 class="text-4xl lg:text-6xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-6">
                    Daftar Venue Terbaik 2024
                </h2>
                <p class="text-gray-700 dark:text-white/80 text-xl max-w-3xl mx-auto pt-serif-regular-italic">
                    Venue mewah dan eksklusif untuk momen berharga Anda dengan fasilitas lengkap dan pelayanan premium
                </p>
            </div>

            {{-- Venue Category Tabs --}}
            <div x-data="{ activeTab: 'rumahan' }" class="w-full">
                {{-- Tab Navigation --}}
                <div class="flex flex-wrap justify-center mb-12 space-x-2">
                    <button @click="activeTab = 'rumahan'" 
                            :class="activeTab === 'rumahan' ? 'tab-active' : ' bg-gray-300 text-gray-800 dark:bg-white/10 dark:text-white dark:hover:bg-white/20'" 
                            class="px-6 py-3 rounded-full font-medium transition-all duration-300 mb-2">
                        <span class="flex items-center">
                            <x-heroicon-o-home class="w-5 h-5 mr-2" />
                            Rumahan
                        </span>
                    </button>
                    <button @click="activeTab = 'gedung'" 
                            :class="activeTab === 'gedung' ? 'tab-active' : 'bg-gray-300 text-gray-800 dark:bg-white/10 dark:text-white dark:hover:bg-white/20'" 
                            class="px-6 py-3 rounded-full font-medium transition-all duration-300 mb-2">
                        <span class="flex items-center">
                            <x-heroicon-o-building-office-2 class="w-5 h-5 mr-2" />
                            Gedung
                        </span>
                    </button>
                    <button @click="activeTab = 'hotel'" 
                            :class="activeTab === 'hotel' ? 'tab-active' : 'bg-gray-300 text-gray-800 dark:bg-white/10 dark:text-white dark:hover:bg-white/20'" 
                            class="px-6 py-3 rounded-full font-medium transition-all duration-300 mb-2">
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
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
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
                                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center">
                                            <x-heroicon-o-home class="w-6 h-6 text-black dark:text-white" />
                                        </div>
                                        <div class="text-right">
                                            <div class="text-2xl font-bold text-[#B2110E]">
                                                Rp {{ number_format($paket->harga, 0, ',', '.') }}
                                            </div>
                                            <div class="text-gray-600 dark:text-white/60 text-sm">per acara</div>
                                        </div>
                                    </div>
                                    <h4 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-2">
                                        {{ $paket->nama_paket }}
                                    </h4>
                                    <p class="text-gray-700 dark:text-white/70 text-sm mb-4">
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
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                            @php
                                $gedungPakets = $dataPaket->filter(function($paket) {
                                    return str_contains(strtolower($paket->nama_paket), 'gedung');
                                });
                            @endphp

                            @foreach($gedungPakets as $index => $paket)
                                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="border-[1px] dark:backdrop-blur-[10px] bg-gray-100 dark:bg-gray-100/10 rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center">
                                            <x-heroicon-o-building-office-2 class="w-6 h-6 text-black dark:text-white" />
                                        </div>
                                        <div class="text-right">
                                            <div class="text-2xl font-bold text-[#B2110E]">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
                                            <div class="text-white/60 text-sm">per acara</div>
                                        </div>
                                    </div>
                                    <h4 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-2">{{ $paket->nama_paket }}</h4>
                                    <p class="text-gray-700 dark:text-white/70 text-sm mb-4">
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
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                            @php
                                $hotelPakets = $dataPaket->filter(function($paket) {
                                    return str_contains(strtolower($paket->nama_paket), 'hotel');
                                });
                            @endphp

                            @foreach($hotelPakets as $index => $paket)
                                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="border-[1px] dark:backdrop-blur-[10px] bg-gray-100 dark:bg-gray-100/10 rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center">
                                            <x-heroicon-o-building-office class="w-6 h-6 text-black dark:text-white" />
                                        </div>
                                        <div class="text-right">
                                            <div class="text-2xl font-bold text-[#B2110E]">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
                                            <div class="text-white/60 text-sm">per acara</div>
                                        </div>
                                    </div>
                                    <h4 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-2">{{ $paket->nama_paket }}</h4>
                                     <p class="text-gray-700 dark:text-white/70 text-sm mb-4">
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
    <div class="md:px-16 lg:px-24 xl:px-32 py-20 relative overflow-hidden bg-gradient-to-br from-purple-50 to-pink-50 dark:from-gray-900 dark:to-purple-900">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-20 w-32 h-32 border-2 border-purple-400 rounded-full animate-pulse"></div>
            <div class="absolute top-40 right-32 w-24 h-24 border-2 border-pink-400 rounded-full animate-pulse delay-300"></div>
            <div class="absolute bottom-32 left-40 w-20 h-20 border-2 border-purple-400 rounded-full animate-pulse delay-500"></div>
            <div class="absolute bottom-20 right-20 w-28 h-28 border-2 border-pink-400 rounded-full animate-pulse delay-700"></div>
        </div>

        <div class="relative z-10">
            <div class="text-center mb-16">
                <div class="inline-block bg-gradient-to-r from-purple-500/20 to-pink-500/20 backdrop-blur-sm rounded-full px-8 py-3 mb-6">
                    <span class="text-black dark:text-white font-bold tracking-wider text-sm uppercase">WHAT'S INCLUDED</span>
                </div>
                <h2 class="text-4xl text-black dark:text-white lg:text-6xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text edu-vic-wa-nt-hand mb-6">
                    Paket Lengkap untuk Hari Bahagia Anda
                </h2>
                <p class="text-gray-700 dark:text-white/80 text-xl max-w-4xl mx-auto pt-serif-regular-italic leading-relaxed">
                    Semua yang Anda butuhkan untuk pernikahan impian, mulai dari dekorasi mewah hingga dokumentasi profesional, telah kami siapkan dalam satu paket komprehensif
                </p>
            </div>

            {{-- Include Items Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                @foreach($dataInclude as $index => $include)
                <div data-aos="fade-up" 
                    data-aos-delay="{{ $index * 100 }}" 
                    class="group relative">
                    
                    {{-- Card Container --}}
                    <div class="relative h-full bg-white/80 dark:bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 hover:bg-white/90 dark:hover:bg-white/20 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/25">
                        
                    
                        {{-- Title --}}
                        <h3 class="text-2xl font-bold text-center text-black dark:text-white edu-vic-wa-nt-hand mb-6">
                            {{ $include->nama_include }}
                        </h3>

                        {{-- Items List --}}
                        <div class="space-y-3">
                            @foreach($include->items as $item)
                            <div class="flex items-start group-hover:translate-x-1 transition-transform duration-300">
                                <div class="flex-shrink-0 w-2 h-2 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mt-2 mr-3"></div>
                                <span class="text-gray-700 dark:text-white/80 text-sm leading-relaxed">{{ $item }}</span>
                            </div>
                            @endforeach
                        </div>

                        {{-- Floating decoration --}}
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full opacity-70 group-hover:scale-150 transition-transform duration-300"></div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- Service Features Section --}}
    <div class="bg-gray-50 dark:bg-gray-900 px-10 md:px-16 lg:px-24 xl:px-32 py-20">
        <div class="text-center mb-16">
            <h2 class="text-black text-center text-3xl lg:text-4xl poppins-medium mx-8 md:mx-20 lg:mx-40 dark:text-white mb-4">
                Layanan Wedding Organizer yang 
                <span class="pt-serif-regular-italic text-[--color-primary]">Komprehensif</span>
            </h2>
            <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-2xl mx-auto">
                Setiap aspek pernikahan Anda ditangani dengan profesional dan penuh perhatian
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Feature 1 --}}
            <div data-aos="fade-up" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center mb-4">
                    <x-heroicon-o-heart class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Konsultasi & Perencanaan</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Diskusi mendalam tentang visi pernikahan, pemilihan vendor, dan penyusunan timeline yang detail.</p>
            </div>

            {{-- Feature 2 --}}
            <div data-aos="fade-up" data-aos-delay="100" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-4">
                    <x-heroicon-o-users class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Koordinasi Vendor</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Mengelola semua vendor mulai dari catering, fotografer, hingga entertainment dengan koordinasi yang rapi.</p>
            </div>

            {{-- Feature 3 --}}
            <div data-aos="fade-up" data-aos-delay="200" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-4">
                    <x-heroicon-o-sparkles class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Desain & Dekorasi</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Konsep dekorasi yang disesuaikan dengan tema dan preferensi Anda untuk menciptakan suasana yang magis.</p>
            </div>

            {{-- Feature 4 --}}
            <div data-aos="fade-up" data-aos-delay="300" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center mb-4">
                    <x-heroicon-o-calendar-days class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Manajemen Hari-H</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Pengawasan penuh selama acara berlangsung untuk memastikan semuanya berjalan sesuai rencana.</p>
            </div>

            {{-- Feature 5 --}}
            <div data-aos="fade-up" data-aos-delay="400" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-4">
                    <x-heroicon-o-document-text class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Administrasi & Perizinan</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Pengurusan semua dokumen dan perizinan yang diperlukan untuk kelancaran acara pernikahan.</p>
            </div>

            {{-- Feature 6 --}}
            <div data-aos="fade-up" data-aos-delay="500" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-2xl flex items-center justify-center mb-4">
                    <x-heroicon-o-gift class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Paket Customizable</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Berbagai pilihan paket yang dapat disesuaikan dengan budget dan kebutuhan spesifik Anda.</p>
            </div>
        </div>
    </div>

    {{-- Process Timeline Section --}}
    <div class="bg-gray-50 dark:bg-gray-900 px-10 md:px-16 lg:px-24 xl:px-32 py-20">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-5xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand mb-4">
                Timeline Persiapan Pernikahan
            </h2>
            <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-2xl mx-auto">
                Dari konsultasi awal hingga hari bahagia Anda, kami akan mendampingi setiap langkah perjalanan
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="relative">
                {{-- Timeline line --}}
                <div class="absolute left-8 md:left-1/2 transform md:-translate-x-1/2 top-0 bottom-0 w-1 bg-[--color-primary] opacity-30"></div>
                
                {{-- Timeline items --}}
                <div class="space-y-12">
                    {{-- 6 Months Before --}}
                    <div data-aos="fade-right" class="relative flex items-center">
                        <div class="flex-shrink-0 w-16 h-16 bg-[--color-primary] rounded-full flex items-center justify-center text-white font-bold z-10">
                            6M
                        </div>
                        <div class="ml-8 md:ml-0 md:w-1/2 md:pr-8">
                            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg">
                                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-2">Konsultasi Awal</h3>
                                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Diskusi visi pernikahan, budget planning, dan pemilihan tanggal. Pembahasan konsep tema dan style yang diinginkan.</p>
                            </div>
                        </div>
                    </div>

                    {{-- 4 Months Before --}}
                    <div data-aos="fade-left" class="relative flex items-center md:flex-row-reverse">
                        <div class="flex-shrink-0 w-16 h-16 bg-[--color-primary] rounded-full flex items-center justify-center text-white font-bold z-10 md:ml-8">
                            4M
                        </div>
                        <div class="ml-8 md:ml-0 md:w-1/2 md:pl-8">
                            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg">
                                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-2">Booking Vendor</h3>
                                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Pemilihan dan booking venue, catering, fotografer, entertainment, dan vendor lainnya sesuai kebutuhan.</p>
                            </div>
                        </div>
                    </div>

                    {{-- 2 Months Before --}}
                    <div data-aos="fade-right" class="relative flex items-center">
                        <div class="flex-shrink-0 w-16 h-16 bg-[--color-primary] rounded-full flex items-center justify-center text-white font-bold z-10">
                            2M
                        </div>
                        <div class="ml-8 md:ml-0 md:w-1/2 md:pr-8">
                            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg">
                                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-2">Finalisasi Detail</h3>
                                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Konfirmasi menu, dekorasi detail, rundown acara, dan koordinasi final dengan semua vendor.</p>
                            </div>
                        </div>
                    </div>

                    {{-- 1 Week Before --}}
                    <div data-aos="fade-left" class="relative flex items-center md:flex-row-reverse">
                        <div class="flex-shrink-0 w-16 h-16 bg-[--color-primary] rounded-full flex items-center justify-center text-white font-bold z-10 md:ml-8">
                            1W
                        </div>
                        <div class="ml-8 md:ml-0 md:w-1/2 md:pl-8">
                            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg">
                                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-2">Final Check</h3>
                                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Rehearsal, final meeting dengan vendor, dan persiapan emergency kit untuk mengantisipasi hal tak terduga.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Wedding Day --}}
                    <div data-aos="zoom-in" class="relative flex items-center justify-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-pink-500 to-rose-500 rounded-full flex items-center justify-center text-black dark:text-white font-bold text-lg z-10">
                            <x-heroicon-o-heart class="w-8 h-8" />
                        </div>
                        <div class="absolute left-24 md:left-1/2 md:transform md:translate-x-8 w-64">
                            <div class="bg-gradient-to-br from-pink-500 to-rose-500 text-black dark:text-white rounded-2xl p-6 shadow-lg">
                                <h3 class="text-xl font-bold edu-vic-wa-nt-hand mb-2">Hari Bahagia Anda!</h3>
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