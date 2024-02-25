@extends('guest.layouts.index')
@section('header')
    @vite('resources/js/news.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.css"
        integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.js"
        integrity="sha512-MBa5biLyZuJEdQR7TkouL0i1HAqpq8lh8suPgA//wpxGx4fU1SGz1hGSlZhYmm+b7HkoncCWpfVKN3NDcowZgQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
    <!--Hero-->

    <div class="container mx-auto text-black flex flex-col items-center animate__animated animate__zoomInDown">
        <h2 class="w-full mt-10  text-5xl font-bold leading-tight text-center text-black">
            Kontak
        </h2>

        {!! $globalSetting['map_link'] !!}

        <div class="text-black container mt-4">
            <div class="flex flex-col px-4 md:px-0 gap-y-6">
                <div class="flex items-center gap-x-4 ">
                    <div class="text-4xl w-[50px] h-[50px] flex items-center justify-center rounded-full shadow-md ">
                        <i class="text-primary fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl">Alamat</h3>
                        <p class="text-gray-400">{{ $globalSetting['address'] }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-x-4 ">
                    <div class="text-4xl w-[50px] h-[50px] flex items-center justify-center rounded-full shadow-md ">
                        <i class="text-primary fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <h3>Telp</h3>
                        <p class="text-gray-400">{{ $globalSetting['phone'] }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-x-4 ">
                    <div class="text-4xl w-[50px] h-[50px] flex items-center justify-center rounded-full shadow-md ">
                        <i class="text-primary fa-solid fa-phone-volume"></i>
                    </div>
                    <div>
                        <h3>Email</h3>
                        <p class="text-gray-400">{{ $globalSetting['email'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
