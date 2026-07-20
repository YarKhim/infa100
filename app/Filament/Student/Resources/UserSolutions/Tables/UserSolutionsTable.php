<?php

namespace App\Filament\Student\Resources\UserSolutions\Tables;

use App\Filament\Student\Resources\UserSolutions\Widgets\UserTaskSolutionStat;
use App\Models\UserSolution;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class UserSolutionsTable
{
//    protected function getHeaderWidgets(): array
//    {
//        return [
//            UserTaskSolutionStat::class,
//        ];
//    }

    public static function configure(Table $table): Table
    {
        return $table
            ->columns(components: [
                TextColumn::make('task_id')
                    ->numeric()
                    ->sortable()
                    ->label('ID задачи'),
//                TextColumn::make('user_answer')
//                    ->searchable()
//                    ->label('Ваш ответ'),
                TextColumn::make('points_after_check')
                    ->label('Баллы после проверки'),
//                TextColumn::make('source_id')
//                    ->searchable()
//                    ->label('Источник решения'),
                TextColumn::make('state')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'answer_isnt_given' => 'Ответ сохранён',
                        'solution_on_checking' => 'На проверке',
                        'new' => 'Ответ не дан',
                        'correct_answer_has_been_given' => 'Решено верно',
                        'incorrect_answer_given' => 'Решено неверно',
                        UserSolution::STATE_SOLUTION_CHECKED => 'Проверено',
                        'solution_send_to_checking' => 'Отправлено на проверку'
                    })
                    ->icon(fn(string $state): Heroicon => match ($state) {
                        'answer_isnt_given' => Heroicon::CheckCircle,
                        'new' => Heroicon::Clock,
                        'correct_answer_has_been_given' => Heroicon::CheckCircle,
                        'incorrect_answer_given' => Heroicon::XCircle,
                        'solution_on_checking' => Heroicon::Clock,
                        UserSolution::STATE_SOLUTION_CHECKED => Heroicon::CheckCircle,
                        'solution_send_to_checking' => Heroicon::CheckCircle,
                        default => Heroicon::QuestionMarkCircle,
                    })
                    ->iconColor(fn(string $state): string => match ($state) {
                        UserSolution::STATE_SOLUTION_CHECKED => 'success',
                        'correct_answer_has_been_given' => 'success',
                        'solution_send_to_checking' => 'info',
                        'new' => 'waring',
                        'incorrect_answer_given' => 'danger',
                        'answer_isnt_given' => 'info',
                        'solution_on_checking' => 'info',
                    })
                    ->label('Состояние'),
                //                    ->badge()
//                    ->color(fn (string $state): string => match ($state) {
//                        'new'   => 'gray',
//                        'correct_answer_has_been_given'  => 'success',
//                        'incorrect_answer_given'  => 'danger',
//                        'answer_isnt_given' => 'info',
//                        default     => 'gray',
//                    })
//                TextColumn::make('solution_files_path')
//                    ->searchable(),
//                TextColumn::make('created_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                TextColumn::make('updated_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('user_id', Auth::id());
            })
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Просмотреть решение'),
//                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
