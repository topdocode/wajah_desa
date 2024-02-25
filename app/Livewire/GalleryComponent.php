<?php

namespace App\Livewire;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryComponent extends Component
{  public $perPage = 8;
    public $images = []; // This will hold the images to display
    public $nextCursor = null; // This holds the cursor for the next query

    public function mount()
    {
        $this->loadMore();
    }

    public function loadMore()
    {
        if ($this->nextCursor) {
            $moreImages = Gallery::where('id', '>', $this->nextCursor)
                                      ->orderBy('id')
                                      ->take($this->perPage)
                                      ->get();
        } else {
            $moreImages = Gallery::orderBy('id')
                                      ->take($this->perPage)
                                      ->get();
        }

        // If images were fetched, set the next cursor
        if (!$moreImages->isEmpty()) {
            $this->nextCursor = $moreImages->last()->id;
        }

        // Merge the new images with the existing list
        $this->images = array_merge($this->images, $moreImages->toArray());
    }

    public function render()
    {
        return view('livewire.gallery-component', [
            'galleries' => collect($this->images),
        ]);
    }
}
