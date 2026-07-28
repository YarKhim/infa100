<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Pages;

use App\Filament\Tutor\Resources\UserSolutions\UserSolutionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewUserSolution extends ViewRecord
{
    protected static string $resource = UserSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->label('Проверить')
                ->visible(fn($record) => !$record->is_checked),
        ];
    }
}
