<?php

namespace App\Filament\Resources\RightSolutions\Pages;

use App\Filament\Resources\RightSolutions\RightSolutionResource;
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
