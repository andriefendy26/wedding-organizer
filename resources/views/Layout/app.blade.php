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
    {{-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> --}}
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
        
    /* Different shooting star variants */
    .shooting-star:nth-child(1) {
        top: 10%;
        left: -100px;
        animation-duration: 3s;
        animation-delay: 0s;
    }

    .shooting-star:nth-child(2) {
        top: 20%;
        left: -100px;
        animation-duration: 4s;
        animation-delay: 2s;
    }

    .shooting-star:nth-child(3) {
        top: 30%;
        left: -100px;
        animation-duration: 2.5s;
        animation-delay: 4s;
    }

    .shooting-star:nth-child(4) {
        top: 40%;
        left: -100px;
        animation-duration: 3.5s;
        animation-delay: 1s;
    }

    .shooting-star:nth-child(5) {
        top: 60%;
        left: -100px;
        animation-duration: 4.5s;
        animation-delay: 5s;
    }

    .shooting-star:nth-child(6) {
        top: 70%;
        left: -100px;
        animation-duration: 2.8s;
        animation-delay: 3s;
    }

    .shooting-star:nth-child(7) {
        top: 80%;
        left: -100px;
        animation-duration: 3.2s;
        animation-delay: 6s;
    }

    .shooting-star:nth-child(8) {
        top: 15%;
        left: -100px;
        animation-duration: 3.8s;
        animation-delay: 7s;
    }

    /* Ensure content is above shooting stars */
    .content-wrapper {
        position: relative;
        z-index: 10;
    }

    /* Add subtle glow effect for dark theme */
    .dark .shooting-star {
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 0 6px rgba(255, 255, 255, 0.6);
    }

    .dark .shooting-star::before {
        background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 100%);
    }
    </style>
    <style>
    /* Shooting Stars Animation */
    .shooting-stars {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
    }

    .shooting-star {
        position: absolute;
        width: 2px;
        height: 2px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        opacity: 0;
        animation: shoot linear infinite;
    }

    .shooting-star::before {
        content: '';
        position: absolute;
        top: 50%;
        right: 0;
        width: 0;
        height: 1px;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.8) 100%);
        transform: translateY(-50%);
        animation: tail linear infinite;
    }

    @keyframes shoot {
        0% {
            opacity: 0;
            transform: translateX(-100px) translateY(100px);
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            transform: translateX(calc(100vw + 100px)) translateY(-100px);
        }
    }

    @keyframes tail {
        0% {
            width: 0;
        }
        10% {
            width: 50px;
        }
        90% {
            width: 50px;
        }
        100% {
            width: 0;
        }
    }

    /* Different shooting star variants */
    .shooting-star:nth-child(1) {
        top: 10%;
        left: -100px;
        animation-duration: 3s;
        animation-delay: 0s;
    }

    .shooting-star:nth-child(2) {
        top: 20%;
        left: -100px;
        animation-duration: 4s;
        animation-delay: 2s;
    }

    .shooting-star:nth-child(3) {
        top: 30%;
        left: -100px;
        animation-duration: 2.5s;
        animation-delay: 4s;
    }

    .shooting-star:nth-child(4) {
        top: 40%;
        left: -100px;
        animation-duration: 3.5s;
        animation-delay: 1s;
    }

    .shooting-star:nth-child(5) {
        top: 60%;
        left: -100px;
        animation-duration: 4.5s;
        animation-delay: 5s;
    }

    .shooting-star:nth-child(6) {
        top: 70%;
        left: -100px;
        animation-duration: 2.8s;
        animation-delay: 3s;
    }

    .shooting-star:nth-child(7) {
        top: 80%;
        left: -100px;
        animation-duration: 3.2s;
        animation-delay: 6s;
    }

    .shooting-star:nth-child(8) {
        top: 15%;
        left: -100px;
        animation-duration: 3.8s;
        animation-delay: 7s;
    }

    /* Ensure content is above shooting stars */
    .content-wrapper {
        position: relative;
        z-index: 10;
    }

    /* Add subtle glow effect for dark theme */
    .dark .shooting-star {
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 0 6px rgba(255, 255, 255, 0.6);
    }

    .dark .shooting-star::before {
        background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 100%);
    }
</style>
</head>
<body class="font-sans transition-colors duration-300 bg-gray-50 dark:bg-gray-900">
    {{-- Shooting Stars Background --}}
    <div class="shooting-stars">
        <div class="shooting-star"></div>
        <div class="shooting-star"></div>
        <div class="shooting-star"></div>
        <div class="shooting-star"></div>
        <div class="shooting-star"></div>
        <div class="shooting-star"></div>
        <div class="shooting-star"></div>
        <div class="shooting-star"></div>
    </div>
    <!-- Custom Alert HTML (tambahkan setelah tag body) -->
    @if(session('success'))
    <div id="successAlert" class="p-4 text-white shadow-2xl custom-alert success">
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
            <button onclick="closeAlert('successAlert')" class="ml-4 text-white transition-colors hover:text-gray-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div id="errorAlert" class="p-4 text-white shadow-2xl custom-alert error">
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
            <button onclick="closeAlert('errorAlert')" class="ml-4 text-white transition-colors hover:text-gray-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if($errors->any())
    <div id="validationAlert" class="p-4 text-white shadow-2xl custom-alert error">
        <div class="flex items-start justify-between">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 mt-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold">Validation Error!</h4>
                    <ul class="mt-1 space-y-1 text-sm opacity-90">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button onclick="closeAlert('validationAlert')" class="ml-4 text-white transition-colors hover:text-gray-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    @endif

    <!-- Unified Header dengan Navigation -->
    <header x-data="{ mobileMenuOpen : false }" class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 shadow-lg dark:bg-gray-900/95 dark:border-gray-700">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Main Header Content -->
            <div class="flex items-center justify-between">
                <!-- Logo/Brand -->
                <div class="flex items-center space-x-2">
                    <div class="flex items-center justify-center w-24 h-24 rounded-xl">
                        <img src={{ asset('storage/content/Logo.png') }} alt="Logo 3Rasa">
                    </div>
                    {{-- <div class="hidden sm:block">
                        <h1 class="text-xl font-bold text-gray-900 edu-vic-wa-nt-hand dark:text-white">
                            <span class="text-[#B2110E]">3</span>
                            <span class="text-[#D1A64A]">Rasa</span> --}}
                             {{-- Production</h1> --}}
                        {{-- <p class="text-sm text-gray-600 dark:text-gray-400">Production</p> --}}
                    {{-- </div> --}}
                    <div class="hidden sm:block">
                        <span class="text-xl font-bold text-gray-900 edu-vic-wa-nt-hand dark:text-white">
                             Event Organizer</span>
                        
                        {{-- <p class="text-sm text-gray-600 dark:text-gray-400">&</p> --}}
                        <p class="text-sm text-gray-600 dark:text-gray-400">& Wedding Organizer</p>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="items-center hidden space-x-8 lg:flex">
                    <a href="/" class="font-medium text-gray-700 transition-colors nav-link dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400">
                        Home
                    </a>
                    
                    <!-- Pages Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center space-x-1 font-medium text-gray-700 transition-colors nav-link dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400">
                            <span>Pages</span>
                            <i class="text-xs transition-transform fas fa-chevron-down group-hover:rotate-180"></i>
                        </button>
                        
                        <div class="absolute left-0 invisible mt-2 opacity-0 top-full group-hover:opacity-100 group-hover:visible dropdown-transition">
                            <div class="py-2 bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 min-w-48 backdrop-blur-md">
                                <a href="/tentang" class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600">
                                    <i class="w-4 mr-3 fas fa-info-circle"></i>
                                    Tentang Kami
                                </a>
                                <a href="/layanan" class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600">
                                    <i class="w-4 mr-3 fas fa-concierge-bell"></i>
                                    Layanan
                                </a>
                                <a href="/galery" class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600">
                                    <i class="w-4 mr-3 fas fa-images"></i>
                                    Galery
                                </a>
                                <a href="/portofolio" class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600">
                                    <i class="w-4 mr-3 fas fa-images"></i>
                                    Portofolio
                                </a>
                                <hr class="my-1 border-gray-200 dark:border-gray-600">
                                <a href="/team" class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600">
                                    <i class="w-4 mr-3 fas fa-users"></i>
                                    Tim Kami
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="/artikel" class="font-medium text-gray-700 transition-colors nav-link dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400">
                        Artikel
                    </a>
                    <a href="/faq" class="font-medium text-gray-700 transition-colors nav-link dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400">
                        FAQ
                    </a>
                    <a href="/kalender" class="font-medium text-gray-700 transition-colors nav-link dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400">
                        Kalender
                    </a>
                    <a href="/kontak" class="font-medium text-gray-700 transition-colors nav-link dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400">
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
                            class="flex items-center px-3 py-2 space-x-2 text-sm font-medium text-gray-700 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500"
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
                            class="absolute right-0 z-50 w-48 mt-2 bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700"
                        >
                            <div class="py-1">
                                <template x-for="language in languages" :key="language.code">
                                    <button
                                        @click="setLanguage(language)"
                                        class="flex items-center w-full px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-red-600"
                                        :class="currentLanguage.code === language.code ? 'bg-red-50 dark:bg-red-900/20 text-red-600' : ''"
                                    >
                                        <img :src="language.flag" :alt="language.name" class="w-5 h-4 mr-3 rounded-sm">
                                        <span x-text="language.name"></span>
                                        <i x-show="currentLanguage.code === language.code" class="ml-auto text-red-600 fas fa-check"></i>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div> --}}
                    
                    <!-- Dark Mode Toggle -->
                    <div class="flex items-center space-x-2">
                        <span class="hidden text-sm text-gray-600 dark:text-gray-400 md:inline">
                            <i class="fas fa-sun"></i>
                        </span>
                        
                        <button 
                            @click="darkMode = !darkMode"
                            class="relative inline-flex items-center h-6 rounded-full w-11 toggle-bg focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900"
                            :class="darkMode ? 'bg-red-600' : 'bg-gray-300'"
                            type="button"
                            role="switch"
                            :aria-checked="darkMode"
                        >
                            <span class="sr-only">Toggle dark mode</span>
                            <span 
                                class="inline-block w-4 h-4 transition duration-300 ease-in-out transform bg-white rounded-full shadow-lg toggle-dot"
                                :class="darkMode ? 'translate-x-6' : 'translate-x-0.5'"
                            >
                            </span>
                        </button>
                        
                        <span class="hidden text-sm text-gray-600 dark:text-gray-400 md:inline">
                            <i class="fas fa-moon"></i>
                        </span>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button 
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        class="relative z-50 flex flex-col items-center justify-center w-8 h-8 lg:hidden focus:outline-none"
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
                <nav class="flex flex-col pt-4 pb-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
                    <a href="/" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 text-gray-700 transition-colors rounded-lg dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <i class="w-5 mr-3 fas fa-home"></i>
                        Home
                    </a>
                    
                    <!-- Mobile Pages Section -->
                    <div x-data="{ pagesOpen: false }">
                        <button 
                            @click="pagesOpen = !pagesOpen"
                            class="flex items-center justify-between w-full px-4 py-2 text-gray-700 transition-colors rounded-lg dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                        >
                            <div class="flex items-center">
                                <i class="w-5 mr-3 fas fa-file-alt"></i>
                                Pages
                            </div>
                            <i class="transition-transform fas fa-chevron-down" :class="pagesOpen ? 'rotate-180' : ''"></i>
                        </button>
                        
                        <div x-show="pagesOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-y-0"
                             x-transition:enter-end="opacity-100 scale-y-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-y-100"
                             x-transition:leave-end="opacity-0 scale-y-0"
                             class="mt-2 ml-4 space-y-1 origin-top">
                            <a href="/tentang" 
                               @click="mobileMenuOpen = false"
                               class="block px-4 py-2 text-sm text-gray-600 transition-colors rounded-lg dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-800">
                                <i class="w-4 mr-3 fas fa-info-circle"></i>
                                Tentang Kami
                            </a>
                            <a href="/layanan" 
                               @click="mobileMenuOpen = false"
                               class="block px-4 py-2 text-sm text-gray-600 transition-colors rounded-lg dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-800">
                                <i class="w-4 mr-3 fas fa-concierge-bell"></i>
                                Layanan
                            </a>
                            <a href="/portofolio" 
                               @click="mobileMenuOpen = false"
                               class="block px-4 py-2 text-sm text-gray-600 transition-colors rounded-lg dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-800">
                                <i class="w-4 mr-3 fas fa-images"></i>
                                Portofolio
                            </a>
                            <a href="/galery" 
                               @click="mobileMenuOpen = false"
                               class="block px-4 py-2 text-sm text-gray-600 transition-colors rounded-lg dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-800">
                                <i class="w-4 mr-3 fas fa-images"></i>
                                Galery
                            </a>
                            <a href="/team" 
                               @click="mobileMenuOpen = false"
                               class="block px-4 py-2 text-sm text-gray-600 transition-colors rounded-lg dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-800">
                                <i class="w-4 mr-3 fas fa-users"></i>
                                Tim Kami
                            </a>
                        </div>
                    </div>

                    <a href="/artikel" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 text-gray-700 transition-colors rounded-lg dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <i class="w-5 mr-3 fas fa-newspaper"></i>
                        Artikel
                    </a>
                    <a href="/faq" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 text-gray-700 transition-colors rounded-lg dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <i class="w-5 mr-3 fas fa-question-circle"></i>
                        FAQ
                    </a>
                    <a href="/kalender" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 text-gray-700 transition-colors rounded-lg dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <i class="w-5 mr-3 fas fa-calendar-alt"></i>
                        Kalender
                    </a>
                    <a href="/kontak" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 text-gray-700 transition-colors rounded-lg dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <i class="w-5 mr-3 fas fa-envelope"></i>
                        Kontak
                    </a>
                </nav>
            </div>
        </div>
    </header>

    {{-- <div></div> --}}
    @yield('content')
    
    <!-- Footer Section -->
    <footer class="relative overflow-hidden text-white bg-gray-800">
        <!-- Background decoration -->
        <div class="absolute inset-0 bg-[url('{{ asset('storage/content/decoration01.jpeg') }}')] bg-no-repeat bg-cover bg-center opacity-5"
            style="background: url({{ asset('storage/content/decoration01.jpeg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;"
        ></div>
        
        <div class="relative z-10 px-10 py-16 lg:px-32">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 gap-12 mb-12 md:grid-cols-4">
                
                <!-- Brand Section -->
                <div class="col-span-1 md:col-span-2">
                    <div class="mb-6">
                        <h3 class="mb-4 text-4xl text-white edu-vic-wa-nt-hand-500">3Rasa</h3>
                        <p class="text-lg leading-relaxed text-gray-300 pt-serif-regular-italic">
                            Wujudkan momen spesial Anda bersama kami. Dari pesta pernikahan yang elegan, event korporat profesional, hingga penyewaan dekorasi eksklusif — semua kami siapkan dengan sepenuh hati.
                        </p>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="flex gap-4">
                        <a href="https://www.instagram.com/3rasa_production/" class="group">
                            <div class="flex items-center justify-center w-12 h-12 transition-all duration-300 border-2 border-gray-600 rounded-full hover:border-primary hover:scale-110">
                                <x-bi-instagram class="w-5 h-5 transition-colors duration-300 group-hover:text-primary" />
                            </div>
                        </a>
                        <a href="#" class="group">
                            <div class="flex items-center justify-center w-12 h-12 transition-all duration-300 border-2 border-gray-600 rounded-full hover:border-primary hover:scale-110">
                                <x-bi-telephone class="w-5 h-5 transition-colors duration-300 group-hover:text-primary" />
                            </div>
                        </a>
                        <a href="#" class="group">
                            <div class="flex items-center justify-center w-12 h-12 transition-all duration-300 border-2 border-gray-600 rounded-full hover:border-primary hover:scale-110">
                                <x-bi-tiktok class="w-5 h-5 transition-colors duration-300 group-hover:text-primary" />
                            </div>
                        </a>
                        <a href="#" class="group">
                            <div class="flex items-center justify-center w-12 h-12 transition-all duration-300 border-2 border-gray-600 rounded-full hover:border-primary hover:scale-110">
                                <x-bi-whatsapp class="w-5 h-5 transition-colors duration-300 group-hover:text-primary" />
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="mb-6 text-xl text-white edu-vic-wa-nt-hand-500">Layanan Kami</h4>
                    <ul class="space-y-3 poppins-regular">
                        <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-primary hover:tracking-wider">Wedding Organizer</a></li>
                        <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-primary hover:tracking-wider">Dekorasi Pernikahan</a></li>
                        <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-primary hover:tracking-wider">Event Korporat</a></li>
                        <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-primary hover:tracking-wider">Sewa Perlengkapan</a></li>
                        <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-primary hover:tracking-wider">Dokumentasi</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="mb-6 text-xl text-white edu-vic-wa-nt-hand-500">Kontak</h4>
                    <div class="space-y-4 poppins-regular">
                        <div class="flex items-start gap-3">
                            <div class="flex items-center justify-center w-6 h-6 mt-1 rounded-full bg-primary">
                                <x-heroicon-o-map-pin class="w-3 h-3 text-white" />
                            </div>
                            <div>
                                <p class="text-sm text-gray-300">Jl. Contoh No. 123</p>
                                <p class="text-sm text-gray-300">Tarakan, Kalimantan Utara</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <div class="flex items-center justify-center w-6 h-6 rounded-full bg-primary">
                                <x-heroicon-o-phone class="w-3 h-3 text-white" />
                            </div>
                            <p class="text-sm text-gray-300">+62 812-3456-7890</p>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <div class="flex items-center justify-center w-6 h-6 rounded-full bg-primary">
                                <x-heroicon-o-envelope class="w-3 h-3 text-white" />
                            </div>
                            <p class="text-sm text-gray-300">info@3rasa.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter Section -->
            <div class="pt-8 mb-8 border-t border-gray-700">
                <div class="grid items-center grid-cols-1 gap-8 md:grid-cols-2">
                    <div>
                        <h4 class="mb-2 text-2xl text-white edu-vic-wa-nt-hand-500">Dapatkan Update Terbaru</h4>
                        <p class="text-gray-300 pt-serif-regular-italic">Berlangganan newsletter kami untuk mendapatkan tips pernikahan dan penawaran spesial</p>
                    </div>
                    <div class="flex gap-4">
                        <form method="POST" action="{{ route('subscribe') }}">
                            @csrf
                            <input type="email" name="email" id="email" required placeholder="Masukkan email Anda"
                            class="flex-1 px-4 py-3 text-white placeholder-gray-400 transition-colors duration-300 bg-gray-800 border border-gray-600 rounded-xl focus:border-primary focus:outline-none">
                            <button type="submit" class="px-6 py-3 text-white transition-all duration-300 bg-primary rounded-xl edu-vic-wa-nt-hand-500 hover:scale-105 hover:tracking-wider">
                                Berlangganan
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Customer Testimonial Banner -->
            <div class="p-6 mb-8 border bg-gradient-to-r from-primary/20 to-transparent rounded-2xl border-primary/30">
                <div class="flex items-center gap-6">
                    <div class="text-center">
                        <div class="text-4xl edu-vic-wa-nt-hand-500 text-primary">100+</div>
                        <div class="text-sm text-gray-300 pt-serif-regular">Pasangan Bahagia</div>
                    </div>
                    <div class="flex-1">
                        <p class="text-lg text-white pt-serif-regular-italic">
                            "Terima kasih 3Rasa telah membuat hari pernikahan kami menjadi sempurna dan tak terlupakan"
                        </p>
                        <p class="mt-2 text-sm text-primary edu-vic-wa-nt-hand-500">- Pasangan yang Puas</p>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="pt-8 border-t border-gray-700">
                <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                    <div class="flex gap-6 text-sm poppins-regular">
                        <a href="#" class="text-gray-300 transition-colors duration-300 hover:text-primary">Kebijakan Privasi</a>
                        <a href="#" class="text-gray-300 transition-colors duration-300 hover:text-primary">Syarat & Ketentuan</a>
                        <a href="/faq" class="text-gray-300 transition-colors duration-300 hover:text-primary">FAQ</a>
                    </div>
                    <div class="text-sm text-gray-400 poppins-regular">
                        © 2025 3Rasa Wedding Organizer. All rights reserved.
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute bottom-0 right-0 w-64 h-64 opacity-10">
            <div class="w-full h-full rounded-full bg-gradient-to-tl from-primary/30 to-transparent"></div>
        </div>
    </footer>

    <!-- Call to Action Floating Button -->
    <div class="fixed z-50 bottom-6 right-6">
        <button class="p-4 text-white transition-all duration-300 rounded-full shadow-lg group bg-primary hover:scale-110 hover:shadow-2xl">
             <a href="https://api.whatsapp.com/send/?phone={{ $phoneNumber }}&text={{ $encodedMessage }}&type=phone_number&app_absent=0" target="_blank">
                <div class="flex items-center gap-3">
                    <x-bi-whatsapp class="w-6 h-6" />
                        <span class="hidden pr-2 transition-all duration-300 group-hover:block edu-vic-wa-nt-hand-500">
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

    {{-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1500,
        });
    </script> --}}

    @stack('scripts')
</body>
</html>