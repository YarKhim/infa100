<?php

namespace App\Filament\Expert\Resources\PointsPerTasks\Pages;

use App\Filament\Expert\Resources\PointsPerTasks\PointsPerTaskResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPointsPerTasks extends ListRecords
{
    protected static string $resource = PointsPerTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
