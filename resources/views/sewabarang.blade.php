@extends('Layout.app')

@section('title', 'Detail Layanan Penyewaan')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen pt-20">
    {{-- Hero Section --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-purple-50 to-pink-50 dark:from-gray-900 dark:to-gray-800 py-20">
        <div class="absolute top-10 right-10 w-32 h-32 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full opacity-20 floating-3d"></div>
        <div class="absolute bottom-10 left-10 w-24 h-24 bg-gradient-to-r from-blue-500 to-green-500 rounded-full opacity-20 floating-3d"></div>
        
        <div class="container mx-auto px-30">
            <div class="text-center mb-16">
                <span class="inline-block px-6 py-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-full text-sm mb-6 edu-vic-wa-nt-hand">
                    🎪 Penyewaan Premium
                </span>
                <h1 class="text-5xl lg:text-7xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white tracking-wide">
                    Layanan Penyewaan
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 pt-serif-regular-italic max-w-3xl mx-auto">
                    Wujudkan pernikahan impian Anda dengan koleksi perlengkapan premium berkualitas tinggi dari 3Rasa
                </p>
            </div>
        </div>
    </div>

    {{-- Service Categories Section --}}
    <div class="container mx-auto px-30 py-16" x-data="{ activeCategory: 'furniture' }">
        {{-- Category Filter --}}
        <div class="text-center mb-12">
            <h2 class="text-4xl font-semibold mb-8 edu-vic-wa-nt-hand text-black dark:text-white">
                Kategori Penyewaan
            </h2>
            <div class="flex flex-wrap justify-center gap-4">
                <button 
                    @click="activeCategory = 'furniture'"
                    :class="activeCategory === 'furniture' ? 'bg-[--color-primary] text-white border-[--color-primary]' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                    class="px-8 py-3 rounded-xl transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand tracking-wide font-medium"
                >
                    Furniture & Kursi
                </button>
                <button 
                    @click="activeCategory = 'decoration'"
                    :class="activeCategory === 'decoration' ? 'bg-[--color-primary] text-white border-[--color-primary]' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                    class="px-8 py-3 rounded-xl transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand tracking-wide font-medium"
                >
                    Dekorasi & Backdrop
                </button>
                <button 
                    @click="activeCategory = 'lighting'"
                    :class="activeCategory === 'lighting' ? 'bg-[--color-primary] text-white border-[--color-primary]' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                    class="px-8 py-3 rounded-xl transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand tracking-wide font-medium"
                >
                    Lighting & Sound
                </button>
                <button 
                    @click="activeCategory = 'tableware'"
                    :class="activeCategory === 'tableware' ? 'bg-[--color-primary] text-white border-[--color-primary]' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                    class="px-8 py-3 rounded-xl transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand tracking-wide font-medium"
                >
                    Peralatan Makan
                </button>
            </div>
        </div>

        {{-- Furniture Category --}}
        <div x-show="activeCategory === 'furniture'" class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-16">
            {{-- Featured Item --}}
            <div class="lg:col-span-2">
                <div class="bg-gradient-to-br from-purple-100 to-pink-100 dark:from-gray-700 dark:to-gray-600 rounded-3xl p-8 h-full relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-full -translate-y-32 translate-x-32"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-start justify-between mb-8">
                            <div>
                                <span class="inline-block px-4 py-1 bg-white/50 backdrop-blur-sm rounded-full text-sm text-purple-700 dark:text-purple-300 mb-4">
                                    Premium Collection
                                </span>
                                <h3 class="text-4xl font-semibold mb-4 edu-vic-wa-nt-hand text-black dark:text-white">
                                    Sofa Premium Set
                                </h3>
                                <p class="text-gray-700 dark:text-gray-300 pt-serif-regular mb-6">
                                    Set sofa premium berbahan kulit sintetis berkualitas tinggi dengan rangka kayu solid. 
                                    Tersedia dalam berbagai warna elegan yang cocok untuk pernikahan indoor maupun outdoor.
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="space-y-2">
                                <div class="text-3xl font-bold price-highlight edu-vic-wa-nt-hand">Rp 350.000</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">per hari (set lengkap)</div>
                            </div>
                            <button class="flex group hover:scale-105 transition-all duration-300 bg-white dark:bg-gray-800 rounded-full justify-center items-center shadow-lg">
                                <span class="my-2 mx-3 ml-4 pt-serif-regular text-black dark:text-white">
                                    Pesan Sekarang
                                </span>
                                <x-heroicon-o-arrow-small-up class="h-10 w-10 border-2 bg-[--color-primary] text-white rounded-full p-1 group-hover:rotate-45 duration-300 transition-all" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3D Product Showcase --}}
            <div class="bg-white dark:bg-gray-700 rounded-3xl p-8 shadow-xl border border-gray-200 dark:border-gray-600">
                <div class="text-center mb-6">
                    <h4 class="text-xl font-semibold edu-vic-wa-nt-hand text-black dark:text-white mb-2">
                        Lihat Produk 3D
                    </h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400 pt-serif-regular">
                        Putar untuk melihat detail
                    </p>
                </div>
                
                {{-- 3D Product Image --}}
                <div class="relative h-64 mb-6 flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-600 dark:to-gray-500 rounded-2xl overflow-hidden">
                    <img src="{{ asset('storage/content/3d/sofa-3d.png') }}" 
                         alt="Sofa 3D" 
                         class="w-48 h-48 object-contain floating-3d filter drop-shadow-2xl">
                </div>
                
                {{-- Product Details --}}
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Material:</span>
                        <span class="text-sm font-medium text-black dark:text-white">Kulit Sintetis Premium</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Kapasitas:</span>
                        <span class="text-sm font-medium text-black dark:text-white">3-4 Orang</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Dimensi:</span>
                        <span class="text-sm font-medium text-black dark:text-white">200 x 90 x 85 cm</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Warna:</span>
                        <div class="flex gap-2">
                            <div class="w-4 h-4 bg-gray-800 rounded-full"></div>
                            <div class="w-4 h-4 bg-white border rounded-full"></div>
                            <div class="w-4 h-4 bg-amber-700 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Other Categories Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            {{-- Kursi Tiffany --}}
            <div class="service-card bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                <div class="relative h-48 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-gray-600 dark:to-gray-500 flex items-center justify-center">
                    <img src="{{ asset('storage/content/3d/chair-tiffany-3d.png') }}" 
                         alt="Kursi Tiffany 3D" 
                         class="service-image w-32 h-32 object-contain filter drop-shadow-lg">
                </div>
                <div class="p-6">
                    <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">
                        Kursi Tiffany
                    </h4>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">
                        Kursi elegant transparan berkualitas tinggi
                    </p>
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 15.000</div>
                            <div class="text-xs text-gray-500">per unit/hari</div>
                        </div>
                        <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                            Pesan
                        </button>
                    </div>
                </div>
            </div>

            {{-- Meja Bulat --}}
            <div class="service-card bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                <div class="relative h-48 bg-gradient-to-br from-green-100 to-blue-100 dark:from-gray-600 dark:to-gray-500 flex items-center justify-center">
                    <img src="{{ asset('storage/content/3d/table-round-3d.png') }}" 
                         alt="Meja Bulat 3D" 
                         class="service-image w-32 h-32 object-contain filter drop-shadow-lg">
                </div>
                <div class="p-6">
                    <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">
                        Meja Bulat Premium
                    </h4>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">
                        Meja bulat kapasitas 8-10 orang dengan taplak
                    </p>
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 85.000</div>
                            <div class="text-xs text-gray-500">per unit/hari</div>
                        </div>
                        <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                            Pesan
                        </button>
                    </div>
                </div>
            </div>

            {{-- Backdrop Elegant --}}
            <div class="service-card bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                <div class="relative h-48 bg-gradient-to-br from-pink-100 to-purple-100 dark:from-gray-600 dark:to-gray-500 flex items-center justify-center">
                    <img src="{{ asset('storage/content/3d/backdrop-3d.png') }}" 
                         alt="Backdrop 3D" 
                         class="service-image w-32 h-32 object-contain filter drop-shadow-lg">
                </div>
                <div class="p-6">
                    <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">
                        Backdrop Elegant
                    </h4>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">
                        Backdrop premium dengan dekorasi bunga
                    </p>
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 450.000</div>
                            <div class="text-xs text-gray-500">per set/hari</div>
                        </div>
                        <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                            Pesan
                        </button>
                    </div>
                </div>
            </div>

            {{-- Lighting Set --}}
            <div class="service-card bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                <div class="relative h-48 bg-gradient-to-br from-yellow-100 to-orange-100 dark:from-gray-600 dark:to-gray-500 flex items-center justify-center">
                    <img src="{{ asset('storage/content/3d/lighting-3d.png') }}" 
                         alt="Lighting 3D" 
                         class="service-image w-32 h-32 object-contain filter drop-shadow-lg">
                </div>
                <div class="p-6">
                    <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">
                        Lighting Premium
                    </h4>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">
                        Set lampu hias LED dengan berbagai mode
                    </p>
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 280.000</div>
                            <div class="text-xs text-gray-500">per set/hari</div>
                        </div>
                        <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                            Pesan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Service Features --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
            <div class="text-center p-8 bg-gradient-to-br from-purple-50 to-pink-50 dark:from-gray-700 dark:to-gray-600 rounded-2xl">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl">🚚</span>
                </div>
                <h4 class="text-xl font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">
                    Gratis Antar-Jemput
                </h4>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                    Layanan antar-jemput gratis untuk area Tarakan dan sekitarnya
                </p>
            </div>

            <div class="text-center p-8 bg-gradient-to-br from-blue-50 to-green-50 dark:from-gray-700 dark:to-gray-600 rounded-2xl">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl">🛠️</span>
                </div>
                <h4 class="text-xl font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">
                    Setup & Maintenance
                </h4>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                    Tim professional akan setup dan maintenance selama acara
                </p>
            </div>

            <div class="text-center p-8 bg-gradient-to-br from-yellow-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 rounded-2xl">
                <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl">⭐</span>
                </div>
                <h4 class="text-xl font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">
                    Kualitas Premium
                </h4>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                    Semua barang dalam kondisi prima dan selalu terawat
                </p>
            </div>
        </div>

        {{-- Testimonial Section --}}
        <div class="bg-gray-100 dark:bg-gray-900 rounded-3xl p-8 lg:p-12 mb-16">
            <h3 class="text-3xl font-semibold text-center mb-8 edu-vic-wa-nt-hand text-black dark:text-white">
                Apa Kata Klien Kami
            </h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold">SA</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-black dark:text-white">Sari & Andi</h4>
                            <p class="text-gray-500 text-sm">Pernikahan Adat Bugis</p>
                        </div>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 pt-serif-regular">
                        "Peralatan sangat berkualitas dan pelayanan luar biasa! Tim 3Rasa sangat profesional dalam setup dan maintenance. Pernikahan kami jadi sempurna!"
                    </p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-green-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold">RF</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-black dark:text-white">Rina & Fadil</h4>
                            <p class="text-gray-500 text-sm">Pernikahan Modern</p>
                        </div>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 pt-serif-regular">
                        "Harga terjangkau dengan kualitas premium. Semua tamu terkesan dengan dekorasi dan furniture yang disewa. Recommended banget!"
                    </p>
                </div>
            </div>
        </div>

        {{-- CTA Section --}}
        <div class="text-center bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl p-12 text-white">
            <h3 class="text-4xl font-semibold mb-4 edu-vic-wa-nt-hand">
                Siap Wujudkan Pernikahan Impian?
            </h3>
            <p class="text-xl mb-8 pt-serif-regular-italic opacity-90">
                Konsultasi gratis dengan tim ahli kami untuk mendapatkan paket terbaik
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="flex group hover:scale-105 transition-all duration-300 bg-white rounded-full justify-center items-center">
                    <span class="my-3 mx-4 ml-6 pt-serif-regular text-black">
                        WhatsApp Konsultasi
                    </span>
                    <div class="h-12 w-12 border-2 bg-green-500 text-white rounded-full p-2 group-hover:rotate-45 duration-300 transition-all flex items-center justify-center">
                        <span class="text-lg">📱</span>
                    </div>
                </button>
                <button class="border-2 border-white text-white hover:bg-white hover:text-purple-600 px-8 py-3 rounded-full transition-all duration-300 edu-vic-wa-nt-hand tracking-wide">
                    Lihat Katalog Lengkap
                </button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    :root {
        --color-primary: #d946ef;
    }
    
    .floating-3d {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }

    .service-card:hover .service-image {
        transform: scale(1.1) rotate(5deg);
    }

    .service-image {
        transition: all 0.3s ease;
    }

    .price-highlight {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .edu-vic-wa-nt-hand {
        font-family: 'Edu VIC WA NT Beginner', cursive;
    }
    
    .edu-vic-wa-nt-hand-500 {
        font-family: 'Edu VIC WA NT Beginner', cursive;
        font-weight: 500;
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
</style>
@endpush

@push('scripts')
<script>
    // Add any additional JavaScript here if needed
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any interactive elements
        console.log('Wedding Rental Detail Page Loaded');
    });
</script>
@endpush
@endsection