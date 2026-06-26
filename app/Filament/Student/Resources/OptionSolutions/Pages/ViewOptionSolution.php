<?php

namespace App\Filament\Student\Resources\OptionSolutions\Pages;

use App\Filament\Student\Resources\OptionSolutions\OptionSolutionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOptionSolution extends ViewRecord
{
    protected static string $resource = OptionSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //EditAction::make(),
        ];
    }
}
