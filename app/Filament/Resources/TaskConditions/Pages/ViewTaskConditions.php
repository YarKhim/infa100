<?php

namespace App\Filament\Resources\TaskConditions\Pages;

use App\Filament\Resources\TaskConditions\TaskConditionsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTaskConditions extends ViewRecord
{
    protected static string $resource = TaskConditionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
