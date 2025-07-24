@extends('Layout.app')

@section('title', 'Home')

@section('content')
<div class="width-full h-screen relative"
    x-data="{}"
    >
    <div class="containerHero">
        <div id="slide">
            <div class="item" style="background-image: url('https://cdn.dribbble.com/userupload/44180182/file/original-a88fbf5f219ac2a7d6bd8c7f2d26c1e9.png?resize=1024x682&vertical=center');">
                <div class="absolute inset-0 bg-black/40"></div>
                <div class="content relative z-10 text-white text-center p-8">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Wedding Organizer</h1>
                    <p class="text-lg">Kami siap membantu mewujudkan hari istimewa Anda.</p>
                </div>
            </div>
            <div class="item" style="background-image: url('https://cdn.dribbble.com/userupload/44180182/file/original-a88fbf5f219ac2a7d6bd8c7f2d26c1e9.png?resize=1024x682&vertical=center');">
                <div class=" content relative z-10 text-white text-center p-8">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Wedding Organizer</h1>
                    <p class="text-lg">Kami siap membantu mewujudkan hari istimewa Anda.</p>
                </div>
            </div>
            <div class="item" style="background-image: url('https://cdn.dribbble.com/userupload/39124469/file/original-3957ead0937d5c6b5d15166f0965b392.jpg?resize=1504x1130&vertical=center');">
                <div class="content relative z-10 text-white text-center p-8">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Wedding Organizer</h1>
                    <p class="text-lg">Kami siap membantu mewujudkan hari istimewa Anda.</p>
                </div>
            </div>
            <div class="item" style="background-image: url('https://cdn.dribbble.com/userupload/39124469/file/original-3957ead0937d5c6b5d15166f0965b392.jpg?resize=1504x1130&vertical=center');">
                <div class="content relative z-10 text-white text-center p-8">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Wedding Organizer</h1>
                    <p class="text-lg">Kami siap membantu mewujudkan hari istimewa Anda.</p>
                </div>
            </div>
            <div class="item" style="background-image: url('https://cdn.dribbble.com/userupload/39124469/file/original-3957ead0937d5c6b5d15166f0965b392.jpg?resize=1504x1130&vertical=center');">
                <div class="content relative z-10 text-white text-center p-8">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Wedding Organizer</h1>
                    <p class="text-lg">Kami siap membantu mewujudkan hari istimewa Anda.</p>
                </div>
            </div>

            <div class="buttons">
                <button id="prev"><</i></button>
                <button id="next">></i></button>
            </div>


        </div>
    </div>
</div>

    @push('scripts')
    <script>
        document.getElementById('next').onclick = function(){
            let lists = document.querySelectorAll('.item');
            document.getElementById('slide').appendChild(lists[0]);
        }

        document.getElementById('prev').onclick = function(){
            let lists = document.querySelectorAll('.item');
            document.getElementById('slide').prepend(lists[lists.length - 1]);
        }
    </script>
    @endpush
    
@endsection
