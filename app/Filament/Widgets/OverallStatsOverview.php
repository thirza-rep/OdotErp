<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OverallStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Pengguna', User::count())
                ->description('Jumlah seluruh akun user terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
            Stat::make('Admin', User::where('email', 'like', '%@admin.com')->count())
                ->description('Admin terdaftar')
                ->descriptionIcon('heroicon-m-shield-check')
                ->color('warning'),
            Stat::make('Hari Ini', User::whereDate('created_at', now())->count())
                ->description('Pendaftaran user baru hari ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info'),
        ];
    }
}
