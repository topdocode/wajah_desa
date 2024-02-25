<section class="bg-white py-8">
    <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
        <div class="flex justify-between">
            <h2 class="w-full my-2 text-xl md:text-4xl font-bold leading-tight text-gray-800">
                Berita Lainnya
            </h2>
            <div class="flex gap-x-4">
                <button class="text-2xl md:text-4xl" id="scrollLeft">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </button>

                <button class="text-2xl md:text-4xl" id="scrollRight">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </button>
            </div>
        </div>


        {{-- berita --}}
        <div class="mt-4" id="">

            {{-- item berita --}}
            <swiper-container id="swiper-container-another-news" slides-per-view="2" speed="500"
                autoplay-delay="2500" autoplay-disable-on-interaction="false">

                @foreach ($anotherNews as $item)
                    <swiper-slide class="m-0 p-0">
                        <div class="flex flex-col lg:flex-row gap-x-4 px-2 py-4 animate__animated animate__bounceIn">
                            <div class="relative w-full lg:w-[600px]  ">
                                <div class="absolute top-0 right-0 bg-black text-white px-4 py-2 z-10">
                                    <h6 class="text-xs font-bold">{{ $item->created_at->format('d F Y') }}</h6>
                                </div>
                                <img src="{{ Storage::url($item->cover) }}" class=" w-full h-28 md:h-56 object-cover" />
                            </div>

                            <div class="gap-y-2 flex flex-col text-sm md:text-base">
                                <h1 class="font-bold text-xl"> {{ Str::limit($item->title, 40, '...') }}</h1>
                                <div class="flex gap-x-2 items-center">
                                    <div class="text-primary">
                                        <i class="fa-solid fa-location-dot" class="text-primary"></i>
                                    </div>
                                    <h6 class="uppercase text-xs">{{ $item->location }}</h6>
                                </div>

                                <div>
                                    <p class="text-gray-400">
                                        {{ Str::limit($item->description, 120, '...') }}
                                    </p>
                                    <a href="{{ route('articels.detail', $item->slug) }}"
                                        class="text-blue-500">(selengkapnya)</a>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>

        </div>
    </div>
</section>
