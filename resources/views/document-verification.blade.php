@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Verifikasi Dokumen</h1>
        </div>

        <div class="border-t border-gray-200 pt-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <p class="text-sm text-gray-600">Nomor Surat:</p>
                    <p class="font-semibold">{{ $document->no_surat }}</p>
                </div>
                
                <div class="space-y-2">
                    <p class="text-sm text-gray-600">Tanggal:</p>
                    <p class="font-semibold">{{ $document->tanggal_ttd->format('d/m/Y H:i:s') }}</p>
                </div>
                
                <div class="space-y-2">
                    <p class="text-sm text-gray-600">Perihal:</p>
                    <p class="font-semibold">{{ $document->perihal }}</p>
                </div>
                
                <div class="space-y-2">
                    <p class="text-sm text-gray-600">Penandatangan:</p>
                    <p class="font-semibold">{{ $document->penandatangan }}</p>
                </div>
            </div>

            <div class="mt-6 text-center">
                <p class="text-green-600 font-semibold mb-4">✓ Dokumen ini telah ditandatangani secara digital</p>
                <a href="{{ $downloadUrl }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Download Dokumen
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
