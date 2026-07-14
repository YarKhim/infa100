<?php

namespace App\Filament\Student\Resources\UserSolutions\Widgets;

use App\Models\Task;
use App\Models\UserSolution;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class UserMathTaskSolutionStat extends ChartWidget
{
    protected ?string $heading = 'Статистика решения задач по профильной математике в %';
    protected ?string $maxHeight = '40vh';
    protected int|string|array $columnSpan = '7';
    public ?UserSolution $record = null;
    public $subjects_tasks_numbers = [
        1 => 27,
        3 => 19,
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
        $user_id = Auth::id();
        $users_solutions = UserSolution::query()
            ->where('user_id', $user_id)
            ->get();
        $subject_id = $users_solutions[0]->sunject_id;
        $labels = [];
        $statistic = [];
        for ($i = 1; $i <= $subject_id; $i++) {
            $labels[$i] = $i;
        }
        for ($i = 0; $i < $subject_id; $i++) {
            $statistic[$i] = 0;
        }
        $right_solutions = [];
        $all_solutions = [];
        foreach ($users_solutions as $solution) {
            $task_subject = Task::query()
                ->where('id', $solution->task_id)
                ->first()
                ->id_subject;
            if ($task_subject == 3) {
                $task_number = Task::query()
                    ->where('id', $solution->task_id)
                    ->first()
                    ->task_number_in_the_kim;
                if (isset($all_solutions[$task_number])) {
                    $all_solutions[$task_number]++;
                } else $all_solutions[$task_number] = 1;
                if ($solution->state == 'correct_answer_has_been_given') {
                    if (isset($right_solutions[$task_number])) {
                        $right_solutions[$task_number]++;
                    } else $right_solutions[$task_number] = 1;
                }
            }

        }
        foreach (range(1, 19) as $task_number) {
            if (isset($right_solutions[$task_number]) && isset($all_solutions[$task_number])) $statistic[$task_number] = $right_solutions[$task_number] * 100 / $all_solutions[$task_number];
            else {
                $statistic[$task_number] = 0;
            }
        }

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
            'labels' => range(1, 19)

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
