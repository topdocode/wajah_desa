<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\File;
use App\Models\Lapor;
use App\Models\Profile;
use App\Models\Siap;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Facades\View::composer('guest.components.anothernews', function (View $view) {
            $anotherNews = Article::query()->featured()->orderBy('article_date', 'desc')->take(10)->get();
            $view->with('anotherNews', $anotherNews);
        });

        Facades\View::composer('guest.layouts.index', function (View $view) {
            $navbarProfile = Profile::select('title', 'slug',)->orderBy('created_at', 'asc')->get();
            $navbarDownload = File::select('file_name', 'url')->orderBy('created_at', 'asc')->get();
            $navbarLayanan = Lapor::select('title', 'link')->isActive()->orderBy('created_at', 'asc')->get();
            $navbarSiap = Siap::select('title', 'link', 'logo', 'description')->orderBy('created_at', 'asc')->get();
            $view->with(['navbarProfile' => $navbarProfile, 'navbarDownload' => $navbarDownload, 'navbarSiap' => $navbarSiap, 'navbarLayanan' => $navbarLayanan]);
        });

        // Facades\View::composer('guest.layouts.index', function (View $view) {
        //     $navbarProfile = Profile::select('title', 'slug')->orderBy('created_at', 'asc')->get();
        //     $navbarDownload = File::select('file_name', 'url')->orderBy('created_at', 'asc')->get();
        //     $siaps = Siap::orderBy('created_at', 'asc')->get();
        //     $view->with(['siaps' => $siaps]);
        // });
    }
}
