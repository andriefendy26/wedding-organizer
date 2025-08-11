@extends('Layout.app')

@section('head')
    <meta charset="UTF-8" />
    <title>Artikel & Blog | 3Rasa Event Organizer Tarakan</title>
    <meta name="description" content="3Rasa Event Organizer di Tarakan siap membantu merencanakan dan mewujudkan acara impian Anda, mulai dari pernikahan, ulang tahun, hingga event korporat dengan pelayanan profesional." />

    <meta name="keywords" content="event organizer Tarakan, wedding organizer Tarakan, jasa dekorasi Tarakan, paket pernikahan Tarakan, EO profesional Tarakan, 3Rasa Event Organizer" />

    <meta name="author" content="3Rasa Event Organizer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.3rasaeventorganizer.com/" />
    <link rel="icon" type="image/png" href="{{ asset('storage/content/Logo.png') }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/" />
    <meta property="og:title" content="3Rasa Event Organizer Tarakan | Profesional & Terpercaya" />
    <meta property="og:description" content="Jadikan acara Anda berkesan bersama 3Rasa Event Organizer. Menyediakan layanan pernikahan, dekorasi, dan event profesional di Tarakan." />
    <meta property="og:image" content="{{ asset('storage/content/Logo.png') }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="3Rasa Event Organizer Tarakan | Profesional & Terpercaya" />
    <meta name="twitter:description" content="3Rasa Event Organizer di Tarakan siap membantu merencanakan dan mewujudkan acara terbaik Anda dengan pelayanan profesional." />
    <meta name="twitter:image" content="{{ asset('storage/content/Logo.png') }}" />
@endsection


@section('content')
<div class="min-h-screen pt-16 ">

    {{-- Hero Section --}}
    <div class="relative h-[60vh]  overflow-hidden"
     style="background: url({{ asset('storage/content/gif02.gif') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 data-aos="zoom-in-down" class="mb-4 text-6xl font-semibold tracking-wide edu-vic-wa-nt-hand">
                    Artikel & Inspirasi
                </h1>
                <p data-aos="zoom-in-up" class="max-w-2xl mx-auto text-xl pt-serif-regular-italic">
                    Temukan tips, tren terbaru, dan inspirasi untuk pernikahan dan acara impian Anda
                </p>
            </div>
        </div>
    </div>


    {{-- Filter & Search Section --}}
    <div class="container px-10 py-8 mx-auto lg:px-30" x-data="artikelFilter()">
        <div class="flex flex-col items-start justify-between gap-6 mb-8 lg:flex-row lg:items-center">


            {{-- Search Box --}}
            <div data-aos="zoom-in-down" class="w-full lg:w-auto">
                <h3 class="mb-4 text-lg font-medium text-black dark:text-white poppins-regular">Pencarian:</h3>
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Cari artikel..."
                        class="w-full py-3 pl-2 pr-4 text-black bg-white border-2 border-gray-300 shadow-sm lg:w-80 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                        x-model="searchQuery"
                    />
                </div>
            </div>
        </div>

        {{-- Featured Article --}}
        @if($artikels->count() > 0)
            @php $featuredArtikel = $artikels->first(); @endphp
            <div class="mb-12">
                <h2 class="mb-6 text-3xl font-semibold text-black edu-vic-wa-nt-hand dark:text-white">Artikel Unggulan</h2>
                <div class="relative {{ $featuredArtikel->image_url ? 'bg-cover bg-center' : 'bg-gradient-to-r from-purple-600 to-pink-600' }} rounded-2xl overflow-hidden h-96"
                     @if($featuredArtikel->image_url) style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ $featuredArtikel->image_url }}')" @endif>
                    <div class="absolute inset-0 {{ !$featuredArtikel->image_url ? 'bg-black/40' : '' }}"></div>
                    <div class="absolute inset-0 flex items-center">
                        <div class="container px-10 mx-auto lg:px-30">
                            <div class="max-w-2xl text-white">
                                @if($featuredArtikel->formatted_tags && count($featuredArtikel->formatted_tags) > 0)
                                    <span class="inline-block px-4 py-1 mb-4 text-sm rounded-full bg-white/20 backdrop-blur-sm">
                                        {{ ucfirst(str_replace('-', ' ', $featuredArtikel->formatted_tags[0])) }}
                                    </span>
                                @endif
                                <h3 class="mb-4 text-4xl font-bold edu-vic-wa-nt-hand">
                                    {{ $featuredArtikel->judul }}
                                </h3>
                                <p class="mb-6 text-lg pt-serif-regular-italic opacity-90">
                                    {{ $featuredArtikel->sub_judul ?? $featuredArtikel->excerpt }}
                                </p>
                                <a href="{{ route('artikel.show', $featuredArtikel->slug) }}" class="inline-flex items-center justify-center transition-all duration-300 bg-white rounded-full group hover:scale-105">
                                    <span class="mx-3 my-2 ml-4 text-black pt-serif-regular">
                                        Baca Selengkapnya
                                    </span>
                                    <svg class="w-10 h-10 p-2 text-white transition-all duration-300 bg-black border-2 rounded-full group-hover:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3" id="articles-grid">
            @forelse($artikels->skip(1) as $artikel)
                <article class="overflow-hidden transition-all duration-300 bg-white border border-gray-200 shadow-lg artikel-card dark:bg-gray-700 rounded-2xl hover:shadow-2xl hover:-translate-y-2 dark:border-gray-600"
                         data-category="{{ $artikel->formatted_tags ? implode(',', $artikel->formatted_tags) : '' }}"
                         data-title="{{ strtolower($artikel->judul) }}"
                         data-content="{{ strtolower(strip_tags($artikel->content)) }}">
                    <div class="relative h-48 {{ $artikel->image_url ? 'bg-cover bg-center' : 'bg-gradient-to-br from-blue-400 to-purple-500' }}"
                         @if($artikel->image_url) style="background-image: url('{{ $artikel->image_url }}')" @endif>
                        @if($artikel->formatted_tags && count($artikel->formatted_tags) > 0)
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 text-xs text-white rounded-full bg-white/20 backdrop-blur-sm">
                                    {{ ucfirst(str_replace('-', ' ', $artikel->formatted_tags[0])) }}
                                </span>
                            </div>
                        @endif
                        <div class="absolute bottom-4 right-4">
                            <span class="text-sm text-white/80">{{ $artikel->formatted_date }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="mb-3 text-xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand">
                            {{ $artikel->judul }}
                        </h3>
                        <p class="mb-4 text-gray-600 dark:text-gray-300 pt-serif-regular">
                            {{ $artikel->sub_judul ?? Str::limit(strip_tags($artikel->content), 100) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-pink-500">
                                    <span class="text-xs font-bold text-white">{{ substr($artikel->author, 0, 1) }}</span>
                                </div>
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $artikel->author }}</span>
                            </div>
                            <a href="{{ route('artikel.show', $artikel->slug) }}" class="text-sm font-medium text-primary hover:underline">
                                Baca →
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="py-12 text-center col-span-full">
                    <div class="text-gray-500 dark:text-gray-400">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="mb-2 text-xl font-semibold">Belum Ada Artikel</h3>
                        <p>Artikel sedang dalam persiapan. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- No Results Message --}}
        <div id="no-results" class="hidden py-12 text-center col-span-full">
            <div class="text-gray-500 dark:text-gray-400">
                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <h3 class="mb-2 text-xl font-semibold">Artikel Tidak Ditemukan</h3>
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
        @apply px-4 py-2 border-2 border-gray-300 dark:border-gray-600 rounded-xl hover:border-primary transition-colors text-gray-600 dark:text-gray-300 no-underline;
    }
    
    .pagination .page-item.active .page-link {
        @apply bg-primary text-white border-primary;
    }
    
    .pagination .page-item.disabled .page-link {
        @apply opacity-50 cursor-not-allowed;
    }
</style>
@endsection