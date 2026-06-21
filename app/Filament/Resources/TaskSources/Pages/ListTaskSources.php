<?php

namespace App\Filament\Resources\TaskSources\Pages;

use App\Filament\Resources\TaskSources\TaskSourceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTaskSources extends ListRecords
{
    protected static string $resource = TaskSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
