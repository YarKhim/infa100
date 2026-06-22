<?php

namespace App\Filament\Resources\TaskConditions\Pages;

use App\Filament\Resources\TaskConditions\TaskConditionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTaskConditions extends ListRecords
{
    protected static string $resource = TaskConditionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
