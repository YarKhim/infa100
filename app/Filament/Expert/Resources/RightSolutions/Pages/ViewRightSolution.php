<?php

namespace App\Filament\Expert\Resources\RightSolutions\Pages;

use App\Filament\Expert\Resources\RightSolutions\RightSolutionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRightSolution extends ViewRecord
{
    protected static string $resource = RightSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
