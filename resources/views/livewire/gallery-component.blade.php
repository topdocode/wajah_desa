<div>
    <section class="bg-white py-8 ">
    <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800  delay-1s">
        <h2 class="w-full my-2 text-2xl font-bold leading-tight text-center text-gray-800">
            Galleri
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($galleries as $gallery)
                <div>
                    <a href="{{ Storage::url($gallery['media']) }}" data-lightbox="roadtrip" class="">
                        <img class="h-36 md:h-48 w-full rounded-lg object-cover animate__animated animate__zoomIn"
                            src="{{ Storage::url($gallery['media']) }}" 
                            alt="{{ $gallery['title'] }}"
                            loading="lazy"
                            >
                    </a>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center items-center">
            <img src="{{ asset('assets/images/loading.svg') }}" width="100px" alt="loading" id="loading" wire:loading>
       </div>
        <div class="flex justify-center items-center">
               <button class="mt-10 pointer:cursor font-bold px-4 py-2 bg-black rounded-xl text-white" wire:click="loadMore">Load More</button>    
        </div>
    </div>
</section>
</div>
