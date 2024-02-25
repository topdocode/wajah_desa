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
    <div class=" text-black">
        {{-- <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center ">
            Gallery
        </h1> --}}
        <div class="py-5">


    <livewire:gallery-component lazy />

        </div>
        @include('guest.components.video')
    </div>
@endsection
