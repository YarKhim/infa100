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
            ViewAction::make(),
            //DeleteAction::make(),
        ];
    }

    protected function getSaveFormAction(): \Filament\Actions\Action
    {
        return parent::getSaveFormAction()
            ->label('Сохранить ответ');
    }

    protected function beforeSave(): void
    {
        $this->data['state'] = 'answer_isnt_given';
    }

    protected function afterSave(): void
    {
        $task_id = $this->getRecord()->task_id;
        $correct_answer = Task::query()->where('id', $task_id)->first()->answer;
        $user_answer = $this->getRecord()->user_answer;
        $solution = UserSolution::query()->where('task_id', $task_id)->where('user_id', Auth::id())->first();
        if ($user_answer == $correct_answer) {
            $solution->state = 'correct_answer_has_been_given';
        } else {
            $solution->state = 'incorrect_answer_given';
        }
        $solution->save();
    }
}
