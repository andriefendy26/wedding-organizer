@extends('Layout.app')

@section('content')
<div class="pt-24 pb-16 min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="container px-4 mx-auto">
        <!-- Header Section -->
        <div class="mb-12 text-center">
            <h1 class="mb-4 text-4xl font-bold text-gray-900 dark:text-white">
                {{ __('app.language') }} Demo
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                {{ __('app.current_language') }}: <strong>{{ app()->getLocale() === 'en' ? 'English' : 'Bahasa Indonesia' }}</strong>
            </p>
        </div>

        <!-- Language Switcher Demo -->
        <div class="p-6 mb-8 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('app.change_language') }}
            </h2>
            <div class="flex gap-4">
                <a href="{{ route('language.change', 'en') }}" 
                   class="px-6 py-3 text-white bg-blue-600 rounded-lg transition-colors hover:bg-blue-700">
                    English
                </a>
                <a href="{{ route('language.change', 'id') }}" 
                   class="px-6 py-3 text-white bg-green-600 rounded-lg transition-colors hover:bg-green-700">
                    Bahasa Indonesia
                </a>
            </div>
        </div>

        <!-- Translation Examples -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <!-- Navigation Examples -->
            <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                    {{ __('app.navigation') }}
                </h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.home') }}:</span>
                        <span class="font-medium">{{ __('app.home') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.about_us') }}:</span>
                        <span class="font-medium">{{ __('app.about_us') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.services') }}:</span>
                        <span class="font-medium">{{ __('app.services') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.contact') }}:</span>
                        <span class="font-medium">{{ __('app.contact') }}</span>
                    </div>
                </div>
            </div>

            <!-- Service Examples -->
            <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                    {{ __('app.our_services') }}
                </h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.wedding_organizer_service') }}:</span>
                        <span class="font-medium">{{ __('app.wedding_organizer_service') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.event_organizer_service') }}:</span>
                        <span class="font-medium">{{ __('app.event_organizer_service') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.equipment_rental') }}:</span>
                        <span class="font-medium">{{ __('app.equipment_rental') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.documentation') }}:</span>
                        <span class="font-medium">{{ __('app.documentation') }}</span>
                    </div>
                </div>
            </div>

            <!-- Button Examples -->
            <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                    {{ __('app.buttons') }}
                </h3>
                <div class="space-y-3">
                    <button class="px-4 py-2 w-full text-white bg-red-600 rounded-lg transition-colors hover:bg-red-700">
                        {{ __('app.contact_us') }}
                    </button>
                    <button class="px-4 py-2 w-full text-white bg-blue-600 rounded-lg transition-colors hover:bg-blue-700">
                        {{ __('app.learn_more') }}
                    </button>
                    <button class="px-4 py-2 w-full text-white bg-green-600 rounded-lg transition-colors hover:bg-green-700">
                        {{ __('app.book_now') }}
                    </button>
                    <button class="px-4 py-2 w-full text-white bg-purple-600 rounded-lg transition-colors hover:bg-purple-700">
                        {{ __('app.get_quote') }}
                    </button>
                </div>
            </div>

            <!-- Status Examples -->
            <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                    {{ __('app.status') }}
                </h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.active') }}:</span>
                        <span class="font-medium text-green-600">{{ __('app.active') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.pending') }}:</span>
                        <span class="font-medium text-yellow-600">{{ __('app.pending') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.completed') }}:</span>
                        <span class="font-medium text-blue-600">{{ __('app.completed') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">{{ __('app.cancelled') }}:</span>
                        <span class="font-medium text-red-600">{{ __('app.cancelled') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Content Demo -->
        <div class="p-6 mt-8 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                {{ __('app.footer_content') }}
            </h3>
            <div class="space-y-4">
                <p class="text-gray-700 dark:text-gray-300">
                    {{ __('app.realize_your_special_moments') }}
                </p>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <div>
                        <h4 class="mb-2 font-semibold text-gray-900 dark:text-white">{{ __('app.get_latest_updates') }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('app.subscribe_newsletter') }}</p>
                    </div>
                    <div>
                        <h4 class="mb-2 font-semibold text-gray-900 dark:text-white">{{ __('app.happy_couples') }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">"{{ __('app.thank_you_3rasa') }}"</p>
                    </div>
                    <div>
                        <h4 class="mb-2 font-semibold text-gray-900 dark:text-white">{{ __('app.contact_info') }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('app.address_line1') }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('app.address_line2') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- API Demo -->
        <div class="p-6 mt-8 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                API Demo
            </h3>
            <div class="space-y-4">
                <p class="text-gray-700 dark:text-gray-300">
                    Test API untuk mendapatkan informasi bahasa saat ini:
                </p>
                <div class="p-4 bg-gray-100 rounded-lg dark:bg-gray-700">
                    <code class="text-sm">
                        GET /api/language/current
                    </code>
                </div>
                <button onclick="testLanguageAPI()" class="px-4 py-2 text-white bg-blue-600 rounded-lg transition-colors hover:bg-blue-700">
                    Test API
                </button>
                <div id="api-result" class="hidden p-4 bg-gray-100 rounded-lg dark:bg-gray-700">
                    <pre id="api-data" class="text-sm"></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function testLanguageAPI() {
    fetch('/api/language/current')
        .then(response => response.json())
        .then(data => {
            document.getElementById('api-result').classList.remove('hidden');
            document.getElementById('api-data').textContent = JSON.stringify(data, null, 2);
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('api-result').classList.remove('hidden');
            document.getElementById('api-data').textContent = 'Error: ' + error.message;
        });
}
</script>
@endsection
