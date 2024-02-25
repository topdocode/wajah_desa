<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Video;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    function index()
    {
        $galleries = Gallery::orderBy('created_at', 'asc')->simplePaginate(9,  ['*'], 'gallery');
        $videos = Video::orderBy('created_at', 'asc')->simplePaginate(9,  ['*'], 'video');
        return view('guest.gallery.gallery', compact('galleries', 'videos'));
    }
}
