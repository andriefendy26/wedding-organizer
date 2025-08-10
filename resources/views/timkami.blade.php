@extends('Layout.app')

@section('title', 'Team Kami')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-900">
    <div class="relative h-[70vh] overflow-hidden mb-16"
    style="background-image: url('{{ asset('storage/content/gif02.gif') }}'); background-size: cover; background-position: center; mb-16">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 class="mb-4 text-4xl font-semibold tracking-wide lg:text-6xl edu-vic-wa-nt-hand">
                    Tim Profesional Kami
                </h1>
                <p class="max-w-2xl mx-auto text-xl pt-serif-regular-italic">
                    Dibalik setiap momen spesial yang kami ciptakan, terdapat tim profesional yang berdedikasi tinggi dengan pengalaman bertahun-tahun dalam industri wedding organizer.
                </p>
                </p>
            </div>
        </div>
    </div>

    <!-- Team Stats Section -->
    <div data-aos="zoom-in-down" class="px-4 mb-24 md:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="p-8 text-center transition-all duration-500 border border-gray-200 shadow-xl group bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-700 rounded-3xl dark:border-gray-600 hover:shadow-2xl hover:scale-105 hover:-translate-y-2">
                    <h3 class="mb-3 text-6xl transition-transform duration-300 edu-vic-wa-nt-hand text-primary group-hover:scale-110">{{ $teamStats['experience_years'] }}</h3>
                    <p class="font-medium text-gray-600 dark:text-gray-300 pt-serif-regular">Tahun Pengalaman</p>
                </div>
                <div class="p-8 text-center transition-all duration-500 border border-gray-200 shadow-xl group bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-700 rounded-3xl dark:border-gray-600 hover:shadow-2xl hover:scale-105 hover:-translate-y-2">
                    <h3 class="mb-3 text-6xl transition-transform duration-300 edu-vic-wa-nt-hand text-primary group-hover:scale-110">{{ $teamStats['successful_events'] }}</h3>
                    <p class="font-medium text-gray-600 dark:text-gray-300 pt-serif-regular">Event Sukses</p>
                </div>
                <div class="p-8 text-center transition-all duration-500 border border-gray-200 shadow-xl group bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-700 rounded-3xl dark:border-gray-600 hover:shadow-2xl hover:scale-105 hover:-translate-y-2">
                    <h3 class="mb-3 text-6xl transition-transform duration-300 edu-vic-wa-nt-hand text-primary group-hover:scale-110">{{ $teamStats['team_members'] }}</h3>
                    <p class="font-medium text-gray-600 dark:text-gray-300 pt-serif-regular">Tim Ahli</p>
                </div>
                <div class="p-8 text-center transition-all duration-500 border border-gray-200 shadow-xl group bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-700 rounded-3xl dark:border-gray-600 hover:shadow-2xl hover:scale-105 hover:-translate-y-2">
                    <h3 class="mb-3 text-6xl transition-transform duration-300 edu-vic-wa-nt-hand text-primary group-hover:scale-110">{{ $teamStats['client_satisfaction'] }}</h3>
                    <p class="font-medium text-gray-600 dark:text-gray-300 pt-serif-regular">Kepuasan Klien</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Extended Team Section -->
    <div class="px-4 py-24 md:px-8">
        <div class="mx-auto max-w-7xl">
            <div data-aos="zoom-in-up" class="mb-20 text-center">
                <h2 data-aos="zoom-in-down" class="mb-6 text-5xl text-black lg:text-6xl edu-vic-wa-nt-hand dark:text-white drop-shadow-lg">
                    Tim 3Rasa
                </h2>
                <p data-aos="zoom-in-up" class="max-w-3xl mx-auto text-lg leading-relaxed text-gray-600 lg:text-xl pt-serif-regular-italic dark:text-gray-300">
                    Didukung oleh para ahli di bidangnya masing-masing untuk memberikan layanan terbaik dengan standar internasional.
                </p>
            </div>

            @if($teams->count() > 0)
            <div data-aos="zoom-in-up" class="grid grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-4">
                @php
                $supportGradients = [
                    'from-red-400 to-pink-500',
                    'from-purple-400 to-indigo-500',
                    'from-yellow-400 to-orange-500',
                    'from-green-400 to-teal-500',
                    'from-blue-400 to-cyan-500',
                    'from-pink-400 to-rose-500',
                    'from-indigo-400 to-purple-500',
                    'from-emerald-400 to-green-500'
                ];
                @endphp

                @foreach($teams as $index => $member)
                 <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="group relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-2xl border border-gray-200 dark:border-gray-700 hover:shadow-3xl hover:border-primary/30 transition-all duration-700 hover:-translate-y-3 {{ $member['is_core'] ? 'lg:col-span-1' : '' }}">
                    
                        <!-- Support Team - Compact Cards -->
                        <div class="p-8 text-center">
                            @if(isset($member['foto_url']) && $member['foto_url'])
                                <div class="w-24 h-24 mx-auto mb-6 overflow-hidden transition-all duration-500 border-4 border-white rounded-full shadow-lg group-hover:shadow-xl group-hover:scale-110 dark:border-gray-600">
                                    <img src="{{ $member['foto_url'] }}" alt="{{ $member['nama'] }}" class="object-cover w-full h-full">
                                </div>
                            @else
                                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-br {{ $gradients[$index % count($gradients)] }} flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-500 border-4 border-white dark:border-gray-600">
                                    <span class="text-xl font-bold text-white drop-shadow-lg">{{ substr($member['nama'], 0, 1) }}</span>
                                </div>
                            @endif
                            
                            <h4 class="mb-2 text-2xl text-black transition-colors duration-300 edu-vic-wa-nt-hand dark:text-white group-hover:text-primary">{{ $member['nama'] }}</h4>
                            <p class="mb-4 text-base font-semibold text-primary">{{ $member['jabatan'] }}</p>
                            <p class="mb-6 text-sm leading-relaxed text-gray-600 dark:text-gray-300 pt-serif-regular">{{ $member['deskripsi'] }}</p>
                            
                            @if((isset($member['telepon']) && $member['telepon']) || (isset($member['email']) && $member['email']))
                            <div class="flex justify-center pt-4 space-x-4 border-t border-gray-200 dark:border-gray-700">
                                @if(isset($member['email']) && $member['email'])
                                <a href="mailto:{{ $member['email'] }}" class="text-xs font-medium transition-all duration-300 text-primary hover:text-primary/80 hover:underline pt-serif-regular">
                                    Email
                                </a>
                                @endif
                                @if(isset($member['telepon']) && $member['telepon'])
                                <a href="tel:{{ $member['telepon'] }}" class="text-xs font-medium transition-all duration-300 text-primary hover:text-primary/80 hover:underline pt-serif-regular">
                                    Call
                                </a>
                                @endif
                            </div>
                            @endif
                        </div>
                </div>
                @endforeach
            </div>
            @else
            <!-- Enhanced Fallback Team -->
            <div class="grid grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-4">
                @php
                $defaultSupportTeam = [
                    ['name' => 'Tim Photography', 'role' => 'Professional Photographer', 'bg' => 'from-red-400 to-pink-500', 'description' => 'Menangkap setiap momen berharga dengan teknik fotografi terbaik'],
                    ['name' => 'Tim Makeup', 'role' => 'Makeup Artist', 'bg' => 'from-purple-400 to-indigo-500', 'description' => 'Menciptakan look sempurna untuk hari spesial Anda'],
                    ['name' => 'Tim Videography', 'role' => 'Video Production', 'bg' => 'from-yellow-400 to-orange-500', 'description' => 'Mengabadikan cerita cinta dalam bentuk sinematik'],
                    ['name' => 'Tim Dekorasi', 'role' => 'Decoration Specialist', 'bg' => 'from-green-400 to-teal-500', 'description' => 'Mentransformasi venue menjadi setting impian'],
                    ['name' => 'Tim Catering', 'role' => 'Culinary Expert', 'bg' => 'from-blue-400 to-cyan-500', 'description' => 'Menyajikan hidangan lezat untuk tamu istimewa'],
                    ['name' => 'Tim Sound', 'role' => 'Audio Engineer', 'bg' => 'from-pink-400 to-rose-500', 'description' => 'Mengatur sistem audio untuk pengalaman terbaik'],
                    ['name' => 'Tim Lighting', 'role' => 'Lighting Designer', 'bg' => 'from-indigo-400 to-purple-500', 'description' => 'Menciptakan suasana dengan pencahayaan yang tepat'],
                    ['name' => 'Tim MC', 'role' => 'Master of Ceremony', 'bg' => 'from-emerald-400 to-green-500', 'description' => 'Memandu acara dengan profesional dan menghibur']
                ];
                @endphp

                @foreach($defaultSupportTeam as $index => $member)
                <div class="p-6 text-center transition-all duration-500 bg-white border border-gray-200 shadow-lg group dark:bg-gray-800 rounded-2xl dark:border-gray-700 hover:shadow-xl hover:border-primary/30 hover:-translate-y-2">
                    <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gradient-to-br {{ $member['bg'] }} flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-500 border-4 border-white dark:border-gray-600">
                        <span class="text-xl font-bold text-white drop-shadow-lg">{{ substr($member['name'], 0, 1) }}</span>
                    </div>
                    <h4 class="mb-2 text-xl text-black transition-colors duration-300 edu-vic-wa-nt-hand dark:text-white group-hover:text-primary">{{ $member['name'] }}</h4>
                    <p class="mb-3 text-sm font-medium text-gray-600 dark:text-gray-400 pt-serif-regular">{{ $member['role'] }}</p>
                    <p class="text-xs leading-relaxed text-gray-500 dark:text-gray-500 pt-serif-regular">{{ $member['description'] }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

</div>
@endsection