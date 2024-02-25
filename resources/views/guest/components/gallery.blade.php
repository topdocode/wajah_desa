{{-- gallery images --}}
<section class="bg-white py-8 ">
    <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800  delay-1s">
        <h2 class="w-full my-2 text-2xl font-bold leading-tight text-center text-gray-800">
            Galleri
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($galleries as $index => $gallery)
                <div>
                    <a href="{{ Storage::url($gallery->media) }}" data-lightbox="roadtrip" class="">
                        <img class="h-36 md:h-48 w-full rounded-lg object-cover animate__animated animate__zoomIn"
                            data-src="{{ Storage::url($gallery->media) }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center items-center">
            {{ method_exists($galleries, 'links') ? $galleries->appends(['galery' => $galleries->currentPage()])->links() : null }}
        </div>

    </div>
</section>
