<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RevenueChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pertumbuhan Pengguna';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $users = User::select(DB::raw('COUNT(*) as count'), DB::raw('DATE(created_at) as date'))
            ->groupBy('date')
            ->orderBy('date')
            ->limit(7)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'User Baru Harian',
                    'data' => $users->pluck('count')->toArray(),
                    'fill' => 'start',
                    'borderColor' => '#6366f1',
                    'backgroundColor' => 'rgba(99, 102, 241, 0.1)',
                ],
            ],
            'labels' => $users->pluck('date')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
