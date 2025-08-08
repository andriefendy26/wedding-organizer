@extends('Layout.app')

@section('title', 'Portfolio')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen">
   <div class="relative h-[70vh] bg-[url({{ asset('storage/content/gif02.gif') }})] bg-cover bg-center rounded-b-[150px] overflow-hidden">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 class="text-6xl font-semibold mb-4 edu-vic-wa-nt-hand tracking-wide">
                    Galery Kami
                </h1>
                <p class="text-xl pt-serif-regular-italic max-w-2xl mx-auto">
                    Koleksi momen indah yang telah kami wujudkan bersama pasangan-pasangan bahagia
                </p>
                </p>
            </div>
        </div>
    </div>
    {{-- Filter Categories --}}
    <div class="container mx-auto px-6 py-12">
        {{-- Portfolio Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            
            @if($allImage->count() > 0) 
            @foreach ($allImage as $image) 
                {{-- @dd($image['foto']);    --}}
                <div class="portfolio-item wedding group cursor-pointer" data-category="wedding">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="{{ $image['foto_url'] }}" alt="Pernikahan Adat Bugis" 
                            class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-6 left-6 text-white">
                                <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ $image['nama'] }}</h3>
                                {{-- <p class="text-sm pt-serif-regular-italic">Rina & Andi - Tarakan</p> --}}
                                <span class="inline-block mt-2 px-3 py-1 bg-[--color-primary] rounded-full text-xs">Pernikahan</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            {{-- Wedding Projects --}}
            <div class="portfolio-item wedding group cursor-pointer" data-category="wedding">
                <div class="relative overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="Pernikahan Adat Bugis" 
                         class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Pernikahan Adat Bugis</h3>
                            <p class="text-sm pt-serif-regular-italic">Rina & Andi - Tarakan</p>
                            <span class="inline-block mt-2 px-3 py-1 bg-[--color-primary] rounded-full text-xs">Pernikahan</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio-item wedding group cursor-pointer" data-category="wedding">
                <div class="relative overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="Pernikahan Modern" 
                         class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Pernikahan Modern</h3>
                            <p class="text-sm pt-serif-regular-italic">Sarah & Budi - Balikpapan</p>
                            <span class="inline-block mt-2 px-3 py-1 bg-[--color-primary] rounded-full text-xs">Pernikahan</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio-item wedding group cursor-pointer" data-category="wedding">
                <div class="relative overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('storage/content/wedding04.jpg') }}" alt="Pernikahan Outdoor" 
                         class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Pernikahan Outdoor</h3>
                            <p class="text-sm pt-serif-regular-italic">Maya & Doni - Tarakan</p>
                            <span class="inline-block mt-2 px-3 py-1 bg-[--color-primary] rounded-full text-xs">Pernikahan</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Decoration Projects --}}
            <div class="portfolio-item decoration group cursor-pointer" data-category="decoration">
                <div class="relative overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Dekorasi Elegant" 
                         class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Dekorasi Elegant</h3>
                            <p class="text-sm pt-serif-regular-italic">Tema Gold & White</p>
                            <span class="inline-block mt-2 px-3 py-1 bg-purple-500 rounded-full text-xs">Dekorasi</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio-item decoration group cursor-pointer" data-category="decoration">
                <div class="relative overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Dekorasi Tradisional" 
                         class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Dekorasi Tradisional</h3>
                            <p class="text-sm pt-serif-regular-italic">Adat Kalimantan</p>
                            <span class="inline-block mt-2 px-3 py-1 bg-purple-500 rounded-full text-xs">Dekorasi</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Corporate Events --}}
            <div class="portfolio-item corporate group cursor-pointer" data-category="corporate">
                <div class="relative overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('storage/content/wedding05.jpeg') }}" alt="Corporate Event" 
                         class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Corporate Meeting</h3>
                            <p class="text-sm pt-serif-regular-italic">PT. Borneo Sejahtera</p>
                            <span class="inline-block mt-2 px-3 py-1 bg-blue-500 rounded-full text-xs">Corporate</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Additional Items --}}
            <div class="portfolio-item wedding group cursor-pointer" data-category="wedding">
                <div class="relative overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="Pernikahan Indoor" 
                         class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Pernikahan Indoor</h3>
                            <p class="text-sm pt-serif-regular-italic">Lina & Agus - Samarinda</p>
                            <span class="inline-block mt-2 px-3 py-1 bg-[--color-primary] rounded-full text-xs">Pernikahan</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio-item decoration group cursor-pointer" data-category="decoration">
                <div class="relative overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('storage/content/decoration04.png') }}" alt="Dekorasi Minimalis" 
                         class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Dekorasi Minimalis</h3>
                            <p class="text-sm pt-serif-regular-italic">Modern & Clean</p>
                            <span class="inline-block mt-2 px-3 py-1 bg-purple-500 rounded-full text-xs">Dekorasi</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio-item corporate group cursor-pointer" data-category="corporate">
                <div class="relative overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="Product Launch" 
                         class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Product Launch</h3>
                            <p class="text-sm pt-serif-regular-italic">Tech Company</p>
                            <span class="inline-block mt-2 px-3 py-1 bg-blue-500 rounded-full text-xs">Corporate</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        {{-- Load More Button --}}
        <div class="text-center mt-12">
            <button class="flex mx-auto group hover:scale-105 transition-all duration-300 bg-gray-300 rounded-full justify-center items-center">
                <p class="my-2 mx-3 ml-4 pt-serif-regular text-black">
                    Lihat Lebih Banyak
                </p>
                <x-heroicon-o-arrow-small-down class="h-10 w-10 border-2 bg-black text-white rounded-full p-1 group-hover:rotate-180 duration-300 transition-all" />
            </button>
        </div>
    </div>

    {{-- Statistics Section --}}
    <div class="bg-gray-100 dark:bg-gray-900 py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="group">
                    <h3 class="text-4xl font-bold text-[--color-primary] edu-vic-wa-nt-hand group-hover:scale-110 transition-transform duration-300">100+</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 pt-serif-regular">Pasangan Bahagia</p>
                </div>
                <div class="group">
                    <h3 class="text-4xl font-bold text-[--color-primary] edu-vic-wa-nt-hand group-hover:scale-110 transition-transform duration-300">200+</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 pt-serif-regular">Proyek Selesai</p>
                </div>
                <div class="group">
                    <h3 class="text-4xl font-bold text-[--color-primary] edu-vic-wa-nt-hand group-hover:scale-110 transition-transform duration-300">5+</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 pt-serif-regular">Tahun Pengalaman</p>
                </div>
                <div class="group">
                    <h3 class="text-4xl font-bold text-[--color-primary] edu-vic-wa-nt-hand group-hover:scale-110 transition-transform duration-300">50+</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 pt-serif-regular">Event Corporate</p>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA Section --}}
    <div class="py-16 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white">
                Siap Mewujudkan Acara Impian Anda?
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-400 mb-8 pt-serif-regular-italic max-w-2xl mx-auto">
                Hubungi kami sekarang dan biarkan tim profesional kami membantu merencanakan momen spesial Anda
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="border-2 tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 border-[--color-primary] text-[--color-primary] dark:text-black dark:bg-white dark:border-none rounded-xl px-5 p-2 edu-vic-wa-nt-hand-500 font-semibold">
                    Lihat Katalog Sewa
                </button>
                <button class="text-white bg-[--color-primary] rounded-xl tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 border-2 px-5 p-2 edu-vic-wa-nt-hand-500 font-semibold">
                    Hubungi Kami
                </button>
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