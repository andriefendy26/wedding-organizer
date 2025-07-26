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
    <nav x-data="{ mobileMenuOpen: false }" class="flex justify-center  w-full fixed top-20 z-10">
        <div
            class="my-4 text-gray-900 dark:text-white backdrop-blur-md bg-white dark:bg-gray-800/30 rounded-full shadow-lg border border-black/10 dark:border-gray-700/40 px-6 py-3 flex items-center justify-between space-x-6"
        >
            <!-- Navigation Links (Desktop) -->
            <div class="flex items-center gap-6 text-black dark:text-white font-medium">
                <a href="/" class="hover:text-red-600 transition">Home</a>
                <a href="/" class="hover:text-red-600 transition">Pages</a>
                <a href="/" class="hover:text-red-600 transition">Artikel</a>
                <a href="/" class="hover:text-red-600 transition">FAQ</a>
                <a href="/" class="hover:text-red-600 transition">Kalender</a>
                <a href="/admin" class="hover:text-red-600 transition">Login</a>
        </div>
    </nav>
    
    @yield('content')

    
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