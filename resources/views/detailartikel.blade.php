@extends('Layout.app')

@section('title', 'Tips Memilih Dekorasi Pernikahan Adat yang Memukau')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen">
    {{-- Hero Section with Article Image --}}
    <div class="relative bg-gradient-to-br from-purple-600 to-pink-600 h-96">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 flex items-center">
            <div class="container mx-auto px-30">
                <div class="max-w-4xl">
                    <nav class="flex items-center gap-2 text-white/80 text-sm mb-6">
                        <a href="/" class="hover:text-white transition-colors">Beranda</a>
                        <span>/</span>
                        <a href="/artikel" class="hover:text-white transition-colors">Artikel</a>
                        <span>/</span>
                        <span class="text-white">Detail Artikel</span>
                    </nav>
                    
                    <div class="flex items-center gap-4 mb-4">
                        <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm">
                            Pernikahan Adat
                        </span>
                        <span class="text-white/80">15 Januari 2025</span>
                        <span class="text-white/80">•</span>
                        <span class="text-white/80">8 menit baca</span>
                    </div>
                    
                    <h1 class="text-5xl font-bold text-white mb-4 edu-vic-wa-nt-hand leading-tight">
                        Tips Memilih Dekorasi Pernikahan Adat yang Memukau
                    </h1>
                    
                    <p class="text-xl text-white/90 pt-serif-regular-italic max-w-3xl">
                        Panduan lengkap untuk menciptakan dekorasi pernikahan adat yang elegan dan berkesan, dengan memadukan tradisi dan sentuhan modern.
                    </p>
                </div>
            </div>
        </div>
        
        {{-- Decorative elements --}}
        <div class="absolute top-10 right-10 w-20 h-20 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full opacity-30"></div>
        <div class="absolute bottom-10 left-10 w-16 h-16 bg-gradient-to-r from-blue-500 to-green-500 rounded-full opacity-30"></div>
    </div>

    {{-- Article Content --}}
    <div class="container mx-auto px-30 py-16">
        <div class="max-w-4xl mx-auto">
            {{-- Author Info --}}
            <div class="flex items-center gap-4 mb-8 pb-8 border-b border-gray-200 dark:border-gray-700">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-xl">A</span>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-black dark:text-white poppins-regular">Admin 3Rasa</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Wedding Planner & Decorator Expert</p>
                </div>
                <div class="ml-auto flex gap-3">
                    <button class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </button>
                    <button class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Article Content --}}
            <div class="prose prose-lg max-w-none text-gray-700 dark:text-gray-300">
                <div class="space-y-6 pt-serif-regular text-lg leading-relaxed">
                    <p class="text-xl font-medium text-gray-800 dark:text-gray-200 mb-8 pt-serif-regular-italic">
                        Pernikahan adat memiliki keunikan tersendiri yang memadukan tradisi leluhur dengan sentuhan modern. Memilih dekorasi yang tepat menjadi kunci untuk menciptakan suasana yang sakral sekaligus memukau.
                    </p>

                    <h2 class="text-3xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand mt-12 mb-6">1. Pahami Makna dan Filosofi Adat</h2>
                    <p>
                        Sebelum memilih dekorasi, penting untuk memahami makna dan filosofi dari tradisi adat yang akan dijalankan. Setiap elemen dekorasi sebaiknya memiliki makna yang selaras dengan nilai-nilai budaya setempat.
                    </p>
                    <p>
                        Konsultasikan dengan tetua adat atau ahli budaya untuk memastikan setiap detail dekorasi tidak melanggar ketentuan adat yang berlaku. Hal ini akan memberikan berkah dan kekuatan spiritual pada pernikahan Anda.
                    </p>

                    {{-- Quote Section --}}
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 p-8 rounded-2xl border-l-4 border-purple-500 my-10">
                        <blockquote class="text-xl italic text-purple-800 dark:text-purple-200 pt-serif-regular-italic">
                            "Dekorasi pernikahan adat bukan hanya tentang keindahan visual, tetapi juga tentang penghormatan terhadap warisan budaya yang telah diwariskan turun-temurun."
                        </blockquote>
                        <cite class="text-purple-600 dark:text-purple-300 text-sm mt-4 block">- Budayawan Kalimantan</cite>
                    </div>

                    <h2 class="text-3xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand mt-12 mb-6">2. Pilih Warna yang Bermakna</h2>
                    <p>
                        Warna dalam pernikahan adat memiliki simbolisme yang mendalam. Emas melambangkan kemewahan dan keberkahan, merah melambangkan keberanian dan cinta, sementara putih melambangkan kesucian dan kebersihan hati.
                    </p>
                    <p>
                        Kombinasikan warna-warna tradisional dengan sentuhan modern yang elegan. Misalnya, padukan emas dengan burgundy atau merah marun untuk kesan yang lebih kontemporer namun tetap menghormati tradisi.
                    </p>

                    <h2 class="text-3xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand mt-12 mb-6">3. Gunakan Material Alami dan Tradisional</h2>
                    <p>
                        Material seperti bambu, rotan, kayu ulin, dan kain tenun tradisional memberikan nuansa autentik pada dekorasi pernikahan adat. Material-material ini tidak hanya ramah lingkungan tetapi juga memiliki nilai filosofis yang tinggi.
                    </p>
                    
                    {{-- Image Placeholder --}}
                    <div class="bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl p-16 text-center my-10">
                        <div class="text-white">
                            <svg class="w-16 h-16 mx-auto mb-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-lg opacity-90">Contoh dekorasi menggunakan material tradisional</p>
                        </div>
                    </div>

                    <h2 class="text-3xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand mt-12 mb-6">4. Perhatikan Tata Letak dan Alur Acara</h2>
                    <p>
                        Dekorasi harus mendukung alur acara adat yang akan dijalankan. Pastikan tata letak pelaminan, tempat duduk tamu, dan area ritual tidak saling bertabrakan dan memudahkan jalannya prosesi adat.
                    </p>

                    <h2 class="text-3xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand mt-12 mb-6">5. Budget dan Prioritas</h2>
                    <p>
                        Tentukan prioritas utama dalam dekorasi. Fokuskan budget pada elemen-elemen yang paling terlihat dan bermakna, seperti pelaminan dan area utama. Gunakan kreativitas untuk elemen pendukung agar tetap indah dengan budget terbatas.
                    </p>

                    {{-- Tips Box --}}
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-2xl border border-blue-200 dark:border-blue-800 my-10">
                        <h3 class="text-xl font-semibold text-blue-800 dark:text-blue-200 mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            Pro Tips dari Ahli
                        </h3>
                        <ul class="text-blue-700 dark:text-blue-300 space-y-2">
                            <li>• Siapkan backup plan untuk cuaca jika menggunakan venue outdoor</li>
                            <li>• Dokumentasikan setiap detail untuk kenangan dan referensi masa depan</li>
                            <li>• Libatkan keluarga dalam proses pemilihan untuk mendapat restu</li>
                            <li>• Konsultasi dengan wedding organizer yang berpengalaman dengan adat</li>
                        </ul>
                    </div>

                    <p class="text-xl pt-serif-regular-italic text-gray-600 dark:text-gray-300 mt-12">
                        Pernikahan adat yang berkesan adalah perpaduan harmonis antara penghormatan tradisi dan sentuhan kreativitas modern. Dengan perencanaan yang matang dan pemahaman yang mendalam, dekorasi pernikahan Anda akan menjadi saksi bisu dari momen sakral yang tak terlupakan.
                    </p>
                </div>
            </div>

            {{-- Share & Tags Section --}}
            <div class="border-t border-gray-200 dark:border-gray-700 pt-8 mt-12">
                <div class="flex flex-col sm:flex-row justify-between items-start gap-6">
                    <div>
                        <h3 class="text-lg font-semibold text-black dark:text-white mb-3">Tags:</h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded-full text-sm">pernikahan-adat</span>
                            <span class="px-3 py-1 bg-pink-100 dark:bg-pink-900 text-pink-800 dark:text-pink-200 rounded-full text-sm">dekorasi</span>
                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm">tips</span>
                            <span class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-sm">tradisi</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-black dark:text-white mb-3">Bagikan:</h3>
                        <div class="flex gap-3">
                            <button class="p-3 rounded-full bg-blue-500 hover:bg-blue-600 text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </button>
                            <button class="p-3 rounded-full bg-blue-600 hover:bg-blue-700 text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                </svg>
                            </button>
                            <button class="p-3 rounded-full bg-green-500 hover:bg-green-600 text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Related Articles --}}
    <div class="bg-gray-50 dark:bg-gray-900 py-16">
        <div class="container mx-auto px-30">
            <h2 class="text-4xl font-semibold text-center mb-12 edu-vic-wa-nt-hand text-black dark:text-white">
                Artikel Terkait
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                {{-- Related Article 1 --}}
                <article class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-48 bg-gradient-to-br from-green-400 to-blue-500">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">Tips</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-black dark:text-white edu-vic-wa-nt-hand">
                            5 Tips Mengatur Budget Pernikahan dengan Bijak
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 pt-serif-regular">
                            Panduan praktis untuk mengatur anggaran pernikahan agar tetap hemat...
                        </p>
                        <button class="text-[--color-primary] hover:underline text-sm font-medium">
                            Baca →
                        </button>
                    </div>
                </article>

                {{-- Related Article 2 --}}
                <article class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-48 bg-gradient-to-br from-indigo-400 to-purple-500">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">Dekorasi</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-black dark:text-white edu-vic-wa-nt-hand">
                            Ide Kreatif Dekorasi Meja Tamu yang Menawan
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 pt-serif-regular">
                            Inspirasi dekorasi meja tamu yang unik dan menarik untuk menciptakan...
                        </p>
                        <button class="text-[--color-primary] hover:underline text-sm font-medium">
                            Baca →
                        </button>
                    </div>
                </article>

                {{-- Related Article 3 --}}
                <article class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-48 bg-gradient-to-br from-teal-400 to-green-500">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">Pernikahan</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-black dark:text-white edu-vic-wa-nt-hand">
                            Tradisi Pernikahan Adat Kalimantan yang Unik
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 pt-serif-regular">
                            Mengenal lebih dalam tradisi dan ritual pernikahan adat Kalimantan...
                        </p>
                        <button class="text-[--color-primary] hover:underline text-sm font-medium">
                            Baca →
                        </button>
                    </div>
                </article>
            </div>
        </div>
    </div>

    {{-- Back to Articles --}}
    <div class="container mx-auto px-30 py-8">
        <div class="text-center">
            <a href="/artikel" class="inline-flex items-center gap-2 px-8 py-4 bg-[--color-primary] text-white rounded-xl hover:scale-105 transition-transform font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                </svg>
                Kembali ke Semua Artikel
            </a>
        </div>
    </div>
</div>
@endsection