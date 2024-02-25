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
    <div class=" container mx-auto mb-4">
        <h1 class="uppercase text-2xl text-center mt-8 text-black mb-3 font-bold ">Berita</h1>
        <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 text-black ">
            @foreach ($articels as $articel)
                <div class="shadow-4xl px-4 mt-4 lg-mt-0">
                    <div class="">
                        <img data-src="{{ Storage::url($articel->cover) }}" class="object-cover h-56"
                            alt="{{ $articel->title }}">
                        <h2 class="font-2xl font-bold">{{ $articel->title }}</h2>
                        <p>{{ Str::limit($articel->description, 120, '...') }}</p>
                        <div class="flex gap-x-2 items-center">
                            <div class="text-primary">
                                <i class="fa-solid fa-location-dot" class="text-primary"></i>
                            </div>
                            <h6 class="uppercase text-xs">{{ $articel->location }}</h6>
                        </div>

                        <a href="{{ route('articels.detail', $articel->slug) }}"
                            class="hover:cursor-pointer hover:text-primary">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center items-center">
            {{ $articels->links() }}
        </div>
    </div>
@endsection
