<?php

namespace App\Filament\Student\Resources\UserSolutions\Pages;

use App\Filament\Student\Resources\UserSolutions\UserSolutionResource;
use App\Models\Task;
use App\Models\UserSolution;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditUserSolution extends EditRecord
{
    protected static string $resource = UserSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make()
                ->label('Выйти')
                ->color('danger'),
            //DeleteAction::make(),
        ];
    }

    protected function getSaveFormAction(): \Filament\Actions\Action
    {
        return parent::getSaveFormAction()
            ->label('Сохранить ответ')
            ->color('success');
    }

    protected function beforeSave(): void
    {
        $this->data['state'] = UserSolution::STATE_ANSWER_ISNT_GIVEN;
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
        if ($solution_source == null) {
            $correct_answer = Task::query()->where('id', $task_id)->first()->answer;
            $user_answer = $this->getRecord()->user_answer;
            if ($user_answer == $correct_answer) {
                $solution->state = UserSolution::STATE_CORRECT_ANSWER_HAS_BEEN_GIVEN;
            } else {
                $solution->state = UserSolution::STATE_INCORRECT_ANSWER_GIVEN;
            }
        } else {
            $solution->state = UserSolution::STATE_ANSWER_GIVEN_AND_SAVED;
        }
        $solution->save();
    }
}
