<?php

namespace App\Filament\Student\Resources\UserSolutions\Pages;

use App\Filament\Student\Resources\UserSolutions\UserSolutionResource;
use App\Models\UserSolution;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewUserSolution extends ViewRecord
{
    protected static string $resource = UserSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->visible(function (UserSolution $solution):bool{
                    return !$solution->isSolved();
                })
                ->label('Продолжить Решение')
                ->color('success')
                ->icon('heroicon-o-pencil'),
        ];
    }
}
