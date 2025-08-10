@php
    $phoneNumber = config('app.phone');
    $message = <<<TEXT
    ==============================
    *HALO, SAYA INGIN KONSULTASI*
    ==============================

    Halo *3Rasa Production* 👋

    Saya tertarik untuk berkonsultasi mengenai layanan Event Organizer.

    🙏 Terima kasih atas waktunya.
    📩 Pesan ini dikirim via: https://3rasaproduction.com
TEXT;

    $encodedMessage = urlencode($message);
@endphp

@extends('Layout.app')

@section('head')
    <meta charset="UTF-8" />
    <title>Event Organizer | 3Rasa Event Organizer Tarakan</title>
    <meta name="description" content="Layanan Event Organizer profesional di Tarakan. Perencanaan acara lengkap dari konsep hingga eksekusi yang sempurna." />
    <meta name="keywords" content="event organizer Tarakan, jasa EO Tarakan, perencanaan acara Tarakan, event perusahaan Tarakan, acara ulang tahun Tarakan, koordinasi acara, 3Rasa Event Organizer" />
    <meta name="author" content="3Rasa Event Organizer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Event Organizer | 3Rasa Event Organizer Tarakan" />
    <meta property="og:description" content="Layanan perencanaan acara profesional dan terorganisir untuk berbagai jenis event di Tarakan." />
    <meta property="og:image" content="https://www.3rasaeventorganizer.com/storage/content/event01.png" />
@endsection

@section('content')

{{-- Main Content --}}
<div class="px-4 pt-32  md:px-16 lg:px-24 xl:px-32">
    
    {{-- Service Overview --}}
    <section id="layanan-detail" class="py-20">
        <div class="grid items-center grid-cols-1 gap-16 lg:grid-cols-2">
            <div data-aos="fade-right">
                <div class="relative mb-8 text-black edu-vic-wa-nt-hand-500 dark:text-white">
                    <div class="mb-4 text-lg text-gray-500 dark:text-gray-400">Layanan Unggulan Kami</div>
                    <h2 class="text-4xl font-bold lg:text-6xl">Event Organizer</h2>
                </div>
                
                <p class="mb-6 text-lg leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">
                    Kami menghadirkan solusi lengkap untuk setiap kebutuhan acara Anda. Dari perencanaan konsep hingga eksekusi di hari H, tim profesional kami siap mewujudkan visi acara impian Anda.
                </p>
                
                <p class="mb-8 text-lg leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">
                    Dengan pengalaman bertahun-tahun dan jaringan vendor terpercaya, kami memastikan setiap detail acara berjalan sempurna sesuai ekspektasi Anda.
                </p>
                
                {{-- Key Features --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-2xl">
                        <div class="flex items-center justify-center w-12 h-12 bg-primary/10 rounded-xl">
                            <x-heroicon-o-light-bulb class="w-6 h-6 text-primary" />
                        </div>
                        <div>
                            <h3 class="font-semibold text-black dark:text-white">Konsep Kreatif</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Ide-ide fresh dan inovatif untuk acara yang berkesan</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-2xl">
                        <div class="flex items-center justify-center w-12 h-12 bg-primary/10 rounded-xl">
                            <x-heroicon-o-users class="w-6 h-6 text-primary" />
                        </div>
                        <div>
                            <h3 class="font-semibold text-black dark:text-white">Tim Profesional</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Koordinator berpengalaman yang menguasai bidangnya</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-2xl">
                        <div class="flex items-center justify-center w-12 h-12 bg-primary/10 rounded-xl">
                            <x-heroicon-o-clock class="w-6 h-6 text-primary" />
                        </div>
                        <div>
                            <h3 class="font-semibold text-black dark:text-white">Tepat Waktu</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Manajemen waktu yang presisi dan deadline yang terjaga</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div data-aos="fade-left" class="relative">
                <div class="grid grid-cols-2 gap-6">
                    <img src="{{ asset('storage/content/event01.png') }}" alt="Event 1" class="object-cover w-full h-48 shadow-lg rounded-2xl">
                    <img src="{{ asset('storage/content/wedding11.jpg') }}" alt="Event 2" class="object-cover w-full h-32 mt-16 shadow-lg rounded-2xl">
                    <img src="{{ asset('storage/content/decoration13.jpg') }}" alt="Event 3" class="object-cover w-full h-32 shadow-lg rounded-2xl">
                    <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Event 4" class="object-cover w-full h-48 shadow-lg rounded-2xl">
                </div>
                
                {{-- Floating Stats Card --}}
                <div class="absolute p-6 bg-white border border-gray-200 shadow-xl -bottom-6 -left-6 dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <div class="text-center">
                        <h4 class="text-3xl font-bold text-primary edu-vic-wa-nt-hand-500">200+</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Event Sukses</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Services Offered --}}
    <section class="px-4 py-20 -mx-4 bg-gray-50 dark:bg-gray-900 md:-mx-16 lg:-mx-24 xl:-mx-32 md:px-16 lg:px-24 xl:px-32">
        <div class="mb-16 text-center">
            <div data-aos="zoom-in-down" class="relative text-black edu-vic-wa-nt-hand-500 dark:text-white">
                <div class="text-lg absolute top-[30%] left-[30%] text-gray-500 dark:text-gray-400">Apa Yang Kami Tawarkan</div>
                <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                    LAYANAN
                </h2>
            </div>
            <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
                <h3 class="mb-4 text-2xl text-black md:text-3xl lg:text-5xl poppins-medium dark:text-white">Paket Event Organizer</h3>
                <p class="max-w-3xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                    Berbagai pilihan layanan yang dapat disesuaikan dengan kebutuhan dan budget acara Anda
                </p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            {{-- Corporate Event --}}
            <div data-aos="fade-up" class="p-8 transition-all duration-500 bg-white border border-gray-200 shadow-lg group dark:bg-gray-800 rounded-3xl hover:shadow-2xl hover:-translate-y-2 dark:border-gray-700">
                <div class="mb-6">
                    <div class="flex items-center justify-center w-16 h-16 mb-4 transition-transform duration-300 bg-primary rounded-2xl group-hover:scale-110">
                        <x-heroicon-o-building-office class="w-8 h-8 text-black dark:text-white" />
                    </div>
                    <h3 class="text-2xl font-bold text-black transition-colors dark:text-white edu-vic-wa-nt-hand group-hover:text-primary">Corporate Event</h3>
                </div>
                
                <ul class="mb-8 space-y-3 text-gray-600 dark:text-gray-300">
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Seminar & Workshop</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Meeting & Conference</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Team Building</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Product Launching</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Company Anniversary</span>
                    </li>
                </ul>
                
                <div class="text-center">
                    <p class="mb-4 text-gray-500 dark:text-gray-400">Mulai dari</p>
                    <div class="mb-6 text-3xl font-bold text-primary edu-vic-wa-nt-hand">Rp 15.000.000</div>
                    <button class="w-full px-6 py-3 font-semibold text-black transition-all duration-300 border-2 border-primary text-primary hover:bg-primary hover:text-white dark:bg-primary dark:text-white rounded-2xl hover:from-emerald-600 hover:to-teal-700">
                        Pilih Paket
                    </button>
                </div>
            </div>
            
            {{-- Social Event --}}
            <div data-aos="fade-up" data-aos-delay="200" class="relative p-8 transition-all duration-500 bg-white border border-gray-200 shadow-lg group dark:bg-gray-800 rounded-3xl hover:shadow-2xl hover:-translate-y-2 dark:border-gray-700">
                <div class="mt-4 mb-6">
                    <div class="flex items-center justify-center w-16 h-16 mb-4 transition-transform duration-300 bg-primary rounded-2xl group-hover:scale-110">
                        <x-heroicon-o-heart class="w-8 h-8 text-black dark:text-white" />
                    </div>
                    <h3 class="text-2xl font-bold text-black transition-colors dark:text-white edu-vic-wa-nt-hand group-hover:text-primary">Social Event</h3>
                </div>
                
                <ul class="mb-8 space-y-3 text-gray-600 dark:text-gray-300">
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Birthday Party</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Graduation Party</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Family Gathering</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Reunion Event</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Anniversary Celebration</span>
                    </li>
                </ul>
                
                <div class="text-center">
                    <p class="mb-4 text-gray-500 dark:text-gray-400">Mulai dari</p>
                    <div class="mb-6 text-3xl font-bold text-primary edu-vic-wa-nt-hand">Rp 8.000.000</div>
                    <button class="w-full px-6 py-3 font-semibold text-black transition-all duration-300 border-2 border-primary text-primary hover:bg-primary hover:text-white dark:bg-primary dark:text-white rounded-2xl hover:from-emerald-600 hover:to-teal-700">
                        Pilih Paket
                    </button>
                </div>
            </div>
            
            {{-- Custom Event --}}
            <div data-aos="fade-up" data-aos-delay="400" class="p-8 transition-all duration-500 bg-white border border-gray-200 shadow-lg group dark:bg-gray-800 rounded-3xl hover:shadow-2xl hover:-translate-y-2 dark:border-gray-700">
                <div class="mb-6">
                    <div class="flex items-center justify-center w-16 h-16 mb-4 transition-transform duration-300 bg-primary rounded-2xl group-hover:scale-110">
                        <x-heroicon-o-cog-6-tooth class="w-8 h-8 text-black dark:text-white" />
                    </div>
                    <h3 class="text-2xl font-bold text-black transition-colors dark:text-white edu-vic-wa-nt-hand group-hover:text-primary">Custom Event</h3>
                </div>
                
                <ul class="mb-8 space-y-3 text-gray-600 dark:text-gray-300">
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Konsep Sesuai Keinginan</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Tema Custom</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Dekorasi Eksklusif</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Entertainment Khusus</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5 text-green-500" />
                        <span>Full Customization</span>
                    </li>
                </ul>
                
                <div class="text-center">
                    <p class="mb-4 text-gray-500 dark:text-gray-400">Konsultasi</p>
                    <div class="mb-6 text-2xl font-bold text-primary edu-vic-wa-nt-hand">Gratis</div>
                    <button class="w-full px-6 py-3 font-semibold text-black transition-all duration-300 border-2 border-primary text-primary hover:bg-primary hover:text-white dark:bg-primary dark:text-white rounded-2xl hover:from-emerald-600 hover:to-teal-700">
                        Konsultasi Sekarang
                    </button>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Process Timeline --}}
    <section class="py-20">
        <div class="mb-16 text-center">
            <div data-aos="zoom-in-down" class="relative text-black edu-vic-wa-nt-hand-500 dark:text-white">
                <div class="text-lg absolute top-[30%] left-[38%] text-gray-500 dark:text-gray-400">Bagaimana Kami Bekerja</div>
                <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                    PROSES
                </h2>
            </div>
            <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
                <h3 class="mb-4 text-2xl text-black md:text-3xl lg:text-5xl poppins-medium dark:text-white">Langkah Demi Langkah</h3>
                <p class="max-w-3xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                    Proses kerja yang terstruktur untuk memastikan acara Anda berjalan dengan sempurna
                </p>
            </div>
        </div>
        
        <div class="relative">
            {{-- Timeline Line --}}
            <div class="absolute hidden w-1 h-full transform -translate-x-1/2 left-1/2 bg-gradient-to-b from-primary to-pink-500 lg:block"></div>
            
            {{-- Timeline Items --}}
            <div class="space-y-16">
                {{-- Step 1 --}}
                <div data-aos="fade-right" class="flex flex-col items-center gap-8 lg:flex-row">
                    <div class="lg:w-1/2 lg:text-right lg:pr-8">
                        <div class="p-8 bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-3xl dark:border-gray-700">
                            <div class="flex items-center justify-center gap-4 mb-6 lg:justify-end">
                                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Konsultasi & Brief</h3>
                                <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl">
                                    <span class="text-xl font-bold text-white">01</span>
                                </div>
                            </div>
                            <p class="leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">
                                Diskusi mendalam tentang konsep acara, budget, timeline, dan ekspektasi Anda. Kami mendengarkan setiap detail untuk memahami visi acara impian Anda.
                            </p>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <img src="{{ asset('storage/content/event01.png') }}" alt="Konsultasi" class="object-cover w-full h-64 shadow-lg rounded-2xl">
                    </div>
                </div>
                
                {{-- Step 2 --}}
                <div data-aos="fade-left" class="flex flex-col items-center gap-8 lg:flex-row-reverse">
                    <div class="lg:w-1/2 lg:text-left lg:pl-8">
                        <div class="p-8 bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-3xl dark:border-gray-700">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-primary to-pink-500 rounded-2xl">
                                    <span class="text-xl font-bold text-white">02</span>
                                </div>
                                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Perencanaan & Proposal</h3>
                            </div>
                            <p class="leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">
                                Penyusunan konsep detail, timeline, vendor selection, dan proposal lengkap. Setiap aspek acara direncanakan dengan matang dan sistematis.
                            </p>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <img src="{{ asset('storage/content/wedding11.jpg') }}" alt="Perencanaan" class="object-cover w-full h-64 shadow-lg rounded-2xl">
                    </div>
                </div>
                
                {{-- Step 3 --}}
                <div data-aos="fade-right" class="flex flex-col items-center gap-8 lg:flex-row">
                    <div class="lg:w-1/2 lg:text-right lg:pr-8">
                        <div class="p-8 bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-3xl dark:border-gray-700">
                            <div class="flex items-center justify-center gap-4 mb-6 lg:justify-end">
                                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Koordinasi & Persiapan</h3>
                                <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl">
                                    <span class="text-xl font-bold text-white">03</span>
                                </div>
                            </div>
                            <p class="leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">
                                Koordinasi dengan vendor, persiapan venue, pengaturan dekorasi, dan semua hal teknis. Tim kami memastikan semuanya siap sempurna.
                            </p>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <img src="{{ asset('storage/content/decoration13.jpg') }}" alt="Koordinasi" class="object-cover w-full h-64 shadow-lg rounded-2xl">
                    </div>
                </div>
                
                {{-- Step 4 --}}
                <div data-aos="fade-left" class="flex flex-col items-center gap-8 lg:flex-row-reverse">
                    <div class="lg:w-1/2 lg:text-left lg:pl-8">
                        <div class="p-8 bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-3xl dark:border-gray-700">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl">
                                    <span class="text-xl font-bold text-white">04</span>
                                </div>
                                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Eksekusi & Monitoring</h3>
                            </div>
                            <p class="leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">
                                Hari H tiba! Tim kami hadir sejak pagi untuk memastikan semua berjalan sesuai rencana. Monitoring ketat dari awal hingga acara selesai.
                            </p>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Eksekusi" class="object-cover w-full h-64 shadow-lg rounded-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Why Choose Us --}}
    <section class="px-4 py-20 -mx-4 bg-gray-50 dark:bg-gray-900 md:-mx-16 lg:-mx-24 xl:-mx-32 md:px-16 lg:px-24 xl:px-32">
        <div class="mb-16 text-center">
            <h2 data-aos="zoom-in-down" class="mb-6 text-3xl font-bold text-black lg:text-5xl dark:text-white edu-vic-wa-nt-hand">
                Mengapa Memilih <span class="text-primary">3Rasa</span>?
            </h2>
            <p data-aos="zoom-in-up" class="max-w-3xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                Keunggulan dan komitmen kami dalam menghadirkan acara yang tak terlupakan
            </p>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div data-aos="fade-up" class="text-center group">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-transform duration-300 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl group-hover:scale-110">
                    <x-heroicon-o-star class="w-10 h-10 text-black dark:text-white" />
                </div>
                <h3 class="mb-4 text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Pengalaman</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Lebih dari 5 tahun melayani berbagai jenis acara dengan tingkat kepuasan tinggi</p>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="200" class="text-center group">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-transform duration-300 bg-gradient-to-br from-primary to-pink-500 rounded-3xl group-hover:scale-110">
                    <x-heroicon-o-users class="w-10 h-10 text-black dark:text-white" />
                </div>
                <h3 class="mb-4 text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Tim Profesional</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Koordinator berpengalaman yang ahli dalam bidangnya masing-masing</p>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="400" class="text-center group">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-transform duration-300 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-3xl group-hover:scale-110">
                    <x-heroicon-o-shield-check class="w-10 h-10 text-black dark:text-white" />
                </div>
                <h3 class="mb-4 text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Jaminan Kualitas</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Komitmen terhadap kualitas terbaik dengan garansi kepuasan pelanggan</p>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="600" class="text-center group">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-transform duration-300 bg-gradient-to-br from-orange-500 to-red-500 rounded-3xl group-hover:scale-110">
                    <x-heroicon-o-currency-dollar class="w-10 h-10 text-black dark:text-white" />
                </div>
                <h3 class="mb-4 text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Harga Kompetitif</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Paket lengkap dengan harga terjangkau tanpa mengurangi kualitas layanan</p>
            </div>
        </div>
    </section>
    
    {{-- Portfolio Gallery --}}
    <section class="py-20">
        <div class="mb-16 text-center">
            <div data-aos="zoom-in-down" class="relative text-black edu-vic-wa-nt-hand-500 dark:text-white">
                <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">Karya Terbaik Kami</div>
                <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                    PORTOFOLIO
                </h2>
            </div>
            <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
                <h3 class="mb-4 text-2xl text-black md:text-3xl lg:text-5xl poppins-medium dark:text-white">Event Yang Telah Terlaksana</h3>
                <p class="max-w-3xl mx-auto text-lg text-gray-600 dark:text-gray-400 pt-serif-regular-italic">
                    Lihat berbagai acara sukses yang telah kami tangani dengan kepuasan penuh dari klien
                </p>
            </div>
        </div>
        
        {{-- Gallery Grid --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <div data-aos="zoom-in" class="relative overflow-hidden group rounded-2xl">
                <img src="{{ asset('storage/content/event01.png') }}" alt="Corporate Event" class="object-cover w-full transition-transform duration-500 h-72 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-4 left-4">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Corporate Meeting</h4>
                        <p class="text-sm pt-serif-regular">PT. Surya Mandiri</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="zoom-in" data-aos-delay="200" class="relative overflow-hidden group rounded-2xl">
                <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="Birthday Party" class="object-cover w-full transition-transform duration-500 h-72 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-4 left-4">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Birthday Celebration</h4>
                        <p class="text-sm pt-serif-regular">Sweet 17th Party</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="zoom-in" data-aos-delay="400" class="relative overflow-hidden group rounded-2xl">
                <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Family Gathering" class="object-cover w-full transition-transform duration-500 h-72 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-4 left-4">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Family Gathering</h4>
                        <p class="text-sm pt-serif-regular">Keluarga Besar Wijaya</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="zoom-in" class="relative overflow-hidden group rounded-2xl">
                <img src="{{ asset('storage/content/decoration13.jpg') }}" alt="Product Launch" class="object-cover w-full transition-transform duration-500 h-72 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-4 left-4">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Product Launching</h4>
                        <p class="text-sm pt-serif-regular">Tech Innovation 2024</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="zoom-in" data-aos-delay="200" class="relative overflow-hidden group rounded-2xl">
                <img src="{{ asset('storage/content/wedding11.jpg') }}" alt="Anniversary" class="object-cover w-full transition-transform duration-500 h-72 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-4 left-4">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Anniversary Event</h4>
                        <p class="text-sm pt-serif-regular">25th Wedding Anniversary</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="zoom-in" data-aos-delay="400" class="relative overflow-hidden group rounded-2xl">
                <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Graduation" class="object-cover w-full transition-transform duration-500 h-72 group-hover:scale-110">
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:opacity-100">
                    <div class="absolute text-white bottom-4 left-4">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Graduation Party</h4>
                        <p class="text-sm pt-serif-regular">Medical School Graduation</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div data-aos="fade-up" class="mt-12 text-center">
            <a href="/portofolio" class="inline-flex items-center gap-3 px-8 py-4 font-semibold text-white transition-all duration-300 border-2 bg-primary rounded-2xl hover:bg-white hover:text-primary hover:shadow-xl border-primary group">
                <span class="edu-vic-wa-nt-hand-500">Lihat Semua Portofolio</span>
                <x-heroicon-o-arrow-right class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-2" />
            </a>
        </div>
    </section>
    

</div>


@push('scripts')
{{-- AOS Animation Script --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });
</script>

{{-- Smooth Scroll --}}
<script>
    document.querySelector('a[href="#layanan-detail"]').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('#layanan-detail').scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>
@endpush

@endsection