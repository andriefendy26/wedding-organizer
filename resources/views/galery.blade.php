@extends('Layout.app')

@section('title', 'Portfolio')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-800">
   <div class="relative h-[70vh] overflow-hidden"
    style="background-image: url('{{ asset('storage/content/gif02.gif') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 class="mb-4 text-4xl font-semibold tracking-wide lg:text-6xl edu-vic-wa-nt-hand">
                    Galery Kami
                </h1>
                <p class="max-w-2xl mx-auto text-xl pt-serif-regular-italic">
                    Koleksi momen indah yang telah kami wujudkan bersama pasangan-pasangan bahagia
                </p>
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
                {{-- @dd($image['foto']);    --}}
                <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
                    <div class="relative overflow-hidden shadow-lg rounded-xl">
                        <img src="{{ $image['foto_url'] }}" alt="Pernikahan Adat Bugis" 
                            class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                        <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                            <div class="absolute text-white bottom-6 left-6">
                                <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ $image['nama'] }}</h3>
                                {{-- <p class="text-sm pt-serif-regular-italic">Rina & Andi - Tarakan</p> --}}
                                <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">Pernikahan</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            {{-- Wedding Projects --}}
            <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="Pernikahan Adat Bugis" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Pernikahan Adat Bugis</h3>
                            <p class="text-sm pt-serif-regular-italic">Rina & Andi - Tarakan</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">Pernikahan</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="Pernikahan Modern" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Pernikahan Modern</h3>
                            <p class="text-sm pt-serif-regular-italic">Sarah & Budi - Balikpapan</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">Pernikahan</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding04.jpg') }}" alt="Pernikahan Outdoor" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Pernikahan Outdoor</h3>
                            <p class="text-sm pt-serif-regular-italic">Maya & Doni - Tarakan</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">Pernikahan</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Decoration Projects --}}
            <div class="cursor-pointer portfolio-item decoration group" data-category="decoration">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Dekorasi Elegant" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Dekorasi Elegant</h3>
                            <p class="text-sm pt-serif-regular-italic">Tema Gold & White</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs bg-purple-500 rounded-full">Dekorasi</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cursor-pointer portfolio-item decoration group" data-category="decoration">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Dekorasi Tradisional" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Dekorasi Tradisional</h3>
                            <p class="text-sm pt-serif-regular-italic">Adat Kalimantan</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs bg-purple-500 rounded-full">Dekorasi</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Corporate Events --}}
            <div class="cursor-pointer portfolio-item corporate group" data-category="corporate">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding05.jpeg') }}" alt="Corporate Event" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Corporate Meeting</h3>
                            <p class="text-sm pt-serif-regular-italic">PT. Borneo Sejahtera</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs bg-blue-500 rounded-full">Corporate</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Additional Items --}}
            <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="Pernikahan Indoor" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Pernikahan Indoor</h3>
                            <p class="text-sm pt-serif-regular-italic">Lina & Agus - Samarinda</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">Pernikahan</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cursor-pointer portfolio-item decoration group" data-category="decoration">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/decoration04.png') }}" alt="Dekorasi Minimalis" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Dekorasi Minimalis</h3>
                            <p class="text-sm pt-serif-regular-italic">Modern & Clean</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs bg-purple-500 rounded-full">Dekorasi</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cursor-pointer portfolio-item corporate group" data-category="corporate">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="Product Launch" 
                         class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">Product Launch</h3>
                            <p class="text-sm pt-serif-regular-italic">Tech Company</p>
                            <span class="inline-block px-3 py-1 mt-2 text-xs bg-blue-500 rounded-full">Corporate</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        {{-- Load More Button --}}
        <div class="mt-12 text-center">
            <button class="flex items-center justify-center mx-auto transition-all duration-300 bg-gray-300 rounded-full group hover:scale-105">
                <p class="mx-3 my-2 ml-4 text-black pt-serif-regular">
                    Lihat Lebih Banyak
                </p>
                <x-heroicon-o-arrow-small-down class="w-10 h-10 p-1 text-white transition-all duration-300 bg-black border-2 rounded-full group-hover:rotate-180" />
            </button>
        </div>
    </div>

    {{-- Statistics Section --}}
    <div class="py-16 bg-gray-100 dark:bg-gray-900">
        <div class="container px-6 mx-auto">
            <div class="grid grid-cols-2 gap-8 text-center md:grid-cols-4">
                <div class="group">
                    <h3 class="text-4xl font-bold transition-transform duration-300 text-primary edu-vic-wa-nt-hand group-hover:scale-110">100+</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 pt-serif-regular">Pasangan Bahagia</p>
                </div>
                <div class="group">
                    <h3 class="text-4xl font-bold transition-transform duration-300 text-primary edu-vic-wa-nt-hand group-hover:scale-110">200+</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 pt-serif-regular">Proyek Selesai</p>
                </div>
                <div class="group">
                    <h3 class="text-4xl font-bold transition-transform duration-300 text-primary edu-vic-wa-nt-hand group-hover:scale-110">5+</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 pt-serif-regular">Tahun Pengalaman</p>
                </div>
                <div class="group">
                    <h3 class="text-4xl font-bold transition-transform duration-300 text-primary edu-vic-wa-nt-hand group-hover:scale-110">50+</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 pt-serif-regular">Event Corporate</p>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA Section --}}
    <div class="py-16 bg-white dark:bg-gray-800">
        <div class="container px-6 mx-auto text-center">
            <h2 class="mb-6 text-4xl font-semibold text-black edu-vic-wa-nt-hand dark:text-white">
                Siap Mewujudkan Acara Impian Anda?
            </h2>
            <p class="max-w-2xl mx-auto mb-8 text-xl text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                Hubungi kami sekarang dan biarkan tim profesional kami membantu merencanakan momen spesial Anda
            </p>
            <div class="flex flex-col justify-center gap-4 sm:flex-row">
                <button class="p-2 px-5 font-semibold tracking-wide transition-all duration-300 border-2 hover:tracking-widest hover:px-8 border-primary text-primary dark:text-black dark:bg-white dark:border-none rounded-xl edu-vic-wa-nt-hand-500">
                    Lihat Katalog Sewa
                </button>
                <button class="p-2 px-5 font-semibold tracking-wide text-white transition-all duration-300 border-2 bg-primary rounded-xl hover:tracking-widest hover:px-8 edu-vic-wa-nt-hand-500">
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