<footer class="bg-[#262F36] text-white py-16">
    <div class="container mx-auto px-8">
        <div class="w-full grid grid-cols-1 md:grid-cols-3  ">
            <div class="flex-1 mb-6 text-white">
                <div class="flex flex-col md:flex-row items-center gap-x-4">
                    <a class="text-primary no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">

                        <img data-src="{{ Storage::url($globalSetting['logo']) }}" alt="{{ $globalSetting['logo'] }}"
                            width="50" height="">
                    </a>
                    <h6 class="mt-4">{{ $globalSetting['description'] }}</h6>
                </div>
                <div class="mt-8 px-4">

                    <div class="flex items-center gap-x-4 mt-2">
                        <i class="fa-solid fa-location-dot"></i>
                        {{-- <h6> {{ $globalSetting['address'] }}</h6> --}}
                        <a href="{{ $globalSetting['address'] }}" target="_blank">Alamat</a>
                    </div>
                    <div class="flex items-center gap-x-4 mt-2">
                        <i class="fa-solid fa-envelope"></i>
                        {{-- <h6> {{ $globalSetting['email'] }}</h6> --}}
                        <a href="mailto:{{ $globalSetting['email'] }}" target="_blank">Email</a>
                    </div>
                    <div class="flex items-center gap-x-4 mt-2">
                        <i class="fa-brands fa-google"></i>
                        {{-- <h6> {{ $globalSetting['social_media']['Google'] }}</h6> --}}
                        <a href="mailto:{{ $globalSetting['social_media']['Google'] }}" target="_blank">Google</a>
                    </div>
                    <div class="flex items-center gap-x-4 mt-2">
                        <i class="fa-brands fa-facebook"></i>
                        {{-- <h6> {{ $globalSetting['social_media']['Facebook'] }}</h6> --}}
                        <a href="{{ $globalSetting['social_media']['Facebook'] }}" target="_blank">Facebook</a>
                    </div>
                    <div class="flex items-center gap-x-4 mt-2">
                        <i class="fa-brands fa-instagram"></i>
                        {{-- <h6> {{ $globalSetting['social_media']['Instagram'] }}</h6> --}}
                        <a href="{{ $globalSetting['social_media']['Instagram'] }}" target="_blank">Instagram</a>
                    </div>
                </div>
            </div>
            <div class="text-white">
                <p class=" text-white md:mb-6 text-2xl font-bold">Halaman</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="{{ route('home') }}"
                            class="no-underline hover:underline text-white hover:text-primary">Dasar
                            Hukum</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="{{ route('home') }}"
                            class="no-underline hover:underline text-white hover:text-primary">Visi
                            Misi</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="{{ route('home') }}"
                            class="no-underline hover:underline text-white hover:text-primary">Layanan
                            Kami</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="{{ route('articels.index') }}"
                            class="no-underline hover:underline text-white hover:text-primary">Berita</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="{{ route('home') }}"
                            class="no-underline hover:underline text-white hover:text-primary">Download</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="{{ route('contact.index') }}"
                            class="no-underline hover:underline text-white hover:text-primary">Kontak
                            Kami</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="https://www.lapor.go.id/" target="_blank"
                            class="no-underline hover:underline text-white hover:text-primary">Pengaduan
                            Publik</a>
                    </li>
                </ul>
            </div>
            <div class="">
                <p class=" text-white md:mb-6 text-2xl font-bold">Lokasi</p>
                <div class="w-full" id="footer-map">
                    {!! $globalSetting['map_link'] !!}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="flex justify-center items-center text-center mt-4 ">
        <a href="https://www.topdocode.com" class="text-white">Design By - <span
                class="text-primary">www.topdocode.com</span></a>
    </div> --}}
</footer>
