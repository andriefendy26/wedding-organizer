@php
    $phoneNumber = config('app.phone');
    $message = <<<TEXT
    ==============================
    *HALO, SAYA INGIN KONSULTASI*
    ==============================

    Halo *3Rasa Production* 👋

    Saya tertarik untuk berkonsultasi mengenai layanan yang tersedia.

    🙏 Terima kasih atas waktunya.
    📩 Pesan ini dikirim via: https://3rasaproduction.com
TEXT;

    $encodedMessage = urlencode($message);

@endphp

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
    @yield('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="zB6SVGsTVSYRLNyidvPyG1w8dkMFUAuorzn2fzESQ6o" />
    {{-- <link rel="stylesheet" href=""> --}}

    <link rel="icon" type="image/png" href="{{ asset('storage/content/Logo.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Hand:wght@400..700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
    {{-- Animate On Scroll --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Scripts - -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    @vite(['resources/css/app.css', 'resources/css/font.css', 'resources/js/app.js'])

    @stack('styles')
    <style> 
        .toggle-bg {
            transition: background-color 0.3s ease;
        }
        .toggle-dot {
            transition: transform 0.3s ease;
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

        /* alert */

        .custom-alert {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            max-width: 500px;
            backdrop-filter: blur(16px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideIn 0.3s ease-out;
        }

        .custom-alert.success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.9), rgba(5, 150, 105, 0.9));
            border-left: 4px solid #10b981;
        }

        .custom-alert.error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.9), rgba(220, 38, 38, 0.9));
            border-left: 4px solid #ef4444;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    </style>
</head>
<body class=" transition-colors duration-300 bg-gray-50 dark:bg-gray-900 font-sans overflow-hidden">

    <!-- Custom Alert HTML (tambahkan setelah tag body) -->
    @if(session('success'))
    <div id="successAlert" class="custom-alert success text-white p-4 shadow-2xl">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold">Berhasil!</h4>
                    <p class="text-sm opacity-90">{{ session('success') }}</p>
                </div>
            </div>
            <button onclick="closeAlert('successAlert')" class="ml-4 text-white hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div id="errorAlert" class="custom-alert error text-white p-4 shadow-2xl">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold">Gagal!</h4>
                    <p class="text-sm opacity-90">{{ session('error') }}</p>
                </div>
            </div>
            <button onclick="closeAlert('errorAlert')" class="ml-4 text-white hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if($errors->any())
    <div id="validationAlert" class="custom-alert error text-white p-4 shadow-2xl">
        <div class="flex items-start justify-between">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 mt-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold">Validation Error!</h4>
                    <ul class="text-sm opacity-90 mt-1 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button onclick="closeAlert('validationAlert')" class="ml-4 text-white hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    @endif

    <!-- Unified Header dengan Navigation -->
    <header x-data="{ mobileMenuOpen : false }" class=" bg-white dark:bg-gray-900/95 fixed top-0 z-50 w-full shadow-lg border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Header Content -->
            <div class="flex justify-between items-center">
                <!-- Logo/Brand -->
                <div class="flex items-center space-x-2">
                    <div class="w-24 h-24 rounded-xl  flex items-center justify-center">
                        <img src={{ asset('storage/content/Logo.png') }} alt="Logo 3Rasa">
                    </div>
                    {{-- <div class="hidden sm:block">
                        <h1 class="edu-vic-wa-nt-hand text-xl font-bold text-gray-900 dark:text-white">
                            <span class="text-[#B2110E]">3</span>
                            <span class="text-[#D1A64A]">Rasa</span> --}}
                             {{-- Production</h1> --}}
                        {{-- <p class="text-sm text-gray-600 dark:text-gray-400">Production</p> --}}
                    {{-- </div> --}}
                    <div class="hidden sm:block">
                        <span class="edu-vic-wa-nt-hand text-xl font-bold text-gray-900 dark:text-white">
                             Event Organizer</span>
                        
                        {{-- <p class="text-sm text-gray-600 dark:text-gray-400">&</p> --}}
                        <p class="text-sm text-gray-600 dark:text-gray-400">& Wedding Organizer</p>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="nav-link text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 font-medium transition-colors">
                        Home
                    </a>
                    
                    <!-- Pages Dropdown -->
                    <div class="relative group">
                        <button class="nav-link flex items-center space-x-1 text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 font-medium transition-colors">
                            <span>Pages</span>
                            <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                        </button>
                        
                        <div class="absolute top-full left-0 mt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible dropdown-transition">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 py-2 min-w-48 backdrop-blur-md">
                                <a href="/tentang" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition-colors">
                                    <i class="fas fa-info-circle w-4 mr-3"></i>
                                    Tentang Kami
                                </a>
                                <a href="/layanan" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition-colors">
                                    <i class="fas fa-concierge-bell w-4 mr-3"></i>
                                    Layanan
                                </a>
                                <a href="/galery" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition-colors">
                                    <i class="fas fa-images w-4 mr-3"></i>
                                    Galery
                                </a>
                                <a href="/portofolio" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition-colors">
                                    <i class="fas fa-images w-4 mr-3"></i>
                                    Portofolio
                                </a>
                                <hr class="my-1 border-gray-200 dark:border-gray-600">
                                <a href="/team" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition-colors">
                                    <i class="fas fa-users w-4 mr-3"></i>
                                    Tim Kami
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="/artikel" class="nav-link text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 font-medium transition-colors">
                        Artikel
                    </a>
                    <a href="/faq" class="nav-link text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 font-medium transition-colors">
                        FAQ
                    </a>
                    <a href="/kalender" class="nav-link text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 font-medium transition-colors">
                        Kalender
                    </a>
                    <a href="/kontak" class="nav-link text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 font-medium transition-colors">
                        Kontak
                    </a>
                </nav>

                <!-- Right Side Controls -->
                <div class="flex items-center space-x-4">
                    <!-- Language Switcher -->
                    {{-- <div class="relative hidden sm:block" x-data="languageSwitcher()">
                        <button 
                            @click="open = !open"
                            @click.away="open = false"
                            class="flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors duration-200"
                        >
                            <img :src="currentLanguage.flag" :alt="currentLanguage.name" class="w-5 h-4 rounded-sm">
                            <span x-text="currentLanguage.code.toUpperCase()"></span>
                            <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="text-xs text-gray-500 transition-transform duration-200"></i>
                        </button>

                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 z-50"
                        >
                            <div class="py-1">
                                <template x-for="language in languages" :key="language.code">
                                    <button
                                        @click="setLanguage(language)"
                                        class="flex items-center w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600 transition-colors duration-150"
                                        :class="currentLanguage.code === language.code ? 'bg-red-50 dark:bg-red-900/20 text-red-600' : ''"
                                    >
                                        <img :src="language.flag" :alt="language.name" class="w-5 h-4 rounded-sm mr-3">
                                        <span x-text="language.name"></span>
                                        <i x-show="currentLanguage.code === language.code" class="fas fa-check ml-auto text-red-600"></i>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div> --}}
                    
                    <!-- Dark Mode Toggle -->
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400 hidden md:inline">
                            <i class="fas fa-sun"></i>
                        </span>
                        
                        <button 
                            @click="darkMode = !darkMode"
                            class="relative inline-flex h-6 w-11 items-center rounded-full toggle-bg focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900"
                            :class="darkMode ? 'bg-red-600' : 'bg-gray-300'"
                            type="button"
                            role="switch"
                            :aria-checked="darkMode"
                        >
                            <span class="sr-only">Toggle dark mode</span>
                            <span 
                                class="inline-block h-4 w-4 transform rounded-full bg-white shadow-lg transition duration-300 ease-in-out toggle-dot"
                                :class="darkMode ? 'translate-x-6' : 'translate-x-0.5'"
                            >
                            </span>
                        </button>
                        
                        <span class="text-sm text-gray-600 dark:text-gray-400 hidden md:inline">
                            <i class="fas fa-moon"></i>
                        </span>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button 
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        class="lg:hidden relative z-50 flex flex-col justify-center items-center w-8 h-8 focus:outline-none"
                        :class="mobileMenuOpen ? 'space-y-0' : 'space-y-1'"
                    >
                        <span 
                            class="block w-6 h-0.5 bg-gray-700 dark:bg-gray-300 transition-all duration-300"
                            :class="mobileMenuOpen ? 'rotate-45 translate-y-1' : ''"
                        ></span>
                        <span 
                            class="block w-6 h-0.5 bg-gray-700 dark:bg-gray-300 transition-all duration-300"
                            :class="mobileMenuOpen ? 'opacity-0' : ''"
                        ></span>
                        <span 
                            class="block w-6 h-0.5 bg-gray-700 dark:bg-gray-300 transition-all duration-300"
                            :class="mobileMenuOpen ? '-rotate-45 ' : ''"
                        ></span>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div 
                x-show="mobileMenuOpen" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-4"
                class="lg:hidden"
            >
                <nav class="flex flex-col space-y-2 pt-4 pb-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="/" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                        <i class="fas fa-home w-5 mr-3"></i>
                        Home
                    </a>
                    
                    <!-- Mobile Pages Section -->
                    <div x-data="{ pagesOpen: false }">
                        <button 
                            @click="pagesOpen = !pagesOpen"
                            class="flex items-center justify-between w-full px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors"
                        >
                            <div class="flex items-center">
                                <i class="fas fa-file-alt w-5 mr-3"></i>
                                Pages
                            </div>
                            <i class="fas fa-chevron-down transition-transform" :class="pagesOpen ? 'rotate-180' : ''"></i>
                        </button>
                        
                        <div x-show="pagesOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-y-0"
                             x-transition:enter-end="opacity-100 scale-y-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-y-100"
                             x-transition:leave-end="opacity-0 scale-y-0"
                             class="ml-4 mt-2 space-y-1 origin-top">
                            <a href="/tentang" 
                               @click="mobileMenuOpen = false"
                               class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-colors">
                                <i class="fas fa-info-circle w-4 mr-3"></i>
                                Tentang Kami
                            </a>
                            <a href="/layanan" 
                               @click="mobileMenuOpen = false"
                               class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-colors">
                                <i class="fas fa-concierge-bell w-4 mr-3"></i>
                                Layanan
                            </a>
                            <a href="/portofolio" 
                               @click="mobileMenuOpen = false"
                               class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-colors">
                                <i class="fas fa-images w-4 mr-3"></i>
                                Portofolio
                            </a>
                            <a href="/galery" 
                               @click="mobileMenuOpen = false"
                               class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-colors">
                                <i class="fas fa-images w-4 mr-3"></i>
                                Galery
                            </a>
                            <a href="/team" 
                               @click="mobileMenuOpen = false"
                               class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-colors">
                                <i class="fas fa-users w-4 mr-3"></i>
                                Tim Kami
                            </a>
                        </div>
                    </div>

                    <a href="/artikel" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                        <i class="fas fa-newspaper w-5 mr-3"></i>
                        Artikel
                    </a>
                    <a href="/faq" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                        <i class="fas fa-question-circle w-5 mr-3"></i>
                        FAQ
                    </a>
                    <a href="/kalender" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                        <i class="fas fa-calendar-alt w-5 mr-3"></i>
                        Kalender
                    </a>
                    <a href="/kontak" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                        <i class="fas fa-envelope w-5 mr-3"></i>
                        Kontak
                    </a>
                </nav>
            </div>
        </div>
    </header>


    @yield('content')
    
    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 bg-[url('{{ asset('storage/content/decoration01.jpeg') }}')] bg-no-repeat bg-cover bg-center opacity-5"
            style="background: url({{ asset('storage/content/decoration01.jpeg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;"
        ></div>
        
        <div class="relative z-10 px-10 lg:px-32 py-16">
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
                        <a href="https://www.instagram.com/3rasa_production/" class="group">
                            <div class="w-12 h-12 rounded-full border-2 border-gray-600 hover:border-primary flex items-center justify-center transition-all duration-300 hover:scale-110">
                                <x-bi-instagram class="w-5 h-5 group-hover:text-primary transition-colors duration-300" />
                            </div>
                        </a>
                        <a href="#" class="group">
                            <div class="w-12 h-12 rounded-full border-2 border-gray-600 hover:border-primary flex items-center justify-center transition-all duration-300 hover:scale-110">
                                <x-bi-telephone class="w-5 h-5 group-hover:text-primary transition-colors duration-300" />
                            </div>
                        </a>
                        <a href="#" class="group">
                            <div class="w-12 h-12 rounded-full border-2 border-gray-600 hover:border-primary flex items-center justify-center transition-all duration-300 hover:scale-110">
                                <x-bi-tiktok class="w-5 h-5 group-hover:text-primary transition-colors duration-300" />
                            </div>
                        </a>
                        <a href="#" class="group">
                            <div class="w-12 h-12 rounded-full border-2 border-gray-600 hover:border-primary flex items-center justify-center transition-all duration-300 hover:scale-110">
                                <x-bi-whatsapp class="w-5 h-5 group-hover:text-primary transition-colors duration-300" />
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-xl edu-vic-wa-nt-hand-500 mb-6 text-white">Layanan Kami</h4>
                    <ul class="space-y-3 poppins-regular">
                        <li><a href="#" class="text-gray-300 hover:text-primary transition-colors duration-300 hover:tracking-wider">Wedding Organizer</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-primary transition-colors duration-300 hover:tracking-wider">Dekorasi Pernikahan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-primary transition-colors duration-300 hover:tracking-wider">Event Korporat</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-primary transition-colors duration-300 hover:tracking-wider">Sewa Perlengkapan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-primary transition-colors duration-300 hover:tracking-wider">Dokumentasi</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-xl edu-vic-wa-nt-hand-500 mb-6 text-white">Kontak</h4>
                    <div class="space-y-4 poppins-regular">
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-primary flex items-center justify-center mt-1">
                                <x-heroicon-o-map-pin class="w-3 h-3 text-white" />
                            </div>
                            <div>
                                <p class="text-gray-300 text-sm">Jl. Contoh No. 123</p>
                                <p class="text-gray-300 text-sm">Tarakan, Kalimantan Utara</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-primary flex items-center justify-center">
                                <x-heroicon-o-phone class="w-3 h-3 text-white" />
                            </div>
                            <p class="text-gray-300 text-sm">+62 812-3456-7890</p>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-primary flex items-center justify-center">
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
                        <form method="POST" action="{{ route('subscribe') }}">
                            @csrf
                            <input type="email" name="email" id="email" required placeholder="Masukkan email Anda"
                            class="flex-1 px-4 py-3 rounded-xl bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:border-primary focus:outline-none transition-colors duration-300">
                            <button type="submit" class="bg-primary text-white px-6 py-3 rounded-xl edu-vic-wa-nt-hand-500 hover:scale-105 transition-all duration-300 hover:tracking-wider">
                                Berlangganan
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Customer Testimonial Banner -->
            <div class="bg-gradient-to-r from-primary/20 to-transparent rounded-2xl p-6 mb-8 border border-primary/30">
                <div class="flex items-center gap-6">
                    <div class="text-center">
                        <div class="text-4xl edu-vic-wa-nt-hand-500 text-primary">100+</div>
                        <div class="text-gray-300 text-sm pt-serif-regular">Pasangan Bahagia</div>
                    </div>
                    <div class="flex-1">
                        <p class="text-white pt-serif-regular-italic text-lg">
                            "Terima kasih 3Rasa telah membuat hari pernikahan kami menjadi sempurna dan tak terlupakan"
                        </p>
                        <p class="text-primary text-sm mt-2 edu-vic-wa-nt-hand-500">- Pasangan yang Puas</p>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex gap-6 poppins-regular text-sm">
                        <a href="#" class="text-gray-300 hover:text-primary transition-colors duration-300">Kebijakan Privasi</a>
                        <a href="#" class="text-gray-300 hover:text-primary transition-colors duration-300">Syarat & Ketentuan</a>
                        <a href="/faq" class="text-gray-300 hover:text-primary transition-colors duration-300">FAQ</a>
                    </div>
                    <div class="text-gray-400 text-sm poppins-regular">
                        © 2025 3Rasa Wedding Organizer. All rights reserved.
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute bottom-0 right-0 w-64 h-64 opacity-10">
            <div class="w-full h-full bg-gradient-to-tl from-primary/30 to-transparent rounded-full"></div>
        </div>
    </footer>

    <!-- Call to Action Floating Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <button class="group bg-primary text-white rounded-full p-4 shadow-lg hover:scale-110 transition-all duration-300 hover:shadow-2xl">
             <a href="https://api.whatsapp.com/send/?phone={{ $phoneNumber }}&text={{ $encodedMessage }}&type=phone_number&app_absent=0" target="_blank">
                <div class="flex items-center gap-3">
                    <x-bi-whatsapp class="w-6 h-6" />
                        <span class="hidden group-hover:block edu-vic-wa-nt-hand-500 pr-2 transition-all duration-300">
                            Hubungi Kami
                        </span>
                </div>
            </a>
        </button>
    </div>

    <!-- Discount Overlay Component -->
    {{-- @include('components.overlay') --}}
    
    <script>
        function closeAlert(alertId) {
            const alert = document.getElementById(alertId);
            if (alert) {
                alert.style.animation = 'slideOut 0.3s ease-in';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            }
        }

        // Auto close alerts setelah 5 detik
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.custom-alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    if (alert.parentNode) {
                        closeAlert(alert.id);
                    }
                }, 5000);
            });
        });
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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    
    <script>
        AOS.init({
            duration: 1500,
        });
    </script>

    @stack('scripts')
</body>
</html>