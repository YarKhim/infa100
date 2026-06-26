<?php

namespace App\Filament\Student\Resources\Tasks\Pages;

use App\Filament\Student\Resources\Tasks\TaskResource;
use App\Filament\Student\Resources\UserSolutions\UserSolutionResource;
use App\Models\Task;
use App\Models\UserSolution;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Auth;

class ViewTask extends ViewRecord
{
    protected static string $resource = TaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //EditAction::make(),
            Action::make('createSolution')
                //->label('Начать решение')
                ->label(function (Task $record) {

                    return UserSolution::query()
                        ->where('user_id', Auth::id())
                        ->where('task_id', $record->id)
                        ->count() ? 'Решали ранее' : 'Начать решение';
                })
                ->icon('heroicon-o-pencil')
                ->color('success')
                ->visible(function (Task $record) {
                    $userSolution =  UserSolution::query()
                        ->where('user_id', Auth::id())
                        ->where('task_id', $record->id)
                        ->first();
                    return !($userSolution && $userSolution->isSolved());
                })
                ->action(function (Task $record) {
                    // Создаём или получаем существующее решение
                    $solution = UserSolution::query()
                        ->where('user_id', Auth::id())
                        ->where('task_id', $record->id)
//                        ->where('source_id', )
                        ->first();
                    if ($solution == null) {
                        $solution = UserSolution::create([
                            'user_id' => Auth::id(),
                            'task_id' => $record->id,
                            'user_answer' => '',
                            'state' => UserSolution::STATE_NEW,
                        ]);
                    }
                    // Перенаправляем на страницу редактирования решения
                    return redirect()->to(
                        UserSolutionResource::getUrl('edit', ['record' => $solution])
                    );
                })
        ];
    }
}
