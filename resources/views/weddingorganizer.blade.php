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
    <div class="bg-white dark:bg-gray-800 px-10 md:px-16 lg:px-24 xl:px-32 py-20">
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
                    <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="Wedding Planning" class="rounded-2xl shadow-xl">
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
                            {{-- Rumahan A --}}
                            <div data-aos="fade-up" class="border-[1px] dark:backdrop-blur-[10px] bg-gray-100 dark:bg-gray-100/10 rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-home class="w-6 h-6 text-black dark:text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-[#B2110E]">Rp 20.000.000</div>
                                        <div class="text-gray-600 darK:text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-2">Rumahan C</h4>
                                <p class="text-gray-700 dark:text-white/70 text-sm mb-4">Kapasitas 200-250 tamu</p>
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

                            {{-- Rumahan D --}}
                            <div data-aos="fade-up" data-aos-delay="300" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-home class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-emerald-300">Rp 32.000.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Rumahan D</h4>
                                <p class="text-white/70 text-sm mb-4">Kapasitas 250-300 tamu</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-emerald-300" />
                                        <span>Premium decoration</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-emerald-300" />
                                        <span>Professional lighting</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-emerald-300" />
                                        <span>VIP area setup</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Gedung Tab --}}
                    <div x-show="activeTab === 'gedung'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                            {{-- Gedung Wisata Indoor --}}
                            <div data-aos="fade-up" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office-2 class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-purple-300">Rp 13.000.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Gedung Wisata Indoor</h4>
                                <p class="text-white/70 text-sm mb-4">Kapasitas 200-300 tamu</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>AC & sound system</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Stage & backdrop</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Parking area</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Gedung Bandara --}}
                            <div data-aos="fade-up" data-aos-delay="100" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office-2 class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-purple-300">Rp 38.000.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Gedung Bandara</h4>
                                <p class="text-white/70 text-sm mb-4">Kapasitas 400-500 tamu</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Premium facilities</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Strategic location</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Large parking space</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Gedung Serbaguna --}}
                            <div data-aos="fade-up" data-aos-delay="200" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office-2 class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-purple-300">Rp 38.000.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Gedung Serbaguna</h4>
                                <p class="text-white/70 text-sm mb-4">Kapasitas 350-450 tamu</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Multi-purpose hall</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Modern facilities</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Full equipment</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Additional Gedung Options --}}
                            <div data-aos="fade-up" data-aos-delay="300" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office-2 class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-purple-300">Rp 40.000.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Gedung Sri Kuta</h4>
                                <p class="text-white/70 text-sm mb-4">Kapasitas 400-500 tamu</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Luxury interior</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Premium location</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Complete facilities</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Gedung KPKNL --}}
                            <div data-aos="fade-up" data-aos-delay="400" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office-2 class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-purple-300">Rp 41.000.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Gedung KPKNL</h4>
                                <p class="text-white/70 text-sm mb-4">Kapasitas 450-550 tamu</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Government facility</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Professional setup</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Security included</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Gedung Sandra Utama --}}
                            <div data-aos="fade-up" data-aos-delay="500" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office-2 class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-purple-300">Rp 41.000.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Gedung Sandra Utama</h4>
                                <p class="text-white/70 text-sm mb-4">Kapasitas 400-500 tamu</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Elegant design</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Full amenities</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-purple-300" />
                                        <span>Prime location</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Hotel Tab --}}
                    <div x-show="activeTab === 'hotel'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                            {{-- Hotel TP Bulungan --}}
                            <div data-aos="fade-up" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-amber-300">Rp 28.000.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Hotel TP Bulungan</h4>
                                <p class="text-white/70 text-sm mb-4">★★★★ Ballroom Facility</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Hotel-grade service</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Professional catering</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Valet parking</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Hotel Monaco --}}
                            <div data-aos="fade-up" data-aos-delay="100" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-amber-300">Rp 29.500.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Hotel Monaco</h4>
                                <p class="text-white/70 text-sm mb-4">★★★★★ Luxury Suite</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Luxury amenities</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>5-star service</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Premium location</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Hotel Galaxy --}}
                            <div data-aos="fade-up" data-aos-delay="200" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-amber-300">Rp 30.000.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Hotel Galaxy</h4>
                                <p class="text-white/70 text-sm mb-4">★★★★ Galaxy Hall</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Modern facilities</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Spacious ballroom</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Full service</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Hotel Diamond --}}
                            <div data-aos="fade-up" data-aos-delay="300" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-amber-300">Rp 30.500.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Hotel Diamond</h4>
                                <p class="text-white/70 text-sm mb-4">★★★★★ Diamond Ballroom</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Diamond standard</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Executive service</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Premium dining</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Hotel Paradise --}}
                            <div data-aos="fade-up" data-aos-delay="400" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-amber-300">Rp 34.000.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Hotel Paradise</h4>
                                <p class="text-white/70 text-sm mb-4">★★★★ Paradise Garden</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Garden setting</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Natural ambiance</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Outdoor option</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Hotel Lotus Praya --}}
                            <div data-aos="fade-up" data-aos-delay="500" class="price-gradient rounded-2xl p-6 hover:scale-105 transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center">
                                        <x-heroicon-o-building-office class="w-6 h-6 text-white" />
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-amber-300">Rp 63.000.000</div>
                                        <div class="text-white/60 text-sm">per acara</div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-white edu-vic-wa-nt-hand mb-2">Hotel Lotus Praya</h4>
                                <p class="text-white/70 text-sm mb-4">★★★★★ Premium Resort</p>
                                <div class="space-y-2 text-sm text-white/80">
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Resort experience</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>Luxury amenities</span>
                                    </div>
                                    <div class="flex items-center">
                                        <x-heroicon-o-check class="w-4 h-4 mr-2 text-amber-300" />
                                        <span>VIP treatment</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CTA Section --}}
                <div data-aos="zoom-in" class="text-center mt-12">
                    <div class="price-gradient rounded-3xl p-12 max-w-4xl mx-auto">
                        <h3 class="text-3xl font-bold text-white edu-vic-wa-nt-hand mb-4">
                            Butuh Konsultasi Pemilihan Venue?
                        </h3>
                        <p class="text-white/80 text-lg mb-8 pt-serif-regular-italic max-w-2xl mx-auto">
                            Tim ahli kami siap membantu Anda memilih venue yang sempurna sesuai dengan budget, kapasitas, dan konsep pernikahan impian Anda
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <button class="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white px-8 py-4 rounded-2xl font-bold edu-vic-wa-nt-hand transition-all duration-300 hover:scale-105">
                                Konsultasi Venue Gratis
                            </button>
                            <button class="border-2 border-white text-white hover:bg-white hover:text-purple-900 px-8 py-4 rounded-2xl font-bold edu-vic-wa-nt-hand transition-all duration-300 hover:scale-105">
                                Download Price List
                            </button>
                        </div>
                    </div>
                </div>
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
                    <x-heroicon-o-heart class="w-8 h-8 text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Konsultasi & Perencanaan</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Diskusi mendalam tentang visi pernikahan, pemilihan vendor, dan penyusunan timeline yang detail.</p>
            </div>

            {{-- Feature 2 --}}
            <div data-aos="fade-up" data-aos-delay="100" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-4">
                    <x-heroicon-o-users class="w-8 h-8 text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Koordinasi Vendor</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Mengelola semua vendor mulai dari catering, fotografer, hingga entertainment dengan koordinasi yang rapi.</p>
            </div>

            {{-- Feature 3 --}}
            <div data-aos="fade-up" data-aos-delay="200" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-4">
                    <x-heroicon-o-sparkles class="w-8 h-8 text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Desain & Dekorasi</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Konsep dekorasi yang disesuaikan dengan tema dan preferensi Anda untuk menciptakan suasana yang magis.</p>
            </div>

            {{-- Feature 4 --}}
            <div data-aos="fade-up" data-aos-delay="300" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center mb-4">
                    <x-heroicon-o-calendar-days class="w-8 h-8 text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Manajemen Hari-H</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Pengawasan penuh selama acara berlangsung untuk memastikan semuanya berjalan sesuai rencana.</p>
            </div>

            {{-- Feature 5 --}}
            <div data-aos="fade-up" data-aos-delay="400" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-4">
                    <x-heroicon-o-document-text class="w-8 h-8 text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Administrasi & Perizinan</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Pengurusan semua dokumen dan perizinan yang diperlukan untuk kelancaran acara pernikahan.</p>
            </div>

            {{-- Feature 6 --}}
            <div data-aos="fade-up" data-aos-delay="500" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-2xl flex items-center justify-center mb-4">
                    <x-heroicon-o-gift class="w-8 h-8 text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">Paket Customizable</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Berbagai pilihan paket yang dapat disesuaikan dengan budget dan kebutuhan spesifik Anda.</p>
            </div>
        </div>
    </div>

    {{-- Gallery Section --}}
    <div class="bg-white dark:bg-gray-800 px-10 md:px-16 lg:px-24 xl:px-32 py-20">
        <div class="text-center mb-16">
            <div data-aos="zoom-in-down" class="relative edu-vic-wa-nt-hand-500 text-black dark:text-white">
                <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">Karya Terbaik Kami</div>
                <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                    PORTFOLIO
                </h2>
            </div>
            <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
                <h3 class="text-xl md:text-2xl lg:text-4xl poppins-medium text-black dark:text-white mb-4">Galeri Pernikahan yang Telah Kami Wujudkan</h3>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-2xl mx-auto">
                    Setiap pernikahan memiliki cerita unik, dan kami bangga menjadi bagian dari momen bahagia tersebut
                </p>
            </div>
        </div>

        {{-- Marquee Gallery --}}
        <div class="marquee-container mask-x-from-90% mask-x-to-100%">
            <div class="marquee-left flex space-x-6 mb-8 whitespace-nowrap">
                @for($i = 1; $i <= 6; $i++)
                    <div class="flex-shrink-0 relative group">
                        <div class="w-80 h-60 bg-[url({{ asset('storage/content/wedding0' . (($i % 5) + 1) . '.jpg') }})] bg-cover bg-center rounded-2xl shadow-lg overflow-hidden">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <div class="text-white text-center">
                                    <h4 class="text-lg font-bold edu-vic-wa-nt-hand mb-2">Pernikahan Adat</h4>
                                    <p class="text-sm pt-serif-regular">Tema Traditional Elegant</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
                {{-- Duplicate for seamless loop --}}
                @for($i = 1; $i <= 6; $i++)
                    <div class="flex-shrink-0 relative group">
                        <div class="w-80 h-60 bg-[url({{ asset('storage/content/wedding0' . (($i % 5) + 1) . '.jpg') }})] bg-cover bg-center rounded-2xl shadow-lg overflow-hidden">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <div class="text-white text-center">
                                    <h4 class="text-lg font-bold edu-vic-wa-nt-hand mb-2">Pernikahan Modern</h4>
                                    <p class="text-sm pt-serif-regular">Tema Contemporary Chic</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
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
                        <div class="w-20 h-20 bg-gradient-to-br from-pink-500 to-rose-500 rounded-full flex items-center justify-center text-white font-bold text-lg z-10">
                            <x-heroicon-o-heart class="w-8 h-8" />
                        </div>
                        <div class="absolute left-24 md:left-1/2 md:transform md:translate-x-8 w-64">
                            <div class="bg-gradient-to-br from-pink-500 to-rose-500 text-white rounded-2xl p-6 shadow-lg">
                                <h3 class="text-xl font-bold edu-vic-wa-nt-hand mb-2">Hari Bahagia Anda!</h3>
                                <p class="pt-serif-regular">Full supervision dan koordinasi untuk memastikan semuanya berjalan sempurna sesuai rencana.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- FAQ Section --}}
    <div class="bg-white dark:bg-gray-800 px-10 md:px-16 lg:px-24 xl:px-32 py-20">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-5xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand mb-4">
                Pertanyaan yang Sering Diajukan
            </h2>
            <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-2xl mx-auto">
                Temukan jawaban atas pertanyaan umum tentang layanan wedding organizer kami
            </p>
        </div>

        <div class="max-w-4xl mx-auto space-y-6">
            <div data-aos="fade-up" x-data="{ open: false }" class="bg-gray-50 dark:bg-gray-900 rounded-2xl">
                <button @click="open = !open" class="w-full px-6 py-4 text-left flex items-center justify-between">
                    <h3 class="text-lg font-bold text-black dark:text-white edu-vic-wa-nt-hand">Berapa lama waktu yang dibutuhkan untuk persiapan pernikahan?</h3>
                    <x-heroicon-o-chevron-down class="w-6 h-6 text-gray-500 transition-transform duration-200"  />
                </button>
                <div x-show="open" x-collapse class="accordion-content">
                    <div class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Idealnya, persiapan pernikahan dimulai 6-12 bulan sebelum hari H. Namun, kami juga dapat menangani pernikahan dengan waktu persiapan yang lebih singkat, mulai dari 3 bulan sebelumnya dengan koordinasi yang intensif.</p>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="100" x-data="{ open: false }" class="bg-gray-50 dark:bg-gray-900 rounded-2xl">
                <button @click="open = !open" class="w-full px-6 py-4 text-left flex items-center justify-between">
                    <h3 class="text-lg font-bold text-black dark:text-white edu-vic-wa-nt-hand">Apakah bisa custom paket sesuai budget yang dimiliki?</h3>
                    <x-heroicon-o-chevron-down class="w-6 h-6 text-gray-500 transition-transform duration-200" />
                </button>
                <div x-show="open" x-collapse class="accordion-content">
                    <div class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Tentu saja! Kami menyediakan paket yang dapat dikustomisasi sesuai dengan budget dan kebutuhan spesifik Anda. Tim kami akan membantu mengoptimalkan setiap rupiah yang Anda investasikan untuk pernikahan impian.</p>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="200" x-data="{ open: false }" class="bg-gray-50 dark:bg-gray-900 rounded-2xl">
                <button @click="open = !open" class="w-full px-6 py-4 text-left flex items-center justify-between">
                    <h3 class="text-lg font-bold text-black dark:text-white edu-vic-wa-nt-hand">Apa saja yang termasuk dalam layanan wedding organizer?</h3>
                    <x-heroicon-o-chevron-down class="w-6 h-6 text-gray-500 transition-transform duration-200" />
                </button>
                <div x-show="open" x-collapse class="accordion-content">
                    <div class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Layanan kami mencakup konsultasi dan perencanaan, koordinasi vendor, desain dekorasi, manajemen hari-H, administrasi perizinan, dan berbagai paket yang dapat disesuaikan dengan kebutuhan Anda.</p>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="300" x-data="{ open: false }" class="bg-gray-50 dark:bg-gray-900 rounded-2xl">
                <button @click="open = !open" class="w-full px-6 py-4 text-left flex items-center justify-between">
                    <h3 class="text-lg font-bold text-black dark:text-white edu-vic-wa-nt-hand">Bagaimana sistem pembayaran untuk layanan wedding organizer?</h3>
                    <x-heroicon-o-chevron-down class="w-6 h-6 text-gray-500 transition-transform duration-200"/>
                </button>
                <div x-show="open" x-collapse class="accordion-content">
                    <div class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Kami menyediakan sistem pembayaran yang fleksibel dengan cicilan bertahap. Biasanya dimulai dengan DP 30%, pembayaran kedua 40% (3 bulan sebelum acara), dan pelunasan 30% sebelum hari H. Sistem ini dapat disesuaikan dengan kondisi keuangan Anda.</p>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="400" x-data="{ open: false }" class="bg-gray-50 dark:bg-gray-900 rounded-2xl">
                <button @click="open = !open" class="w-full px-6 py-4 text-left flex items-center justify-between">
                    <h3 class="text-lg font-bold text-black dark:text-white edu-vic-wa-nt-hand">Apakah tersedia layanan untuk pernikahan dengan adat atau agama tertentu?</h3>
                    <x-heroicon-o-chevron-down class="w-6 h-6 text-gray-500 transition-transform duration-200" />
                </button>
                <div x-show="open" x-collapse class="accordion-content">
                    <div class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Ya, kami berpengalaman menangani berbagai jenis pernikahan dengan adat dan tradisi yang beragam. Tim kami akan mempelajari dan menghormati setiap detail tradisi yang Anda inginkan untuk memastikan pernikahan berjalan sesuai dengan nilai-nilai yang Anda pegang.</p>
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