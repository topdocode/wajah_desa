<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Setting;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        URL::macro('urlExists', function($url){
            $ch = curl_init($url);    
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            return ($code == 200);
        });

        view()->share("globalSetting", cache()->get("global.setting", [
            "phone" => "",
            "title" => "",
            "description" => "",
            "address" => "",
            "email" => "",
            "map_link" => "",
            "logo" => "",
            "social_media" => [
                "Google" => "",
                "Facebook" => "",
                "Instagram" => ""
            ]
        ]));
    }
    
}
