<?php

namespace App\Filament\Student\Resources\OptionSolutions\Pages;

use App\Filament\Student\Resources\OptionSolutions\OptionSolutionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditOptionSolution extends EditRecord
{
    protected static string $resource = OptionSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            //DeleteAction::make(),
        ];
    }
}
