<?php

namespace App\Filament\Student\Resources\Tasks\Pages;

use App\Filament\Student\Resources\Tasks\TaskResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTask extends ViewRecord
{
    protected static string $resource = TaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //EditAction::make(),
        ];
    }
}
