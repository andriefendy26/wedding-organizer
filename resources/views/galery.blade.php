@extends('Layout.app')

@section('head')
    <meta charset="UTF-8" />
    <title>{{ __('gallery.page_title') }}</title>
    <meta name="description" content="{{ __('gallery.page_description') }}" />

    <meta name="keywords" content="{{ __('gallery.page_keywords') }}" />

    <meta name="author" content="{{ __('gallery.page_author') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.3rasaeventorganizer.com/galeri" />
    <link rel="icon" type="image/png" href="{{ asset('storage/content/Logo.png') }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/galeri" />
    <meta property="og:title" content="{{ __('gallery.og_title') }}" />
    <meta property="og:description" content="{{ __('gallery.og_description') }}" />
    <meta property="og:image" content="{{ asset('storage/content/Logo.png') }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ __('gallery.twitter_title') }}" />
    <meta name="twitter:description" content="{{ __('gallery.twitter_description') }}" />
    <meta name="twitter:image" content="{{ asset('storage/content/Logo.png') }}" />
@endsection

@section('content')
<div class="min-h-screen ">
   <div class="relative h-[70vh] overflow-hidden"
    style="background-image: url('{{ asset('storage/content/gif02.gif') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 class="mb-4 text-4xl font-semibold tracking-wide lg:text-6xl edu-vic-wa-nt-hand">
                    {{ __('gallery.hero_title') }}
                </h1>
                <p class="max-w-2xl mx-auto text-xl pt-serif-regular-italic">
                    {{ __('gallery.hero_subtitle') }}
                </p>
            </div>
        </div>
    </div>
    
    {{-- Filter Categories --}}
    <div class="container px-6 py-12 mx-auto">
        {{-- Portfolio Grid --}}
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3" id="portfolio-grid">
            
            @if($allImage->count() > 0) 
            @foreach ($allImage as $image) 
                <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
                    <div class="relative overflow-hidden shadow-lg rounded-xl">
                        <img src="{{ $image['foto_url'] }}" alt="{{ $image['nama'] }}" 
                            class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                        <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                            <div class="absolute text-white bottom-6 left-6">
                                <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ $image['nama'] }}</h3>
                                <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">{{ __('gallery.wedding_category') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            {{-- Wedding Projects --}}
            <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="{{ __('gallery.alt_wedding_adat_bugis') }}" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.wedding_adat_bugis') }}</h3>
                            <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_rina_andi') }}</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">{{ __('gallery.wedding_category') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="{{ __('gallery.alt_wedding_modern') }}" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.wedding_modern') }}</h3>
                            <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_sarah_budi') }}</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">{{ __('gallery.wedding_category') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding04.jpg') }}" alt="{{ __('gallery.alt_wedding_outdoor') }}" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.wedding_outdoor') }}</h3>
                            <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_maya_doni') }}</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">{{ __('gallery.wedding_category') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Decoration Projects --}}
            <div class="cursor-pointer portfolio-item decoration group" data-category="decoration">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="{{ __('gallery.alt_decoration_elegant') }}" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.decoration_elegant') }}</h3>
                            <p class="text-sm pt-serif-regular-italic">{{ __('gallery.theme_gold_white') }}</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs bg-purple-500 rounded-full">{{ __('gallery.decoration_category') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cursor-pointer portfolio-item decoration group" data-category="decoration">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/decoration.jpg') }}" alt="{{ __('gallery.alt_decoration_traditional') }}" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.decoration_traditional') }}</h3>
                            <p class="text-sm pt-serif-regular-italic">{{ __('gallery.theme_kalimantan') }}</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs bg-purple-500 rounded-full">{{ __('gallery.decoration_category') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Corporate Events --}}
            <div class="cursor-pointer portfolio-item corporate group" data-category="corporate">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding05.jpeg') }}" alt="{{ __('gallery.alt_corporate_meeting') }}" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.corporate_meeting') }}</h3>
                            <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_borneo_sejahtera') }}</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs bg-blue-500 rounded-full">{{ __('gallery.corporate_category') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Additional Items --}}
            <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="{{ __('gallery.alt_wedding_indoor') }}" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.wedding_indoor') }}</h3>
                            <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_lina_agus') }}</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">{{ __('gallery.wedding_category') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cursor-pointer portfolio-item decoration group" data-category="decoration">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/decoration04.png') }}" alt="{{ __('gallery.alt_decoration_minimalist') }}" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.decoration_minimalist') }}</h3>
                            <p class="text-sm pt-serif-regular-italic">{{ __('gallery.theme_modern_clean') }}</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs bg-purple-500 rounded-full">{{ __('gallery.decoration_category') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cursor-pointer portfolio-item corporate group" data-category="corporate">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="{{ __('gallery.alt_product_launch') }}" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.product_launch') }}</h3>
                            <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_tech_company') }}</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs bg-blue-500 rounded-full">{{ __('gallery.corporate_category') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        {{-- Load More Button --}}
        {{-- <div class="mt-12 text-center">
            <button class="flex items-center justify-center mx-auto transition-all duration-300 bg-gray-300 rounded-full group hover:scale-105">
                <p class="mx-3 my-2 ml-4 text-black pt-serif-regular">
                    {{ __('gallery.load_more_btn') }}
                </p>
                <x-heroicon-o-arrow-small-down class="w-10 h-10 p-1 text-white transition-all duration-300 bg-black border-2 rounded-full group-hover:rotate-180" />
            </button>
        </div> --}}
    </div>

    {{-- Statistics Section --}}
    <div class="py-16 bg-gray-100 dark:bg-gray-900">
        <div class="container px-6 mx-auto">
            <div class="grid grid-cols-2 gap-8 text-center md:grid-cols-4">
                <div class="group">
                    <h3 class="text-4xl font-bold transition-transform duration-300 text-primary edu-vic-wa-nt-hand group-hover:scale-110">{{ __('gallery.stats_couples_count') }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 pt-serif-regular">{{ __('gallery.stats_happy_couples') }}</p>
                </div>
                <div class="group">
                    <h3 class="text-4xl font-bold transition-transform duration-300 text-primary edu-vic-wa-nt-hand group-hover:scale-110">{{ __('gallery.stats_projects_count') }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 pt-serif-regular">{{ __('gallery.stats_completed_projects') }}</p>
                </div>
                <div class="group">
                    <h3 class="text-4xl font-bold transition-transform duration-300 text-primary edu-vic-wa-nt-hand group-hover:scale-110">{{ __('gallery.stats_experience_count') }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 pt-serif-regular">{{ __('gallery.stats_years_experience') }}</p>
                </div>
                <div class="group">
                    <h3 class="text-4xl font-bold transition-transform duration-300 text-primary edu-vic-wa-nt-hand group-hover:scale-110">{{ __('gallery.stats_corporate_count') }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 pt-serif-regular">{{ __('gallery.stats_corporate_events') }}</p>
                </div>
            </div>
        </div>
    </div>

</div>

@push('styles')
<style>
    .filter-btn {
        background: transparent;
        color: #666;
        font-weight: 500;
    }
    
    .filter-btn.active,
    .filter-btn:hover {
        background: var(--color-primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    .portfolio-item {
        opacity: 1;
        transform: scale(1);
        transition: all 0.3s ease;
    }
    
    .portfolio-item.hidden {
        opacity: 0;
        transform: scale(0.8);
        pointer-events: none;
    }
    
    .portfolio-grid {
        display: grid;
        gap: 2rem;
    }
    
    @media (min-width: 768px) {
        .portfolio-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (min-width: 1024px) {
        .portfolio-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const portfolioItems = document.querySelectorAll('.portfolio-item');
        
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
                
                const filterValue = this.getAttribute('data-filter');
                
                portfolioItems.forEach(item => {
                    if (filterValue === 'all') {
                        item.classList.remove('hidden');
                    } else {
                        if (item.getAttribute('data-category') === filterValue) {
                            item.classList.remove('hidden');
                        } else {
                            item.classList.add('hidden');
                        }
                    }
                });
            });
        });
        
        // Portfolio item click handler (untuk modal atau detail page)
        portfolioItems.forEach(item => {
            item.addEventListener('click', function() {
                // Anda bisa menambahkan logic untuk membuka modal atau redirect ke detail page
                console.log('Portfolio item clicked:', this.querySelector('h3').textContent);
            });
        });
        
    });
</script>
@endpush
@endsection