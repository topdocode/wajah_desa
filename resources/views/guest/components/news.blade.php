<section class="border-b py-8 bg-white text-black">
    <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 w-full">
            <div class="px-4">
                {{-- title --}}
                <div class="flex justify-between w-full">
                    <div>
                        <h3 class="font-bold  text-xl">Berita</h3>
                    </div>
                    {{-- tombol navigation --}}
                    {{-- <div>
                        <button class="text-2xl" id="scrollUp">
                            <i class="fa-solid fa-circle-chevron-left"></i>
                        </button>

                        <button class="text-2xl" id="scrollDown">
                            <i class="fa-solid fa-circle-chevron-right"></i>
                        </button>
                    </div> --}}
                </div>


                <div class="mt-4" id="">

                    {{-- item berita --}}
                    {{-- <swiper-container id="swiper-container-news" class=" h-[40rem] md:h-[50rem] lg:h-[30rem]"
                        direction="vertical" slides-per-view="2" speed="500" autoplay-delay="2500" lazy="true"
                        swiper-no-swiping="true" simulate-touch="true"> --}}

                    @foreach ($articels as $item)
                        <swiper-slide class=" ">
                            <div class="flex gap-x-4 py-4 animate__animated animate__bounceIn">
                                <div class="relative  ">
                                    <div class="absolute top right-0 bg-black text-white px-4 py-2">
                                        <h6 class="text-xs font-bold">
                                            {{ $item?->article_date == ''
                                                ? $item->created_at?->format('d F Y')
                                                : (is_string($item?->article_date)
                                                    ? $item?->article_date
                                                    : $item?->article_date->format('d F Y')) }}

                                        </h6>
                                    </div>
                                    <img src="{{ Storage::url($item->cover) }}"
                                        class=" w-[200px] md:h-[120px] object-cover" alt="{{ $item->title }}" />
                                </div>

                                <div class=" flex-1 gap-y-2 flex flex-col text-sm md:text-base">
                                    <p>
                                        {{ $item->title }}
                                    </p>

                                    <div class="flex gap-x-2 items-center">
                                        <div class="text-primary">
                                            <i class="fa-solid fa-location-dot" class="text-primary"></i>
                                        </div>
                                        <h6 class="uppercase text-xs">{{ $item->location }}</h6>
                                    </div>

                                    <div>
                                        <div class="text-gray-400">
                                            {{ Str::limit($item->description, 120, '...') }}
                                            <a href="{{ route('articels.detail', $item->slug) }}"
                                                class="text-blue-500">(selengkapnya)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                    @endforeach
                    {{-- </swiper-container> --}}

                </div>
            </div>
            <div class="px-4">
                {{-- title --}}

                <h3 class="font-bold  text-xl uppercase ">Highlight</h3>
                {{-- tombol navigation --}}
                @if ($highlight)
                    <div
                        class="flex flex-col lg:flex-row gap-y-4 md:gap-y-0 gap-x-6 lg:py-4 animate__animated animate__bounceIn">
                        <img src="{{ Storage::url($highlight->cover) }}"
                            class="w-full md:w-[272px] md:h-[240px] object-contain" alt="{{ $highlight->title }}" />
                        <div>
                            <h5>{{ $highlight?->title }}</h5>
                            {{ Str::limit($item->description, 120, '...') }}
                            <div class="mt-4">
                                <a href="{{ isset($highlight->slug) ? route('articels.detail', $highlight->slug) : '#' }}"
                                    class="mt-4 text-red-400 rounded-full px-4 py-2 border-red-400 uppercase border-2 hover:bg-red-400 hover:text-white">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>
