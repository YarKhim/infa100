<?php

namespace App\Filament\Expert\Resources\PointsPerTasks\Pages;

use App\Filament\Expert\Resources\PointsPerTasks\PointsPerTaskResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPointsPerTask extends ViewRecord
{
    protected static string $resource = PointsPerTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
