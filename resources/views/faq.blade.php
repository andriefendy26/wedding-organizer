@extends('Layout.app')

@section('head')
    <meta charset="UTF-8" />
    <title>FAQ | 3Rasa Event Organizer Tarakan</title>
    <meta name="description" content="Temukan jawaban atas pertanyaan yang sering diajukan seputar layanan 3Rasa Event Organizer di Tarakan. Mulai dari perencanaan acara, dekorasi, hingga paket wedding." />

    <meta name="keywords" content="FAQ event organizer Tarakan, pertanyaan wedding organizer Tarakan, informasi layanan 3Rasa Event Organizer, paket pernikahan Tarakan, tanya jawab event Tarakan" />

    <meta name="author" content="3Rasa Event Organizer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.3rasaeventorganizer.com/faq" />
    <link rel="icon" type="image/png" href="{{ asset('storage/content/Logo.png') }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/faq" />
    <meta property="og:title" content="FAQ | 3Rasa Event Organizer Tarakan" />
    <meta property="og:description" content="Jawaban atas pertanyaan umum seputar layanan, paket, dan proses kerja 3Rasa Event Organizer di Tarakan." />
    <meta property="og:image" content="{{ asset('storage/content/Logo.png') }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="FAQ | 3Rasa Event Organizer Tarakan" />
    <meta name="twitter:description" content="Cari tahu informasi penting dan jawaban atas pertanyaan seputar layanan 3Rasa Event Organizer di Tarakan." />
    <meta name="twitter:image" content="{{ asset('storage/content/Logo.png') }}" />
@endsection


@section('content')
<div class="min-h-screen pt-14" x-data="faqManager()">
    {{-- Hero Section --}}
    <div class="relative h-[70vh]"
     style="background: url({{ asset('storage/content/gif01.gif') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="absolute inset-0 bg-black/80"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 data-aos="zoom-in-down" class="mb-4 text-6xl font-semibold tracking-wide edu-vic-wa-nt-hand">
                    Pertanyaan Umum
                </h1>
                <p data-aos="zoom-in-up" class="max-w-2xl mx-auto text-xl pt-serif-regular-italic">
                    Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan pernikahan dan event kami
                </p>
            </div>
        </div>
    </div>

    {{-- FAQ Content --}}
    <div class="max-w-4xl px-6 py-16 mx-auto">
        {{-- Search Bar --}}
        <div class="mb-12">
            <div class="relative">
                <input 
                    type="text" 
                    placeholder="Cari pertanyaan..." 
                    class="w-full px-6 py-4 text-black transition-colors duration-300 bg-white border-2 border-gray-200 rounded-xl dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-primary focus:outline-none"
                    x-model="searchQuery"
                    @input="filterFAQs()"
                >

            </div>
        </div>

        {{-- FAQ Categories --}}
        <div class="mb-8">
            <div class="flex flex-wrap justify-center gap-4">
                <button 
                    @click="setActiveCategory('all')" 
                    :class="activeCategory === 'all' ? 'bg-primary text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-6 py-2 transition-all duration-300 rounded-full hover:scale-105"
                >
                    Semua (<span x-text="getCategoryCount('all')"></span>)
                </button>
                <button 
                    @click="setActiveCategory('wedding')" 
                    :class="activeCategory === 'wedding' ? 'bg-primary text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-6 py-2 transition-all duration-300 rounded-full hover:scale-105"
                >
                    Pernikahan (<span x-text="getCategoryCount('wedding')"></span>)
                </button>
                <button 
                    @click="setActiveCategory('decoration')" 
                    :class="activeCategory === 'decoration' ? 'bg-primary text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-6 py-2 transition-all duration-300 rounded-full hover:scale-105"
                >
                    Dekorasi (<span x-text="getCategoryCount('decoration')"></span>)
                </button>
                <button 
                    @click="setActiveCategory('rental')" 
                    :class="activeCategory === 'rental' ? 'bg-primary text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-6 py-2 transition-all duration-300 rounded-full hover:scale-105"
                >
                    Penyewaan (<span x-text="getCategoryCount('rental')"></span>)
                </button>
                <button 
                    @click="setActiveCategory('pricing')" 
                    :class="activeCategory === 'pricing' ? 'bg-primary text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-6 py-2 transition-all duration-300 rounded-full hover:scale-105"
                >
                    Harga & Paket (<span x-text="getCategoryCount('pricing')"></span>)
                </button>
                <button 
                    @click="setActiveCategory('general')" 
                    :class="activeCategory === 'general' ? 'bg-primary text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-6 py-2 transition-all duration-300 rounded-full hover:scale-105"
                >
                    Umum (<span x-text="getCategoryCount('general')"></span>)
                </button>
            </div>
        </div>

        {{-- No Results Message --}}
        <div  x-show="filteredFAQs.length === 0" class="py-12 text-center">
            <div class="text-gray-500 dark:text-gray-400">
                <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.47-.881-6.08-2.33"></path>
                </svg>
                <p class="text-lg font-medium">Tidak ada FAQ yang ditemukan</p>
                <p class="mt-2 text-sm">Coba ubah kata kunci pencarian atau pilih kategori yang berbeda</p>
            </div>
        </div>

        {{-- FAQ Items --}}
        <div data-aos="fade-left" class="space-y-4">
            <template x-for="faq in filteredFAQs" :key="faq.id">
                <div class="overflow-hidden transition-all duration-300 bg-white border-2 border-gray-200 dark:bg-gray-700 rounded-xl dark:border-gray-600 hover:shadow-lg">
                    <button 
                        @click="toggleFAQ(faq.id)"
                        class="flex items-center justify-between w-full px-6 py-4 text-left transition-colors duration-300 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 text-xs font-medium rounded-full"
                                      :class="getCategoryStyle(faq.category)"
                                      x-text="getCategoryLabel(faq.category)"></span>
                            </div>
                            <h3 class="text-lg font-semibold text-black dark:text-white poppins-medium" 
                                x-html="highlightSearch(faq.question, searchQuery)">
                            </h3>
                        </div>
                        <svg 
                            :class="openItems[faq.id] ? 'rotate-180' : ''"
                            class="flex-shrink-0 w-6 h-6 ml-4 transition-transform duration-300 text-primary" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openItems[faq.id]" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-96"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 max-h-96"
                         x-transition:leave-end="opacity-0 max-h-0"
                         class="overflow-hidden">
                        <div class="px-6 pb-4">
                            <p class="text-gray-700 dark:text-gray-300 pt-serif-regular" 
                               x-html="highlightSearch(faq.answer, searchQuery)">
                            </p>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- Quick Actions --}}
        <div class="p-8 mt-16 text-center bg-gradient-to-r from-primary/10 to-primary/20 dark:from-gray-700 dark:to-gray-600 rounded-xl">
            <h3 class="mb-4 text-2xl font-semibold text-black dark:text-white poppins-medium">
                Masih ada pertanyaan lain?
            </h3>
            <p class="mb-6 text-gray-700 dark:text-gray-300 pt-serif-regular">
                Tim customer service kami siap membantu Anda 24/7
            </p>
            <div class="flex flex-col justify-center gap-4 sm:flex-row">
                <a href="https://wa.me/6281234567890" 
                   class="inline-flex items-center px-6 py-3 text-white transition-colors duration-300 bg-green-500 hover:bg-green-600 rounded-xl">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                    </svg>
                    WhatsApp
                </a>
                <a href="tel:+6281234567890" 
                   class="inline-flex items-center px-6 py-3 text-white transition-colors duration-300 bg-blue-500 hover:bg-blue-600 rounded-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    Telepon
                </a>
                <a href="mailto:info@3rasa.com" 
                   class="inline-flex items-center px-6 py-3 text-white transition-colors duration-300 bg-gray-500 hover:bg-gray-600 rounded-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Email
                </a>
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
        background-color: #fef08a;
        color: #854d0e;
        padding: 1px 2px;
        border-radius: 2px;
        font-weight: 600;
    }

    .dark .search-highlight {
        background-color: #fbbf24;
        color: #92400e;
    }
</style>
@endpush

@push('scripts')
<script>
    function faqManager() {
        return {
            activeCategory: 'all',
            searchQuery: '',
            openItems: {},
            
            faqs: [
                // Wedding FAQs
                {
                    id: 'wedding1',
                    category: 'wedding',
                    question: 'Berapa lama sebelumnya saya harus booking untuk pernikahan?',
                    answer: 'Kami merekomendasikan untuk melakukan booking minimal 3-6 bulan sebelum hari pernikahan. Untuk pernikahan di musim peak (Juni-September) atau hari-hari spesial, sebaiknya booking 6-12 bulan sebelumnya untuk memastikan ketersediaan layanan dan dekorasi terbaik.'
                },
                {
                    id: 'wedding2',
                    category: 'wedding',
                    question: 'Apakah 3Rasa menyediakan paket lengkap wedding organizer?',
                    answer: 'Ya, kami menyediakan paket lengkap mulai dari konsultasi awal, perencanaan konsep, dekorasi, penyewaan perlengkapan, koordinasi vendor, hingga eksekusi di hari H. Kami juga menyediakan layanan partial sesuai kebutuhan Anda.'
                },
                {
                    id: 'wedding3',
                    category: 'wedding',
                    question: 'Apakah bisa mengadakan pernikahan di venue outdoor?',
                    answer: 'Tentu saja! Kami sangat berpengalaman dalam mengatur pernikahan outdoor di berbagai lokasi seperti pantai, taman, villa, atau venue outdoor lainnya. Kami akan memastikan semua aspek teknis dan logistik tercover dengan baik.'
                },
                {
                    id: 'wedding4',
                    category: 'wedding',
                    question: 'Bagaimana proses konsultasi awal untuk pernikahan?',
                    answer: 'Konsultasi awal dilakukan secara gratis selama 1-2 jam. Kami akan membahas visi, budget, timeline, dan kebutuhan spesifik Anda. Setelah itu, kami akan menyiapkan proposal detail dengan breakdown harga dan timeline pelaksanaan.'
                },

                // Decoration FAQs
                {
                    id: 'decoration1',
                    category: 'decoration',
                    question: 'Bisakah saya melihat contoh dekorasi sebelum memutuskan?',
                    answer: 'Tentu saja! Kami memiliki portofolio lengkap dan showroom yang bisa Anda kunjungi. Kami juga akan membuat mood board dan 3D visualization untuk memberikan gambaran jelas tentang konsep dekorasi yang akan kami buat untuk acara Anda.'
                },
                {
                    id: 'decoration2',
                    category: 'decoration',
                    question: 'Apakah dekorasi bisa disesuaikan dengan tema adat tertentu?',
                    answer: 'Absolut! Kami sangat berpengalaman dalam dekorasi pernikahan adat Jawa, Sunda, Batak, Minang, dan berbagai adat lainnya. Tim kreatif kami akan memastikan setiap detail dekorasi sesuai dengan nilai-nilai tradisi yang Anda inginkan.'
                },
                {
                    id: 'decoration3',
                    category: 'decoration',
                    question: 'Berapa lama waktu yang dibutuhkan untuk setup dekorasi?',
                    answer: 'Waktu setup bervariasi tergantung kompleksitas dekorasi. Untuk dekorasi standar butuh 4-6 jam, dekorasi premium 6-8 jam, dan dekorasi custom bisa sampai 10-12 jam. Kami selalu memulai setup H-1 untuk memastikan semua siap tepat waktu.'
                },
                {
                    id: 'decoration4',
                    category: 'decoration',
                    question: 'Apakah bisa request dekorasi dengan bunga segar tertentu?',
                    answer: 'Ya, kami bisa menyediakan berbagai jenis bunga segar sesuai permintaan. Namun, ketersediaan dan harga akan tergantung pada musim dan jenis bunga yang diminta. Kami akan memberikan alternatif terbaik jika bunga yang diminta tidak tersedia.'
                },

                // Rental FAQs
                {
                    id: 'rental1',
                    category: 'rental',
                    question: 'Apa saja perlengkapan yang tersedia untuk disewa?',
                    answer: 'Kami menyediakan berbagai perlengkapan seperti: kursi tamu, meja bundar/persegi, tenda, sound system, lighting, backdrop, karpet, peralatan catering, gazebo, dan masih banyak lagi. Semua dalam kondisi terawat dan berkualitas premium.'
                },
                {
                    id: 'rental2',
                    category: 'rental',
                    question: 'Apakah ada minimum order untuk penyewaan?',
                    answer: 'Tidak ada minimum order khusus, namun untuk efisiensi biaya pengiriman, kami merekomendasikan rental dengan nilai minimal Rp 500.000. Untuk order di bawah itu, akan dikenakan biaya pengiriman tambahan.'
                },
                {
                    id: 'rental3',
                    category: 'rental',
                    question: 'Bagaimana sistem pengiriman dan penjemputan barang rental?',
                    answer: 'Kami menggunakan tim profesional untuk pengiriman dan penjemputan. Barang diantar H-1 dan dijemput H+1. Untuk area Tarakan gratis ongkir, untuk luar kota ada biaya transportasi sesuai jarak dan jumlah barang.'
                },

                // Pricing FAQs
                {
                    id: 'pricing1',
                    category: 'pricing',
                    question: 'Bagaimana sistem pembayaran dan apakah ada DP?',
                    answer: 'Sistem pembayaran kami: DP 30% saat kontrak, 40% saat H-14, dan pelunasan 30% saat H-1. Kami menerima pembayaran melalui transfer bank, cash, atau dapat disesuaikan dengan kesepakatan. DP bersifat non-refund kecuali ada force majeure.'
                },
                {
                    id: 'pricing2',
                    category: 'pricing',
                    question: 'Apakah ada diskon untuk paket lengkap atau pelanggan repeat?',
                    answer: 'Ya! Kami memberikan diskon hingga 30% untuk paket lengkap dan diskon khusus untuk pelanggan loyal. Ada juga promo seasonal dan early bird discount. Silakan konsultasi dengan tim kami untuk mendapatkan penawaran terbaik sesuai budget Anda.'
                },
                {
                    id: 'pricing3',
                    category: 'pricing',
                    question: 'Apakah harga sudah termasuk PPN dan biaya lainnya?',
                    answer: 'Harga yang kami berikan sudah all-in termasuk PPN, biaya setup, koordinasi, dan supervisi. Yang belum termasuk hanya biaya transportasi untuk area luar Tarakan dan biaya tambahan untuk permintaan khusus di luar paket.'
                },
                {
                    id: 'pricing4',
                    category: 'pricing',
                    question: 'Bagaimana kebijakan pembatalan dan refund?',
                    answer: 'Pembatalan dapat dilakukan dengan ketentuan: H-30 refund 70%, H-14 refund 50%, H-7 refund 25%, H-3 tidak ada refund. Untuk force majeure seperti bencana alam atau pandemi, akan ada kebijakan khusus yang akan kami diskusikan bersama.'
                },

                // General FAQs
                {
                    id: 'general1',
                    category: 'general',
                    question: 'Area mana saja yang dilayani oleh 3Rasa?',
                    answer: 'Kami melayani area Tarakan dan sekitarnya, termasuk Kalimantan Utara. Untuk area di luar Tarakan, akan ada additional cost untuk transportasi dan akomodasi tim. Silakan konsultasi dengan kami untuk detail coverage area.'
                },
                {
                    id: 'general2',
                    category: 'general',
                    question: 'Bagaimana jika cuaca buruk di hari acara outdoor?',
                    answer: 'Kami selalu memiliki rencana cadangan (Plan B) untuk acara outdoor. Termasuk penyediaan tenda tambahan, alternatif venue indoor, dan modifikasi dekorasi sesuai kondisi cuaca. Tim kami akan memantau cuaca H-3 dan berkoordinasi dengan Anda.'
                },
                {
                    id: 'general3',
                    category: 'general',
                    question: 'Apakah 3Rasa melayani event selain pernikahan?',
                    answer: 'Ya! Selain pernikahan, kami juga melayani berbagai event seperti ulang tahun, corporate event, grand opening, seminar, pameran, dan celebration lainnya. Tim kami berpengalaman dalam berbagai jenis acara.'
                },
                {
                    id: 'general4',
                    category: 'general',
                    question: 'Bagaimana cara menghubungi customer service 3Rasa?',
                    answer: 'Anda bisa menghubungi kami melalui WhatsApp di +62 812-3456-7890, telepon di nomor yang sama, email ke info@3rasa.com, atau datang langsung ke showroom kami. Customer service kami siap melayani Senin-Sabtu pukul 08.00-17.00.'
                },
                {
                    id: 'general5',
                    category: 'general',
                    question: 'Apakah ada garansi untuk layanan yang diberikan?',
                    answer: 'Ya, kami memberikan garansi kepuasan untuk setiap layanan. Jika ada yang tidak sesuai ekspektasi, kami akan melakukan perbaikan atau replacement tanpa biaya tambahan. Garansi berlaku selama masa event dan 24 jam setelahnya.'
                }
            ],

            get filteredFAQs() {
                let filtered = this.faqs;
                
                // Filter by category
                if (this.activeCategory !== 'all') {
                    filtered = filtered.filter(faq => faq.category === this.activeCategory);
                }
                
                // Filter by search query
                if (this.searchQuery.trim() !== '') {
                    const query = this.searchQuery.toLowerCase().trim();
                    filtered = filtered.filter(faq => 
                        faq.question.toLowerCase().includes(query) || 
                        faq.answer.toLowerCase().includes(query)
                    );
                }
                
                return filtered;
            },

            setActiveCategory(category) {
                this.activeCategory = category;
                this.searchQuery = ''; // Reset search when changing category
            },

            getCategoryCount(category) {
                if (category === 'all') {
                    return this.faqs.length;
                }
                return this.faqs.filter(faq => faq.category === category).length;
            },

            getCategoryLabel(category) {
                const labels = {
                    wedding: 'Pernikahan',
                    decoration: 'Dekorasi',
                    rental: 'Penyewaan',
                    pricing: 'Harga & Paket',
                    general: 'Umum'
                };
                return labels[category] || category;
            },

            getCategoryStyle(category) {
                const styles = {
                    wedding: 'bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-200',
                    decoration: 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200',
                    rental: 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                    pricing: 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                    general: 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200'
                };
                return styles[category] || 'bg-gray-100 text-gray-800';
            },

            toggleFAQ(id) {
                this.openItems[id] = !this.openItems[id];
            },

            filterFAQs() {
                // This method triggers reactivity for filteredFAQs
                // The actual filtering logic is in the getter
            },

            highlightSearch(text, query) {
                if (!query.trim()) return text;
                
                const regex = new RegExp(`(${query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
                return text.replace(regex, '<mark class="search-highlight">$1</mark>');
            }
        }
    }
</script>
@endpush
@endsection