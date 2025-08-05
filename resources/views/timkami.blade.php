@extends('Layout.app')

@section('title', 'Team Kami')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen">
    <!-- Hero Section -->
        {{-- <div class="relative h-screen flex items-center justify-center bg-gradient-to-br from-purple-50 to-pink-50 dark:from-gray-900 dark:to-gray-800">
            <div class="absolute inset-0 bg-[url({{ asset('storage/content/team-bg.jpg') }})] bg-cover bg-center opacity-10"></div>
            <div class="relative z-10 text-center px-8">
                <h1 class="text-7xl edu-vic-wa-nt-hand text-black dark:text-white mb-6 tracking-wide">
                    Tim Profesional Kami
                </h1>
                <p class="text-xl pt-serif-regular-italic text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Dibalik setiap momen spesial yang kami ciptakan, terdapat tim profesional yang berdedikasi tinggi dengan pengalaman bertahun-tahun dalam industri wedding organizer.
                </p>
            </div>
        </div> --}}

    <div class="relative h-[70vh] bg-[url({{ asset('storage/content/gif02.gif') }})] bg-cover bg-center rounded-b-[150px] overflow-hidden mb-16">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 data-aos="zoom-in-right" class="text-6xl font-semibold mb-4 edu-vic-wa-nt-hand tracking-wide">
                    Tim Profesional Kami
                </h1>
                <p data-aos="zoom-in-left" class="text-xl pt-serif-regular-italic max-w-2xl mx-auto">
                    Dibalik setiap momen spesial yang kami ciptakan, terdapat tim profesional yang berdedikasi tinggi dengan pengalaman bertahun-tahun dalam industri wedding organizer.
                </p>
            </div>
        </div>
    </div>


    <!-- Team Stats Section (Menggunakan data dinamis) -->
    <div data-aos="zoom-in-down" class="px-8">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-20">
                <div class="text-center p-8 bg-gray-100 dark:bg-gray-700 rounded-2xl hover:scale-105 transition-all duration-300">
                    <h3 class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] mb-2">{{ $teamStats['experience_years'] }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Tahun Pengalaman</p>
                </div>
                <div class="text-center p-8 bg-gray-100 dark:bg-gray-700 rounded-2xl hover:scale-105 transition-all duration-300">
                    <h3 class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] mb-2">{{ $teamStats['successful_events'] }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Event Sukses</p>
                </div>
                <div class="text-center p-8 bg-gray-100 dark:bg-gray-700 rounded-2xl hover:scale-105 transition-all duration-300">
                    <h3 class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] mb-2">{{ $teamStats['team_members'] }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Tim Ahli</p>
                </div>
                <div class="text-center p-8 bg-gray-100 dark:bg-gray-700 rounded-2xl hover:scale-105 transition-all duration-300">
                    <h3 class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] mb-2">{{ $teamStats['client_satisfaction'] }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Kepuasan Klien</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Team Section (Menggunakan data dari database) -->
    {{-- <div class="py-20 px-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-5xl edu-vic-wa-nt-hand text-black dark:text-white mb-4">
                    Tim Inti 3Rasa
                </h2>
                <p class="text-xl pt-serif-regular-italic text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Bertemu dengan para profesional yang akan mewujudkan momen spesial Anda dengan 
                    <span class="text-[--color-primary]">banyak cinta</span> dan dedikasi tinggi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                @php
                $gradients = [
                    'from-purple-400 to-pink-400',
                    'from-blue-400 to-teal-400',
                    'from-green-400 to-emerald-400',
                    'from-red-400 to-orange-400',
                    'from-indigo-400 to-purple-400',
                    'from-yellow-400 to-red-400'
                ];
                @endphp
                
                @foreach($coreTeam as $index => $member)
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-square bg-gradient-to-br {{ $gradients[$index % count($gradients)] }} relative overflow-hidden">
                        <img src="{{ $member->foto_url }}" alt="{{ $member->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-all duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl edu-vic-wa-nt-hand text-black dark:text-white mb-2">{{ $member->nama }}</h3>
                        <p class="text-[--color-primary] font-semibold mb-3">{{ $member->jabatan }}</p>
                        <p class="text-gray-600 dark:text-gray-300 text-sm pt-serif-regular leading-relaxed">
                            {{ Str::limit($member->deskripsi, 120) }}
                        </p>
                        <div class="flex space-x-3 mt-4">
                            @if($member->email)
                            <a href="mailto:{{ $member->email }}" class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                                <x-bi-envelope class="w-4 h-4" />
                            </a>
                            @endif
                            @if($member->telepon)
                            <a href="tel:{{ $member->telepon }}" class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                                <x-bi-telephone class="w-4 h-4" />
                            </a>
                            @endif
                            <button class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                                <x-bi-instagram class="w-4 h-4" />
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <!-- Extended Team Section (Support Team dari database) -->
    <div  class="py-20 px-8">
        <div class="max-w-6xl mx-auto">
            <div data-aos="zoom-in-up" class="text-center mb-16">
                <h2 data-aos="zoom-in-down" class="text-4xl edu-vic-wa-nt-hand text-black dark:text-white mb-4">
                    Tim Kami
                </h2>
                <p data-aos="zoom-in-up" class="text-lg pt-serif-regular-italic text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Didukung oleh para ahli di bidangnya masing-masing untuk memberikan layanan terbaik.
                </p>
            </div>

            @if($supportTeam->count() > 0)
            <div data-aos="zoom-in-up" class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php
                $supportGradients = [
                    'from-red-400 to-pink-400',
                    'from-purple-400 to-indigo-400',
                    'from-yellow-400 to-orange-400',
                    'from-green-400 to-teal-400',
                    'from-blue-400 to-cyan-400',
                    'from-pink-400 to-rose-400',
                    'from-indigo-400 to-purple-400',
                    'from-emerald-400 to-green-400'
                ];
                @endphp

                @foreach($supportTeam as $index => $member)
                <div class="group text-center">
                    @if($member->foto)
                    <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ $member->foto_url }}" alt="{{ $member->nama }}" class="w-full h-full object-cover">
                    </div>
                    @else
                    <div class="w-20 h-20 mx-auto mb-3 rounded-full bg-gradient-to-br {{ $supportGradients[$index % count($supportGradients)] }} flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <span class="text-white font-bold text-lg">{{ substr($member->nama, 0, 1) }}</span>
                    </div>
                    @endif
                    <h4 class="text-lg edu-vic-wa-nt-hand text-black dark:text-white">{{ $member->nama }}</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $member->jabatan }}</p>
                    @if($member->telepon || $member->email)
                    <div class="flex justify-center space-x-2 mt-2">
                        @if($member->email)
                        <a href="mailto:{{ $member->email }}" class="text-xs text-[--color-primary] hover:underline">
                            Email
                        </a>
                        @endif
                        @if($member->telepon)
                        <a href="tel:{{ $member->telepon }}" class="text-xs text-[--color-primary] hover:underline">
                            {{ $member->formatted_phone ?? $member->telepon }}
                        </a>
                        @endif
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <!-- Fallback jika tidak ada support team di database -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php
                $defaultSupportTeam = [
                    ['name' => 'Tim Photographer', 'role' => 'Photography', 'bg' => 'from-red-400 to-pink-400'],
                    ['name' => 'Tim Makeup', 'role' => 'Makeup Artist', 'bg' => 'from-purple-400 to-indigo-400'],
                    ['name' => 'Tim Video', 'role' => 'Videography', 'bg' => 'from-yellow-400 to-orange-400'],
                    ['name' => 'Tim Dekorasi', 'role' => 'Decoration', 'bg' => 'from-green-400 to-teal-400']
                ];
                @endphp

                @foreach($defaultSupportTeam as $member)
                <div class="group text-center">
                    <div class="w-20 h-20 mx-auto mb-3 rounded-full bg-gradient-to-br {{ $member['bg'] }} flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <span class="text-white font-bold text-lg">{{ substr($member['name'], 0, 1) }}</span>
                    </div>
                    <h4 class="text-lg edu-vic-wa-nt-hand text-black dark:text-white">{{ $member['name'] }}</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $member['role'] }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <!-- Values Section -->
    <div class="py-20 px-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-5xl edu-vic-wa-nt-hand text-black dark:text-white mb-4">
                    Nilai-Nilai Kami
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8 bg-white dark:bg-gray-800 rounded-2xl">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-[--color-primary] flex items-center justify-center">
                        <x-heroicon-o-heart class="w-8 h-8 text-white" />
                    </div>
                    <h3 class="text-2xl edu-vic-wa-nt-hand text-black dark:text-white mb-3">Dibuat dengan Cinta</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Setiap detail dikerjakan dengan penuh kasih sayang dan perhatian khusus untuk momen berharga Anda.</p>
                </div>

                <div class="text-center p-8 bg-white dark:bg-gray-800 rounded-2xl">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-[--color-primary] flex items-center justify-center">
                        <x-heroicon-o-star class="w-8 h-8 text-white" />
                    </div>
                    <h3 class="text-2xl edu-vic-wa-nt-hand text-black dark:text-white mb-3">Kualitas Premium</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Kami berkomitmen memberikan layanan terbaik dengan standar kualitas internasional.</p>
                </div>

                <div class="text-center p-8 bg-white dark:bg-gray-800 rounded-2xl">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-[--color-primary] flex items-center justify-center">
                        <x-heroicon-o-users class="w-8 h-8 text-white" />
                    </div>
                    <h3 class="text-2xl edu-vic-wa-nt-hand text-black dark:text-white mb-3">Kerja Tim Solid</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Kolaborasi yang harmonis antar tim untuk menghasilkan event yang sempurna.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-20 px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-5xl edu-vic-wa-nt-hand text-black dark:text-white mb-6">
                Siap Berkolaborasi dengan Tim Terbaik?
            </h2>
            <p class="text-xl pt-serif-regular-italic text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">
                Mari wujudkan momen spesial Anda bersama tim profesional yang berpengalaman dan berdedikasi tinggi.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="group flex items-center justify-center hover:scale-105 transition-all duration-300 bg-gray-300 dark:bg-gray-600 rounded-full">
                    <p class="my-3 mx-6 pt-serif-regular text-black dark:text-white">
                        Konsultasi Gratis
                    </p>
                    <x-heroicon-o-arrow-small-up class="h-10 w-10 border-2 bg-black dark:bg-white text-white dark:text-black rounded-full p-1 group-hover:rotate-45 duration-300 transition-all" />
                </button>
                <a href="/portofolio">
                    <button class="edu-vic-wa-nt-hand-500 font-semibold border-2 tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 border-[--color-primary] text-[--color-primary] dark:text-white dark:border-white rounded-xl px-6 py-3">
                        Lihat Portfolio
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection