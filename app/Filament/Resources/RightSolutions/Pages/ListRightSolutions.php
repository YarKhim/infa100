<?php

namespace App\Filament\Resources\RightSolutions\Pages;

use App\Filament\Resources\RightSolutions\RightSolutionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRightSolutions extends ListRecords
{
    protected static string $resource = RightSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
