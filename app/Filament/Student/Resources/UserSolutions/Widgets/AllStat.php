<?php

namespace App\Filament\Student\Widgets;

use Octopy\Filament\Tabify\Tab;
use Octopy\Filament\Tabify\TabsWidget;

class AllStatWidget extends TabsWidget
{
    protected int|string|array $columnSpan = 'full';

    public function getTabs(): array
    {
        return [
            Tab::make('Вкладка 1')
                ->schema([
                    // Здесь указываете классы ваших виджетов-графиков
                    \App\Filament\Student\Resources\UserSolutions\Widgets\SolutionsStatisticInf::class,
                ]),
            Tab::make('Вкладка 2')
                ->schema([
                    \App\Filament\Student\Resources\UserSolutions\Widgets\SolutionsStatisticInf::class,
                ]),
        ];
    }
}
