<?php

namespace App\Filament\Student\Resources\UserSolutions\Widgets;

use App\Models\PointsPerTask;
use App\Models\Task;
use App\Models\UserSolution;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class UserTaskSolutionStat extends ChartWidget
{
    public ?UserSolution $record = null;
    protected ?string $maxHeight = '40vh';
    protected ?string $heading = 'Статистика решения задач по информатике в %';
    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 4;
    public $subjects_tasks_numbers = [
        'Inf' => 27,
        'math' => 19,
        'rus' => 27
    ];

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'max' => 100,
                    'min' => 0,
                    'ticks' => [
                        'stepSize' => 25,
                    ],
                ],
            ],
            'animation' => [
                'duration' => 800, // длительность в миллисекундах
                'easing' => 'linear', // 'linear', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad' и др.
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ]
            ]

        ];
    }

    protected function getData(): array
    {
//        $user_id = Auth::id();
//        $users_solutions = UserSolution::query()
//            ->where('user_id', $user_id)
//            ->get();
//        $subject_id = $users_solutions[0]->sunject_id;
//        $labels = [];
//        $statistic = [];
//        for ($i = 1; $i <= $subject_id; $i++) {
//            $labels[$i] = $i;
//        }
//        for ($i = 0; $i < $subject_id; $i++) {
//            $statistic[$i] = 0;
//        }
//        $right_solutions = [];
//        $all_solutions = [];
//        foreach ($users_solutions as $solution) {
//            $task_subject = Task::query()
//                ->where('id', $solution->task_id)
//                ->first()
//                ->id_subject;
//            if ($task_subject == 1) {
//                $task = Task::query()
//                    ->where('id', $solution->task_id)
//                    ->first();
//                $task_number = $task
//                    ->task_number_in_the_kim;
//                if (isset($all_solutions[$task_number])) {
//                    $all_solutions[$task_number]++;
//                } else $all_solutions[$task_number] = 1;
//                if ($solution->state == 'correct_answer_has_been_given') {
//                    if (isset($right_solutions[$task_number])) {
//                        $right_solutions[$task_number]++;
//                    } else $right_solutions[$task_number] = 1;
//                }
//            }
//
//        }
//
//        foreach (range(1, 27) as $task_number) {
//            if (isset($right_solutions[$task_number]) && isset($all_solutions[$task_number])) $statistic[$task_number] = $right_solutions[$task_number] * 100 / $all_solutions[$task_number];
//            else {
//                $statistic[$task_number] = 0;
//            }
//        }
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
            'datasets' => [
                [
                    'label' => 'Статистика',
                    'data' => array_values($statistic),
                    'backgroundColor' => $colors,
                ],
            ],
            'labels' => range(1, 27)

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
