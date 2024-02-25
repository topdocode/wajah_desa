<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Carousel;
use App\Models\Gallery;
use App\Models\Popup;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

class HomeController extends Controller
{

    public $image = ['jpg', 'png', 'gif', 'jpeg', 'webp'];
    public $video = ['mp4', 'avi', 'mov', 'mkv'];
    function index()
    {
        $articels = Article::where('status', 'published')->orderBy('article_date', 'desc')->get();
        $highlight = Article::where(['status' => 'published', 'is_featured' => 1])->orderBy('article_date', 'desc')->featured()->first();
        $anotherArticels = Article::where('status', 'published')->orderBy('article_date', 'desc')->take(10)->get();
        $galleries = Gallery::where('is_featured', 1)->take(9)->orderBy('created_at', 'desc')->get();
        $videos = Video::where('is_featured', 1)->take(9)->orderBy('created_at', 'desc')->get();
        $carousels = Carousel::where('is_active', 1)->get();
        $popups = Popup::where('is_active', 1)->get()->map(function ($item) {
            if (in_array($this->checkFileTypeFromUrl($item->media), $this->image)) {
                $item->type = 'image';
            } elseif (in_array($this->checkFileTypeFromUrl($item->media), $this->video)) {
                $item->type = 'video';
            } else {
                $item->type = null;
            }
            return $item;
        });

        return view('guest.home.index', compact('articels', 'highlight', 'anotherArticels', 'galleries', 'videos', 'popups', 'carousels'));
    }

    public function checkFileTypeFromUrl($file)
    {
        $extension = pathinfo(storage_path($file), PATHINFO_EXTENSION);

        return $extension;
    }
}
