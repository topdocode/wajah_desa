@if (count($popups) > 0)
    <div id="info-popup" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full  max-w-xl ">
            <div class="relative p-4 bg-white max-h-[700px] rounded-lg shadow dark:bg-gray-800 md:p-8">
                <div class="mb-4 text-sm font-light text-gray-500 dark:text-gray-400">
                    <div class="absolute top-0 right-0 z-20 px-2 py-2">
                        <button id="close-modal" type="button" class="w-full text-sm font-medium text-gray-500 "><i
                                class="fa-solid fa-xmark"></i></button>
                    </div>
                    <swiper-container direction="horizontal" slides-per-view="1" speed="500" auto-delay="500"
                        autoplay="true">
                        @foreach ($popups as $popup)
                            <swiper-slide class="">

                                {{-- <h3 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">
                                    {{ $popup->title }}
                                </h3> --}}
                                <div class="overflow-y-auto overflow-hidden" style="height: 600px;">
                                    @if ($popup->type == 'image')
                                        <a href="{{ $popup->link ?? '#' }}
                                    ">
                                            <img src="{{ Storage::url($popup->media) }} "
                                                class=" h-[600px] object-cover" />
                                        </a>
                                    @elseif ($popup->type == 'video')
                                        <video width="100%" controls class="h-[600px]">
                                            <source src="{{ Storage::url($popup->media) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                    {{-- @if (!empty($popup->link))
                                        <a href="{{ $popup->link }}" class="text-primary text-lg">kunjungi</a>
                                        <br>
                                    @endif --}}
                                    {{-- <br>
                                    <p class="text-lg">{{ $popup->description }}</p> --}}
                                </div>
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
                </div>
            </div>
        </div>
    </div>
@endif
