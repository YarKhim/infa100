<?php

namespace App\Filament\Tutor\Resources\UserSolutions\Pages;

use App\Filament\Tutor\Resources\UserSolutions\UserSolutionResource;
use App\Models\UserSolution;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

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

    protected function afterSave(): void
    {
        $task_id = $this->getRecord()->task_id;
        $solution_source = $this->getRecord()->source_id;
        $solution = UserSolution::query()
            ->where('task_id', $task_id)
            ->where('user_id', Auth::id())
            ->where('source_id', $solution_source)
            ->first();
        $solution->tutor_id = Auth::id();
        $solution->is_checked = true;
        $solution->state = UserSolution::STATE_SOLUTION_CHECKED;
        $solution->save();

    }
}
