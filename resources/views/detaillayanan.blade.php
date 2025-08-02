@extends('Layout.app')

@section('title', $service->name . ' - Detail Layanan')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-800">
    
    {{-- Hero Section --}}
    <div class="relative h-96 lg:h-[500px] overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent z-10"></div>
        <img src="{{ asset($service->image ?? 'storage/content/wedding01.jpg') }}" 
             alt="{{ $service->name }}" 
             class="w-full h-full object-cover">
        
        <div class="absolute inset-0 z-20 flex items-center">
            <div class="container mx-auto px-6 lg:px-24">
                <div class="max-w-3xl">
                    {{-- Breadcrumb --}}
                    <nav class="mb-6">
                        <ol class="flex items-center space-x-2 text-sm text-gray-300">
                            <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a></li>
                            <li><x-heroicon-o-chevron-right class="w-4 h-4" /></li>
                            <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Layanan</a></li>
                            <li><x-heroicon-o-chevron-right class="w-4 h-4" /></li>
                            <li class="text-[--color-primary]">{{ $service->name }}</li>
                        </ol>
                    </nav>

                    <div class="mb-4">
                        <span class="inline-block px-4 py-2 bg-[--color-primary]/20 backdrop-blur-sm rounded-full text-[--color-primary] text-sm font-semibold">
                            {{ $service->category }}
                        </span>
                    </div>
                    
                    <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6 edu-vic-wa-nt-hand">
                        {{ $service->name }}
                    </h1>
                    
                    <p class="text-xl text-gray-200 mb-8 pt-serif-regular-italic leading-relaxed">
                        {{ $service->description }}
                    </p>
                    
                    <div class="flex flex-wrap gap-4">
                        <button class="bg-[--color-primary] text-white px-8 py-3 rounded-xl font-semibold hover:bg-[--color-primary]/90 transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand-500">
                            Konsultasi Gratis
                        </button>
                        <button class="border-2 border-white text-white px-8 py-3 rounded-xl font-semibold hover:bg-white hover:text-black transition-all duration-300 edu-vic-wa-nt-hand-500">
                            Lihat Katalog
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Service Info Cards --}}
    <div class="container mx-auto px-6 lg:px-24 -mt-20 relative z-30 mb-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-100 dark:border-gray-700">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-4">
                    <x-heroicon-o-clock class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                </div>
                <h3 class="text-lg font-bold text-black dark:text-white mb-2">Waktu Layanan</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $service->service_duration ?? 'Fleksibel sesuai kebutuhan' }}</p>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-100 dark:border-gray-700">
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mb-4">
                    <x-heroicon-o-currency-dollar class="w-6 h-6 text-green-600 dark:text-green-400" />
                </div>
                <h3 class="text-lg font-bold text-black dark:text-white mb-2">Harga Mulai</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Rp {{ number_format($service->starting_price ?? 0, 0, ',', '.') }}</p>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-100 dark:border-gray-700">
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mb-4">
                    <x-heroicon-o-star class="w-6 h-6 text-purple-600 dark:text-purple-400" />
                </div>
                <h3 class="text-lg font-bold text-black dark:text-white mb-2">Rating</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $service->rating ?? '4.8' }}/5 ({{ $service->total_reviews ?? '120' }} ulasan)</p>
            </div>
        </div>
    </div>

    {{-- Tab Navigation --}}
    <div class="container mx-auto px-6 lg:px-24 mb-12">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <nav class="-mb-px flex space-x-8" x-data="{ activeTab: 'items' }">
                <button @click="activeTab = 'items'" 
                        :class="activeTab === 'items' ? 'border-[--color-primary] text-[--color-primary]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-300">
                    <div class="flex items-center space-x-2">
                        <x-heroicon-o-cube class="w-5 h-5" />
                        <span>Daftar Barang ({{ count($service->items ?? []) }})</span>
                    </div>
                </button>
                
                <button @click="activeTab = 'packages'" 
                        :class="activeTab === 'packages' ? 'border-[--color-primary] text-[--color-primary]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-300">
                    <div class="flex items-center space-x-2">
                        <x-heroicon-o-gift class="w-5 h-5" />
                        <span>Paket Layanan ({{ count($service->packages ?? []) }})</span>
                    </div>
                </button>
                
                <button @click="activeTab = 'gallery'" 
                        :class="activeTab === 'gallery' ? 'border-[--color-primary] text-[--color-primary]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-300">
                    <div class="flex items-center space-x-2">
                        <x-heroicon-o-photo class="w-5 h-5" />
                        <span>Galeri</span>
                    </div>
                </button>
                
                <button @click="activeTab = 'reviews'" 
                        :class="activeTab === 'reviews' ? 'border-[--color-primary] text-[--color-primary]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-300">
                    <div class="flex items-center space-x-2">
                        <x-heroicon-o-chat-bubble-left-ellipsis class="w-5 h-5" />
                        <span>Ulasan</span>
                    </div>
                </button>
            </nav>
        </div>
    </div>

    {{-- Tab Content --}}
    <div class="container mx-auto px-6 lg:px-24" x-data="{ activeTab: 'items' }">
        
        {{-- Daftar Barang Tab --}}
        <div x-show="activeTab === 'items'" x-transition class="mb-16">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-black dark:text-white mb-4 edu-vic-wa-nt-hand">Daftar Barang Tersedia</h2>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic">Pilih barang sesuai kebutuhan acara Anda. Semua barang tersedia dalam kondisi prima dan terawat.</p>
            </div>

            {{-- Filter & Search --}}
            <div class="mb-8 flex flex-col md:flex-row gap-4 items-center justify-between">
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 bg-[--color-primary] text-white rounded-full text-sm font-medium">Semua</button>
                    <button class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">Meja</button>
                    <button class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">Kursi</button>
                    <button class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">Dekorasi</button>
                </div>
                
                <div class="relative">
                    <x-heroicon-o-magnifying-glass class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" />
                    <input type="text" placeholder="Cari barang..." class="pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-black dark:text-white focus:ring-2 focus:ring-[--color-primary] focus:border-transparent">
                </div>
            </div>

            {{-- Items Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($service->items ?? [] as $item)
                <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700">
                    <div class="aspect-square bg-gray-100 dark:bg-gray-700 rounded-t-2xl overflow-hidden">
                        <img src="{{ asset($item->image ?? 'storage/content/prop/kursi.jpg') }}" 
                             alt="{{ $item->name }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-bold text-black dark:text-white text-lg">{{ $item->name }}</h3>
                            @if($item->is_available ?? true)
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Tersedia</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Tidak Tersedia</span>
                            @endif
                        </div>
                        
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 leading-relaxed">{{ Str::limit($item->description ?? 'Barang berkualitas premium untuk acara Anda', 60) }}</p>
                        
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-[--color-primary] font-bold text-lg">
                                Rp {{ number_format($item->price_per_day ?? 50000, 0, ',', '.') }}/hari
                            </div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                Stok: {{ $item->stock ?? 10 }}
                            </div>
                        </div>
                        
                        <div class="flex gap-2">
                            <button class="flex-1 bg-[--color-primary] text-white py-2 px-4 rounded-lg font-medium hover:bg-[--color-primary]/90 transition-colors">
                                Sewa Sekarang
                            </button>
                            <button class="p-2 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <x-heroicon-o-heart class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <x-heroicon-o-cube class="w-16 h-16 text-gray-400 mx-auto mb-4" />
                    <h3 class="text-xl font-semibold text-gray-600 dark:text-gray-400 mb-2">Belum Ada Barang</h3>
                    <p class="text-gray-500 dark:text-gray-500">Barang untuk layanan ini sedang dalam proses penambahan.</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Paket Layanan Tab --}}
        <div x-show="activeTab === 'packages'" x-transition class="mb-16">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-black dark:text-white mb-4 edu-vic-wa-nt-hand">Paket Layanan</h2>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic">Pilih paket yang sesuai dengan budget dan kebutuhan acara Anda. Setiap paket sudah termasuk berbagai layanan lengkap.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @forelse($service->packages ?? [] as $package)
                <div class="group relative bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border border-gray-100 dark:border-gray-700 overflow-hidden {{ $package->is_popular ?? false ? 'ring-4 ring-[--color-primary]/20' : '' }}">
                    
                    @if($package->is_popular ?? false)
                    <div class="absolute top-6 right-6 z-10">
                        <span class="bg-gradient-to-r from-[--color-primary] to-pink-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                            Paling Populer
                        </span>
                    </div>
                    @endif

                    <div class="p-8">
                        <div class="text-center mb-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-[--color-primary] to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <x-heroicon-o-gift class="w-10 h-10 text-white" />
                            </div>
                            
                            <h3 class="text-2xl font-bold text-black dark:text-white mb-2 edu-vic-wa-nt-hand">{{ $package->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $package->subtitle ?? 'Paket lengkap untuk acara Anda' }}</p>
                        </div>

                        <div class="text-center mb-8">
                            <div class="text-4xl font-bold text-black dark:text-white mb-2">
                                Rp {{ number_format($package->price ?? 5000000, 0, ',', '.') }}
                            </div>
                            <div class="text-gray-500 dark:text-gray-400 text-sm">{{ $package->duration ?? 'Per acara' }}</div>
                            @if($package->discount ?? 0 > 0)
                            <div class="text-sm text-green-600 dark:text-green-400 font-medium mt-1">
                                Hemat {{ $package->discount }}%!
                            </div>
                            @endif
                        </div>

                        <div class="space-y-4 mb-8">
                            @foreach($package->features ?? [] as $feature)
                            <div class="flex items-center">
                                <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" />
                                <span class="text-gray-700 dark:text-gray-300 text-sm">{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>

                        <button class="w-full bg-gradient-to-r from-[--color-primary] to-pink-500 text-white py-4 px-6 rounded-xl font-bold hover:shadow-lg transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand-500">
                            Pilih Paket Ini
                        </button>

                        <div class="text-center mt-4">
                            <button class="text-[--color-primary] text-sm font-medium hover:underline">
                                Lihat Detail Lengkap
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <x-heroicon-o-gift class="w-16 h-16 text-gray-400 mx-auto mb-4" />
                    <h3 class="text-xl font-semibold text-gray-600 dark:text-gray-400 mb-2">Belum Ada Paket</h3>
                    <p class="text-gray-500 dark:text-gray-500">Paket layanan sedang dalam tahap persiapan.</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Gallery Tab --}}
        <div x-show="activeTab === 'gallery'" x-transition class="mb-16">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-black dark:text-white mb-4 edu-vic-wa-nt-hand">Galeri Hasil Kerja</h2>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic">Lihat hasil kerja kami yang telah dipercaya oleh berbagai klien untuk acara istimewa mereka.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @for($i = 1; $i <= 9; $i++)
                <div class="group relative aspect-square bg-gray-100 dark:bg-gray-700 rounded-2xl overflow-hidden cursor-pointer">
                    <img src="{{ asset('storage/content/wedding0' . (($i - 1) % 5 + 1) . '.jpg') }}" 
                         alt="Gallery {{ $i }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-all duration-300 flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <x-heroicon-o-magnifying-glass-plus class="w-12 h-12 text-white" />
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        {{-- Reviews Tab --}}
        <div x-show="activeTab === 'reviews'" x-transition class="mb-16">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-black dark:text-white mb-4 edu-vic-wa-nt-hand">Ulasan Pelanggan</h2>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular-italic">Dengar langsung dari klien yang telah mempercayakan acara istimewa mereka kepada kami.</p>
            </div>

            {{-- Rating Summary --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-2xl p-8 mb-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div class="text-center lg:text-left">
                        <div class="text-6xl font-bold text-[--color-primary] mb-2">4.8</div>
                        <div class="flex items-center justify-center lg:justify-start mb-2">
                            @for($i = 1; $i <= 5; $i++)
                            <x-heroicon-s-star class="w-6 h-6 text-yellow-400" />
                            @endfor
                        </div>
                        <p class="text-gray-600 dark:text-gray-400">Berdasarkan 120 ulasan</p>
                    </div>
                    
                    <div class="space-y-2">
                        @for($i = 5; $i >= 1; $i--)
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600 dark:text-gray-400 w-8">{{ $i }}</span>
                            <x-heroicon-s-star class="w-4 h-4 text-yellow-400 mr-2" />
                            <div class="flex-1 bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ rand(60, 95) }}%"></div>
                            </div>
                            <span class="text-sm text-gray-600 dark:text-gray-400 ml-2 w-8">{{ rand(10, 80) }}</span>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            {{-- Reviews List --}}
            <div class="space-y-6">
                @for($i = 1; $i <= 5; $i++)
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-100 dark:border-gray-700">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-lg">{{ chr(64 + $i) }}</span>
                        </div>
                        
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-bold text-black dark:text-white">Andi & Sari</h4>
                                <span class="text-gray-500 dark:text-gray-400 text-sm">{{ rand(1, 30) }} hari yang lalu</span>
                            </div>
                            
                            <div class="flex items-center mb-3">
                                @for($j = 1; $j <= 5; $j++)
                                <x-heroicon-s-star class="w-4 h-4 text-yellow-400" />
                                @endfor
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Wedding Organizer</span>
                            </div>
                            
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                "Pelayanan sangat memuaskan! Tim 3Rasa sangat profesional dan detail dalam menangani pernikahan kami. Semua berjalan lancar sesuai rencana. Terima kasih telah membuat hari bahagia kami menjadi sempurna!"
                            </p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <div class="text-center mt-8">
                <button class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-6 py-3 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                    Muat Lebih Banyak Ulasan
                </button>
            </div>
        </div>
    </div>

    {{-- CTA Section --}}
    <div class="bg-gradient-to-br from-[--color-primary] to-pink-500 py-16">
        <div class="container mx-auto px-6 lg:px-24 text-center">
            <h2 class="text-3xl lg:text-5xl font-bold text-white mb-6 edu-vic-wa-nt-hand">
                Siap Mewujudkan Acara Impian Anda?
            </h2>
            <p class="text-xl text-white/90 mb-8 pt-serif-regular-italic max-w-2xl mx-auto">
                Konsultasikan kebutuhan acara Anda dengan tim profesional kami. Dapatkan penawaran terbaik dan solusi yang tepat.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-white text-[--color-primary] px-8 py-4 rounded-xl font-bold hover:bg-gray-100 transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand-500">
                    <div class="flex items-center justify-center space-x-2">
                        <x-heroicon-o-phone class="w-5 h-5" />
                        <span>Hubungi Sekarang</span>
                    </div>
                </button>
                <button class="border-2 border-white text-white px-8 py-4 rounded-xl font-bold hover:bg-white hover:text-[--color-primary] transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand-500">
                    <div class="flex items-center justify-center space-x-2">
                        <x-heroicon-o-chat-bubble-left-ellipsis class="w-5 h-5" />
                        <span>Chat WhatsApp</span>
                    </div>
                </button>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    // Image Gallery Modal (optional)
    document.addEventListener('alpine:init', () => {
        Alpine.data('serviceDetail', () => ({
            selectedCategory: 'all',
            searchQuery: '',
            
            filterItems(category) {
                this.selectedCategory = category;
                // Add filtering logic here
            },
            
            searchItems() {
                // Add search logic here
            }
        }));
    });
</script>
@endpush

@endsection