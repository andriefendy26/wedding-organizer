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
    <div class="container mx-auto px-10 lg:px-30 py-8" x-data="artikelFilter()">
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
                        @click="activeCategory = 'pernikahan'"
                        :class="activeCategory === 'pernikahan' ? 'bg-[--color-primary] text-white border-[--color-primary]' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                        class="px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 poppins-regular font-medium edu-vic-wa-nt-hand tracking-wide"
                    >
                        Pernikahan
                    </button>
                    <button 
                        @click="activeCategory = 'dekorasi'"
                        :class="activeCategory === 'dekorasi' ? 'bg-[--color-primary] text-white border-[--color-primary]' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
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
        @if($artikels->count() > 0)
            @php $featuredArtikel = $artikels->first(); @endphp
            <div class="mb-12">
                <h2 class="text-3xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white">Artikel Unggulan</h2>
                <div class="relative {{ $featuredArtikel->image_url ? 'bg-cover bg-center' : 'bg-gradient-to-r from-purple-600 to-pink-600' }} rounded-2xl overflow-hidden h-96"
                     @if($featuredArtikel->image_url) style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ $featuredArtikel->image_url }}')" @endif>
                    <div class="absolute inset-0 {{ !$featuredArtikel->image_url ? 'bg-black/40' : '' }}"></div>
                    <div class="absolute inset-0 flex items-center">
                        <div class="container mx-auto px-10 lg:px-30">
                            <div class="max-w-2xl text-white">
                                @if($featuredArtikel->formatted_tags && count($featuredArtikel->formatted_tags) > 0)
                                    <span class="inline-block px-4 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm mb-4">
                                        {{ ucfirst(str_replace('-', ' ', $featuredArtikel->formatted_tags[0])) }}
                                    </span>
                                @endif
                                <h3 class="text-4xl font-bold mb-4 edu-vic-wa-nt-hand">
                                    {{ $featuredArtikel->judul }}
                                </h3>
                                <p class="text-lg pt-serif-regular-italic mb-6 opacity-90">
                                    {{ $featuredArtikel->sub_judul ?? $featuredArtikel->excerpt }}
                                </p>
                                <a href="{{ route('artikel.show', $featuredArtikel->slug) }}" class="inline-flex group hover:scale-105 transition-all duration-300 bg-white rounded-full justify-center items-center">
                                    <span class="my-2 mx-3 ml-4 pt-serif-regular text-black">
                                        Baca Selengkapnya
                                    </span>
                                    <svg class="h-10 w-10 border-2 bg-black text-white rounded-full p-2 group-hover:rotate-45 duration-300 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l9.2-9.2M17 17V7H7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Articles Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="articles-grid">
            @forelse($artikels->skip(1) as $artikel)
                <article class="artikel-card bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600"
                         data-category="{{ $artikel->formatted_tags ? implode(',', $artikel->formatted_tags) : '' }}"
                         data-title="{{ strtolower($artikel->judul) }}"
                         data-content="{{ strtolower(strip_tags($artikel->content)) }}">
                    <div class="relative h-48 {{ $artikel->image_url ? 'bg-cover bg-center' : 'bg-gradient-to-br from-blue-400 to-purple-500' }}"
                         @if($artikel->image_url) style="background-image: url('{{ $artikel->image_url }}')" @endif>
                        @if($artikel->formatted_tags && count($artikel->formatted_tags) > 0)
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">
                                    {{ ucfirst(str_replace('-', ' ', $artikel->formatted_tags[0])) }}
                                </span>
                            </div>
                        @endif
                        <div class="absolute bottom-4 right-4">
                            <span class="text-white/80 text-sm">{{ $artikel->formatted_date }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-black dark:text-white edu-vic-wa-nt-hand">
                            {{ $artikel->judul }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 pt-serif-regular">
                            {{ $artikel->sub_judul ?? Str::limit(strip_tags($artikel->content), 100) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                                    <span class="text-white text-xs font-bold">{{ substr($artikel->author, 0, 1) }}</span>
                                </div>
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $artikel->author }}</span>
                            </div>
                            <a href="{{ route('artikel.show', $artikel->slug) }}" class="text-[--color-primary] hover:underline text-sm font-medium">
                                Baca →
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-gray-500 dark:text-gray-400">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold mb-2">Belum Ada Artikel</h3>
                        <p>Artikel sedang dalam persiapan. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- No Results Message --}}
        <div id="no-results" class="hidden col-span-full text-center py-12">
            <div class="text-gray-500 dark:text-gray-400">
                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <h3 class="text-xl font-semibold mb-2">Artikel Tidak Ditemukan</h3>
                <p>Tidak ada artikel yang sesuai dengan pencarian atau filter Anda.</p>
            </div>
        </div>

        {{-- Pagination --}}
        @if($artikels->hasPages())
            <div class="flex justify-center mt-12">
                {{ $artikels->links('pagination::bootstrap-4') }}
            </div>
        @endif
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
            <form action="#" method="POST" class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
                @csrf
                <input 
                    type="email" 
                    name="email"
                    placeholder="Masukkan email Anda"
                    required
                    class="px-6 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 flex-1 focus:border-[--color-primary] focus:outline-none bg-white dark:bg-gray-800 text-black dark:text-white"
                />
                <button type="submit" class="px-8 py-3 bg-[--color-primary] text-white rounded-xl hover:scale-105 transition-transform font-medium">
                    Berlangganan
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function artikelFilter() {
        return {
            activeCategory: 'all',
            searchQuery: '',
            
            init() {
                this.$watch('activeCategory', () => this.filterArticles());
                this.$watch('searchQuery', () => this.filterArticles());
            },
            
            filterArticles() {
                const articles = document.querySelectorAll('.artikel-card');
                const noResults = document.getElementById('no-results');
                let visibleCount = 0;
                
                articles.forEach(article => {
                    const categories = article.dataset.category.toLowerCase();
                    const title = article.dataset.title;
                    const content = article.dataset.content;
                    
                    // Check category filter
                    const categoryMatch = this.activeCategory === 'all' || 
                                        categories.includes(this.activeCategory.toLowerCase());
                    
                    // Check search query
                    const searchMatch = this.searchQuery === '' ||
                                      title.includes(this.searchQuery.toLowerCase()) ||
                                      content.includes(this.searchQuery.toLowerCase());
                    
                    if (categoryMatch && searchMatch) {
                        article.style.display = 'block';
                        visibleCount++;
                    } else {
                        article.style.display = 'none';
                    }
                });
                
                // Show no results message if no articles are visible
                if (visibleCount === 0) {
                    noResults.style.display = 'block';
                } else {
                    noResults.style.display = 'none';
                }
            }
        }
    }
</script>

<style>
    /* Custom pagination styles */
    .pagination {
        @apply inline-flex items-center gap-2;
    }
    
    .pagination .page-link {
        @apply px-4 py-2 border-2 border-gray-300 dark:border-gray-600 rounded-xl hover:border-[--color-primary] transition-colors text-gray-600 dark:text-gray-300 no-underline;
    }
    
    .pagination .page-item.active .page-link {
        @apply bg-[--color-primary] text-white border-[--color-primary];
    }
    
    .pagination .page-item.disabled .page-link {
        @apply opacity-50 cursor-not-allowed;
    }
</style>
@endsection