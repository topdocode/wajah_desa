<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use App\Filament\Widgets\ArticleOverview;
use App\Filament\Widgets\MediaOverview;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\UserOverview;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->brandName("Mimika Panel")
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Red,
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Site Setting')
                    ->icon('heroicon-o-inbox'),
                NavigationGroup::make()
                    ->label('Data')
                    ->icon('heroicon-o-inbox'),
                NavigationGroup::make()
                    ->label('Media')
                    ->icon('heroicon-o-photo')
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Dashboard::class
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                UserOverview::class,
                StatsOverview::class
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
