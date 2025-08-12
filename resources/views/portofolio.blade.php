@extends('Layout.app')

@section('head')
    <meta charset="UTF-8" />
    <title>{{ __('portfolio.title') }}</title>
    <meta name="description" content="{{ __('portfolio.meta_description') }}" />

    <meta name="keywords" content="{{ __('portfolio.meta_keywords') }}" />

    <meta name="author" content="3Rasa Event Organizer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.3rasaeventorganizer.com/portofolio" />
    <link rel="icon" type="image/png" href="{{ asset('storage/content/Logo.png') }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/portofolio" />
    <meta property="og:title" content="{{ __('portfolio.title') }}" />
    <meta property="og:description" content="{{ __('portfolio.meta_description') }}" />
    <meta property="og:image" content="{{ asset('storage/content/Logo.png') }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ __('portfolio.title') }}" />
    <meta name="twitter:description" content="{{ __('portfolio.meta_description') }}" />
    <meta name="twitter:image" content="{{ asset('storage/content/Logo.png') }}" />
@endsection

@section('content')
<div class="min-h-screen">

    <div class="relative h-[70vh] overflow-hidden"
    style="background-image: url('{{ asset('storage/content/gif02.gif') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 class="mb-4 text-4xl font-semibold tracking-wide lg:text-6xl edu-vic-wa-nt-hand">
                    {{ __('portfolio.hero.title') }}
                </h1>
                <p class="max-w-2xl mx-auto text-xl pt-serif-regular-italic">
                    {{ __('portfolio.hero.subtitle') }}
                </p>
            </div>
        </div>
    </div>

    {{-- Services Overview --}}
    <div class="container px-10 py-16 mx-auto md:px-16 lg:px-24 xl:px-32">
        <div class="mb-12 text-center">
            <h2 class="mb-4 text-4xl font-bold text-gray-800 edu-vic-wa-nt-hand dark:text-white">
                {{ __('portfolio.services.title') }}
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                {{ __('portfolio.services.subtitle') }}
            </p>
        </div>

        {{-- Service Categories --}}
        <div class="grid grid-cols-1 gap-8 mb-16 lg:grid-cols-3">
            {{-- Wedding Services --}}
            <div class="cursor-pointer group">
                <div class="relative overflow-hidden shadow-xl rounded-2xl">
                    <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="{{ __('portfolio.services.wedding.title') }}" 
                         class="object-cover w-full h-64 transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 to-transparent">
                        <div class="absolute text-white bottom-6 left-6 right-6">
                            <h3 class="mb-2 text-2xl font-bold edu-vic-wa-nt-hand">{{ __('portfolio.services.wedding.title') }}</h3>
                            <p class="mb-4 text-sm opacity-90">{{ __('portfolio.services.wedding.description') }}</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 text-xs rounded-full bg-white/20 backdrop-blur-sm">{{ __('portfolio.services.wedding.tags.planning') }}</span>
                                <span class="px-3 py-1 text-xs rounded-full bg-white/20 backdrop-blur-sm">{{ __('portfolio.services.wedding.tags.decoration') }}</span>
                                <span class="px-3 py-1 text-xs rounded-full bg-white/20 backdrop-blur-sm">{{ __('portfolio.services.wedding.tags.coordination') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 -mt-2 bg-gray-50 dark:bg-gray-700 rounded-b-2xl">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <p class="text-2xl font-bold text-pink-600 edu-vic-wa-nt-hand">50+</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ __('portfolio.services.wedding.stats.weddings') }}</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-pink-600 edu-vic-wa-nt-hand">100%</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ __('portfolio.services.wedding.stats.satisfaction') }}</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-pink-600 edu-vic-wa-nt-hand">5★</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ __('portfolio.services.wedding.stats.rating') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Corporate Events --}}
            <div class="cursor-pointer group">
                <div class="relative overflow-hidden shadow-xl rounded-2xl">
                    <img src="{{ asset('storage/content/event01.png') }}" alt="{{ __('portfolio.services.corporate.title') }}" 
                         class="object-cover w-full h-64 transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 to-transparent">
                        <div class="absolute text-white bottom-6 left-6 right-6">
                            <h3 class="mb-2 text-2xl font-bold edu-vic-wa-nt-hand">{{ __('portfolio.services.corporate.title') }}</h3>
                            <p class="mb-4 text-sm opacity-90">{{ __('portfolio.services.corporate.description') }}</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 text-xs rounded-full bg-white/20 backdrop-blur-sm">{{ __('portfolio.services.corporate.tags.seminar') }}</span>
                                <span class="px-3 py-1 text-xs rounded-full bg-white/20 backdrop-blur-sm">{{ __('portfolio.services.corporate.tags.launching') }}</span>
                                <span class="px-3 py-1 text-xs rounded-full bg-white/20 backdrop-blur-sm">{{ __('portfolio.services.corporate.tags.meeting') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 -mt-2 bg-gray-50 dark:bg-gray-700 rounded-b-2xl">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <p class="text-2xl font-bold text-blue-600 edu-vic-wa-nt-hand">30+</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ __('portfolio.services.corporate.stats.companies') }}</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-blue-600 edu-vic-wa-nt-hand">80+</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ __('portfolio.services.corporate.stats.events') }}</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-blue-600 edu-vic-wa-nt-hand">3 {{ __('portfolio.services.corporate.stats.experience_years') }}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ __('portfolio.services.corporate.stats.experience') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Decoration Services --}}
            <div class="cursor-pointer group">
                <div class="relative overflow-hidden shadow-xl rounded-2xl">
                    <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="{{ __('portfolio.services.decoration.title') }}" 
                         class="object-cover w-full h-64 transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 to-transparent">
                        <div class="absolute text-white bottom-6 left-6 right-6">
                            <h3 class="mb-2 text-2xl font-bold edu-vic-wa-nt-hand">{{ __('portfolio.services.decoration.title') }}</h3>
                            <p class="mb-4 text-sm opacity-90">{{ __('portfolio.services.decoration.description') }}</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 text-xs rounded-full bg-white/20 backdrop-blur-sm">{{ __('portfolio.services.decoration.tags.theme') }}</span>
                                <span class="px-3 py-1 text-xs rounded-full bg-white/20 backdrop-blur-sm">{{ __('portfolio.services.decoration.tags.custom') }}</span>
                                <span class="px-3 py-1 text-xs rounded-full bg-white/20 backdrop-blur-sm">{{ __('portfolio.services.decoration.tags.modern') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 -mt-2 bg-gray-50 dark:bg-gray-700 rounded-b-2xl">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <p class="text-2xl font-bold text-purple-600 edu-vic-wa-nt-hand">100+</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ __('portfolio.services.decoration.stats.decorations') }}</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-purple-600 edu-vic-wa-nt-hand">25+</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ __('portfolio.services.decoration.stats.themes') }}</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-purple-600 edu-vic-wa-nt-hand">∞</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ __('portfolio.services.decoration.stats.creativity') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Featured Projects --}}
        <div class="mb-16">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-4xl font-bold text-gray-800 edu-vic-wa-nt-hand dark:text-white">
                    {{ __('portfolio.featured_projects.title') }}
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                    {{ __('portfolio.featured_projects.subtitle') }}
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                {{-- Dynamic Featured Projects --}}
                @if ($portofolios->count() > 0)
                    @foreach ($portofolios as $portofolio)         
                    <div class="cursor-pointer group">
                        <div class="relative overflow-hidden shadow-xl rounded-2xl">
                            @if ($portofolio->galery->count() > 0)
                                <img src="{{ $portofolio->thumbnail_url }}" alt="{{ $portofolio['judul'] }}" 
                                class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-105">
                            @else
                                <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="{{ $portofolio['judul'] }}" 
                                class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-105">
                            @endif
                            <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:opacity-100">
                                <div class="absolute text-white bottom-8 left-8 right-8">
                                    <div class="flex items-center gap-4 mb-4">
                                        <span class="px-4 py-2 text-sm font-semibold bg-pink-600 rounded-full">
                                            @php
                                                $categoryKey = strtolower($portofolio['kategori']);
                                                $categoryTranslation = __('portfolio.categories.' . $categoryKey);
                                            @endphp
                                            {{ $categoryTranslation !== 'portfolio.categories.' . $categoryKey ? $categoryTranslation : $portofolio['kategori'] }}
                                        </span>
                                        <span class="text-sm opacity-75">{{ $portofolio['tanggal_event'] }}</span>
                                    </div>
                                    <h3 class="mb-2 text-2xl font-bold edu-vic-wa-nt-hand">{{ $portofolio['judul'] }}</h3>
                                    <p class="mb-4 text-sm opacity-90">{{ Str::limit($portofolio['deskripsi'], 120) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    {{-- Default Projects when no data --}}
                    <div class="cursor-pointer group">
                        <div class="relative overflow-hidden shadow-xl rounded-2xl">
                            <img src="{{ asset('storage/content/decoration.jpg') }}" alt="{{ __('portfolio.default_projects.corporate_gala.title') }}" 
                                class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-105">
                            <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:opacity-100">
                                <div class="absolute text-white bottom-8 left-8 right-8">
                                    <div class="flex items-center gap-4 mb-4">
                                        <span class="px-4 py-2 text-sm font-semibold bg-blue-600 rounded-full">{{ __('portfolio.categories.corporate') }}</span>
                                        <span class="text-sm opacity-75">{{ __('portfolio.default_projects.corporate_gala.date') }}</span>
                                    </div>
                                    <h3 class="mb-2 text-2xl font-bold edu-vic-wa-nt-hand">{{ __('portfolio.default_projects.corporate_gala.title') }}</h3>
                                    <p class="mb-4 text-sm opacity-90">{{ __('portfolio.default_projects.corporate_gala.description') }}</p>
                                    <div class="flex gap-2">
                                        <span class="px-3 py-1 text-xs rounded-full bg-white/20">{{ __('portfolio.default_projects.corporate_gala.tags.event_management') }}</span>
                                        <span class="px-3 py-1 text-xs rounded-full bg-white/20">{{ __('portfolio.default_projects.corporate_gala.tags.entertainment') }}</span>
                                        <span class="px-3 py-1 text-xs rounded-full bg-white/20">{{ __('portfolio.default_projects.corporate_gala.tags.branding') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Duplicate for demonstration --}}
                    <div class="cursor-pointer group">
                        <div class="relative overflow-hidden shadow-xl rounded-2xl">
                            <img src="{{ asset('storage/content/decoration.jpg') }}" alt="{{ __('portfolio.default_projects.corporate_gala.title') }}" 
                                class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-105">
                            <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:opacity-100">
                                <div class="absolute text-white bottom-8 left-8 right-8">
                                    <div class="flex items-center gap-4 mb-4">
                                        <span class="px-4 py-2 text-sm font-semibold bg-blue-600 rounded-full">{{ __('portfolio.categories.corporate') }}</span>
                                        <span class="text-sm opacity-75">{{ __('portfolio.default_projects.corporate_gala.date') }}</span>
                                    </div>
                                    <h3 class="mb-2 text-2xl font-bold edu-vic-wa-nt-hand">{{ __('portfolio.default_projects.corporate_gala.title') }}</h3>
                                    <p class="mb-4 text-sm opacity-90">{{ __('portfolio.default_projects.corporate_gala.description') }}</p>
                                    <div class="flex gap-2">
                                        <span class="px-3 py-1 text-xs rounded-full bg-white/20">{{ __('portfolio.default_projects.corporate_gala.tags.event_management') }}</span>
                                        <span class="px-3 py-1 text-xs rounded-full bg-white/20">{{ __('portfolio.default_projects.corporate_gala.tags.entertainment') }}</span>
                                        <span class="px-3 py-1 text-xs rounded-full bg-white/20">{{ __('portfolio.default_projects.corporate_gala.tags.branding') }}</span>
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

    /* Language switcher styles */
    .language-switcher .dropdown {
        position: relative;
        display: inline-block;
    }
    
    .language-switcher .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        top: 100%;
        z-index: 1000;
        min-width: 150px;
        margin-top: 0.25rem;
    }
    
    .language-switcher .dropdown:hover .dropdown-menu {
        display: block;
    }
    
    .language-switcher .dropdown-toggle:hover {
        background-color: rgba(0, 0, 0, 0.1);
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

        // Language switcher functionality
        document.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.language-switcher .dropdown-menu');
            const toggle = document.querySelector('.language-switcher .dropdown-toggle');
            
            if (toggle && !toggle.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    });
</script>
@endpush