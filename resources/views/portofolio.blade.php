@extends('Layout.app')

@section('title', 'Portfolio')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen">

    <div class="relative h-[70vh] overflow-hidden"
    style="background-image: url('{{ asset('storage/content/gif02.gif') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 class="text-6xl font-semibold mb-4 edu-vic-wa-nt-hand tracking-wide">
                    Portfolio Kami
                </h1>
                <p class="text-xl pt-serif-regular-italic max-w-2xl mx-auto">
                    Menampilkan keahlian dan dedikasi kami dalam menciptakan momen tak terlupakan melalui berbagai layanan event organizer profesional
                </p>
                </p>
            </div>
        </div>
    </div>

    {{-- Services Overview --}}
    <div class="container mx-auto px-6 py-16">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4 edu-vic-wa-nt-hand text-gray-800 dark:text-white">
                Layanan Unggulan Kami
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic max-w-2xl mx-auto">
                Setiap proyek adalah karya seni yang kami ciptakan dengan penuh passion dan profesionalitas
            </p>
        </div>

        {{-- Service Categories --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
            {{-- Wedding Services --}}
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-2xl shadow-xl">
                    <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="Wedding Services" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-black/30 to-transparent">
                        <div class="absolute bottom-6 left-6 right-6 text-white">
                            <h3 class="text-2xl font-bold mb-2 edu-vic-wa-nt-hand">Wedding Organizer</h3>
                            <p class="text-sm mb-4 opacity-90">Pernikahan impian dengan sentuhan personal dan detail yang sempurna</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-white/20 rounded-full text-xs backdrop-blur-sm">Perencanaan</span>
                                <span class="px-3 py-1 bg-white/20 rounded-full text-xs backdrop-blur-sm">Dekorasi</span>
                                <span class="px-3 py-1 bg-white/20 rounded-full text-xs backdrop-blur-sm">Koordinasi</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-gray-50 dark:bg-gray-700 rounded-b-2xl -mt-2">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <p class="text-2xl font-bold text-pink-600 edu-vic-wa-nt-hand">50+</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Pernikahan</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-pink-600 edu-vic-wa-nt-hand">100%</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Kepuasan</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-pink-600 edu-vic-wa-nt-hand">5★</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Rating</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Corporate Events --}}
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-2xl shadow-xl">
                    <img src="{{ asset('storage/content/wedding05.jpeg') }}" alt="Corporate Events" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-black/30 to-transparent">
                        <div class="absolute bottom-6 left-6 right-6 text-white">
                            <h3 class="text-2xl font-bold mb-2 edu-vic-wa-nt-hand">Corporate Events</h3>
                            <p class="text-sm mb-4 opacity-90">Event perusahaan yang profesional dan berkesan untuk kesuksesan bisnis</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-white/20 rounded-full text-xs backdrop-blur-sm">Seminar</span>
                                <span class="px-3 py-1 bg-white/20 rounded-full text-xs backdrop-blur-sm">Launching</span>
                                <span class="px-3 py-1 bg-white/20 rounded-full text-xs backdrop-blur-sm">Meeting</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-gray-50 dark:bg-gray-700 rounded-b-2xl -mt-2">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <p class="text-2xl font-bold text-blue-600 edu-vic-wa-nt-hand">30+</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Perusahaan</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-blue-600 edu-vic-wa-nt-hand">80+</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Event</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-blue-600 edu-vic-wa-nt-hand">3 Thn</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Pengalaman</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Decoration Services --}}
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-2xl shadow-xl">
                    <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Decoration Services" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-black/30 to-transparent">
                        <div class="absolute bottom-6 left-6 right-6 text-white">
                            <h3 class="text-2xl font-bold mb-2 edu-vic-wa-nt-hand">Event Decoration</h3>
                            <p class="text-sm mb-4 opacity-90">Dekorasi menawan yang menghadirkan suasana magis di setiap acara</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-white/20 rounded-full text-xs backdrop-blur-sm">Tema</span>
                                <span class="px-3 py-1 bg-white/20 rounded-full text-xs backdrop-blur-sm">Custom</span>
                                <span class="px-3 py-1 bg-white/20 rounded-full text-xs backdrop-blur-sm">Modern</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-gray-50 dark:bg-gray-700 rounded-b-2xl -mt-2">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <p class="text-2xl font-bold text-purple-600 edu-vic-wa-nt-hand">100+</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Dekorasi</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-purple-600 edu-vic-wa-nt-hand">25+</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Tema</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-purple-600 edu-vic-wa-nt-hand">∞</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Kreativitas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Featured Projects --}}
        <div class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4 edu-vic-wa-nt-hand text-gray-800 dark:text-white">
                    Proyek Unggulan
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                    Beberapa karya terbaik yang telah kami wujudkan
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Featured Project 1 --}}
                @if ($portofolios->count(0) > 0)
                    @foreach ($portofolios as $portofolio)         
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl shadow-xl">
                            {{-- {{ dd($portofolio->galery[0]->foto) }} --}}
                            @if ($portofolio->galery->count() > 0)
                                <img src="{{ $portofolio->thumbnail_url }}" alt="Featured Project" 
                                class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="Featured Project" 
                                class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-8 left-8 right-8 text-white">
                                    <div class="flex items-center gap-4 mb-4">
                                        <span class="px-4 py-2 bg-pink-600 rounded-full text-sm font-semibold">{{ $portofolio['kategori'] }}</span>
                                        <span class="text-sm opacity-75">{{ $portofolio['tanggal_event'] }}</span>
                                    </div>
                                    <h3 class="text-2xl font-bold mb-2 edu-vic-wa-nt-hand">{{ $portofolio['judul'] }}</h3>
                                    <p class="text-sm mb-4 opacity-90">{{ $portofolio['deskripsi'] }}</p>
                                    {{-- <div class="flex gap-2">
                                        <span class="px-3 py-1 bg-white/20 rounded-full text-xs">Full Planning</span>
                                        <span class="px-3 py-1 bg-white/20 rounded-full text-xs">Venue</span>
                                        <span class="px-3 py-1 bg-white/20 rounded-full text-xs">Catering</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
           
                    @endforeach
                    
                    @else
                    {{-- Featured Project 2 --}}
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl shadow-xl">
                            <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Featured Project" 
                                class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-8 left-8 right-8 text-white">
                                    <div class="flex items-center gap-4 mb-4">
                                        <span class="px-4 py-2 bg-blue-600 rounded-full text-sm font-semibold">Corporate</span>
                                        <span class="text-sm opacity-75">November 2023</span>
                                    </div>
                                    <h3 class="text-2xl font-bold mb-2 edu-vic-wa-nt-hand">PT Borneo Annual Gala</h3>
                                    <p class="text-sm mb-4 opacity-90">Gala dinner tahunan perusahaan dengan tema sustainability dan inovasi untuk 300 peserta</p>
                                    <div class="flex gap-2">
                                        <span class="px-3 py-1 bg-white/20 rounded-full text-xs">Event Management</span>
                                        <span class="px-3 py-1 bg-white/20 rounded-full text-xs">Entertainment</span>
                                        <span class="px-3 py-1 bg-white/20 rounded-full text-xs">Branding</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Featured Project 2 --}}
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl shadow-xl">
                            <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Featured Project" 
                                class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-8 left-8 right-8 text-white">
                                    <div class="flex items-center gap-4 mb-4">
                                        <span class="px-4 py-2 bg-blue-600 rounded-full text-sm font-semibold">Corporate</span>
                                        <span class="text-sm opacity-75">November 2023</span>
                                    </div>
                                    <h3 class="text-2xl font-bold mb-2 edu-vic-wa-nt-hand">PT Borneo Annual Gala</h3>
                                    <p class="text-sm mb-4 opacity-90">Gala dinner tahunan perusahaan dengan tema sustainability dan inovasi untuk 300 peserta</p>
                                    <div class="flex gap-2">
                                        <span class="px-3 py-1 bg-white/20 rounded-full text-xs">Event Management</span>
                                        <span class="px-3 py-1 bg-white/20 rounded-full text-xs">Entertainment</span>
                                        <span class="px-3 py-1 bg-white/20 rounded-full text-xs">Branding</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

@push('styles')
<style>
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

    /* Smooth animations */
    .group:hover .group-hover\:scale-110 {
        transform: scale(1.1);
    }

    .group:hover .group-hover\:scale-105 {
        transform: scale(1.05);
    }

    /* Timeline responsive adjustments */
    @media (max-width: 1024px) {
        .timeline-line {
            display: none;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scrolling for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all portfolio items and cards
        document.querySelectorAll('.group, .bg-white, .bg-gradient-to-br').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Counter animation for statistics
        function animateCounters() {
            const counters = document.querySelectorAll('[data-count]');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000; // 2 seconds
                const step = target / (duration / 16); // 60fps
                let current = 0;
                
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target + (counter.textContent.includes('%') ? '%' : '+');
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current) + (counter.textContent.includes('%') ? '%' : '+');
                    }
                }, 16);
            });
        }

        // Trigger counter animation when statistics section is visible
        const statsSection = document.querySelector('.bg-gradient-to-r.from-indigo-100');
        if (statsSection) {
            const statsObserver = new IntersectionObserver(function(entries) {
                if (entries[0].isIntersecting) {
                    setTimeout(animateCounters, 500);
                    statsObserver.unobserve(statsSection);
                }
            }, { threshold: 0.5 });
            
            statsObserver.observe(statsSection);
        }

        // Hover effects for service cards
        document.querySelectorAll('.group.cursor-pointer').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.transition = 'transform 0.3s ease';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Click handlers for service cards and projects
        document.querySelectorAll('.group.cursor-pointer').forEach(item => {
            item.addEventListener('click', function() {
                const title = this.querySelector('h3').textContent;
                console.log('Service/Project clicked:', title);
                
                // You can add modal functionality or redirect logic here
                // Example: window.location.href = `/portfolio/detail/${slug}`;
            });
        });

        // Parallax effect for hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const heroSection = document.querySelector('.bg-gradient-to-br');
            if (heroSection) {
                heroSection.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Timeline animation
        const timelineSteps = document.querySelectorAll('.relative.z-10');
        timelineSteps.forEach((step, index) => {
            step.style.opacity = '0';
            step.style.transform = 'scale(0.5)';
            step.style.transition = 'all 0.5s ease';
            
            setTimeout(() => {
                step.style.opacity = '1';
                step.style.transform = 'scale(1)';
            }, index * 200);
        });
    });
</script>