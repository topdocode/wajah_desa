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
    <div class="">

        @include('guest.components.carousel')
    </div>
    @include('guest.components.popup')

    {{-- Profile, Contact, Kinerja --}}
    <section class="bg-white">
        <div class="grid grid-cols-1 md:grid-cols-3">
            {{-- item 1 --}}
            <div
                class="bg-third h-64 w-full hover:bg-secondary  animate__animated animate__fadeInDown delay-1s hover:cursor-pointer">
                <div class="flex items-center justify-center h-full px-16">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-x-4">
                        <div
                            class=" text-center rounded-full p-4 w-12 h-12 bg-white text-secondary text-[20px] flex items-center justify-center">
                            <i class="fa-solid fa-users" class="text-secondary text-[20px]"></i>
                        </div>
                        <div class="flex flex-col gap-y-4 md:gap-y-2 text-center md:text-start">
                            <h3>PROFILE</h3>
                            <P>Bagian Pengadaan Barang Jasa Sekretariat Daerah Kabupaten Mimika</P>
                            <div>
                                <a href="#" class="border-2 px-8 py-1 rounded-full inline">
                                    Kunjungi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="bg-four h-64 w-full hover:bg-secondary  animate__animated animate__fadeInDown delay-2s hover:cursor-pointer">
                <div class="flex items-center justify-center h-full px-16">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-x-4">
                        <div
                            class=" text-center rounded-full p-4 w-12 h-12 bg-white text-secondary text-[20px] flex items-center justify-center">
                            <i class="fa-solid fa-phone" class="text-secondary text-[20px]"></i>
                        </div>
                        <div class="flex flex-col gap-y-4 md:gap-y-2 text-center md:text-start">
                            <h3>KONTAK</h3>
                            <P>Pertanyaan atau Keluhan?</P>
                            <div>
                                <a href="#" class="border-2 px-8 py-1 rounded-full inline">
                                    Kunjungi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="bg-primary h-64 w-full hover:bg-secondary  animate__animated animate__fadeInDown delay-3s hover:cursor-pointer">
                <div class="flex items-center justify-center h-full px-16">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-x-4">
                        <div
                            class=" text-center rounded-full p-4 w-12 h-12 bg-white text-secondary text-[20px] flex items-center justify-center">
                            <i class="fa-solid fa-rocket" class="text-secondary text-[20px]"></i>
                        </div>
                        <div class="flex flex-col gap-y-4 md:gap-y-2 text-center md:text-start">
                            <h3>KINERJA</h3>
                            <P>Sistem Informasi Pengadaan Barang/Jasa Yang Memuat Kinerja PBJ di Kabupaten Mimika</P>
                            <div>
                                <a href="#" class="border-2 px-8 py-1 rounded-full inline">
                                    Kunjungi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>


    {{-- Berita and Lighight  --}}
    @include('guest.components.news')


    {{-- video --}}
    @include('guest.components.video')

    {{-- gallery --}}
    @include('guest.components.gallery')
@endsection
