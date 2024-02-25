   {{-- gallery video --}}
   <section class="bg-gray-100 py-8">
       <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
           <h2 class="w-full my-2 text-2xl font-bold leading-tight text-center text-gray-800">
               Video
           </h2>
           <div class="grid grid-cols-2 md:grid-cols-4 gap-y-4 gap-x-2">
               @foreach ($videos as $item)
                   <div>
                       <?= $item->url ?>
                   </div>
               @endforeach
           </div>
           <div class="flex justify-center items-center mt-4">
               {{ method_exists($videos, 'links') ? $videos->appends(['video' => $videos->currentPage()])->links() : null }}
           </div>
       </div>
   </section>
