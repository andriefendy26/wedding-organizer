@extends('Layout.app')

@section('head')
    <meta charset="UTF-8" />
    <title>Tentang Kami | 3Rasa Event Organizer Tarakan</title>
    <meta name="description" content="3Rasa Event Organizer di Tarakan adalah penyedia layanan perencanaan dan penyelenggaraan acara profesional, siap membantu mewujudkan momen istimewa Anda dengan konsep kreatif dan tim berpengalaman." />

    <meta name="keywords" content="tentang 3Rasa Event Organizer, profil 3Rasa Event Organizer Tarakan, event organizer Tarakan, wedding organizer Tarakan, jasa dekorasi Tarakan, jasa MC Tarakan, fotografer Tarakan, videografer Tarakan, EO profesional Tarakan" />

    <meta name="author" content="3Rasa Event Organizer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.3rasaeventorganizer.com/tentang-kami" />
    <link rel="icon" type="image/png" href="{{ asset('storage/content/Logo.png') }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/tentang-kami" />
    <meta property="og:title" content="Tentang Kami | 3Rasa Event Organizer Tarakan" />
    <meta property="og:description" content="Kenali 3Rasa Event Organizer, tim profesional di Tarakan yang mengutamakan kreativitas, detail, dan pelayanan terbaik untuk setiap acara Anda." />
    <meta property="og:image" content="{{ asset('storage/content/Logo.png') }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Tentang Kami | 3Rasa Event Organizer Tarakan" />
    <meta name="twitter:description" content="Profil dan cerita 3Rasa Event Organizer Tarakan, tim berpengalaman yang siap membantu mewujudkan acara impian Anda." />
    <meta name="twitter:image" content="{{ asset('storage/content/Logo.png') }}" />
@endsection



@section('content')
<div class="w-full h-[80vh]" style="background-image: url('{{ asset('storage/content/gif05.gif') }}');background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="absolute h-[80vh] inset-0 bg-black/50"></div>
    <div class="relative grid items-center justify-center h-full grid-cols-1 gap-8 px-4 md:grid-cols-2 md:px-8 lg:px-16 xl:px-32">
        {{-- Hero Section --}}
        <div class="flex flex-col items-center justify-center">
            <h2 class="mb-4 text-3xl font-semibold tracking-wide text-white md:text-4xl edu-vic-wa-nt-hand">
                {{ __('app.hero.title') }} 
                <span 
                id="typewriter" 
                class="font-bold text-transparent bg-gradient-to-r from-yellow-500 via-orange-500 to-pink-500 bg-clip-text"
                data-word1="{{ __('app.hero.slide1_title') }}" 
                data-word2="{{ __('app.hero.slide2_title') }}"
                data-word3="{{ __('app.hero.slide3_title') }}"
                data-word4="{{ __('app.hero.slide4_title') }}"
                data-word5="{{ __('app.hero.slide5_title') }}"
                data-word6="{{ __('app.hero.slide6_title') }}"
                data-word7="{{ __('app.hero.slide7_title') }}"
                data-word8="{{ __('app.hero.slide8_title') }}"
                data-word9="{{ __('app.hero.slide9_title') }}"
                data-word10="{{ __('app.hero.slide10_title') }}"
                > 
            </span>
                {{ __('app.hero.slide11_title') }}
            </h2>
        
            <p class="my-6 text-sm text-gray-200 md:text-lg pt-serif-regular-italic">{{ __('app.hero.description') }}</p>
        </div>
        <div class="flex items-center justify-center">
            {{-- Logo --}}
            <img class="object-cover w-64 md:w-96 flip-on-load" src="{{ asset('storage/content/Logo.png') }}" alt="3Rasa Production">
        </div>
    </div>
</div>


<div class="min-h-screen overflow-hidden pt-14">
    {{-- Logo & Company Introduction Section --}}
    <div class="px-10 py-16 md:px-16 lg:px-24 xl:px-32">
        <div class="mx-auto ">
            {{-- Logo & Title --}}
            <div data-aos="fade-down" class="mb-12 text-center">
                <div class="flex justify-center mb-8">
                    <img src="{{ asset('storage/content/Logo.png') }}" 
                         alt="3Rasa Event Organizer Logo" 
                         class="object-contain w-32 h-32 transition-transform duration-300 md:w-96 md:h-96 drop-shadow-lg hover:scale-105">
                </div>
                <h1 class="mb-4 text-4xl font-semibold dark:text-white md:text-6xl edu-vic-wa-nt-hand">
                    {{ __('app.tentang_page.sub_hero.title') }}
                </h1>
                <div class="w-24 h-1 mx-auto mb-6 bg-gradient-to-r from-primary to-red-600"></div>
                <p class="max-w-3xl mx-auto text-lg leading-relaxed text-gray-600 md:text-xl dark:text-gray-300 pt-serif-regular-italic">
                    {{ __('app.tentang_page.sub_hero.subtitle') }}
                </p>
            </div>

            {{-- Company Overview --}}
            <div data-aos="fade-up" class="grid items-center gap-12 md:grid-cols-2">
                <div>
                    <h2 class="mb-6 text-3xl font-semibold text-black md:text-4xl dark:text-white edu-vic-wa-nt-hand">
                        {{ __('app.tentang_page.tentang.title') }}
                    </h2>
                    <div class="space-y-4 text-gray-700 dark:text-gray-300 pt-serif-regular">
                        <p class="text-lg leading-relaxed">
                            {{ __('app.tentang_page.tentang.description.p1') }}
                        </p>
                        <p class="text-lg leading-relaxed">
                            {{ __('app.tentang_page.tentang.description.p2') }}
                        </p>
                        {{-- <p class="text-lg leading-relaxed">
                            {{ __('app.tentang_page.tentang.description.p3') }}
                        </p> --}}
                    </div>
                </div>
                <div class="relative ">
                    <img src="{{ asset('storage/content/wedding07.jpg') }}" 
                         alt="3Rasa Event Organizer Services" 
                         class="w-full h-auto shadow-2xl rounded-2xl">
                    <div class="absolute p-6 text-center bg-white border border-gray-200 shadow-xl -bottom-6 -right-6 dark:bg-gray-700 rounded-xl dark:border-gray-600">
                        {{-- <x-solar-cup-broken class="w-10 h-10 text-black dark:text-white" /> --}}
                        <img src={{ asset("storage/content/medal.png") }} alt="Logo Mendal 3Rasa" class="w-10 h-10 mx-auto mb-2">
                        <div class="text-3xl font-bold text-black edu-vic-wa-nt-hand dark:text-white">
                            <span class="counter" data-target={{ 13 }}></span> 
                            <span class="text-primary">+</span></div>
                        <div class="text-gray-600 dark:text-gray-300 pt-serif-regular">Tahun Pengalaman</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Vision & Mission --}}
    <div class="grid grid-cols-2 gap-10 px-10 py-16 mb-20 md:px-16 lg:px-24 xl:px-32">
        <div data-aos="fade-up"  class="p-8 bg-gray-100 dark:bg-gray-700 rounded-2xl">
            <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-primary">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
            </div>
            <h3 class="mb-4 text-3xl text-black edu-vic-wa-nt-hand dark:text-white">{{ __('app.tentang_page.visimisi.visi.title') }}</h3>
            <p class="leading-relaxed text-gray-700 dark:text-gray-300 pt-serif-regular">
               {{ __('app.tentang_page.visimisi.visi.description') }}
            </p>
        </div>
        
        <div data-aos="fade-down"  class="p-8 bg-gray-100 dark:bg-gray-700 rounded-2xl">
            <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-primary">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <h3 class="mb-4 text-3xl text-black edu-vic-wa-nt-hand dark:text-white"> {{ __('app.tentang_page.visimisi.misi.title') }}</h3>
            <p class="leading-relaxed text-gray-700 dark:text-gray-300 pt-serif-regular">
                 {{ __('app.tentang_page.visimisi.misi.description') }}
            </p>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="px-10 md:px-16 lg:px-24 xl:px-32">

    

        {{-- Our Values --}}
        <div data-aos="fade-up"  class="mb-20">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-5xl text-black edu-vic-wa-nt-hand dark:text-white">{{ __('app.tentang_page.nilai.head.title') }}</h2>
                <p class="max-w-3xl mx-auto text-xl text-gray-700 dark:text-gray-300 pt-serif-regular-italic">
                    {{ __('app.tentang_page.nilai.head.subtitle') }}
                </p>
            </div>
            
            <div class="grid grid-cols-3 gap-8">
                <div class="text-center transition-all duration-300 group hover:scale-105">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-300 rounded-full bg-gradient-to-br from-primary to-red-700 group-hover:shadow-xl">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5 2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" />
                        </svg>
                    </div>
                    <h3 class="mb-3 text-2xl text-black edu-vic-wa-nt-hand-500 dark:text-white">{{ __('app.tentang_page.nilai.card.card1.title') }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                        {{ __('app.tentang_page.nilai.card.card1.description') }}
                    </p>
                </div>
                
                <div class="text-center transition-all duration-300 group hover:scale-105">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-300 rounded-full bg-gradient-to-br from-primary to-red-700 group-hover:shadow-xl">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5,16L3,14L5,12L6.5,13.5L11,9L12.5,10.5L6.5,16.5L5,16M19,7H22V9H19V12H17V9H14V7H17V4H19V7M17,17V15H15V17H17M13,17V15H11V17H13M9,17V15H7V17H9Z" />
                        </svg>
                    </div>
                    <h3 class="mb-3 text-2xl text-black edu-vic-wa-nt-hand-500 dark:text-white">{{ __('app.tentang_page.nilai.card.card2.title') }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                        {{ __('app.tentang_page.nilai.card.card2.description') }}
                    </p>
                </div>
                
                <div class="text-center transition-all duration-300 group hover:scale-105">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-300 rounded-full bg-gradient-to-br from-primary to-red-700 group-hover:shadow-xl">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" />
                        </svg>
                    </div>
                    <h3 class="mb-3 text-2xl text-black edu-vic-wa-nt-hand-500 dark:text-white">{{ __('app.tentang_page.nilai.card.card3.title') }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                        {{ __('app.tentang_page.nilai.card.card3.description') }}
                    </p>
                </div>
            </div>
        </div>


        {{-- Why Choose Us --}}
        <div data-aos="fade-up" class="pb-20">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-5xl text-black edu-vic-wa-nt-hand dark:text-white">{{ __('app.tentang_page.mengapa.head.title') }}</h2>
                <p class="max-w-3xl mx-auto text-xl text-gray-700 dark:text-gray-300 pt-serif-regular-italic">
                    {{ __('app.tentang_page.mengapa.head.subtitle') }}
                </p>
            </div>
            
            <div class="grid grid-cols-2 gap-8">
                <div class="flex gap-6 p-6 transition-all duration-300 bg-white shadow-lg dark:bg-gray-700 rounded-2xl hover:shadow-xl">
                    <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 bg-primary rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 text-xl text-black poppins-medium dark:text-white">{{ __('app.tentang_page.mengapa.card.card1.title') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                            {{ __('app.tentang_page.mengapa.card.card1.description') }}
                        </p>
                    </div>
                </div>
                
                <div class="flex gap-6 p-6 transition-all duration-300 bg-white shadow-lg dark:bg-gray-700 rounded-2xl hover:shadow-xl">
                    <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 bg-primary rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 text-xl text-black poppins-medium dark:text-white">{{ __('app.tentang_page.mengapa.card.card2.title') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                            {{ __('app.tentang_page.mengapa.card.card2.description') }}
                        </p>
                    </div>
                </div>
                
                <div class="flex gap-6 p-6 transition-all duration-300 bg-white shadow-lg dark:bg-gray-700 rounded-2xl hover:shadow-xl">
                    
                    <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 bg-primary rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 text-xl text-black poppins-medium dark:text-white">{{ __('app.tentang_page.mengapa.card.card3.title') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                            {{ __('app.tentang_page.mengapa.card.card3.description') }}
                        </p>
                    </div>
                </div>
                
                <div class="flex gap-6 p-6 transition-all duration-300 bg-white shadow-lg dark:bg-gray-700 rounded-2xl hover:shadow-xl">
                    <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 bg-primary rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 text-xl text-black poppins-medium dark:text-white">{{ __('app.tentang_page.mengapa.card.card4.title') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                            {{ __('app.tentang_page.mengapa.card.card4.description') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

@push('styles')
<style>

    /* Smooth animations */
    * {
        scroll-behavior: smooth;
    }

    /* Loading animation for images */
    img {
        transition: opacity 0.3s ease-in-out;
    }

    img[loading="lazy"] {
        opacity: 0;
    }

    img[loading="lazy"].loaded {
        opacity: 1;
    }

    /* Enhanced hover effects */
    .group:hover .group-hover\:shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--color-primary);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #8b0a08;
    }

    /* Dark mode scrollbar */
    .dark ::-webkit-scrollbar-track {
        background: #374151;
    }

    /* Parallax effect for hero section */
    .parallax-bg {
        transform: translateZ(0);
        will-change: transform;
    }

    /* Counter animation */
    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-count {
        animation: countUp 0.6s ease-out forwards;
    }

    /* Stagger animations for team cards */
    .team-card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .team-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .team-card:nth-child(3) {
        animation-delay: 0.3s;
    }

    /* Fade in animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    /* Button pulse animation */
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(178, 17, 14, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(178, 17, 14, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(178, 17, 14, 0);
        }
    }

    .btn-pulse:hover {
        animation: pulse 2s infinite;
    }

    /* Gradient text animation */
    @keyframes gradientShift {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .gradient-text {
        background: linear-gradient(-45deg, var(--color-primary), #ff6b6b, var(--color-primary), #ff8e8e);
        background-size: 400% 400%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 3s ease infinite;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .px-30 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .grid-cols-2 {
            grid-template-columns: 1fr;
        }

        .grid-cols-3 {
            grid-template-columns: 1fr;
        }

        .grid-cols-4 {
            grid-template-columns: repeat(2, 1fr);
        }

        .text-6xl {
            font-size: 3rem;
        }

        .text-5xl {
            font-size: 2.5rem;
        }

        .gap-20 {
            gap: 2rem;
        }

        .gap-10 {
            gap: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .grid-cols-4 {
            grid-template-columns: 1fr;
        }

        .text-6xl {
            font-size: 2.5rem;
        }

        .text-5xl {
            font-size: 2rem;
        }

        .px-30 {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".counter");

        const animateCount = (counter) => {
            const target = +counter.getAttribute("data-target");
            let count = 0;
            const increment = target / 100; // durasi = 100 step

            const updateCounter = () => {
                count += increment;
                if (count < target) {
                    counter.textContent = Math.floor(count);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target; // pastikan akhir sama persis
                }
            };

            updateCounter();
        };

        // Efek hanya jalan saat elemen masuk viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCount(entry.target);
                    observer.unobserve(entry.target); // sekali jalan
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    });
</script>
@endpush

@endsection