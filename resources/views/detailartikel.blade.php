@extends('Layout.app')

@section('title', $artikel->judul)

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen">
    {{-- Hero Section with Article Image --}}
    <div class="relative {{ $artikel->image_url ? 'bg-cover bg-center' : 'bg-gradient-to-br from-purple-600 to-pink-600' }} h-96 mt-24"
         @if($artikel->image_url) style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ $artikel->image_url }}')" @endif>
        <div class="absolute inset-0 {{ !$artikel->image_url ? 'bg-black/50' : '' }}"></div>
        <div class="absolute inset-0 flex items-center">
            <div class="container mx-auto px-4 md:px-32">
                <div class="max-w-4xl">
                    <nav class="flex items-center gap-2 text-white/80 text-sm mb-6">
                        <a href="/" class="hover:text-white transition-colors">Beranda</a>
                        <span>/</span>
                        <a href="{{ route('artikel.index') }}" class="hover:text-white transition-colors">Artikel</a>
                        <span>/</span>
                        <span class="text-white">Detail Artikel</span>
                    </nav>
                    
                    <div class="flex items-center gap-4 mb-4 flex-wrap">
                        @if($artikel->formatted_tags)
                            @foreach(array_slice($artikel->formatted_tags, 0, 2) as $tag)
                                <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm">
                                    {{ ucfirst(str_replace('-', ' ', $tag)) }}
                                </span>
                            @endforeach
                        @endif
                        <span class="text-white/80">{{ $artikel->formatted_date }}</span>
                        <span class="text-white/80">•</span>
                        <span class="text-white/80">{{ $readingTime }} menit baca</span>
                    </div>
                    
                    <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 edu-vic-wa-nt-hand leading-tight">
                        {{ $artikel->judul }}
                    </h1>
                    
                    @if($artikel->sub_judul)
                        <p class="text-lg md:text-xl text-white/90 pt-serif-regular-italic max-w-3xl">
                            {{ $artikel->sub_judul }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
        
        {{-- Decorative elements --}}
        <div class="absolute top-10 right-10 w-20 h-20 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full opacity-30"></div>
        <div class="absolute bottom-10 left-10 w-16 h-16 bg-gradient-to-r from-blue-500 to-green-500 rounded-full opacity-30"></div>
    </div>

    {{-- Article Content --}}
    <div class="container mx-auto px-4 md:px-32 py-16">
        <div class="max-w-4xl mx-auto">
            {{-- Author Info --}}
            <div class="flex items-center gap-4 mb-8 pb-8 border-b border-gray-200 dark:border-gray-700">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-xl">{{ substr($artikel->author, 0, 1) }}</span>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-black dark:text-white poppins-regular">{{ $artikel->author }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Wedding Planner & Decorator Expert</p>
                </div>
                <div class="ml-auto flex gap-3">
                    <button onclick="shareToSocial('twitter')" class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </button>
                    <button onclick="shareToSocial('facebook')" class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Article Content --}}
            <div class="prose prose-lg max-w-none text-gray-700 dark:text-gray-300">
                <div class="space-y-6 pt-serif-regular text-lg leading-relaxed article-content">
                    {!! $artikel->content !!}
                </div>
            </div>

            {{-- Share & Tags Section --}}
            <div class="border-t border-gray-200 dark:border-gray-700 pt-8 mt-12">
                <div class="flex flex-col sm:flex-row justify-between items-start gap-6">
                    @if($artikel->formatted_tags && count($artikel->formatted_tags) > 0)
                        <div>
                            <h3 class="text-lg font-semibold text-black dark:text-white mb-3">Tags:</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($artikel->formatted_tags as $index => $tag)
                                    @php
                                        $colors = ['purple', 'pink', 'blue', 'green', 'yellow', 'indigo'];
                                        $color = $colors[$index % count($colors)];
                                    @endphp
                                    <span class="px-3 py-1 bg-{{ $color }}-100 dark:bg-{{ $color }}-900 text-{{ $color }}-800 dark:text-{{ $color }}-200 rounded-full text-sm">
                                        {{ str_replace('-', ' ', $tag) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    <div>
                        <h3 class="text-lg font-semibold text-black dark:text-white mb-3">Bagikan:</h3>
                        <div class="flex gap-3">
                            <button onclick="shareToSocial('twitter')" class="p-3 rounded-full bg-blue-500 hover:bg-blue-600 text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </button>
                            <button onclick="shareToSocial('facebook')" class="p-3 rounded-full bg-blue-600 hover:bg-blue-700 text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                </svg>
                            </button>
                            <button onclick="shareToSocial('whatsapp')" class="p-3 rounded-full bg-green-500 hover:bg-green-600 text-white transition-colors">
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
    @if($relatedArtikels->count() > 0)
        <div class="bg-gray-50 dark:bg-gray-900 py-16">
            <div class="container mx-auto px-4 md:px-32">
                <h2 class="text-4xl font-semibold text-center mb-12 edu-vic-wa-nt-hand text-black dark:text-white">
                    Artikel Terkait
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @foreach($relatedArtikels as $related)
                        <article class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                            <div class="relative h-48 {{ $related->image_url ? 'bg-cover bg-center' : 'bg-gradient-to-br from-green-400 to-blue-500' }}"
                                 @if($related->image_url) style="background-image: url('{{ $related->image_url }}')" @endif>
                                @if($related->formatted_tags && count($related->formatted_tags) > 0)
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs">
                                            {{ ucfirst(str_replace('-', ' ', $related->formatted_tags[0])) }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-3 text-black dark:text-white edu-vic-wa-nt-hand">
                                    {{ $related->judul }}
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 pt-serif-regular">
                                    {{ $related->excerpt }}
                                </p>
                                <a href="{{ route('artikel.show', $related->slug) }}" class="text-primary hover:underline text-sm font-medium">
                                    Baca →
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Back to Articles --}}
    <div class="container mx-auto px-4 md:px-32 py-8">
        <div class="text-center">
            <a href="{{ route('artikel.index') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-primary text-white rounded-xl hover:scale-105 transition-transform font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                </svg>
                Kembali ke Semua Artikel
            </a>
        </div>
    </div>
</div>

<script>
    function shareToSocial(platform) {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent('{{ $artikel->judul }}');
        const text = encodeURIComponent('{{ $artikel->sub_judul ?? $artikel->excerpt }}');
        
        let shareUrl = '';
        
        switch(platform) {
            case 'twitter':
                shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
                break;
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                break;
            case 'whatsapp':
                shareUrl = `https://wa.me/?text=${title} ${url}`;
                break;
        }
        
        if (shareUrl) {
            window.open(shareUrl, '_blank', 'width=600,height=400');
        }
    }
</script>

<style>
    .article-content h1,
    .article-content h2,
    .article-content h3,
    .article-content h4,
    .article-content h5,
    .article-content h6 {
        @apply font-semibold text-black dark:text-white edu-vic-wa-nt-hand mt-8 mb-4;
    }
    
    .article-content h1 { @apply text-4xl; }
    .article-content h2 { @apply text-3xl; }
    .article-content h3 { @apply text-2xl; }
    .article-content h4 { @apply text-xl; }
    
    .article-content p {
        @apply mb-4 leading-relaxed;
    }
    
    .article-content ul,
    .article-content ol {
        @apply ml-6 mb-4 space-y-2;
    }
    
    .article-content li {
        @apply leading-relaxed;
    }
    
    .article-content blockquote {
        @apply border-l-4 border-purple-500 pl-6 py-4 my-6 bg-purple-50 dark:bg-purple-900/20 rounded-r-lg italic text-purple-800 dark:text-purple-200;
    }
    
    .article-content img {
        @apply rounded-lg shadow-lg mx-auto my-8 max-w-full h-auto;
    }
    
    .article-content a {
        @apply text-blue-600 dark:text-blue-400 hover:underline;
    }
    
    .article-content code {
        @apply bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded text-sm;
    }
    
    .article-content pre {
        @apply bg-gray-100 dark:bg-gray-800 p-4 rounded-lg overflow-x-auto my-4;
    }
</style>
@endsection