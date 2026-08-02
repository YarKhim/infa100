<?php

namespace App\Filament\Student\Resources\UserSolutions\Widgets;

use App\Models\PointsPerTask;
use App\Models\Task;
use App\Models\UserSolution;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Widgets\ChartWidget\Concerns\HasFiltersSchema;
use Illuminate\Support\Facades\Auth;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class SolutionsStatisticInf extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'solutionsStatisticInf';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'SolutionsStatisticInf';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    use HasFiltersSchema;

    public function filtersSchema(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('subject')
                ->default('Blog Posts Chart'),
        ]);
    }

    /**
     * Use this method to update the chart options when the filter form is submitted.
     */
    public function updatedInteractsWithSchemas(string $statePath): void
    {
        $this->updateOptions();
    }

    protected function getOptions(): array

    {
        $statistic = [];
        $labels = [];
        $maximal_res = [];
        $real_res = [];
        $user_id = Auth::id();//Получаем текущего пользователя и его id
        $users_solutions = UserSolution::query()
            ->where('user_id', $user_id)
            ->get();
        //создаём список со значениями на оси абцисс и с нулевой статистикой по умолчанию
        for ($i = 1; $i <= 27; $i++) {
            $labels[$i] = $i;
            $statistic[$i] = 0;
            $maximal_res[$i] = 0;
            $real_res[$i] = 0;
        }
        //Перебираем все пользовательские решения
        foreach ($users_solutions as $solution) {
            $task = Task::query()
                ->where('id', $solution->task_id)
                ->first();
            if ($task->id_subject == 1) {
                //Получаем максимум баллов за задание
                $task_number = $task->task_number_in_the_kim;
                $points_per_task = PointsPerTask::query()
                    ->where('subject_id', $task->id_subject)
                    ->where('task_number', $task_number)
                    ->first();
                //Получаем как максимум возможных баллов за все решения пользователя так и сколько баллов он
                // фактическии набрал
                $maximal_res[$task_number] += $points_per_task->max_points;
                $real_res[$task_number] += $solution->points_after_check;
            }
        }
        foreach (range(1, 27) as $task_number) {
            //dump($real_res[$task_number], $maximal_res[$task_number]);
            if ($maximal_res[$task_number] != 0) {
                $statistic[$task_number] = $real_res[$task_number] * 100 / $maximal_res[$task_number];
            }

        }
        //dd($statistic);
        $get_color = function ($value) {
            if ($value <= 50) return '#ef4444';
            elseif ($value > 50 && $value <= 85) return '#f59e0b';
            elseif ($value > 85) return '#10b981';
            return '#ef4444';
        };
        $colors = array_map($get_color, array_values($statistic));
        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'BasicBarChart',
                    'data' => $statistic,
                ],
            ],
            'xaxis' => [
                'categories' => range(1, 27),
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
            'colors' => ['#f59e0b'],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 3,
                    'horizontal' => true,
                ],
            ],
        ];
    }
}
