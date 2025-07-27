@extends('Layout.app')

@section('title', 'Layanan Kami')

@section('content')
{{-- Hero Section --}}
<div class="relative w-full h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <div class="absolute inset-0 bg-[url({{ asset('storage/content/decoration01.jpeg') }})] bg-cover bg-center opacity-20"></div>
    <div class="relative z-10 flex items-center justify-center h-full px-4">
        <div class="text-center max-w-4xl">
            <h1 class="text-6xl md:text-8xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-6">
                Layanan Kami
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 pt-serif-regular-italic max-w-2xl mx-auto">
                Wujudkan acara impian Anda dengan layanan profesional dan berkualitas tinggi
            </p>
        </div>
    </div>
</div>

{{-- Main Services Section --}}
<div class="bg-white dark:bg-gray-800 py-20 px-6 lg:px-20">
    <div class="max-w-7xl mx-auto">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <h2 class="text-5xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-4">
                Layanan Unggulan
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 pt-serif-regular-italic max-w-3xl mx-auto">
                Dari pernikahan tradisional hingga event korporat modern, kami siap menghadirkan pengalaman tak terlupakan
            </p>
        </div>

        {{-- Services Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
            {{-- Service 1: Wedding Organizer --}}
            <div class="group bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden border-2 border-gray-200 dark:border-gray-600 hover:shadow-2xl transition-all duration-300">
                <div class="h-64 bg-[url({{ asset('storage/content/wedding01.jpg') }})] bg-cover bg-center relative">
                    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/30 transition-all duration-300"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-[--color-primary] text-white px-3 py-1 rounded-full text-sm font-semibold">Populer</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">
                        Wedding Organizer
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular mb-4">
                        Perencana pernikahan lengkap dari konsep hingga eksekusi, menciptakan momen istimewa yang tak terlupakan.
                    </p>
                    <ul class="space-y-2 mb-6 text-sm text-gray-700 dark:text-gray-300">
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Konsultasi dan perencanaan
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Koordinasi vendor
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Pengawasan acara
                        </li>
                    </ul>
                    <button class="w-full bg-[--color-primary] text-white rounded-xl py-3 font-semibold hover:bg-opacity-90 transition-all duration-300">
                        Pelajari Lebih Lanjut
                    </button>
                </div>
            </div>

            {{-- Service 2: Dekorasi --}}
            <div class="group bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden border-2 border-gray-200 dark:border-gray-600 hover:shadow-2xl transition-all duration-300">
                <div class="h-64 bg-[url({{ asset('storage/content/decoration01.jpeg') }})] bg-cover bg-center relative">
                    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/30 transition-all duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">
                        Dekorasi Acara
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular mb-4">
                        Desain dekorasi kreatif dan elegan untuk berbagai jenis acara sesuai tema dan budget Anda.
                    </p>
                    <ul class="space-y-2 mb-6 text-sm text-gray-700 dark:text-gray-300">
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Desain konsep tema
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Backdrop dan panggung
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Lighting artistik
                        </li>
                    </ul>
                    <button class="w-full border-2 border-[--color-primary] text-[--color-primary] rounded-xl py-3 font-semibold hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                        Pelajari Lebih Lanjut
                    </button>
                </div>
            </div>

            {{-- Service 3: Sewa Perlengkapan --}}
            <div class="group bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden border-2 border-gray-200 dark:border-gray-600 hover:shadow-2xl transition-all duration-300">
                <div class="h-64 bg-[url({{ asset('storage/content/prop/kursi.jpg') }})] bg-cover bg-center relative">
                    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/30 transition-all duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">
                        Sewa Perlengkapan
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular mb-4">
                        Penyewaan berbagai perlengkapan acara berkualitas tinggi dengan harga terjangkau.
                    </p>
                    <ul class="space-y-2 mb-6 text-sm text-gray-700 dark:text-gray-300">
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Furniture & sofa
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Sound system
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Tenda dan canopy
                        </li>
                    </ul>
                    <button class="w-full border-2 border-[--color-primary] text-[--color-primary] rounded-xl py-3 font-semibold hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                        Pelajari Lebih Lanjut
                    </button>
                </div>
            </div>

            {{-- Service 4: Event Korporat --}}
            <div class="group bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden border-2 border-gray-200 dark:border-gray-600 hover:shadow-2xl transition-all duration-300">
                <div class="h-64 bg-gradient-to-br from-blue-500 to-purple-600 relative">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-all duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <x-heroicon-o-building-office class="w-24 h-24 text-white opacity-80" />
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">
                        Event Korporat
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular mb-4">
                        Penyelenggaraan acara perusahaan yang profesional untuk meningkatkan citra dan networking.
                    </p>
                    <ul class="space-y-2 mb-6 text-sm text-gray-700 dark:text-gray-300">
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Seminar & workshop
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Launching produk
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Team building
                        </li>
                    </ul>
                    <button class="w-full border-2 border-[--color-primary] text-[--color-primary] rounded-xl py-3 font-semibold hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                        Pelajari Lebih Lanjut
                    </button>
                </div>
            </div>

            {{-- Service 5: Catering --}}
            <div class="group bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden border-2 border-gray-200 dark:border-gray-600 hover:shadow-2xl transition-all duration-300">
                <div class="h-64 bg-gradient-to-br from-orange-400 to-red-500 relative">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-all duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <x-heroicon-o-cake class="w-24 h-24 text-white opacity-80" />
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">
                        Catering Service
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular mb-4">
                        Layanan katering dengan menu beragam dan cita rasa autentik untuk berbagai acara Anda.
                    </p>
                    <ul class="space-y-2 mb-6 text-sm text-gray-700 dark:text-gray-300">
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Menu tradisional
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Prasmanan modern
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Live cooking
                        </li>
                    </ul>
                    <button class="w-full border-2 border-[--color-primary] text-[--color-primary] rounded-xl py-3 font-semibold hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                        Pelajari Lebih Lanjut
                    </button>
                </div>
            </div>

            {{-- Service 6: Dokumentasi --}}
            <div class="group bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden border-2 border-gray-200 dark:border-gray-600 hover:shadow-2xl transition-all duration-300">
                <div class="h-64 bg-gradient-to-br from-pink-400 to-purple-500 relative">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-all duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <x-heroicon-o-camera class="w-24 h-24 text-white opacity-80" />
                    </div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Terbaru</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">
                        Dokumentasi
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular mb-4">
                        Jasa foto dan video profesional untuk mengabadikan setiap momen berharga acara Anda.
                    </p>
                    <ul class="space-y-2 mb-6 text-sm text-gray-700 dark:text-gray-300">
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Photography HD
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Videography 4K
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-check-circle class="w-4 h-4 text-[--color-primary] mr-2" />
                            Drone footage
                        </li>
                    </ul>
                    <button class="w-full border-2 border-[--color-primary] text-[--color-primary] rounded-xl py-3 font-semibold hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                        Pelajari Lebih Lanjut
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Process Section --}}
<div class="bg-gray-50 dark:bg-gray-900 py-20 px-6 lg:px-20">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-4">
                Proses Kerja Kami
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 pt-serif-regular-italic">
                Langkah demi langkah menuju acara impian Anda
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Step 1 --}}
            <div class="text-center group">
                <div class="w-20 h-20 bg-[--color-primary] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-300">
                    <span class="text-white text-2xl font-bold">01</span>
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">
                    Konsultasi
                </h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                    Diskusi mendalam tentang visi, kebutuhan, dan budget acara Anda
                </p>
            </div>

            {{-- Step 2 --}}
            <div class="text-center group">
                <div class="w-20 h-20 bg-[--color-primary] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-300">
                    <span class="text-white text-2xl font-bold">02</span>
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">
                    Perencanaan
                </h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                    Penyusunan timeline, konsep desain, dan koordinasi vendor
                </p>
            </div>

            {{-- Step 3 --}}
            <div class="text-center group">
                <div class="w-20 h-20 bg-[--color-primary] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-300">
                    <span class="text-white text-2xl font-bold">03</span>
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">
                    Persiapan
                </h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                    Setup dekorasi, instalasi equipment, dan persiapan final
                </p>
            </div>

            {{-- Step 4 --}}
            <div class="text-center group">
                <div class="w-20 h-20 bg-[--color-primary] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-300">
                    <span class="text-white text-2xl font-bold">04</span>
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-3">
                    Eksekusi
                </h3>
                <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                    Pelaksanaan acara dengan pengawasan penuh dan koordinasi tim
                </p>
            </div>
        </div>
    </div>
</div>

{{-- CTA Section --}}
<div class="bg-white dark:bg-gray-800 py-20 px-6 lg:px-20">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-5xl font-bold text-black dark:text-white edu-vic-wa-nt-hand mb-6">
            Siap Mewujudkan Acara Impian Anda?
        </h2>
        <p class="text-xl text-gray-600 dark:text-gray-300 pt-serif-regular-italic mb-10">
            Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <button class="flex group hover:scale-105 transition-all duration-300 bg-[--color-primary] text-white rounded-xl px-8 py-4 font-semibold">
                <span class="mr-3 edu-vic-wa-nt-hand text-lg">Konsultasi Gratis</span>
                <x-heroicon-o-arrow-small-up class="h-6 w-6 group-hover:rotate-45 duration-300 transition-all" />
            </button>
            <button class="flex group hover:scale-105 transition-all duration-300 border-2 border-[--color-primary] text-[--color-primary] dark:text-white dark:border-white rounded-xl px-8 py-4 font-semibold">
                <span class="mr-3 edu-vic-wa-nt-hand text-lg">Lihat Portfolio</span>
                <x-heroicon-o-arrow-small-up class="h-6 w-6 group-hover:rotate-45 duration-300 transition-all" />
            </button>
        </div>
        
        {{-- Contact Info --}}
        <div class="mt-16 grid md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-[--color-primary] rounded-full flex items-center justify-center mx-auto mb-4">
                    <x-heroicon-o-phone class="w-8 h-8 text-white" />
                </div>
                <h3 class="font-bold text-black dark:text-white mb-2">Telepon</h3>
                <p class="text-gray-600 dark:text-gray-300">+62 123 456 7890</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-[--color-primary] rounded-full flex items-center justify-center mx-auto mb-4">
                    <x-heroicon-o-envelope class="w-8 h-8 text-white" />
                </div>
                <h3 class="font-bold text-black dark:text-white mb-2">Email</h3>
                <p class="text-gray-600 dark:text-gray-300">info@3rasa.com</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-[--color-primary] rounded-full flex items-center justify-center mx-auto mb-4">
                    <x-heroicon-o-map-pin class="w-8 h-8 text-white" />
                </div>
                <h3 class="font-bold text-black dark:text-white mb-2">Lokasi</h3>
                <p class="text-gray-600 dark:text-gray-300">Tarakan, Kalimantan Utara</p>
            </div>
        </div>
    </div>
</div>

@endsection