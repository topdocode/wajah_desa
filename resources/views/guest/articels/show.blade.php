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
    <div class=" container mx-auto text-black">
        <div class="grid grid-cols-1 md:grid-cols-3 mt-14  ">
            <div class="col-span-2 border-b-2 px-4">

                <div class="md:flex mt-4 md:gap-x-4">
                    <div class="hidden md:inline-block">
                        <div class="border-2 text-center p-2 w-[65px]">
                            <div class="text-4xl border-b-2 ">
                                <i class="fa-regular fa-clock" class="text-4xl"></i>
                            </div>
                            <div class="text-xs text-primary">{{ $articel->article_date }}</div>
                        </div>
                    </div>

                    {{-- isi articl --}}
                    <div>
                        <h1 class="text-2xl font-bold mb-2">{{ $articel->title }}</h1>
                        <img class="mb-2" data-src="{{ Storage::url($articel->cover) }}" />
                        <div id="content">
                            <?= $articel->content ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 md:mt-0 px-4">
                <h2 class="text-2xl ">Berita Lain</h2>

                <div class="mt-8">
                    @foreach ($anotherArticels as $item)
                        <div class="flex gap-x-4 items-start my-4 border-b-2 w-full ">
                            <img data-src="{{ Storage::url($item->cover) }}" class="w-[70px] h-[60px]" />

                            <a href="{{ route('articels.detail', $item->slug) }}"
                                class="hover:text-primary hover:cursor-pointer">
                                <h3>
                                    {{ $item->title }}
                                </h3>
                                <p>{{ $item->article_date }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
