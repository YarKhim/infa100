<?php

namespace App\Filament\Student\Widgets;

use App\Models\PointsPerTask;
use App\Models\Task;
use App\Models\UserSolution;
use Filament\Forms\Components\Select;
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
//    protected static ?string $chartId = 'solutionsStatisticInf';

    /**
     * Widget Title
     *
     * @var string|null
     */
    use HasFiltersSchema;

    public function filtersSchema(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('subject')
                ->label('Выберите предмет по которому отобразить статистику')
                ->default(1)
                ->options([
                    1 => 'Информатика',
                    2 => 'Русский язык',
                    3 => 'Математика',
                    4 => 'Физика',
                ]),
        ]);
    }
//    protected function getFilters(): ?array
//    {
//        return [
//            1 => 'Информатика',
//            2 => 'Русский язык',
//            3 => 'Математика',
//            4 => 'Физика',
//        ];
//    }

    /**
     * Use this method to update the chart options when the filter form is submitted.
     */
    public function updatedInteractsWithSchemas(string $statePath): void
    {
        $this->updateOptions();
    }

    protected static ?string $heading = 'Статистика решений задач';
    protected int|string|array $columnSpan = 'full';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected static ?string $chartId = 'solutionsStatisticInf';


    protected function getOptions(): array
    {
        //$this->currentTab
        $subjects_tasks_count = [
            1 => 27,
            2 => 27,
            3 => 19,
            4 => 26
        ];
        $subject = $this->filters['subject'];
        $statistic = [];
        $labels = [];
        $maximal_res = [];
        $real_res = [];
        $user_id = Auth::id();//Получаем текущего пользователя и его id
        $users_solutions = UserSolution::query()
            ->where('user_id', $user_id)
            ->get();
        //создаём список со значениями на оси абцисс и с нулевой статистикой по умолчанию
        for ($i = 0; $i <= $subjects_tasks_count[$subject] - 1; $i++) {
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
            if ($task->id_subject == $subject) {
                //Получаем максимум баллов за задание
                $task_number = $task->task_number_in_the_kim;
                $points_per_task = PointsPerTask::query()
                    ->where('subject_id', $task->id_subject)
                    ->where('task_number', $task_number)
                    ->first();
                $maximal_res[$task_number] += $points_per_task->max_points;
                $real_res[$task_number] += $solution->points_after_check;
            }
        }
        foreach (range(0, $subjects_tasks_count[$subject] - 1) as $task_number) {
            //dump($real_res[$task_number], $maximal_res[$task_number]);
            if ($maximal_res[$task_number] != 0) {
                $statistic[$task_number] = $real_res[$task_number] * 100 / $maximal_res[$task_number];
            }

        }
        //dd($statistic);
//        $get_color = function ($value) {
//            if ($value <= 50) return '#ef4444';
//            elseif ($value > 50 && $value <= 85) return '#f59e0b';
//            elseif ($value > 85) return '#10b981';
//            return '#ef4444';
//        };
//        $colors = array_map($get_color, array_values($statistic));
//        dd($statistic, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24,
//            25 ,26, 27]);
        return [
            'chart' => [
                'type' => 'bar',
                'height' => 400,
            ],
            'series' => [
                [
                    'name' => '% верно решённых задач',
                    'data' => $statistic,
                ],
            ],
            'xaxis' => [
                'categories' => range(1, $subjects_tasks_count[$subject]),
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
                    'borderRadius' => 5,
                    'vertical' => true,
                ],
            ],
        ];
    }
}
