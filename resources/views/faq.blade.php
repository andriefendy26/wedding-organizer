@extends('Layout.app')

@section('title', 'FAQ - Frequently Asked Questions')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen pt-14">
    {{-- Hero Section --}}
    <div class="relative h-96 bg-gradient-to-r from-[--color-primary]/20 to-[--color-primary]/40 dark:from-gray-700 dark:to-gray-600">
        <div class="absolute inset-0 bg-[url({{ asset('storage/content/decoration01.jpeg') }})] bg-cover bg-center opacity-20"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center">
                <h1 class="text-6xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand mb-4">
                    Frequently Asked Questions
                </h1>
                <p class="text-xl text-gray-700 dark:text-gray-300 pt-serif-regular-italic max-w-2xl mx-auto">
                    Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan pernikahan dan event kami
                </p>
            </div>
        </div>
    </div>

    {{-- FAQ Content --}}
    <div class="max-w-4xl mx-auto px-6 py-16">
        {{-- Search Bar --}}
        <div class="mb-12">
            <div class="relative">
                <input 
                    type="text" 
                    placeholder="Cari pertanyaan..." 
                    class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-black dark:text-white focus:border-[--color-primary] focus:outline-none transition-colors duration-300"
                    x-model="searchQuery"
                >
                <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- FAQ Categories --}}
        <div class="mb-8" x-data="{ activeCategory: 'all' }">
            <div class="flex flex-wrap gap-4 justify-center">
                <button 
                    @click="activeCategory = 'all'" 
                    :class="activeCategory === 'all' ? 'bg-[--color-primary] text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-6 py-2 rounded-full transition-all duration-300 hover:scale-105"
                >
                    Semua
                </button>
                <button 
                    @click="activeCategory = 'wedding'" 
                    :class="activeCategory === 'wedding' ? 'bg-[--color-primary] text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-6 py-2 rounded-full transition-all duration-300 hover:scale-105"
                >
                    Pernikahan
                </button>
                <button 
                    @click="activeCategory = 'decoration'" 
                    :class="activeCategory === 'decoration' ? 'bg-[--color-primary] text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-6 py-2 rounded-full transition-all duration-300 hover:scale-105"
                >
                    Dekorasi
                </button>
                <button 
                    @click="activeCategory = 'rental'" 
                    :class="activeCategory === 'rental' ? 'bg-[--color-primary] text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-6 py-2 rounded-full transition-all duration-300 hover:scale-105"
                >
                    Penyewaan
                </button>
                <button 
                    @click="activeCategory = 'pricing'" 
                    :class="activeCategory === 'pricing' ? 'bg-[--color-primary] text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-6 py-2 rounded-full transition-all duration-300 hover:scale-105"
                >
                    Harga & Paket
                </button>
            </div>
        </div>

        {{-- FAQ Items --}}
        <div class="space-y-4" x-data="{ openItems: {} }">
            {{-- Wedding FAQs --}}
            <div class="bg-white dark:bg-gray-700 rounded-xl border-2 border-gray-200 dark:border-gray-600 overflow-hidden">
                <button 
                    @click="openItems.wedding1 = !openItems.wedding1"
                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300"
                >
                    <h3 class="text-lg font-semibold text-black dark:text-white poppins-medium">
                        Berapa lama sebelumnya saya harus booking untuk pernikahan?
                    </h3>
                    <svg 
                        :class="openItems.wedding1 ? 'rotate-180' : ''"
                        class="w-6 h-6 text-[--color-primary] transition-transform duration-300" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItems.wedding1" x-transition class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 pt-serif-regular">
                        Kami merekomendasikan untuk melakukan booking minimal 3-6 bulan sebelum hari pernikahan. Untuk pernikahan di musim peak (Juni-September) atau hari-hari spesial, sebaiknya booking 6-12 bulan sebelumnya untuk memastikan ketersediaan layanan dan dekorasi terbaik.
                    </p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-700 rounded-xl border-2 border-gray-200 dark:border-gray-600 overflow-hidden">
                <button 
                    @click="openItems.wedding2 = !openItems.wedding2"
                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300"
                >
                    <h3 class="text-lg font-semibold text-black dark:text-white poppins-medium">
                        Apakah 3Rasa menyediakan paket lengkap wedding organizer?
                    </h3>
                    <svg 
                        :class="openItems.wedding2 ? 'rotate-180' : ''"
                        class="w-6 h-6 text-[--color-primary] transition-transform duration-300" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItems.wedding2" x-transition class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 pt-serif-regular">
                        Ya, kami menyediakan paket lengkap mulai dari konsultasi awal, perencanaan konsep, dekorasi, penyewaan perlengkapan, koordinasi vendor, hingga eksekusi di hari H. Kami juga menyediakan layanan partial sesuai kebutuhan Anda.
                    </p>
                </div>
            </div>

            {{-- Decoration FAQs --}}
            <div class="bg-white dark:bg-gray-700 rounded-xl border-2 border-gray-200 dark:border-gray-600 overflow-hidden">
                <button 
                    @click="openItems.decoration1 = !openItems.decoration1"
                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300"
                >
                    <h3 class="text-lg font-semibold text-black dark:text-white poppins-medium">
                        Bisakah saya melihat contoh dekorasi sebelum memutuskan?
                    </h3>
                    <svg 
                        :class="openItems.decoration1 ? 'rotate-180' : ''"
                        class="w-6 h-6 text-[--color-primary] transition-transform duration-300" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItems.decoration1" x-transition class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 pt-serif-regular">
                        Tentu saja! Kami memiliki portofolio lengkap dan showroom yang bisa Anda kunjungi. Kami juga akan membuat mood board dan 3D visualization untuk memberikan gambaran jelas tentang konsep dekorasi yang akan kami buat untuk acara Anda.
                    </p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-700 rounded-xl border-2 border-gray-200 dark:border-gray-600 overflow-hidden">
                <button 
                    @click="openItems.decoration2 = !openItems.decoration2"
                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300"
                >
                    <h3 class="text-lg font-semibold text-black dark:text-white poppins-medium">
                        Apakah dekorasi bisa disesuaikan dengan tema adat tertentu?
                    </h3>
                    <svg 
                        :class="openItems.decoration2 ? 'rotate-180' : ''"
                        class="w-6 h-6 text-[--color-primary] transition-transform duration-300" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItems.decoration2" x-transition class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 pt-serif-regular">
                        Absolut! Kami sangat berpengalaman dalam dekorasi pernikahan adat Jawa, Sunda, Batak, Minang, dan berbagai adat lainnya. Tim kreatif kami akan memastikan setiap detail dekorasi sesuai dengan nilai-nilai tradisi yang Anda inginkan.
                    </p>
                </div>
            </div>

            {{-- Rental FAQs --}}
            <div class="bg-white dark:bg-gray-700 rounded-xl border-2 border-gray-200 dark:border-gray-600 overflow-hidden">
                <button 
                    @click="openItems.rental1 = !openItems.rental1"
                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300"
                >
                    <h3 class="text-lg font-semibold text-black dark:text-white poppins-medium">
                        Apa saja perlengkapan yang tersedia untuk disewa?
                    </h3>
                    <svg 
                        :class="openItems.rental1 ? 'rotate-180' : ''"
                        class="w-6 h-6 text-[--color-primary] transition-transform duration-300" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItems.rental1" x-transition class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 pt-serif-regular">
                        Kami menyediakan berbagai perlengkapan seperti: kursi tamu, meja bundar/persegi, tenda, sound system, lighting, backdrop, karpet, peralatan catering, gazebo, dan masih banyak lagi. Semua dalam kondisi terawat dan berkualitas premium.
                    </p>
                </div>
            </div>

            {{-- Pricing FAQs --}}
            <div class="bg-white dark:bg-gray-700 rounded-xl border-2 border-gray-200 dark:border-gray-600 overflow-hidden">
                <button 
                    @click="openItems.pricing1 = !openItems.pricing1"
                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300"
                >
                    <h3 class="text-lg font-semibold text-black dark:text-white poppins-medium">
                        Bagaimana sistem pembayaran dan apakah ada DP?
                    </h3>
                    <svg 
                        :class="openItems.pricing1 ? 'rotate-180' : ''"
                        class="w-6 h-6 text-[--color-primary] transition-transform duration-300" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItems.pricing1" x-transition class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 pt-serif-regular">
                        Sistem pembayaran kami: DP 30% saat kontrak, 40% saat H-14, dan pelunasan 30% saat H-1. Kami menerima pembayaran melalui transfer bank, cash, atau dapat disesuaikan dengan kesepakatan. DP bersifat non-refund kecuali ada force majeure.
                    </p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-700 rounded-xl border-2 border-gray-200 dark:border-gray-600 overflow-hidden">
                <button 
                    @click="openItems.pricing2 = !openItems.pricing2"
                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300"
                >
                    <h3 class="text-lg font-semibold text-black dark:text-white poppins-medium">
                        Apakah ada diskon untuk paket lengkap atau pelanggan repeat?
                    </h3>
                    <svg 
                        :class="openItems.pricing2 ? 'rotate-180' : ''"
                        class="w-6 h-6 text-[--color-primary] transition-transform duration-300" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItems.pricing2" x-transition class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 pt-serif-regular">
                        Ya! Kami memberikan diskon hingga 30% untuk paket lengkap dan diskon khusus untuk pelanggan loyal. Ada juga promo seasonal dan early bird discount. Silakan konsultasi dengan tim kami untuk mendapatkan penawaran terbaik sesuai budget Anda.
                    </p>
                </div>
            </div>

            {{-- Additional FAQs --}}
            <div class="bg-white dark:bg-gray-700 rounded-xl border-2 border-gray-200 dark:border-gray-600 overflow-hidden">
                <button 
                    @click="openItems.additional1 = !openItems.additional1"
                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300"
                >
                    <h3 class="text-lg font-semibold text-black dark:text-white poppins-medium">
                        Area mana saja yang dilayani oleh 3Rasa?
                    </h3>
                    <svg 
                        :class="openItems.additional1 ? 'rotate-180' : ''"
                        class="w-6 h-6 text-[--color-primary] transition-transform duration-300" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItems.additional1" x-transition class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 pt-serif-regular">
                        Kami melayani area Tarakan dan sekitarnya, termasuk Kalimantan Utara. Untuk area di luar Tarakan, akan ada additional cost untuk transportasi dan akomodasi tim. Silakan konsultasi dengan kami untuk detail coverage area.
                    </p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-700 rounded-xl border-2 border-gray-200 dark:border-gray-600 overflow-hidden">
                <button 
                    @click="openItems.additional2 = !openItems.additional2"
                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300"
                >
                    <h3 class="text-lg font-semibold text-black dark:text-white poppins-medium">
                        Bagaimana jika cuaca buruk di hari acara outdoor?
                    </h3>
                    <svg 
                        :class="openItems.additional2 ? 'rotate-180' : ''"
                        class="w-6 h-6 text-[--color-primary] transition-transform duration-300" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItems.additional2" x-transition class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 pt-serif-regular">
                        Kami selalu memiliki rencana cadangan (Plan B) untuk acara outdoor. Termasuk penyediaan tenda tambahan, alternatif venue indoor, dan modifikasi dekorasi sesuai kondisi cuaca. Tim kami akan memantau cuaca H-3 dan berkoordinasi dengan Anda.
                    </p>
                </div>
            </div>
        </div>

        {{-- Contact Section --}}
        <div class="mt-16 bg-gray-100 dark:bg-gray-700 rounded-2xl p-8 text-center">
            <h3 class="text-3xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand mb-4">
                Masih Ada Pertanyaan?
            </h3>
            <p class="text-gray-700 dark:text-gray-300 pt-serif-regular mb-8 max-w-2xl mx-auto">
                Tim customer service kami siap membantu Anda 24/7. Jangan ragu untuk menghubungi kami kapan saja untuk konsultasi gratis!
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <button class="flex group hover:scale-105 transition-all duration-300 bg-[--color-primary] text-white rounded-full justify-center items-center">
                    <p class="my-3 mx-4 ml-6 pt-serif-regular">
                        Hubungi Kami
                    </p>
                    <div class="h-10 w-10 border-2 bg-white text-[--color-primary] rounded-full p-1 group-hover:rotate-45 duration-300 transition-all flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l4-4 4 4m0 6l-4-4-4 4"></path>
                        </svg>
                    </div>
                </button>
                <button class="flex group hover:scale-105 transition-all duration-300 bg-white dark:bg-gray-600 border-2 border-[--color-primary] text-[--color-primary] dark:text-white rounded-full justify-center items-center">
                    <p class="my-3 mx-4 ml-6 pt-serif-regular">
                        WhatsApp Chat
                    </p>
                    <div class="h-10 w-10 border-2 bg-[--color-primary] text-white rounded-full p-1 group-hover:rotate-45 duration-300 transition-all flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    [x-cloak] { display: none !important; }
    
    .pt-serif-regular {
        font-family: "PT Serif", serif;
        font-weight: 400;
        font-style: normal;
    }
    
    .pt-serif-regular-italic {
        font-family: "PT Serif", serif;
        font-weight: 400;
        font-style: italic;
    }
    
    .edu-vic-wa-nt-hand {
        font-family: "Edu VIC WA NT Beginner", cursive;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
    }
    
    .poppins-medium {
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
    }

    .search-highlight {
        background-color: yellow;
        font-weight: bold;
    }
</style>
@endpush

@push('scripts')
<script>
    // Simple search functionality
    document.addEventListener('alpine:init', () => {
        Alpine.data('faqSearch', () => ({
            searchQuery: '',
            
            init() {
                this.$watch('searchQuery', (value) => {
                    this.filterFAQs(value);
                });
            },
            
            filterFAQs(query) {
                const faqItems = document.querySelectorAll('.bg-white.dark\\:bg-gray-700');
                
                faqItems.forEach(item => {
                    const question = item.querySelector('h3').textContent.toLowerCase();
                    const answer = item.querySelector('p') ? item.querySelector('p').textContent.toLowerCase() : '';
                    
                    if (query === '' || question.includes(query.toLowerCase()) || answer.includes(query.toLowerCase())) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
        }));
    });
</script>
@endpush
@endsection