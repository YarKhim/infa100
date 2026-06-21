<?php

namespace App\Filament\Resources\TaskSources\Pages;

use App\Filament\Resources\TaskSources\TaskSourceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTaskSource extends ViewRecord
{
    protected static string $resource = TaskSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
