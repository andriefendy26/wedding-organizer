<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: false }" x-init="
    darkMode = localStorage.getItem('darkMode') === 'true';
    $watch('darkMode', val => {
        localStorage.setItem('darkMode', val);
        if (val) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    });
    if (darkMode) document.documentElement.classList.add('dark');
" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wedding Organizer')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts - -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js"></script>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Figtree', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/css/font.css')

    @stack('styles')
    
    <style>
        .toggle-bg {
            transition: background-color 0.3s ease;
        }
        .toggle-dot {
            transition: transform 0.3s ease;
        }
        
        /* Custom navbar styles */
        .navbar {
            @apply bg-white dark:bg-gray-800 shadow-md;
        }
        
        .navbar-nav {
            @apply flex space-x-6;
        }
        
        .nav-link {
            @apply text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200;
        }
        
        .nav-link:hover {
            @apply bg-gray-100 dark:bg-gray-700;
        }
        
        .navbar-toggler {
            @apply lg:hidden p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200;
        }
        
        .container {
            @apply max-w-7xl mx-auto px-4 sm:px-6 lg:px-8;
        }
        
        /* Footer styles */
        footer {
            @apply bg-gray-100 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700;
        }
        
        .text-muted {
            @apply text-gray-600 dark:text-gray-400;
        }

          .dropdown-enter {
            opacity: 0;
            transform: translateY(-10px);
        }
        .dropdown-enter-to {
            opacity: 1;
            transform: translateY(0);
        }
        .dropdown-leave {
            opacity: 1;
            transform: translateY(0);
        }
        .dropdown-leave-to {
            opacity: 0;
            transform: translateY(-10px);
        }
        .dropdown-transition {
            transition: all 0.2s ease-in-out;
        }
        
    </style>
</head>
<body class=" transition-colors duration-300 bg-gray-50 dark:bg-gray-900 font-sans ">
    
    <!-- Header with Dark Mode Toggle -->
    <header class="backdrop-blur-md bg-white fixed top-0 z-[999999999] w-full dark:bg-gray-800/30 shadow-sm border-b border-gray-200 dark:border-gray-700 px-30">
        <div class="container">
            <div class="flex justify-between items-center py-4">
                <!-- Logo/Brand -->
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('storage/content/LogoFont.png') }}" class="w-20 drop-shadow-lg rounded-xl"></img>
                    {{-- <h1 class="text-2xl text-[--color-primary] font-bold italic  dark:text-white">
                        Wedding Organizer
                    </h1> --}}
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Language Switcher -->
                    <div class="relative" x-data="languageSwitcher()">
                        <button 
                            @click="open = !open"
                            @click.away="open = false"
                            class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary transition-colors duration-200"
                        >
                            <img :src="currentLanguage.flag" :alt="currentLanguage.name" class="w-5 h-4 rounded-sm">
                            <span x-text="currentLanguage.code.toUpperCase()"></span>
                            <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="text-xs text-gray-500 transition-transform duration-200"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                        >
                            <div class="py-1">
                                <template x-for="language in languages" :key="language.code">
                                    <button
                                        @click="setLanguage(language)"
                                        class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors duration-150"
                                        :class="currentLanguage.code === language.code ? 'bg-blue-50 text-blue-900' : ''"
                                    >
                                        <img :src="language.flag" :alt="language.name" class="w-5 h-4 rounded-sm mr-3">
                                        <span x-text="language.name"></span>
                                        <i x-show="currentLanguage.code === language.code" class="fas fa-check ml-auto text-blue-600"></i>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dark Mode Toggle -->
                    <div class="flex items-center space-x-3">
                        <span class="text-sm text-gray-600 dark:text-gray-400 hidden sm:inline">Light</span>
                        
                        <button 
                            @click="darkMode = !darkMode"
                            class="relative inline-flex h-8 w-14 items-center rounded-full toggle-bg focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                            :class="darkMode ? 'bg-[#B2110E]' : 'bg-gray-300'"
                            type="button"
                            role="switch"
                            :aria-checked="darkMode"
                            :aria-label="darkMode ? 'Switch to light mode' : 'Switch to dark mode'"
                        >
                            <span class="sr-only">Toggle dark mode</span>
                            <span 
                                class="inline-block h-6 w-6 transform rounded-full bg-white shadow-lg ring-0 transition duration-300 ease-in-out toggle-dot"
                                :class="darkMode ? 'translate-x-3.5' : 'translate-x-0.5'"
                            >
                                <!-- Sun Icon -->
                                <svg x-show="!darkMode" class="h-6 w-6 p-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
                                </svg>
                                
                                <!-- Moon Icon -->
                                <svg x-show="darkMode" class="h-6 w-6 p-1 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                </svg>
                            </span>
                        </button>
                        
                        <span class="text-sm text-gray-600 dark:text-gray-400 hidden sm:inline">Dark</span>
                    </div>
                </div>

            </div>
        </div>
    </header>

     <!-- Navigation -->
    <nav x-data="{ mobileMenuOpen: false }" class="flex justify-center w-full fixed top-20 z-50">
        <div class="my-4 text-gray-900 dark:text-white backdrop-blur-md bg-white dark:bg-gray-800/30 rounded-full shadow-lg border border-black/10 dark:border-gray-700/40 px-6 py-3 flex items-center justify-between space-x-6">
            
            <!-- Navigation Links (Desktop) -->
            <div class="flex items-center gap-6 text-black dark:text-white font-medium">
                
                <!-- Home -->
                <a href="/" class="hover:text-red-600 transition">Home</a>
                
                <!-- Pages dengan Dropdown -->
                <div class="relative group">
                    <a href="/" class="hover:text-red-600 transition flex items-center gap-1 cursor-pointer">
                        Pages
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible dropdown-transition">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 py-2 min-w-48 backdrop-blur-md">
                            <a href="/tentang" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Tentang Kami
                                </div>
                            </a>
                            <a href="/layanan" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                    </svg>
                                    Layanan
                                </div>
                            </a>
                            <a href="/portofolio" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    Portofolio
                                </div>
                            </a>
                            <hr class="my-1 border-gray-200 dark:border-gray-600">
                            <a href="/tim" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Tim Kami
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Artikel dengan Dropdown -->
                <div class="relative group">
                    <a href="/artikel" class="hover:text-red-600 transition flex items-center gap-1 cursor-pointer">
                        Artikel
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible dropdown-transition">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 py-2 min-w-48 backdrop-blur-md">
                            <a href="/artikel/terbaru" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Artikel Terbaru
                                </div>
                            </a>
                            <a href="/artikel/populer" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                    </svg>
                                    Artikel Populer
                                </div>
                            </a>
                            <a href="/artikel/teknologi" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Teknologi
                                </div>
                            </a>
                            <a href="/artikel/bisnis" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                    </svg>
                                    Bisnis
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- FAQ -->
                <a href="/faq" class="hover:text-red-600 transition">FAQ</a>
                
                <!-- Kalender -->
                <a href="/kalender" class="hover:text-red-600 transition">Kalender</a>
                
                <!-- Kontak -->
                <a href="/kontak" class="hover:text-red-600 transition">Kontak</a>
                
            </div>
        </div>
    </nav>

    @yield('content')
    <!-- Footer Section -->
    <footer class="bg-gray-800  text-white relative overflow-hidden mt-20">
        <!-- Background decoration -->
        <div class="absolute inset-0 bg-[url('{{ asset('storage/content/decoration01.jpeg') }}')] bg-no-repeat bg-cover bg-center opacity-5"></div>
        
        <div class="relative z-10 px-30 py-16">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                
                <!-- Brand Section -->
                <div class="col-span-1 md:col-span-2">
                    <div class="mb-6">
                        <h3 class="text-4xl edu-vic-wa-nt-hand-500 text-white mb-4">3Rasa</h3>
                        <p class="text-gray-300 pt-serif-regular-italic text-lg leading-relaxed">
                            Wujudkan momen spesial Anda bersama kami. Dari pesta pernikahan yang elegan, event korporat profesional, hingga penyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.
                        </p>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="flex gap-4">
                        <a href="#" class="group">
                            <div class="w-12 h-12 rounded-full border-2 border-gray-600 hover:border-[--color-primary] flex items-center justify-center transition-all duration-300 hover:scale-110">
                                <x-bi-instagram class="w-5 h-5 group-hover:text-[--color-primary] transition-colors duration-300" />
                            </div>
                        </a>
                        <a href="#" class="group">
                            <div class="w-12 h-12 rounded-full border-2 border-gray-600 hover:border-[--color-primary] flex items-center justify-center transition-all duration-300 hover:scale-110">
                                <x-bi-telephone class="w-5 h-5 group-hover:text-[--color-primary] transition-colors duration-300" />
                            </div>
                        </a>
                        <a href="#" class="group">
                            <div class="w-12 h-12 rounded-full border-2 border-gray-600 hover:border-[--color-primary] flex items-center justify-center transition-all duration-300 hover:scale-110">
                                <x-bi-tiktok class="w-5 h-5 group-hover:text-[--color-primary] transition-colors duration-300" />
                            </div>
                        </a>
                        <a href="#" class="group">
                            <div class="w-12 h-12 rounded-full border-2 border-gray-600 hover:border-[--color-primary] flex items-center justify-center transition-all duration-300 hover:scale-110">
                                <x-bi-whatsapp class="w-5 h-5 group-hover:text-[--color-primary] transition-colors duration-300" />
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-xl edu-vic-wa-nt-hand-500 mb-6 text-white">Layanan Kami</h4>
                    <ul class="space-y-3 poppins-regular">
                        <li><a href="#" class="text-gray-300 hover:text-[--color-primary] transition-colors duration-300 hover:tracking-wider">Wedding Organizer</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-[--color-primary] transition-colors duration-300 hover:tracking-wider">Dekorasi Pernikahan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-[--color-primary] transition-colors duration-300 hover:tracking-wider">Event Korporat</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-[--color-primary] transition-colors duration-300 hover:tracking-wider">Sewa Perlengkapan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-[--color-primary] transition-colors duration-300 hover:tracking-wider">Dokumentasi</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-xl edu-vic-wa-nt-hand-500 mb-6 text-white">Kontak</h4>
                    <div class="space-y-4 poppins-regular">
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-[--color-primary] flex items-center justify-center mt-1">
                                <x-heroicon-o-map-pin class="w-3 h-3 text-white" />
                            </div>
                            <div>
                                <p class="text-gray-300 text-sm">Jl. Contoh No. 123</p>
                                <p class="text-gray-300 text-sm">Tarakan, Kalimantan Utara</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-[--color-primary] flex items-center justify-center">
                                <x-heroicon-o-phone class="w-3 h-3 text-white" />
                            </div>
                            <p class="text-gray-300 text-sm">+62 812-3456-7890</p>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-[--color-primary] flex items-center justify-center">
                                <x-heroicon-o-envelope class="w-3 h-3 text-white" />
                            </div>
                            <p class="text-gray-300 text-sm">info@3rasa.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter Section -->
            <div class="border-t border-gray-700 pt-8 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h4 class="text-2xl edu-vic-wa-nt-hand-500 text-white mb-2">Dapatkan Update Terbaru</h4>
                        <p class="text-gray-300 pt-serif-regular-italic">Berlangganan newsletter kami untuk mendapatkan tips pernikahan dan penawaran spesial</p>
                    </div>
                    <div class="flex gap-4">
                        <input type="email" placeholder="Masukkan email Anda" 
                            class="flex-1 px-4 py-3 rounded-xl bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:border-[--color-primary] focus:outline-none transition-colors duration-300">
                        <button class="bg-[--color-primary] text-white px-6 py-3 rounded-xl edu-vic-wa-nt-hand-500 hover:scale-105 transition-all duration-300 hover:tracking-wider">
                            Berlangganan
                        </button>
                    </div>
                </div>
            </div>

            <!-- Customer Testimonial Banner -->
            <div class="bg-gradient-to-r from-[--color-primary]/20 to-transparent rounded-2xl p-6 mb-8 border border-[--color-primary]/30">
                <div class="flex items-center gap-6">
                    <div class="text-center">
                        <div class="text-4xl edu-vic-wa-nt-hand-500 text-[--color-primary]">100+</div>
                        <div class="text-gray-300 text-sm pt-serif-regular">Pasangan Bahagia</div>
                    </div>
                    <div class="flex-1">
                        <p class="text-white pt-serif-regular-italic text-lg">
                            "Terima kasih 3Rasa telah membuat hari pernikahan kami menjadi sempurna dan tak terlupakan"
                        </p>
                        <p class="text-[--color-primary] text-sm mt-2 edu-vic-wa-nt-hand-500">- Pasangan yang Puas</p>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex gap-6 poppins-regular text-sm">
                        <a href="#" class="text-gray-300 hover:text-[--color-primary] transition-colors duration-300">Kebijakan Privasi</a>
                        <a href="#" class="text-gray-300 hover:text-[--color-primary] transition-colors duration-300">Syarat & Ketentuan</a>
                        <a href="#" class="text-gray-300 hover:text-[--color-primary] transition-colors duration-300">FAQ</a>
                    </div>
                    <div class="text-gray-400 text-sm poppins-regular">
                        © 2025 3Rasa Wedding Organizer. All rights reserved.
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute bottom-0 right-0 w-64 h-64 opacity-10">
            <div class="w-full h-full bg-gradient-to-tl from-[--color-primary]/30 to-transparent rounded-full"></div>
        </div>
    </footer>

    <!-- Call to Action Floating Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <button class="group bg-[--color-primary] text-white rounded-full p-4 shadow-lg hover:scale-110 transition-all duration-300 hover:shadow-2xl">
            <div class="flex items-center gap-3">
                <x-bi-whatsapp class="w-6 h-6" />
                <span class="hidden group-hover:block edu-vic-wa-nt-hand-500 pr-2 transition-all duration-300">
                    Hubungi Kami
                </span>
            </div>
        </button>
    </div>

    
    <script>
        // Language Switcher Component
        function languageSwitcher() {
            return {
                open: false,
                currentLanguage: {
                    code: 'en',
                    name: 'English',
                    flag: 'https://flagcdn.com/w20/us.png'
                },
                languages: [
                    {
                        code: 'en',
                        name: 'English',
                        flag: 'https://flagcdn.com/w20/us.png'
                    },
                    {
                        code: 'id',
                        name: 'Bahasa Indonesia',
                        flag: 'https://flagcdn.com/w20/id.png'
                    },
                    {
                        code: 'es',
                        name: 'Español',
                        flag: 'https://flagcdn.com/w20/es.png'
                    },
                    {
                        code: 'fr',
                        name: 'Français',
                        flag: 'https://flagcdn.com/w20/fr.png'
                    },
                    {
                        code: 'de',
                        name: 'Deutsch',
                        flag: 'https://flagcdn.com/w20/de.png'
                    },
                    {
                        code: 'ja',
                        name: '日本語',
                        flag: 'https://flagcdn.com/w20/jp.png'
                    }
                ],
                
                init() {
                    // Load saved language from localStorage
                    const saved = localStorage.getItem('selectedLanguage');
                    if (saved) {
                        const lang = JSON.parse(saved);
                        this.currentLanguage = lang;
                        this.updatePageLanguage(lang.code);
                    }
                },
                
                setLanguage(language) {
                    this.currentLanguage = language;
                    this.open = false;
                    
                    // Save to localStorage
                    localStorage.setItem('selectedLanguage', JSON.stringify(language));
                    
                    // Update page language
                    this.updatePageLanguage(language.code);
                    
                    // Trigger custom event for other components to listen
                    window.dispatchEvent(new CustomEvent('languageChanged', { 
                        detail: { language: language.code } 
                    }));
                },
                
                updatePageLanguage(langCode) {
                    document.documentElement.lang = langCode;
                    // In real Laravel app, you would redirect to route with locale
                    // window.location.href = `/lang/${langCode}`;
                }
            }
        }

        // Content Data Component (simulates Laravel translations)
        function contentData() {
            return {
                content: {
                    title: 'Welcome to Our Platform',
                    subtitle: 'Experience the best service with our innovative solutions',
                    features: [
                        {
                            icon: 'fas fa-rocket',
                            title: 'Fast Performance',
                            description: 'Lightning fast performance with optimized code'
                        },
                        {
                            icon: 'fas fa-shield-alt',
                            title: 'Secure & Safe',
                            description: 'Your data is protected with enterprise-grade security'
                        },
                        {
                            icon: 'fas fa-users',
                            title: 'Team Collaboration',
                            description: 'Work together seamlessly with your team members'
                        }
                    ],
                    cta: {
                        title: 'Ready to Get Started?',
                        description: 'Join thousands of satisfied customers today',
                        button: 'Get Started Now'
                    }
                },
                
                translations: {
                    en: {
                        title: 'Welcome to Our Platform',
                        subtitle: 'Experience the best service with our innovative solutions',
                        features: [
                            {
                                icon: 'fas fa-rocket',
                                title: 'Fast Performance',
                                description: 'Lightning fast performance with optimized code'
                            },
                            {
                                icon: 'fas fa-shield-alt',
                                title: 'Secure & Safe',
                                description: 'Your data is protected with enterprise-grade security'
                            },
                            {
                                icon: 'fas fa-users',
                                title: 'Team Collaboration',
                                description: 'Work together seamlessly with your team members'
                            }
                        ],
                        cta: {
                            title: 'Ready to Get Started?',
                            description: 'Join thousands of satisfied customers today',
                            button: 'Get Started Now'
                        }
                    },
                    id: {
                        title: 'Selamat Datang di Platform Kami',
                        subtitle: 'Rasakan layanan terbaik dengan solusi inovatif kami',
                        features: [
                            {
                                icon: 'fas fa-rocket',
                                title: 'Performa Cepat',
                                description: 'Performa super cepat dengan kode yang dioptimalkan'
                            },
                            {
                                icon: 'fas fa-shield-alt',
                                title: 'Aman & Terjamin',
                                description: 'Data Anda dilindungi dengan keamanan tingkat enterprise'
                            },
                            {
                                icon: 'fas fa-users',
                                title: 'Kolaborasi Tim',
                                description: 'Bekerja sama dengan mulus bersama anggota tim Anda'
                            }
                        ],
                        cta: {
                            title: 'Siap Untuk Memulai?',
                            description: 'Bergabunglah dengan ribuan pelanggan yang puas hari ini',
                            button: 'Mulai Sekarang'
                        }
                    },
                    es: {
                        title: 'Bienvenido a Nuestra Plataforma',
                        subtitle: 'Experimenta el mejor servicio con nuestras soluciones innovadoras',
                        features: [
                            {
                                icon: 'fas fa-rocket',
                                title: 'Rendimiento Rápido',
                                description: 'Rendimiento ultrarrápido con código optimizado'
                            },
                            {
                                icon: 'fas fa-shield-alt',
                                title: 'Seguro y Protegido',
                                description: 'Tus datos están protegidos con seguridad de nivel empresarial'
                            },
                            {
                                icon: 'fas fa-users',
                                title: 'Colaboración en Equipo',
                                description: 'Trabaja sin problemas con los miembros de tu equipo'
                            }
                        ],
                        cta: {
                            title: '¿Listo para Empezar?',
                            description: 'Únete a miles de clientes satisfechos hoy',
                            button: 'Comenzar Ahora'
                        }
                    }
                },
                
                init() {
                    // Listen for language changes
                    window.addEventListener('languageChanged', (e) => {
                        this.updateContent(e.detail.language);
                    });
                    
                    // Load initial language
                    const saved = localStorage.getItem('selectedLanguage');
                    if (saved) {
                        const lang = JSON.parse(saved);
                        this.updateContent(lang.code);
                    }
                },
                
                updateContent(langCode) {
                    if (this.translations[langCode]) {
                        this.content = this.translations[langCode];
                    }
                }
            }
        }

        // Global function to get current language
        function getCurrentLanguage() {
            const saved = localStorage.getItem('selectedLanguage');
            if (saved) {
                return JSON.parse(saved);
            }
            return {
                code: 'en',
                name: 'English',
                flag: 'https://flagcdn.com/w20/us.png'
            };
        }
    </script>

    @stack('scripts')
</body>
</html>