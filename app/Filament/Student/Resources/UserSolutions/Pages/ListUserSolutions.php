<?php

namespace App\Filament\Student\Resources\UserSolutions\Pages;

use App\Filament\Student\Resources\UserSolutions\UserSolutionResource;
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

    protected function getHeaderWidgets(): array
    {
        return [
            UserTaskSolutionStat::class,
        ];
    }
}
