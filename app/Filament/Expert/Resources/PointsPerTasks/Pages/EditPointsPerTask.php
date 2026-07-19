<?php

namespace App\Filament\Expert\Resources\PointsPerTasks\Pages;

use App\Filament\Expert\Resources\PointsPerTasks\PointsPerTaskResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPointsPerTask extends EditRecord
{
    protected static string $resource = PointsPerTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
