@extends('Layout.app')

@section('title', 'Layanan Dekorasi - 3Rasa Wedding')

@section('content')

{{-- Hero Section --}}
<div class="width-full h-screen relative bg-white dark:bg-gray-800">
    <div class="absolute inset-0 bg-[url({{ asset('storage/content/decoration01.jpeg') }})] bg-cover bg-center">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>
    
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center text-white px-10">
            <div data-aos="fade-up" class="mb-4">
                <span class="inline-block px-4 py-2 bg-[--color-primary]/80 rounded-full text-sm font-medium tracking-wide">
                    LAYANAN PREMIUM
                </span>
            </div>
            <h1 data-aos="fade-up" data-aos-delay="200" class="text-4xl md:text-5xl lg:text-7xl font-semibold mb-6 edu-vic-wa-nt-hand tracking-wide">
                Dekorasi Acara
            </h1>
            <p data-aos="fade-up" data-aos-delay="400" class="text-lg md:text-xl lg:text-2xl mb-8 pt-serif-regular-italic max-w-4xl mx-auto">
                Wujudkan visi estetik Anda dengan desain dekorasi yang memukau, elegan, dan tak terlupakan untuk setiap momen spesial
            </p>
            <div data-aos="fade-up" data-aos-delay="600" class="flex flex-col sm:flex-row gap-4 justify-center items-center edu-vic-wa-nt-hand-500 font-semibold">
                <button class="tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 text-black bg-white rounded-xl px-6 py-3">
                    Konsultasi Gratis
                </button>
                <button class="text-white bg-[--color-primary] rounded-xl tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 border-2 px-6 py-3">
                    Lihat Portofolio
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Main Content --}}
<div class="bg-white dark:bg-gray-800 px-10 md:px-16 lg:px-24 xl:px-32">

    {{-- Service Overview Section --}}
    <div class="py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl lg:text-5xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white">
                    Menciptakan Suasana yang 
                    <span class="pt-serif-regular-italic text-[--color-primary]">Memukau</span>
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-lg mb-6 pt-serif-regular leading-relaxed">
                    Setiap acara memiliki cerita uniknya sendiri. Kami hadir untuk menerjemahkan visi Anda menjadi realitas visual yang menawan melalui desain dekorasi yang thoughtful dan detail-oriented.
                </p>
                <p class="text-gray-600 dark:text-gray-300 text-lg mb-8 pt-serif-regular leading-relaxed">
                    Dari konsep awal hingga eksekusi final, tim kreatif kami berkomitmen menghadirkan dekorasi yang tidak hanya indah dipandang, tetapi juga mencerminkan kepribadian dan gaya Anda.
                </p>
                
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="text-center p-4 bg-gray-100 dark:bg-gray-700 rounded-2xl">
                        <h3 class="text-2xl font-bold text-[--color-primary] edu-vic-wa-nt-hand-500">500+</h3>
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Dekorasi Terealisasi</p>
                    </div>
                    <div class="text-center p-4 bg-gray-100 dark:bg-gray-700 rounded-2xl">
                        <h3 class="text-2xl font-bold text-[--color-primary] edu-vic-wa-nt-hand-500">5+</h3>
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Tahun Pengalaman</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="fade-left" class="relative">
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Dekorasi 1" class="rounded-2xl shadow-lg h-48 w-full object-cover">
                    <img src="{{ asset('storage/content/decoration04.png') }}" alt="Dekorasi 2" class="rounded-2xl shadow-lg h-32 w-full object-cover mt-16">
                    <img src="{{ asset('storage/content/decoration05.png') }}" alt="Dekorasi 3" class="rounded-2xl shadow-lg h-32 w-full object-cover -mt-8">
                    <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Dekorasi 4" class="rounded-2xl shadow-lg h-48 w-full object-cover">
                </div>
                
                {{-- Floating card --}}
                <div class="absolute -bottom-6 -left-6 bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-[--color-primary] rounded-full flex items-center justify-center">
                            <x-heroicon-o-sparkles class="w-6 h-6 text-white" />
                        </div>
                        <div>
                            <h4 class="font-bold text-black dark:text-white">Desain Custom</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Sesuai Keinginan Anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Services Detail Section --}}
    <div class="py-20">
        <div data-aos="fade-up" class="text-center mb-16">
            <h2 class="text-3xl lg:text-5xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white">
                Layanan Dekorasi Lengkap
            </h2>
            <p class="text-gray-600 dark:text-gray-300 text-lg pt-serif-regular-italic max-w-3xl mx-auto">
                Dari konsep kreatif hingga instalasi final, kami menyediakan solusi dekorasi menyeluruh untuk berbagai jenis acara
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Service 1 --}}
            <div data-aos="fade-up" data-aos-delay="100" class="group bg-white dark:bg-gray-800 rounded-3xl p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl hover:shadow-[--color-primary]/10 transition-all duration-500 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <x-heroicon-o-heart class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white mb-4 edu-vic-wa-nt-hand-500">Dekorasi Pernikahan</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular mb-6">Desain romantis dan elegan untuk hari bahagia Anda, dengan perpaduan tradisi dan modernitas.</p>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Backdrop Utama</li>
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Dekorasi Altar</li>
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Centerpiece Meja</li>
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Lighting Design</li>
                </ul>
            </div>

            {{-- Service 2 --}}
            <div data-aos="fade-up" data-aos-delay="200" class="group bg-white dark:bg-gray-800 rounded-3xl p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl hover:shadow-[--color-primary]/10 transition-all duration-500 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <x-heroicon-o-building-office class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white mb-4 edu-vic-wa-nt-hand-500">Event Korporat</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular mb-6">Dekorasi profesional untuk acara bisnis, peluncuran produk, dan gathering perusahaan.</p>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Branding Integration</li>
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Stage Design</li>
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Welcome Area</li>
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Photo Booth</li>
                </ul>
            </div>

            {{-- Service 3 --}}
            <div data-aos="fade-up" data-aos-delay="300" class="group bg-white dark:bg-gray-800 rounded-3xl p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl hover:shadow-[--color-primary]/10 transition-all duration-500 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <x-heroicon-o-gift class="w-8 h-8 text-black dark:text-white" />
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white mb-4 edu-vic-wa-nt-hand-500">Acara Khusus</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular mb-6">Dekorasi kreatif untuk ulang tahun, anniversary, baby shower, dan perayaan istimewa lainnya.</p>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Custom Theme</li>
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Balloon Decoration</li>
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Dessert Table</li>
                    <li class="flex items-center"><x-heroicon-o-check class="w-4 h-4 text-[--color-primary] mr-2" /> Interactive Elements</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Process Section --}}
    <div class="py-20">
        <div data-aos="fade-up" class="text-center mb-16">
            <h2 class="text-3xl lg:text-5xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white">
                Proses Kerja Kami
            </h2>
            <p class="text-gray-600 dark:text-gray-300 text-lg pt-serif-regular-italic max-w-3xl mx-auto">
                Dari konsultasi awal hingga eksekusi sempurna, setiap langkah dirancang untuk memberikan hasil terbaik
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Step 1 --}}
            <div data-aos="fade-up" data-aos-delay="100" class="text-center group">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-[--color-primary] rounded-full flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300">
                        <span class="text-2xl font-bold text-white edu-vic-wa-nt-hand-500">1</span>
                    </div>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full"></div>
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white mb-3 edu-vic-wa-nt-hand-500">Konsultasi</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Diskusi mendalam tentang visi, tema, budget, dan requirement khusus Anda.</p>
            </div>

            {{-- Step 2 --}}
            <div data-aos="fade-up" data-aos-delay="200" class="text-center group">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-[--color-primary] rounded-full flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300">
                        <span class="text-2xl font-bold text-white edu-vic-wa-nt-hand-500">2</span>
                    </div>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-blue-400 rounded-full"></div>
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white mb-3 edu-vic-wa-nt-hand-500">Desain Konsep</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Pembuatan mood board, sketsa, dan visualisasi 3D untuk approval.</p>
            </div>

            {{-- Step 3 --}}
            <div data-aos="fade-up" data-aos-delay="300" class="text-center group">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-[--color-primary] rounded-full flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300">
                        <span class="text-2xl font-bold text-white edu-vic-wa-nt-hand-500">3</span>
                    </div>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-400 rounded-full"></div>
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white mb-3 edu-vic-wa-nt-hand-500">Persiapan</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Sourcing material, koordinasi vendor, dan persiapan teknis detail.</p>
            </div>

            {{-- Step 4 --}}
            <div data-aos="fade-up" data-aos-delay="400" class="text-center group">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-[--color-primary] rounded-full flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300">
                        <span class="text-2xl font-bold text-white edu-vic-wa-nt-hand-500">4</span>
                    </div>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-purple-400 rounded-full"></div>
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white mb-3 edu-vic-wa-nt-hand-500">Eksekusi</h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Setup profesional dengan supervisi ketat hingga acara selesai.</p>
            </div>
        </div>
    </div>

    {{-- Portfolio Gallery Section --}}
    <div class="py-20">
        <div data-aos="fade-up" class="text-center mb-16">
            <h2 class="text-3xl lg:text-5xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white">
                Galeri Karya Kami
            </h2>
            <p class="text-gray-600 dark:text-gray-300 text-lg pt-serif-regular-italic max-w-3xl mx-auto">
                Setiap proyek adalah masterpiece unik yang mencerminkan dedikasi dan kreativitas tim kami
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Gallery Item 1 --}}
            <div data-aos="zoom-in" data-aos-delay="100" class="group relative overflow-hidden rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Dekorasi Pernikahan 1" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                    <h3 class="text-xl font-bold mb-2 edu-vic-wa-nt-hand-500">Pernikahan Tradisional</h3>
                    <p class="text-sm pt-serif-regular">Perpaduan elegan antara budaya lokal dengan sentuhan modern</p>
                </div>
            </div>

            {{-- Gallery Item 2 --}}
            <div data-aos="zoom-in" data-aos-delay="200" class="group relative overflow-hidden rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('storage/content/decoration04.png') }}" alt="Dekorasi Modern" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                    <h3 class="text-xl font-bold mb-2 edu-vic-wa-nt-hand-500">Event Korporat</h3>
                    <p class="text-sm pt-serif-regular">Desain profesional dengan branding yang kuat dan memorable</p>
                </div>
            </div>

            {{-- Gallery Item 3 --}}
            <div data-aos="zoom-in" data-aos-delay="300" class="group relative overflow-hidden rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Dekorasi Outdoor" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                    <h3 class="text-xl font-bold mb-2 edu-vic-wa-nt-hand-500">Garden Party</h3>
                    <p class="text-sm pt-serif-regular">Konsep outdoor yang fresh dengan nuansa natural yang memukau</p>
                </div>
            </div>

            {{-- Gallery Item 4 --}}
            <div data-aos="zoom-in" data-aos-delay="100" class="group relative overflow-hidden rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('storage/content/wedding03.jpg') }}" alt="Dekorasi Intimate" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                    <h3 class="text-xl font-bold mb-2 edu-vic-wa-nt-hand-500">Intimate Wedding</h3>
                    <p class="text-sm pt-serif-regular">Dekorasi hangat dan personal untuk momen yang lebih intim</p>
                </div>
            </div>

            {{-- Gallery Item 5 --}}
            <div data-aos="zoom-in" data-aos-delay="200" class="group relative overflow-hidden rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('storage/content/wedding04.jpg') }}" alt="Dekorasi Luxury" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                    <h3 class="text-xl font-bold mb-2 edu-vic-wa-nt-hand-500">Luxury Wedding</h3>
                    <p class="text-sm pt-serif-regular">Kemewahan dan elegansi dalam setiap detail dekorasi</p>
                </div>
            </div>

            {{-- Gallery Item 6 --}}
            <div data-aos="zoom-in" data-aos-delay="300" class="group relative overflow-hidden rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('storage/content/wedding05.jpeg') }}" alt="Dekorasi Rustic" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                    <h3 class="text-xl font-bold mb-2 edu-vic-wa-nt-hand-500">Rustic Theme</h3>
                    <p class="text-sm pt-serif-regular">Konsep natural dengan sentuhan vintage yang menawan</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Pricing Section --}}
    <div class="py-20">
        <div data-aos="fade-up" class="text-center mb-16">
            <h2 class="text-3xl lg:text-5xl font-semibold mb-6 edu-vic-wa-nt-hand text-black dark:text-white">
                Paket Dekorasi
            </h2>
            <p class="text-gray-600 dark:text-gray-300 text-lg pt-serif-regular-italic max-w-3xl mx-auto">
                Pilihan paket yang fleksibel dan disesuaikan dengan kebutuhan serta budget Anda
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Basic Package --}}
            <div data-aos="fade-up" data-aos-delay="100" class="bg-white dark:bg-gray-800 rounded-3xl p-8 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl transition-all duration-500 relative overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-500"></div>
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-black dark:text-white mb-2 edu-vic-wa-nt-hand-500">Paket Basic</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Untuk acara intimate & simple</p>
                    <div class="mt-4">
                        <span class="text-4xl font-bold text-[--color-primary] edu-vic-wa-nt-hand-500">5jt</span>
                        <span class="text-gray-600 dark:text-gray-300">/ acara</span>
                    </div>
                </div>
                
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Backdrop utama (3x3m)
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Dekorasi meja utama
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Centerpiece (5 buah)
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Basic lighting
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Setup & breakdown
                    </li>
                </ul>
                
                <button class="w-full border-2 border-[--color-primary] text-[--color-primary] dark:text-white dark:border-white rounded-2xl py-3 px-4 font-medium hover:bg-[--color-primary] hover:text-white dark:hover:bg-white dark:hover:text-gray-900 transition-all duration-300 edu-vic-wa-nt-hand-500">
                    Pilih Paket Basic
                </button>
            </div>

            {{-- Premium Package --}}
            <div data-aos="fade-up" data-aos-delay="200" class="bg-white dark:bg-gray-800 rounded-3xl p-8 border-2 border-[--color-primary] shadow-xl hover:shadow-2xl transition-all duration-500 relative overflow-hidden transform hover:-translate-y-2">
                <div class="absolute top-4 right-4">
                    <span class="bg-[--color-primary] text-white px-3 py-1 rounded-full text-xs font-medium">
                        TERPOPULER
                    </span>
                </div>
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-500 to-pink-500"></div>
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-black dark:text-white mb-2 edu-vic-wa-nt-hand-500">Paket Premium</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Untuk acara menengah & elegant</p>
                    <div class="mt-4">
                        <span class="text-4xl font-bold text-[--color-primary] edu-vic-wa-nt-hand-500">12jt</span>
                        <span class="text-gray-600 dark:text-gray-300">/ acara</span>
                    </div>
                </div>
                
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Backdrop utama (5x4m)
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Dekorasi altar/panggung
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Centerpiece (10 buah)
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Premium lighting design
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Welcome gate decoration
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Photo booth area
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Setup & breakdown
                    </li>
                </ul>
                
                <button class="w-full bg-[--color-primary] text-white rounded-2xl py-3 px-4 font-medium hover:bg-[--color-primary]/90 transition-all duration-300 edu-vic-wa-nt-hand-500 shadow-lg">
                    Pilih Paket Premium
                </button>
            </div>

            {{-- Luxury Package --}}
            <div data-aos="fade-up" data-aos-delay="300" class="bg-white dark:bg-gray-800 rounded-3xl p-8 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl transition-all duration-500 relative overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-500 to-orange-500"></div>
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-black dark:text-white mb-2 edu-vic-wa-nt-hand-500">Paket Luxury</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Untuk acara besar & mewah</p>
                    <div class="mt-4">
                        <span class="text-4xl font-bold text-[--color-primary] edu-vic-wa-nt-hand-500">25jt</span>
                        <span class="text-gray-600 dark:text-gray-300">/ acara</span>
                    </div>
                </div>
                
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Custom backdrop design
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Full venue decoration
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Unlimited centerpiece
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Advanced lighting system
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Luxury welcome area
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Multiple photo spots
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Fresh flower arrangements
                    </li>
                    <li class="flex items-center text-gray-600 dark:text-gray-300">
                        <x-heroicon-o-check class="w-5 h-5 text-[--color-primary] mr-3" />
                        Dedicated project manager
                    </li>
                </ul>
                
                <button class="w-full border-2 border-[--color-primary] text-[--color-primary] dark:text-white dark:border-white rounded-2xl py-3 px-4 font-medium hover:bg-[--color-primary] hover:text-white dark:hover:bg-white dark:hover:text-gray-900 transition-all duration-300 edu-vic-wa-nt-hand-500">
                    Pilih Paket Luxury
                </button>
            </div>
        </div>

        {{-- Custom Package Info --}}
        {{-- <div data-aos="fade-up" data-aos-delay="400" class="mt-12 text-center bg-gray-50 dark:bg-gray-900 rounded-3xl p-8">
            <h3 class="text-2xl font-bold text-black dark:text-white mb-4 edu-vic-wa-nt-hand-500">Butuh Paket Custom?</h3>
            <p class="text-gray-600 dark:text-gray-300 pt-serif-regular mb-6 max-w-2xl mx-auto">
                Setiap acara unik memiliki kebutuhan khusus. Kami siap merancang paket custom yang sesuai dengan visi, budget, dan requirement spesifik Anda.
            </p>
            <button class="bg-[--color-primary] text-white px-8 py-3 rounded-2xl font-medium hover:bg-[--color-primary]/90 transition-all duration-300 edu-vic-wa-nt-hand-500">
                Konsultasi Paket Custom
            </button>
        </div> --}}
    </div>

</div>

@push('styles')
<style>
    /* Custom animations for scroll effects */
    [data-aos] {
        opacity: 0;
        transition: opacity 0.6s ease-in-out;
    }
    
    [data-aos].aos-animate {
        opacity: 1;
    }
</style>
@endpush

@push('scripts')
<script>
    // Initialize AOS (Animate On Scroll)
    document.addEventListener('DOMContentLoaded', function() {
        // Simulate AOS functionality
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('aos-animate');
                }
            });
        }, observerOptions);

        document.querySelectorAll('[data-aos]').forEach(el => {
            observer.observe(el);
        });
    });

    // FAQ Toggle Function
    function toggleFAQ(button) {
        const faqItem = button.parentElement;
        const content = faqItem.querySelector('.faq-content');
        const icon = faqItem.querySelector('.faq-icon');
        
        // Close other open FAQs
        document.querySelectorAll('.faq-content').forEach(otherContent => {
            if (otherContent !== content && !otherContent.classList.contains('hidden')) {
                otherContent.classList.add('hidden');
                const otherIcon = otherContent.parentElement.querySelector('.faq-icon');
                otherIcon.classList.remove('rotate-180');
            }
        });
        
        // Toggle current FAQ
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
</script>
@endpush

@endsection