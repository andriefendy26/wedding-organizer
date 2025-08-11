@extends('Layout.app')

{{-- @section('title', $artikel->judul) --}}

@section('head')
    <meta charset="UTF-8" />
    <title>{{ $artikel->judul }}</title>
    <meta name="description" content={{ $artikel->sub_judul }} />
    <meta name="keywords" content={{ $artikel->tags }}/>
    <meta name="author" content={{ $artikel->author }} />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.3rasaeventorganizer.com/artikel/{{ $artikel->slug }}" />
    <link rel="icon" type="image/png" href="{{ asset('storage/content/Logo.png') }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/artikel/{{ $artikel->slug }}" />
    <meta property="og:title" content={{ $artikel->judul }} />
    <meta property="og:description" content={{ $artikel->sub_judul }}  />
    <meta property="og:image" content="{{ asset($artikel->gambar) }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content={{ $artikel->judul }}/>
    <meta name="twitter:description" content={{ $artikel->sub_judul }}  />
    <meta name="twitter:image" content="{{ asset($artikel->gambar) }}" />
@endsection

@section('content')
<div class="min-h-screen ">
    {{-- Hero Section with Article Image - Reduced Height --}}
    <div class="relative  {{ $artikel->image_url ? 'bg-cover bg-center' : 'bg-gradient-to-br from-red-600 to-red-800' }} h-64 mt-24"
         @if($artikel->image_url) style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ $artikel->image_url }}')" @endif>
        <div class="absolute inset-0 {{ !$artikel->image_url ? 'bg-black/50' : '' }}"></div>
        <div class="absolute inset-0 flex items-center md:px-16 lg:px-24 xl:px-32">
            <div class="container px-4 mx-auto md:px-6">
                <div class="max-w-4xl">
                    <nav class="flex items-center gap-2 mb-4 text-sm text-white/80">
                        <a href="/" class="transition-colors hover:text-white">Beranda</a>
                        <span>/</span>
                        <a href="{{ route('artikel.index') }}" class="transition-colors hover:text-white">Artikel</a>
                        <span>/</span>
                        <span class="text-white">{{ Str::limit($artikel->judul, 30) }}</span>
                    </nav>
                    
                    <div class="flex flex-wrap items-center gap-3 mb-3">
                        <span class="flex items-center gap-1 text-sm text-white/80">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $artikel->formatted_date }}
                        </span>
                        <span class="text-white/60">•</span>
                        <span class="flex items-center gap-1 text-sm text-white/80">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $readingTime }} menit baca
                        </span>
                        {{-- <span class="text-white/60">•</span>
                        <span class="flex items-center gap-1 text-sm text-white/80">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                            </svg>
                            1,234 views
                        </span> --}}
                    </div>
                    
                    <h1 class="mb-3 text-2xl font-bold leading-tight text-white md:text-4xl">
                        {{ $artikel->judul }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content with Sidebar --}}
    <div class="container px-10 py-8 mx-auto md:px-16 lg:px-24 xl:px-32 ">
        <div class="flex flex-col gap-8 lg:flex-row">
            {{-- Main Article Content --}}
            <div class="flex-1 lg:w-2/3">
                <div class="p-6 bg-white rounded-lg shadow-sm dark:bg-gray-800 md:p-8">
                    {{-- Article Meta Info --}}
                    <div class="flex items-center gap-3 pb-6 mb-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-red-500 to-red-600">
                            <span class="text-lg font-bold text-white">{{ substr($artikel->author, 0, 1) }}</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base font-semibold text-black dark:text-white">{{ $artikel->author }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Wedding Planner & Event Organizer</p>
                        </div>
                        {{-- Social Share Icons --}}
                        <div class="flex gap-2">
                            <button onclick="shareToSocial('whatsapp')" class="p-2 text-green-600 transition-colors rounded-full bg-green-50 hover:bg-green-100 dark:bg-green-900 dark:text-green-400">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                            </button>
                            <button onclick="shareToSocial('facebook')" class="p-2 text-blue-600 transition-colors rounded-full bg-blue-50 hover:bg-blue-100 dark:bg-blue-900 dark:text-blue-400">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                </svg>
                            </button>
                            <button onclick="shareToSocial('twitter')" class="p-2 text-blue-400 transition-colors rounded-full bg-blue-50 hover:bg-blue-100 dark:bg-blue-900 dark:text-blue-300">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Article Content --}}
                    <div class="prose prose-lg text-gray-700 max-w-none dark:text-gray-300">
                        <div class="space-y-6 text-base leading-relaxed article-content">
                            {!! $artikel->content !!}
                        </div>
                    </div>

                    {{-- Tags Section --}}
                    @if($artikel->formatted_tags && count($artikel->formatted_tags) > 0)
                        <div class="pt-6 mt-8 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="mb-3 text-base font-semibold text-black dark:text-white">Tags:</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($artikel->formatted_tags as $index => $tag)
                                    @php
                                        $colors = ['red', 'blue', 'green', 'yellow', 'purple', 'pink'];
                                        $color = $colors[$index % count($colors)];
                                    @endphp
                                    <span class="px-3 py-1 bg-{{ $color }}-100 dark:bg-{{ $color }}-900/30 text-{{ $color }}-800 dark:text-{{ $color }}-200 rounded-full text-sm">
                                        {{ str_replace('-', ' ', $tag) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="lg:w-1/3">
                <div class="space-y-6"> 
                    {{-- Related Articles --}}
                    @if($relatedArtikels->count() > 0)
                        <div class="p-6 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                            <h3 class="mb-4 text-lg font-bold text-red-600 dark:text-red-400">Artikel Terkait</h3>
                            <div class="space-y-4">
                                @foreach($relatedArtikels->take(3) as $related)
                                <div class="pb-4 border-b border-gray-100 dark:border-gray-700 last:border-b-0 last:pb-0">
                                    <div class="flex gap-3">
                                        <div class="w-16 h-16 {{ $related->image_url ? 'bg-cover bg-center' : 'bg-gradient-to-br from-blue-400 to-blue-600' }} rounded-lg flex-shrink-0"
                                             @if($related->image_url) style="background-image: url('{{ $related->image_url }}')" @endif></div>
                                        <div class="flex-1">
                                            <h4 class="mb-1 text-sm font-medium text-black dark:text-white line-clamp-2">
                                                <a href="{{ route('artikel.show', $related->slug) }}" class="hover:text-red-600 dark:hover:text-red-400">
                                                    {{ $related->judul }}
                                                </a>
                                            </h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $related->formatted_date }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Back to Articles --}}
    <div class="container px-4 py-8 mx-auto md:px-6">
        <div class="text-center">
            <a href="{{ route('artikel.index') }}" class="inline-flex items-center gap-2 px-6 py-3 font-medium text-white transition-transform bg-red-600 rounded-lg hover:scale-105 hover:bg-red-700">
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
        @apply font-semibold text-black dark:text-white mt-6 mb-3;
    }
    
    .article-content h1 { @apply text-2xl; }
    .article-content h2 { @apply text-xl; }
    .article-content h3 { @apply text-lg; }
    .article-content h4 { @apply text-base; }
    
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
        @apply border-l-4 border-red-500 pl-4 py-3 my-4 bg-red-50 dark:bg-red-900/20 rounded-r text-red-800 dark:text-red-200 italic;
    }
    
    .article-content img {
        @apply rounded-lg shadow-md mx-auto my-6 max-w-full h-auto;
    }
    
    .article-content a {
        @apply text-red-600 dark:text-red-400 hover:underline;
    }
    
    .article-content code {
        @apply bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded text-sm;
    }
    
    .article-content pre {
        @apply bg-gray-100 dark:bg-gray-800 p-4 rounded overflow-x-auto my-4;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection