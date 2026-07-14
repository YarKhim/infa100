<?php

namespace App\Filament\Student\Resources\UserSolutions\Pages;

use App\Filament\Student\Resources\UserSolutions\UserSolutionResource;
use App\Filament\Student\Resources\UserSolutions\Widgets\UserMathTaskSolutionStat;
use App\Filament\Student\Resources\UserSolutions\Widgets\UserTaskSolutionStat;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserSolutions extends ListRecords
{
    protected static string $resource = UserSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //CreateAction::make(),
        ];
    }

    public function getHeaderWidgetsColumns(): int|array
    {
        return 9;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UserTaskSolutionStat::class,
            UserMathTaskSolutionStat::class
        ];
    }

//    public function getColumns(): int|string|array
//    {
//        return 10; // Сетка будет разделена на 3 колонки
//    }
}
