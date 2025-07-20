<x-filament::page>
    <div id="calendar"></div>

    {{-- Tambahkan CSS FullCalendar --}}
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">

    {{-- Tambahkan JS FullCalendar --}}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/api/kalender-ketersediaan', // endpoint ambil data
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                locale: 'id', // kalender bahasa Indonesia
            });

            calendar.render();
        });
    </script>

    <style>
        html, body, #calendar { 
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #calendar {
            width: 100%;
            height: 80vh;
            max-width: none;
            margin: 0;
            background: white;
            padding: 10px;
            border-radius: 8px;
        }
  
    </style>
</x-filament::page>
