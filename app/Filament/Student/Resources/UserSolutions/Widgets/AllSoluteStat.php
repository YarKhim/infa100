<?php

namespace App\Filament\Student\Resources\UserSolutions\Widgets;

//use Filament\Schemas\Components\Tabs\Tab;
use Filament\Widgets\Widget;
use VodafoneZiggoNL\MultiWidget\MultiWidget;
use Octopy\Filament\Tabify\Tab;
use Octopy\Filament\Tabify\TabsWidget;

class AllSoluteStat extends MultiWidget
{
//    protected string $view = 'filament.student.resources.user-solutions.widgets.all-solute-stat';

//    protected int|string|array $columnSpan = 'full';
//
//
//    public function getTabs(): array
//    {
//        return [
//            Tab::make('Вкладка 1')
//                ->schema([
//                    // Здесь указываете классы ваших виджетов-графиков
//                    \App\Filament\Student\Widgets\SolutionsStatisticInf::class,
//                ]),
//            Tab::make('Вкладка 2')
//                ->schema([
//                    \App\Filament\Student\Widgets\SolutionsStatisticInf::class,
//                ]),
//        ];
//    }
    public array $widgets = [
        \App\Filament\Student\Widgets\SolutionsStatisticInf::class,
        \App\Filament\Student\Widgets\SolutionsStatisticInf::class,
//        UserMathTaskSolutionStat::class,
    ];
}
