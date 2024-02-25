<!DOCTYPE html>
<html lang="en">

<head>
    @include('guest/components/header')
</head>

<body class="leading-normal tracking-normal text-white bg-white]" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--Nav-->
    @include('guest/components/navbar')

    {{-- content --}}
    @yield('content')

    {{-- bg aplikasi terkait --}}
    <!-- Change the colour #f8fafc to match the previous section colour -->
    <svg class="wave-top bg-gray-300" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                <g class="wave" fill="#f8fafc">
                    <path
                        d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z">
                    </path>
                </g>
                <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                    <g
                        transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            opacity="0.200000003"></path>
                    </g>
                </g>
            </g>
        </g>
    </svg>
    <section class=" bg-gray-300">
        <div class="container mx-auto py-6 ">

            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
                Aplikasi Terkait
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 mt-4 text-black gap-2 px-2">
                @foreach ($navbarSiap as $item)
                    <div class="bg-white shadow-xl rounded-xl p-4 md:p-12  gap-y-2">
                        <div
                            class="flex flex-col md:flex-row gap-x-4 items-center  animate__animated animate__fadeInDown delay-1s">
                            <div class="w-[40px] h-[40px] rounded-full">
                                <img src="{{ Storage::url($item->logo) }}"
                                    class="w-[40px] h-[40px] object-cover rounded-full " />
                            </div>
                            <div>
                                <h4 class="font-bold">{{ $item->title }}</h4>
                            </div>
                        </div>
                        <p class="text-sm md:text-base">
                            {{ $item->description }}
                        </p>
                        <a href="{{ $item->link }}" target="__blank" class="mt-4 text-primary ">Menuju Link</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('guest.components.anothernews')
    <!--Footer-->
    @include('guest.components.footer')

    {{-- <!-- jQuery if you need it --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- --> --}}
    @vite('resources/js/styles.js')
    @yield('footer')
</body>

</html>
