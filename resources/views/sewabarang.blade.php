@extends('Layout.app')

@section('title', 'Layanan Penyewaan')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen">

      <div class="relative h-[70vh] bg-[url({{ asset('storage/content/gif02.gif') }})] bg-cover bg-center rounded-b-[150px] overflow-hidden">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 class="text-6xl font-semibold mb-4 edu-vic-wa-nt-hand tracking-wide">
                    Layanan Penyewaan
                </h1>
                <p class="text-xl pt-serif-regular-italic max-w-2xl mx-auto">
                    Wujudkan pernikahan impian Anda dengan koleksi perlengkapan premium berkualitas tinggi dari 3Rasa
                </p>
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 px-10 md:px-16 lg:px-24 xl:px-32">
        
        {{-- Header Section --}}
        <h2 class="text-black text-center py-8 text-2xl lg:text-3xl poppins-medium mx-8 md:mx-20 lg:mx-40 dark:text-white">
            Sewa yang 
            <span class="pt-serif-regular-italic">Premium</span> 
            dengan Harga 
            <span class="pt-serif-regular-italic">Terjangkau</span>,
            Wujudkan
            <span class="pt-serif-regular-italic">Pernikahan Sempurna</span>
            Sesuai
            <span class="pt-serif-regular-italic">Impian Anda.</span>
        </h2>

        {{-- Category Selection --}}
        <div class="mt-12 mb-16" x-data="{ activeCategory: 'furniture' }">
            <div class="text-center mb-12">
                <h3 class="text-3xl lg:text-4xl edu-vic-wa-nt-hand-500 text-black dark:text-white mb-8">Kategori Penyewaan</h3>
                <div class="flex flex-wrap justify-center gap-4">
                    <button 
                        @click="activeCategory = 'furniture'"
                        :class="activeCategory === 'furniture' ? 'bg-[--color-primary] text-white' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                        class="px-6 py-2 rounded-xl transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand tracking-wide"
                    >
                        Furniture & Kursi
                    </button>
                    <button 
                        @click="activeCategory = 'decoration'"
                        :class="activeCategory === 'decoration' ? 'bg-[--color-primary] text-white' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                        class="px-6 py-2 rounded-xl transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand tracking-wide"
                    >
                        Dekorasi & Backdrop
                    </button>
                    <button 
                        @click="activeCategory = 'lighting'"
                        :class="activeCategory === 'lighting' ? 'bg-[--color-primary] text-white' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                        class="px-6 py-2 rounded-xl transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand tracking-wide"
                    >
                        Lighting & Sound
                    </button>
                    <button 
                        @click="activeCategory = 'tableware'"
                        :class="activeCategory === 'tableware' ? 'bg-[--color-primary] text-white' : 'border-2 border-[--color-primary] text-[--color-primary] hover:bg-[--color-primary] hover:text-white dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'"
                        class="px-6 py-2 rounded-xl transition-all duration-300 hover:scale-105 edu-vic-wa-nt-hand tracking-wide"
                    >
                        Peralatan Makan
                    </button>
                </div>
            </div>

            {{-- Featured Product Grid (similar to homepage cards) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
                
                {{-- Card 1 - Featured Sofa Set --}}
                <div class="flex poppins-regular h-72 md:h-[400px] flex-col p-4 text-black dark:text-white border-2 border-gray-300 justify-between rounded-xl bg-[url({{ asset('storage/content/prop/sofa-premium.jpg') }})] bg-no-repeat bg-center bg-cover">
                    <h3 class="w-auto self-end border-2 dark:border-white px-3 py-1 rounded-full text-xs">Premium Collection</h3>
                    <div>
                        <h4 class="text-xl edu-vic-wa-nt-hand-400 tracking-widest mb-2">Sofa Premium Set</h4>
                        <p class="text-md xl:text-lg edu-vic-wa-nt-hand-400 tracking-widest">Set sofa premium berbahan kulit sintetis berkualitas tinggi dengan rangka kayu solid.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="text-2xl font-bold edu-vic-wa-nt-hand">Rp 350.000</div>
                            <button class="px-4 py-2 bg-white text-black rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Card 2 - Info Card --}}
                <div class="flex flex-col border-2 rounded-xl border-gray-200 p-4 gap-4 items-center justify-center text-center">
                    <h3 class="text-3xl lg:text-4xl edu-vic-wa-nt-hand-500 text-black dark:text-white">Kualitas Premium Terjamin</h3>
                    <p class="pt-serif-regular text-sm lg:text-md tracking-wider dark:text-gray-400 text-gray-600">Semua perlengkapan dalam kondisi prima dan selalu terawat. Kami pastikan kualitas terbaik untuk acara istimewa Anda.</p>
                    
                    <button class="flex group hover:scale-105 transition-all duration-300 bg-gray-300 rounded-full justify-center items-center">
                        <p class="my-2 mx-3 ml-4 pt-serif-regular text-sm lg:text-lg text-black">
                            Konsultasi Gratis
                        </p>
                        <x-heroicon-o-arrow-small-up class="w-8 h-8 lg:h-10 lg:w-10 border-2 bg-black text-white rounded-full p-1 group-hover:rotate-45 duration-300 transition-all" />
                    </button>
                </div>

                {{-- Card 3 - Service Features --}}
                <div class="h-40 lg:h-[400px] md:col-span-2 lg:col-span-1 flex relative overflow-hidden poppins-regular flex-col p-4 text-white border-2 border-gray-300 justify-between rounded-xl bg-[url({{ asset('storage/content/wedding04.jpg') }})] bg-no-repeat bg-center bg-cover">
                    <div class="absolute inset-0 bg-black/60"></div>
                    <div class="relative z-10 flex gap-3 text-xs">
                        <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">Gratis Antar</span>
                        <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">Setup</span>
                        <span class="rounded-full p-1 px-5 backdrop-blur-sm bg-white/40">Maintenance</span>
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-lg edu-vic-wa-nt-hand-400 mb-2">Layanan Lengkap</h4>
                        <p class="text-sm">Gratis antar-jemput, setup profesional, dan maintenance selama acara</p>
                    </div>
                </div>
            </div>

            {{-- Product Grid --}}
            <div x-show="activeCategory === 'furniture'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                {{-- Kursi Tiffany --}}
                <div class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="relative h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <img src="{{ asset('storage/content/prop/kursi.jpg') }}" alt="Kursi Tiffany" class="w-32 h-32 object-cover rounded-lg shadow">
                    </div>
                    <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">Kursi Tiffany</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">Kursi elegant transparan berkualitas tinggi</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 15.000</div>
                                <div class="text-xs text-gray-500">per unit/hari</div>
                            </div>
                            <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Meja Bulat --}}
                <div class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="relative h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <img src="{{ asset('storage/content/prop/meja.jpg') }}" alt="Meja Bulat" class="w-32 h-32 object-cover rounded-lg shadow">
                    </div>
                    <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">Meja Bulat Premium</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">Meja bulat kapasitas 8-10 orang dengan taplak</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 85.000</div>
                                <div class="text-xs text-gray-500">per unit/hari</div>
                            </div>
                            <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Sofa VIP --}}
                <div class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="relative h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <img src="{{ asset('storage/content/prop/sofa-vip.jpg') }}" alt="Sofa VIP" class="w-32 h-32 object-cover rounded-lg shadow">
                    </div>
                    <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">Sofa VIP Set</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">Set sofa VIP untuk pengantin dan keluarga</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 450.000</div>
                                <div class="text-xs text-gray-500">per set/hari</div>
                            </div>
                            <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Gazebo --}}
                <div class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="relative h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <img src="{{ asset('storage/content/prop/gazebo.jpg') }}" alt="Gazebo" class="w-32 h-32 object-cover rounded-lg shadow">
                    </div>
                    <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">Gazebo Elegant</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">Gazebo dengan dekorasi untuk akad nikah</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 750.000</div>
                                <div class="text-xs text-gray-500">per set/hari</div>
                            </div>
                            <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Decoration Category --}}
            <div x-show="activeCategory === 'decoration'" style="display: none;" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                {{-- Backdrop Premium --}}
                <div class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="relative h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <img src="{{ asset('storage/content/decoration01.jpeg') }}" alt="Backdrop" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">Backdrop Premium</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">Backdrop elegant dengan dekorasi bunga</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 650.000</div>
                                <div class="text-xs text-gray-500">per set/hari</div>
                            </div>
                            <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Pelaminan --}}
                <div class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="relative h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <img src="{{ asset('storage/content/decoration.jpg') }}" alt="Pelaminan" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">Pelaminan Mewah</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">Pelaminan dengan ornamen traditional</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 1.200.000</div>
                                <div class="text-xs text-gray-500">per set/hari</div>
                            </div>
                            <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Lighting Category --}}
            <div x-show="activeCategory === 'lighting'" style="display: none;" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                {{-- LED Strip --}}
                <div class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="relative h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <div class="w-32 h-32 bg-yellow-400 rounded-lg flex items-center justify-center">
                            <span class="text-4xl">💡</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">LED Strip Premium</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">Lampu LED strip dengan berbagai warna</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 150.000</div>
                                <div class="text-xs text-gray-500">per meter/hari</div>
                            </div>
                            <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Sound System --}}
                <div class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="relative h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <div class="w-32 h-32 bg-blue-400 rounded-lg flex items-center justify-center">
                            <span class="text-4xl">🔊</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">Sound System Pro</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">Sound system professional dengan operator</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 450.000</div>
                                <div class="text-xs text-gray-500">per set/hari</div>
                            </div>
                            <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tableware Category --}}
            <div x-show="activeCategory === 'tableware'" style="display: none;" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                {{-- Piring Set --}}
                <div class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="relative h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <div class="w-32 h-32 bg-green-400 rounded-lg flex items-center justify-center">
                            <span class="text-4xl">🍽️</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">Piring Set Premium</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">Set piring keramik berkualitas tinggi</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 5.000</div>
                                <div class="text-xs text-gray-500">per set/hari</div>
                            </div>
                            <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Gelas Set --}}
                <div class="bg-white dark:bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="relative h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <div class="w-32 h-32 bg-purple-400 rounded-lg flex items-center justify-center">
                            <span class="text-4xl">🥃</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2 edu-vic-wa-nt-hand text-black dark:text-white">Gelas Set Premium</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 pt-serif-regular">Set gelas kaca untuk minuman</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xl font-bold text-[--color-primary] edu-vic-wa-nt-hand">Rp 3.000</div>
                                <div class="text-xs text-gray-500">per set/hari</div>
                            </div>
                            <button class="px-4 py-2 bg-[--color-primary] text-white rounded-lg text-sm hover:scale-105 transition-transform">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Why Choose Us Section (sama seperti homepage) --}}
        <div class="grid pb-16 grid-cols-1 md:grid-cols-2 mt-10 gap-4">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3 bg-gray-200 rounded-2xl p-6">
                    <h3 class="text-black text-lg poppins-regular">Keunggulan layanan penyewaan kami :</h3>
                    <p class="mt-2 edu-vic-wa-nt-hand-500 text-gray-800 text-sm">"Kualitas premium, harga terjangkau, dan layanan antar-jemput gratis area Tarakan!"
                        <span class="font-semibold text-[--color-primary]">- Tim 3Rasa</span>
                    </p>
                </div>

                <div class="h-52 xl:h-full bg-[url({{ asset('storage/content/prop/kursi.jpg') }})] rounded-xl xl:col-span-1 col-span-3 bg-cover bg-center"></div>
                
                <div class="flex col-span-2 xl:col-span-1 flex-col items-center justify-center text-center gap-4 border-2 rounded-2xl border-gray-200 p-4 text-sm">
                    <p class="pt-serif-regular text-center tracking-wider dark:text-gray-400 text-gray-600">Semua perlengkapan dalam kondisi prima dan selalu terawat untuk acara istimewa Anda.</p>
                    
                    <button class="flex group hover:scale-105 transition-all duration-300 bg-gray-300 rounded-full justify-center items-center">
                        <p class="my-2 mx-3 ml-4 pt-serif-regular text-black">
                            Konsultasi
                        </p>
                        <x-heroicon-o-arrow-small-up class="h-8 w-8 border-2 bg-black text-white rounded-full p-1 group-hover:rotate-45 duration-300 transition-all" />
                    </button>
                </div>

                <div class="flex bg-gray-200 flex-col items-center justify-center text-center gap-4 border-2 rounded-2xl border-gray-200 p-4 text-sm">
                    <p class="pt-serif-regular text-3xl xl:text-5xl text-center tracking-wider dark:text-gray-400 text-gray-600">500 +</p>
                    <p class="pt-serif-regular text-center tracking-wider dark:text-gray-400 text-gray-600">Item tersedia</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 gap-5 pt-serif-regular">
                <div class="bg-gray-200 rounded-2xl p-6">
                    <h3 class="text-md text-black">Layanan penyewaan lengkap dengan kualitas premium dan harga terjangkau. Kami menyediakan berbagai perlengkapan pernikahan mulai dari furniture, dekorasi, hingga peralatan pendukung lainnya.</h3>
                </div>
                <div class="bg-gray-200 rounded-2xl px-6 py-4">
                    <p class="text-black">01. <span>Gratis antar-jemput area Tarakan</span></p>
                </div>
                <div class="bg-gray-200 rounded-2xl px-6 py-4">
                    <p class="text-black">02. <span>Setup dan maintenance profesional</span></p>
                </div>
                <div class="bg-gray-200 rounded-2xl px-6 py-4">
                    <p class="text-black">03. <span>Garansi kualitas premium</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .edu-vic-wa-nt-hand {
        font-family: 'Edu VIC WA NT Beginner', cursive;
    }
    
    .edu-vic-wa-nt-hand-500 {
        font-family: 'Edu VIC WA NT Beginner', cursive;
        font-weight: 500;
    }
    
    .edu-vic-wa-nt-hand-400 {
        font-family: 'Edu VIC WA NT Beginner', cursive;
        font-weight: 400;
    }
    
    .pt-serif-regular {
        font-family: 'PT Serif', serif;
    }
    
    .pt-serif-regular-italic {
        font-family: 'PT Serif', serif;
        font-style: italic;
    }
    
    .poppins-regular {
        font-family: 'Poppins', sans-serif;
    }
    
    .poppins-medium {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
    }

    .containerHero {
        width: 100%;
        height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .containerHero #slide {
        width: max-content;
        margin-top: 50px;
    }

    .containerHero .item {
        width: 100vw;
        height: 80vh;
        position: relative;
        background-size: cover;
        background-position: center;
    }

    .containerHero .item .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 1200px;
        text-align: center;
    }
</style>
@endpush

@push('scripts')
<script>
    // Add any additional JavaScript here if needed
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Wedding Rental Page Loaded');
    });
</script>
@endpush
@endsection