<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Widgets;

use App\Models\UserSolution;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class CheckingStatistic extends ApexChartWidget
{
    public static int $days_per_day = 30;

    protected static ?string $heading = 'Статистика проверок работ вами';
    protected int|string|array $columnSpan = 'full';
    protected ?string $maxHeight = '50vh';

    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'checkingStatistic';
//    static protected ?string $footer = 'Lorem Ipsum — это просто фиктивный текст, используемый в полиграфии и вёрстке.';
    protected ?string $pollingInterval = '10s';
    /**
     * Widget Title
     *
     * @var string|null
     */
//    protected static ?string $heading = 'CheckingStatistic';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $days = collect(range(0, CheckingStatistic::$days_per_day))->map(function ($days) {
            return Carbon::now()->subDays($days)->format('Y-m-d');
        })->reverse()->values();
        $DAYS = collect(range(0, CheckingStatistic::$days_per_day))->map(function ($days) {
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
            'chart' => [
                'type' => 'line',
                'height' => 500,
            ],
            'series' => [
                [
                    'name' => 'Проверок',
                    'data' => $checks,
                ],
            ],
            'xaxis' => [
                'categories' => $days,
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#ffbf00'],
            'stroke' => [
                'curve' => 'smooth',
            ],
        ];
    }
}
