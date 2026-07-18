<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Pages;

use App\Filament\Tutor\Resources\UserSolutions\UserSolutionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUserSolution extends EditRecord
{
    protected static string $resource = UserSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
