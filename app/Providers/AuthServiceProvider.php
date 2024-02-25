<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Carousel;
use App\Models\Profile;
use App\Models\Siap;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Profile::class => \App\Policies\ProfilePolicy::class,
        Carousel::class => \App\Policies\CarouselPolicy::class,
        User::class => \App\Policies\UserPolicy::class,
        Siap::class => \App\Policies\SiapPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
