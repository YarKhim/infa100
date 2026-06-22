<?php

namespace App\Filament\Resources\TaskConditions\Pages;

use App\Filament\Resources\TaskConditions\TaskConditionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTaskCondition extends ViewRecord
{
    protected static string $resource = TaskConditionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
