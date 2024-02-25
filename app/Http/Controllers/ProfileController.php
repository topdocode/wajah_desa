<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function index($slug)
    {
        $document = Profile::where('slug', $slug)->first();
        $anotherArticels = Article::orderBy('article_date', 'desc')->take(10)->get();
        return view('guest.profile.show', compact('document', 'anotherArticels'));
    }
}
