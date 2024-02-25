<?php
$lengthCarousel = count($carousels);
?>
<div id="controls-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-[31.25rem]">

        @if ($lengthCarousel > 0)
            @foreach ($carousels as $index => $item)
                <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ $index == 00 ? 'active' : null }}">

                    <div class="absolute block w-full h-full bg-cover bg-center bg-no-repeat  "
                        style="background-image: url('{{ Storage::url($item->image) }}');">
                        <div
                            class="h-full visibility-inherit flex flex-col justify-end px-4  md:px-16 lg:px-36 py-4 md:py-10">
                            <div>
                                <div class="md:mb-4 px-2">
                                    <h1 class="font-bold bg-[#f14b05] inline md:text-4xl">{{ $item->heading }}</h1>
                                </div>
                                <div class="md:mb-4 px-2">
                                    <h1 class="font-bold bg-black inline md:text-4xl">{{ $item->title }}</h1>
                                </div>
                                <div class="md:mb-4 px-2">
                                    <h2 class="font-bold bg-white text-primary inline md:text-4xl">{{ $item->info }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        {{-- <img src="{{ asset('assets/images/carousel/carousel-1.jpeg') }}" class="" alt="..."> --}}
                    </div>
                </div>
            @endforeach
        @endif

        @if ($lengthCarousel < 2)
            @for ($item = 1; $item <= ($lengthCarousel == 0 ? 2 : 1); $item++)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>

                    <div class="absolute block w-full h-full bg-cover bg-center bg-no-repeat  "
                        style="background-image: url('{{ asset('assets/images/carousel/carousel-1.jpeg') }}');">
                    </div>
                </div>
            @endfor
        @endif

        <!-- Item 3 -->
    </div>
    <!-- Slider controls -->
    <button type="button"
        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
