<?php

namespace App\Filament\Student\Resources\UserSolutions\Pages;

use App\Filament\Student\Resources\UserSolutions\UserSolutionResource;
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
}
