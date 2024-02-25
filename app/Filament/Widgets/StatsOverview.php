<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Video;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
             //
             Stat::make("Article", Article::count()),
             Stat::make("Videos", Video::count()),
             Stat::make("Images", Gallery::count()) 
        ];
    }

}
