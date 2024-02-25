<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticelController extends Controller
{
    function index(Request $request)
    {

        $articels = Article::query()->search($request->query("search"))->orderBy('article_date', 'desc')->cursorPaginate(9);
        return view('guest.articels.index', compact('articels'));
    }

    function detail($slug)
    {
        $articel = Article::where('slug', $slug)->first();
        $anotherArticels = Article::where('slug', '!=', $slug)->orderBy('article_date', 'desc')->paginate(10);
        return view('guest.articels.show', compact('articel', 'anotherArticels'));
    }
}
