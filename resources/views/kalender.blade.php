@extends('Layout.app')

@section('title', 'Kalender Ketersediaan')

@section('content')
<div class="bg-white dark:bg-gray-800 min-h-screen">
    
    <div class="relative h-[70vh] overflow-hidden"
     style="background: url({{ asset('storage/content/gif02.gif') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="absolute inset-0 bg-black/80"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white">
            <div>
                <h1 data-aos="zoom-in-down" class="text-4xl lg:text-6xl font-semibold mb-4 edu-vic-wa-nt-hand tracking-wide">
                    Kalender Ketersediaan
                </h1>
                <p data-aos="zoom-in-up" class="text-xl pt-serif-regular-italic max-w-2xl mx-auto">
                    Periksa tanggal yang tersedia untuk acara pernikahan dan event spesial Anda bersama 3Rasa
                </p>
            </div>
        </div>
    </div>


    <!-- Main Content -->
    <div class="px-10 lg:px-32 py-12 bg-white dark:bg-gray-800">
        
        <!-- Legend Section -->
        <div class="max-w-6xl mx-auto mb-8">
            <div class="mb-8">
                <h2 class="text-4xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand-500 mb-4">
                    Jadwal Ketersediaan Layanan
                </h2>
                <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                    Klik pada tanggal untuk melihat detail ketersediaan dan melakukan konsultasi
                </p>
            </div>
        </div>

        <!-- Calendar Container -->
        <div class="max-w-6xl mx-auto">
            <div class="bg-white dark:bg-gray-800 rounded-2xl border-2 border-gray-200 dark:border-gray-700 p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div id="calendar"></div>
            </div>
        </div>



    </div>

    <!-- Event Detail Modal -->
    <div id="eventModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 max-w-md mx-4 shadow-2xl">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-2xl font-semibold text-black dark:text-white edu-vic-wa-nt-hand-500" id="modalTitle">Detail Tanggal</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="modalContent" class="space-y-4">
                <!-- Content akan diisi oleh JavaScript -->
            </div>
            <div class="mt-6 flex gap-3">
                <button id="consultationBtn" class="flex-1 bg-primary text-white rounded-xl py-3 px-4 font-semibold hover:scale-105 transition-all duration-300 poppins-regular">
                    Konsultasi Gratis
                </button>
                <button onclick="closeModal()" class="px-4 py-3 border-2 border-gray-300 rounded-xl text-gray-600 hover:border-gray-400 transition-all duration-300">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">

{{-- Tambahkan JS FullCalendar --}}
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<style>
   
    
    .edu-vic-wa-nt-hand { font-family: 'Edu VIC WA NT Hand', cursive; }
    .edu-vic-wa-nt-hand-400 { font-family: 'Edu VIC WA NT Hand', cursive; font-weight: 400; }
    .edu-vic-wa-nt-hand-500 { font-family: 'Edu VIC WA NT Hand', cursive; font-weight: 500; }
    .pt-serif-regular { font-family: 'PT Serif', serif; }
    .pt-serif-regular-italic { font-family: 'PT Serif', serif; font-style: italic; }
    .poppins-regular { font-family: 'Poppins', sans-serif; }
    .poppins-medium { font-family: 'Poppins', sans-serif; font-weight: 500; }

    /* Custom FullCalendar Styling */
    #calendar {
        width: 100%;
        height: 80vh;
        max-width: none;
        margin: 0;
        background: white;
        padding: 10px;
        border-radius: 8px;
    }

    /* Header styling */
    .fc-header-toolbar {
        margin-bottom: 1.5rem !important;
        padding: 1rem;
        background: linear-gradient(135deg, #000000 0%, #ea0000 100%);
        border-radius: 12px;
        color: white;
    }

    .fc-toolbar-title {
        font-family: 'Edu VIC WA NT Hand', cursive !important;
        font-size: 2rem !important;
        font-weight: 500 !important;
        color: white !important;
    }

    .fc-button-primary {
        background: rgba(255, 255, 255, 0.2) !important;
        border: 2px solid rgba(255, 255, 255, 0.3) !important;
        border-radius: 8px !important;
        color: white !important;
        font-family: 'Poppins', sans-serif !important;
        transition: all 0.3s ease !important;
    }

    .fc-button-primary:hover {
        background: rgba(255, 255, 255, 0.3) !important;
        border-color: rgba(255, 255, 255, 0.5) !important;
        transform: scale(1.05);
    }

    .fc-button-primary:not(:disabled):active,
    .fc-button-primary:not(:disabled).fc-button-active {
        background: rgba(255, 255, 255, 0.4) !important;
        border-color: rgba(255, 255, 255, 0.6) !important;
    }

    /* Calendar grid styling */
    .fc-daygrid-day {
        border: 1px solid #e5e7eb !important;
        transition: all 0.3s ease;
    }

    .fc-daygrid-day:hover {
        background-color: #f9fafb !important;
        transform: scale(1.02);
    }

    .fc-day-today {
        background-color: rgba(139, 92, 246, 0.1) !important;
        border: 2px solid #e40202 !important;
    }

    .fc-daygrid-day-number {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 500 !important;
        color: #374151 !important;
        padding: 8px !important;
    }

    /* Day headers */
    .fc-col-header-cell {
        background: #f3f4f6 !important;
        border: 1px solid #d1d5db !important;
        font-family: 'Poppins', sans-serif !important;
        font-weight: 600 !important;
        color: #6b7280 !important;
        padding: 12px 8px !important;
    }

    /* Event styling */
    .fc-event {
        border: none !important;
        border-radius: 6px !important;
        padding: 2px 6px !important;
        margin: 2px !important;
        font-family: 'Poppins', sans-serif !important;
        font-size: 0.75rem !important;
        font-weight: 500 !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
    }

    .fc-event:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* Status-based event colors */
    .fc-event.event-available {
        background: #10b981 !important;
        color: white !important;
    }

    .fc-event.event-limited {
        background: #f59e0b !important;
        color: white !important;
    }

    .fc-event.event-booked {
        background: #ef4444 !important;
        color: white !important;
    }

    .fc-event.event-special {
        background: #3b82f6 !important;
        color: white !important;
    }

    /* Dark mode support */
    .dark .fc-daygrid-day {
        border-color: #4b5563 !important;
        background: #374151 !important;
    }

    .dark .fc-daygrid-day:hover {
        background-color: #4b5563 !important;
    }

    .dark .fc-daygrid-day-number {
        color: #d1d5db !important;
    }

    .dark .fc-col-header-cell {
        background: #4b5563 !important;
        border-color: #6b7280 !important;
        color: #d1d5db !important;
    }

    /* Loading animation */
    .calendar-loading {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 400px;
        flex-direction: column;
        gap: 1rem;
    }

    .spinner {
        animation: spin 1s linear infinite;
        width: 3rem;
        height: 3rem;
        border: 3px solid #e5e7eb;
        border-top-color: #8B5CF6;
        border-radius: 50%;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Service cards animation */
    .service-card {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease;
    }

    .service-card.animate {
        opacity: 1;
        transform: translateY(0);
    }

    /* Responsive */
    @media (max-width: 768px) {
        #calendar {
            height: 60vh;
        }
        
        .fc-toolbar-title {
            font-size: 1.5rem !important;
        }
        
        .fc-header-toolbar {
            flex-direction: column;
            gap: 1rem;
        }

        .containerHero h1 {
            font-size: 3rem !important;
        }

        .containerHero p {
            width: 90% !important;
        }
    }

    @media (max-width: 480px) {
        .px-30 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        #calendar {
            height: 50vh;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
    // Configuration - Ganti dengan data sebenarnya
    const CONFIG = {
        whatsappNumber: '6281234567890', // Ganti dengan nomor WhatsApp bisnis Anda
        phoneNumber: '+6281234567890',   // Ganti dengan nomor telepon bisnis Anda
        apiEndpoint: '/api/kalender-ketersediaan' // Endpoint API untuk data kalender
    };

    // Sample data - replace with your actual API endpoint
    const sampleEvents = [
        {
            id: '1',
            title: 'Tersedia',
            start: '2025-07-28',
            className: 'event-available',
            extendedProps: {
                status: 'available',
                description: 'Semua layanan tersedia - Wedding Organizer, Dekorasi, dan Sewa Perlengkapan',
                services: ['Wedding Organizer', 'Dekorasi', 'Sewa Perlengkapan'],
                maxBookings: 3,
                currentBookings: 0
            }
        },
        {
            id: '2',
            title: 'Terbatas',
            start: '2025-07-29',
            className: 'event-limited',
            extendedProps: {
                status: 'limited',
                description: 'Ketersediaan terbatas - Hanya dekorasi dan sewa perlengkapan',
                services: ['Dekorasi', 'Sewa Perlengkapan'],
                maxBookings: 3,
                currentBookings: 2
            }
        },
        {
            id: '3',
            title: 'Penuh',
            start: '2025-07-30',
            className: 'event-booked',
            extendedProps: {
                status: 'booked',
                description: 'Tanggal sudah terisi penuh untuk semua layanan',
                services: [],
                maxBookings: 3,
                currentBookings: 3
            }
        },
        {
            id: '4',
            title: 'Event Khusus',
            start: '2025-08-15',
            className: 'event-special',
            extendedProps: {
                status: 'special',
                description: 'Paket spesial weekend - Diskon 20% untuk paket lengkap',
                services: ['Wedding Organizer', 'Dekorasi', 'Sewa Perlengkapan'],
                discount: '20%',
                specialOffer: 'Weekend Special Package'
            }
        },
        {
            id: '5',
            title: 'Tersedia',
            start: '2025-08-02',
            className: 'event-available',
            extendedProps: {
                status: 'available',
                description: 'Semua layanan tersedia dengan promo menarik',
                services: ['Wedding Organizer', 'Dekorasi', 'Sewa Perlengkapan'],
                maxBookings: 3,
                currentBookings: 1
            }
        },
        {
            id: '6',
            title: 'Tersedia',
            start: '2025-08-16',
            className: 'event-available',
            extendedProps: {
                status: 'available',
                description: 'Tersedia untuk acara pernikahan',
                services: ['Wedding Organizer', 'Dekorasi', 'Sewa Perlengkapan'],
                maxBookings: 2,
                currentBookings: 0
            }
        }
    ];

    let calendar;

    document.addEventListener('DOMContentLoaded', function() {
        initializeCalendar();
        initializeContactButtons();
        initializeServiceCardAnimations();
        adjustCalendarHeight();
        
        // Add resize listener
        window.addEventListener('resize', adjustCalendarHeight);
    });

    function initializeCalendar() {
        const calendarEl = document.getElementById('calendar');
        
        // Show loading state
        showCalendarLoading();

        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id',
            firstDay: 1, // Monday as first day
            
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listMonth'
            },

            // Button text customization
            buttonText: {
                today: 'Hari Ini',
                month: 'Bulan',
                list: 'Daftar'
            },

           events: '/api/kalender-ketersediaan', 

            eventClick: function(info) {
                showEventModal(info.event);
            },

            dayClick: function(info) {
                // Handle day click for days without events
                const existingEvent = calendar.getEvents().find(event => 
                    event.startStr === info.dateStr
                );
                
                if (!existingEvent) {
                    showDayModal(info.date);
                }
            },

            eventDidMount: function(info) {
                // Add tooltip
                info.el.setAttribute('title', info.event.extendedProps.description);
                
                // Add custom classes
                const status = info.event.extendedProps.status;
                info.el.classList.add(`event-${status}`);
            },

            // loading: function(bool) {
            //     if (bool) {
            //         showCalendarLoading();
            //     }
            // },

            // eventSources: [
            //     {
            //          events: '/api/kalender-ketersediaan',
            //         failure: function() {
            //             handleCalendarError();
            //         }
            //     }
            // ]
        });

        calendar.render();
    }

    // Function to fetch events from API (uncomment when ready to use)
    function fetchEventsFromAPI(fetchInfo, successCallback, failureCallback) {
        fetch(CONFIG.apiEndpoint + '?' + new URLSearchParams({
            start: fetchInfo.startStr,
            end: fetchInfo.endStr
        }))
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            successCallback(data);
        })
        .catch(error => {
            console.error('Error fetching calendar events:', error);
            failureCallback(error);
            handleCalendarError();
        });
    }

    function showEventModal(event) {
        const modal = document.getElementById('eventModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalContent = document.getElementById('modalContent');
        const consultationBtn = document.getElementById('consultationBtn');
        
        const date = new Date(event.start);
        const formattedDate = date.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        modalTitle.textContent = formattedDate;
        
        const props = event.extendedProps;
        let statusText = '';
        let statusColor = '';
        
        switch(props.status) {
            case 'available':
                statusText = 'Tersedia';
                statusColor = 'text-green-600';
                break;
            case 'limited':
                statusText = 'Ketersediaan Terbatas';
                statusColor = 'text-yellow-600';
                break;
            case 'booked':
                statusText = 'Sudah Penuh';
                statusColor = 'text-red-600';
                break;
            case 'special':
                statusText = 'Event Khusus';
                statusColor = 'text-blue-600';
                break;
        }
        
        let servicesHtml = '';
        if (props.services && props.services.length > 0) {
            servicesHtml = `
                <div>
                    <h4 class="font-semibold text-gray-700 dark:text-gray-300 mb-2 poppins-regular">Layanan Tersedia:</h4>
                    <ul class="space-y-1">
                        ${props.services.map(service => `
                            <li class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                ${service}
                            </li>
                        `).join('')}
                    </ul>
                </div>
            `;
        }
        
        let discountHtml = '';
        if (props.discount) {
            discountHtml = `
                <div class="bg-blue-50 dark:bg-blue-900/30 p-3 rounded-lg">
                    <p class="text-blue-700 dark:text-blue-300 font-semibold text-sm">
                        🎉 Diskon ${props.discount} untuk paket lengkap!
                    </p>
                </div>
            `;
        }

        let bookingInfoHtml = '';
        if (props.maxBookings && props.currentBookings !== undefined) {
            const availableSlots = props.maxBookings - props.currentBookings;
            bookingInfoHtml = `
                <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600 dark:text-gray-400">Slot Tersedia:</span>
                        <span class="font-semibold ${availableSlots > 0 ? 'text-green-600' : 'text-red-600'}">${availableSlots}/${props.maxBookings}</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2 mt-2">
                        <div class="bg-green-500 h-2 rounded-full transition-all duration-300" style="width: ${((props.maxBookings - props.currentBookings) / props.maxBookings) * 100}%"></div>
                    </div>
                </div>
            `;
        }
        
        modalContent.innerHTML = `
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-4 h-4 rounded-full ${getStatusDotColor(props.status)}"></div>
                    <span class="font-semibold ${statusColor} poppins-regular">${statusText}</span>
                </div>
                
                <div>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">${props.description}</p>
                </div>
                
                ${discountHtml}
                ${bookingInfoHtml}
                ${servicesHtml}
                
                ${props.status === 'booked' ? `
                    <div class="bg-red-50 dark:bg-red-900/30 p-3 rounded-lg">
                        <p class="text-red-700 dark:text-red-300 text-sm">
                            ⚠️ Tanggal ini sudah penuh. Silakan pilih tanggal lain atau hubungi kami untuk alternatif.
                        </p>
                    </div>
                ` : ''}

                ${props.specialOffer ? `
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/30 dark:to-pink-900/30 p-3 rounded-lg border border-purple-200 dark:border-purple-700">
                        <p class="text-purple-700 dark:text-purple-300 font-semibold text-sm">
                            ✨ ${props.specialOffer}
                        </p>
                    </div>
                ` : ''}
            </div>
        `;

        // Handle consultation button
        if (props.status === 'booked') {
            consultationBtn.textContent = 'Cari Tanggal Lain';
            consultationBtn.className = 'flex-1 bg-gray-500 text-white rounded-xl py-3 px-4 font-semibold hover:scale-105 transition-all duration-300 poppins-regular';
            consultationBtn.onclick = () => {
                closeModal();
                // Highlight available dates
                highlightAvailableDates();
            };
        } else {
            consultationBtn.textContent = 'Konsultasi Gratis';
            consultationBtn.className = 'flex-1 bg-primary text-white rounded-xl py-3 px-4 font-semibold hover:scale-105 transition-all duration-300 poppins-regular';
            consultationBtn.onclick = () => {
                openWhatsAppConsultation(formattedDate, statusText, props.services);
            };
        }

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function showDayModal(date) {
        const modal = document.getElementById('eventModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalContent = document.getElementById('modalContent');
        const consultationBtn = document.getElementById('consultationBtn');

        const formattedDate = date.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        modalTitle.textContent = formattedDate;

        modalContent.innerHTML = `
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-4 h-4 rounded-full bg-gray-400"></div>
                    <span class="font-semibold text-gray-600 dark:text-gray-400 poppins-regular">Belum Ada Informasi</span>
                </div>
                
                <div>
                    <p class="text-gray-600 dark:text-gray-400 pt-serif-regular">
                        Ketersediaan untuk tanggal ini belum dikonfirmasi. Hubungi kami untuk informasi lebih lanjut dan reservasi.
                    </p>
                </div>
                
                <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                    <h4 class="font-semibold text-gray-700 dark:text-gray-300 mb-2 poppins-regular">Layanan yang Tersedia:</h4>
                    <ul class="space-y-1">
                        <li class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Wedding Organizer
                        </li>
                        <li class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Dekorasi
                        </li>
                        <li class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Sewa Perlengkapan
                        </li>
                    </ul>
                </div>

                <div class="bg-blue-50 dark:bg-blue-900/30 p-3 rounded-lg">
                    <p class="text-blue-700 dark:text-blue-300 text-sm">
                        💡 <strong>Tips:</strong> Booking lebih awal memberikan fleksibilitas lebih dalam memilih paket dan layanan sesuai keinginan Anda.
                    </p>
                </div>
            </div>
        `;

        consultationBtn.textContent = 'Tanya Ketersediaan';
        consultationBtn.className = 'flex-1 bg-primary text-white rounded-xl py-3 px-4 font-semibold hover:scale-105 transition-all duration-300 poppins-regular';
        consultationBtn.onclick = () => {
            openWhatsAppConsultation(formattedDate, 'Belum Dikonfirmasi', ['Wedding Organizer', 'Dekorasi', 'Sewa Perlengkapan']);
        };

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function getStatusDotColor(status) {
        switch(status) {
            case 'available':
                return 'bg-green-500';
            case 'limited':
                return 'bg-yellow-500';
            case 'booked':
                return 'bg-red-500';
            case 'special':
                return 'bg-blue-500';
            default:
                return 'bg-gray-400';
        }
    }

    function closeModal() {
        const modal = document.getElementById('eventModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Restore background scrolling
    }

    function openWhatsAppConsultation(date, status, services) {
        const servicesText = services && services.length > 0 ? services.join(', ') : 'Semua layanan';
        const message = `Halo 3Rasa Wedding Organizer! 👋

Saya tertarik untuk konsultasi tentang layanan untuk:
📅 Tanggal: ${date}
📊 Status: ${status}
🎯 Layanan: ${servicesText}

Mohon informasi lebih lanjut mengenai paket dan harga. Terima kasih! 🙏`;

        const whatsappUrl = `https://wa.me/${CONFIG.whatsappNumber}?text=${encodeURIComponent(message)}`;
        window.open(whatsappUrl, '_blank');
        
        // Close modal after opening WhatsApp
        closeModal();
    }

    function highlightAvailableDates() {
        // Add visual highlight to available dates
        const availableEvents = calendar.getEvents().filter(event => 
            event.extendedProps.status === 'available' || event.extendedProps.status === 'limited'
        );
        
        // You can add additional visual effects here
        console.log('Available dates:', availableEvents.map(e => e.startStr));
        
        // Optionally scroll to next available date
        if (availableEvents.length > 0) {
            calendar.gotoDate(availableEvents[0].start);
        }
    }

    function initializeContactButtons() {
        // WhatsApp button in contact section
        const whatsappBtn = document.getElementById('whatsappContactBtn');
        if (whatsappBtn) {
            whatsappBtn.addEventListener('click', function() {
                const message = 'Halo 3Rasa Wedding Organizer! Saya tertarik untuk konsultasi tentang layanan wedding organizer. Mohon informasi lebih lanjut. Terima kasih! 🙏';
                const whatsappUrl = `https://wa.me/${CONFIG.whatsappNumber}?text=${encodeURIComponent(message)}`;
                window.open(whatsappUrl, '_blank');
            });
        }

        // Phone button in contact section
        const phoneBtn = document.getElementById('phoneContactBtn');
        if (phoneBtn) {
            phoneBtn.addEventListener('click', function() {
                window.location.href = `tel:${CONFIG.phoneNumber}`;
            });
        }
    }

    function initializeServiceCardAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('animate');
                    }, index * 200); // Stagger animation
                }
            });
        }, {
            threshold: 0.1
        });

        // Observe service cards
        const serviceCards = document.querySelectorAll('.grid > div');
        serviceCards.forEach(card => {
            card.classList.add('service-card');
            observer.observe(card);
        });
    }

    function showCalendarLoading() {
        const calendarEl = document.getElementById('calendar');
        calendarEl.innerHTML = `
            <div class="calendar-loading">
                <div class="spinner"></div>
                <p class="text-gray-600 dark:text-gray-400 poppins-regular">Memuat kalender ketersediaan...</p>
            </div>
        `;
    }

    function handleCalendarError() {
        const calendarEl = document.getElementById('calendar');
        calendarEl.innerHTML = `
            <div class="flex items-center justify-center h-64">
                <div class="text-center">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-400 mb-2">Gagal Memuat Kalender</h3>
                    <p class="text-gray-500 dark:text-gray-500 mb-4">Terjadi kesalahan saat memuat data kalender.</p>
                    <button onclick="location.reload()" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition-colors poppins-regular">
                        Coba Lagi
                    </button>
                    <br>
                    <button onclick="openWhatsAppConsultation('', 'Konsultasi Langsung', [])" class="mt-2 text-purple-600 hover:text-purple-800 transition-colors poppins-regular">
                        Atau Hubungi Kami Langsung
                    </button>
                </div>
            </div>
        `;
    }

    function adjustCalendarHeight() {
        const calendar = document.getElementById('calendar');
        const windowHeight = window.innerHeight;

        if (windowHeight < 600) {
            calendar.style.height = '45vh';
        } else if (windowHeight < 700) {
            calendar.style.height = '50vh';
        } else if (windowHeight < 900) {
            calendar.style.height = '60vh';
        } else {
            calendar.style.height = '70vh';
        }
    }

    // Close modal when clicking outside
    document.getElementById('eventModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    // Add smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add loading states for buttons
    function addButtonLoadingState(button, originalText) {
        button.disabled = true;
        button.innerHTML = `
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Memproses...
        `;

        setTimeout(() => {
            button.disabled = false;
            button.textContent = originalText;
        }, 1500);
    }

    // Enhanced error handling for network issues
    window.addEventListener('online', function() {
        console.log('Connection restored');
        if (calendar) {
            calendar.refetchEvents();
        }
    });

    window.addEventListener('offline', function() {
        console.log('Connection lost');
        // You could show a notification here
    });
</script>
@endpush

@endsection