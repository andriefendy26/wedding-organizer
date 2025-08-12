@extends('Layout.app')

@section('head')
    <meta charset="UTF-8" />
    <title>Kontak Kami | 3Rasa Event Organizer Tarakan</title>
    <meta name="description" content="Hubungi 3Rasa Event Organizer di Tarakan untuk konsultasi dan pemesanan layanan wedding organizer, dekorasi, sewa perlengkapan event, dokumentasi foto & video, MC profesional, dan event perusahaan." />

    <meta name="keywords" content="kontak event organizer Tarakan, hubungi wedding organizer Tarakan, jasa dekorasi Tarakan, sewa perlengkapan acara Tarakan, jasa MC Tarakan, jasa fotografer Tarakan, jasa videografer Tarakan, event perusahaan Tarakan, 3Rasa Event Organizer" />

    <meta name="author" content="3Rasa Event Organizer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.3rasaeventorganizer.com/kontak" />
    <link rel="icon" type="image/png" href="{{ asset('storage/content/Logo.png') }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.3rasaeventorganizer.com/kontak" />
    <meta property="og:title" content="Kontak Kami | 3Rasa Event Organizer Tarakan" />
    <meta property="og:description" content="Hubungi kami untuk konsultasi dan pemesanan layanan acara di Tarakan. 3Rasa Event Organizer siap membantu Anda mewujudkan acara impian." />
    <meta property="og:image" content="{{ asset('storage/content/Logo.png') }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Kontak Kami | 3Rasa Event Organizer Tarakan" />
    <meta name="twitter:description" content="Hubungi 3Rasa Event Organizer di Tarakan untuk layanan wedding organizer, dekorasi, sewa perlengkapan event, dan dokumentasi profesional." />
    <meta name="twitter:image" content="{{ asset('storage/content/Logo.png') }}" />
@endsection


@section('content')
<div class="min-h-screen bg-white dark:bg-gray-800">
    {{-- Hero Section --}}

    <div class="relative h-[70vh] bg-cover bg-center overflow-hidden"
    style="background: url({{ asset('storage/content/gif02.gif') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="absolute inset-0 bg-black/80"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 data-aos="zoom-in-down" class="mb-4 text-6xl font-semibold tracking-wide edu-vic-wa-nt-hand">
                    {{ __('app.contact_page.hero.title') }}
                </h1>
                <p data-aos="zoom-in-up" class="max-w-2xl mx-auto text-xl pt-serif-regular-italic">
                    {{ __('app.contact_page.hero.description') }}
                </p>
            </div>
        </div>
    </div>


    {{-- Main Contact Section --}}
    <div class="px-4 py-16 mx-auto sm:px-6 lg:px-32">
        <div class="grid grid-cols-1 gap-16 lg:grid-cols-2">
            {{-- Get In Touch Form --}}
            <div>
                <div class="mb-8">
                    <h2 class="mb-4 text-4xl font-semibold text-black edu-vic-wa-nt-hand dark:text-white">
                        {{ __('app.contact_page.form.title') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 pt-serif-regular-italic">
                        {{ __('app.contact_page.form.description') }}
                    </p>
                </div>

                <!-- Tambahkan di dalam form section, setelah opening form tag -->
                <form data-aos="fade-right" x-data="contactForm()" @submit.prevent="submitForm" class="space-y-6">
                    <!-- Error Message -->
                    <div x-show="errorMessage" x-transition class="p-4 border border-red-200 bg-red-50 dark:bg-red-900/20 dark:border-red-800 rounded-xl">
                        <div class="flex items-center gap-2 text-red-800 dark:text-red-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="font-medium" x-text="errorMessage"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('app.contact_page.form.full_name') }}
                            </label>
                            <input 
                                x-model="form.name"
                                type="text" 
                                required
                                class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                                placeholder="{{ __('app.contact_page.form.full_name_placeholder') }}"
                            />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('app.contact_page.form.whatsapp') }}
                            </label>
                            <input 
                                x-model="form.phone"
                                @input="formatPhone"
                                type="tel" 
                                required
                                class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                                placeholder="{{ __('app.contact_page.form.whatsapp_placeholder') }}"
                            />
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('app.contact_page.form.email') }}
                        </label>
                        <input 
                            x-model="form.email"
                            type="email" 
                            class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                            placeholder="{{ __('app.contact_page.form.email_placeholder') }}"
                        />
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('app.contact_page.form.event_date') }}
                            </label>
                            <input 
                                x-model="form.event_date"
                                @change="validateEventDate"
                                type="date" 
                                required
                                :min="new Date().toISOString().split('T')[0]"
                                class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                            />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('app.contact_page.form.budget') }}
                            </label>
                            <select 
                                x-model="form.budget"
                                class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                            >
                                <option value="">{{ __('app.contact_page.form.budget_placeholder') }}</option>
                                @foreach(__('app.contact_page.form.budget_options') as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('app.contact_page.form.service_type') }}
                        </label>
                        <div class="grid grid-cols-2 gap-3 md:grid-cols-3">
                            @foreach(__('app.contact_page.form.services') as $key => $value)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    x-model="form.services" 
                                    value="{{ $key }}"
                                    class="border-gray-300 rounded text-primary focus:ring-primary"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-300">{{ $value }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('app.contact_page.form.message') }}
                        </label>
                        <textarea 
                            x-model="form.message"
                            rows="5" 
                            required
                            class="w-full px-4 py-3 text-black transition-colors bg-white border-2 border-gray-300 resize-none dark:border-gray-600 rounded-xl focus:border-primary focus:outline-none dark:bg-gray-700 dark:text-white poppins-regular"
                            placeholder="{{ __('app.contact_page.form.message_placeholder') }}"
                        ></textarea>
                    </div>

                    <button 
                        type="submit"
                        :disabled="loading"
                        class="w-full px-8 py-4 text-lg font-medium text-white transition-all duration-300 bg-primary rounded-xl hover:scale-105 edu-vic-wa-nt-hand disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span x-show="!loading">{{ __('app.contact_page.form.submit') }}</span>
                        <span x-show="loading" class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            {{ __('app.contact_page.form.sending') }}
                        </span>
                    </button>

                    <!-- Success Message -->
                    <div x-show="success" x-transition class="p-4 border border-green-200 bg-green-50 dark:bg-green-900/20 dark:border-green-800 rounded-xl">
                        <div class="flex items-center gap-2 text-green-800 dark:text-green-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="font-medium">{{ __('app.contact_page.form.success_title') }}</p>
                                <p class="text-sm">{{ __('app.contact_page.form.success_message') }}</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Google Maps & Business Hours --}}
            <div data-aos="fade-left" class="space-y-8">
                {{-- Google Maps --}}
                <div>
                    <h3 class="mb-4 text-2xl font-semibold text-black edu-vic-wa-nt-hand dark:text-white">
                        {{ __('app.contact_page.location.title') }}
                    </h3>
                    <div class="overflow-hidden bg-gray-100 shadow-lg dark:bg-gray-700 rounded-2xl">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d995.791256998401!2d117.61308987388932!3d3.30932746315719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32138ba9e5fc4035%3A0x9789bc310bda2509!2sDekorasi%20tiga%20rasa!5e0!3m2!1sid!2sid!4v1754933077601!5m2!1sid!2sid"
                            width="100%" 
                            height="350" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="rounded-2xl"
                        ></iframe>
                    </div>
                </div>

                {{-- Business Hours --}}
                <div class="p-8 bg-gray-50 dark:bg-gray-700 rounded-2xl">
                    <h3 class="mb-6 text-2xl font-semibold text-black edu-vic-wa-nt-hand dark:text-white">
                        {{ __('app.contact_page.business_hours.title') }}
                    </h3>
                    <div class="space-y-4 pt-serif-regular">
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">{{ __('app.contact_page.business_hours.monday_friday') }}</span>
                            <span class="font-medium text-black dark:text-white">{{ __('app.contact_page.business_hours.hours') }}</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">{{ __('app.contact_page.business_hours.saturday') }}</span>
                            <span class="font-medium text-black dark:text-white">{{ __('app.contact_page.business_hours.hours') }}</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">{{ __('app.contact_page.business_hours.sunday') }}</span>
                            <span class="font-medium text-black dark:text-white">{{ __('app.contact_page.business_hours.hours') }}</span>
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <span class="text-gray-700 dark:text-gray-300">{{ __('app.contact_page.business_hours.holidays') }}</span>
                            <span class="font-medium text-black dark:text-white">{{ __('app.contact_page.business_hours.hours') }}</span>
                        </div>
                    </div>
                    
                    <div class="p-4 mt-6 border border-blue-200 bg-blue-50 dark:bg-blue-900/20 rounded-xl dark:border-blue-800">
                        <p class="text-sm text-blue-800 dark:text-blue-200">
                            <strong>{{ __('app.contact_page.business_hours.note_title') }}</strong> {{ __('app.contact_page.business_hours.note_message') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- FAQ Section --}}
    <div class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container px-4 mx-auto sm:px-6 lg:px-8">
            <div data-aos="zoom-in-left" class="mb-12 text-center">
                <h2 class="mb-4 text-4xl font-semibold text-black edu-vic-wa-nt-hand dark:text-white">
                    {{ __('app.contact_page.faq.title') }}
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-300 pt-serif-regular-italic">
                    {{ __('app.contact_page.faq.description') }}
                </p>
            </div>

            <div data-aos="fade-right" class="max-w-4xl mx-auto space-y-4" x-data="{ openFaq: null }">
                {{-- FAQ Item 1 --}}
                <div class="bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 1 ? null : 1"
                        class="flex items-center justify-between w-full px-6 py-6 text-left transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl"
                    >
                        <h3 class="pr-4 text-lg font-semibold text-black dark:text-white">
                            {{ __('app.contact_page.faq.faq1.question') }}
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 1 }" 
                            class="w-6 h-6 transition-transform duration-300 text-primary"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 1" x-transition class="px-6 pb-6">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                            {{ __('app.contact_page.faq.faq1.answer') }}
                        </p>
                    </div>
                </div>

                {{-- FAQ Item 2 --}}
                <div class="bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 2 ? null : 2"
                        class="flex items-center justify-between w-full px-6 py-6 text-left transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl"
                    >
                        <h3 class="pr-4 text-lg font-semibold text-black dark:text-white">
                            {{ __('app.contact_page.faq.faq2.question') }}
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 2 }" 
                            class="w-6 h-6 transition-transform duration-300 text-primary"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 2" x-transition class="px-6 pb-6">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                            {{ __('app.contact_page.faq.faq2.answer') }}
                        </p>
                    </div>
                </div>

                {{-- FAQ Item 3 --}}
                <div class="bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 3 ? null : 3"
                        class="flex items-center justify-between w-full px-6 py-6 text-left transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl"
                    >
                        <h3 class="pr-4 text-lg font-semibold text-black dark:text-white">
                            {{ __('app.contact_page.faq.faq3.question') }}
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 3 }" 
                            class="w-6 h-6 transition-transform duration-300 text-primary"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 3" x-transition class="px-6 pb-6">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                            {{ __('app.contact_page.faq.faq3.answer') }}
                        </p>
                    </div>
                </div>

                {{-- FAQ Item 4 --}}
                <div class="bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 4 ? null : 4"
                        class="flex items-center justify-between w-full px-6 py-6 text-left transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl"
                    >
                        <h3 class="pr-4 text-lg font-semibold text-black dark:text-white">
                            {{ __('app.contact_page.faq.faq4.question') }}
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 4 }" 
                            class="w-6 h-6 transition-transform duration-300 text-primary"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 4" x-transition class="px-6 pb-6">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                            {{ __('app.contact_page.faq.faq4.answer') }}
                        </p>
                    </div>
                </div>

                {{-- FAQ Item 5 --}}
                <div class="bg-white border border-gray-200 shadow-lg dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <button 
                        @click="openFaq = openFaq === 5 ? null : 5"
                        class="flex items-center justify-between w-full px-6 py-6 text-left transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl"
                    >
                        <h3 class="pr-4 text-lg font-semibold text-black dark:text-white">
                            {{ __('app.contact_page.faq.faq5.question') }}
                        </h3>
                        <svg 
                            :class="{ 'rotate-45': openFaq === 5 }" 
                            class="w-6 h-6 transition-transform duration-300 text-primary"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 5" x-transition class="px-6 pb-6">
                        <p class="text-gray-600 dark:text-gray-300 pt-serif-regular">
                            {{ __('app.contact_page.faq.faq5.answer') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    function contactForm() {
        return {
            loading: false,
            success: false,
            errorMessage: '',
            form: {
                name: '',
                phone: '',
                email: '',
                event_date: '',
                budget: '',
                services: [],
                message: ''
            },
            
            async submitForm() {
                this.loading = true;
                this.success = false;
                this.errorMessage = '';
                
                try {
                                    // Validasi client-side
                if (!this.form.name || !this.form.phone || !this.form.event_date || !this.form.message) {
                    throw new Error('{{ __("app.contact_page.form.error_required") }}');
                }
                
                if (this.form.services.length === 0) {
                    throw new Error('{{ __("app.contact_page.form.error_service") }}');
                }

                    // Kirim data ke Laravel controller
                    const response = await fetch('/konsultasi', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(this.form)
                    });

                    const result = await response.json();

                    if (!response.ok) {
                        // Handle validation errors
                        if (result.errors) {
                            const errorMessages = Object.values(result.errors).flat();
                            throw new Error(errorMessages.join(', '));
                        } else {
                            throw new Error(result.message || '{{ __("app.contact_page.form.error_server") }}');
                        }
                    }

                    if (result.success) {
                        this.success = true;
                        this.resetForm();
                        
                        // Auto-hide success message after 8 seconds
                        setTimeout(() => {
                            this.success = false;
                        }, 8000);

                        // Optional: Redirect to WhatsApp with pre-filled message
                        const whatsappMessage = encodeURIComponent(
                            `Halo 3Rasa Wedding Organizer!\n\n` +
                            `Saya ${this.form.name} baru saja mengirim form konsultasi melalui website. ` +
                            `Mohon informasi lebih lanjut untuk pernikahan saya pada ${this.form.event_date}.\n\n` +
                            `Terima kasih!`
                        );
                        
                        // Uncomment jika ingin auto redirect ke WhatsApp
                        // setTimeout(() => {
                        //     window.open(`https://wa.me/6281234567890?text=${whatsappMessage}`, '_blank');
                        // }, 2000);
                    } else {
                        throw new Error(result.message || '{{ __("app.contact_page.form.error_validation") }}');
                    }
                    
                } catch (error) {
                    console.error('Error submitting form:', error);
                    this.errorMessage = error.message;
                    
                    // Show error for 5 seconds
                    setTimeout(() => {
                        this.errorMessage = '';
                    }, 5000);
                } finally {
                    this.loading = false;
                }
            },
            
            resetForm() {
                this.form = {
                    name: '',
                    phone: '',
                    email: '',
                    event_date: '',
                    budget: '',
                    services: [],
                    message: ''
                };
            },

            // Format phone number as user types
            formatPhone() {
                let phone = this.form.phone.replace(/\D/g, '');
                
                // Add +62 prefix if not present and starts with 0
                if (phone.startsWith('0')) {
                    phone = '62' + phone.substring(1);
                } else if (!phone.startsWith('62')) {
                    phone = '62' + phone;
                }
                
                this.form.phone = phone;
            },

            // Validate event date
            validateEventDate() {
                const selectedDate = new Date(this.form.event_date);
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                
                if (selectedDate <= today) {
                    alert('{{ __("app.contact_page.form.event_date") }} harus setelah hari ini');
                    this.form.event_date = '';
                }
            }
        }
    }
</script>
@endpush
@endsection