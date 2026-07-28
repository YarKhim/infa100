<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Widgets;

use App\Models\UserSolution;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class CheckStat extends ChartWidget
{
    public static int $days_per_day = 14;

    protected ?string $heading = 'Статистика проверок работ вами';
    protected int|string|array $columnSpan = 'full';
    protected ?string $maxHeight = '50vh';

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'min' => 0,
                    'ticks' => [
                        'stepSize' => 2,
                    ],
                ],
            ],
            'animation' => [
                'duration' => 400, // длительность в миллисекундах
                'easing' => 'linear', // 'linear', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad' и др.
            ],
        ];
    }

    protected function getData(): array
    {

        $days = collect(range(0, CheckStat::$days_per_day))->map(function ($days) {
            return Carbon::now()->subDays($days)->format('Y-m-d');
        })->reverse()->values();
        $DAYS = collect(range(0, CheckStat::$days_per_day))->map(function ($days) {
            return Carbon::now()->subDays($days);
        })->reverse()->values();
        $checks = [];
        foreach ($DAYS as $day) {
            $checks[] = UserSolution::query()
                ->where('is_checked', true)
                ->where('tutor_id', Auth::id())
                ->whereBetween('updated_at', [
                    $day->copy()->startOfDay(),
                    $day->copy()->endOfDay()
                ])
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Проверок работ',
                    'data' => $checks,
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF',
                        '#FF9F40',
                    ],
                    'tension' => 0.4,
                    'borderColor' => '#ffbf00',
                    'borderWidth' => 3,
                ],
            ],
            'labels' => $days,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
