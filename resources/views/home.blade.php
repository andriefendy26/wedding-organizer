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

@extends('Layout.app')


{{-- @section('title', 'Home') --}}
@section('head')
    <meta charset="UTF-8" />
    <title>Home | 3Rasa Event Organizer Tarakan</title>
    <meta name="description" content="3Rasa Event Organizer di Tarakan menyediakan layanan perencanaan dan penyelenggaraan acara profesional." />

    <meta name="keywords" content="event organizer Tarakan, jasa EO Tarakan, wedding organizer Tarakan, sewa dekorasi Tarakan, jasa dekorasi pernikahan Tarakan, jasa sewa sound system Tarakan, event pernikahan Tarakan, event ulang tahun Tarakan, EO profesional Tarakan, 3Rasa Event Organizer, jasa MC Tarakan, jasa fotografer Tarakan, jasa videografer Tarakan, event kantor Tarakan, acara perusahaan Tarakan" />

    <meta name="author" content="3Rasa Event Organizer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.3rasaeventorganizer.com/" />
    <link rel="icon" type="image/png" href={{ asset('storage/content/Logo.png') }} />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/" />
    <meta property="og:title" content="3Rasa Event Organizer | Tarakan" />
    <meta property="og:description" content="Layanan event organizer profesional di Tarakan. Kami membantu merencanakan dan menyelenggarakan acara impian Anda dengan konsep unik dan berkesan." />
    <meta property="og:image" content={{ asset('storage/content/wedding11.jpg') }} />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="3Rasa Event Organizer | Tarakan" />
    <meta name="twitter:description" content="Event organizer terpercaya di Tarakan. Layanan profesional untuk pernikahan, ulang tahun, dan event perusahaan." />
    <meta name="twitter:image" content={{ asset('storage/content/wedding11.jpg') }} />
@endsection

@section('content')
<div class="w-full h-screen" style="background-image: url('{{ asset('storage/content/gif05.gif') }}');background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative flex items-center justify-center w-full h-full text-center content">
        <div class="flex flex-col items-center justify-center">
            <img class="object-cover w-64 md:w-96 flip-on-load" src="{{ asset('storage/content/Logo.png') }}" alt="3Rasa Production">
            <h2 class="lg:w-[40%] text-white text-3xl md:text-4xl tracking-wide font-semibold mb-4 edu-vic-wa-nt-hand">
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
            
            <p class="lg:w-[50%] my-6 text-gray-200 text-sm md:text-lg pt-serif-regular-italic">{{ __('app.hero.description') }}</p>
            <div class="flex items-start justify-center gap-3 text-sm font-semibold md:text-lg edu-vic-wa-nt-hand-500">
                <a href="https://api.whatsapp.com/send/?phone={{ $phoneNumber }}&text={{ $encodedMessage }}&type=phone_number&app_absent=0" target="_blank">
                    <button class="p-2 px-5 tracking-wide text-black transition-all duration-300 bg-white rounded-xl hover:tracking-widest hover:px-8">
                        {{ __('app.hero.consultation_button') }}
                </a>

            </div>
        </div>
    </div>
</div>

<!-- Team Stats Section -->
<div data-aos="zoom-in-down" class="relative px-4 my-20 overflow-hidden md:px-8">
    <!-- Gradient Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800"></div>
    
    <!-- Diagonal Lines Pattern -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(
            45deg,
            transparent,
            transparent 10px,
            rgba(0,0,0,0.1) 10px,
            rgba(0,0,0,0.1) 12px
        );"></div>
    </div>
    
    <!-- Horizontal Lines Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(
            0deg,
            transparent,
            transparent 20px,
            rgba(0,0,0,0.15) 20px,
            rgba(0,0,0,0.15) 21px
        );"></div>
    </div>
    
    <!-- Vertical Lines Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(
            90deg,
            transparent,
            transparent 30px,
            rgba(0,0,0,0.1) 30px,
            rgba(0,0,0,0.1) 31px
        );"></div>
    </div>
    
    <!-- Decorative Corner Lines -->
    <div class="absolute top-0 left-0 w-32 h-32 opacity-30">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(
            -45deg,
            transparent,
            transparent 8px,
            rgba(251, 146, 60, 0.3) 8px,
            rgba(251, 146, 60, 0.3) 10px
        );"></div>
    </div>
    
    <div class="absolute bottom-0 right-0 w-32 h-32 opacity-30">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(
            45deg,
            transparent,
            transparent 8px,
            rgba(236, 72, 153, 0.3) 8px,
            rgba(236, 72, 153, 0.3) 10px
        );"></div>
    </div>
    
    <div class="relative z-10 mx-auto max-w-7xl">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $stats = [
                    [
                        'value' => 500,
                        'label' => __('app.stat.label1'),
                        'icon' => 'handshake',
                        'suffix' => '+'
                    ],
                    [
                        'value' => 2000,
                        'label' => __('app.stat.label2'),
                        'icon' => 'users',
                        'suffix' => '+'
                    ],
                    [
                        'value' => 100,
                        'label' => __('app.stat.label3'),
                        'icon' => 'award',
                        'suffix' => '%'
                    ],
                    [
                        'value' => 99,
                        'label' => __('app.stat.label4'),
                        'icon' => 'target',
                        'suffix' => '%'
                    ],
                ];
            @endphp

            @foreach($stats as $index => $stat)
                <div class="flex flex-col items-center p-8 text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1 min-h-[280px] justify-center">

                    <!-- Professional Icon Container -->
                    <div class="relative mb-6">
                        <!-- Icon Background dengan gradient -->
                        <div class="relative flex items-center justify-center w-20 h-20 overflow-hidden rounded-2xl bg-gradient-to-br from-yellow-100 via-orange-100 to-pink-100 dark:from-yellow-900/20 dark:via-orange-900/20 dark:to-pink-900/20">
                            
                            <!-- Subtle Pattern Overlay dengan gradient colors -->
                            <div class="absolute inset-0 opacity-30" 
                                 style="background-image: repeating-linear-gradient(45deg, transparent, transparent 4px, rgba(251, 146, 60, 0.1) 4px, rgba(251, 146, 60, 0.1) 8px);"></div>
                            
                            <!-- Additional Line Pattern for Icon -->
                            <div class="absolute inset-0 opacity-20" 
                                 style="background-image: repeating-linear-gradient(-45deg, transparent, transparent 6px, rgba(236, 72, 153, 0.15) 6px, rgba(236, 72, 153, 0.15) 7px);"></div>
                            
                            <!-- Professional Icons dengan gradient stroke -->
                            @if($stat['icon'] == 'handshake')
                                <svg class="relative z-10 w-10 h-10 transition-transform duration-300 group-hover:scale-110" 
                                     fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <defs>
                                        <linearGradient id="gradient{{ $index }}" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#EAB308"/>
                                            <stop offset="50%" style="stop-color:#FB923C"/>
                                            <stop offset="100%" style="stop-color:#EC4899"/>
                                        </linearGradient>
                                    </defs>
                                    <path stroke="url(#gradient{{ $index }})" stroke-linecap="round" stroke-linejoin="round" 
                                          d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                                </svg>
                            @elseif($stat['icon'] == 'users')
                                <svg class="relative z-10 w-10 h-10 transition-transform duration-300 group-hover:scale-110" 
                                     fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <defs>
                                        <linearGradient id="gradient{{ $index }}" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#EAB308"/>
                                            <stop offset="50%" style="stop-color:#FB923C"/>
                                            <stop offset="100%" style="stop-color:#EC4899"/>
                                        </linearGradient>
                                    </defs>
                                    <path stroke="url(#gradient{{ $index }})" stroke-linecap="round" stroke-linejoin="round" 
                                          d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                                </svg>
                            @elseif($stat['icon'] == 'award')
                                <svg class="relative z-10 w-10 h-10 transition-transform duration-300 group-hover:scale-110" 
                                     fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <defs>
                                        <linearGradient id="gradient{{ $index }}" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#EAB308"/>
                                            <stop offset="50%" style="stop-color:#FB923C"/>
                                            <stop offset="100%" style="stop-color:#EC4899"/>
                                        </linearGradient>
                                    </defs>
                                    <path stroke="url(#gradient{{ $index }})" stroke-linecap="round" stroke-linejoin="round" 
                                          d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.228a25.835 25.835 0 012.916.52 6.003 6.003 0 01-4.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                                </svg>
                            @else
                                <svg class="relative z-10 w-10 h-10 transition-transform duration-300 group-hover:scale-110" 
                                     fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <defs>
                                        <linearGradient id="gradient{{ $index }}" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#EAB308"/>
                                            <stop offset="50%" style="stop-color:#FB923C"/>
                                            <stop offset="100%" style="stop-color:#EC4899"/>
                                        </linearGradient>
                                    </defs>
                                    <path stroke="url(#gradient{{ $index }})" stroke-linecap="round" stroke-linejoin="round" 
                                          d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                            @endif
                        </div>
                    </div>

                    <!-- Counter Number dengan gradient text -->
                    <h3 class="px-20 my-4 text-4xl font-bold leading-tight text-transparent transition-transform duration-300 edu-vic-wa-nt-hand group-hover:scale-105 counter bg-gradient-to-r from-yellow-500 via-orange-500 to-pink-500 bg-clip-text" 
                        data-target="{{ $stat['value'] }}" 
                        data-suffix="{{ $stat['suffix'] }}">
                        0{{ $stat['suffix'] }}
                    </h3>
                    
                    <!-- Label dengan gradient text -->
                    <p class="text-lg font-medium leading-relaxed text-transparent pt-serif-regular bg-gradient-to-r from-yellow-600 via-orange-600 to-pink-600 bg-clip-text">
                        {{ $stat['label'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Services Section --}}
<div class="px-10 pt-20 pb-10 overflow-hidden section md:px-16 lg:px-24 xl:px-32">
    {{-- Header Instagram --}}
    <div class="mb-12 text-center">
        <div data-aos="zoom-in-down" class="relative text-black edu-vic-wa-nt-hand-500 dark:text-white">
            <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">{{ __('app.services_home.subtitle') }}</div>
            <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                {{ __('app.services_home.title') }}
            </h2>
        </div>
        <div data-aos="zoom-in-up" class="">
            {{-- <h3 class="mb-4 text-xl text-black md:text-2xl lg:text-4xl poppins-medium dark:text-white">{{ __('app.services_home.heading') }}</h3> --}}
            <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                {{ __('app.services_home.description') }}
            </p>
        </div>
    </div>

    {{-- Services Grid--}}
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            {{-- Service 1: Wedding Organizer --}}
            <div data-aos="fade-up" class="relative overflow-hidden transition-all duration-500 border rounded-3xl group bg-white/70 dark:bg-gray-800/70 border-gray-200/50 dark:border-gray-700/50 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-2">
                {{-- Image with modern overlay --}}
                <div class="relative h-48 overflow-hidden">
                    <div class="absolute inset-0 transition-transform duration-700 scale-105 group-hover:scale-100" style="background-image: url('{{ asset('storage/content/wedding11.jpg') }}'); background-size: cover; background-position: center;"></div>
                    <div class="absolute inset-0 transition-all duration-500 bg-gradient-to-t to-transparent from-black/60 via-black/20 group-hover:from-black/40"></div>
                    
                    {{-- Floating badge --}}
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1.5 text-xs font-medium tracking-wide text-white rounded-full bg-primary/90">
                            {{ __('app.services_home.wedding_organizer.popular_badge') }}
                        </span>
                    </div>
                    
                    {{-- Service icon --}}
                    <div class="absolute bottom-4 left-4">
                        <div class="flex items-center justify-center w-12 h-12 transition-transform duration-300 rounded-2xl bg-white/90 dark:bg-gray-800/90 group-hover:scale-110">
                            <x-heroicon-o-heart class="w-6 h-6 text-primary" />
                        </div>
                    </div>
                </div>
                
                {{-- Content --}}
                <div class="p-6 space-y-4">
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold text-gray-900 transition-colors duration-300 dark:text-white group-hover:text-primary">
                            {{ __('app.services_home.wedding_organizer.title') }}
                        </h3>
                        <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            {{ __('app.services_home.wedding_organizer.description') }}
                        </p>
                    </div>
                    
                    {{-- Features with modern pills --}}
                    <div class="flex flex-wrap gap-2">
                        @foreach(__('app.services_home.wedding_organizer.features') as $feature)
                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            {{ $feature }}
                        </span>
                        @endforeach
                    </div>
                    
                    {{-- CTA Button --}}
                    <a href="/layananwedding" class="block">
                        <button class="w-full px-4 py-3 text-sm font-medium transition-all duration-300 border-2 rounded-2xl border-primary text-primary dark:text-white dark:border-white hover:bg-primary hover:text-white dark:hover:bg-white dark:hover:text-gray-900 hover:shadow-lg hover:shadow-primary/25">
                            {{ __('app.services_home.wedding_organizer.button') }}
                        </button>
                    </a>
                </div>
            </div>

            {{-- Service 2: Event --}}
            <div data-aos="fade-down"  class="relative overflow-hidden transition-all duration-500 border rounded-3xl group bg-white/70 dark:bg-gray-800/70 border-gray-200/50 dark:border-gray-700/50 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-2">
                <div class="relative h-48 overflow-hidden">
                    <div class="absolute inset-0 transition-transform duration-700 scale-105 group-hover:scale-100" style="background-image: url('{{ asset('storage/content/event01.png') }}'); background-size: cover; background-position: center;"></div>
                    <div class="absolute inset-0 transition-all duration-500 bg-gradient-to-t to-transparent from-black/60 via-black/20 group-hover:from-black/40"></div>
                    
                    <div class="absolute bottom-4 left-4">
                        <div class="flex items-center justify-center w-12 h-12 transition-transform duration-300 rounded-2xl bg-white/90 dark:bg-gray-800/90 group-hover:scale-110">
                            <x-heroicon-o-heart class="w-6 h-6 text-primary" />
                        </div>
                    </div>
                </div>
                
                <div class="p-6 space-y-4">
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold text-gray-900 transition-colors duration-300 dark:text-white group-hover:text-primary">
                            {{ __('app.services_home.event_organizer.title') }}
                        </h3>
                        <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            {{ __('app.services_home.event_organizer.description') }}
                        </p>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        @foreach(__('app.services_home.event_organizer.features') as $feature)
                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            {{ $feature }}
                        </span>
                        @endforeach
                    </div>
                    <a href="/layanandekorasi" class="block">
                        <button class="w-full px-4 py-3 text-sm font-medium transition-all duration-300 border-2 rounded-2xl border-primary text-primary dark:text-white dark:border-white hover:bg-primary hover:text-white dark:hover:bg-white dark:hover:text-gray-900 hover:shadow-lg hover:shadow-primary/25">
                            {{ __('app.services_home.event_organizer.button') }}
                        </button>
                    </a>
                </div>
            </div>

            {{-- Service 3: Sewa Perlengkapan --}}
            <div data-aos="fade-left" class="relative overflow-hidden transition-all duration-500 border rounded-3xl group bg-white/70 dark:bg-gray-800/70 border-gray-200/50 dark:border-gray-700/50 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-2">
                <div class="relative h-48 overflow-hidden">
                    <div class="absolute inset-0 transition-transform duration-700 scale-105 group-hover:scale-100" style="background-image: url('{{ asset('storage/content/decoration01.jpeg') }}'); background-size: cover; background-position: center;"></div>
                    <div class="absolute inset-0 transition-all duration-500 bg-gradient-to-t to-transparent from-black/60 via-black/20 group-hover:from-black/40"></div>
                    
                    <div class="absolute bottom-4 left-4">
                        <div class="flex items-center justify-center w-12 h-12 transition-transform duration-300 rounded-2xl bg-white/90 dark:bg-gray-800/90 group-hover:scale-110">
                            <x-heroicon-o-heart class="w-6 h-6 text-primary" />
                        </div>
                    </div>
                </div>
                
                <div class="p-6 space-y-4">
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold text-gray-900 transition-colors duration-300 dark:text-white group-hover:text-primary">
                            {{ __('app.services_home.equipment_rental.title') }}
                        </h3>
                        <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            {{ __('app.services_home.equipment_rental.description') }}
                        </p>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        @foreach(__('app.services_home.equipment_rental.features') as $feature)
                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            {{ $feature }}
                        </span>
                        @endforeach
                    </div>
                    
                    <a href="/layanansewa" class="block">
                        <button class="w-full px-4 py-3 text-sm font-medium transition-all duration-300 border-2 rounded-2xl border-primary text-primary dark:text-white dark:border-white hover:bg-primary hover:text-white dark:hover:bg-white dark:hover:text-gray-900 hover:shadow-lg hover:shadow-primary/25">
                            {{ __('app.services_home.equipment_rental.button') }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
</div>


{{-- Service Overview Section --}}
<div class="px-10 py-20 pt-20 overflow-hidden md:px-16 lg:px-24 xl:px-32">
    <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
        <div data-aos="fade-right">
            <h2 class="mb-6 text-3xl font-semibold text-black lg:text-5xl edu-vic-wa-nt-hand dark:text-white">
                {{ __('app.overview.title') }}
            </h2>
            <p class="mb-6 text-lg leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">
                {{ __('app.overview.description1') }}
            </p>
            <p class="mb-8 text-lg leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">
                {{ __('app.overview.description2') }}
            </p>
            
            <div class="grid grid-cols-2 gap-6 mb-8">
                <div class="p-4 text-center bg-gray-100 rounded-2xl dark:bg-gray-700">
                    <h3 class="text-2xl font-bold text-primary edu-vic-wa-nt-hand-500">{{ __('app.overview.stats.decorations') }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">{{ __('app.overview.stats.decorations_label') }}</p>
                </div>
                <div class="p-4 text-center bg-gray-100 rounded-2xl dark:bg-gray-700">
                    <h3 class="text-2xl font-bold text-primary edu-vic-wa-nt-hand-500">{{ __('app.overview.stats.experience') }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">{{ __('app.overview.stats.experience_label') }}</p>
                </div>
            </div>
        </div>
        
        <div data-aos="fade-left" class="relative">
            <div class="grid grid-cols-2 gap-4">
                <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Dekorasi 1" class="object-cover w-full h-48 shadow-lg rounded-2xl">
                <img src="{{ asset('storage/content/decoration11.jpg') }}" alt="Dekorasi 2" class="object-cover w-full h-32 mt-16 shadow-lg rounded-2xl">
                <img src="{{ asset('storage/content/decoration13.jpg') }}" alt="Dekorasi 3" class="object-cover w-full h-32 shadow-lg rounded-2xl">
                <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Dekorasi 4" class="object-cover w-full h-48 shadow-lg rounded-2xl">
            </div>
            
            {{-- Floating card --}}
            <div class="absolute p-6 bg-white border border-gray-200 shadow-xl -bottom-6 -left-6 rounded-2xl dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-primary">
                        <x-heroicon-o-sparkles class="w-6 h-6 text-white" />
                    </div>
                    <div>
                        <h4 class="font-bold text-black dark:text-white">{{ __('app.overview.floating_card.title') }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ __('app.overview.floating_card.subtitle') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Galery --}}
<div class="px-10 py-20 pt-20 overflow-hidden md:px-16 lg:px-24 xl:px-32">
    {{-- Header Galery --}}
    <div class="mb-12 text-center">
        <div data-aos="zoom-in-down" class="relative text-black edu-vic-wa-nt-hand-500 dark:text-white">
            {{-- <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">{{ __('app.services_home.subtitle') }}</div> --}}
            <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                {{ __('gallery.header.title') }}
            </h2>
        </div>
        <div data-aos="zoom-in-up" class="">
            {{-- <h3 class="mb-4 text-xl text-black md:text-2xl lg:text-4xl poppins-medium dark:text-white">{{ __('app.services_home.heading') }}</h3> --}}
            <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                {{ __('gallery.header.subtitle') }}
            </p>
        </div>
    </div>
    {{-- Portfolio Grid --}}
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3" id="portfolio-grid">
        
        @if($allImage->count() > 0) 
        @foreach ($allImage as $image) 
            <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
                <div class="relative overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ $image['foto_url'] }}" alt="{{ $image['nama'] }}" 
                        class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        <div class="absolute text-white bottom-6 left-6">
                            <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ $image['nama'] }}</h3>
                            <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">{{ __('gallery.wedding_category') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        {{-- Wedding Projects --}}
        <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
            <div class="relative overflow-hidden shadow-lg rounded-xl">
                <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="{{ __('gallery.alt_wedding_adat_bugis') }}" 
                        class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-6 left-6">
                        <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.wedding_adat_bugis') }}</h3>
                        <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_rina_andi') }}</p>
                        <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">{{ __('gallery.wedding_category') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
            <div class="relative overflow-hidden shadow-lg rounded-xl">
                <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="{{ __('gallery.alt_wedding_modern') }}" 
                        class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-6 left-6">
                        <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.wedding_modern') }}</h3>
                        <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_sarah_budi') }}</p>
                        <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">{{ __('gallery.wedding_category') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
            <div class="relative overflow-hidden shadow-lg rounded-xl">
                <img src="{{ asset('storage/content/wedding04.jpg') }}" alt="{{ __('gallery.alt_wedding_outdoor') }}" 
                        class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-6 left-6">
                        <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.wedding_outdoor') }}</h3>
                        <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_maya_doni') }}</p>
                        <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">{{ __('gallery.wedding_category') }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Decoration Projects --}}
        <div class="cursor-pointer portfolio-item decoration group" data-category="decoration">
            <div class="relative overflow-hidden shadow-lg rounded-xl">
                <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="{{ __('gallery.alt_decoration_elegant') }}" 
                        class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-6 left-6">
                        <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.decoration_elegant') }}</h3>
                        <p class="text-sm pt-serif-regular-italic">{{ __('gallery.theme_gold_white') }}</p>
                        <span class="inline-block px-3 py-1 mt-2 text-xs bg-purple-500 rounded-full">{{ __('gallery.decoration_category') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="cursor-pointer portfolio-item decoration group" data-category="decoration">
            <div class="relative overflow-hidden shadow-lg rounded-xl">
                <img src="{{ asset('storage/content/decoration.jpg') }}" alt="{{ __('gallery.alt_decoration_traditional') }}" 
                        class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-6 left-6">
                        <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.decoration_traditional') }}</h3>
                        <p class="text-sm pt-serif-regular-italic">{{ __('gallery.theme_kalimantan') }}</p>
                        <span class="inline-block px-3 py-1 mt-2 text-xs bg-purple-500 rounded-full">{{ __('gallery.decoration_category') }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Corporate Events --}}
        <div class="cursor-pointer portfolio-item corporate group" data-category="corporate">
            <div class="relative overflow-hidden shadow-lg rounded-xl">
                <img src="{{ asset('storage/content/wedding05.jpeg') }}" alt="{{ __('gallery.alt_corporate_meeting') }}" 
                        class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-6 left-6">
                        <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.corporate_meeting') }}</h3>
                        <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_borneo_sejahtera') }}</p>
                        <span class="inline-block px-3 py-1 mt-2 text-xs bg-blue-500 rounded-full">{{ __('gallery.corporate_category') }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Additional Items --}}
        <div class="cursor-pointer portfolio-item wedding group" data-category="wedding">
            <div class="relative overflow-hidden shadow-lg rounded-xl">
                <img src="{{ asset('storage/content/wedding01.jpg') }}" alt="{{ __('gallery.alt_wedding_indoor') }}" 
                        class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-6 left-6">
                        <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.wedding_indoor') }}</h3>
                        <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_lina_agus') }}</p>
                        <span class="inline-block px-3 py-1 mt-2 text-xs rounded-full bg-primary">{{ __('gallery.wedding_category') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="cursor-pointer portfolio-item decoration group" data-category="decoration">
            <div class="relative overflow-hidden shadow-lg rounded-xl">
                <img src="{{ asset('storage/content/decoration04.png') }}" alt="{{ __('gallery.alt_decoration_minimalist') }}" 
                        class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-6 left-6">
                        <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.decoration_minimalist') }}</h3>
                        <p class="text-sm pt-serif-regular-italic">{{ __('gallery.theme_modern_clean') }}</p>
                        <span class="inline-block px-3 py-1 mt-2 text-xs bg-purple-500 rounded-full">{{ __('gallery.decoration_category') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="cursor-pointer portfolio-item corporate group" data-category="corporate">
            <div class="relative overflow-hidden shadow-lg rounded-xl">
                <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="{{ __('gallery.alt_product_launch') }}" 
                        class="object-cover w-full transition-transform duration-500 h-80 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-6 left-6">
                        <h3 class="text-xl font-semibold edu-vic-wa-nt-hand">{{ __('gallery.product_launch') }}</h3>
                        <p class="text-sm pt-serif-regular-italic">{{ __('gallery.client_tech_company') }}</p>
                        <span class="inline-block px-3 py-1 mt-2 text-xs bg-blue-500 rounded-full">{{ __('gallery.corporate_category') }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

</div>

{{-- Testimoni --}}
<div class="px-10 mt-10 overflow-hidden md:px-16 lg:px-24 xl:px-32">
    <div  class="mb-12 text-center">
        <div data-aos="zoom-in-down" class="relative text-black edu-vic-wa-nt-hand-500 dark:text-white">
            <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">{{ __('app.testimoni.subtitle') }}</div>
            <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                {{ __('app.testimoni.title') }}
            </h2>
        </div>
        <div data-aos="zoom-in-up" class="">
            {{-- <h3 class="mb-4 text-xl text-black md:text-2xl lg:text-4xl poppins-medium dark:text-white">{{ __('app.testimoni.heading') }}</h3> --}}
            <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                {{ __('app.testimoni.description') }}
            </p>
        </div>
    </div>


    {{-- Marquee testimoni --}}

    <div class="mt-10 marquee-container">
        {{-- marquee ke kiri --}}
        <div class="flex mb-8 space-x-6 whitespace-nowrap marquee-left">
            @foreach($testimoni as $testimonial)
                <div class="flex-shrink-0 p-6 bg-white border-2 border-gray-300 shadow-lg rounded-xl max-w-80">
                    <div class="flex items-center mb-4">
                            @if (!empty($testimonial->foto) && file_exists(public_path('storage/' . $testimonial->foto)))
                                <!-- Foto tersedia -->
                                <img 
                                    src="{{ asset('storage/' . $testimonial->foto) }}" 
                                    alt="{{ $testimonial->nama }}" 
                                    class="object-cover w-12 h-12 border border-gray-300 rounded-full"
                                >
                            @else
                                <!-- Tidak ada foto → tampilkan inisial -->
                                @php
                                    $initials = collect(explode(' ', $testimonial->nama))
                                                    ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                                                    ->join('');
                                @endphp
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-pink-500">
                                    <span class="text-lg font-bold text-white">{{ $initials }}</span>
                                </div>
                            @endif
                        <div class="ml-3">
                            <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                            <p class="text-sm text-gray-500">
                                    <!-- Rating dalam bentuk ikon bintang -->
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-700 whitespace-normal">{{ Str::limit($testimonial->deskripsi, 100, '...') }}</p>
                </div>
            @endforeach
            @foreach($testimoni as $testimonial)
                <div class="flex-shrink-0 p-6 bg-white border-2 border-gray-300 shadow-lg rounded-xl max-w-80">
                    <div class="flex items-center mb-4">
                            @if (!empty($testimonial->foto) && file_exists(public_path('storage/' . $testimonial->foto)))
                                <!-- Foto tersedia -->
                                <img 
                                    src="{{ asset('storage/' . $testimonial->foto) }}" 
                                    alt="{{ $testimonial->nama }}" 
                                    class="object-cover w-12 h-12 border border-gray-300 rounded-full"
                                >
                            @else
                                <!-- Tidak ada foto → tampilkan inisial -->
                                @php
                                    $initials = collect(explode(' ', $testimonial->nama))
                                                    ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                                                    ->join('');
                                @endphp
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-pink-500">
                                    <span class="text-lg font-bold text-white">{{ $initials }}</span>
                                </div>
                            @endif
                        <div class="ml-3">
                            <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                            <p class="text-sm text-gray-500">
                                    <!-- Rating dalam bentuk ikon bintang -->
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-700 whitespace-normal">{{ Str::limit($testimonial->deskripsi, 100, '...') }}</p>
                </div>
            @endforeach
        </div>
        {{-- marquee ke kanan --}}
        <div class="flex space-x-6 whitespace-nowrap marquee-right">
            @foreach($testimoni as $testimonial)
                <div class="flex-shrink-0 p-6 bg-white border-2 border-gray-300 shadow-lg rounded-xl max-w-80">
                    <div class="flex items-center mb-4">
                            @if (!empty($testimonial->foto) && file_exists(public_path('storage/' . $testimonial->foto)))
                                <!-- Foto tersedia -->
                                <img 
                                    src="{{ asset('storage/' . $testimonial->foto) }}" 
                                    alt="{{ $testimonial->nama }}" 
                                    class="object-cover w-12 h-12 border border-gray-300 rounded-full"
                                >
                            @else
                                <!-- Tidak ada foto → tampilkan inisial -->
                                @php
                                    $initials = collect(explode(' ', $testimonial->nama))
                                                    ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                                                    ->join('');
                                @endphp
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-pink-500">
                                    <span class="text-lg font-bold text-white">{{ $initials }}</span>
                                </div>
                            @endif
                        <div class="ml-3">
                            <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                            <p class="text-sm text-gray-500">
                                    <!-- Rating dalam bentuk ikon bintang -->
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-700 whitespace-normal">{{ Str::limit($testimonial->deskripsi, 100, '...') }}</p>
                </div>
            @endforeach
            @foreach($testimoni as $testimonial)
                <div class="flex-shrink-0 p-6 bg-white border-2 border-gray-300 shadow-lg rounded-xl max-w-80">
                    <div class="flex items-center mb-4">
                            @if (!empty($testimonial->foto) && file_exists(public_path('storage/' . $testimonial->foto)))
                                <!-- Foto tersedia -->
                                <img 
                                    src="{{ asset('storage/' . $testimonial->foto) }}" 
                                    alt="{{ $testimonial->nama }}" 
                                    class="object-cover w-12 h-12 border border-gray-300 rounded-full"
                                >
                            @else
                                <!-- Tidak ada foto → tampilkan inisial -->
                                @php
                                    $initials = collect(explode(' ', $testimonial->nama))
                                                    ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                                                    ->join('');
                                @endphp
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-pink-500">
                                    <span class="text-lg font-bold text-white">{{ $initials }}</span>
                                </div>
                            @endif
                        <div class="ml-3">
                            <h3 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h3>
                            <p class="text-sm text-gray-500">
                                    <!-- Rating dalam bentuk ikon bintang -->
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-700 whitespace-normal">{{ Str::limit($testimonial->deskripsi, 100, '...') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Instagram Section --}} 
<div class="px-10 pt-10 overflow-hidden md:px-16 lg:px-24 xl:px-32">
    {{-- Header Instagram --}}
    <div  class="mb-12 text-center">
        <div data-aos="zoom-in-down" class="relative text-black edu-vic-wa-nt-hand-500 dark:text-white">
            <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">{{ __('app.instagram.subtitle') }}</div>
            <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                {{ __('app.instagram.title') }}
            </h2>
        </div>
        <div data-aos="zoom-in-up" class="">
            {{-- <h3 class="mb-4 text-xl text-black md:text-2xl lg:text-4xl poppins-medium dark:text-white">{{ __('app.instagram.heading') }}</h3> --}}
            <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                {{ __('app.instagram.description') }}
            </p>
        </div>
    </div>


    {{-- Instagram Profile Card --}}
    <div data-aos="zoom-in-down" class="p-1 mx-auto mb-8 bg-gradient-to-br from-purple-500 to-orange-400 rounded-2xl via-primary">
        <div class="p-6 bg-white rounded-2xl dark:bg-gray-800">
            <div class="flex items-center justify-around mb-4 ">
                <img src="{{ $profile->profile_image_url }}" 
                    alt="{{ $profile->username }}" 
                    class="object-cover w-20 h-20 rounded-full ">
                <div class="flex items-center max-w-md">
                    {{-- Foto profil --}}

                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-black dark:text-white">
                            {{ $profile->display_name ?? $profile->username }}
                            @if($profile->is_verified)
                                ✅
                            @endif
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $profile->bio }}
                        </p>
                    </div>
                </div>
                <a href="{{ $profile->full_instagram_url }}" target="_blank"
                class="items-center justify-center hidden px-4 py-2 transition-all duration-300 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 lg:flex group hover:scale-105">
                    <x-bi-instagram class="w-5 h-5 mr-2 text-black dark:text-white" />
                    <span class="font-semibold text-black dark:text-white">
                        {{ __('app.instagram.profile.follow_button') }}
                    </span>
                </a>
            </div>
            
            <div class="grid grid-cols-3 gap-4 text-center">
                <div>
                    <p class="text-xl font-bold text-black dark:text-white">
                        {{ $profile->posts_formatted }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('app.instagram.profile.stats.posts') }}
                    </p>
                </div>
                <div>
                    <p class="text-xl font-bold text-black dark:text-white">
                        {{ $profile->followers_formatted }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('app.instagram.profile.stats.followers') }}
                    </p>
                </div>
                <div>
                    <p class="text-xl font-bold text-black dark:text-white">
                        {{ $profile->following_formatted }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('app.instagram.profile.stats.following') }}
                    </p>
                </div>
            </div>
        </div>
    </div>


    {{-- Instagram Feed Grid --}}
    <div class="grid grid-cols-1 gap-6 pb-8 md:grid-cols-2 lg:grid-cols-3">
        {{-- Instagram Post 1 --}}
        @if ($instagramPost->count())
            @foreach ($instagramPost as $item)
            <div data-aos="zoom-in-up" class="relative overflow-hidden transition-all duration-300 bg-white border-2 border-gray-200 shadow-lg rounded-2xl group dark:border-gray-700 dark:bg-gray-800 hover:shadow-xl">
                <div class="flex items-center justify-center bg-gradient-to-br from-purple-100 to-pink-100 aspect-square dark:from-gray-700 dark:to-gray-600">
                    <img src={{ asset('storage/'.$item['img']) }} alt="Wedding Post" class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 bg-black/0 group-hover:bg-black/60 group-hover:opacity-100">
                    <div class="text-center text-white">
                        <div class="flex items-center justify-center mb-2 space-x-6">
                            <div class="flex items-center">
                                <x-heroicon-o-heart class="w-6 h-6 mr-1" />
                                <span class="font-semibold">{{ asset($item['like']) }}</span>
                            </div>
                            <div class="flex items-center">
                                <x-heroicon-o-chat-bubble-oval-left class="w-6 h-6 mr-1" />
                                <span class="font-semibold">{{ $item['comment'] }}</span>
                            </div>
                        </div>
                        <p class="text-sm font-medium">{{ $item['title']}}</p>
                    </div>
                </div>
                {{-- Instagram post header --}}
                <div class="absolute flex items-center justify-between top-4 right-4 left-4">
                    <div class="flex items-center">
                        <div class="p-0.5 w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full">
                            <div class="flex items-center justify-center w-full h-full bg-white rounded-full">
                                <span class="text-xs font-bold text-primary">3R</span>
                            </div>
                        </div>
                        <span class="px-2 py-1 ml-2 text-sm font-semibold text-white rounded-full bg-black/50">3rasa_wedding</span>
                    </div>
                    <x-heroicon-o-ellipsis-horizontal class="w-6 h-6 text-white" />
                </div>
            </div>
            @endforeach
        @else
            <p class="col-span-3 text-center">Tidak ada postingan Instagram.</p>
        @endif
        
    </div>
</div>




@push('styles')
<style>
/* Simple dot pattern background */
.simple-dots {
    background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,0.15) 1px, transparent 0);
    background-size: 20px 20px;
}

/* Counter animation */
.counter {
    display: inline-block;
}

/* Hover effects */
.group:hover .counter {
    animation: bounce-number 0.6s ease-in-out;
}

@keyframes bounce-number {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}
</style>
<style>
    @keyframes showcontent {
        from {
            opacity: 0;
            transform: translate(0, 50px);
            filter: blur(33px);
        }
        to {
            opacity: 1;
            transform: translate(0, 0);
            filter: blur(0);
        }
    }

    /* Marquee animations */
    @keyframes marquee-left {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    @keyframes marquee-right {
        0% { transform: translateX(-50%); }
        100% { transform: translateX(0); }
    }
    .marquee-left {
        animation: marquee-left 20s linear infinite;
    }
    .marquee-right {
        animation: marquee-right 20s linear infinite;
    }
    .marquee-container {
        overflow: hidden;
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

<!-- Typewriter Animation -->


<script>
    document.getElementById('next').onclick = function(){
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').appendChild(lists[0]);
    }

    document.getElementById('prev').onclick = function(){
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').prepend(lists[lists.length - 1]);
    }
</script>

    {{-- <script>
        // Fireworks System
        class FireworksSystem {
            constructor() {
                this.container = document.getElementById('fireworksContainer');
                this.colors = [
                    '#000000', '#333333', '#666666', '#999999', 
                    '#cccccc', '#ffffff'
                ];
                this.lastScrollY = window.scrollY;
                this.scrollThreshold = 50;
                this.fireworkCount = 0;
                this.maxFireworks = 3;
                
                this.init();
            }

            init() {
                window.addEventListener('scroll', () => this.handleScroll());
            }

            handleScroll() {
                const currentScrollY = window.scrollY;
                const scrollDelta = Math.abs(currentScrollY - this.lastScrollY);
                
                if (scrollDelta > this.scrollThreshold && this.fireworkCount < this.maxFireworks) {
                    this.createFirework();
                    this.lastScrollY = currentScrollY;
                }
                
                this.updateScrollProgress();
            }

            createFirework() {
                if (this.fireworkCount >= this.maxFireworks) return;
                
                this.fireworkCount++;
                
                const x = Math.random() * window.innerWidth;
                const y = Math.random() * window.innerHeight * 0.7 + window.innerHeight * 0.15;
                
                // Create trail first
                this.createTrail(x, y);
                
                // Then create explosion
                setTimeout(() => {
                    this.createExplosion(x, y);
                    setTimeout(() => {
                        this.fireworkCount--;
                    }, 2000);
                }, 500);
            }

            createTrail(x, y) {
                const trail = document.createElement('div');
                trail.style.position = 'absolute';
                trail.style.left = x + 'px';
                trail.style.top = (window.innerHeight + 50) + 'px';
                trail.style.width = '3px';
                trail.style.height = '20px';
                trail.style.background = 'linear-gradient(to top, ' + this.getRandomColor() + ', transparent)';
                trail.style.borderRadius = '50%';
                trail.style.animation = `trail 0.8s ease-out forwards`;
                trail.style.transform = `translateY(${window.innerHeight - y + 50}px)`;
                
                this.container.appendChild(trail);
                
                setTimeout(() => {
                    if (trail.parentNode) {
                        trail.parentNode.removeChild(trail);
                    }
                }, 1000);
            }

            createExplosion(x, y) {
                const particleCount = 25 + Math.random() * 15;
                const baseColor = this.getRandomColor();
                
                for (let i = 0; i < particleCount; i++) {
                    this.createParticle(x, y, baseColor, i * 360 / particleCount);
                }
                
                // Create center flash
                this.createFlash(x, y, baseColor);
            }

            createParticle(x, y, baseColor, angle) {
                const particle = document.createElement('div');
                const distance = 80 + Math.random() * 120;
                const size = 2 + Math.random() * 4;
                
                const dx = Math.cos(angle * Math.PI / 180) * distance;
                const dy = Math.sin(angle * Math.PI / 180) * distance;
                
                particle.style.position = 'absolute';
                particle.style.left = (x - size/2) + 'px';
                particle.style.top = (y - size/2) + 'px';
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.backgroundColor = this.getColorVariation(baseColor);
                particle.style.borderRadius = '50%';
                particle.style.boxShadow = `0 0 ${size * 2}px ${baseColor}`;
                particle.style.setProperty('--dx', dx + 'px');
                particle.style.setProperty('--dy', dy + 'px');
                particle.style.animation = `particle ${1.5 + Math.random() * 0.5}s ease-out forwards`;
                
                this.container.appendChild(particle);
                
                setTimeout(() => {
                    if (particle.parentNode) {
                        particle.parentNode.removeChild(particle);
                    }
                }, 2500);
            }

            createFlash(x, y, color) {
                const flash = document.createElement('div');
                flash.style.position = 'absolute';
                flash.style.left = (x - 15) + 'px';
                flash.style.top = (y - 15) + 'px';
                flash.style.width = '30px';
                flash.style.height = '30px';
                flash.style.background = `radial-gradient(circle, ${color} 0%, transparent 70%)`;
                flash.style.borderRadius = '50%';
                flash.style.animation = 'explode 1s ease-out forwards';
                
                this.container.appendChild(flash);
                
                setTimeout(() => {
                    if (flash.parentNode) {
                        flash.parentNode.removeChild(flash);
                    }
                }, 1000);
            }

            getRandomColor() {
                return this.colors[Math.floor(Math.random() * this.colors.length)];
            }

            getColorVariation(baseColor) {
                // Create slight variations of the base color
                const variations = [baseColor, baseColor + '80', baseColor + 'cc'];
                return variations[Math.floor(Math.random() * variations.length)];
            }

            updateScrollProgress() {
                const scrollProgress = document.getElementById('scrollProgress');
                const scrollPercent = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
                scrollProgress.style.width = scrollPercent + '%';
            }
        }

        // Section Animation System
        class SectionAnimator {
            constructor() {
                this.sections = document.querySelectorAll('.section');
                this.init();
            }

            init() {
                window.addEventListener('scroll', () => this.animateSections());
                // Initial check
                this.animateSections();
            }

            animateSections() {
                this.sections.forEach(section => {
                    const rect = section.getBoundingClientRect();
                    const isVisible = rect.top < window.innerHeight * 0.75 && rect.bottom > window.innerHeight * 0.25;
                    
                    if (isVisible) {
                        section.classList.add('active');
                    } else {
                        section.classList.remove('active');
                    }
                });
            }
        }

        // Initialize Systems
        document.addEventListener('DOMContentLoaded', () => {
            new FireworksSystem();
            new SectionAnimator();
            
            // Welcome firework
            setTimeout(() => {
                const fireworks = new FireworksSystem();
                fireworks.createFirework();
            }, 1000);
        });

        // Prevent context menu for better UX
        document.addEventListener('contextmenu', (e) => {
            e.preventDefault();
        });
    </script> --}}
@endpush
@endsection
