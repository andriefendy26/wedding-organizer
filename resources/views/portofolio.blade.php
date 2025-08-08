@extends('Layout.app')

@section('title', 'Portfolio')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen">
    {{-- Hero Section --}}
    <div class="relative h-[70vh] bg-gradient-to-br from-purple-900 via-red-900 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white px-6">
            <div>
                <h1 class="text-6xl font-bold mb-6 edu-vic-wa-nt-hand tracking-wide">
                    Portfolio Kami
                </h1>
                <p class="text-xl pt-serif-regular-italic max-w-3xl mx-auto mb-8">
                    Menampilkan keahlian dan dedikasi kami dalam menciptakan momen tak terlupakan melalui berbagai layanan event organizer profesional
                </p>
                <div class="flex gap-4 justify-center">
                    <span class="px-4 py-2 bg-white/20 rounded-full text-sm backdrop-blur-sm">Event Planning</span>
                    <span class="px-4 py-2 bg-white/20 rounded-full text-sm backdrop-blur-sm">Wedding Organizer</span>
                    <span class="px-4 py-2 bg-white/20 rounded-full text-sm backdrop-blur-sm">Corporate Events</span>
                </div>
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
                    <div class="absolute inset-0 bg-gradient-to-t from-pink-900/90 via-pink-600/50 to-transparent">
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
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-600/50 to-transparent">
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
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/90 via-purple-600/50 to-transparent">
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

        {{-- Process Timeline --}}
        <div class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4 edu-vic-wa-nt-hand text-gray-800 dark:text-white">
                    Proses Kerja Kami
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                    Metodologi yang terbukti untuk hasil yang sempurna
                </p>
            </div>

            <div class="relative">
                {{-- Timeline Line --}}
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-pink-400 to-purple-600 hidden lg:block"></div>
                
                <div class="space-y-12">
                    {{-- Step 1 --}}
                    <div class="flex flex-col lg:flex-row items-center">
                        <div class="lg:w-1/2 lg:pr-12 text-center lg:text-right">
                            <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                                <h3 class="text-xl font-bold mb-2 edu-vic-wa-nt-hand text-pink-600">01. Konsultasi</h3>
                                <p class="text-gray-600 dark:text-gray-400">Memahami visi, kebutuhan, dan budget klien secara detail</p>
                            </div>
                        </div>
                        <div class="relative z-10 w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center text-white font-bold my-4 lg:my-0">
                            1
                        </div>
                        <div class="lg:w-1/2 lg:pl-12"></div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="flex flex-col lg:flex-row items-center">
                        <div class="lg:w-1/2 lg:pr-12"></div>
                        <div class="relative z-10 w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold my-4 lg:my-0">
                            2
                        </div>
                        <div class="lg:w-1/2 lg:pl-12 text-center lg:text-left">
                            <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                                <h3 class="text-xl font-bold mb-2 edu-vic-wa-nt-hand text-purple-600">02. Perencanaan</h3>
                                <p class="text-gray-600 dark:text-gray-400">Menyusun konsep, timeline, dan strategi eksekusi yang komprehensif</p>
                            </div>
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div class="flex flex-col lg:flex-row items-center">
                        <div class="lg:w-1/2 lg:pr-12 text-center lg:text-right">
                            <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                                <h3 class="text-xl font-bold mb-2 edu-vic-wa-nt-hand text-blue-600">03. Persiapan</h3>
                                <p class="text-gray-600 dark:text-gray-400">Koordinasi vendor, persiapan venue, dan final checking detail</p>
                            </div>
                        </div>
                        <div class="relative z-10 w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold my-4 lg:my-0">
                            3
                        </div>
                        <div class="lg:w-1/2 lg:pl-12"></div>
                    </div>

                    {{-- Step 4 --}}
                    <div class="flex flex-col lg:flex-row items-center">
                        <div class="lg:w-1/2 lg:pr-12"></div>
                        <div class="relative z-10 w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-bold my-4 lg:my-0">
                            4
                        </div>
                        <div class="lg:w-1/2 lg:pl-12 text-center lg:text-left">
                            <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                                <h3 class="text-xl font-bold mb-2 edu-vic-wa-nt-hand text-green-600">04. Eksekusi</h3>
                                <p class="text-gray-600 dark:text-gray-400">Menjalankan acara dengan sempurna dan penuh perhatian detail</p>
                            </div>
                        </div>
                    </div>
                </div>
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