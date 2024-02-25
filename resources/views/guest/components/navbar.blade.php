<nav id="header" class="bg-white relative w-full z-50 top-0 text-white  ">
    <div class="container mx-auto bg-white">

        <div id="header-logo" class="bg-white p-9 flex items-center justify-center lg:justify-between">
            <div class="flex flex-col md:flex-row gap-x-4 items-center justify-center">
                <img data-src="{{ Storage::url($globalSetting['logo']) }}" class="h-[80px]" alt="">
                <h1 class="text-primary font-bold text-2xl text-center">{{ $globalSetting['title'] }} </h1>
                {{-- <img src="{{ asset('assets/images/logo2.png') }}" class="w-[180px] h-[77px]" alt=""> --}}
            </div>
            <div class="hidden lg:flex gap-x-4 items-center text-black ">
                <div class="flex gap-x-4 items-center">
                    <div class="rounded-full border-2 p-4">
                        <i class="fa-solid fa-envelope text-primary text-[30px]"></i>
                    </div>
                    <div>
                        <h3 class="font-bold">EMAIL</h3>
                        <a href="{{ $globalSetting['email'] }}">{{ $globalSetting['email'] }}</a>
                    </div>
                </div>
                <div class="flex gap-x-4 items-center">
                    <div class="rounded-full border-2 p-4">
                        <i class="fa-solid fa-phone text-primary text-[30px]"></i>
                    </div>
                    <div>
                        <h3 class="font-bold">Phone</h3>
                        <a href="{{ $globalSetting['phone'] }}" class="text-gray-400">{{ $globalSetting['phone'] }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-black">
        <div class="container mx-auto ]">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2 ">
                <div class="block lg:hidden pr-4">
                    <button id="nav-toggle"
                        class="flex items-center p-1 text-white hover:text-gray-900  transform transition hover:scale-105 duration-300 ease-in-out">
                        <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                    </button>
                </div>
                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-black lg:bg-transparent text-white p-4 lg:p-0 z-20"
                    id="nav-content">
                    <ul class="list-reset lg:flex justify-start flex-1 items-center">
                        <li class="mr-3">
                            <a class="inline-block uppercase py-2 px-4 text-white font-bold no-underline"
                                href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="mr-3">
                            {{-- <a class="inline-block uppercase text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                href="#">Profile</a> --}}
                            <button href="$" id="dropdownProfile" data-dropdown-toggle="toggleProfile"
                                data-dropdown-delay="500" data-dropdown-trigger="hover"
                                class="hover:text-gray-800 hover:text-underline flex items-center uppercase text-white no-underline  hover:text-underline py-2 px-4"
                                type="button">
                                Profile

                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="toggleProfile" class="ml-52 z-10 hidden bg-white rounded-lg shadow w-60 ">
                                <ul class="h-48 py-2 overflow-y-auto text-gray-700"
                                    aria-labelledby="dropdownUsersButton">
                                    @foreach ($navbarProfile as $item)
                                        <li>
                                            <a href="{{ route('profile.index', $item->slug) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                {{ $item->title }}</a>
                                        </li>
                                        <!-- Dropdown menu -->
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block uppercase text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                href="{{ route('articels.index') }}">Berita</a>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block uppercase text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                href="{{ route('gallery.index') }}">Galleri</a>
                        </li>
                        <li class="mr-3">
                            {{-- <a class="inline-block uppercase text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                href="#">Profile</a> --}}
                            <button href="$" id="dropdownDownload" data-dropdown-toggle="toggleDonwload"
                                data-dropdown-delay="500" data-dropdown-trigger="hover"
                                class="hover:text-gray-800 hover:text-underline flex items-center uppercase text-white no-underline  hover:text-underline py-2 px-4"
                                type="button">
                                Download

                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="toggleDonwload" class="ml-52 z-10 hidden bg-white rounded-lg shadow w-60 ">
                                <ul class="h-48 py-2 overflow-y-auto text-gray-700"
                                    aria-labelledby="dropdownUsersButton">
                                    @foreach ($navbarDownload as $item)
                                        <li>
                                            <a href="{{ $item->url }}" target="_blank"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                {{ $item->file_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="mr-3">
                            {{-- <a class="inline-block uppercase text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                href="#">Profile</a> --}}
                            <button href="$" id="dropdownSiap" data-dropdown-toggle="toggleSiap"
                                data-dropdown-delay="500" data-dropdown-trigger="hover"
                                class="hover:text-gray-800 hover:text-underline flex items-center uppercase text-white no-underline  hover:text-underline py-2 px-4"
                                type="button">
                                Siap

                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="toggleSiap" class="ml-52 z-10 hidden bg-white rounded-lg shadow w-60 ">
                                <ul class="h-48 py-2 overflow-y-auto text-gray-700"
                                    aria-labelledby="dropdownUsersButton">
                                    @foreach ($navbarSiap as $item)
                                        <li>
                                            <a href="{{ $item->link ?? route('comingsoon') }}" target="_blank"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                {{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </li>
                        <li class="mr-3">
                            {{-- <a class="inline-block uppercase text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                href="#">Profile</a> --}}
                            <button href="$" id="dropdownKontak" data-dropdown-toggle="toggleKontak"
                                data-dropdown-delay="500" data-dropdown-trigger="hover"
                                class="hover:text-gray-800 hover:text-underline flex items-center uppercase text-white no-underline  hover:text-underline py-2 px-4"
                                type="button">
                                Kontak

                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="toggleKontak"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownKontak">
                                    <li>
                                        <a href="{{ route('contact.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Lokasi Peta</a>
                                    </li>
                                    <li>
                                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSfMGMtzZjEkm41xkXVk_a6Tmh1_zCkMSjHD6fXJAxKkzDT3mQ/viewform"
                                            target="_blank"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Buku Tamu</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="mr-3">
                            {{-- <a class="inline-block uppercase text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                href="#">Profile</a> --}}
                            <button href="$" id="dropdownLayanan" data-dropdown-toggle="toggleLayanan"
                                data-dropdown-delay="500" data-dropdown-trigger="hover"
                                class="hover:text-gray-800 hover:text-underline flex items-center uppercase text-white no-underline  hover:text-underline py-2 px-4"
                                type="button">
                                Layanan Pengaduan

                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->

                            <div id="toggleLayanan"
                                class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                <ul class="h-48 py-2 overflow-y-auto text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownUsersButton">
                                    @foreach ($navbarLayanan as $item)
                                        <li>
                                            <a href="{{ $item->link }}" target="_blank"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                {{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <form class="flex items-center" method="GET" action="{{ route('articels.index') }}">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <input type="text" id="simple-search" name="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                placeholder="Search">
                        </div>
                        <button type="submit"
                            class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </div>
</nav>
