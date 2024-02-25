<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserOverview extends BaseWidget
{
    protected static ?int $sort = -2;
    protected int | string | array $columnSpan = 2;
    protected function getStats(): array
    {
        return [
            Stat::make("Jumlah Admin ", $this->getAdminCount()),
            Stat::make("Jumlah User", $this->getUserCount()),
            Stat::make("Total User", User::all()->count()),
        ];
    }

    protected function getAdminCount(): int
    {
        return User::query()->where("is_admin", true)->count();
    }
    protected function getUserCount(): int
    {
        return User::query()->where("is_admin", false)->count();
    }
}
