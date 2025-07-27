@extends('Layout.app')

@section('title', 'Team Kami')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen">
    <!-- Hero Section -->
    <div class="relative h-screen flex items-center justify-center bg-gradient-to-br from-purple-50 to-pink-50 dark:from-gray-900 dark:to-gray-800">
        <div class="absolute inset-0 bg-[url({{ asset('storage/content/team-bg.jpg') }})] bg-cover bg-center opacity-10"></div>
        <div class="relative z-10 text-center px-8">
            <h1 class="text-7xl edu-vic-wa-nt-hand text-black dark:text-white mb-6 tracking-wide">
                Tim Profesional Kami
            </h1>
            <p class="text-xl pt-serif-regular-italic text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Dibalik setiap momen spesial yang kami ciptakan, terdapat tim profesional yang berdedikasi tinggi dengan pengalaman bertahun-tahun dalam industri wedding organizer.
            </p>
        </div>
    </div>

    <!-- Team Stats Section -->
    <div class="px-8">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-20">
                <div class="text-center p-8 bg-gray-100 dark:bg-gray-700 rounded-2xl hover:scale-105 transition-all duration-300">
                    <h3 class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] mb-2">15+</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Tahun Pengalaman</p>
                </div>
                <div class="text-center p-8 bg-gray-100 dark:bg-gray-700 rounded-2xl hover:scale-105 transition-all duration-300">
                    <h3 class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] mb-2">500+</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Event Sukses</p>
                </div>
                <div class="text-center p-8 bg-gray-100 dark:bg-gray-700 rounded-2xl hover:scale-105 transition-all duration-300">
                    <h3 class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] mb-2">12</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Tim Ahli</p>
                </div>
                <div class="text-center p-8 bg-gray-100 dark:bg-gray-700 rounded-2xl hover:scale-105 transition-all duration-300">
                    <h3 class="text-5xl edu-vic-wa-nt-hand text-[--color-primary] mb-2">100%</h3>
                    <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">Kepuasan Klien</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Team Section -->
    <div class="py-20 px-8 bg-gray-50 dark:bg-gray-900">
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
                <!-- Team Member 1 -->
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-square bg-gradient-to-br from-purple-400 to-pink-400 relative overflow-hidden">
                        <img src="{{ asset('storage/team/sarah.jpg') }}" alt="Sarah Wijaya" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-all duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl edu-vic-wa-nt-hand text-black dark:text-white mb-2">Sarah Wijaya</h3>
                        <p class="text-[--color-primary] font-semibold mb-3">Lead Wedding Planner</p>
                        <p class="text-gray-600 dark:text-gray-300 text-sm pt-serif-regular leading-relaxed">
                            Dengan pengalaman 10+ tahun, Sarah ahli dalam merancang konsep pernikahan yang unik dan personal sesuai kepribadian setiap pasangan.
                        </p>
                        <div class="flex space-x-3 mt-4">
                            <button class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                                <x-bi-instagram class="w-4 h-4" />
                            </button>
                            <button class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                                <x-bi-envelope class="w-4 h-4" />
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-square bg-gradient-to-br from-blue-400 to-teal-400 relative overflow-hidden">
                        <img src="{{ asset('storage/team/david.jpg') }}" alt="David Chen" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-all duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl edu-vic-wa-nt-hand text-black dark:text-white mb-2">David Chen</h3>
                        <p class="text-[--color-primary] font-semibold mb-3">Creative Director</p>
                        <p class="text-gray-600 dark:text-gray-300 text-sm pt-serif-regular leading-relaxed">
                            Bertanggung jawab atas seluruh aspek kreatif dan visual. David memastikan setiap detail dekorasi mencerminkan visi artistik yang luar biasa.
                        </p>
                        <div class="flex space-x-3 mt-4">
                            <button class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                                <x-bi-instagram class="w-4 h-4" />
                            </button>
                            <button class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                                <x-bi-envelope class="w-4 h-4" />
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-square bg-gradient-to-br from-green-400 to-emerald-400 relative overflow-hidden">
                        <img src="{{ asset('storage/team/maya.jpg') }}" alt="Maya Sari" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-all duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl edu-vic-wa-nt-hand text-black dark:text-white mb-2">Maya Sari</h3>
                        <p class="text-[--color-primary] font-semibold mb-3">Event Coordinator</p>
                        <p class="text-gray-600 dark:text-gray-300 text-sm pt-serif-regular leading-relaxed">
                            Spesialis dalam koordinasi teknis dan logistik. Maya memastikan setiap acara berjalan lancar tanpa hambatan dari awal hingga akhir.
                        </p>
                        <div class="flex space-x-3 mt-4">
                            <button class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                                <x-bi-instagram class="w-4 h-4" />
                            </button>
                            <button class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-[--color-primary] hover:text-white transition-all duration-300">
                                <x-bi-envelope class="w-4 h-4" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Extended Team Section -->
    <div class="py-20 px-8">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl edu-vic-wa-nt-hand text-black dark:text-white mb-4">
                    Tim Pendukung
                </h2>
                <p class="text-lg pt-serif-regular-italic text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Didukung oleh para ahli di bidangnya masing-masing untuk memberikan layanan terbaik.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Support Team Members -->
                @php
                $supportTeam = [
                    ['name' => 'Andi Pratama', 'role' => 'Photographer', 'bg' => 'from-red-400 to-pink-400'],
                    ['name' => 'Lisa Indri', 'role' => 'Makeup Artist', 'bg' => 'from-purple-400 to-indigo-400'],
                    ['name' => 'Rudi Hartono', 'role' => 'Videographer', 'bg' => 'from-yellow-400 to-orange-400'],
                    ['name' => 'Nina Kusuma', 'role' => 'Florist', 'bg' => 'from-green-400 to-teal-400'],
                    ['name' => 'Agus Setiawan', 'role' => 'Sound System', 'bg' => 'from-blue-400 to-cyan-400'],
                    ['name' => 'Sari Dewi', 'role' => 'Catering', 'bg' => 'from-pink-400 to-rose-400'],
                    ['name' => 'Bayu Adi', 'role' => 'Lighting', 'bg' => 'from-indigo-400 to-purple-400'],
                    ['name' => 'Tari Wulan', 'role' => 'Entertainment', 'bg' => 'from-emerald-400 to-green-400']
                ];
                @endphp

                @foreach($supportTeam as $member)
                <div class="group text-center">
                    <div class="w-20 h-20 mx-auto mb-3 rounded-full bg-gradient-to-br {{ $member['bg'] }} flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <span class="text-white font-bold text-lg">{{ substr($member['name'], 0, 1) }}</span>
                    </div>
                    <h4 class="text-lg edu-vic-wa-nt-hand text-black dark:text-white">{{ $member['name'] }}</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $member['role'] }}</p>
                </div>
                @endforeach
            </div>
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
                <button class="edu-vic-wa-nt-hand-500 font-semibold border-2 tracking-wide hover:tracking-widest hover:px-8 transition-all duration-300 border-[--color-primary] text-[--color-primary] dark:text-white dark:border-white rounded-xl px-6 py-3">
                    Lihat Portfolio
                </button>
            </div>
        </div>
    </div>
</div>
@endsection