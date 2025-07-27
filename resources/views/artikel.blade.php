@extends('Layout.app')

@section('title', 'Artikel & Blog')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen pt-30">
    {{-- Hero Section --}}
    <div class="relative bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 py-20">
        <div class="container mx-auto px-30">
            <div class="text-center">
                <h1 class="text-6xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white tracking-wide">
                    Artikel & Inspirasi
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 pt-serif-regular-italic max-w-2xl mx-auto">
                    Temukan tips, tren terbaru, dan inspirasi untuk pernikahan dan acara impian Anda
                </p>
            </div>
        </div>
        
        {{-- Decorative elements --}}
        <div class="absolute top-10 right-10 w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full opacity-20"></div>
        <div class="absolute bottom-10 left-10 w-16 h-16 bg-gradient-to-r from-blue-500 to-green-500 rounded-full opacity-20"></div>
    </div>

    {{-- Filter & Search Section --}}
    <div class="container mx-auto px-30 py-8" x-data="{ activeCategory: 'all' }">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8 gap-6">
            {{-- Category Filter --}}
            <div class="w-full lg:w-auto">
                <h3 class="text-lg font-medium text-black dark:text-white mb-4 poppins-regular">Filter Kategori:</h3>
                <div class="flex flex-wrap gap-3">
                    <button 
                        @click="activeCategory = 'all'"
                        :class="activeCategory === 'all' ? 'bg-[--color-primary] text-white border-[--color-primary]' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                        class="px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 poppins-regular font-medium edu-vic-wa-nt-hand tracking-wide"
                    >
                        Semua Artikel
                    </button>
                    <button 
                        @click="activeCategory = 'wedding'"
                        :class="activeCategory === 'wedding' ? 'bg-[--color-primary] text-white border-[--color-primary]' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                        class="px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 poppins-regular font-medium edu-vic-wa-nt-hand tracking-wide"
                    >
                        Pernikahan
                    </button>
                    <button 
                        @click="activeCategory = 'decoration'"
                        :class="activeCategory === 'decoration' ? 'bg-[--color-primary] text-white border-[--color-primary]' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                        class="px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 poppins-regular font-medium edu-vic-wa-nt-hand tracking-wide"
                    >
                        Dekorasi
                    </button>
                    <button 
                        @click="activeCategory = 'tips'"
                        :class="activeCategory === 'tips' ? 'bg-[--color-primary] text-white border-[--color-primary]' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                        class="px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 poppins-regular font-medium edu-vic-wa-nt-hand tracking-wide"
                    >
                        Tips & Trik
                    </button>
                </div>
            </div>

            {{-- Search Box --}}
            <div class="w-full lg:w-auto">
                <h3 class="text-lg font-medium text-black dark:text-white mb-4 poppins-regular">Pencarian:</h3>
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Cari artikel..."
                        class="pl-12 pr-4 py-3 w-full lg:w-80 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-[--color-primary] focus:outline-none bg-white dark:bg-gray-700 text-black dark:text-white poppins-regular shadow-sm"
                        x-model="searchQuery"
                    />
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Featured Article --}}
        <div class="mb-12">
            <h2 class="text-3xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white">Artikel Unggulan</h2>
            <div class="relative bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl overflow-hidden h-96">
                <div class="absolute inset-0 bg-black/40"></div>
                <div class="absolute inset-0 flex items-center">
                    <div class="container mx-auto px-30">
                        <div class="max-w-2xl text-white">
                            <span class="inline-block px-4 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm mb-4">
                                Pernikahan Adat
                            </span>
                            <h3 class="text-4xl font-bold mb-4 edu-vic-wa-nt-hand">
                                Tips Memilih Dekorasi Pernikahan Adat yang Memukau
                            </h3>
                            <p class="text-lg pt-serif-regular-italic mb-6 opacity-90">
                                Panduan lengkap untuk menciptakan dekorasi pernikahan adat yang elegan dan berkesan, dengan memadukan tradisi dan sentuhan modern.
                            </p>
                            <button class="flex group hover:scale-105 transition-all duration-300 bg-white rounded-full justify-center items-center">
                                <span class="my-2 mx-3 ml-4 pt-serif-regular text-black">
                                    Baca Selengkapnya
                                </span>
                                <svg class="h-10 w-10 border-2 bg-black text-white rounded-full p-2 group-hover:rotate-45 duration-300 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l9.2-9.2M17 17V7H7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Articles Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Article Card 1 --}}
            <article class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                <div class="relative h-48 bg-gradient-to-br from-blue-400 to-purple-500">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">
                            Dekorasi
                        </span>
                    </div>
                    <div class="absolute bottom-4 right-4">
                        <span class="text-white/80 text-sm">15 Jan 2025</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-3 text-black dark:text-white edu-vic-wa-nt-hand">
                        Tren Dekorasi Pernikahan 2025: Minimalis Elegan
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 pt-serif-regular">
                        Eksplorasi tren dekorasi pernikahan terbaru yang mengusung konsep minimalis namun tetap elegan dan berkesan.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"></div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Admin 3Rasa</span>
                        </div>
                        <button class="text-[--color-primary] hover:underline text-sm font-medium">
                            Baca →
                        </button>
                    </div>
                </div>
            </article>

            {{-- Article Card 2 --}}
            <article class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                <div class="relative h-48 bg-gradient-to-br from-green-400 to-blue-500">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">
                            Tips
                        </span>
                    </div>
                    <div class="absolute bottom-4 right-4">
                        <span class="text-white/80 text-sm">12 Jan 2025</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-3 text-black dark:text-white edu-vic-wa-nt-hand">
                        5 Tips Mengatur Budget Pernikahan dengan Bijak
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 pt-serif-regular">
                        Panduan praktis untuk mengatur anggaran pernikahan agar tetap hemat tanpa mengurangi kemegahan acara.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-blue-500 rounded-full"></div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Admin 3Rasa</span>
                        </div>
                        <button class="text-[--color-primary] hover:underline text-sm font-medium">
                            Baca →
                        </button>
                    </div>
                </div>
            </article>

            {{-- Article Card 3 --}}
            <article class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                <div class="relative h-48 bg-gradient-to-br from-pink-400 to-red-500">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">
                            Pernikahan
                        </span>
                    </div>
                    <div class="absolute bottom-4 right-4">
                        <span class="text-white/80 text-sm">10 Jan 2025</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-3 text-black dark:text-white edu-vic-wa-nt-hand">
                        Memilih Venue Pernikahan Outdoor vs Indoor
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 pt-serif-regular">
                        Pertimbangan penting dalam memilih lokasi pernikahan yang tepat sesuai dengan konsep dan budget Anda.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-r from-pink-500 to-red-500 rounded-full"></div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Admin 3Rasa</span>
                        </div>
                        <button class="text-[--color-primary] hover:underline text-sm font-medium">
                            Baca →
                        </button>
                    </div>
                </div>
            </article>

            {{-- Article Card 4 --}}
            <article class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                <div class="relative h-48 bg-gradient-to-br from-yellow-400 to-orange-500">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">
                            Tips
                        </span>
                    </div>
                    <div class="absolute bottom-4 right-4">
                        <span class="text-white/80 text-sm">8 Jan 2025</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-3 text-black dark:text-white edu-vic-wa-nt-hand">
                        Checklist Lengkap Persiapan Pernikahan
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 pt-serif-regular">
                        Daftar lengkap hal-hal yang perlu dipersiapkan untuk memastikan pernikahan Anda berjalan lancar.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full"></div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Admin 3Rasa</span>
                        </div>
                        <button class="text-[--color-primary] hover:underline text-sm font-medium">
                            Baca →
                        </button>
                    </div>
                </div>
            </article>

            {{-- Article Card 5 --}}
            <article class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                <div class="relative h-48 bg-gradient-to-br from-indigo-400 to-purple-500">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">
                            Dekorasi
                        </span>
                    </div>
                    <div class="absolute bottom-4 right-4">
                        <span class="text-white/80 text-sm">5 Jan 2025</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-3 text-black dark:text-white edu-vic-wa-nt-hand">
                        Ide Kreatif Dekorasi Meja Tamu yang Menawan
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 pt-serif-regular">
                        Inspirasi dekorasi meja tamu yang unik dan menarik untuk menciptakan kesan pertama yang berkesan.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full"></div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Admin 3Rasa</span>
                        </div>
                        <button class="text-[--color-primary] hover:underline text-sm font-medium">
                            Baca →
                        </button>
                    </div>
                </div>
            </article>

            {{-- Article Card 6 --}}
            <article class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                <div class="relative h-48 bg-gradient-to-br from-teal-400 to-green-500">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">
                            Pernikahan
                        </span>
                    </div>
                    <div class="absolute bottom-4 right-4">
                        <span class="text-white/80 text-sm">3 Jan 2025</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-3 text-black dark:text-white edu-vic-wa-nt-hand">
                        Tradisi Pernikahan Adat Kalimantan yang Unik
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 pt-serif-regular">
                        Mengenal lebih dalam tradisi dan ritual pernikahan adat Kalimantan yang kaya akan makna dan keindahan.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-r from-teal-500 to-green-500 rounded-full"></div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Admin 3Rasa</span>
                        </div>
                        <button class="text-[--color-primary] hover:underline text-sm font-medium">
                            Baca →
                        </button>
                    </div>
                </div>
            </article>
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center mt-12">
            <div class="flex items-center gap-2">
                <button class="px-4 py-2 border-2 border-gray-300 dark:border-gray-600 rounded-xl hover:border-[--color-primary] transition-colors text-gray-600 dark:text-gray-300">
                    ← Sebelumnya
                </button>
                <button class="px-4 py-2 bg-[--color-primary] text-white rounded-xl">1</button>
                <button class="px-4 py-2 border-2 border-gray-300 dark:border-gray-600 rounded-xl hover:border-[--color-primary] transition-colors text-gray-600 dark:text-gray-300">2</button>
                <button class="px-4 py-2 border-2 border-gray-300 dark:border-gray-600 rounded-xl hover:border-[--color-primary] transition-colors text-gray-600 dark:text-gray-300">3</button>
                <button class="px-4 py-2 border-2 border-gray-300 dark:border-gray-600 rounded-xl hover:border-[--color-primary] transition-colors text-gray-600 dark:text-gray-300">
                    Selanjutnya →
                </button>
            </div>
        </div>
    </div>

    {{-- Newsletter Section --}}
    <div class="bg-gray-100 dark:bg-gray-900 py-16 mt-16">
        <div class="container mx-auto px-30 text-center">
            <h2 class="text-4xl font-semibold mb-4 edu-vic-wa-nt-hand text-black dark:text-white">
                Jangan Lewatkan Update Terbaru
            </h2>
            <p class="text-gray-600 dark:text-gray-300 text-lg mb-8 pt-serif-regular-italic">
                Dapatkan tips, inspirasi, dan penawaran khusus langsung di email Anda
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
                <input 
                    type="email" 
                    placeholder="Masukkan email Anda"
                    class="px-6 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 flex-1 focus:border-[--color-primary] focus:outline-none bg-white dark:bg-gray-800 text-black dark:text-white"
                />
                <button class="px-8 py-3 bg-[--color-primary] text-white rounded-xl hover:scale-105 transition-transform font-medium">
                    Berlangganan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection