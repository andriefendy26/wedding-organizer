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
<div class="bg-white dark:bg-gray-800 px-4 md:px-16 lg:px-24 xl:px-32 pt-32">
    
    {{-- Service Overview --}}
    <section id="layanan-detail" class="py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="relative edu-vic-wa-nt-hand-500 text-black dark:text-white mb-8">
                    <div class="text-lg text-gray-500 dark:text-gray-400 mb-4">Layanan Unggulan Kami</div>
                    <h2 class="text-4xl lg:text-6xl font-bold">Event Organizer</h2>
                </div>
                
                <p class="text-gray-600 dark:text-gray-300 text-lg mb-6 pt-serif-regular leading-relaxed">
                    Kami menghadirkan solusi lengkap untuk setiap kebutuhan acara Anda. Dari perencanaan konsep hingga eksekusi di hari H, tim profesional kami siap mewujudkan visi acara impian Anda.
                </p>
                
                <p class="text-gray-600 dark:text-gray-300 text-lg mb-8 pt-serif-regular leading-relaxed">
                    Dengan pengalaman bertahun-tahun dan jaringan vendor terpercaya, kami memastikan setiap detail acara berjalan sempurna sesuai ekspektasi Anda.
                </p>
                
                {{-- Key Features --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-2xl">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                            <x-heroicon-o-light-bulb class="w-6 h-6 text-primary" />
                        </div>
                        <div>
                            <h3 class="font-semibold text-black dark:text-white">Konsep Kreatif</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Ide-ide fresh dan inovatif untuk acara yang berkesan</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-2xl">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                            <x-heroicon-o-users class="w-6 h-6 text-primary" />
                        </div>
                        <div>
                            <h3 class="font-semibold text-black dark:text-white">Tim Profesional</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Koordinator berpengalaman yang menguasai bidangnya</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-2xl">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                            <x-heroicon-o-clock class="w-6 h-6 text-primary" />
                        </div>
                        <div>
                            <h3 class="font-semibold text-black dark:text-white">Tepat Waktu</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Manajemen waktu yang presisi dan deadline yang terjaga</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div data-aos="fade-left" class="relative">
                <div class="grid grid-cols-2 gap-6">
                    <img src="{{ asset('storage/content/event01.png') }}" alt="Event 1" class="rounded-2xl shadow-lg h-48 w-full object-cover">
                    <img src="{{ asset('storage/content/wedding11.jpg') }}" alt="Event 2" class="rounded-2xl shadow-lg h-32 w-full object-cover mt-16">
                    <img src="{{ asset('storage/content/decoration13.jpg') }}" alt="Event 3" class="rounded-2xl shadow-lg h-32 w-full object-cover">
                    <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Event 4" class="rounded-2xl shadow-lg h-48 w-full object-cover">
                </div>
                
                {{-- Floating Stats Card --}}
                <div class="absolute -bottom-6 -left-6 bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-200 dark:border-gray-700">
                    <div class="text-center">
                        <h4 class="text-3xl font-bold text-primary edu-vic-wa-nt-hand-500">200+</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Event Sukses</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Services Offered --}}
    <section class="py-20 bg-gray-50 dark:bg-gray-900 -mx-4 md:-mx-16 lg:-mx-24 xl:-mx-32 px-4 md:px-16 lg:px-24 xl:px-32">
        <div class="text-center mb-16">
            <div data-aos="zoom-in-down" class="relative edu-vic-wa-nt-hand-500 text-black dark:text-white">
                <div class="text-lg absolute top-[30%] left-[30%] text-gray-500 dark:text-gray-400">Apa Yang Kami Tawarkan</div>
                <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                    LAYANAN
                </h2>
            </div>
            <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
                <h3 class="text-2xl md:text-3xl lg:text-5xl poppins-medium text-black dark:text-white mb-4">Paket Event Organizer</h3>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-3xl mx-auto">
                    Berbagai pilihan layanan yang dapat disesuaikan dengan kebutuhan dan budget acara Anda
                </p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Corporate Event --}}
            <div data-aos="fade-up" class="group bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-200 dark:border-gray-700">
                <div class="mb-6">
                    <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <x-heroicon-o-building-office class="w-8 h-8 text-black dark:text-white" />
                    </div>
                    <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand group-hover:text-primary transition-colors">Corporate Event</h3>
                </div>
                
                <ul class="space-y-3 mb-8 text-gray-600 dark:text-gray-300">
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Seminar & Workshop</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Meeting & Conference</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Team Building</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Product Launching</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Company Anniversary</span>
                    </li>
                </ul>
                
                <div class="text-center">
                    <p class="text-gray-500 dark:text-gray-400 mb-4">Mulai dari</p>
                    <div class="text-3xl font-bold text-primary edu-vic-wa-nt-hand mb-6">Rp 15.000.000</div>
                    <button class="w-full border-primary border-2 text-primary hover:bg-primary hover:text-white dark:bg-primary text-black dark:text-white py-3 px-6 rounded-2xl font-semibold hover:from-emerald-600 hover:to-teal-700 transition-all duration-300">
                        Pilih Paket
                    </button>
                </div>
            </div>
            
            {{-- Social Event --}}
            <div data-aos="fade-up" data-aos-delay="200" class="group bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-200 dark:border-gray-700 relative">
                <div class="mb-6 mt-4">
                    <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <x-heroicon-o-heart class="w-8 h-8 text-black dark:text-white" />
                    </div>
                    <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand group-hover:text-primary transition-colors">Social Event</h3>
                </div>
                
                <ul class="space-y-3 mb-8 text-gray-600 dark:text-gray-300">
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Birthday Party</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Graduation Party</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Family Gathering</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Reunion Event</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Anniversary Celebration</span>
                    </li>
                </ul>
                
                <div class="text-center">
                    <p class="text-gray-500 dark:text-gray-400 mb-4">Mulai dari</p>
                    <div class="text-3xl font-bold text-primary edu-vic-wa-nt-hand mb-6">Rp 8.000.000</div>
                    <button class="w-full border-primary border-2 text-primary hover:bg-primary hover:text-white dark:bg-primary text-black dark:text-white py-3 px-6 rounded-2xl font-semibold hover:from-emerald-600 hover:to-teal-700 transition-all duration-300">
                        Pilih Paket
                    </button>
                </div>
            </div>
            
            {{-- Custom Event --}}
            <div data-aos="fade-up" data-aos-delay="400" class="group bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-200 dark:border-gray-700">
                <div class="mb-6">
                    <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <x-heroicon-o-cog-6-tooth class="w-8 h-8 text-black dark:text-white" />
                    </div>
                    <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand group-hover:text-primary transition-colors">Custom Event</h3>
                </div>
                
                <ul class="space-y-3 mb-8 text-gray-600 dark:text-gray-300">
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Konsep Sesuai Keinginan</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Tema Custom</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Dekorasi Eksklusif</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Entertainment Khusus</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 flex-shrink-0" />
                        <span>Full Customization</span>
                    </li>
                </ul>
                
                <div class="text-center">
                    <p class="text-gray-500 dark:text-gray-400 mb-4">Konsultasi</p>
                    <div class="text-2xl font-bold text-primary edu-vic-wa-nt-hand mb-6">Gratis</div>
                    <button class="w-full border-primary border-2 text-primary hover:bg-primary hover:text-white dark:bg-primary text-black dark:text-white py-3 px-6 rounded-2xl font-semibold hover:from-emerald-600 hover:to-teal-700 transition-all duration-300">
                        Konsultasi Sekarang
                    </button>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Process Timeline --}}
    <section class="py-20">
        <div class="text-center mb-16">
            <div data-aos="zoom-in-down" class="relative edu-vic-wa-nt-hand-500 text-black dark:text-white">
                <div class="text-lg absolute top-[30%] left-[38%] text-gray-500 dark:text-gray-400">Bagaimana Kami Bekerja</div>
                <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                    PROSES
                </h2>
            </div>
            <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
                <h3 class="text-2xl md:text-3xl lg:text-5xl poppins-medium text-black dark:text-white mb-4">Langkah Demi Langkah</h3>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-3xl mx-auto">
                    Proses kerja yang terstruktur untuk memastikan acara Anda berjalan dengan sempurna
                </p>
            </div>
        </div>
        
        <div class="relative">
            {{-- Timeline Line --}}
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-primary to-pink-500 hidden lg:block"></div>
            
            {{-- Timeline Items --}}
            <div class="space-y-16">
                {{-- Step 1 --}}
                <div data-aos="fade-right" class="flex flex-col lg:flex-row items-center gap-8">
                    <div class="lg:w-1/2 lg:text-right lg:pr-8">
                        <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-lg border border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-center lg:justify-end gap-4 mb-6">
                                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Konsultasi & Brief</h3>
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center">
                                    <span class="text-white font-bold text-xl">01</span>
                                </div>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 pt-serif-regular leading-relaxed">
                                Diskusi mendalam tentang konsep acara, budget, timeline, dan ekspektasi Anda. Kami mendengarkan setiap detail untuk memahami visi acara impian Anda.
                            </p>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <img src="{{ asset('storage/content/event01.png') }}" alt="Konsultasi" class="rounded-2xl shadow-lg w-full h-64 object-cover">
                    </div>
                </div>
                
                {{-- Step 2 --}}
                <div data-aos="fade-left" class="flex flex-col lg:flex-row-reverse items-center gap-8">
                    <div class="lg:w-1/2 lg:text-left lg:pl-8">
                        <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-lg border border-gray-200 dark:border-gray-700">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-primary to-pink-500 rounded-2xl flex items-center justify-center">
                                    <span class="text-white font-bold text-xl">02</span>
                                </div>
                                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Perencanaan & Proposal</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 pt-serif-regular leading-relaxed">
                                Penyusunan konsep detail, timeline, vendor selection, dan proposal lengkap. Setiap aspek acara direncanakan dengan matang dan sistematis.
                            </p>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <img src="{{ asset('storage/content/wedding11.jpg') }}" alt="Perencanaan" class="rounded-2xl shadow-lg w-full h-64 object-cover">
                    </div>
                </div>
                
                {{-- Step 3 --}}
                <div data-aos="fade-right" class="flex flex-col lg:flex-row items-center gap-8">
                    <div class="lg:w-1/2 lg:text-right lg:pr-8">
                        <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-lg border border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-center lg:justify-end gap-4 mb-6">
                                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Koordinasi & Persiapan</h3>
                                <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center">
                                    <span class="text-white font-bold text-xl">03</span>
                                </div>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 pt-serif-regular leading-relaxed">
                                Koordinasi dengan vendor, persiapan venue, pengaturan dekorasi, dan semua hal teknis. Tim kami memastikan semuanya siap sempurna.
                            </p>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <img src="{{ asset('storage/content/decoration13.jpg') }}" alt="Koordinasi" class="rounded-2xl shadow-lg w-full h-64 object-cover">
                    </div>
                </div>
                
                {{-- Step 4 --}}
                <div data-aos="fade-left" class="flex flex-col lg:flex-row-reverse items-center gap-8">
                    <div class="lg:w-1/2 lg:text-left lg:pl-8">
                        <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-lg border border-gray-200 dark:border-gray-700">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center">
                                    <span class="text-white font-bold text-xl">04</span>
                                </div>
                                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand">Eksekusi & Monitoring</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 pt-serif-regular leading-relaxed">
                                Hari H tiba! Tim kami hadir sejak pagi untuk memastikan semua berjalan sesuai rencana. Monitoring ketat dari awal hingga acara selesai.
                            </p>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Eksekusi" class="rounded-2xl shadow-lg w-full h-64 object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Why Choose Us --}}
    <section class="py-20 bg-gray-50 dark:bg-gray-900 -mx-4 md:-mx-16 lg:-mx-24 xl:-mx-32 px-4 md:px-16 lg:px-24 xl:px-32">
        <div class="text-center mb-16">
            <h2 data-aos="zoom-in-down" class="text-3xl lg:text-5xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-6">
                Mengapa Memilih <span class="text-primary">3Rasa</span>?
            </h2>
            <p data-aos="zoom-in-up" class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-3xl mx-auto">
                Keunggulan dan komitmen kami dalam menghadirkan acara yang tak terlupakan
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div data-aos="fade-up" class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <x-heroicon-o-star class="w-10 h-10 text-black dark:text-white" />
                </div>
                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-4">Pengalaman</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Lebih dari 5 tahun melayani berbagai jenis acara dengan tingkat kepuasan tinggi</p>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="200" class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-primary to-pink-500 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <x-heroicon-o-users class="w-10 h-10 text-black dark:text-white" />
                </div>
                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-4">Tim Profesional</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Koordinator berpengalaman yang ahli dalam bidangnya masing-masing</p>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="400" class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <x-heroicon-o-shield-check class="w-10 h-10 text-black dark:text-white" />
                </div>
                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-4">Jaminan Kualitas</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Komitmen terhadap kualitas terbaik dengan garansi kepuasan pelanggan</p>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="600" class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-500 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <x-heroicon-o-currency-dollar class="w-10 h-10 text-black dark:text-white" />
                </div>
                <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-4">Harga Kompetitif</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Paket lengkap dengan harga terjangkau tanpa mengurangi kualitas layanan</p>
            </div>
        </div>
    </section>
    
    {{-- Portfolio Gallery --}}
    <section class="py-20">
        <div class="text-center mb-16">
            <div data-aos="zoom-in-down" class="relative edu-vic-wa-nt-hand-500 text-black dark:text-white">
                <div class="text-lg absolute top-[30%] left-[35%] text-gray-500 dark:text-gray-400">Karya Terbaik Kami</div>
                <h2 class="md:tracking-[20px] xl:tracking-[30px] text-[50px] md:text-[100px] xl:text-[120px] opacity-20">  
                    PORTOFOLIO
                </h2>
            </div>
            <div data-aos="zoom-in-up" class="lg:mt-[-60px]">
                <h3 class="text-2xl md:text-3xl lg:text-5xl poppins-medium text-black dark:text-white mb-4">Event Yang Telah Terlaksana</h3>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic text-lg max-w-3xl mx-auto">
                    Lihat berbagai acara sukses yang telah kami tangani dengan kepuasan penuh dari klien
                </p>
            </div>
        </div>
        
        {{-- Gallery Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div data-aos="zoom-in" class="group relative overflow-hidden rounded-2xl">
                <img src="{{ asset('storage/content/event01.png') }}" alt="Corporate Event" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-4 left-4 text-white">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Corporate Meeting</h4>
                        <p class="text-sm pt-serif-regular">PT. Surya Mandiri</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="zoom-in" data-aos-delay="200" class="group relative overflow-hidden rounded-2xl">
                <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="Birthday Party" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-4 left-4 text-white">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Birthday Celebration</h4>
                        <p class="text-sm pt-serif-regular">Sweet 17th Party</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="zoom-in" data-aos-delay="400" class="group relative overflow-hidden rounded-2xl">
                <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Family Gathering" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-4 left-4 text-white">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Family Gathering</h4>
                        <p class="text-sm pt-serif-regular">Keluarga Besar Wijaya</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="zoom-in" class="group relative overflow-hidden rounded-2xl">
                <img src="{{ asset('storage/content/decoration13.jpg') }}" alt="Product Launch" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-4 left-4 text-white">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Product Launching</h4>
                        <p class="text-sm pt-serif-regular">Tech Innovation 2024</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="zoom-in" data-aos-delay="200" class="group relative overflow-hidden rounded-2xl">
                <img src="{{ asset('storage/content/wedding11.jpg') }}" alt="Anniversary" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-4 left-4 text-white">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Anniversary Event</h4>
                        <p class="text-sm pt-serif-regular">25th Wedding Anniversary</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="zoom-in" data-aos-delay="400" class="group relative overflow-hidden rounded-2xl">
                <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Graduation" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-4 left-4 text-white">
                        <h4 class="text-lg font-bold edu-vic-wa-nt-hand">Graduation Party</h4>
                        <p class="text-sm pt-serif-regular">Medical School Graduation</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div data-aos="fade-up" class="text-center mt-12">
            <a href="/portofolio" class="inline-flex items-center gap-3 bg-primary text-white px-8 py-4 rounded-2xl font-semibold hover:bg-white hover:text-primary hover:shadow-xl transition-all duration-300 border-2 border-primary group">
                <span class="edu-vic-wa-nt-hand-500">Lihat Semua Portofolio</span>
                <x-heroicon-o-arrow-right class="w-5 h-5 group-hover:translate-x-2 transition-transform duration-300" />
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