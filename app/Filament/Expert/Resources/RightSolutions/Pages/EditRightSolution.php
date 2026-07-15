<?php

namespace App\Filament\Expert\Resources\RightSolutions\Pages;

use App\Filament\Expert\Resources\RightSolutions\RightSolutionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRightSolution extends EditRecord
{
    protected static string $resource = RightSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
